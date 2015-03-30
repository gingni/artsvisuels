function getListeGaleries(groupeSelect) {
	//alert("appel get liste Galeries");
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

	xhr.open("POST", "./metier/getListeGaleries.php", true);// appel de la page php de traitement
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// alert("idGroupe=" + value);
	xhr.send("idGroupe=" + value);
}