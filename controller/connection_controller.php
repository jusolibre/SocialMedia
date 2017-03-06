<?php
/**
 * Created by PhpStorm.
 * User: linuxboot34
 * Date: 27/02/17
 * Time: 16:48
 */

require_once("Class/class_twig.php");
require_once (SQL . '/model_user_class.php');

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


    function login(){
        $username = $_POST["username"];
        $db = new userDatabase();
        $password = $_POST["password"];

        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $user = $db->login($username, $password);
            if($user == false){
                echo 'Mauvais mot de passe ou mauvais pseudo ';
            }else {
                $_SESSION['id'] = $user['id_utilisateur'];
                $_SESSION['logged'] = true;
                session_write_close();
                    header('Location: ' . WEBROOT . "profil");
            }

        }


    }

}
