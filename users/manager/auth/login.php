<?php require_once 'includes/login_backend.php'; ?>
<?php include 'includes/views/head.php'; ?>

<body class="bg-light">
  <div id="layoutAuthentication">

    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Login as Manager</h3>
                </div>
                <div class="card-body">
                  <?php if (!empty($message)) { echo $message; } ?>
                  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                      <label class="small mb-1" for="inputEmailAddress">Email</label>
                      <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" placeholder="Enter email address" value="" />
                      <div class="text-danger small"><?= $error['email']; ?></div>
                    </div>
                    <div class="form-group">
                      <label class="small mb-1" for="inputPassword">Password</label>
                      <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter password" />
                      <div class="text-danger small"><?= $error['password']; ?></div>
                    </div>
                    <div class="form-group mt-4 mb-0">
                      <input type="submit" name="login_manager" class="btn btn-primary btn-block py-2" value="Login">
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center">
                  <div class="small"><a href="../../../index.php">&lt; Back to Home</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>

    <?php include 'includes/views/footer.php'; ?>
  </div>

<?php include 'includes/views/bottom.php'; ?>