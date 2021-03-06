
$(document).ready(function() {
    // Lorsque je soumets le formulaire 
    $('#register').on('submit', function (e) {
	// J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire
        e.preventDefault();
	
	// Je récupère les valeurs     
	var username = $('#username').val();
	var email = $('#mail').val();
	var password = $('#password').val();
	var password_confirm = $('#pass_confirm').val();

	var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/;
	var message = "Le mot de passe est OK!";

	// Je vérifie une première fois pour ne pas lancer la requête HTTP
	if (username.length < 3 || username.length > 16) { 
            document.getElementById('user').textContent = "Le nom de l'utilisateur doit avoir entre 3 et 16 caractères";
	}
	else {
            document.getElementById('user').textContent = "Le nom de l'utilisateur est bon";
	    
	}
	if (!regexEmail.test(email)) {
            document.getElementById('email').textContent = "Veuillez entrer un email valide";
	}
	else {
            document.getElementById('email').textContent = "L'émail est valide";
	}
	
        if (password.length < 6) {
            message = "Erreur : la longueur du mot de passe doit être d'au moins 6 caractères";
            document.getElementById('pass').textContent = message;
        }
        
        var regexMdp = /\d+/;
        if (!regexMdp.test(password)) {
            message = "Erreur : le mot de passe ne contient aucun chiffre";
            document.getElementById('pass').textContent = message;
        }

        if (password === password_confirm) {
            document.getElementById('pass').textContent = message;
        }
        else {
            message = "Erreur : les mots de passe sont différents";
            document.getElementById('pass').textContent = message;
        }
        $.ajax({
            url: "http://localhost/html/SocialMedia/register/checkuser",// Le nom du fichier indiqué dans le formulaire
            type: "post", // La méthode indiquée dans le formulaire (get ou post)
            data: "username=" + $('#username').val() + "&password=" + $('#password').val() + "&email=" + $('#mail').val() + "&password_confirm=" + $('#pass_confirm').val(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
            dataType: 'text',
            success: function(html) { // Je récupère la réponse du fichier PHP
                console.log(html);
                if (html[0] == "0") {
                    $(location).attr('href', 'http://localhost/html/SocialMedia/profil');
                    console.log("ok");
                }
                else {
                    message = "Le nom de l'utilisateur n'est pas disponible";
                    console.log(html);
                    document.getElementById('dispo').textContent = message;
                    console.log("not ok");
                }
            },
            error: function(err1, err2, err3) {
                console.log(err1);
                console.log(err3);
                console.log(err2);
            }
        });
        
    });  
    

});
function checkDateNaissance(date_naissance) {
  var form = document.getElementById('complement');
  date_naissance = form.elements.naissance.val();
  if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", date_naissance)) {
    console.log('La date entrée est correcte');
  }
}
