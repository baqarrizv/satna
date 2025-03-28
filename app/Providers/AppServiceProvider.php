<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Observers\ActivityLoggerObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {    
        Schema::defaultStringLength(191);
        $modelPath = app_path('Models'); // Path to your Models directory
        $modelFiles = File::allFiles($modelPath);
    
        foreach ($modelFiles as $file) {
            $modelClass = 'App\\Models\\' . $file->getFilenameWithoutExtension();
            if (class_exists($modelClass)) {
                $modelClass::observe(ActivityLoggerObserver::class);
            }
        }
    
        View::composer(['layouts.topbar','layouts.footer-mobile'], function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $totalUnreadNotifications = $user->unreadNotifications()->count();
                $notifications = $user->notifications()->limit(5)->get(); // Limit to 5 for performance
                
                $view->with('totalUnreadNotifications', $totalUnreadNotifications)
                        ->with('notifications', $notifications);
            }
        });
    }
}
