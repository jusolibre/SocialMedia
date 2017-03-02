<?php

require_once("Class/class_twig.php");
require_once("Class/class_connect.php");

Class complement {

    function insert(){
        if(!empty($_POST)){
            $errors = array();

            if (empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['nom'])) {
            $errors['nom'] = "Caractère non accepté !";
            }

            if (empty($_POST['prenom']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['prenom'])) {
            $errors['prenom'] = "Caractère non accepté !";
            }

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $age = $_POST['age'];
            $date_naissance = $_POST['naissance'];

            $db = new Database('socialmedia');

            $db->updateUtilisateur($nom, $prenom, $age, $date_naissance, $_SESSION['id']);

            $twig = myTwig::create();

            echo $twig->render('confirmation.twig', [
                'logged' => $_SESSION['logged'],
                'root' => WEBROOT,
                'asset' => ASSET,
                'js' => JS
            ]);

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
 function upDate() {

        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['naissance']) && isset($_POST['id'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $age = $_POST['age'];
            $date_naissance = $_POST['naissance'];

            $id = $_POST['id'];

            $pdo = new userDatabase();
            $pdo->updateUtilisateur($nom, $prenom, $age, $date_naissance, $id);
        }
    }
}

