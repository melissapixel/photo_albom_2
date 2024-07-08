<?php
    require 'conn.php';
    
    // Проверка, был ли отправлен файл
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES["image"]["tmp_name"];
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = $_FILES["image"]["type"];
    
    // Чтение содержимого файла
    $imageData = file_get_contents($fileTmpPath);
    
    // Подготовка и выполнение SQL-запроса
    $stmt = $conn->prepare("INSERT INTO images (filename, image) VALUES (?, ?)");
    $stmt->bind_param("sb", $fileName, $null);
    
    $stmt->send_long_data(1, $imageData);
    
    if ($stmt->execute()) {
        echo "Файл успешно загружен и сохранен в базе данных.";
        header('location: albom.php');
    } else {
        echo "Произошла ошибка при загрузке файла: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "Ошибка при загрузке файла. Пожалуйста, попробуйте еще раз.";
}

// Закрытие соединения с базой данных
$conn->close();
?>