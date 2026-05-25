<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Водить.РФ</title>
</head>
<body>
    <header>
        <div class="logo">
            <img class="logo-img" src="images/logo.png" alt="">
            <div class="logo-text">Портал «Водить.РФ»</div>
        </div>
    </header>
    <div class="container" style="text-align: center; width: 600px;">
        <h2>Обучение вождению речного транспорта!</h2>
        <p>Катера, круизные лайнеры, яхты. Официальные права и удобная оплата.</p>
        
        <div class="nav">
            <a href="login.php">
                <button>Войти</button>
            </a>
            <br><br>
            <a href="register.php">Еще не зарегистрированы? Регистрация</a>
        </div>
    </div>
</body>
</html>