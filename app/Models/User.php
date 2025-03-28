<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
        'is_active',
        'email_2fa_enabled',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subscriptions()
    {
        return $this->belongsToMany(Event::class, 'user_event_subscriptions')
        ->withPivot('notify_via_mail', 'notify_via_one_signal', 'notify_via_database') // Include pivot columns
        ->withTimestamps(); // Include timestamps if needed
    }
    
    public function routeNotificationForOneSignal()
    {
        return ['include_external_user_ids' => [(string) $this->id]];        	
    } 
    
    public function hasTwoFactorEnabled()
    {
        return !empty($this->google2fa_secret); // Adjust field name if different
    }
}
