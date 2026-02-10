<?php
echo "<pre>";
print_r($_FILES);
echo "</pre>";

$uploadDir = "uploads/";

if (isset($_FILES['myfile'])) {

    if ($_FILES['myfile']['error'] !== UPLOAD_ERR_OK) {
        echo "❌ Upload error code: " . $_FILES['myfile']['error'];
        exit;
    }

    $fileName = basename($_FILES['myfile']['name']);
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['myfile']['tmp_name'],$targetFile)) {
        echo "<h3>✅ File uploaded successfully!</h3>";
        echo "<a href='download.php?file=$fileName'>Download the file you uploaded securely</a>";
    } else {
        echo "❌ move_uploaded_file() failed";
    }
}
?>
