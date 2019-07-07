@extends('layouts.dashboard')

@section('body')
<div class="container">
  <div class="row justify-content-center mt-5">

    <div class="col-12 col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title text-center">Pilih Satpam</h5>
          <form action="/" method="post">
            <div class="m-3" style="height:400px;overflow-y: auto;">
              @foreach ($satpam as $x => $i)
              <div class="form-check form-check-inline mb-2">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> {{'Display value  ke-'.$i}}
                </label>
              </div>
              @endfor
            </div>
            <button type="submit" class="btn btn-primary w-100">Save</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title text-center">Satpam Terpilih</h5>
          <form action="/" method="post">
            <div class="m-3" style="height:400px;overflow-y: auto;">
              @foreach ($i = 0; $i < 10; $i++)
              <div class="form-check form-check-inline mb-2">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> {{'Display value  ke-'.$i}}
                </label>
              </div>
              @endfor
            </div>
            <button type="submit" class="btn btn-danger w-100">Hapus</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection