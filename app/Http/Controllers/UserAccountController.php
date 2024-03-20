<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function create(): \Inertia\Response
    {
        return inertia('UserAccount/Create');
    }

    public function store(RegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::create($request->validated());

        Auth::login($user);
        event(new Registered($user));

        return redirect()->route('listing.index')
            ->with('success', 'Account created!');
    }
}
