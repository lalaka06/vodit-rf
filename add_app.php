<?php
include 'db.php';

if (isset($_POST['go'])) {
    $uid = $_SESSION['user']['id'];
    $transport = $_POST['transport'];
    $sd = $_POST['date'];
    $pm = $_POST['pay'];
    
    mysqli_query($db, "INSERT INTO applications (user_id, transport_type, start_date, payment_method) VALUES ($uid, '$transport', '$sd', '$pm')");
    header('Location: profile.php');
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Новая заявка</title>
</head>
<body>
    <header>
        <div class="logo">
            <img class="logo-img" src="images/logo.png" alt="">
            <div class="logo-text">Портал «Водить.РФ»</div>
        </div>
    </header>
    <div class="container">
        <h2>Новая заявка на обучение</h2>
        <form method="POST">
            <select name="transport" required>
                <option value="">Выберите вид транспорта</option>
                <option value="Катер">Катер</option>
                <option value="Круизный лайнер">Круизный лайнер</option>
                <option value="Яхта">Яхта</option>
            </select>
            <input name="date" type="date" required>
            <select name="pay">
                <option>Наличными</option>
                <option>Переводом по номеру телефона</option>
            </select>
            <button name="go">Отправить заявку</button>
        </form>
    </div>
</body>
</html>