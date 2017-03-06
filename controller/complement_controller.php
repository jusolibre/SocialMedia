<?php

require_once("Class/class_twig.php");
require_once( SQL . "/model_user_class.php");

Class complement {

    function renderPage($page) {
        $twig = myTwig::create();

        echo $twig->render($page, [
            'logged' => $_SESSION['logged'],
            'user' => $_SESSION['user'],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS
        ]);
    }

    function test() {

        $db = new userDatabase();
        $data = $db->getUserbyId($_SESSION['id']);
        
        $var = [
            "user" => "test",
            "name" => "vache"
        ];

        echo $_SESSION['id'] . " est votre id<br>";
        echo "vos données sont :<br>";
        var_dump($_SESSION['user']);
        echo "data are => <br>";
        var_dump($data);
        
    }

    function insert(){
        if(!empty($_POST)){
            $errors = array();

            if (!isset($_POST['nom']) || empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['nom'])) {
                $errors['nom'] = "Caractère non accepté !";
            }

            if (!isset($_POST['prenom']) || empty($_POST['prenom']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['prenom'])) {
                $errors['prenom'] = "Caractère non accepté !";
            }

            if (empty($errors)) {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $age = $_POST['age'];
                $date_naissance = $_POST['naissance'];

                $db = new userDatabase('socialmedia');

                $db->updateUtilisateur($nom, $prenom, $age, $date_naissance, $_SESSION["id"]);
                header('Location: '. WEBROOT . '/confirmation');
            }
        }
    }

    function index() {

        $this->renderPage('complement.twig');

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

