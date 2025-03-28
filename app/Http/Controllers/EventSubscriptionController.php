<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\UserEventSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventSubscriptionController extends Controller
{
    // Show available events to subscribe to
    public function show()
    {
        $events = Event::all();
        $userSubscriptions = Auth::user()->subscriptions()->get()->mapWithKeys(function ($subscription) {
            return [
                $subscription->pivot->event_id => [
                    'notify_via_mail' => $subscription->pivot->notify_via_mail,
                    'notify_via_one_signal' => $subscription->pivot->notify_via_one_signal,
                    'notify_via_database' => $subscription->pivot->notify_via_database,
                ]
            ];
        });
        
        return view('notifications.subscriptions', compact('events', 'userSubscriptions'));
    }

    // Subscribe or unsubscribe user to events
    public function update(Request $request)
    {
        $user = Auth::user();
        $selectedEvents = $request->input('events', []);
        $mailPreferences = $request->input('mail', []);
        $oneSignalPreferences = $request->input('one_signal', []);
        $databasePreferences = $request->input('database', []);
        
        foreach ($selectedEvents as $eventId) {
            $pivotData = [
                'notify_via_mail' => isset($mailPreferences[$eventId]),
                'notify_via_one_signal' => isset($oneSignalPreferences[$eventId]),
                'notify_via_database' => isset($databasePreferences[$eventId]),
            ];
        
            // Sync the pivot table data for the selected event
            $user->subscriptions()->syncWithoutDetaching([$eventId => $pivotData]);
        }    

        return redirect()->back()->with('success', 'Subscriptions updated successfully!');
    }
}
