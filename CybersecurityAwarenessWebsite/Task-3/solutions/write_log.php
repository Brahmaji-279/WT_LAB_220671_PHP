<?php
/* ========= DIRECTORY HANDLING ========= */

// Current working directory
$cwd = getcwd();

// Change directory to this file's location
chdir(__DIR__);

// Logs directory
$logDir = "logs";

// Check & create directory
if (!is_dir($logDir)) {
    mkdir($logDir, 0777, true);
}

// File paths
$logFile      = "$logDir/security.log";
$backupFile   = "$logDir/security_backup.log";
$renamedFile  = "$logDir/security_renamed.log";

/* ========= FILE WRITE ========= */

// Write using file_put_contents()
file_put_contents($logFile, "=== Security Log Initialized ===\n", FILE_APPEND);

// Open file using fopen()
$fp = fopen($logFile, "a");

// Lock file
flock($fp, LOCK_EX);

// Write log entry
$logEntry = "[INFO] User accessed system at " . date("Y-m-d H:i:s") . "\n";
fwrite($fp, $logEntry);

// Unlock and close
flock($fp, LOCK_UN);
fclose($fp);

/* ========= FILE MANAGEMENT ========= */

// Copy log file
copy($logFile, $backupFile);

// Rename backup
rename($backupFile, $renamedFile);

// Delete renamed backup
unlink($renamedFile);

/* ========= DIRECTORY SCAN ========= */

$filesList = scandir($logDir);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Write Security Log</title>
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
    <h2>🔐 Write Security Log</h2>
    <p>✅ Log written and managed successfully.</p>

    <h3>📂 Log Directory Contents</h3>
    <pre>
<?php
foreach ($filesList as $file) {
    if (is_file("$logDir/$file")) {
        echo $file . "\n";
    }
}
?>
    </pre>

    <div class="actions">
        <a href="read_log.php" class="btn">📖 View Logs</a>
        <a href="../solutions.html" class="btn">⬅ Back</a>
    </div>
</div>

</body>
</html>
