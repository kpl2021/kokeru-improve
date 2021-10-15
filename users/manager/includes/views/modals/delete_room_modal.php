<div class="modal fade" id="deleteModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <p>Are you sure you want to delete this room?</p>
          <input type="hidden" name="deleteRoomId" id="deleteRoomId">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="delete" class="btn btn-danger">Yes, delete it!</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>