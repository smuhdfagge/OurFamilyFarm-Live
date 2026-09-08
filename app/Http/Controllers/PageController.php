<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function home()
    {
        $services = Cache::remember('homepage_services', 3600, fn () => Service::orderBy('sort_order')->take(8)->get());
        $team = Cache::remember('homepage_team', 3600, fn () => TeamMember::orderBy('sort_order')->get());
        $gallery = Cache::remember('homepage_gallery', 3600, fn () => GalleryImage::orderBy('sort_order')->take(8)->get());

        return view('pages.home', compact('services', 'team', 'gallery'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function ourTeam()
    {
        $team = Cache::remember('team_members', 3600, fn () => TeamMember::orderBy('sort_order')->get());

        return view('pages.our-team', compact('team'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
