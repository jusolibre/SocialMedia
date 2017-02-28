<?php
/**
 * Created by PhpStorm.
 * User: linuxboot34
 * Date: 27/02/17
 * Time: 16:49
 */
require_once("Class/class_twig.php");

Class manage {

    function index() {

        $twig = myTwig::create();

        echo $twig->render('manage.twig', [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS
        ]);

    }

}