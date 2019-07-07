<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Satpam;
use App\Booking;

class UserController extends Controller 
{
  public function __construct() {
    $this->main = new User;
  }

  public function index()
  {
    $data = (object) [
      'user' => User::where('role_id','=',2)->get(),
      'satpam' => Satpam::all()
    ];
    return view('pages.user',compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request['status'] = 1;
    $request['password'] = bcrypt($request['nomor']);
    $request['username'] = $request['nomor'];
    $request['role_id'] = 2;
    
    $this->main->create($request->all());

    return response()->json('Sukses');
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
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  public function update(Request $req, $id)
  {
    $main = $this->main->find($id);
    $main->update($req->all());

    return response()->json('ok');
  }

  public function destroy($id)
  {
    
  }

  public function get_satpam(Request $req, $id_user) {
    $satpam = Satpam::all();
    $booking = Booking::find($id_user);

    return view('pages.admin.insert_satpam', compact('satpam','booking'));
  }

  public function insert_satpam(Request $req, $id_user) {
    dd($req->all());
    $booking = Booking::create($req->all());
  }
}

?>