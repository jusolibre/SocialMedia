<?php
require_once('model_connect_class.php');

class userDatabase
    {
        private $bdd;


        public function __construct()
        {
            $this->bdd = new Database('socialmedia');
        }

        public function updateUtilisateur($nom, $prenom, $age, $date_naissance, $id)
        {
            $req = $this->bdd->prepare("UPDATE utilisateur SET nom= :nom, prenom= :prenom, age= :age, date_naissance= :date_naissance WHERE id= :id");
            $req->bindParam(":nom", $nom);
            $req->bindParam(":prenom", $prenom);
            $req->bindParam(":age", $age);
            $req->bindParam(":date_naissance", $date_naissance);
            $req->bindParam(":id", $id);
            $req->execute();
        }

        public function isFriend($id, $user) {
            if ($id == $user)
                return false;
            $req = $this->bdd->prepare("SELECT * FROM utilisateur WHERE id= :id");
            $req->bindParam(":id", $id);
            $req->execute();
            $reponse = $req->fetch(PDO::FETCH_OBJ);
            if (strstr($reponse['amis'], "," . $user . ","))
                return true;
            else
                return false;
        }

        public function getWall($id) {
            $req = $this->bdd->prepare("SELECT * FROM commentaire WHERE id_mur= :id");
            $req->bindParam(":id", $id);
            $req->execute();
            $reponses = $req->fetchAll(PDO::FETCH_OBJ);
            return $reponses;
        }
        
        public function getUserById($id) {
            $req = $this->bdd->prepare("SELECT * FROM utilisateur WHERE id= :id");
            $req->bindParam(":id", $id);
            $req->execute();
            $reponse = $req->fetch(PDO::FETCH_OBJ);
            return $reponse;
        }
        
        public function findFriends($id) {
            $req = $this->bdd->prepare("SELECT * FROM utilisateur WHERE id= :id");
            $req->bindParam(":id", $id);
            $req->execute();            
            $reponse = $req->fetch(PDO::FETCH_OBJ);
            $friends = $reponse['amis'];
            if ($friends == "")
                return false;
            else {
                $friendlist = explode(",", $friends);
                $usertab = [];
                $i = 0;
                foreach ($friendlist as $friend) {
                    $usertab[$i] = $this->getUserById($friend);
                    $i = $i + 1;
                }
                return $usertab;
            }
        }
        
    }






