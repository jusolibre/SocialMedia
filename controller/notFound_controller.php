<?php
/**
 * Created by PhpStorm.
 * User: linuxboot34
 * Date: 27/02/17
 * Time: 16:52
 */
require_once("Class/class_twig.php");

Class notFound {

    function index() {

        $twig = myTwig::create();

        echo $twig->render('404.twig', [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET
        ]);

    }

}