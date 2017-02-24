  <?php 

    if(!empty($_POST)){
      $errors = array();

      if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['username'])){
        $errors['username'] = "Pseudo non accepté !";
      }

      if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Adresse email non valide !";
      }

      if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $errors['password'] = "Les mots de passe ne corresponde pas !";
      }  var_dump($errors);
    
      if (empty($errors)){
        require('class_connect.php');

          $req = $pdo-> prepare("INSERT INTO compte SET username = ?, password = ?, email = ?");
          $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
          $req->execute([$_POST['username'], $password, $_POST['email']]);

          die("Votre username à bien été créer !");
      }
    }
    
  ?>
