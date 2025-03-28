<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        // Check if the authenticated user has the permission to view all logs
        if (Auth::user()->can('All User Activity Logs')) {
            // User has permission, fetch all activity logs
            $activities = Activity::latest()->paginate(10);
        } else {
            // User doesn't have permission, only fetch their own logs
            $activities = Activity::where('causer_id', Auth::id())->latest()->paginate(10);
        }

        // If it's an AJAX request (for infinite scroll), return the logs as JSON for the next page
        if ($request->ajax()) {
            return view('activity_logs.partials.logs', compact('activities'))->render();
        }

        // Otherwise, return the view with the initial page of logs
        return view('activity_logs.index', compact('activities'));
    }
}
