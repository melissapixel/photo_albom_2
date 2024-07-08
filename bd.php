<?php
    $sql = "CREATE DATABASE IF NOT EXISTS test";
    $conn->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS images (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        image LONGBLOB NOT NULL
    )";
    $conn->query($sql);
?>