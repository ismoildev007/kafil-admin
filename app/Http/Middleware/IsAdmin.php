<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        $user = auth()->user();

        if ($user && $user->role === 'admin') {
            return $next($request);
        }

        // If the user is not authenticated, redirect to the login page
        if ($user === null) {
            return redirect()->route('login'); // Corrected 'intend' to 'intended'
        }

        // If the user is authenticated but not an admin
        return abort(403, 'You are not allowed to enter this information');
    }
}
