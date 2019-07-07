<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satpam;
use Auth;

class SatpamController extends Controller 
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(Satpam $satpam)
  {
    if (Auth::user()->role_id == 1) {
      $satpam = $satpam->all();
    }
    else {
      $satpam = $satpam
      ->join('booking','booking.satpam_id','=','satpam.id')
      ->where('booking.user_id','=',Auth::user()->id)
      ->get();
    }

    return view('pages.satpam',compact('satpam'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request, Satpam $satpam)
  {
    $request['status'] = 1;
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
  public function update(Satpam $satpam, Request $req)
  {
    $satpam->update($req->all());
    return response()->json($req->all());
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Satpam $satpam)
  {
    $satpam->delete();
    return response()->json('ok');
  }
  
}

?>