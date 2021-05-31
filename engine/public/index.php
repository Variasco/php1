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
        $params['files'] = getFiles();
        break;

    case 'gallery':
        $params['images'] = getGallery();
        if (isset($_GET['message'])) {
            $params['message'] = strip_tags($_GET['message']);
        }
        break;

    case 'big_picture':
        if (isset($_GET['id'])) {
            viewsIncrement($_GET['id']);
            $params['bigImage'] = getBigPicture($_GET['id']);
        }
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}

echo render($page, $params);
