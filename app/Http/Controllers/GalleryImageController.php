<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GalleryImageController extends Controller
{
    public function index(): View
    {
        return view('gallery-images.index', [
            'galleryImages' => GalleryImage::orderBy('sort_order')->orderBy('title')->get(),
        ]);
    }

    public function create(): View
    {
        return view('gallery-images.create', ['galleryImage' => new GalleryImage]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request, true);
        $title = $data['title'];
        $sortOrder = $data['sort_order'];

        foreach ($request->file('images') as $index => $image) {
            GalleryImage::create([
                'title' => $title ?: Str::headline(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)),
                'category' => $data['category'],
                'image_url' => $this->storeImage($image),
                'description' => $data['description'],
                'sort_order' => $sortOrder + $index,
            ]);
        }
        $this->clearPublicGalleryCache();

        return redirect()->route('gallery-images.index')->with('status', count($request->file('images')).' gallery images added.');
    }

    public function edit(GalleryImage $galleryImage): View
    {
        return view('gallery-images.edit', compact('galleryImage'));
    }

    public function update(Request $request, GalleryImage $galleryImage): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $this->deleteStoredImage($galleryImage->image_url);
            $data['image_url'] = $this->storeImage($request->file('image'));
        }

        $galleryImage->update($data);
        $this->clearPublicGalleryCache();

        return redirect()->route('gallery-images.index')->with('status', 'Gallery image updated.');
    }

    public function destroy(GalleryImage $galleryImage): RedirectResponse
    {
        $this->deleteStoredImage($galleryImage->image_url);
        $galleryImage->delete();
        $this->clearPublicGalleryCache();

        return redirect()->route('gallery-images.index')->with('status', 'Gallery image removed.');
    }

    private function validated(Request $request, bool $multipleImages = false): array
    {
        $rules = [
            'title' => ['nullable', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:5000'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
        ];

        if ($multipleImages) {
            $rules['images'] = ['required', 'array', 'min:1', 'max:30'];
            $rules['images.*'] = ['required', 'file', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'];
        } else {
            $rules['image'] = ['nullable', 'file', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'];
        }

        return $request->validate($rules);
    }

    private function storeImage($image): string
    {
        $path = $image->store('gallery', 'public');

        return '/storage/'.$path;
    }

    private function deleteStoredImage(?string $imageUrl): void
    {
        if ($imageUrl && Str::startsWith($imageUrl, '/storage/')) {
            Storage::disk('public')->delete(Str::after($imageUrl, '/storage/'));
        }
    }

    private function clearPublicGalleryCache(): void
    {
        Cache::forget('homepage_gallery');
        Cache::forget('gallery_images');
    }
}