<?php
require_once("Class/class_twig.php");
require_once(SQL . "/model_connect_class.php");
// Enumerer tous les membres

class friends {
   
     function renderPage($data) {

        $twig = myTwig::create();

        echo $twig->render('friends.twig', [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS,
            'data' => $data
        ]);
    }


   function index($tab = null) {

    $db = new Database('socialmedia');
    $bdd = $db->getter();


    $display = "";


    if ((isset($tab[0]) && $tab[0] == 'search' &&
    isset($tab[1]) && $tab[1] != 'add' &&
    $tab[1] != 'remove' && $tab[1] != 'search') ||
    (isset($tab[2]) && $tab[2] == 'search' &&
    isset($tab[3]) && $tab[3] != 'add' &&
    $tab[3] != 'remove' && $tab[3] != 'search')) {
        $search = $tab[3];
    }
    if (isset($_POST) && isset($_POST['search'])) {
        $search = $_POST['search'];
    }

    if (isset($search)) {
        $display = $display . "<header>Result for search : " . $search . "</header>";
    }

   if (isset($tab[0]) && $tab[0] == 'add' && $tab[1] != 'remove' && $tab[1] != 'add' && $tab[1] != 'search')
 {
  $add = htmlspecialchars(($tab[1]));
  $req = $bdd->query("SELECT * FROM amis WHERE utilisateur1 = '" . $tab[1] . "' AND utilisateur2 = '" . $_SESSION['user']->id . "'");
  $reponse = $req->fetch(PDO::FETCH_ASSOC);

  if (!$reponse)
 {
   $req = $bdd->query("INSERT INTO amis VALUES ('" . $tab[1] . "', '" . $_SESSION['user']->id . "')");
 }}
  else if (isset($tab[0]) && $tab[0] == 'remove' && $tab[1] != 'remove' && $tab[1] != 'add' && $tab[1] != 'search')
  {
      $remove = htmlspecialchars($tab[1]);
      $req = $bdd->query("DELETE FROM amis WHERE utilisateur1 = '" . $tab[1] . "' AND utilisateur2 = '" . $_SESSION['user']->id . "'");
  }
    
   if (isset($search)) {
       $req = $bdd->query("SELECT prenom, nom, id FROM utilisateur WHERE nom LIKE '%" . $search . "%' OR prenom LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%' OR email LIKE '%" . $search . "%' OR pays LIKE '%" . $search . "%' OR ville LIKE '%" . $search . "%' ORDER BY id");
   } else {
       $req = $bdd->query("SELECT prenom, nom, id FROM utilisateur ORDER BY id");
   }
    $donnees = $req->fetchAll(PDO::FETCH_ASSOC);

    if (isset($search))
        $post = "/search/" . $search . "/";
    else
        $post = "";
    
   foreach ($donnees as $key)
 {
     if ($key['prenom'] == $_SESSION['user']->prenom)
         {
             continue;
         }
    $display = $display . "<li><a href='". WEBROOT . "profil/display&" . $key['id'] . "'>" . $key['prenom'] . " " . $key['nom'] . "</a>";
      $follow = "Suivre";

      $req1 = $bdd->query("SELECT * FROM amis WHERE utilisateur1 = '" . $key['id'] . "' AND utilisateur2 = '" . $_SESSION['user']->id . "'");
       $reponse1 = $req1->rowCount();

      $req2 = $bdd->query("SELECT * FROM amis WHERE utilisateur1 = '" . $_SESSION['user']->id . "' AND utilisateur2 = '" . $key['id'] . "'");
      $reponse2 = $req2->rowCount();

    if (!$reponse1)
     {
       $display = $display . " <a href='". WEBROOT ."friends/index&add/" . $key['id'] . $post . "'><button class='button'>follow</button></a></li>";
    }
     else
    {        
      $display = $display . " <a href='". WEBROOT ."friends/index&remove/" . $key['id'] . $post . "'><button class='button2'>Suprimmer</button></a></li>";
    }
   }
   $this->renderPage($display);
 }


 }
?>


















