@extends('layouts.dashboard')

@section('body')
<div class="container">
  <div class="row">
    <div class="col-12 mt-5">
      <h3 class="top_title">Data Penilaian</h3>
    </div>
    <div class="col-12 mt-5">
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
            <th>K1</th>
            <th>K2</th>
            <th>K3</th>
            <th>K4</th>
            <th>K5</th>
            <th>Hasil</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($result as $x => $i)
            <tr>
              <td>{{$x+1}}</td>
              <td>{{$i->satpams->no_induk}}</td>
              <td>{{$i->satpams->nama}}</td>
              @php
              $kriteria = explode(',',$i->nilai_normalisasi);
              @endphp
              {{-- <td>{{ ($kriteria[0]) }}</td>
              <td>{{ ($kriteria[1]) }}</td>
              <td>{{ ($kriteria[2]) }}</td>
              <td>{{ ($kriteria[3]) }}</td>
              <td>{{ ($kriteria[4]) }}</td> --}}
              <td>{{ round($kriteria[0],2) }}</td>
              <td>{{ round($kriteria[1],2) }}</td>
              <td>{{ round($kriteria[2],2) }}</td>
              <td>{{ round($kriteria[3],2) }}</td>
              <td>{{ round($kriteria[4],2) }}</td>
              <td>{{ round($i->total,2) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection