<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'campaigns';

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
    protected $fillable = ['name', 'schedule_date', 'type'];

    public function message()
    {
        return $this->belongsToMany('App\Message', 'campaign_messages');
    }

    public function lists()
    {
        return $this->belongsToMany('App\ContactList', 'campaign_lists', 'campaign_id', 'list_id');
    }

    public function templates()
    {
        return $this->belongsToMany('App\Template', 'campaign_templates');
    }


}
