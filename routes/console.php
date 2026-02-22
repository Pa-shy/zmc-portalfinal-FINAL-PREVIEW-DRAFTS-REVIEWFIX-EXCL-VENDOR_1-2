<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Accreditation expiry processing (creates follow-ups and notifies applicants)
Schedule::command('accreditation:process-expiries')->dailyAt('08:00');
