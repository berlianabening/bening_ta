<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiNormalisasi extends Model
{
  protected $table = 'nilai_normalisasi';
  protected $guarded = ['id'];

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function satpams()
  {
    return $this->belongsTo('App\Satpam', 'satpam');
  }
}
