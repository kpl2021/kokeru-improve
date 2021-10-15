<main>
  <div class="container-fluid">
    <h1 class="mt-4">Laporan</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Laporan</li>
    </ol>

    <div class="container-fluid" style="margin-bottom: 20px;">
      <div class="card">
        <div class="card-header">Cetak Laporan</div>
        <div class="card-body">
          <form action="" method="GET" class="row">
            <div class="col form-group m-0">
              <input class="form-control" type="date" name="date" value="<?= isset($_GET['date']) ? $_GET['date'] : date("Y-m-d"); ?>">
            </div>
            <div class="col form-group m-0">
              <select class="form-control" name="status">
                <option value="">--Pilih Status--</option>
                <option value="semua" <?php if (isset($_GET['status']) && $_GET['status'] == 'semua') { echo 'selected'; } ?>>Semua</option>
                <option value="belum" <?php if (isset($_GET['status']) && $_GET['status'] == 'belum') { echo 'selected'; } ?>>Belum Bersih</option>
                <option value="sudah" <?php if (isset($_GET['status']) && $_GET['status'] == 'sudah') { echo 'selected'; } ?>>Sudah Bersih</option>
              </select>
            </div>
            <button type="submit" name="generatePrintData" class="btn btn-primary" style="margin-right: 10px;">Tampilkan</button>
            <button type="submit" class="btn btn-info" formaction="includes/views/action_page.php" style="margin-right: 10px;">Export to Excel</button>
            <button type="submit" class="btn btn-danger" formtarget="_blank" formaction="includes/views/action_page2.php" style="margin-right: 10px;">Export as PDF</button>
          </form>
        </div>
      </div>
    </div>

    <?php if (isset($_GET['generatePrintData']) && !empty($_GET['status'])): ?>
      <?php 
        $result = getLaporanByDateStatus(); 
        $i = 1;
      ?>
      <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 10%;">No</th>
              <th class="text-center" style="width: 30%;">Ruang</th>
              <th class="text-center" style="width: 40%;">Nama CS</th>
              <th class="text-center" style="width: 20%;">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($laporan = $result->fetch_object()): ?>
            <tr>
              <td><?php echo $i; $i++; ?></td>
              <td class="text-center"><?= $laporan->nama_ruang; ?></td>
              <td class="text-center"><?= $laporan->nama; ?></td>
              <td class="text-center"><?= $laporan->status; ?></td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>

  </div>
</main>