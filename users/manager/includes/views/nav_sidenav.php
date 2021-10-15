<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
  <div class="sb-sidenav-menu">
    <div class="nav mt-3">
      <a class="nav-link" href="../../index.php">
        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
        Home
      </a>
      <a class="nav-link" href="index.php">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Dashboard
      </a>
      <a class="nav-link" href="profile.php">
        <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
        Profile
      </a>
      <a class="nav-link" href="cs.php">
        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
        Cleaning Service
      </a>
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsRoom" aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
        Ruangan
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="collapseLayoutsRoom" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
          <a class="nav-link" href="room.php">View</a>
          <a class="nav-link" href="room.php?source=manage">Manage</a>
        </nav>
      </div>
      <a class="nav-link" href="laporan.php">
        <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
        Laporan
      </a>
    </div>
  </div>
  <div class="sb-sidenav-footer">
    <div class="small">Logged in as:</div>
    <?= $_SESSION['user']->nama; ?>
  </div>
</nav>