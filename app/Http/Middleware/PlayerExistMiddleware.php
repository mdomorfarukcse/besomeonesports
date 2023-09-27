<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PlayerExistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the authenticated user has the "player" role
        $user = Auth::user();
        if ($user && $user->hasRole('player')) {
            // User has the "player" role, check for the one-to-one relationship with a player
            if ($user->player) {
                // User has a player relationship, allow access to the requested page
                return $next($request);
            } else {
                // User does not have a player relationship, redirect to the update-profile page
                return redirect()->route('administration.player.new.index');
            }
        }

        // For users with roles other than "player," allow unrestricted access to any route
        return $next($request);
    }
}
