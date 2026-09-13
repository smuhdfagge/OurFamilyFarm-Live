<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'stats' => [
                ['label' => 'Services', 'value' => Service::count(), 'note' => 'Published offerings', 'tone' => 'leaf'],
                ['label' => 'Team members', 'value' => TeamMember::count(), 'note' => 'People on the site', 'tone' => 'earth'],
                ['label' => 'Gallery images', 'value' => GalleryImage::count(), 'note' => 'Visual stories', 'tone' => 'sun'],
                ['label' => 'New enquiries', 'value' => ContactSubmission::where('status', 'new')->count(), 'note' => 'Awaiting a response', 'tone' => 'berry'],
            ],
            'recentSubmissions' => ContactSubmission::latest()->take(5)->get(),
        ]);
    }
}