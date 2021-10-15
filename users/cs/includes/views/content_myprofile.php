<main>
  <div class="container-fluid">
    <h1 class="mt-4">View Profile</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
    <div class="card mb-4">
      <div class="card-body text-center" style="padding: 6em 1em">
        <h3><?= $_SESSION['user']->nama; ?></h3>
        <p class="mb-0"><?= $_SESSION['user']->email; ?></p>
        <p class="mb-0"><?= $_SESSION['user']->no_hp; ?></p>
      </div>
    </div>
  </div>
</main>