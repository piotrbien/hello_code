<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use App\Services\Flasher;
use Cassandra\Type\UserType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
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
        Gate::authorize('viewAny', User::class);

        $users = User::paginate(25)->onEachSide(1);

        return Inertia::render('User/Index', [
            'users' => $users,
        ]);
    }

    public function create(): Response
    {
        Gate::authorize('create', User::class);

        return Inertia::render('User/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        Gate::authorize('create', User::class);

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
        Gate::authorize('create', $user);

        return Inertia::render('User/Edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        Gate::authorize('create', $user);

        $data = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'nullable|min:8',
            'avatar' => 'nullable|uuid',
            'role' => [
                'required',
                Rule::in(UserRole::cases()),
            ],
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        $this->flasher->success("User [{$user->email}] updated successfully!");

        return Redirect::route('users.index');
    }
}
