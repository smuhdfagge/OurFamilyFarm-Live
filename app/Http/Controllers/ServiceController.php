<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Cache::remember('all_services', 3600, fn () => Service::orderBy('sort_order')->get());

        return view('pages.services.index', compact('services'));
    }

    public function show(string $slug)
    {
        $service = Cache::remember('service_'.$slug, 3600, fn () => Service::where('slug', $slug)->firstOrFail());
        $related = Cache::remember('related_services_'.$slug, 3600, fn () => Service::where('id', '!=', $service->id)->orderBy('sort_order')->take(3)->get());

        return view('pages.services.show', compact('service', 'related'));
    }
}
