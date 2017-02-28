<?php
/**
 * Created by PhpStorm.
 * User: linuxboot34
 * Date: 27/02/17
 * Time: 16:50
 */
require_once("Class/class_twig.php");

Class search {

    function index() {

        $twig = myTwig::create();

        echo $twig->render('search.twig', [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS
        ]);

    }

}