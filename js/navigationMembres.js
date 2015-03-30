/*
 * Ce code javascript est l'équivalent du contrôleur
 */

/* Aide-mémoire
 * Ré-utilisation du code (dans le cas d'une méthode POST)
 * Changer :
 *****	Le nom de la fonction : la nommer du même nom que dans la ligne suivant // appel de la page
 *		C'est ce qui va être appelé par l'événement
 * 
 *****	Le nom à la ligne : valeur envoyée $_POST
 * 		Par ex: "idGalerie" pour "idMembre"
 * 
 *****  Le Id de l'élément où le résultat de la requête sera mise ( voir // là où mettre ce qui est retourné par la requête
 * 
 *****  Le nom de la page php appelée à la ligne : appel de la page
 * 
 * Ne pas changer :
 *****	le nom du paramètre peut rester le même (select)
 *****	le nom de la variable peut rester la même (valeur) mais choisir l'une des 2 possibilités
 * */

//-------------------------------------------------------------------------------------------------------
// Les pages (c'était un essai pour faire l'affichage de la div droite avec ajax)
// je n'ai pas continué car ça ajoute de la complexité au code 
// sans apporter aucun avantage particulier  // nicole gingras avril 2014
// ces fonctions sont donc à supprimer après avoir vérifié si elles ne servent plus
//-------------------------------------------------------------------------------------------------------
/* cette fonction est déclenché par un clic sur 
 * "Voir les infos d'un membre" dans la navigation gauche.
 * elle recherche tous les membres et les met dans dans une
 * liste déroulante*/
function pageMembresRechercher() {
	// dans le cas d'une valeur retournée par un select
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
			// là où mettre ce qui est retourné par la requête
			// --*************---
			document.getElementById("droit").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/pageMembresRechercher.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("type=" + valeur);
}

// -------------------------------------------------------------------------------------------------------
/*
 * cette fonction est déclenché par un clic sur "Liste des membres" dans la
 * navigation gauche. elle permet de choisir si on veut chercher un étudiant ou
 * un professeur à partir d'une liste déroulante
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
			// là où mettre ce qui est retourné par la requête
			// --*************---
			document.getElementById("droit").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/pageMembres.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("type=" + valeur);
}
// -------------------------------------------------------------------------------------------------------

// Les get

// -------------------------------------------------------------------------------------------------------
// fonction appelée par l'événement onclick sur la miniature de l'image que l'on veut  afficher

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
//fonction appelée par l'événement onchange dans un select contenant une liste d'images

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
// fonction appelée par l'événement onchange dans une liste déroulante de
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesGaleries.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("idGalerie=" + valeur);
}

//-------------------------------------------------------------------------------------------------------
//fonction appelée par l'événement onchange dans une liste déroulante de
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesGaleries.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("idGalerie=" + valeur + "&typeGalerie=" + "commentaires");
}

//-------------------------------------------------------------------------------------------------------
//fonction appelée par l'événement onchange dans une liste déroulante de
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesGaleries.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("idGalerie=" + valeur + "&typeGalerie=" + "commentairesSupprimer");
}


//-------------------------------------------------------------------------------------------------------
//fonction appelée par l'événement onchange dans une liste déroulante de
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesGaleries.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("idGalerie=" + valeur + "&typeGalerie=" + "enleverAGaleriePrivee");
}

//-------------------------------------------------------------------------------------------------------
//fonction appelée par l'événement onchange dans une liste déroulante de
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesGaleries.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("idGalerie=" + valeur + "&typeGalerie=" + "enleverAGaleriePublique");
}

// -------------------------------------------------------------------------------------------------------
// fonction appelée sur l'événement onclick du bouton enregistrer lors
// de l'ajout de commentaire
// pour afficher le commentaire qui a été enregistré, il faut refaire un appel
// à getimage()

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
// fonction appelée sur l'événement onclick du bouton supprimer

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
// fonction appelée par etudiant.php

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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesMembre.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("idMembre=" + valeur + "&type=" + "un");
}

// -------------------------------------------------------------------------------------------------------
//fonction appelée par pageGaleriePubliqueAjouterImage.php

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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeImagesMembre.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("galerieSelect").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getListeGaleries.php", true);// appel de la page
	// php de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("idGroupe=" + valeur);
}

// -------------------------------------------------------------------------------------------------------
// fonction appelée par l'événement onchange dans pageImagesAjouter.php
// fonction servant à construire le chemin pour la source de l'image
// lorsqu'une image est ajoutée
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
 * fonction appelée par onclick='getImagePourSupprimer' de pageImagesSuppprimer.php
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("image").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getInfosImagePourSupprimer.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("idimage=" + valeur);
}

//-------------------------------------------------------------------------------------------------------
/*
 * fonction appelée par 
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("div_infos").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getInfosImagePourModifier.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("idimage=" + valeur + "&type=" + "modifier");
}

//-------------------------------------------------------------------------------------------------------
/*
 * fonctions appelées par 
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("infosGroupe").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getInfosGroupes.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("professeurs").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/rechercherMembres.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("type=" + valeur);
}

// -------------------------------------------------------------------------------------------------------
// fonction appelée pour faire afficher les informations d'un membre
// dans les pages professeur, étudiant et gestion
// lorsqu'il est sélectionné dans une liste déroulante
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("infos").innerHTML = xhr.responseText;
		} else {
		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getInfosMembre.php", true);

	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************-
	xhr.send("id=" + valeur);
}

// -------------------------------------------------------------------------------------------------------
// fonction appelée lorsqu'on clique sur le bouton supprimmer sous une image dans pageImagesSupprimer.php
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

// fonction appelée par le onchange de galerieSelect dans pageGaleriesModifier.php
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
			// permettre d'utiliser le bouton modifier puisqu'une galerie est sélectionnée
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

// fonction appelée par le onchange de galerieSelect dans pageGaleriePubliqueModifier.php
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
			// permettre d'utiliser le bouton modifier puisqu'une galerie est sélectionnée
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

// fonction appelée par le onchange de groupeSelect de
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("galeries").innerHTML = xhr.responseText;
		} else {

		}
	};
	xhr.open("POST", "./metier/getListeGaleriesPourModifier.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("idGroupe=" + valeur + "&typeGalerie=" + "modifier");
}

//-------------------------------------------------------------------------------------------------------
//fonction appelée par l'événement onclick sur la miniature de l'image que l'on
//veut afficher pour ajouter à une galerie
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
//fonction appelée par l'événement onclick sur la miniature de l'image que l'on
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
//fonction appelée par l'événement onclick sur la miniature de l'image que l'on
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
 * fonctions appelées par 
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
			// là où mettre ce qui est retourné par la requête --*************
			document.getElementById("infosCours").innerHTML = xhr.responseText;
		} else {

		}
	};
	// appel de la page *****************
	xhr.open("POST", "./metier/getCours.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// valeur envoyée $_POST -- *********************
	xhr.send("idcours=" + valeur);
}
/*
 *  LOG des changements
 *  --------------------------------------
 *  nicole gingras modifié 2014-04-03
 *  --------------------------------------
 *  2014-04-08
 *  ajout de getImagePourAjouterAGalerie 
 *  getListeImagesIdMembre
 *  --------------------------------------
 */
