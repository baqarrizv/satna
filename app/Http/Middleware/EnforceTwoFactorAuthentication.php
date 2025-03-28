<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnforceTwoFactorAuthentication
{
    public function handle(Request $request, Closure $next)
    {
        // Fetch 2FA settings from the config (populated from the database)
        $enable_2fa = config('settings.enable_2fa');
        $require_2fa_for_users = config('settings.require_2fa_for_users');

        // Check if 2FA is enabled globally
        if ($enable_2fa) {
            $user = Auth::user();

            // If 2FA is required for all users and the user hasn't set it up, redirect to 2FA setup
            if ($require_2fa_for_users && !$user->hasTwoFactorEnabled()) {
                return redirect()->route('2fa.setup')->with('error', 'Two-Factor Authentication (2FA) is required.');
            }
            // If 2FA is optional but enabled for the user, check if 2FA session is passed
            if ($user->hasTwoFactorEnabled() && !$request->session()->has('2fa_passed')) {
                return redirect()->route('2fa.challenge');
            }
        }

        return $next($request);
    }
}
