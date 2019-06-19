<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Berliana;
use App\Satpam;
use App\User;
use App\NilaiAwal;

class PenilaianController extends Controller 
{

  public function index(Penilaian $penilaian)
  {
    
  }

  public function store(Request $req, Penilaian $penilaian)
  {
    $data_nilai = $penilaian->all();
    $berliana = new Berliana();
    $result = $berliana->normalisasiMatriks($data_nilai);
    return null;
  }

  public function nilai(Request $req, NilaiAwal $nilai_awal)
  {
    $data_nilai = $nilai_awal->all();
    $berliana = new Berliana();
    $result = $berliana->normalisasiMatriks($data_nilai);
    return ['null'];
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
  public function fuzzy ($data) {
    // if ($n <= 90) {

    // }
    // elseif ($n > 90 && $n < 92) {

    // }
    if ($nilai <= 90) {
			$result['ket'] = 'Buruk';
			$result['num'] = 1;
		}
		elseif ($nilai > 90 && $nilai < 92)
		{
			$tm = (92-$nilai)/(92-90);
			$km = ($nilai-90)/(92-90);
			if ($tm > $km) {
				$result['ket'] = 'Tidak Memuaskan';
				$result['num'] = $tm;
			}
			else {
				$result['ket'] = 'Kurang Memuaskan';
				$result['num'] = $km;
			}
    }
    elseif ($nilai > 90 && $nilai < 92)
		{
			$km = (94-$nilai)/(94-92);
			$c = ($nilai-92)/(94-92);
			if ($km > $c) {
				$result['ket'] = 'Kurang Memuaskan';
				$result['num'] = $km;
			}
			else {
				$result['ket'] = 'Cukup';
				$result['num'] = $c;
			}
    }
    elseif ($nilai > 94 && $nilai < 96)
		{
			$c = (96-$nilai)/(96-94);
			$b = ($nilai-94)/(96-94);
			if ($c > $b) {
				$result['ket'] = 'Cukup';
				$result['num'] = $c;
			}
			else {
				$result['ket'] = 'Baik';
				$result['num'] = $b;
			}
    }
    elseif ($nilai > 96 && $nilai < 98)
		{
			$b = (98-$nilai)/(98-96);
			$sb = ($nilai-96)/(98-96);
			if ($b > $sb) {
				$result['ket'] = 'Baik';
				$result['num'] = $b;
			}
			else {
				$result['ket'] = 'Sangat Baik';
				$result['num'] = $sb;
			}
    }
    elseif ($nilai == 92)
		{
			$result['ket'] = 'Kurang Memuaskan';
			$result['num'] = 1;
    }
    elseif ($nilai == 94)
		{
			$result['ket'] = 'Cukup';
			$result['num'] = 1;
    }
    elseif ($nilai == 96)
		{
			$result['ket'] = 'Baik';
			$result['num'] = 1;
    }
    else {
			$result['ket'] = 'Sangat Baik';
			$result['num'] = 1;
    }
    
  }
}

?>