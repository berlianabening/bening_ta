<?php

namespace App\Helpers;
use DB;
use App\NilaiAwal;
use App\NilaiNormalisasi;
use App\Booking;

class Berliana {
  //variabel nilai kriteria
  public function nilaiKriteria() {
    $data = [
      'tm' => 0,
      'km' => 0.25,
      'c' => 0.5,
      'b' => 0.75,
      'sb' => 1
    ];
    return $data;
  }

  //varibel bobot kriteria
  public function bobotKriteria() {
    $data = (object) [
      'c1' => 0.2,
      'c2' => 0.25,
      'c3' => 0.25,
      'c4' => 0.15,
      'c5' => 0.15
    ];

    return $data;
  }

  public function normalisasiMatriks($data) {
    $booking = new Booking;
    $nilai_awal = new NilaiAwal;
    $nilai_normalisasi = new NilaiNormalisasi;
    $kriterias = DB::table('kriteria')->all();

    $satpams = $booking->where('user_id','=',2);

    foreach ($satpams as $satpam) {
      foreach($kriterias as $kriteria) {
        $x = $nilai_awal->where('user_id','=',2)
        ->where('satpam','=',$satpam->id)
        ->where('kriteria','=',$kriteria->id)->get();
      }
    }

    dd($data);
  }
}