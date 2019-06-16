<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satpam extends Model 
{

    protected $table = 'satpam';
    protected $guarded = ['id'];
    public $timestamps = true;

}