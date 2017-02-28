<?php
session_start();
$_SESSION["logged"] = 0;
require 'vendor/autoload.php';


define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));


$params = explode('/', $_GET['p']);

if ((isset($params[0]) && !empty($params[0])
    && file_exists("controller/" . $params[0] . "_controller.php")))
    $controllerName = $params[0];
else
    $controllerName = 'home';

$actionName = isset($params[1]) ? $params[1] : 'index';


if (isset($_GET['p'])) {
   $page = $_GET['p'];
}


require_once("controller/" . $controllerName . "_controller.php");


$controller = new $controllerName;

if (!method_exists($controller, $actionName)) {
    $actionName = 'index';
}

$controller->$actionName();

?>