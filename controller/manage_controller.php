<?php

require_once("Class/class_twig.php");
require_once (SQL . "/model_user_class.php");

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
/*    public function uploadImg()
    {
        var_dump($_FILES);
        $imgProfile ="imgProfile/";
        $chemin = ROOT . $imgProfile . $_SESSION['id'] . '.svg';
        echo $chemin;
        if *//*(move_uploaded_file($_FILES['img']['tmp_name'], $chemin)) {*/
            /*(move_uploaded_file($_FILES['img']['tmp_name'], __DIR__.'/imgProfile')){
            echo 'Upload effectué !';
        }
        else{
            echo 'Echec de l\'upload  !';
        }
    }*/

/*    public function uploadImg(){
        var_dump($_FILES);
        if (move_uploaded_file($_FILES['img']['tmp_name'], __DIR__.'/uploads')){
            echo 'ok';
        }
    }*/


    public function manage(){
        $setting = new userDatabase();
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $setting->manageEmail($_SESSION['id'], $email);
        }

        if(isset($_POST['date_naissance'])) {
            $date_naissance = $_POST['date_naissance'];
            $setting->manageDate_naissance($_SESSION['id'], $date_naissance);
        }

        if (isset($_POST['pays'])){
            $pays = $_POST['pays'];
            $setting->managePays($_SESSION['id'], $pays);
        }

        if (isset($_POST['ville'])){
            $ville = $_POST['ville'];
            $setting->manageVille($_SESSION['id'], $ville);
        }

        if (isset($_POST['description'])){
            $description = $_POST['description'];
            $setting->manageDescription($_SESSION['id'], $description);
        }

    }


}


