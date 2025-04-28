<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Adatbáziskapcsolat
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


// Ha van bejelentkezett felhasználó, logout_time frissítése
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $stmt = $conn->prepare("
        UPDATE login_logs
        SET logout_time = NOW()
        WHERE user_id = ? AND logout_time IS NULL
        ORDER BY login_time DESC
        LIMIT 1
    ");
    if ($stmt) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->close();
    }
}

// Kapcsolat lezárása
$conn->close();

// Session lezárása
session_unset();
session_destroy();

// Új session az üzenethez
session_start();
$_SESSION['success_message'] = 'Sikeres kijelentkezés!';

// Átirányítás
header("Location: index.php");
exit();
?>
