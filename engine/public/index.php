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
    'name' => getUser(),
    'auth' => isAuth(),
];

switch ($page) {

    case 'index':
        break;

    case 'login':
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        if (auth($login, $pass)) {
            if (isset($_POST['save'])) {
                $hash = uniqid(rand(), true);
                setHash($_SESSION['id'], $hash);
                setcookie("hash", $hash, time() + 24*3600, "/");
            }
            header("location: {$_SERVER['HTTP_REFERER']}");
            die();
        } else {
            die("Связка логин-пароль не существует");
        }

    case 'logout':
        setcookie("hash", "", time() - 1, "/");
        session_regenerate_id();
        session_destroy();
        header("location: {$_SERVER['HTTP_REFERER']}");
        die();

    case 'admin':
        if (isAdmin()) {
            $params['orders'] = getOrders();
        } else {
            die("У пользователя {$name} недостаточно прав для доступа к этой странице");
        }
        break;

    case 'orderDetails':
        if (isAdmin()) {
            $id = (int)$_GET['id'];
            $userSessionId = getUserSessionId($id);
            $params['cartGoods'] = fetchCart($userSessionId);
            $params['total'] = fetchTotalPrice($userSessionId);
        } else {
            die("У пользователя {$name} недостаточно прав для доступа к этой странице");
        }
        break;

    case 'catalog':
        $params['catalog'] = getCatalog();
        if (isset($_GET['action']) && $_GET['action'] == 'buy') {
            $id = (int)$_GET['id'];
            addToCart($session_id, $id);
            header("location: {$_SERVER['HTTP_REFERER']}");
            die();
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
        $params['message'] = '';
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $id = (int)$_GET['id'];
            deleteCart($id);
            header("location: {$_SERVER['HTTP_REFERER']}");
            die();
        }
        if (isset($_GET['action']) && $_GET['action'] == 'order') {
            order($_POST['name'], $_POST['phone'], $session_id);
            session_regenerate_id();
            $_SESSION['message'] = 'Заказ оформлен';
            header("location: {$_SERVER['HTTP_REFERER']}");
            die();
        }
        if (isset($_SESSION['message'])) {
            $params['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
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
