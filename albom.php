<?php
    require 'conn.php';
?>
 <h3>Here's a photo album! Photos of all users are stored here.</h3>
 <a href="index.php">Would you like to add another image?
 </a>
<?php
     // SQL-запрос для получения всех изображений
     $sql = "SELECT filename, image FROM images";
     $result = $conn->query($sql);
 
     // Проверка, существуют ли записи
     if ($result->num_rows > 0) {
         // Цикл по всем записям
         while($row = $result->fetch_assoc()) {
             $fileName = htmlspecialchars($row['filename']);
             $imageData = base64_encode($row['image']);
 
             // Вывод изображений в формате HTML
             echo "<div>";
             echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="' . $fileName . '">';
             echo "</div>";
         }
     } else {
         echo "Нет изображений в базе данных.";
     }
 
?>