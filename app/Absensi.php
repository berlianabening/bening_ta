<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model 
{
  protected $table = 'absensi';
  protected $guarded = ['id'];
  public $timestamps = true;

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function satpam()
  {
    return $this->belongsTo('App\Satpam', 'satpam_id');
  }

}