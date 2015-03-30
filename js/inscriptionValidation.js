/**
 * fonctions pour valider les donn�es avant d'ajouter un membre
 */

function formValidation() {
	var alias = document.profil.alias;
	var aliasLongueur = alias.value.length;
	var message = "";

	if (aliasLongueur < 5) {
		message = message
				+ "L'alias doit contenir entre 5 et 12 caract�res<br/>";
	}

	var mdp = document.profil.mdp;
	var mdpLongueur = mdp.value.length;
	if (mdpLongueur == 0 || mdpLongueur >= 12 || mdpLongueur < 6) {
		message = message
				+ "Le mot de passe doit avoir entre 6 et 12 caract�res<br/>";
	}

	var nom = document.profil.nom;
	var prenom = document.profil.prenom;
	var lettres = /^[A-Za-z]+$/;
	if (nom.value.match(lettres) || prenom.value.match(lettres)) {
	} else {
		message = message
				+ "Les champs nom et pr�nom ne doivent contenir que des lettres<br/>";
	}

	var prenomLongueur = prenom.value.length;
	if (prenomLongueur >= 25 || prenomLongueur < 2) {
		message = message
				+ "Votre pr�nom doit avoir une longueur entre 2 et 25 caract�res";

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
	document.getElementById('etudiant').onchange = disabledOuPas;
	document.getElementById('professeur').onchange = disabledOuPas;
	document.getElementById("alias").innerHTML="";
	//document.getElementById("messageErreur").innerHTML="";

}
function disabledOuPas() {
	if ( document.getElementById('etudiant').checked == true ){
		document.getElementById('noda').disabled = false;
		}
	if ( document.getElementById('professeur').checked == true ){
		document.getElementById('noda').disabled = true;
		}
	}

/**
 * afficher un hint indiquant si l'alias est d�j� utilis�
 */

function showHint(str) {
	if (str.length == 0) {
		document.getElementById("txtHint").innerHTML = "";
		return;
	}
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
			// tant qu'� avoir v�rifi� si un alias est d�j� utilis�
			// emp�cher d'ajouter un membre avec cet alias
			if (document.getElementById("txtHint").innerHTML == "--- Cet alias n'est pas disponible") {
				document.getElementById("soumettre").disabled = true;
			} else {
				document.getElementById("soumettre").disabled = false;
			}
		}
	};
	xmlhttp.open("GET", "./metier/gethint.php?q=" + str, true);
	xmlhttp.send();
}

