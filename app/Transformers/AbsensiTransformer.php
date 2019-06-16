<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use App\Absensi;

class AbsensiTransformer extends TransformerAbstract
{
  public function transform(Absensi $absensi)
  {
    return [
      'id' => $absensi->id,
      'user' => [
        'id' => $absensi->user_id,
        'nama_user' => $absensi->user->namauser
      ],
      'satpam' => [
        'id' => $absensi->satpam_id,
        'nomor_induk' => $absensi->satpam->nomor_induk,
        'nama' => $absensi->satpam->nama
      ]
    ];
  }
}
