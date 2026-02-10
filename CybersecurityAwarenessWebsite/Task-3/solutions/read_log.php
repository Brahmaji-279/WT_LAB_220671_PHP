<?php
chdir(__DIR__);

$logFile = "logs/security.log";
$status = "";
$content = "";

/* ========= FILE CHECK ========= */
if (file_exists($logFile) && is_file($logFile)) {

    /* ========= FILE READ METHODS ========= */

    // Method 1: fopen + fread
    $fp = fopen($logFile, "r");
    $content = fread($fp, filesize($logFile));
    fclose($fp);

    // Method 2: file_get_contents
    $content_alt = file_get_contents($logFile);

    // Method 3: file() → array of lines
    $lines = file($logFile);

    /* ========= FILE INFORMATION ========= */

    $info = [
        "File Size"       => filesize($logFile) . " bytes",
        "File Type"       => filetype($logFile),
        "Last Accessed"   => date("Y-m-d H:i:s", fileatime($logFile)),
        "Last Modified"   => date("Y-m-d H:i:s", filemtime($logFile)),
        "Created Time"    => date("Y-m-d H:i:s", filectime($logFile)),
        "Permissions"     => substr(sprintf('%o', fileperms($logFile)), -4),
        "Owner ID"        => fileowner($logFile),
        "Group ID"        => filegroup($logFile),
        "Inode"           => fileinode($logFile)
    ];

} else {
    $status = "❌ Log file not found.";
}

/* ========= DIRECTORY PARSING ========= */

$dir = opendir("logs");
$dirFiles = [];

while (($file = readdir($dir)) !== false) {
    if (is_file("logs/$file")) {
        $dirFiles[] = $file;
    }
}
closedir($dir);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Read Security Log</title>
    <link rel="stylesheet" href="../style.css">
</head>
<style>
    /* ===== Global ===== */
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
    box-shadow: 0 0 10px #00ff99;
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
    margin-bottom: 15px;
    text-shadow: 0 0 10px rgba(0,255,153,0.6);
}

.container h3 {
    color: #6ee7b7;
    margin-top: 30px;
}

.container p {
    color: #9ae6b4;
    font-size: 15px;
}

/* ===== Log Output / Terminal ===== */
pre {
    background: #04130d;
    color: #a7f3d0;
    padding: 20px;
    border-radius: 10px;
    border: 1px solid #00ff99;
    font-family: "Courier New", monospace;
    font-size: 14px;
    line-height: 1.6;
    box-shadow: inset 0 0 10px rgba(0,255,153,0.25);
    max-height: 320px;
    overflow-y: auto;
}

/* ===== Buttons ===== */
.actions {
    margin-top: 25px;
    display: flex;
    gap: 18px;
    flex-wrap: wrap;
}

.btn {
    padding: 10px 22px;
    border: 1px solid #00ff99;
    color: #00ff99;
    text-decoration: none;
    border-radius: 30px;
    font-weight: 500;
    transition: all 0.3s ease;
    background: transparent;
}

.btn:hover {
    background: #00ff99;
    color: #022c22;
    box-shadow: 0 0 15px #00ff99;
    transform: translateY(-2px);
}

/* ===== Upload / Utility Boxes ===== */
.upload-box,
.solution-card {
    margin-top: 30px;
    padding: 30px;
    border: 2px dashed #00ff99;
    border-radius: 12px;
    background: #04130d;
    box-shadow: 0 0 15px rgba(0,255,153,0.2);
}

.solution-card h2 {
    color: #00ff99;
}

.solution-card .desc {
    color: #a7f3d0;
}

/* ===== Footer ===== */
footer {
    text-align: center;
    padding: 20px;
    color: #6ee7b7;
}

/* ===== Responsive ===== */
@media (max-width: 600px) {
    .container {
        margin: 30px 15px;
        padding: 25px;
    }

    .actions {
        flex-direction: column;
    }

    .btn {
        width: 100%;
        text-align: center;
    }
}

    </style>
<body>

<div class="container">
    <h2>📊 Security Log Viewer</h2>

<?php if ($content): ?>
    <pre><?php echo htmlspecialchars($content); ?></pre>

    <h3>📌 File Information</h3>
    <pre>
<?php
foreach ($info as $k => $v) {
    echo "$k : $v\n";
}
?>
    </pre>

    <h3>📁 Files in Logs Directory</h3>
    <pre>
<?php
foreach ($dirFiles as $f) {
    echo $f . "\n";
}
?>
    </pre>

<?php else: ?>
    <p><?php echo $status; ?></p>
<?php endif; ?>

    <div class="actions">
        <a href="write_log.php" class="btn">✍️ Write Log</a>
        <a href="../solutions.php" class="btn">⬅ Back</a>
    </div>
</div>

</body>
</html>
