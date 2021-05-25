<?php
include "classSimpleImage.php";

// добавляю "/hw4/" так как входная точка сервера на один уровень выше
define("SERVER_PATH", $_SERVER["DOCUMENT_ROOT"] . "/hw4/");

$images = array_slice(scandir(SERVER_PATH . "gallery_img/small/"), 2);

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

            header("Location: /hw4/");
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
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript" src="./scripts/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="./scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="./scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="./scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen"/>
    <script type="text/javascript">
        $(document).ready(function () {
            $("a.photo").fancybox({
                transitionIn: 'elastic',
                transitionOut: 'elastic',
                speedIn: 500,
                speedOut: 500,
                hideOnOverlayClick: false,
                titlePosition: 'over'
            });
        }); </script>

</head>

<body>

<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?php foreach ($images as $image): ?>
            <a rel="gallery" class="photo" href="<?= "gallery_img/big/" . $image ?>">
                <img src="<?= "gallery_img/small/" . $image ?>" width="150" height="100"/></a>
        <?php endforeach; ?>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="userfile">
        <input type="submit" name="submit" value="Загрузить">
    </form>
</div>

</body>
</html>