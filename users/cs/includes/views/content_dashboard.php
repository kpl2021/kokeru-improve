<main>
  <div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="row">
      <?php $numOfRooms = getCsRoomsCount($_SESSION['user']->id_cs); ?>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-light mb-4">
          <div class="card-body">
            <p class="text-dark mb-0 font-weight-bold">Total Ruang CS</p>
            <p class="text-secondary mb-0"><?= ($numOfRooms->num_rows > 0) ? $numOfRooms->fetch_object()->roomCount : 0; ?> ruang</p>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-primary stretched-link" href="room.php">Lihat Ruang</a>
            <div class="small text-secondary"><i class="fas fa-angle-right"></i></div>
          </div>
        </div>
      </div>
      <?php $numOfRooms->close(); ?>

      <?php $statusArr = ['belum', 'sudah']; ?>
      <?php foreach ($statusArr as $status): ?>
        <?php $numOfRooms = getCsRoomsCountByStatus($status, $_SESSION['user']->id_cs); ?>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-light mb-4">
            <div class="card-body">
              <p class="text-dark mb-0 font-weight-bold">Total Ruang <?= ($status == 'sudah') ? 'Bersih' : 'Kotor'; ?></p>
              <p class="text-secondary mb-0"><?= ($numOfRooms->num_rows > 0) ? $numOfRooms->fetch_object()->roomCountByStatus : 0; ?> ruang</p>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-primary stretched-link" href="room.php">Lihat Ruang</a>
              <div class="small text-secondary"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <?php $numOfRooms->close(); ?>
      <?php endforeach; ?>
    </div>

  </div>
</main>