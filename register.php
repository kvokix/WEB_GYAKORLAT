<?php
// --- Adatbázis kapcsolat --- //
$servername = "localhost";
$username = "root";         // vagy a saját adatbázisfelhasználód
$password = "";             // ha van jelszavad, ide írd
$dbname = "vaszilijedc";    // az adatbázisod neve

$conn = new mysqli($servername, $username, $password, $dbname);

// --- Kapcsolat ellenőrzése --- //
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// --- Űrlapadatok átvétele --- //
$fullname = trim($_POST['fullname']);
$user = trim($_POST['username']);
$email = trim($_POST['email']);
$pass = $_POST['password'];
$confirm_pass = $_POST['confirm_password'];

// --- Egyszerű validáció --- //
if (empty($fullname) || empty($user) || empty($email) || empty($pass) || empty($confirm_pass)) {
    die("Minden mező kitöltése kötelező!");
}

if ($pass !== $confirm_pass) {
    die("A jelszavak nem egyeznek!");
}

// --- Jelszó titkosítás --- //
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// --- Felhasználó mentése --- //
$sql = "INSERT INTO users (fullname, username, email, password)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $fullname, $user, $email, $hashed_pass);

if ($stmt->execute()) {
    echo "Sikeres regisztráció! <a href='login.html'>Lépj be itt</a>.";
} else {
    echo "Hiba: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
