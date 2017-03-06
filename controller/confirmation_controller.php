<?php
/**
 * Created by PhpStorm.
 * User: bootlinux32
 * Date: 28/02/17
 * Time: 13:44
 */

require_once("Class/class_twig.php");
require_once ( SQL . '/model_account_class.php');


Class confirmation {

    function index (){

        $twig = myTwig::create();

        echo $twig->render('confirmation.twig', [
            'logged' => $_SESSION["logged"],
            'user' => $_SESSION["user"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS
        ]);

    }


    function myRender($page){
        $twig = myTwig::create();

        echo $twig->render($page, [
            'logged' => $_SESSION["logged"],
            'user' => $_SESSION["user"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS
        ]);
    }


    function matchToken() {
        $id = $_SESSION["id"];
        $db = new accountDatabase('socialmedia');
        if(isset($_POST['token'])){
            $token = $_POST['token'];
            $data = $db->matchToken($id);
            if($data['confirmation_token'] == $token){

                $db->updateToken($id);

                session_write_close();
                header("Location: " . WEBROOT . "profil");
            }

            else {
                $this->myRender('confirmation.twig');
            }

        }
    }


}

?>