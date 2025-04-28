<?php
session_start();

// --- Adatbázis kapcsolat --- //
$servername = "localhost";
$username = "root";          // vagy saját adatbázis felhasználó
$password = "";              // jelszavad, ha van
$dbname = "vaszilijedc";     // adatbázisod neve

$conn = new mysqli($servername, $username, $password, $dbname);

// --- Kapcsolat ellenőrzése --- //
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// --- Űrlapadatok --- //
$login = trim($_POST['login']); // email vagy felhasználónév
$pass = $_POST['password'];

if (empty($login) || empty($pass)) {
    die("Kérlek, töltsd ki az összes mezőt!");
}

// --- Lekérdezés: e-mail vagy felhasználónév alapján --- //
$sql = "SELECT * FROM users WHERE email = ? OR username = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $login, $login);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($pass, $user['password'])) {
    // --- Sikeres belépés --- //
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    echo "Sikeres bejelentkezés, üdv, " . htmlspecialchars($user['username']) . "!";
    // pl.: header("Location: dashboard.php"); exit;
} else {
    echo "Hibás felhasználónév vagy jelszó!";
}

$stmt->close();
$conn->close();
header("Location: index.php");
exit;

?>
