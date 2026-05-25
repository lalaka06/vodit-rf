<?php
include 'db.php';

if (isset($_POST['go'])) {
    $l = $_POST['login'];
    $p = $_POST['pass'];
    $f = $_POST['fio'];
    $b = $_POST['birthdate'];  
    $t = $_POST['tel'];
    $e = $_POST['email'];
    mysqli_query($db, "INSERT INTO users (login, password, fio, birthdate, phone, email) VALUES ('$l', '$p', '$f', '$b', '$t', '$e')");
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Регистрация</title>
</head>
<body>
    <header>
        <div class="logo">
            <img class="logo-img" src="images/logo.png" alt="">
            <div class="logo-text">Портал «Водить.РФ»</div>
        </div>
    </header>
    <div class="container reg">
        <h2>Регистрация</h2>
        
        <form method="POST">
            <input name="login" placeholder="Логин (лат+цифры, от 6)" pattern="[A-Za-z0-9]{6,}" required>
            <input name="pass" type="password" placeholder="Пароль (от 8)" minlength="8" required>
            <input name="fio" placeholder="ФИО (кириллица)" pattern="[А-Яа-яЁё\s]+" required>
            <input name="birthdate" type="date" placeholder="Дата рождения" required>
            <input name="tel" placeholder="8(XXX)XXX-XX-XX" pattern="8\(\d{3}\)\d{3}-\d{2}-\d{2}" required>
            <input name="email" type="email" placeholder="E-mail" required>
            <button name="go">Создать пользователя</button>
        </form>
        
        <a href="login.php">Уже есть аккаунт? Войти</a>
    </div>
</body>
</html>