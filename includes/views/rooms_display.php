<div class="site-section" id="ruang-display-section">
  <div class="container">
    <div class="row mb-4 justify-content-center text-center"  data-aos="fade-up">
      <div class="col-7 text-center  mb-2">
        <h2 class="section-title">Monitoring Kebersihan dan Kerapian Ruang</h2>
        <p class="lead"><?= date('l, j F Y - H:i'); ?></p>
      </div>
    </div>

    <div class="row align-items-stretch">
      <?php list($result, $nPage) = getLaporanRooms(); ?>
      <?php while ($laporan = $result->fetch_object()): ?>
        <?php if ($laporan->status == 'sudah'): ?>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="unit-4 d-block mb-2 py-5 bg-primary">
              <div>
                <h3 class="font-weight-bold text-white"><?= $laporan->nama_ruang; ?></h3>
                <p class="mb-0 text-white"><?= strtoupper($laporan->status); ?></p>
                <p class="mb-0 text-white"><?= (is_null($laporan->nama)) ? '&lt;kosong&gt;' : $laporan->nama; ?></p>
              </div>
            </div>
          </div>
        <?php else: ?>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="unit-4 d-block mb-2 py-5 bg-dark">
              <div>
                <h3 class="font-weight-bold text-white"><?= $laporan->nama_ruang; ?></h3>
                <p class="mb-0 text-white"><?= strtoupper($laporan->status); ?></p>
                <p class="mb-0 text-white"><?= (is_null($laporan->nama)) ? '&lt;kosong&gt;' : $laporan->nama; ?></p>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
    </div>
    <?php $result->close(); ?>

    <ul class="pagination pagination-sm d-flex justify-content-center mt-4">
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
  </div>
</div>