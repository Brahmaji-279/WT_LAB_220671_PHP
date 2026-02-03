<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request");
}
//input is taken and sanitized using trim function of strings and formatting functions
$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($username) || empty($email) || empty($password)) {
    die("All fields are required");
}
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// DB config
$host = "localhost";
$db   = "testdb";
$user = "root";
$pass = "";

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

//handling case sensitivity
$username = strtolower(trim($_POST['username']));
$email=strtolower(trim($_POST['email']));
//validating username and email
if (strlen($username)<6){
    echo "username must be of atleast 6 characters";
    echo "<br>";
    echo "re enter the details";
    echo "<a href='register.html'>Go back to Registration</a>";
    
}
else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    echo "<br>";
    echo "re enter the details";
    echo "<a href='register.html'>Go back to Registration</a>";
}
else{
    $sql = "INSERT INTO user_details (username, email, password)
        VALUES (:username,:email,:password)";
}


try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':email'    => $email,
        ':password' => $hashedPassword
    ]);

} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        die("Username or Email already exists");
    }
    die("Registration failed");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        .box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #667eea;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Registration Successful ✅</h2>
    <p>Your account has been created.</p>
    <a href="login.html">Click here to Login</a>
</div>

</body>
</html>

