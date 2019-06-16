<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model 
{

    protected $table = 'booking';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function satpam()
    {
        return $this->hasMany('App\Satpam', 'satpam_id');
    }

}