<?php


	class Database{

		private $db_name; 
		private $db_user; 
		private $db_pass; 
		private $db_host;

		public function __construct($db_name, $db_user = 'root', $db_pass = 'online', $db_host = 'localhost'){

			$this->db_name = $db_name;
			$this->db_user = $db_user;
			$this->db_pass = $db_pass;
			$this->db_host = $db_host;
		}

		private function getPDO(){ //guetteur 
			$pdo = new PDO('mysql:dbname=socialmedia;host=localhost', 'root', 'online');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$this->pdo = $pdo;
			return $pdo;
		}


		//Recupere les infos du profil pour les affichers
		public function get_profil($statement){

			$req = $this->getPDO()->query($statement);
			$datas = $req->fetchAll(PDO::FETCH_OBJ);
			var_dump($datas);
			return $datas;

		}
	}	


?>
