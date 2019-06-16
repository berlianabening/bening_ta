@extends('layouts.dashboard')

@section('body')
<div class="container">
  <div class="row">
    <div class="col-12 mt-5">
      <h3 class="top_title">Data User</h3>
    </div>
    <div class="col-12 mt-5">
      <btn class="btn btn-sm btn-primary">Tambah</btn>
      <div class="float-right">
        <input class="form-control form-control-sm" type="text" name="search" id="search" placeholder="Search...">
      </div>
    </div>
    <div class="col-12 mt-3">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No.</th>
            <th>Kode</th>
            <th>Perusahaan</th>
            <th>Status</th>
            <th>Aksi</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data->user as $x => $i)
            <tr>
              <td>{{$x+1}}</td>
              <td>{{$i->nomor}}</td>
              <td>{{$i->namauser}}</td>
              <td>
                @if ($i->status == 1)
                  <button class="btn btn-sm btn-primary">Active</button>
                @else
                  <button class="btn btn-sm btn-danger">Inactive</button>
                @endif
              </td>
              <td>aksi</td>
              <td><button class="btn btn-info btn-sm">Detail</button></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection