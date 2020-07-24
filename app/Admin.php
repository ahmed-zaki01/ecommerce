<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUsernameAttribute($value)
    {
        return ucwords($value);
    } // end of get uppercase username

    public function getCreatedAtAttribute($value)
    {
        return date("Y-m-d H:i:s", strtotime($value));
    }
}
