<?php
require_once('model_connect_class.php');

class accountDatabase
{
    private $bdd;


    public function __construct()
    {
        $db = new Database('socialmedia');
        $this->bdd = $db->getter();
    }

    private function addUtilisateur($email)
    {
        $req = $this->bdd->prepare("INSERT INTO utilisateur SET nom = 'unset', email= ?");
        $req->execute(array($email));
        return $this->bdd->lastInsertId();
    }

    public function str_random($lenght)
    {
        $alpha = '0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN';
        $tmp = substr(str_shuffle(str_repeat($alpha, $lenght)), 0, $lenght);
        return $tmp;
    }

    public function addUser($password, $username, $email)
    {
        $id = $this->addUtilisateur($email);
        $req = $this->bdd->prepare('INSERT INTO compte SET username = ?, password = ?, email = ?, id_utilisateur = ?, confirmation_token = ?');
        $newPassword = password_hash($password, PASSWORD_BCRYPT);
        $token = $this->str_random(60);
        $_SESSION["id"] = $id;
        $req->execute(array($username, $newPassword, $email, $id, $token));
        $_SESSION["user"] = array($username, $newPassword, $email, $id, $token);
        return true;
    }

    public function checkUser($username)
    {
        $req = $this->bdd->prepare("SELECT * FROM compte WHERE username = :user");
        $req->bindParam(':user', $username, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch(PDO::FETCH_OBJ);
        if ($reponse) {
            echo "1";
            return false;
        } else {
            return true;
        }

    }

    public function matchToken($id_utilisateur)
    {
        $req = $this->bdd->prepare('SELECT * FROM compte WHERE id_utilisateur= :id');
        $req->bindParam(':id', $id_utilisateur);
        $req->execute();
        $data = $req->fetch();
        return $data;
    }

    public function updateToken($id)
    {
        $req = $this->bdd->prepare('UPDATE compte SET token_stat= :confirmation_token  WHERE id_utilisateur= :id');
        $tmp = true;
        $req->bindParam(':confirmation_token', $tmp, PDO::PARAM_BOOL);
        $req->bindParam(':id', $id);
        $req->execute();
    }
}