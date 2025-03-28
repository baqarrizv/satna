<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{    
    use HasFactory;
    
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(UserEventSubscription::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_event_subscriptions');
    }

    public static function findByName($name)
    {
        return self::where('name', $name)->first();
    }
}
