<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserNotification;


class NotificationController extends Controller
{
    // Show notifications for the user
    public function index()
    {
        $notificationsList = Auth::user()->notifications()->get();
        return view('notifications.index', compact('notificationsList'));   

    }

    // Mark a notification as read
    public function markAsRead($id)
    {
        $userNotification = Auth::user()->notifications()->where('id', $id)->first();

        if ($userNotification) {
            $userNotification->markAsRead();  // Using the built-in markAsRead() method
        }

        return redirect()->back()->with('success', 'Notification marked as read.');
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();  // Marks all unread notifications as read

        return redirect()->back()->with('success', 'All notifications marked as read.');
    }

}
