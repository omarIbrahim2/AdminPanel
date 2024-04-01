<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\UserLoginNotification;
use Carbon\Carbon;
use DateTime;
use DateTimeInterface;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Notification;

class User extends Authenticatable
{
    use HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Fname',
        "lname",
        "ipAdress",
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    public function formatCreatedAt($date): string
    {
        return Carbon::createFromDate($date)->format("D F Y");
    }

    public function isNotGuest(){
        $ResultRole = 0;
        foreach ($this->roles as $role) {
            $ResultRole = $role->id;
        }
        if ($ResultRole == 1 || $ResultRole == 2) {
            
            return true;
        }

        return false;
    }

    public function NotifyByLogin($ip){
        if ($ip != $this->ipAdress) {
            return;
        }
       //$this->notify(new UserLoginNotification);
    }
    
    
}
