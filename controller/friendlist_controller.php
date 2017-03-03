<?php
require_once(SQL . '/model_user_class.php');

Class friendlist {

    private function myRender($page, $data) {

        $twig = myTwig::create();

        echo $twig->render($page, [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS,
            'friendlist' => $data
        ]);

    }
    
    function index() {
        $db = new userDatabase('socialmedia');
        $friendlist = $db->findFriends($_SESSION["id"]);
        myRender('friendlist.twig', $friendlist);
    }
    
}

?>