<?php
define("SERVER_PATH", $_SERVER['DOCUMENT_ROOT']);
include SERVER_PATH . "/../config/config.php";

session_start();
$session_id = session_id();

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
        if (isset($_GET['action']) && $_GET['action'] == 'buy') {
            $id = (int)$_GET['id'];
            addToCart($session_id, $id);

        }
        break;

    case 'product':
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $params['good'] = getOneGood($id);
        }
        break;

    case 'cart':
        $params['cartGoods'] = fetchCart($session_id);
        $params['total'] = fetchTotalPrice($session_id);
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $id = (int)$_GET['id'];
            deleteCart($id);
            header('location: ?page=cart');
            die();
        }
        break;

    case 'gallery':
        $params['images'] = getGallery();
        $params['message'] = '';
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
}

echo render($page, $params);
