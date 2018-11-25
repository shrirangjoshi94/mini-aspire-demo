<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'signup_role'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
