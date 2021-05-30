<?php
define("SERVER_PATH", $_SERVER['DOCUMENT_ROOT']);
include SERVER_PATH . "/../config/config.php";

$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params = [
    'name' => 'Админ'
];

switch ($page) {

    case 'index':
        break;

    case 'catalog':
        $params['catalog'] = getCatalog();
        break;

    case 'files':
       // if ($_POST[$_FILES]) {
            //upload();
           /// header();
      //  }
       // $params['message'] = $mes[$_GET['message']];
        $params['files'] = getFiles();
        break;

    case 'gallery':
        $params['images'] = getAssocResult("SELECT `id`, `name`, `views` FROM `images` ORDER BY `views` DESC");
        $params['message'] = $message;
        break;

    case 'big_picture':
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $params['row_affected'] = executeSql("UPDATE `images` SET `views` = `views` + 1 WHERE `id` = {$id}");
            $params['bigImage'] = getOneResult("SELECT `id`, `name`, `views` FROM `images` WHERE `id` = {$id}");
            break;
        }

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}


echo render($page, $params);
