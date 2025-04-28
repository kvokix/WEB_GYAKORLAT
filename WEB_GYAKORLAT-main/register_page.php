<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="utf-8">
  <title>Regisztráció - Vaszilij EDC</title>
  <link rel="icon" type="image/jpg" href="assets/images/Logo_nagy.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
  <link rel="stylesheet" href="assets/css/owl-carousel.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">
</head>

<body>

<?php include 'header.php'; ?>

<div class="py-5 bg-light">
  <div class="container" style="padding-top: 80px;">
    <div class="text-center mb-5">
      <h2>Regisztráció</h2>
      <p class="text-muted">Hozd létre saját fiókodat</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card shadow-sm border-0">
          <div class="card-body">
            <form id="register-form" action="register.php" method="post">
              <div class="mb-3">
                <input name="fullname" type="text" class="form-control" placeholder="Teljes név" required>
              </div>
              <div class="mb-3">
                <input name="username" type="text" class="form-control" placeholder="Felhasználónév" required>
              </div>
              <div class="mb-3">
                <input name="email" type="email" class="form-control" placeholder="Email cím" required>
              </div>
              <div class="mb-3">
                <input name="password" type="password" class="form-control" placeholder="Jelszó" required>
              </div>
              <div class="mb-4">
                <input name="confirm_password" type="password" class="form-control" placeholder="Jelszó megerősítése" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-dark">
                  <i class="fa fa-user-plus me-2"></i>  Regisztráció
                </button>
              </div>
            </form>
            <p class="text-center mt-4 mb-0">Már van fiókod? <a href="login_page.php">Lépj be!</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

<script src="assets/js/jquery-2.1.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
