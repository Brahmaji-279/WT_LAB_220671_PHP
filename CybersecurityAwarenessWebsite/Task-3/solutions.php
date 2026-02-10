<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Solutions</title>

<style>
/* ===== CYBER THEME ===== */
/* ===== Global Styles ===== */
body {
    margin: 0;
    font-family: "Inter", Arial, sans-serif;
    background: #050b08;
    color: #eafff5;
}

/* ===== Header ===== */
header {
    background: #eafff5;
    padding: 12px 0;
    color: #022c22;
}

.header-container {
    max-width: 1100px;
    margin: auto;
    padding: 0 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.logo img {
    height: 28px;
    width: 28px;
    border-radius: 50%;
    box-shadow: 0 0 8px #00ff99;
}

/* ===== Main Container ===== */
.container {
    max-width: 900px;
    margin: 60px auto;
    padding: 40px;
    background: #071a12;
    border-radius: 14px;
    box-shadow: 0 0 30px rgba(0,255,153,0.25);
}

.container h2 {
    color: #00ff99;
    margin-bottom: 10px;
}

.container p {
    color: #9ae6b4;
}

/* ===== Upload Box ===== */
.upload-box {
    margin-top: 30px;
    padding: 30px;
    border: 2px dashed #00ff99;
    border-radius: 12px;
    text-align: center;
    background: #04130d;
}

.upload-box input[type="file"] {
    background: #022c22;
    color: #eafff5;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #00ff99;
    width: 100%;
    max-width: 350px;
}

/* ===== Buttons ===== */
button {
    margin-top: 20px;
    background: linear-gradient(90deg, #00ff99, #22c55e);
    color: #022c22;
    padding: 12px 30px;
    border: none;
    border-radius: 30px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    box-shadow: 0 0 20px #00ff99;
    transform: translateY(-2px);
}

/* ===== Solution Card ===== */
.solution-card {
    background: #04130d;
    border: 1px solid #00ff99;
    padding: 20px;
    margin: 30px auto;
    width: 80%;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,255,153,0.35);
}

.solution-card h2 {
    color: #00ff99;
}

.solution-card .desc {
    color: #a7f3d0;
    margin: 10px 0 20px;
}

/* ===== Action Buttons ===== */
.actions {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.btn {
    padding: 10px 18px;
    border: 1px solid #00ff99;
    color: #00ff99;
    text-decoration: none;
    border-radius: 6px;
    transition: 0.3s;
}

.btn:hover {
    background: #00ff99;
    color: #022c22;
    box-shadow: 0 0 12px #00ff99;
}

/* ===== Footer ===== */
footer {
    text-align: center;
    padding: 20px;
    color: #6ee7b7;
}


</style>
</head>

<body>

<!-- HEADER -->
<header>
    <div class="header-container">
        <div class="logo">
            <img src="images/logo.png" alt="CyberGuard">
        </div>
        <span>CyberGuard | Solutions</span>
    </div>
</header>

<!-- MAIN CONTENT -->
<div class="container">

    <h2>Secure File Upload & Download</h2>

    <p>
        Upload any file securely to the server and download it later.
        This simulates real-world systems  like <strong>Goole Drive</strong> and
        <strong>Secure storage platforms</strong>.
    </p>

    <!-- FILE UPLOAD FORM -->
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="upload-box">
            <input type="file" name="myfile" required>
            <br>
            <button type="submit">Upload File</button>
        </div>
    </form>

</div>
    <section class="solution-card">
  <h2>🔐 Secure Log file handling</h2>

  <p class="desc">
    This module demonstrates how cybersecurity systems securely
    read and write log files, reports, and audit data using PHP.
  </p>

  <div class="actions">
    <a href="solutions/write_log.php" class="btn">✍️ Write Log File</a>
    <a href="solutions/read_log.php" class="btn">📖 Read Log File</a>
  </div>
</section>


<!-- FOOTER -->
<footer>
    © 2025 CyberGuard
</footer>

</body>
</html>
