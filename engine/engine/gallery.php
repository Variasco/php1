<?php
include SERVER_PATH . "/../engine/classSimpleImage.php";

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

            header("Location: /?page=gallery");
            die();

        } elseif ($item === end($whitelist)) {
            die("Sorry, we allow uploading only images");
        }
    }
}

function getGallery() {
    return array_slice(scandir(SERVER_PATH . "/gallery_img/small/"), 2);
}