<?php
/**
 * Created by PhpStorm.
 * User: bootlinux32
 * Date: 28/02/17
 * Time: 13:44
 */

require_once("Class/class_twig.php");
require_once ('Class/class_connect.php');


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


    function myRender($page){
        $twig = myTwig::create();

        echo $twig->render($page, [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS
        ]);
    }


    function matchToken() {
        $id = $_SESSION["id"];
        /*echo $_SESSION["logged"];
        echo $_SESSION["id"];*/
        $db = new Database('socialmedia');
        if(isset($_POST['token'])){
            $token = $_POST['token'];
            $data = $db->matchToken($id);
            /* echo "$token == " . $data['confirmation_token'];*/
            if($data['confirmation_token'] == $token){

                $db->updateToken($id);

                $this->myRender('profil.twig');
            }

            else {
                $this->myRender('confirmation.twig');
            }

        }
    }


}

?>