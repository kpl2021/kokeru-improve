<?php $error = createRoom(); ?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Ruangan</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item text-muted">Ruangan</li>
      <li class="breadcrumb-item active">Manage</li>
    </ol>
    <div class="mb-4">
      <a href="" class="btn btn-primary btn-sm" id="createRoomBtn" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus"></i> Tambah Ruang</a>
    </div>
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Daftar Ruangan
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th style="width: 10%;">No</th>
                <th class="text-center" style="width: 30%;">Nama Ruang</th>
                <th class="text-center" style="width: 30%;">Nama CS</th>
                <th class="text-center" style="width: 15%;">Edit</th>
                <th class="text-center" style="width: 15%;">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $result = getRooms(); 
                $i = 1;
              ?>
              <?php while ($room = $result->fetch_object()): ?>
              <?php $jadwalByRuang = getJadwalByRuang($room->nama_ruang)->fetch_object(); ?>
              <tr>
                <td><?php echo $i; $i++; ?></td>
                <td class="text-center"><?= $room->nama_ruang; ?></td>
                <?php if (is_null($jadwalByRuang)): ?>
                  <td class="text-center"><a href="" id="assignCsBtn" data-toggle="modal" data-target="#assignCsModal" data-id-ruang="<?= $room->id_ruang; ?>">&lt;Pilih CS&gt;</a></td>
                <?php else: ?>
                  <td class="text-center"><a href="" id="assignCsBtn" data-toggle="modal" data-target="#assignCsModal" data-id-ruang="<?= $room->id_ruang; ?>"><?= $jadwalByRuang->nama; ?></a></td>
                <?php endif; ?>  
                <td class="text-center"><a href="" class="btn btn-outline-info btn-sm" id="editRoomBtn" data-toggle="modal" data-target="#editModal" data-id="<?= $room->id_ruang; ?>" data-name="<?= $room->nama_ruang; ?>"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                <td class="text-center"><a href="" class="btn btn-outline-danger btn-sm" id="deleteRoomBtn" data-id="<?= $room->id_ruang; ?>" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i> Delete</a></td>
              </tr>
              <?php endwhile; ?>  
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modals -->
    <?php include 'includes/views/modals/create_room_modal.php'; ?>
    <?php include 'includes/views/modals/edit_room_modal.php'; ?>
    <?php include 'includes/views/modals/delete_room_modal.php'; ?>
    <?php include 'includes/views/modals/assign_cs_modal.php'; ?>

  </div>
</main>