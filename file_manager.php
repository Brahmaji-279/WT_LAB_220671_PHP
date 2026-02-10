<?php
$uploadDir = "uploaded_file_manager/";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}
//file handling for upload,delete and download
//for upload using post method
if (isset($_POST["upload"])) {

    if ($_FILES["file"]["error"] === 0) {

        $name = basename($_FILES["file"]["name"]); // prevent path tricks
        move_uploaded_file($_FILES["file"]["tmp_name"], $uploadDir . $name);
    }
}
//for delete using get method 
if (isset($_GET["delete"])) {

    $file = basename($_GET["delete"]);
    $path = $uploadDir . $file;

    if (file_exists($path)) {
        unlink($path);
    }
}
//for downlad using the get method
if (isset($_GET["download"])) {

    $file = basename($_GET["download"]);
    $path = $uploadDir . $file;

    if (file_exists($path)) {

        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"$file\"");
        readfile($path);
        exit;
    }
}

$files = array_diff(scandir($uploadDir), [".", ".."]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mini File Manager</title>

    <style>
        body{
            font-family: Arial;
            background:#f2f2f2;
            padding:40px;
        }

        .box{
            background:white;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
            max-width:900px;
            margin:auto;
        }

        table{
            width:100%;
            border-collapse: collapse;
            margin-top:20px;
        }

        th, td{
            padding:10px;
            border-bottom:1px solid #ddd;
            text-align:left;
        }

        th{
            background:#333;
            color:white;
        }

        button{
            padding:6px 10px;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }

        .download{ background:#4CAF50; color:white; }
        .delete{ background:#e74c3c; color:white; }

        input[type=file]{
            margin-bottom:10px;
        }
    </style>
</head>

<body>

<div class="box">

<h2>Mini File Manager</h2>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button type="submit" name="upload">Upload</button>
</form>
<!-- table for the display of the files with its attributes -->
<table>
<tr>
    <th>Name</th>
    <th>Size (KB)</th>
    <th>Last Modified</th>
    <th>Actions</th>
</tr>

<?php foreach ($files as $file):

    $path = $uploadDir . $file;
?>

<tr>
    <td><?= htmlspecialchars($file) ?></td>

    <td><?= round(filesize($path)/1024,2) ?></td>

    <td><?= date("Y-m-d H:i:s", filemtime($path)) ?></td>

    <td>
        <a href="?download=<?= urlencode($file) ?>">
            <button class="download">Download</button>
        </a>

        <a href="?delete=<?= urlencode($file) ?>" onclick="return confirm('Delete file?')">
            <button class="delete">Delete</button>
        </a>
    </td>
</tr>

<?php endforeach; ?>

</table>

</div>
</body>
</html>
