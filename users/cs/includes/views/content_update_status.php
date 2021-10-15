<main>
  <div class="container-fluid">
    <h1 class="mt-4">Update Status Ruang</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Update Status</li>
    </ol>
    <div class="card mb-4 mx-auto" style="max-width: 700px;">
      <div class="card-header">Update Status Form</div>
      <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data" id="formFiles" onsubmit="return submitFormFiles();">
          <input type="hidden" id="idLaporanInput" name="idLaporan" data-id-laporan="<?= $_GET['id']; ?>">
          <div class="custom-file mb-3">
            <input type="button" class="custom-file-input" name="files" id="files" onclick="chooseFiles();">
            <label class="custom-file-label" for="file">Choose files...</label>
            <div id="errorUpload" class="text-danger small"></div>
          </div>
          <div id="selectedFiles" class="row"></div>
          <button type="submit" name="update_status" class="btn btn-primary mt-3">Update</button>
        </form>
      </div>
    </div>
  </div>
</main>