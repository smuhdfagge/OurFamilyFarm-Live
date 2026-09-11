<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $images = collect(File::files(public_path('gallery')))
            ->filter(fn ($file) => in_array(strtolower($file->getExtension()), ['heic', 'jpeg', 'jpg', 'png', 'webp'], true))
            ->sortBy(fn ($file) => $file->getFilename())
            ->values()
            ->map(fn ($file) => (object) [
                'title' => pathinfo($file->getFilename(), PATHINFO_FILENAME),
                'image_url' => asset('gallery/'.$file->getFilename()),
            ]);

        return view('pages.gallery', compact('images'));
    }
}
