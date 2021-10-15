<div class="modal fade" id="createCsModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Petugas Cleaning Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <label for="createCsName" class="col-form-label">Nama:</label>
          <input type="text" class="form-control" name="createCsName" id="createCsName">

          <label for="createCsEmail" class="col-form-label">Email:</label>
          <input type="text" class="form-control" name="createCsEmail" id="createCsEmail">

          <label for="createCsPassword" class="col-form-label">Password:</label>
          <input type="password" class="form-control" name="createCsPassword" id="createCsPassword">

          <label for="createCsNo" class="col-form-label">No. HP:</label>
          <input type="text" class="form-control" name="createCsNo" id="createCsNo">

          <input type="hidden" name="createCsId" id="createCsId">
          <div class="text-danger small">
            <?= $error; ?>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="createCs" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>