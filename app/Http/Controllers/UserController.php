<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Flasher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Redirect;

class UserController
{
    public function __construct(
        private readonly Flasher $flasher,
    ) {
        //
    }

    public function index(): Response
    {
        $users = User::paginate(50)->onEachSide(1);

        return Inertia::render('User/Index', [
            'users' => $users->toArray(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('User/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = User::create($request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:8',
            'avatar' => 'nullable|uuid',
        ]));

        $this->flasher->success("User [{$user->email}] created successfully!");

        return Redirect::route('users.index');
    }

    public function edit(User $user): Response
    {
        return Inertia::render('User/Edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'nullable|min:8',
            'avatar' => 'nullable|uuid',
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        $this->flasher->success("User [{$user->email}] updated successfully!");

        return Redirect::route('users.index');
    }
}
