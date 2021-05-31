<?php
define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'] . "/hw5/");
$db = @mysqli_connect('localhost', 'root', 'root', 'gallery') or die('Error: ' . mysqli_connect_error());
