<?php

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
    public function uploadImg()
    {
        var_dump($_FILES);
        $imgProfile ="imgProfile/";
        $chemin = ROOT . $imgProfile . $_SESSION['id'] . '.svg';
        echo $chemin;
        if (move_uploaded_file($_FILES['img']['tmp_name'], $chemin)) {
            echo 'Upload effectué !';
        }
        else{
            echo 'Echec de l\'upload  !';
        }
    }
}