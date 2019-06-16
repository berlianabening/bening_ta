<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satpam;

class SatpamController extends Controller 
{

  public function index(Satpam $satpam)
  {
    $satpam = $satpam->all();
    return view('pages.satpam',compact('satpam'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request, Satpam $satpam)
  {
    $satpam->create($request->only(['no_induk','nama','status']));

    return response()->json('Sukses');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show(Satpam $satpam)
  {
    return response()->json($satpam);    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Satpam $satpam)
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
  
}

?>