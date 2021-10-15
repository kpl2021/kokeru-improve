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
      <a class="nav-link" href="room.php">
        <div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
        Ruangan
      </a>
    </div>
  </div>
  <div class="sb-sidenav-footer">
    <div class="small">Logged in as:</div>
    <?= $_SESSION['user']->nama; ?>
  </div>
</nav>