<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
	use Notifiable;

    protected $table = 'admins';
    protected $guarded = ['id'];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
