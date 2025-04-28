<?php
// Hibák mutatása fejlesztés közben
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // <--- Session indítása már az elején!

mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR); // Hibák dobása kivételként

// Első csatlakozási adatok
$servername1 = "localhost";
$username1 = "root";
$password1 = "";
$dbname1 = "vaszilijedc";

// Második csatlakozási adatok
$servername2 = "mysql.omega";
$port2 = 3306;
$username2 = "vaszilijedc";
$password2 = "ezegyjelszo!!48";
$dbname2 = "vaszilijedc";

$conn = null;

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

// Űrlapadatok fogadása
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Ellenőrzés, hogy megvannak-e a kötelező mezők
if (empty($email) || empty($password)) {
    die("Hiányzó email vagy jelszó!");
}

// SQL lekérdezés előkészítése
try {
    $stmt = $conn->prepare("SELECT id, email, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Jelszó ellenőrzése
        if (password_verify($password, $hashedPassword)) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
        
            // Bejelentkezés loggolása
            $stmtLog = $conn->prepare("INSERT INTO login_logs (user_id) VALUES (?)");
            $stmtLog->bind_param("i", $_SESSION['user_id']);
            $stmtLog->execute();
            $stmtLog->close();
        
            
            header("Location: index.php");
            $_SESSION['success_message'] = 'Sikeres bejelentkezés!';
            exit();
        } else {
            $_SESSION['error_message'] = 'Hibás email vagy jelszó!';
            header('Location: login_page.php');
            exit();
        }
    } else {
        $_SESSION['error_message'] = 'Hibás email vagy jelszó!';
        header('Location: login_page.php');
        exit();
    }

    $stmt->close();
    $conn->close();
} catch (mysqli_sql_exception $e) {
    die("Lekérdezési hiba: " . $e->getMessage());
}

?>
