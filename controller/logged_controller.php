<?php
/**
 * Created by PhpStorm.
 * User: linuxboot34
 * Date: 27/02/17
 * Time: 16:51
 */
require_once("Class/class_twig.php");

Class logged {

    function index() {

        $twig = myTwig::create();

        echo $twig->render('home.twig', [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS
        ]);

    }


}