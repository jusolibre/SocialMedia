<?php
	class Database{
		private $db_name; 
		private $db_user; 
		private $db_pass; 
		private $db_host;
        private $pdo;

		public function __construct($db_name, $db_user = 'root', $db_pass = 'admin', $db_host = 'localhost'){
			$this->db_name = $db_name;
			$this->db_user = $db_user;
			$this->db_pass = $db_pass;
			$this->db_host = $db_host;
		    $this->getPDO();
		}

        private function getPDO(){ //guetteur
			$pdo = new PDO('mysql:dbname=socialmedia;host=localhost', 'root', 'admin');
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

        // function pour generer un token à chaque nouveaux membre validation par email
        public function str_random ($lenght){
            $alpha = '0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN';
            $tmp = substr(str_shuffle(str_repeat($alpha, $lenght)), 0, $lenght);
            echo($tmp);
            return $tmp;
        }

        //Envois les les users
        public function addUser($password, $username, $email) {
            $id = $this->addUtilisateur($email);
            $req = $this->pdo->prepare('INSERT INTO compte SET username = ?, password = ?, email = ?, id_utilisateur = ? confirmation_token = ?');
            $newPassword = password_hash($password, PASSWORD_BCRYPT);
            $token = $this->str_random(60);
            die();
            $req->execute(array($username, $newPassword, $email, $id, $token));
            $mail($_POST['email'],
                'Confirmation de votre compte', "Pour le valider cliquer sur ce lien : \n \n http://localhost/new/SocialMedia/confirm.php?id=$username&token=$token");
            $username = $pdo->lastInsertId;
            return array($username, $newPassword, $email, $id, $token);
            /*header('Location: login.php');*/
        }

        public function updateUtilisateur($nom, $prenom, $age, $date_naissance, $id) {
        	$req = $this->pdo->prepare("UPDATE utilisateur SET nom=?, prenom=?, age=?, date_naissance=? WHERE id=?");
            $req->execute(array($nom, $prenom, $age, $date_naissance, $id));
        }

	}
?>

