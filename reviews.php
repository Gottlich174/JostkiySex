<?php
//Подключение к БД и сбор данных о товарах
$servername = 'localhost';
$username = "root";
$password = "";
$dbname = "NMSTU";

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

$res = mysqli_query($conn,"SELECT r.username, r.rating, r.review_text, h.hardware_name 
                                  FROM `reviews` as r LEFT OUTER JOIN `hardware_items` as h
                                  ON r.id_hardware = h.id");
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">

    <title>Аппаратное обеспечение</title>
</head>
<body>
<div class='reviews'>

    <?php
    while($item = mysqli_fetch_assoc($res)){
        echo "    
        <div class='review_item'>
            <h3 class='review_name'>Пользователь: ";
        echo $item['username'];
        echo "<br>Товар:";
        echo $item['hardware_name'];
        echo "</h3>
            <text class='rate_text'>Оценка: ";
        echo $item['rating'];
        echo "/5</text>
            <br>
            <text class='review_text'>Текст: ";
        echo $item['review_text'];
        echo "</text>
        </div>";
    };
    ?>


</div>
<a href="index.php">Вернуться на главную страницу</a>



<script src="scripts.js"></script>
</body>
</html>
<?php
$conn->close();
?>
