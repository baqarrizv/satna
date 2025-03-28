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

            return redirect()->route('home');  // or the previous page
        } else {
            return back()->withErrors(['password' => 'Incorrect password.']);
        }
    }
}
