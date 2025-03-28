<?php

namespace App\Services;

use App\Models\Event;
use App\Notifications\EventNotification;

class EventNotificationService
{
    public static function notifyEventByName($eventName)
    {
        // Find the event by name
        $event = Event::findByName($eventName);
        if (!$event) {
            return; // Event not found, exit or handle error
        }

        // Retrieve event details
        $title = $event->name;
        $message = $event->description;

        // Ensure URL has base URL
        $url = url($event->url); // Adds the base URL to the event-specific URL

        // Get all users subscribed to this event
        $subscribedUsers = $event->users;

        // Trigger notification for each subscribed user
        foreach ($subscribedUsers as $user) {
            $user->notify(new EventNotification($event, $title, $message, $url));
        }
    }
}
