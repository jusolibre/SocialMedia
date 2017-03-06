<?php
/**
 * Created by PhpStorm.
 * User: linuxboot34
 * Date: 27/02/17
 * Time: 16:48
 */
require_once("Class/class_twig.php");
require_once( SQL . "/model_user_class.php");

Class profil
{
    function renderPage($page, $user, $wall) {

        $twig = myTwig::create();

        echo $twig->render($page , [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS,
            'friend' => 2,
            'user' => $user,
            'wall' => $wall
        ]);
        
    }

    function post() {
        $user = new userDatabase();

        if (isset($_POST['message']) && !empty($_POST['message'])) {
            $message = $_POST['message'];
            
            if (isset($_POST['pageId']) && !empty($_POST['pageId'])) {
                $pageId = $_POST['pageId'];
                $user->insertWall($pageId, $message, $_SESSION['id']);
            } else {
                $user->insertWall($_SESSION['id'], $message, $_SESSION['id']);
            }            
            echo "0";
        } else {            
            echo "1";            
        }
    }
    
    function display($tab) {

        if (!isset($tab) || !isset($tab[0])) {
            $profil = new profil;
            $profil->index();
        }
        else {
            $db = new userDatabase();
            $user = $db->getUserById($_SESSION['id']);
            $wall = $this->getWall($tab[0], $db);
            $this->renderPage('display.twig', $user, $wall);
        
        }
        
    }

    function getWall($id, $db) {
        $messages = $db->getWall($id);
        $wall = [];
        $i = 0;
        foreach ($messages as $message) {
            echo "<br>" . $message['id_utilisateur'] . "<br>";
            $tmpTab = [
                "user" => $db->getUserById($message['id_utilisateur']),
                "message" => $message
            ];
            $wall[$i] = $tmpTab;
            $i = $i + 1;
        }
        $_SESSION['displayed'] = $i;
        return $wall;
    }

    function getToWall($id, $db) {
        $messages = $db->getWall($id);
        $wall = [];
        $i = 0;
        foreach ($messages as $message) {

            if ($i < $_SESSION['displayed']) {
                $tmpTab = [
                    "user" => $db->getUserById($message['id_utilisateur']),
                    "message" => $message
                ];
                $wall[$i] = $tmpTab;
            }
            $i = $i + 1;
        }
        $_SESSION['displayed'] = $i;
        return $wall;
    }

    function myDisplayNew($datas) {
        foreach ($datas as $data) {
            echo "<div class=\"topMargin\">
				<header>
					<h3>What happen's recently ?</h3>
				</header>
				<div class=\"row\">
		     		<div class=\"10u -1u 10u(mobile) -1u(mobile) 10u(tablet) -1u(tablet)\">
		     			<p> $data.user.prenom $data.user.nom à dit :</p>
						<p> $data.message.message </p>
		     		</div>
				</div>
				<div class=\"row\">
					<div class=\"4u -4u 4u(mobile) -4u(mobile) 4u(tablet) -4u(tablet)\">
		          		<div class=\"footer\">What about the hour here ?</div>
		     		</div>
				</div>
			</div>";
        }
    }

    function displayNew() {
        $db = new userDatabase();
        $wall = $this->getToWall($_SESSION['id'], $db);
        $this->myDisplayNew($wall);
    }

    function index()
    {
        $db = new userDatabase();
        $user = $db->getUserById($_SESSION['id']);
        $wall = $this->getWall($_SESSION['id'], $db);
        $this->renderPage('profil.twig', $user, $wall);
    }

    function deco(){
        $_SESSION = array();
        session_destroy();
        header('Location:' . WEBROOT . 'home');
    }
}