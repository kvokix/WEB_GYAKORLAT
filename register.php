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


// Űrlapadatok átvétele
$fullname = trim($_POST['fullname']);
$user = trim($_POST['username']);
$email = trim($_POST['email']);
$pass = $_POST['password'];
$confirm_pass = $_POST['confirm_password'];

// Egyszerű validáció
if (empty($fullname) || empty($user) || empty($email) || empty($pass) || empty($confirm_pass)) {
    $_SESSION['error_message'] = 'Minden mező kitöltése kötelező!';
    header('Location: register_page.php');
    exit();
}

if ($pass !== $confirm_pass) {
    $_SESSION['error_message'] = 'A jelszavak nem egyeznek!';
    header('Location: register_page.php');
    exit();
}

// Ellenőrzés: létezik-e már ilyen username vagy email
$check_sql = "SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ss", $user, $email);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    $_SESSION['error_message'] = 'Már létezik ilyen felhasználónév vagy email cím!';
    $check_stmt->close();
    $conn->close();
    header('Location: register_page.php');
    exit();
}
$check_stmt->close();

// Jelszó titkosítás
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// Felhasználó mentése
$insert_sql = "INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)";
$insert_stmt = $conn->prepare($insert_sql);
$insert_stmt->bind_param("ssss", $fullname, $user, $email, $hashed_pass);

if ($insert_stmt->execute()) {
    $_SESSION['success_message'] = 'Sikeres regisztráció, jelentkezz be!';
    $insert_stmt->close();
    $conn->close();
    header('Location: login_page.php');
    exit();
} else {
    $_SESSION['error_message'] = 'Hiba történt a regisztráció során!';
    $insert_stmt->close();
    $conn->close();
    header('Location: register_page.php');
    exit();
}
?>
