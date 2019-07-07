@extends('layouts.dashboard')

@section('body')
<div class="container">
  <div class="row">
    <div class="col-12 mt-5">
      <h3 class="top_title">Data User</h3>
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
            <th>Kode</th>
            <th>Perusahaan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data->user as $x => $i)
            <tr>
              <td>{{$x+1}}</td>
              <td>{{$i->nomor}}</td>
              <td>{{$i->namauser}}</td>
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
                    <button class="dropdown-item">Detail</button>
                    <a class="dropdown-item" href="/satpam/insert/{{$i->id}}">Tambah Satpam</a>
                    <button class="dropdown-item" onclick="getDataUpdate({{$i->id}})">Update</button>
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

@include('_includes.add_user')
@endsection

@section('script')
<script>
  var headers = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  };

  var editMode = false;

  $(document).ready(function() {
    $("#addSubmit").on('click', function(){
      editMode = false;
      if (editMode == false) {
        $.ajax({
          url: `${host}/user`, // url where to submit the request
          headers: headers,
          type : "POST", // type of action POST || GET
          dataType : 'json', // data type
          data : $("#form-add-user").serialize(), // post data || get data
          success : function(result) {
            $('#form-add-user').each(function(){
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
      }
      else {
        
      }
    })
  });

  function updateStatus(id,status) {
    $.ajax({
      type: "PUT",
      url: `${host}/user/${id}`,
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

  function getDataUpdate(id) {
    $.getJSON(`${host}/user/${id}`, function( data ) {
      console.log(data);
      $("#nama").val(data.namauser);
      $("#nomor").val(data.nomor);
      $("#nomor").prop("readonly", true);
      $('#addModal').modal('show');
      editMode = true;
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