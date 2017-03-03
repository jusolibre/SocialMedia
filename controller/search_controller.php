<?php
/**
 * Created by PhpStorm.
 * User: linuxboot34
 * Date: 27/02/17
 * Time: 16:50
 */
require_once("Class/class_twig.php");

Class search {

    function renderPage($page) {

        $twig = myTwig::create();

        echo $twig->render($page, [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS
        ]);

    }
    
    function searchUser() {
        
    }
    
    function index() {
        
        echo $twig->render($page, [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS
        ]);
        
    }

}