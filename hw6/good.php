<?php
$db = @mysqli_connect('localhost', 'root', 'root', 'shop') or die('Error: ' . mysqli_connect_error());
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $good = mysqli_fetch_assoc(@mysqli_query($db, "SELECT `name`, `picture`, `description`, `price` FROM `catalog` WHERE `id` = {$id}"));
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
<a href="task3.php">Назад</a>
<?php if (isset($good)): ?>
<div class="good">
    <h2><?= $good['name'] ?></h2>
    <img src="img/<?= $good['picture'] ?>" alt="<?= $good['picture'] ?>">
    <p><?= $good['description'] ?></p>
    <p><?= $good['price'] ?> &#8381;</p>
    <button>Купить</button>
</div>
<?php else: ?>
<p>Товар не найден</p>
<?php endif; ?>
</body>
</html>
