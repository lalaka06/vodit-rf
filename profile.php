<?php 
include 'db.php';
$uid = $_SESSION['user']['id'];

if (isset($_POST['rev'])) {
    $aid = $_POST['aid'];
    $txt = $_POST['review'];
    mysqli_query($db, "UPDATE applications SET review='$txt' WHERE id=$aid");
}
$apps = mysqli_query($db, "SELECT * FROM applications WHERE user_id=$uid");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Мои заявки</title>
</head>
<body>
    <header>
        <div class="logo">
            <img class="logo-img" src="images/logo.png" alt="">
            <div class="logo-text">Портал «Водить.РФ»</div>
        </div>
        <h2>Мои заявки: <?php echo $_SESSION['user']['fio']; ?></h2>
    </header>
    
    <div class="nav">
        <a href="add_app.php">Подать заявку</a> | 
        <a href="index.php">Выход</a>
    </div>
    
    <div class="container" style="width: 900px;">
        <table>
            <tr>
                <th>Фото</th>
                <th>Вид транспорта</th>
                <th>Дата начала</th>
                <th>Статус</th>
                <th>Отзыв</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($apps)): ?>
            <tr>
                <td>
                    <img class="transport-photo" src="images/transport.jpg" alt="Транспорт">
                </td>
                <td><?= $row['transport_type'] ?></td>
                <td><?= $row['start_date'] ?></td>
                <td><b><?= $row['status'] ?></b></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="aid" value="<?= $row['id'] ?>">
                        <input name="review" value="<?= $row['review'] ?>" placeholder="Ваш отзыв">
                        <button name="rev">Ок</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>