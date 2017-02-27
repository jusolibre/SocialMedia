<?php
class Database{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
    public function __construct($db_name, $db_user = 'root', $db_pass = 'online', $db_host = 'localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
        $this->getPDO();
    }
    private function getPDO(){ //guetteur
        $pdo = new PDO('mysql:dbname=socialmedia;host=localhost', 'root', 'online');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
    }
    //Recupere les infos du profil
    public function get_profil($statement){
        $req = $this->pdo->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        var_dump($datas);
        return $datas;

    }

    private function addUtilisateur($email) {
        $req = $this->pdo->prepare("INSERT INTO utilisateur SET nom = 'unset', email= ?");
        $req->execute(array($email));
        return $this->pdo->lastInsertId();
    }
    //Envois les les users
    public function addUser($password, $username, $email) {
        $id = $this->addUtilisateur($email);
        $req = $this->pdo->prepare('INSERT INTO compte SET username = ?, password = ?, email = ?, id_utilisateur = ?');
        $newPassword = password_hash($password, PASSWORD_BCRYPT);
        $req->execute(array($username, $newPassword, $email, $id));
        return array($username, $newPassword, $email, $id);
    }

    public function updateUtilisateur($nom, $prenom, $age, $date_naissance, $id){
        $req = $this->pdo->prepare('UPDATE utilisateur SET nom = ?, prenom = ?, age= ?, date_naissance = ? WHERE id= ?');
    }
}
?>
