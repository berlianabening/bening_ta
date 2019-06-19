<?php

namespace App\Helpers;
use App\kriteria;
use App\NilaiAwal;
use App\NilaiNormalisasi;
use App\Booking;
use DB;

class Berliana {
  //varibel bobot kriteria
  public function bobotKriteria() {
    $data = Kriteria::all();

    return $data;
  }

  public function normalisasiMatriks($data) {
    $nilai_awal = [];
    $nilai_normalisasi = [];
    $total = 0.0;
    $kriterias = $this->bobotKriteria(); // get semua kriteria

    $satpams = Booking::where('user_id','=',2)->get(); // get semua satpam pada user x

    foreach ($satpams as $satpam) {

      foreach($kriterias as $kriteria) {
        $x = NilaiAwal::where('user_id','=',2)
        ->where('satpam','=',$satpam->satpam_id)
        ->where('kriteria','=',$kriteria->id)
        ->where('created_at','like','%2019-06-16%')->first();

        $xmax = DB::table('nilai_awal')->where([
          ['user_id','=',2],
          ['kriteria','=',$kriteria->id]
        ])->pluck('nilai')->toArray();
        
        $normal = $x->nilai/max($xmax); // hasil nilai normalisasi
        $nilai_awal[] = $x->nilai; // menyimpan nilai awal
        $nilai_normalisasi[] = $normal; // menyimpan nilai normalisasi

        $total += ($normal*$kriteria->bobot); // menghitung total
      }

      $tmp[] = $total;
      $total = 0.0;
      // $normalisasi_create = NilaiNormalisasi::create([
      //   'user_id' => 2,
      //   'satpam' => $satpam->satpam_id,
      //   'nilai_awal' => implode(',',$nilai_awal),
      //   'nilai_normalisasi' => implode(',',$nilai_normalisasi)
      // ]);

      // NilaiAwal::where([
      //   ['user_id','=',2],
      //   ['satpam','=',$satpam->satpam_id],
      //   ['created_at','like','%2019-06-16%']
      // ])->delete();

    }
    arsort($tmp);
    dd($tmp);
  }
}