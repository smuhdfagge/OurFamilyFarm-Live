<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $allImages = GalleryImage::orderBy('sort_order')->get();
        $categories = $allImages->pluck('category')->filter()->unique()->sort()->values();
        $activeCategory = $request->query('category', 'All');
        $images = $activeCategory === 'All'
            ? $allImages
            : $allImages->where('category', $activeCategory)->values();

        return view('pages.gallery', compact('allImages', 'images', 'categories', 'activeCategory'));
    }
}
