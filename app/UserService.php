<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_services';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['service_id', 'user_id'];

    
}
