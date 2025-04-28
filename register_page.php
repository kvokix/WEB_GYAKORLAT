<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$message = "";
$message_type = ""; // success vagy danger

if (isset($_SESSION['success_message'])) {
    $message = $_SESSION['success_message'];
    $message_type = 'success';
    unset($_SESSION['success_message']);
}

if (isset($_SESSION['error_message'])) {
    $message = $_SESSION['error_message'];
    $message_type = 'danger';
    unset($_SESSION['error_message']);
}
?>
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

<?php if (!empty($message)): ?>
    <div id="flash-message" class="alert alert-<?= $message_type ?> text-center"
        style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050; width: auto; max-width: 500px;">
        <?= htmlspecialchars($message) ?>
    </div>
    <?php endif; ?>

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
                                    <input name="fullname" type="text" class="form-control" placeholder="Teljes név"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <input name="username" type="text" class="form-control" placeholder="Felhasználónév"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <input name="email" type="email" class="form-control" placeholder="Email cím"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <input name="password" type="password" class="form-control" placeholder="Jelszó"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <input name="confirm_password" type="password" class="form-control"
                                        placeholder="Jelszó megerősítése" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark">
                                        <i class="fa fa-user-plus me-2"></i> Regisztráció
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
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var flashMessage = document.getElementById('flash-message');
    if (flashMessage) {
        setTimeout(function() {
            flashMessage.style.transition = "opacity 0.5s ease";
            flashMessage.style.opacity = 0;
            setTimeout(function() {
                flashMessage.remove();
            }, 500);
        }, 3000);
    }
});
</script>
<script>
// Flash üzenet eltüntetése pár másodperc után
document.addEventListener("DOMContentLoaded", function() {
    var flashMessage = document.getElementById('flash-message');
    if (flashMessage) {
        setTimeout(function() {
            flashMessage.style.transition = "opacity 0.5s ease";
            flashMessage.style.opacity = 0;
            setTimeout(function() {
                flashMessage.remove();
            }, 500);
        }, 3000);
    }
});
</script>

</body>

</html>