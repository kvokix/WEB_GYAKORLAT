<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$message = "";
$message_type = ""; // success vagy danger

// --- Adatbáziskapcsolat beállítások --- //
$servername1 = "localhost";
$username1 = "root";
$password1 = "";
$dbname1 = "vaszilijedc";

$servername2 = "mysql.omega";
$port2 = 3306;
$username2 = "vaszilijedc";
$password2 = "ezegyjelszo!!48";
$dbname2 = "vaszilijedc";

// Próbáljuk az első kapcsolódást
try {
    $conn = new mysqli($servername1, $username1, $password1, $dbname1);
} catch (mysqli_sql_exception $e) {
    // Ha nem sikerül, próbáljuk a második szervert
    try {
        $conn = new mysqli($servername2, $username2, $password2, $dbname2, $port2);
    } catch (mysqli_sql_exception $e) {
        die("Nem sikerült csatlakozni az adatbázishoz: " . $e->getMessage());
    }
}

// CAPTCHA számok generálása
if (empty($_SESSION['captcha_num1']) || empty($_SESSION['captcha_num2'])) {
    $_SESSION['captcha_num1'] = rand(1, 20);
    $_SESSION['captcha_num2'] = rand(1, 20);
}

// Üzenetküldés feldolgozása
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['username'])) {
    $subject = trim($_POST['subject']);
    $messageText = trim($_POST['message']);
    $captcha = (int)$_POST['captcha'];
    $expected_captcha = $_SESSION['captcha_num1'] - $_SESSION['captcha_num2'];
    $user_id = $_SESSION['user_id'];

    if ($captcha !== $expected_captcha) {
        $message = 'Hibás CAPTCHA megoldás! Próbáld újra.';
        $message_type = 'danger';
    } else {
        $stmt = $conn->prepare("INSERT INTO messages (user_id, subject, message) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("iss", $user_id, $subject, $messageText);
            if ($stmt->execute()) {
                $message = 'Az üzenetet sikeresen elküldtük!';
                $message_type = 'success';
                // Új CAPTCHA generálás
                $_SESSION['captcha_num1'] = rand(1, 20);
                $_SESSION['captcha_num2'] = rand(1, 20);
            } else {
                $message = 'Hiba történt az üzenet mentésekor!';
                $message_type = 'danger';
            }
            $stmt->close();
        } else {
            $message = 'Hiba történt az adatbázis művelet során!';
            $message_type = 'danger';
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="HU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/jpg" href="assets/images/Logo_nagy.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>Vaszilij EDC</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>

<body>

<?php include 'header.php'; ?>

<!-- Flash üzenet -->
<?php if (!empty($message)): ?>
<div id="flash-message" class="alert alert-<?= $message_type ?> text-center"
     style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050; width: auto; max-width: 500px;">
    <?= htmlspecialchars($message) ?>
</div>
<?php endif; ?>

<section class="section" style="padding-bottom: 60px;">
    <div class="container">

        <?php if (!isset($_SESSION['username'])): ?>
            <div class="alert alert-warning text-center" style="max-width: 600px; margin: 100px auto;">
                <h4>Az üzenetküldéshez be kell jelentkezned!</h4>
                <p><a href="login_page.php" class="btn btn-primary mt-3">Bejelentkezés</a></p>
            </div>
        <?php else: ?>
            <div class="container py-5">
                <h3 class="mb-4">Ha üzenetet szeretnél küldeni nekem, itt megteheted:</h3>
                <form action="contact.php" method="post" class="shadow p-4 rounded bg-light">

                    <div class="mb-3">
                        <label for="subject" class="form-label">Tárgy</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Üzenet <span class="text-danger">(kötelező)</span></label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>

                    <div class="mb-3 d-flex align-items-center">
                        <label class="me-2"><?= $_SESSION['captcha_num1'] ?> - <?= $_SESSION['captcha_num2'] ?> =</label>
                        <input type="text" class="form-control w-auto" name="captcha" required>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="dataConsent" required>
                        <label class="form-check-label" for="dataConsent">
                            Elfogadom az <a href="adatkezeles.php">Adatkezelési tájékoztatót</a>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary px-4">Küldés</button>
                </form>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Flash üzenet eltüntetése pár másodperc múlva
document.addEventListener("DOMContentLoaded", function() {
    var flashMessage = document.getElementById('flash-message');
    if (flashMessage) {
        setTimeout(function() {
            flashMessage.style.transition = "opacity 0.5s ease";
            flashMessage.style.opacity = 0;
            setTimeout(function() {
                flashMessage.remove();
            }, 500); // Miután elhalványult, eltávolítjuk
        }, 3000); // 3 másodperc után kezd eltűnni
    }
});
</script>

</body>
</html>
