<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FAQRCode\Google2FA;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TwoFactorController extends Controller
{
    public function showSetupForm()
    {
        $google2fa = app('pragmarx.google2fa');

        $secret = $google2fa->generateSecretKey(16); 

        \Log::info('Generated 2FA Secret Key: ' . $secret . ' Length: ' . strlen($secret));

        // Generate a QR code
        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            Auth::user()->email,
            $secret
        );

        return view('2fa.setup', [
            'secret' => $secret,
            'QR_Image' => $QR_Image,
        ]);
    }

    public function enableGoogle2FA(Request $request)
    {
        $google2fa = app('pragmarx.google2fa');

        $otp = str_replace('-', '', $request->input('otp'));

        // Validate the OTP
        $valid = $google2fa->verifyKey($request->input('secret'), $otp);

        if ($valid) {
            Auth::user()->google2fa_secret = $request->input('secret');
            Auth::user()->save();

            return redirect()->route('2fa.setup')->with('success', 'Google Authenticator enabled.');
        }

        return redirect()->route('2fa.setup')->with('error', 'Invalid OTP.');
    }

    public function disableGoogle2FA()
    {
        Auth::user()->google2fa_secret = null;
        Auth::user()->save();

        return redirect()->route('2fa.setup')->with('success', 'Google Authenticator disabled.');
    }

    public function enableEmail2FA()
    {
        Auth::user()->email_2fa_enabled = true;
        Auth::user()->save();

        return redirect()->route('2fa.setup')->with('success', 'Email 2FA enabled.');
    }

    public function disableEmail2FA()
    {
        Auth::user()->email_2fa_enabled = false;
        Auth::user()->save();

        return redirect()->route('2fa.setup')->with('success', 'Email 2FA disabled.');
    }

    public function showChallengeForm()
    {
        return view('2fa.challenge');
    }

    public function verify2FA(Request $request)
    {
        $user = Auth::user();

        if ($user->google2fa_secret) {
            $google2fa = app('pragmarx.google2fa');
            
            $otp = str_replace('-', '', $request->otp);

            $valid = $google2fa->verifyKey($user->google2fa_secret, $otp);

            if ($valid) {
                $request->session()->put('2fa_passed', true);
                return redirect()->intended();
            }
        } elseif ($user->email_2fa_enabled) {
            // Email OTP validation logic here
        }

        return redirect()->route('2fa.challenge')->with('error', 'Invalid OTP.');
    }
}
