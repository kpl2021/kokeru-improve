<main>
  <div class="container-fluid">

    <p class="lead text-center font-weight-bold mt-4"><?= date('l, j F Y - H:i'); ?></p>
    <div class="row mt-4">
      <?php list($result, $nPage) = getLaporanCsRooms($_SESSION['user']->id_cs); ?>
      <?php while ($laporan = $result->fetch_object()): ?>
      <div class="col-md-3">
        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary"><?= $laporan->nama_ruang; ?></strong>
              <h6 class="<?= ($laporan->status == 'sudah') ? 'badge badge-primary' : 'badge badge-danger'; ?>"><?= ucfirst($laporan->status); ?> Bersih</h6>
              <p class="card-text mb-3 text-secondary"><?= $laporan->nama; ?></p>
              <div>
                <button data-id="<?= $laporan->id_laporan; ?>" class='btn btn-outline-primary btn-sm userinfo'>Detail</button>
                <a class="btn btn-outline-info btn-sm" href="?source=updateStatus&id=<?= $laporan->id_laporan; ?>">Update</a>
              </div>
            </div>
        </div> 
      </div>
      <?php endwhile; ?>
    </div>
    <?php $result->close(); ?>

    <ul class="pagination d-flex justify-content-end">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php for ($i = 1; $i <= $nPage; $i++): ?>
        <li class="page-item <?= (isset($_GET['page']) && $_GET['page'] == $i) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
      <?php endfor; ?>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>

     <!-- Modal -->
    <div class="modal fade" id="empModal" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Bukti Foto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>

  </div>
</main>