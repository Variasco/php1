<?php
$db = @mysqli_connect('localhost', 'root', 'root', 'shop') or die('Error: ' . mysqli_connect_error());

$catalog = @mysqli_query($db, "SELECT `id`, `name`, `picture`, `price` FROM `catalog`");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <?php foreach ($catalog as $good): ?>
        <div class="good">
            <a class="good__link" href="good.php?id=<?= $good['id'] ?>">
                <h2><?= $good['name'] ?></h2>
                <img src="img/<?= $good['picture'] ?>" alt="<?= $good['picture'] ?>">
            </a>
            <p><?= $good['price'] ?> &#8381;</p>
            <button>Купить</button>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
