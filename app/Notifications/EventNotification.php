<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage; // For email
use Illuminate\Notifications\Messages\DatabaseMessage; // For database
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;

class EventNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $event;
    protected $title;
    protected $message;
    protected $url;

    public function __construct($event, $title, $message, $url=null)
    {
        $this->event = $event;
        $this->title = $title;
        $this->message = $message;
        $this->url = $url;
    }

    public function via($notifiable)
    { 
        // Get the user's event subscription to check their notification preferences
        $subscription = $notifiable->subscriptions()->where('event_id', $this->event->id)->first();
        
        $channels = [];
        
        if ($subscription && $subscription->pivot->notify_via_mail) {
            $channels[] = 'mail';
        }
        if ($subscription && $subscription->pivot->notify_via_one_signal) {
            $channels[] = OneSignalChannel::class;
        }
        if ($subscription && $subscription->pivot->notify_via_database) {
            $channels[] = 'database';
        }
        return $channels;
    }

    // Notification via email
    public function toMail($notifiable)
    {
        $mailMessage = (new MailMessage)
                    ->subject($this->title)
                    ->line($this->message);
        
        // Conditionally add a button link if a URL is available
        if (!is_null($this->url)) {
            $mailMessage->action('View Details', $this->url);  // 'View Details' is the button text
        }

        return $mailMessage;
    }

    public function toOneSignal($notifiable)
    {
        $oneSignalMessage = OneSignalMessage::create()
            ->setSubject($this->title)
            ->setBody($this->message);

        if (!is_null($this->url)) {
            $logo = config('settings.logo_light');
            $oneSignalMessage->setUrl($this->url)
            ->webButton(
                OneSignalWebButton::create('link-1')
                    ->text('Open Link')
                    ->icon($logo)
                    ->url($this->url)
            );       
        }
        return $oneSignalMessage;
    }

    // Notification via database
    public function toDatabase($notifiable)
    {
        $databaseMessage = [
            'title' => $this->title,
            'message' => $this->message,
        ];
        
        if (!is_null($this->url)) {
            $databaseMessage['url'] = $this->url;
        }

        return $databaseMessage;
    }
}
