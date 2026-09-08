<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Support\Facades\Cache;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Cache::remember('gallery_images', 3600, fn () => GalleryImage::orderBy('sort_order')->get());

        return view('pages.gallery', compact('images'));
    }
}
