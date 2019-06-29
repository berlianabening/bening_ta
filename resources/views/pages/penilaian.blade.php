@extends('layouts.dashboard')

@section('body')
<div class="container">
  <div class="row">
    <div class="col-12 mt-5">
      <h3 class="top_title">Data Penilaian</h3>
    </div>
    <div class="col-12 col-md-3">
      <select class="custom-select custom-select-sm" name="user" id="user">
        @foreach ($user as $x => $i)
          <option value="{{$i->id}}">{{$i->namauser}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-12 mt-5">
      <div class="float-left d-inline-block">
        <select class="custom-select custom-select-sm" name="user" id="user">
          <option selected>Bulan</option>
          @foreach ($user as $x => $i)
            <option value="{{$i->id}}">{{$i->namauser}}</option>
          @endforeach
        </select>
      </div>
      <div class="float-left d-inline-block ml-3">
        <select class="custom-select custom-select-sm" name="user" id="user">
          <option selected>Tahun</option>
          @foreach ($user as $x => $i)
            <option value="{{$i->id}}">{{$i->namauser}}</option>
          @endforeach
        </select>
      </div>
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
            <th>Hadir</th>
            <th>Ijin</th>
            <th>Alpa</th>
            <th>Total (%)</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($result as $x => $i)
            <tr>
              <td>{{$x+1}}</td>
              <td>{{$i->satpam->no_induk}}</td>
              <td>{{$i->satpam->nama}}</td>
              <td>{{$i->h}}</td>
              <td>{{$i->i}}</td>
              <td>{{$i->a}}</td>
              <td>{{$i->total}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection