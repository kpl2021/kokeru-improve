<?php include 'includes/views/head.php'; ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap" id="home-section">

    <?php include 'includes/views/header.php'; ?>
    <!-- END OF HEADER -->

    <div class="site-blocks-cover" style="overflow: hidden;">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-md-12" style="position: relative;" data-aos="fade-up" data-aos-delay="200">
            <img src="images/undraw_investing_7u74.svg" alt="Image" class="img-fluid img-absolute">
            <div class="row mb-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6 mr-auto">
                <h1>Kontrol Kebersihan Ruangan</h1>
                <p class="mb-4" style="font-size: 1.2em;">Kelola dan periksa kebersihan serta kerapian ruang Anda dengan mudah.</p>
                <div>
                  <a href="#ruang-display-section" class="btn btn-primary mr-2 mb-2">Lihat Ruang</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>  

    <?php include 'includes/views/rooms_display.php'; ?>
    <!-- END OF ROOMS DISPLAY -->

    <?php include 'includes/views/footer.php'; ?>
    <!-- END OF FOOTER -->

  </div>
  <!-- END OF site-wrap -->

<?php include 'includes/views/bottom.php'; ?>