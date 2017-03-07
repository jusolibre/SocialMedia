<?php
session_start();
if (!isset($_SESSION["logged"])) {
    if (isset($_COOKIE['id'])) {
        $_SESSION["logged"] = 1;
        $_SESSION["id"] = $_COOKIE['id'];
        $_SESSION["user"] = $_COOKIE['user'];
    }
    else
        $_SESSION["logged"] = 0;
}

require 'vendor/autoload.php';


define('ASSET', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']) . "assets/");
define('JS', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']) . "assets/js/");
define('SQL', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']) . "Sql");
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

if (isset($_GET['p']))
    $params = explode('/', $_GET['p']);

if ((isset($params[0]) && !empty($params[0])
    && file_exists("controller/" . $params[0] . "_controller.php")))
    $controllerName = $params[0];
else
    $controllerName = 'home';

if ($_SESSION['logged'] == false && $controllerName != 'connection' && $controllerName != "register" && $controllerName != "complement")
    $controllerName = 'home';

if (isset($_GET['id'])) {
    $actionParam = explode('/', $_GET['id']);
}

$actionName = isset($params[1]) ? $params[1] : 'index';


require_once("controller/" . $controllerName . "_controller.php");


$controller = new $controllerName;

if (!method_exists($controller, $actionName)) {
    $actionName = 'index';
}


if (isset($actionParam)){
    $controller->$actionName($actionParam);
}
else {
    $controller->$actionName();
}

?>