<div class="modal fade" id="deleteCsModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete CS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <p>Are you sure you want to delete this cleaning service?</p>
          <input type="hidden" name="deleteCsId" id="deleteCsId">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="deleteCs" class="btn btn-danger">Yes, delete it!</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>