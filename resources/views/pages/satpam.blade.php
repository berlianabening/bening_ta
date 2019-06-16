@extends('layouts.dashboard')

@section('body')
<div class="container">
  <div class="row">
    <div class="col-12 mt-5">
      <h3>Data Satpam</h3>
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
            <th>No. Induk</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($satpam as $x => $i)
            <tr>
              <td>{{$x+1}}</td>
              <td>{{$i->no_induk}}</td>
              <td>{{$i->nama}}</td>
              <td>
                <select class="custom-select">
                  <option value="1" {{ ($i->status == 1) ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ ($i->status == 0) ? 'selected' : '' }}>Inactive</option>
                </select>
              </td>
              <td>aksi</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection