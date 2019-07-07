<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-add-user">
          <div class="form-group">
            <label for="nomor">Kode</label>
            <input type="text" name="nomor" class="form-control" id="nomor" placeholder="Nomor Induk">
          </div>
          <div class="form-group">
            <label for="nama">Nama Perusahaan</label>
            <input type="text" name="namauser" class="form-control" id="nama" placeholder="Nama Lengkap">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="addSubmit" class="btn btn-sm btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>