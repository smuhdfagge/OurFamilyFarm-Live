<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
}
