<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    private const TREND_DAYS = 14;

    public function __invoke(): View
    {
        $newCount = ContactSubmission::where('status', 'new')->count();

        return view('dashboard', [
            'stats' => [
                ['label' => 'Services', 'value' => Service::count(), 'note' => 'Published offerings', 'tone' => 'leaf', 'route' => 'admin.services.index'],
                ['label' => 'Team members', 'value' => TeamMember::count(), 'note' => 'People on the site', 'tone' => 'earth', 'route' => 'team-members.index'],
                ['label' => 'Gallery images', 'value' => GalleryImage::count(), 'note' => 'Photos on show', 'tone' => 'sun', 'route' => 'gallery-images.index'],
                ['label' => 'New enquiries', 'value' => $newCount, 'note' => $newCount ? 'Waiting for a reply' : 'All caught up', 'tone' => 'berry', 'route' => 'admin.enquiries.index', 'query' => ['status' => 'new']],
            ],
            'recentSubmissions' => ContactSubmission::latest()->take(6)->get(),
            'trend' => $this->enquiryTrend(),
            'statusBreakdown' => $this->statusBreakdown(),
        ]);
    }

    /**
     * Enquiries received per day over the last two weeks, oldest first.
     * Grouped in PHP so it works the same on SQLite and MySQL.
     */
    private function enquiryTrend(): array
    {
        $start = Carbon::today()->subDays(self::TREND_DAYS - 1);

        $counts = ContactSubmission::where('created_at', '>=', $start)
            ->pluck('created_at')
            ->countBy(fn ($date) => $date->toDateString());

        $days = collect(range(0, self::TREND_DAYS - 1))->map(function ($offset) use ($start, $counts) {
            $day = $start->copy()->addDays($offset);

            return [
                'date' => $day,
                'count' => $counts->get($day->toDateString(), 0),
            ];
        });

        return [
            'days' => $days,
            'total' => $days->sum('count'),
            'max' => max(1, $days->max('count')),
            'thisWeek' => $days->slice(-7)->sum('count'),
            'lastWeek' => $days->slice(0, 7)->sum('count'),
        ];
    }

    private function statusBreakdown(): array
    {
        $counts = ContactSubmission::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $all = max(1, $counts->sum());

        return collect([
            'new' => ['label' => 'New', 'colour' => 'bg-leaf'],
            'contacted' => ['label' => 'Contacted', 'colour' => 'bg-sun'],
            'resolved' => ['label' => 'Resolved', 'colour' => 'bg-earth'],
            'archived' => ['label' => 'Archived', 'colour' => 'bg-earth-light/50'],
        ])->map(fn ($meta, $status) => $meta + [
            'status' => $status,
            'count' => (int) $counts->get($status, 0),
            'percent' => round(((int) $counts->get($status, 0)) / $all * 100),
        ])->values()->all();
    }
}
