<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfLocked
{
    public function handle($request, Closure $next)
    {
        if (session('is_locked', false) && Auth::check()) {
            return redirect()->route('lock-screen');
        }

        return $next($request);
    }
}
