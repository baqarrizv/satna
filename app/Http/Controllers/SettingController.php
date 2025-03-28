<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    protected $fileUploadService;

    /**
     * Constructor to inject the FileUploadService.
     *
     * @param FileUploadService $fileUploadService
     */
    public function __construct(FileUploadService $fileUploadService)
    {
        // Injecting FileUploadService for handling file uploads.
        $this->fileUploadService = $fileUploadService;
    }
    
    /**
     * Show the settings edit form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Fetch the first (and only) row of settings from the database.

        $setting = Cache::remember('app_settings', 60, function () {
            return Setting::first() ?? new Setting();
        });

        // Return the settings edit view with the settings data.
        return view('settings.edit', compact('setting'));
    }

    /**
     * Update the settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validate the incoming request data for settings update.
        $request->validate([
            'title' => 'nullable|string|max:255',    // Title is optional, should be a string, max length 255
            'description' => 'nullable|string',      // Description is optional, should be a string
            'logo_light' => 'nullable|string|max:255', // Light logo is optional, max length 255
            'logo_dark' => 'nullable|string|max:255',  // Dark logo is optional, max length 255
            'fav_icon' => 'nullable|string|max:255',   // Favicon is optional, max length 255
            'phone' => 'nullable|string|max:255',      // Phone number is optional, max length 255
            'email' => 'nullable|email|max:255',       // Email should be a valid email, max length 255
            'smtp_email' => 'nullable|email|max:255',  // SMTP email should be valid, max length 255
            'smtp_password' => 'nullable|string|max:255', // SMTP password is optional, max length 255
            'smtp_host' => 'nullable|string|max:255',  // SMTP host is optional, max length 255
            'smtp_port' => 'nullable|integer',         // SMTP port should be an integer
            'encryption' => 'nullable|in:None,SSL,TLS',// Encryption must be one of None, SSL, or TLS
            'enable_push_notifications' => 'nullable|boolean',
            'onesignal_app_id' => 'nullable|string|max:255',
            'onesignal_api_key' => 'nullable|string|max:255',
            'enable_email_notifications' => 'nullable|boolean',
            'enable_2fa' => 'nullable|boolean',
            'require_2fa_for_users' => 'nullable|boolean',
        ]);
    
        $setting = Cache::remember('app_settings', 60, function () {           
            // Fetch the first settings row or create a default one if none exists.
            return Setting::firstOrCreate([], [
                'title' => 'Default Title', // Default title if creating new settings record
                'description' => 'Default Description' // Default description if creating new settings record
            ]);            
        });
    
        // Handle file uploads (moving from temp to final location) for logos and favicon.
        $newLogoLight = $this->fileUploadService->handleFileUpdate($request->logo_light, $setting->logo_light, 'settings');
        $newLogoDark = $this->fileUploadService->handleFileUpdate($request->logo_dark, $setting->logo_dark, 'settings');
        $newFavIcon = $this->fileUploadService->handleFileUpdate($request->fav_icon, $setting->fav_icon, 'settings');
    
        // Update the settings with the new data provided in the request.
        $setting->update([
            'title' => $request->title,  // Update the title if provided
            'description' => $request->description, // Update the description if provided
            'logo_light' => $newLogoLight, // Update the light logo path after file move
            'logo_dark' => $newLogoDark,   // Update the dark logo path after file move
            'fav_icon' => $newFavIcon,     // Update the favicon path after file move
            'phone' => $request->phone,    // Update the phone number if provided
            'email' => $request->email,    // Update the email if provided
            'smtp_email' => $request->smtp_email,  // Update the SMTP email if provided
            // Encrypt the SMTP password if a new one is provided; otherwise, keep the old one
            'smtp_password' => $request->smtp_password ? Crypt::encryptString($request->smtp_password) : $setting->smtp_password,
            'smtp_host' => $request->smtp_host, // Update the SMTP host if provided
            'smtp_port' => $request->smtp_port, // Update the SMTP port if provided
            'encryption' => $request->encryption, // Update the encryption type if provided
            'enable_push_notifications' => $request->enable_push_notifications ?? 0,
            'onesignal_app_id' => $request->onesignal_app_id,
            'onesignal_api_key' => $request->onesignal_api_key,
            'enable_email_notifications' => $request->enable_email_notifications ?? 0,
            'enable_2fa' => $request->enable_2fa ?? 0,
            'require_2fa_for_users' => $request->require_2fa_for_users ?? 0,
        ]);
    
        // Clear the cache so the new settings will be fetched
        Cache::forget('app_settings');

        // Redirect back to the settings page with a success message.
        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
