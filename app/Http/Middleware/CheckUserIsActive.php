<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CheckUserIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->is_active) {
            // Log out the user if they are inactive
            Auth::logout();

            // Redirect to login page with an error message
            return redirect()->route('login')->withErrors([
                'email' => 'Your account is inactive. Please contact support.'
            ]);
        }

        return $next($request);
    }
}
