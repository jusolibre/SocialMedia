
function checkUser()
    { // Vérifier la disponibilité du nom d'utilisateur
      
      // Construire la requête Ajax
      var user = $('#username')
      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "{{root}}register/checkUser", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              $('#info').innerHTML = this.responseText
      }
      request.send(params)
    }

    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }


    
    var form = document.getElementById('register');
    form.addEventListener("submit", function (e) {

        
    var username = form.elements.username.value;
    var email = form.elements.email.value;
    var password = form.elements.password.value;
    var password_confirm = form.elements.password_confirm.value;

    var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/;

    var message = "Le mot de passe est OK!";

    if (username.length < 3 || username.length > 16) { 
        document.getElementById('user').textContent = "Le nom de l'utilisateur doit avoir entre 3 et 16 caractères";
        e.preventDefault();
         return false;
      }
      else {
        document.getElementById('user').textContent = "Le nom de l'utilisateur est bon";
       
      }
      if (!regexEmail.test(email)) {
        document.getElementById('email').textContent = "Veuillez entrer un email valide";
        e.preventDefault();
        return false;
      }
      else {
        document.getElementById('email').textContent = "L'émail est valide";
      }

        if (password === password_confirm) {
          if (password.length >= 6) {
            var regexMdp = /\d+/;
            if (!regexMdp.test(password)) {
              message = "Erreur : le mot de passe ne contient aucun chiffre";
              document.getElementById('pass').textContent = message;
              e.preventDefault();
              return false;
            }
          }
          else {
              message = "Erreur : la longueur du mot de passe doit être d'au moins 6 caractères";
              document.getElementById('pass').textContent = message;
              e.preventDefault();
              return false;
            }  
        }
          else {
              message = "Erreur : les mots de passe sont différents";
              document.getElementById('pass').textContent = message;
              e.preventDefault();
              return false;
            }

        document.getElementById('pass').textContent = message;
    return true;
   });

