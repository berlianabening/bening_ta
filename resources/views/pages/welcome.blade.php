@extends('layouts.welcome')

@section('body')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-md-4 mt-5">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title text-center">APLIKASI PENILAIAN KINERJA SEKURITI</h5>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <label for="identity">Username</label>
              <input type="text" class="form-control" name="identity" id="username" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <button type="submit" id="loginBtn" class="btn btn-primary w-100">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function(){

});
</script>
@endsection