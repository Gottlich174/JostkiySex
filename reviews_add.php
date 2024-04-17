<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Добавление Отзыва</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<?php if(!(isset($_POST['hardware_item']))): ?>
    <h1 style="margin-left: 4%">1.Выберите продукт отзыва:</h1>
    <div class="choose_item">
        <div class="filter">
            <form method="post">
                <span>Компания: </span>
                <input type="checkbox" id="Nokia" value="Нокиа"/>
                <label for="Nokia">Нокиа</label>
                <input type="checkbox" id="Samsung" value="Самсунг"/>
                <label for="Samsung">Самсунг</label>
                <input type="checkbox" id="Sony" value="Сони"/>
                <label for="Sony">Сони</label>
            </form>
            <form method="post">
                <span>Вид АО: </span>
                <input type="checkbox" id="keyboard" value="Клавиатура"/>
                <label for="keyboard">Клавиатура </label>
                <input type="checkbox" id="mouse" value="Мышка"/>
                <label for="mouse">Мышка</label>
                <input type="checkbox" id="monitor" value="Монитор"/>
                <label for="monitor">Монитор</label>
            </form>
            <form method="post">
                <span>Страна: </span>
                <input type="checkbox" id="Russia" value="Россия"/>
                <label for="Russia">Россия</label>
                <input type="checkbox" id="Japan" value="Япония"/>
                <label for="Japan">Япония</label>
                <input type="checkbox" id="China" value="Китай"/>
                <label for="China">Китай</label>
            </form>
            <button id="button" style="margin-top: 4%;">Обновить товары</button>

        </div>
        <form method="post" class="hardware_items" id="ch_items">

        </form>
    </div>

<?endif;?>
<?php if((isset($_POST['hardware_item']))): ?>
    <h1 style="margin-left: 4%">2.Теперь укажите свою оценку:</h1>
    <div class="rating" id="rating" style="margin-left: 4%" data-total-value="0">
        <div class="rating_item" data-item-value="5">★</div>
        <div class="rating_item" data-item-value="4">★</div>
        <div class="rating_item" data-item-value="3">★</div>
        <div class="rating_item" data-item-value="2">★</div>
        <div class="rating_item" data-item-value="1">★</div>
    </div>
    <h1 style="margin-left: 4%; margin-top: 1%;">3.И напишите ваше имя и отзыв:</h1>
    <div class="username"  style="margin-left: 4%; margin-top: 1%;">Имя: <input id="username" type="text"></div>
    <div class="username"  style="margin-left: 4%; margin-top: 1%;">Отзыв:<br> <textarea id="review_text" cols="60" rows="20"></textarea></div>
    <a href="reviews.php"><button id = "sendbtn" style="margin-left: 4%; margin-top: 1%;">Отправить отзыв</button></a>
    <div class="hidden" id ='hardware_id' data-id = '<?=$_POST['hardware_item']?>'></div>
<?endif;?>

<script src="scripts.js"></script>
<script src="rating.js"></script>

</body>
</html>

