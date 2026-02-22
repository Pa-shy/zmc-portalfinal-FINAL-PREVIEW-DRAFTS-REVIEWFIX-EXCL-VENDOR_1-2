<?php

namespace App\Services;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ApplicationWorkflow
{
    public static function transition(Application $app, string $toStatus, string $action, array $meta = []): void
    {
        $from = (string) $app->status;

        if (!self::allowed($from, $toStatus)) {
            throw ValidationException::withMessages([
                'status' => "Invalid transition from [$from] to [$toStatus].",
            ]);
        }

        $app->status = $toStatus;
        $app->current_stage = Application::stageForStatus($toStatus);
        $app->last_action_at = now();
        $app->last_action_by = Auth::id();

        // keep your existing decision timestamps in sync
        if (in_array($toStatus, [Application::OFFICER_APPROVED, Application::REGISTRAR_APPROVED], true)) {
            $app->approved_at = now();
            $app->rejected_at = null;
        }

        if (in_array($toStatus, [Application::OFFICER_REJECTED, Application::REGISTRAR_REJECTED], true)) {
            $app->rejected_at = now();
            $app->approved_at = null;
        }

        $app->save();

        ActivityLogger::log($action, $app, $from, $toStatus, $meta);
    }

    public static function allowed(string $from, string $to): bool
    {
        // Workflow: Officer → Registrar → Accounts → Production
        $map = [
            Application::SUBMITTED            => [Application::OFFICER_REVIEW],

            Application::OFFICER_REVIEW       => [
                Application::OFFICER_APPROVED,
                Application::OFFICER_REJECTED,
                Application::CORRECTION_REQUESTED,
            ],
            Application::CORRECTION_REQUESTED => [Application::OFFICER_REVIEW],

            // Officer approved → Registrar Review
            Application::OFFICER_APPROVED     => [Application::REGISTRAR_REVIEW],

            // Registrar Review → Accounts (for payment) OR Return to AO
            Application::REGISTRAR_REVIEW     => [
                Application::REGISTRAR_APPROVED, // Can be used for final approval if already paid
                Application::REGISTRAR_REJECTED,
                Application::ACCOUNTS_REVIEW,    // Registrar pushes to Accounts
                Application::RETURNED_TO_OFFICER,
            ],

            // Accounts Review → Production (after payment) OR Return to AO/Registrar
            Application::ACCOUNTS_REVIEW      => [
                Application::PAID_CONFIRMED,
                Application::RETURNED_TO_OFFICER,
                Application::RETURNED_TO_ACCOUNTS, // Self-loop for corrections
            ],

            // Payment confirmed → Production
            Application::PAID_CONFIRMED       => [Application::PRODUCTION_QUEUE, Application::REGISTRAR_REVIEW],

            Application::RETURNED_TO_OFFICER  => [Application::OFFICER_REVIEW],
            Application::RETURNED_TO_ACCOUNTS => [Application::ACCOUNTS_REVIEW],

            // Registrar approved (Final) → Production
            Application::REGISTRAR_APPROVED   => [Application::PRODUCTION_QUEUE],

            Application::PRODUCTION_QUEUE     => [
                Application::CARD_GENERATED,
                Application::CERT_GENERATED,
                Application::PRINTED,
                Application::ISSUED,
            ],
            Application::CARD_GENERATED       => [Application::CERT_GENERATED, Application::PRINTED, Application::ISSUED],
            Application::CERT_GENERATED       => [Application::PRINTED, Application::ISSUED],
            Application::PRINTED              => [Application::ISSUED],
        ];

        return in_array($to, $map[$from] ?? [], true);
    }
}
