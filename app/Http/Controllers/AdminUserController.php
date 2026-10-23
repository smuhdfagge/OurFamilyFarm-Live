<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim($request->string('q')->toString());
        $usersQuery = User::query()->orderBy('name')->orderBy('email');

        if ($search !== '') {
            $usersQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            });
        }

        return view('admin.users.index', [
            'users' => $usersQuery->paginate(15)->withQueryString(),
            'totalCount' => User::count(),
            'verifiedCount' => User::whereNotNull('email_verified_at')->count(),
            'unverifiedCount' => User::whereNull('email_verified_at')->count(),
            'search' => $search,
        ]);
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create($data);

        // Accounts made by an admin are trusted, so they skip email confirmation.
        $user->forceFill(['email_verified_at' => now()])->save();

        return redirect()->route('admin.users.index')->with('status', $user->name.' can now sign in.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($user->is($request->user())) {
            return back()->with('error', 'You can’t remove your own account from here. Use your profile page instead.');
        }

        if (User::count() <= 1) {
            return back()->with('error', 'At least one account must stay so someone can sign in.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('status', 'User removed.');
    }
}
