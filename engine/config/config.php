<?php
define('TEMPLATES_DIR', SERVER_PATH . '/../templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'root');
define('DB', 'gallery');

include SERVER_PATH . "/../engine/db.php";
include SERVER_PATH . "/../engine/function.php";
include SERVER_PATH . "/../engine/files.php";
include SERVER_PATH . "/../engine/catalog.php";
include SERVER_PATH . "/../engine/log.php";
include SERVER_PATH . "/../engine/classSimpleImage.php";
include SERVER_PATH . "/../engine/gallery.php";