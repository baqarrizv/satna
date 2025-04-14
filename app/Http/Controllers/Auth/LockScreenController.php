<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LockScreenController extends Controller
{
    // Show the lock screen page
    public function showLockScreen()
    {
        if (!session('is_locked')) {
            return redirect()->route('home');
        }

        return view('auth.lock-screen');
    }

    // Unlock the screen (verify the password)
    public function unlock(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            // If the password is correct, unlock the screen
            session(['is_locked' => false]);

            // Redirect to the intended URL if it exists, otherwise go to home
            $intendedUrl = session('lock_intended_url');
            if ($intendedUrl) {
                session()->forget('lock_intended_url');
                return redirect($intendedUrl);
            }
            
            return redirect()->route('home');
        } else {
            return back()->withErrors(['password' => 'Incorrect password.']);
        }
    }
    
    // Check if the session is expired
    public function checkSession(Request $request)
    {
        // Check if user is authenticated and if session is locked
        // Return 'expired: true' if NOT locked (session is valid/expired)
        // Return 'expired: false' if locked (need to redirect to lock screen)
        $isAuthenticated = Auth::check();
        $isLocked = session('is_locked', false);
        
        return response()->json([
            'expired' => !$isAuthenticated || !$isLocked
        ]);
    }
}
