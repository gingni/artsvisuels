/* fonctions utilis�es par :
 * publicGaleriesListe.php
 * attention: plusieurs sont r�p�t�es dans navigationMembres 
 * avec parfois une diff�rence minime, parfois sans modif
 * mais elles sont utilis�es par d'autres pages
 */

//------------------------------------------------------------------------------
/* 
 * appel�e par le onchange dans galerieSelect,
 *  lequel vient d'un �cho dans getListeGaleries.php
 * 
 */
function getListeImages(select) {
	// alert("appel");
	var idGalerie = select.options[select.selectedIndex].value;

	var xhr;
	
	if (window.XMLHttpRequest) {
		
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			
			document.getElementById("listeImages").innerHTML = xhr.responseText;
		} else {
			
		}
	};

	xhr.open("POST", "./metier/getListeImagesGaleries.php", true);// appel de la page
															// php de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
	xhr.send("idGalerie=" + idGalerie);
}

//-------------------------------------------------------------------------------------------------------
// fonction appel�e par l'�v�nement onchange dans une liste d�roulante de
// galeries publiques
// ajout� 2014-04-09
function getListeImagesGaleriePublique(select) {
	document.getElementById("image").style.visibility = "hidden";
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
	xhr.send("idGalerie=" + valeur + "&typeGalerie=" + "publique");
}

//------------------------------------------------------------------------------


function getListeGaleries(groupeSelect) {
	//alert("appel get liste Galeries");
	var value = groupeSelect.options[groupeSelect.selectedIndex].value;
	var xhr;
	//alert(value);
	if (window.XMLHttpRequest) {
								
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("galerieSelect").innerHTML = xhr.responseText;
		} else {
			
		}
	};

	xhr.open("POST", "./metier/getListeGaleries.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// alert("idGroupe=" + value);
	xhr.send("idGroupe=" + value);
}

//------------------------------------------------------------------------------
//
function getInfosGalerie(galerieSelect) {
	//alert("appel getInfosGalerie");
	var value = groupeSelect.options[groupeSelect.selectedIndex].value;
	var xhr;
	alert(value);
	if (window.XMLHttpRequest) {
								
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("infos").innerHTML = xhr.responseText;
		} else {
			
		}
	};

	xhr.open("POST", "./metier/getInfosGaleries.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
	xhr.send("idGalerie=" + value);
}

//------------------------------------------------------------------------------
// appel�e par l'�v�nement onclick sur la miniature
function getImage(idimage) {

	var xhr;
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("image").innerHTML = "";
			document.getElementById("image").innerHTML = xhr.responseText;
			document.getElementById("image").style.visibility = "visible";
		} else {
			
		}
	};

	xhr.open("POST", "./metier/getImageEtInfosPublic.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.send("idimage=" + idimage);
}

//------------------------------------------------------------------------------
// pour afficher le commentaire qui a �t� enregistr�, il faut refaire un appel
// � getimage()
// garder cette partie pour plus tard
// mais ne plus l'utiliser ici car il faut etre membre pour commenter : ok 31 mars 2014 ng
function enregistrerCommentaire(commentaire,idimage,idMembre) {
	var xhr;
	//alert(commentaire.value);
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
	
	xhr.send("commentaire=" + commentaire.value + "&idimage=" + idimage.value + "&idMembre=" + idMembre.value);
}







