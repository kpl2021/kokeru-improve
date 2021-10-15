  <?php include 'includes/views/modals/reset_status_modal.php'; ?>
  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
  <script>

    const editRoomButtons = document.querySelectorAll('#editRoomBtn');
    editRoomButtons.forEach(editRoomButton => {
      
      editRoomButton.addEventListener('click', () => {
        let id = editRoomButton.getAttribute('data-id');
        let name = editRoomButton.getAttribute('data-name');
  
        document.getElementById('editRoomId').value = id;
        document.getElementById('editRoomName').value = name;
      });

    });

    const deleteRoomButtons = document.querySelectorAll('#deleteRoomBtn');
    deleteRoomButtons.forEach(deleteRoomButton => {
      
      deleteRoomButton.addEventListener('click', () => {
        let id = deleteRoomButton.getAttribute('data-id');
  
        document.getElementById('deleteRoomId').value = id;
      });

    });

    const deleteCsButtons = document.querySelectorAll('#deleteCsBtn');
    deleteCsButtons.forEach(deleteCsButton => {
      
      deleteCsButton.addEventListener('click', () => {
        let id = deleteCsButton.getAttribute('data-id-cs');
  
        document.getElementById('deleteCsId').value = id;
      });

    });

    const assignCsButtons = document.querySelectorAll('#assignCsBtn');
    assignCsButtons.forEach(assignCsButton => {
      
      assignCsButton.addEventListener('click', () => {
        let id = assignCsButton.getAttribute('data-id-ruang');
  
        document.getElementById('assignCsRoomId').value = id;
      });

    });

    $(document).ready(function() {
      $('.userinfo').click(function() {
        
        var userid = $(this).data('id');

        // AJAX request
        $.ajax({
          url: 'includes/views/ajaxfile.php',
          type: 'post',
          data: {userid: userid},
          success: function(response) { 
            // Add response in Modal body
            $('.modal-body').html(response);

            // Display Modal
            $('#empModal').modal('show'); 
          }
        });
      });
    });

  </script>
</body>
</html>
<?php 
  $db->close(); 
  ob_end_flush();
?>