<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TeamMemberController extends Controller
{
    public function index(): View
    {
        return view('team-members.index', [
            'teamMembers' => TeamMember::orderBy('sort_order')->orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('team-members.create', ['teamMember' => new TeamMember]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'));
        }

        TeamMember::create($data);
        $this->clearPublicTeamCache();

        return redirect()->route('team-members.index')->with('status', 'Team member added.');
    }

    public function edit(TeamMember $teamMember): View
    {
        return view('team-members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $this->deleteStoredImage($teamMember->image);
            $data['image'] = $this->storeImage($request->file('image'));
        }

        $teamMember->update($data);
        $this->clearPublicTeamCache();

        return redirect()->route('team-members.index')->with('status', 'Team member updated.');
    }

    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        $this->deleteStoredImage($teamMember->image);
        $teamMember->delete();
        $this->clearPublicTeamCache();

        return redirect()->route('team-members.index')->with('status', 'Team member removed.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:5000'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
        ]);
    }

    private function storeImage($image): string
    {
        $path = $image->store('team-members', 'public');

        return '/storage/'.$path;
    }

    private function deleteStoredImage(?string $imageUrl): void
    {
        if ($imageUrl && Str::startsWith($imageUrl, '/storage/')) {
            Storage::disk('public')->delete(Str::after($imageUrl, '/storage/'));
        }
    }

    private function clearPublicTeamCache(): void
    {
        Cache::forget('homepage_team');
        Cache::forget('team_members');
    }
}