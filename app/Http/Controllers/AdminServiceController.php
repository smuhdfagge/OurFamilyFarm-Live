<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminServiceController extends Controller
{
    public function index(): View
    {
        return view('admin.services.index', [
            'services' => Service::orderBy('sort_order')->orderBy('title')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.services.create', ['service' => new Service]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['icon'] = $data['icon'] ?: '🌾';

        $service = Service::create($data);
        $this->clearPublicServiceCache($service->slug);

        return redirect()->route('admin.services.index')->with('status', 'Service added.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $oldSlug = $service->slug;
        $data = $this->validated($request, $service);
        $data['icon'] = $data['icon'] ?: '🌾';

        $service->update($data);
        $this->clearPublicServiceCache($oldSlug, $service->slug);

        return redirect()->route('admin.services.index')->with('status', 'Service updated.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $slug = $service->slug;
        $service->delete();
        $this->clearPublicServiceCache($slug);

        return redirect()->route('admin.services.index')->with('status', 'Service removed.');
    }

    private function validated(Request $request, ?Service $service = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('services', 'slug')->ignore($service)],
            'summary' => ['required', 'string', 'max:500'],
            'description' => ['required', 'string', 'max:10000'],
            'icon' => ['nullable', 'string', 'max:20'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
        ]);
    }

    private function clearPublicServiceCache(string ...$slugs): void
    {
        Cache::forget('all_services');

        foreach (array_unique($slugs) as $slug) {
            Cache::forget('service_'.$slug);
            Cache::forget('related_services_'.$slug);
        }
    }
}
