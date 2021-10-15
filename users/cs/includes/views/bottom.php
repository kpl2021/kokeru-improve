  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../js/scripts.js"></script>
  <script src="../js/bootstrap.fd.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
  <script>

    const deleteButtons = document.querySelectorAll('#deleteBtn');
    deleteButtons.forEach(deleteButton => {
      
      deleteButton.addEventListener('click', () => {
        let id = deleteButton.getAttribute('data-id');
  
        document.getElementById('deletePostId').value = id;
      });

    });

    var selectedFiles = [];

    function chooseFiles() {
      $.FileDialog({
        'accept': '*',
        'multiple': true,
        'cancelButton': 'Close',
      }).on('files.bs.filedialog', function(e) {
        var html = '';
        
        e.files.forEach(file => {
          selectedFiles.push(file);

          if (file.type.substring(0, 5) == 'image') {
            html += '<div class="col-5 d-flex justify-content-center align-items-center p-3 mx-auto my-3 border border-2 rounded shadow-sm"><img src="' + file.content + '" class="d-block" style="width: 100%; object-fit: cover;"></img></div>';
          } else {
            html += '<div class="col-5 d-flex justify-content-center align-items-center p-3 mx-auto my-3 border border-2 rounded shadow-sm"><video width="100%" height="" controls><source src="' + file.content + '">Your browser does not support the video tag.</video></div>';
          }
        });

        if (selectedFiles.length > 5) {
          document.getElementById('errorUpload').innerHTML = 'Max upload: 5 images';
        } else {
          document.getElementById('selectedFiles').innerHTML = html;
        }
      });
    }

    function submitFormFiles() {
      var form = document.getElementById('formFiles');
      var formData = new FormData(form);
      var idLaporanInput = document.getElementById('idLaporanInput');

      if (selectedFiles.length > 5) {
        document.getElementById('selectedFiles').innerHTML = `
          <div class="card text-danger border-danger my-3 p-3 rounded" style="margin-left: 0.7rem;">
            Can only upload up to 5 images.
          </div>
        `;
        selectedFiles = [];
        return false;
      }

      var idLaporan = idLaporanInput.getAttribute('data-id-laporan');
      formData.append('idLaporan', idLaporan);

      selectedFiles.forEach(file => {
        formData.append('files[]', file);
      });

      var ajax = new XMLHttpRequest();
      ajax.open('POST', 'http.php', true);
      ajax.send(formData);

      ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          window.location.href = 'room.php';
        }
      };

      return false;
    }

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