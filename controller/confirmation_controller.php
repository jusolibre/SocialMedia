<?php
/**
 * Created by PhpStorm.
 * User: bootlinux32
 * Date: 28/02/17
 * Time: 13:44
 */

    require_once("Class/class_twig.php");

    Class confirmation {

        function index (){

             $twig = myTwig::create();

            echo $twig->render('confirmation.twig', [
                'logged' => $_SESSION["logged"],
                'root' => WEBROOT,
                'asset' => ASSET,
                'js' => JS
            ]);

        }

        function verification (){
            if (!empty($_POST)){
                if
            }

        }


    }

?>