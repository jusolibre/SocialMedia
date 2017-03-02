<?php
/**
 * Created by PhpStorm.
 * User: linuxboot34
 * Date: 27/02/17
 * Time: 16:48
 */

require_once("Class/class_twig.php");

Class connection
{

    function index()
    {

        $twig = myTwig::create();

        echo $twig->render('connection.twig', [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS
        ]);

    }

    function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

    }
}