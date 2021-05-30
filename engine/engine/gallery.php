<?php

$db = @mysqli_connect('localhost', 'root', 'root', 'gallery') or die('Error: ' . mysqli_connect_error());

$message = '';

if (isset($_FILES['userfile'])) {
    $whitelist = array(".png", ".jpg", ".gif");
    // Проверка расширения файла по whitelist
    foreach ($whitelist as $item) {
        if (preg_match("/$item\$/i", $_FILES['userfile']['name'])) {

            $path = SERVER_PATH . "/gallery_img/big/" . $_FILES['userfile']['name'];
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $path)) {
                $image = new SimpleImage();
                $image->load($path);
                $image->resizeToWidth(150);
                $image->save(str_replace("big", "small", $path));
            }

            executeSql("INSERT INTO `images` (`name`) VALUES ('{$_FILES['userfile']['name']}')");
            $message = 'Фото успешно загружено';
            header("Location: /?page=gallery&message={$message}");
            die();

        } elseif ($item === end($whitelist)) {
            die("Sorry, we allow uploading only images");
        }
    }
}

if (isset($_GET['message'])) {
    $message = strip_tags($_GET['message']);
}