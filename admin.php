<?php
include 'db.php';

if ($_SESSION['user']['login'] != 'Admin26') {
    die('Доступ запрещен');
}

if (isset($_POST['upd'])) {
    $aid = $_POST['aid'];
    $st = $_POST['status'];
    mysqli_query($db, "UPDATE applications SET status='$st' WHERE id=$aid");
}

$res = mysqli_query($db, "SELECT a.*, u.fio FROM applications a JOIN users u ON a.user_id = u.id");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Панель администратора</title>
</head>
<body>
    <header>
        <div class="logo">
            <img class="logo-img" src="images/logo.png" alt="">
            <div class="logo-text">Портал «Водить.РФ»</div>
        </div>
        <h2>Панель администратора</h2>
    </header>
    
    <div class="nav">
        <a href="index.php">Выход</a>
    </div>
    
    <div class="container" style="width: 900px;">
        <table>
            <tr>
                <th>Студент</th>
                <th>Вид транспорта</th>
                <th>Статус</th>
                <th>Действие</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($res)): ?>
            <tr>
                <td><?= $row['fio'] ?></td>
                <td><?= $row['transport_type'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="aid" value="<?= $row['id'] ?>">
                        <select name="status">
                            <option>Новая</option>
                            <option>Идет обучение</option>
                            <option>Обучение завершено</option>
                        </select>
                        <button name="upd">Сменить статус</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>