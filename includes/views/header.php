<div class="site-mobile-menu site-navbar-target">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
  <div class="container">
    <div class="row align-items-center">
      
      <div class="col-6 col-md-3 col-xl-4  d-block">
        <h1 class="mb-0 site-logo"><a href="index.php" class="text-black h2 mb-0">KoKeRu<span class="text-primary">.</span></a></h1>
      </div>

      <div class="col-12 col-md-9 col-xl-8 main-menu">
        <nav class="site-navigation position-relative text-right" role="navigation">
          <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block ml-0 pl-0">

            <?php if (isset($_SESSION['user'])): ?>
              <?php if (empty($_SESSION['user']->id_pengelola)): ?>
                <li><a href="users/cs/index.php" class="nav-link">Dashboard</a></li>
              <?php else: ?>
                <li><a href="users/manager/index.php" class="nav-link">Dashboard</a></li>
              <?php endif; ?>
            <?php else: ?>
              <li><a href="login-front.php" class="nav-link">Login</a></li>
            <?php endif; ?>

          </ul>
        </nav>
      </div>

    </div>
  </div>
</header>