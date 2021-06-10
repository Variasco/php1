<?php

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

            insertPicture();
            $message = 'Picture have been uploaded';
            break;

        } elseif ($item === end($whitelist)) {
            $message = 'Sorry, we allow uploading only images';
        }
    }
    header("Location: /?page=gallery&message={$message}");
    die();
}

function getGallery() {
    return getAssocResult("SELECT `id`, `name`, `views` FROM `gallery` ORDER BY `views` DESC");
}

function getBigPicture(int $id) {
    return getOneResult("SELECT `id`, `name`, `views` FROM `gallery` WHERE `id` = {$id}");
}

function viewsIncrement(int $id) {
    executeSql("UPDATE `gallery` SET `views` = `views` + 1 WHERE `id` = {$id}");
}

function insertPicture() {
    return executeSql("INSERT INTO `gallery` (`name`) VALUES ('{$_FILES['userfile']['name']}')");
}