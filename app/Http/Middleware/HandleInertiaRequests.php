<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'notifications' => fn (): array => $request->session()->get('notifications', []),
            'auth' => [
                'user' => $request->user(),
            ],
        ];
    }
}
