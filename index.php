<?php
    require 'conn.php';
    require 'bd.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="image">Select image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>