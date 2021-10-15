<?php assignCs(); ?>
<div class="modal fade" id="assignCsModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pilih Cleaning Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <label for="assignCs" class="col-form-label">Nama:</label>
          <select class="form-control" name="assignCs" id="assignCs">
            <?php $result = getAllCS(); ?>
            <?php while ($cs = $result->fetch_object()): ?>
              <option value="<?= $cs->id_cs; ?>"><?= $cs->nama; ?></option>
            <?php endwhile; ?>
          </select>
          <input type="hidden" name="assignCsRoomId" id="assignCsRoomId">
          <div class="text-danger small">
            <?= $error; ?>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submitAssignCs" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>