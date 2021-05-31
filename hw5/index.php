<?php
include "classSimpleImage.php";
require "db.php";

$images = mysqli_query($db, "SELECT * FROM `images` ORDER BY `views` DESC");

if (isset($_FILES['userfile'])) {
    $whitelist = array(".png", ".jpg", ".gif");
    // Проверка расширения файла по whitelist
    foreach ($whitelist as $item) {
        if (preg_match("/$item\$/i", $_FILES['userfile']['name'])) {

            $path = SERVER_PATH . "gallery_img/big/" . $_FILES['userfile']['name'];
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $path)) {
                $image = new SimpleImage();
                $image->load($path);
                $image->resizeToWidth(150);
                $image->save(str_replace("big", "small", $path));
            }

            mysqli_query($db, "INSERT INTO `images` (`name`) VALUES ('{$_FILES['userfile']['name']}')");
            header("Location: index.php");
            die();

            // Весьма странное условие, но по логике мы не можем выдавать ошибку, пока не прошли по всему массиву
            // Если есть более изящный способ, буду рад узнать
        } elseif ($item === end($whitelist)) {
            die("Sorry, we allow uploading only images");
        }
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя галерея</title>
    <link rel="stylesheet" href="style.css?<?= uniqid(); ?>">
</head>

<body>

<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?php foreach ($images as $image): ?>
            <a rel="gallery" class="photo" href="<?= "big.php?id=" . $image['id'] ?>">
                <img src="<?= "gallery_img/small/" . $image['name'] ?>" width="150" height="100"/></a>
        <?php endforeach; ?>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="userfile">
        <input type="submit" name="submit" value="Загрузить">
    </form>
</div>

</body>
</html>