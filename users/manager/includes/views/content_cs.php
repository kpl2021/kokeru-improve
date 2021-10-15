<?php $error = createCS(); ?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Cleaning Service</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Cleaning Service</li>
    </ol>
    <div class="mb-4">
      <a href="" class="btn btn-primary btn-sm" id="createCsBtn" data-toggle="modal" data-target="#createCsModal"><i class="fas fa-plus"></i> Tambah Petugas CS</a>
    </div>
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Daftar Petugas Cleaning Service
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th style="width: 10%;">No</th>
                <th class="text-center" style="width: 25%;">Nama</th>
                <th class="text-center" style="width: 25%;">Email</th>
                <th class="text-center" style="width: 25%;">No. HP</th>
                <th class="text-center" style="width: 15%;">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $result = getAllCS(); 
                $i = 1;
              ?>
              <?php while ($cs = $result->fetch_object()): ?>
              <tr>
                <td><?php echo $i; $i++; ?></td>
                <td class="text-center"><?= $cs->nama; ?></td> 
                <td class="text-center"><?= $cs->email; ?></td> 
                <td class="text-center"><?= $cs->no_hp; ?></td>
                <td class="text-center"><a href="" class="btn btn-outline-danger btn-sm" id="deleteCsBtn" data-id-cs="<?= $cs->id_cs; ?>" data-toggle="modal" data-target="#deleteCsModal"><i class="fas fa-trash"></i> Delete</a></td>
              </tr>
              <?php endwhile; ?>  
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modals -->
    <?php include 'includes/views/modals/create_cs_modal.php'; ?>
    <?php include 'includes/views/modals/delete_cs_modal.php'; ?>

  </div>
</main>