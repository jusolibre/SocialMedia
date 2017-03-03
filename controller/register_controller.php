<?php
require_once("Class/class_twig.php");
require_once( SQL . '/model_account_class.php');


Class register {

    private function myRender($page) {

        $twig = myTwig::create();

        echo $twig->render($page, [
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
                $pdo = new accountDatabase('socialmedia');
                $pdo->addUser($_POST["password"], $_POST["username"], $_POST["email"]);
                $this->myRender('complementaire.twig');
            }
            else {

                $this->myRender('register.twig');

            }
        } else {

            $this->myRender('register.twig');

        }
    }

    function index() {

        $this->myRender('register.twig');
    }
    
    function checkuser() {
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
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $pdo = new accountDatabase('socialmedia');
            $reponse = $pdo->checkUser($username);
        
            if ($reponse === true) {
              $ret = $pdo->addUser($password, $username, $email);
              $_SESSION['user'] = $ret;
              $_SESSION['id'] = $ret['id'];
              echo "0";
            }  
        }
     
    }
}
?>
