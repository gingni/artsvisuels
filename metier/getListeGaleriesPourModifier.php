<?php
/*
 * ------------------------------------------------------------
 * LOG
 * ------------------------------------------------------------
 * 
 * ------------------------------------------------------------
 */
$idgroupe = $_POST['idGroupe'];
include_once 'rechercherGalerie.class.php';
$cherche = new RechercherGalerie;
//-----------------------------------------------------------------------
//pour afficher une liste de toutes les galeries dans une table
//-----------------------------------------------------------------------
if($idgroupe == "tous"){
	$liste=$cherche->afficherToutesLesGaleries();

	echo "<table>";
	echo "<tr>";
	echo "<th>id Galerie</th>";
	echo "<th>id Groupe</th>";
	echo "<th>Description de la galerie</th>";
	echo "<th>Nom du Cours</th>";
	echo "<th>Session</th>";
	echo "<th>Nom du professeur</th>";
	echo "</tr>";

	foreach($liste as $ligne) {
		echo "<tr>";
		echo "<td>" . $ligne['idgalerie'] . "</td>";
		echo "<td>" . $ligne['idgroupe'] . "</td>";
		echo "<td>" . $ligne['descriptiongalerie'] . "</td>";
		echo "<td>" . $ligne['descriptioncours'] . "</td>";
		echo "<td>" . $ligne['session'] . "</td>";
		echo "<td>" . $ligne['nomprofesseur'] . "</td>";

		echo "</tr>";
	}
	echo "</table>";
}
//-----------------------------------------------------------------------
//pour afficher une liste des galeries dans un select
//-----------------------------------------------------------------------
else{
	// toutes les galeries
	if($idgroupe == "tousPourSelect"){
		$liste=$cherche->afficherGaleries();
	}
	// les galeries publiques
	else{
		if($idgroupe == "publique"){
			$liste=$cherche->afficherGaleriesPubliques();
		}
		// les galerie d'un groupe
		else{
			$liste=$cherche->rechercherIdGroupe($idgroupe);// nom trompeur -> on cherche les galeries d'un groupe
		}
	}
	echo '<p class="selection">S&eacute;lectionner une galerie</p>';
	echo '<select size="3" id="galerieSelect" name="galerieSelect" onchange="getInfosGalerie(this)">'; // début select
	//echo "<option value=\"none\">S&eacute;lectionner une galerie</option>";

	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idgalerie"] . ">" . $ligne["descriptiongalerie"] . "</option>";
	}
	
	echo "</select>"; // fin select
	//echo '<input type="hidden"  name="idGalerie"  value="' . $ligne["idgalerie"] . '">';	
}

