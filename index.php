<?php
//Подключение к БД и сбор данных о товарах
$servername = 'localhost';
$username = "root";
$password = "";
$dbname = "NMSTU";

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

$res = mysqli_query($conn,"SELECT * FROM `hardware_items`  ");
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
<div class="hardware_items">

    <?php
    while ($item = mysqli_fetch_assoc($res)){

        echo "<div class='card'>
        <h2>";
        echo $item['hardware_name'];
        echo "</h2>
        <span>";
        echo "Стоимость: ".$item["price"]." ₽";
        echo "</span><br>
        <span>Страна производства: ".$item['country']."<br><span>Год производства: ";
        echo $item['year'];
        echo "</span></div>";
    }
    ?>

</div>

<a href="reviews_add.php">Оставить отзыв</a>



<script src="scripts.js"></script>
</body>
</html>
<?php
$conn->close();
?>
