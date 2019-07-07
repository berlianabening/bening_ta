@extends('layouts.dashboard')

@section('body')
<div class="container">
  <div class="row">
    <div class="col-12 mt-5">
      <h3>Data Satpam</h3>
    </div>
    <div class="col-12 mt-5">
      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addModal">Tambah</button>
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
              <td class="text-center">
                @if ($i->status == 1)
                <button class="btn btn-sm btn-success" onclick="updateStatus({{$i->id}},'0')">Active</button>
                @else
                <button class="btn btn-sm btn-danger" onclick="updateStatus({{$i->id}},'1')">Inactive</button>
                @endif
              </td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                    Action
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Update</a>
                    <button class="dropdown-item" onclick="deleteData({{$i->id}})">Delete</button>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@include('_includes.add_satpam')
@endsection

@section('script')
<script>
  var headers = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  };

  $(document).ready(function(){
    $("select.active-status").change(function(){
        var selectedItem = $(this).children("option:selected").val();
        var arr = selectedItem.split(',');
        updateStatus(arr[0],arr[1]);
    });

    $("#addSubmit").on('click', function(){
      // send ajax
      $.ajax({
        url: `${host}/satpam`, // url where to submit the request
        headers: headers,
        type : "POST", // type of action POST || GET
        dataType : 'json', // data type
        data : $("#form-add-satpam").serialize(), // post data || get data
        success : function(result) {
          $('#form-add-satpam').each(function(){
            this.reset()
          })
          $('#addModal').modal('hide')
          console.log(result)
          location.reload()
        },
        error: function(xhr, resp, text) {
          console.log(xhr, resp, text);
        }
      })
    });
  });

  function updateStatus(id,status) {
    $.ajax({
      type: "PUT",
      url: `${host}/satpam/${id}`,
      headers: headers,
      data: JSON.stringify({ status: status }),
      contentType: "application/json",
      dataType: "json",
      success: function(data){
        location.reload();
      },
      failure: function(errMsg) {
        alert(errMsg);
      }
    });
  }

  function deleteData(id) {
    $.ajax({
      url: `${host}/satpam/${id}`, // url where to submit the request
      headers: headers,
      type : "DELETE", // type of action POST || GET
      dataType : 'json', // data type
      success : function(result) {
        location.reload()
      },
      error: function(xhr, resp, text) {
        console.log(xhr, resp, text);
      }
    })
  }
</script>
@endsection