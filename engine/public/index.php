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
        $params['images'] = getGallery();
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();

}

_log($params, 'params');


echo render($page, $params);
