<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfLocked
{
    public function handle($request, Closure $next)
    {
        // Only check for lock if user is authenticated
        if (Auth::check() && session('is_locked', false)) {
            // Skip redirects for the already-allowed routes
            $currentRouteName = $request->route()->getName();
            $currentPath = $request->path();
            
            // Allowed routes that should be accessible even when locked
            $allowedRoutes = ['lock-screen', 'unlock-screen', 'check.session', 'logout'];
            
            // Also check the path directly for POST to /unlock
            if ($request->method() === 'POST' && $currentPath === 'unlock') {
                return $next($request);
            }
            
            // If we're not on an allowed route, redirect to lock screen
            if (!in_array($currentRouteName, $allowedRoutes)) {
                // Store the current URL in the session for later redirection
                session(['lock_intended_url' => $request->fullUrl()]);
                return redirect()->route('lock-screen');
            }
        }

        return $next($request);
    }
}
