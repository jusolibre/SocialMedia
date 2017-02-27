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
            //Envois les les users
		public function addUser($password, $username, $email) {

            $req = $this->pdo->prepare('INSERT INTO compte SET username = ?, password = ?, email = ?, id_utilisateur = 1');
            $newPassword = password_hash($password, PASSWORD_BCRYPT);
            $req->execute(array($username, $newPassword, $email));
            die("Votre compte à bien été créer !");

        }

	}

?>



?>
