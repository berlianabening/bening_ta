<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Satpam</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-add-satpam">
          <div class="form-group">
            <label for="nomor_induk">Nomor Induk</label>
            <input type="text" name="no_induk" class="form-control" id="nomor_induk" placeholder="Nomor Induk">
          </div>
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
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