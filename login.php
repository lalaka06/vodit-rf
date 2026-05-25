<?php include 'db.php';

if (isset($_POST['go'])) {
    $l = $_POST['login'];
    $p = $_POST['pass'];
    $res = mysqli_query($db, "SELECT * FROM users WHERE login='$l' AND password='$p'");
    $user = mysqli_fetch_assoc($res);
    
    if ($user) {
        $_SESSION['user'] = $user;
        
        if ($l == 'Admin26') {
            header('Location: admin.php');
            exit(); 
        } else {
            header('Location: profile.php');
            exit();
        }
    } else {
        echo "<script>alert('Неверный логин или пароль');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Вход в систему</title>
</head>
<body>
    <header>
        <div class="logo">
            <img class="logo-img" src="images/logo.png" alt="">
            <div class="logo-text">Портал «Водить.РФ»</div>
        </div>
    </header>
    <div class="container log">
        <h2>Вход в систему</h2>
        
        <form method="POST">
            <input name="login" placeholder="Логин" required>
            <input name="pass" type="password" placeholder="Пароль" required>
            <button name="go">Войти</button>
        </form>
        
        <a href="register.php">Еще не зарегистрированы? Регистрация</a>
    </div>
</body>
</html>