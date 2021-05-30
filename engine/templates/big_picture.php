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
    <a class="big__link" href="/?page=gallery">Назад</a>
    <img src="gallery_img/big/<?= $bigImage['name'] ?>" alt="<?= $bigImage['name'] ?>">
    <p>Количество просмотров: <?= $bigImage['views'] ?></p>
</div>
</body>
</html>