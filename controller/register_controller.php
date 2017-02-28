<?php
require_once("Class/class_twig.php");


Class register {

    private function myRender() {

        $twig = myTwig::create();

        echo $twig->render('register.twig', [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS
        ]);

    }

    function insert()
    {
        if (!empty($_POST)) {
            $errors = array();
            if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['username'])) {
                $errors['username'] = "Pseudo non accepté !";
            }
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Adresse email non valide !";
            }
            if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
                $errors['password'] = "Les mots de passe ne corresponde pas !";
            }
            if (empty($errors)) {
                require('Class/class_connect.php');
                $pdo = new Database('socialmedia');
                $pdo->addUser($_POST["password"], $_POST["username"], $_POST["email"]);
            }
            else {

                $this->myRender();

            }
        } else {

            $this->myRender();

        }
    }

    function index() {

        $this->myRender();
    }

}
?>