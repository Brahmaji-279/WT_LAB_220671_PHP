<?php
if (isset($_GET['file'])) {

    $file = basename($_GET['file']);
    $filePath = "uploads/" . $file;

    if (file_exists($filePath)) {

        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"$file\"");
        header("Content-Length: " . filesize($filePath));

        readfile($filePath);
        exit;
    } else {
        echo "❌ File not found.";
    }
}
?>
