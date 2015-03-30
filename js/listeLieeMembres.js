/**
 * 
 */

// selectMembres est l'élément qui contient le type sélectionné dans la balise
// select de pageRechercherMembre.php
function getListe(typeSelect) {
	// alert("appel");
	var value = typeSelect.options[typeSelect.selectedIndex].value;
	var xhr;
	// alert(value);
	if (window.XMLHttpRequest) {// code pour IE7+, Firefox, Chrome, Opera,
		// Safari
		xhr = new XMLHttpRequest();
	} else {// code pour IE6, IE5
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// alert(xhr.readyState);
			document.getElementById("membreSelect").innerHTML = xhr.responseText;
		} else {
			// alert(xhr.readyState);
		}
	};

	xhr.open("POST", "./metier/getListeMembres.php", true);// appel de la page
	// php de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// alert(value);
	xhr.send("type=" + value);
}

function getInfos(membreSelect) {
	// alert("appel");
	var value = membreSelect.options[membreSelect.selectedIndex].value;
	var xhr;
	// alert(value);
	if (window.XMLHttpRequest) {// code pour IE7+, Firefox, Chrome, Opera,
		// Safari
		xhr = new XMLHttpRequest();
	} else {// code pour IE6, IE5
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// alert(xhr.readyState);
			document.getElementById("infos").innerHTML = xhr.responseText;
		} else {
			// alert(xhr.readyState);
		}
	};

	xhr.open("POST", "./metier/getInfosMembre.php", true);// appel de la page
	// php de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// alert(value);
	xhr.send("id=" + value);
}

function getListePourTable(typeSelect) {
	// alert("appel");
	var value = typeSelect.options[typeSelect.selectedIndex].value;
	var xhr;
	if (window.XMLHttpRequest) {// code pour IE7+, Firefox, Chrome, Opera,
		// Safari
		xhr = new XMLHttpRequest();
	} else {// code pour IE6, IE5
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("membreSelect").innerHTML = xhr.responseText;
		} else {
			// alert(xhr.readyState);
		}
	};

	xhr.open("POST", "./metier/getListeMembresPourTable.php", true);// appel de
																	// la
																	// pagephp
																	// de
																	// traitement

	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// alert(value);
	xhr.send("type=" + value);
}

function getListeGaleries(groupeSelect) {
	// alert("appel get liste Galeries");
	var value = groupeSelect.options[groupeSelect.selectedIndex].value;
	var xhr;
	// alert(value);
	if (window.XMLHttpRequest) {// code pour IE7+, Firefox, Chrome, Opera,
		// Safari
		xhr = new XMLHttpRequest();
	} else {// code pour IE6, IE5
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("galerieSelect").innerHTML = xhr.responseText;
		} else {
			// alert(xhr.readyState);
		}
	};

	xhr.open("POST", "./metier/getListeGaleries.php", true);// appel de la page
															// php de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// alert("idGroupe=" + value);
	xhr.send("idGroupe=" + value);
}
