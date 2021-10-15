<?php include 'includes/views/head.php'; ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap" id="home-section">
    <div class="px-4 py-3"><a href="index.php">&lt; Back to Home</a></div>  

    <div class="login-front text-center d-flex flex-column justify-content-center" style="height: 80vh;">
      <div class="mx-auto w-100" style="max-width: 300px">
        <h2 class="mb-4">Welcome Back!</h2>
        <a href="users/cs/auth/login.php" class="btn btn-primary py-2 mt-1 mb-2 d-block">Login as CS</a>
        <a href="users/manager/auth/login.php" class="btn btn-secondary py-2 m-1 text-black border-1 d-block" style="background: #fff;">Login as Manager</a>
      </div>
    </div>

    <?php include 'includes/views/footer.php'; ?>
    <!-- END OF FOOTER -->

  </div>
  <!-- END OF site-wrap -->

<?php include 'includes/views/bottom.php'; ?>