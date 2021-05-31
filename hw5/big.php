<?php
require "db.php";

$id = (int)$_GET['id'];
mysqli_query($db, "UPDATE `images` SET `views` = `views` + 1 WHERE `id` = {$id}");
$result = mysqli_query($db, "SELECT * FROM `images` WHERE `id` = {$id}");
$bigImage = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр изображения</title>
    <link rel="stylesheet" href="style.css?<?= uniqid(); ?>">
</head>
<body>
    <div class="big">
        <a class="big__link" href="index.php">Назад</a>
        <img src="gallery_img/big/<?= $bigImage['name'] ?>" alt="<?= $bigImage['name'] ?>">
        <p>Количество просмотров: <?= $bigImage['views'] ?></p>
    </div>
</body>
</html>
