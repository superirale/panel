<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beautician extends Model
{
    protected $table = 'users';
    protected $guarded = ['id'];


    public function images()
    {
    	return $this->hasMany('App\BeauticianImage', 'user_id');
    }
}
