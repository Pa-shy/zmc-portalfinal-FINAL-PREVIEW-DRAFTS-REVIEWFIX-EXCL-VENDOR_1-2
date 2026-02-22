<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Notice;
use App\Models\Vacancy;
use App\Models\Tender;
use App\Models\Event;
use Illuminate\Http\Request;

class PublicContentController extends Controller
{
    /**
     * Get all public content for external website aggregation.
     */
    public function getContent(Request $request)
    {
        $news = News::where('is_published', true)
            ->orderByDesc('published_at')
            ->limit(20)
            ->get();

        $notices = Notice::where('is_published', true)
            // If target_portal is used to hide from public, we could filter here.
            // For now, assuming all published notices are for external consumption too.
            ->orderByDesc('published_at')
            ->limit(20)
            ->get();

        $vacancies = Vacancy::where('is_published', true)
            ->where(function($q) {
                $q->whereNull('closing_at')->orWhere('closing_at', '>=', now()->startOfDay());
            })
            ->orderByDesc('published_at')
            ->get();

        $tenders = Tender::where('is_published', true)
            ->where(function($q) {
                $q->whereNull('closing_at')->orWhere('closing_at', '>=', now()->startOfDay());
            })
            ->orderByDesc('published_at')
            ->get();

        $events = Event::where('is_published', true)
            ->where('starts_at', '>=', now()->subMonths(3))
            ->orderByDesc('starts_at')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => [
                'news'      => $news,
                'notices'   => $notices,
                'vacancies' => $vacancies,
                'tenders'   => $tenders,
                'events'    => $events,
            ],
            'meta' => [
                'base_url' => url('/'),
                'storage_url' => asset('storage/'),
                'timestamp' => now()->toIso8601String(),
            ]
        ]);
    }
}
