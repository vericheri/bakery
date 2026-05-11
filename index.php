<?php
session_start();
error_reporting(E_ALL);
ini_set('display_error', 1);
define('BASE_PATH', __DIR__);

require_once BASE_PATH . '/core/controller.php';
require_once BASE_PATH . '/controllers/homecontroller.php';
require_once BASE_PATH . '/models/menu.php';

$controller = new homecontroller();
$controller->index();
?>