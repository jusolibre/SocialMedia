<?php
/**
 * Created by PhpStorm.
 * User: linuxboot34
 * Date: 27/02/17
 * Time: 16:51
 */
require_once("Class/class_twig.php");

Class complement {

    function insert(){
        if(!empty($_POST)){
            $errors = aray();

            if (empty($_POST['nom'])) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['nom'])){
            $errors['nom'] = "Caractère non accepté !";
            }

            if (empty($_POST['prenom'])) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['prenom'])){
            $errors['prenom'] = "Caractère non accepté !";
            }
        }
    }



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

