<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $services = Service::orderBy('sort_order')->take(8)->get();
        $team = TeamMember::orderBy('sort_order')->get();
        $gallery = GalleryImage::orderBy('sort_order')->take(8)->get();

        return view('pages.home', compact('services', 'team', 'gallery'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function ourTeam()
    {
        $team = TeamMember::orderBy('sort_order')->get();

        return view('pages.our-team', compact('team'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
