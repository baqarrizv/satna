<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Spatie\Activitylog\Models\Activity;
use Detection\MobileDetect;
use Illuminate\Support\Facades\Http;

class LogAuthenticationActivity
{
    protected $mobileDetect;

    public function __construct()
    {
        $this->mobileDetect = new MobileDetect();
    }

    /**
     * Handle the event.
     *
     * @param  mixed  $event
     * @return void
     */
    public function handle($event)
    {
        $ipAddress = request()->ip();
        $userAgent = request()->userAgent();
        $device = $this->getDeviceType($userAgent);
        $location = $this->getLocationFromIp($ipAddress); // Geolocation API call

        // Prepare additional properties
        $properties = [
            'ip' => $ipAddress,
            'browser' => $this->getBrowser($userAgent),
            'device' => $device,
            'os' => $this->getOS($userAgent),
            'location' => $location,
            'user_agent' => $userAgent,
        ];

        // Handle login event
        if ($event instanceof Login) {
            activity()
                ->causedBy($event->user)
                ->withProperties(array_merge($properties, ['event' => 'login'])) // Add event as a property
                ->log('User logged in');
        }

        // Handle logout event
        if ($event instanceof Logout) {
            activity()
                ->causedBy($event->user)
                ->withProperties(array_merge($properties, ['event' => 'logout'])) // Add event as a property
                ->withProperties($properties)
                ->log('User logged out');
        }
    }

    // Function to get the device type (desktop, mobile, tablet)
    protected function getDeviceType($userAgent)
    {
        $this->mobileDetect->setUserAgent($userAgent);

        if ($this->mobileDetect->isMobile()) {
            return 'Mobile';
        } elseif ($this->mobileDetect->isTablet()) {
            return 'Tablet';
        } else {
            return 'Desktop';
        }
    }

    // Function to get browser information from the user agent
    protected function getBrowser($userAgent)
    {
        if (strpos($userAgent, 'Firefox') !== false) {
            return 'Firefox';
        } elseif (strpos($userAgent, 'Chrome') !== false) {
            return 'Chrome';
        } elseif (strpos($userAgent, 'Safari') !== false) {
            return 'Safari';
        } elseif (strpos($userAgent, 'Edge') !== false) {
            return 'Edge';
        } elseif (strpos($userAgent, 'Opera') !== false) {
            return 'Opera';
        }
        return 'Unknown';
    }

    // Function to get OS information from the user agent
    protected function getOS($userAgent)
    {
        if (preg_match('/Windows/i', $userAgent)) {
            return 'Windows';
        } elseif (preg_match('/Mac/i', $userAgent)) {
            return 'MacOS';
        } elseif (preg_match('/Linux/i', $userAgent)) {
            return 'Linux';
        } elseif (preg_match('/Android/i', $userAgent)) {
            return 'Android';
        } elseif (preg_match('/iPhone/i', $userAgent)) {
            return 'iOS';
        }
        return 'Unknown';
    }

    // Function to get location from IP using a geolocation API (example: ip-api.com)
    protected function getLocationFromIp($ip)
    {
        if ($ip == '127.0.0.1') {

            return 'Localhost';
        }
        // Example API request to get location based on IP
        $response = Http::get("http://ip-api.com/json/{$ip}");

        if ($response->successful()) {
            $data = $response->json();
            return "{$data['city']}, {$data['regionName']}, {$data['country']}";
        }

        return 'Unknown Location';
    }
}
