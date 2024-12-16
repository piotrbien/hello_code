<?php

namespace App\Http\Middleware;

use App\Enums\FlashType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        if (!$user || !$user->banned_at) {
            return $next($request);
        }

        Auth::logout();

        return redirect()->route('login')->with([
            'notifications' => [
                [
                    'type' => FlashType::DANGER,
                    'message' => 'Your account is permanently banned.',
                ],
            ],
        ]);
    }
}
