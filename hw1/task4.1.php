<?php
// Используя имеющийся HTML-шаблон, сделать так, чтобы главная страница генерировалась через PHP.
// Создать блок переменных в начале страницы. Сделать так, чтобы h1, title и текущий год
// генерировались в блоке контента из созданных переменных.

// Способ №1
$title = "Some title";
$h1="Some header";
$year = date('Y');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title><?=$title?></title>
</head>
<body>
    <h1><?=$h1?></h1>
</body>
<footer>
    <?=$year?>
</footer>
</html>