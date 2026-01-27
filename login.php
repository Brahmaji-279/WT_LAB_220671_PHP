<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request");
}

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($email) || empty($password)) {
    die("All fields required");
}

// Database config
$host = "localhost";
$db   = "testdb";
$user = "root";
$pass = "";

// Connect DB
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Database connection failed");
}

// Fetch user
$sql = "SELECT username, password FROM user_details WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);

$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$userData) {
    die("Invalid email or password");
}

// Verify password
if (!password_verify($password, $userData['password'])) {
    die("Invalid email or password");
}

// Success → start session
$_SESSION['username'] = $userData['username'];

header("Location: /php_CyberAwarenessWebsite/CybersecurityAwarenessWebsite/Task-3/index.html");
exit;


