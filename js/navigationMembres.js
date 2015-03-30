/*
 * Ce code javascript est l'�quivalent du contr�leur
 */

/* Aide-m�moire
 * R�-utilisation du code (dans le cas d'une m�thode POST)
 * Changer :
 *****	Le nom de la fonction : la nommer du m�me nom que dans la ligne suivant // appel de la page
 *		C'est ce qui va �tre appel� par l'�v�nement
 * 
 *****	Le nom � la ligne : valeur envoy�e $_POST
 * 		Par ex: "idGalerie" pour "idMembre"
 * 
 *****  Le Id de l'�l�ment o� le r�sultat de la requ�te sera mise ( voir // l� o� mettre ce qui est retourn� par la requ�te
 * 
 *****  Le nom de la page php appel�e � la ligne : appel de la page
 * 
 * Ne pas changer :
 *****	le nom du param�tre peut rester le m�me (select)
 *****	le nom de la variable peut rester la m�me (valeur) mais choisir l'une des 2 possibilit�s
 * */

//-------------------------------------------------------------------------------------------------------
// Les pages (c'�tait un essai pour faire l'affichage de la div droite avec ajax)
// je n'ai pas continu� car �a ajoute de la complexit� au code 
// sans apporter aucun avantage particulier  // nicole gingras avril 2014
// ces fonctions sont donc � supprimer apr�s avoir v�rifi� si elles ne servent plus
//-------------------------------------------------------------------------------------------------------
/* cette fonction est d�clench� par un clic sur 
 * "Voir les infos d'un membre" dans la navigation gauche.
 * elle recherche tous les membres et les met dans dans une
 * liste d�roulante*/
function pageMembresRechercher() {
	// dans le cas d'une valeur retourn�e par un select
	// var valeur = select.options[select.selectedIndex].value;
	// dans le cas ou on fait un select *
	var valeur = "tous";
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te
			// --*************---
			document.getElementById("droit").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/pageMembresRechercher.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("type=" + valeur);
}

// -------------------------------------------------------------------------------------------------------
/*
 * cette fonction est d�clench� par un clic sur "Liste des membres" dans la
 * navigation gauche. elle permet de choisir si on veut chercher un �tudiant ou
 * un professeur � partir d'une liste d�roulante
 */
function pageMembres() {
	var valeur = "tous";
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te
			// --*************---
			document.getElementById("droit").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/pageMembres.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("type=" + valeur);
}
// -------------------------------------------------------------------------------------------------------

// Les get

// -------------------------------------------------------------------------------------------------------
// fonction appel�e par l'�v�nement onclick sur la miniature de l'image que l'on veut  afficher

function getImage(valeur) {
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("image").innerHTML = xhr.responseText;
		} else {

		}
	};

	xhr.open("POST", "./metier/getInfosImage.php", true);// appel de la page php
	// de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.send("idimage=" + valeur);
}
//-------------------------------------------------------------------------------------------------------
//fonction appel�e par l'�v�nement onchange dans un select contenant une liste d'images

function getImageSelect(select) {
	var valeur = select.options[select.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("image").innerHTML = xhr.responseText;
		} else {

		}
	};

	xhr.open("POST", "./metier/getInfosImage.php", true);// appel de la page php
	// de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.send("idimage=" + valeur);
}

// -------------------------------------------------------------------------------------------------------
// fonction appel�e par l'�v�nement onchange dans une liste d�roulante de
// galeries
function getListeImages(select) {
	var valeur = select.options[select.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesGaleries.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idGalerie=" + valeur);
}

//-------------------------------------------------------------------------------------------------------
//fonction appel�e par l'�v�nement onchange dans une liste d�roulante de
//galeries privees pour afficher les commentaires de cette galerie
function getListeCommentaires(select) {
	var valeur = select.options[select.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesGaleries.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idGalerie=" + valeur + "&typeGalerie=" + "commentaires");
}

//-------------------------------------------------------------------------------------------------------
//fonction appel�e par l'�v�nement onchange dans une liste d�roulante de
//galeries privees pour supprimer un commentaire de cette galerie
function getListeCommentairesPourSupprimer(select) {
	var valeur = select.options[select.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesGaleries.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idGalerie=" + valeur + "&typeGalerie=" + "commentairesSupprimer");
}


//-------------------------------------------------------------------------------------------------------
//fonction appel�e par l'�v�nement onchange dans une liste d�roulante de
//galeries privees pour enlever une image d'une galerie
function getListeImagesGalerie(select) {
	var valeur = select.options[select.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesGaleries.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idGalerie=" + valeur + "&typeGalerie=" + "enleverAGaleriePrivee");
}

//-------------------------------------------------------------------------------------------------------
//fonction appel�e par l'�v�nement onchange dans une liste d�roulante de
//galeries publiques pour enlever une image d'une galerie
function getListeImagesGaleriePublique(select) {
	var valeur = select.options[select.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesGaleries.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idGalerie=" + valeur + "&typeGalerie=" + "enleverAGaleriePublique");
}

// -------------------------------------------------------------------------------------------------------
// fonction appel�e sur l'�v�nement onclick du bouton enregistrer lors
// de l'ajout de commentaire
// pour afficher le commentaire qui a �t� enregistr�, il faut refaire un appel
// � getimage()

function enregistrerCommentaire(commentaire, idimage, idMembre) {
	var xhr;
	if (window.XMLHttpRequest) {

		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			getImage(idimage.value);
		} else {

		}
	};

	xhr.open("POST", "./metier/setCommentaire.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.send("commentaire=" + commentaire.value + "&idimage=" + idimage.value
			+ "&idMembre=" + idMembre.value);
}

// -------------------------------------------------------------------------------------------------------
// fonction appel�e sur l'�v�nement onclick du bouton supprimer

function supprimerCommentaire(idcommentaire, idgalerie) {
	var xhr;
	if (window.XMLHttpRequest) {

		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			window.location = "pageCommentaires.php";
		} else {

		}
	};

	xhr.open("POST", "./metier/supprimerCommentaire.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.send("idcommentaire=" + idcommentaire);
}

// -------------------------------------------------------------------------------------------------------
// fonction appel�e par etudiant.php

function getListeImagesMembre(valeur) {
	// la valeur est l'idmembre
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesMembre.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idMembre=" + valeur + "&type=" + "un");
}

// -------------------------------------------------------------------------------------------------------
//fonction appel�e par pageGaleriePubliqueAjouterImage.php

function getListeImagesIdMembre(select) {
	var valeur = select.options[select.selectedIndex].value;
	// la valeur est l'idmembre
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesMembre.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idMembre=" + valeur + "&type=" + "deux");
}
// -------------------------------------------------------------------------------------------------------

function getListeGaleries(select) {
	var valeur = select.options[select.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("galerieSelect").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeGaleries.php", true);// appel de la page
	// php de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idGroupe=" + valeur);
}

// -------------------------------------------------------------------------------------------------------
// fonction appel�e par l'�v�nement onchange dans pageImagesAjouter.php
// fonction servant � construire le chemin pour la source de l'image
// lorsqu'une image est ajout�e
function getIdGalerie(select) {
	var texteselectionne = select.options[select.selectedIndex].text;
	var element = document.getElementById("idGalerie");
	var valeur = select.options[select.selectedIndex].value;
	element.value = valeur;
	var xhr;

	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("dossierGalerie").value = xhr.responseText;
		} else {

		}
	};
	xhr.open("POST", "./metier/getDossierGalerie.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("idGalerie=" + valeur);
};

// -------------------------------------------------------------------------------------------------------

function getListePourTable(select) {
	var value = select.options[select.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("membreSelect").innerHTML = xhr.responseText;
		} else {
		}
	};

	xhr.open("POST", "./metier/getListeMembresPourTable.php", true);

	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.send("type=" + value);
}

// -------------------------------------------------------------------------------------------------------
/*
 * fonction appel�e par onclick='getImagePourSupprimer' de pageImagesSuppprimer.php
 * 
 */
function getImagePourSupprimer(valeur) {
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("image").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getInfosImagePourSupprimer.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idimage=" + valeur);
}

//-------------------------------------------------------------------------------------------------------
/*
 * fonction appel�e par 
 * <select name="imageSelect" id="imageSelect" size="10" onchange="getImagePourModifier(this)" >
 * de pageImageModifier.php
 */
function getImagePourModifier(select) {
	var valeur = select.options[select.selectedIndex].value;
	var xhr;    
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("div_infos").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getInfosImagePourModifier.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idimage=" + valeur + "&type=" + "modifier");
}

//-------------------------------------------------------------------------------------------------------
/*
 * fonctions appel�es par 
 * select size="10" onclick="" id="groupeSelect" name="groupeSelect" onchange="getGroupePourModifier(this), getListeProfesseurs("professeurSelect")">
 * de pageGroupeModifier.php
 */
function getGroupePourModifier(select) {
	var valeur = select.options[select.selectedIndex].value;
	var xhr;    
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("infosGroupe").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getInfosGroupes.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idgroupe=" + valeur);
}
//-------------------------------------------------------------------------------------------------------
function getListeProfesseurs() {
	var valeur = "professeurSelect";
	var xhr;    
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("professeurs").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/rechercherMembres.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("type=" + valeur);
}

// -------------------------------------------------------------------------------------------------------
// fonction appel�e pour faire afficher les informations d'un membre
// dans les pages professeur, �tudiant et gestion
// lorsqu'il est s�lectionn� dans une liste d�roulante
function getInfos(select) {
	var valeur = select.options[select.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("infos").innerHTML = xhr.responseText;
		} else {
		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getInfosMembre.php", true);

	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************-
	xhr.send("id=" + valeur);
}

// -------------------------------------------------------------------------------------------------------
// fonction appel�e lorsqu'on clique sur le bouton supprimmer sous une image dans pageImagesSupprimer.php
function supprimerImage(valeur) {
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("supprimerImage").innerHTML = xhr.responseText;
		} else {

		}
	};
	xhr.open("POST", "./metier/supprimerImage.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("idimage=" + valeur);
}

// -------------------------------------------------------------------------------------------------------

// fonction appel�e par le onchange de galerieSelect dans pageGaleriesModifier.php
// appelle getInfosGalerie.php

function getInfosGalerie(select) {

	var valeur = select.options[select.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("div_infos").innerHTML = xhr.responseText;
			// permettre d'utiliser le bouton modifier puisqu'une galerie est s�lectionn�e
			// document.getElementById("modifier").disabled=false;
		} else {

		}
	};
	xhr.open("POST", "./metier/getInfosGaleries.php", true);// appel de la page
	// php de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.send("idGalerie=" + valeur);
}

// -------------------------------------------------------------------------------------------------------

// fonction appel�e par le onchange de galerieSelect dans pageGaleriePubliqueModifier.php
// appelle getInfosGaleriePublique.php

function getInfosGaleriePublique(select) {

	var valeur = select.options[select.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("div_infos").innerHTML = xhr.responseText;
			// permettre d'utiliser le bouton modifier puisqu'une galerie est s�lectionn�e
			// document.getElementById("modifier").disabled=false;
		} else {

		}
	};
	xhr.open("POST", "./metier/getInfosGaleries.php", true);// appel de la page
	// php de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.send("idGalerie=" + valeur+ "&type=" + "modifier");
}

// -------------------------------------------------------------------------------------------------------

// fonction appel�e par le onchange de groupeSelect de
// pageGaleriesModifier.php

function getListeGaleriesPourModifier(select) {
	var valeur = select.options[select.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("galeries").innerHTML = xhr.responseText;
		} else {

		}
	};
	xhr.open("POST", "./metier/getListeGaleriesPourModifier.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idGroupe=" + valeur + "&typeGalerie=" + "modifier");
}

//-------------------------------------------------------------------------------------------------------
//fonction appel�e par l'�v�nement onclick sur la miniature de l'image que l'on
//veut afficher pour ajouter � une galerie
function getImagePourAjouterAGalerie(valeur) {
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("image").innerHTML = xhr.responseText;
		} else {

		}
	};

	xhr.open("POST", "./metier/getInfosImagePourModifier.php", true);// appel de la page php
	// de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.send("idimage=" + valeur + "&type=" + "ajoutAGalerie");
}

//-------------------------------------------------------------------------------------------------------
//fonction appel�e par l'�v�nement onclick sur la miniature de l'image que l'on
//veut afficher pour l'enlever d'une galerie

function getImagePourEnleverAGaleriePrivee(valeur) {
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("image").innerHTML = xhr.responseText;
		} else {

		}
	};

	xhr.open("POST", "./metier/getInfosImagePourModifier.php", true);// appel de la page php
	// de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.send("idimage=" + valeur + "&type=" + "enleverAGaleriePrivee");
}

//-------------------------------------------------------------------------------------------------------
//fonction appel�e par l'�v�nement onclick sur la miniature de l'image que l'on
//veut afficher pour l'enlever d'une galerie

function getImagePourEnleverAGaleriePublique(valeur) {
	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("image").innerHTML = xhr.responseText;
		} else {

		}
	};

	xhr.open("POST", "./metier/getInfosImagePourModifier.php", true);// appel de la page php
	// de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.send("idimage=" + valeur + "&type=" + "enleverAGaleriePublique");
}

//-------------------------------------------------------------------------------------------------------
/*
 * fonctions appel�es par 
 * select size="10" onclick="" id="groupeSelect" name="groupeSelect" onchange="getGroupePourModifier(this), getListeProfesseurs("professeurSelect")">
 * de pageGroupeModifier.php
 */
function getCours(select) {
	var valeur = select.options[select.selectedIndex].value;
	var xhr;    
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// l� o� mettre ce qui est retourn� par la requ�te --*************
			document.getElementById("infosCours").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getCours.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoy�e $_POST -- *********************
	xhr.send("idcours=" + valeur);
}
/*
 *  LOG des changements
 *  --------------------------------------
 *  nicole gingras modifi� 2014-04-03
 *  --------------------------------------
 *  2014-04-08
 *  ajout de getImagePourAjouterAGalerie 
 *  getListeImagesIdMembre
 *  --------------------------------------
 */
