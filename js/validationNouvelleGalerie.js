/**
 * fonctions pour valider les donn�es avant d'ajouter un membre
 */

function formValidation() {
	var description = document.nouvelle_galerie.description;
	var descriptionLongueur = alias.value.length;
	var message = "";

	if (descriptionLongueur < 3) {
		message = message
				+ "La description doit contenir au moins 3 caract�res<br/>";
	}

	
	champMessage = document.getElementById("messageErreur");
	champMessage.innerHTML = message;
	// nb si on utilise champMessage.textContent, on obtient une ligne sans saut
	// de ligne
	// les <br /> �tant affich�s

	if (message == "") {
		return true;
	} else
		return false;
}

function onload() {
	document.getElementById("description").innerHTML="";
}

