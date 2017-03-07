<?php
require_once("Class/class_twig.php");
require_once(SQL . "/model_connect_class.php");
// Enumerer tous les membres
class freinds {
   
     function freinds() {

        $twig = myTwig::create();

        echo $twig->render('freinds.twig', [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS
        ]);
    }


   function trouverMembres() {

    $db = new Database('socialmedia');
    $bdd = $db->getter();
    $req = $bdd->query("SELECT username FROM compte ORDER BY username");
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    var_dump($donnees);

   foreach ($donnees as $key => $value)
 {
    if ($donnees['username'] == $user)
         {
          continue;
          }
    echo "<li><a href='members.php?view="$donnees['username']."'>".$donnees['username']."</a>";
      $follow = "Suivre";

      $req1 = $this->db->query("SELECT * FROM amis WHERE utilisateur1 = '".$donnees['username']."' AND utilisateur2 = '$user'");
       $reponse1 = $req1->rowCount();

      $req1 = $this->db->query("SELECT * FROM amis WHERE utilisateur1 = '$user' AND utilisateur2 = '".$donnees['username']."'");
      $reponse2 = $req2->rowCount();

         if (($reponse1 + $reponse2) > 1)
        {
         echo "&harr; est un ami mutuel";
        }
     elseif ($reponse1)
      {
       echo "&larr; vous le suivez";
      }
     elseif ($reponse2)
   {
      echo "$rarr; vous suit";
      $follow = "réciproque"; 
    } 
    if (!$reponse1)
     {
       echo " [<a href='members.php?add=".$donnees['username']."'>$follow</a>]";
    }
     else
    {
      echo " [<a href='members.php?add=".$donnees['username']."'>Suprimmer</a>]";
    }
   }
 }

 Ajouter ou supprimer un ami

if (isset($_GET['add']))
 {
  $add = htmlspecialchars(($_GET['add']));
  $req = $this->db->query("SELECT * FROM amis WHERE utilisateur1 = '$add' AND utilisateur2 = '$user'");
  $reponse = $req->fetch(PDO::FETCH_ASSOC);

  if (!$reponse)
 {
   $req = $this->db->query("INSERT INTO amis VALUES ('$add', '$user')");
  }
  elseif (isset($_GET['remove']))
  {   $remove = htmlspecialchars(($_GET['remove']));
   $req = $this->db->query("DELETE FROM amis WHERE utilisateur1 = '$remove' AND utilisateur2 = '$user'");
}
 }
 }
?>


















