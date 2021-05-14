<?php
// Используя имеющийся HTML-шаблон, сделать так, чтобы главная страница генерировалась через PHP.
// Создать блок переменных в начале страницы. Сделать так, чтобы h1, title и текущий год
// генерировались в блоке контента из созданных переменных.

// Способ №3
$title = "Some title";
$h1 = "Some header";
$year = date('Y');

$content = file_get_contents("main.php");
$content = str_replace("{{ title }}", $title, $content);
$content = str_replace("{{ h1 }}", $h1, $content);
$content = str_replace("{{ year }}", $year, $content);
echo $content;