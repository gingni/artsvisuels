<?php
/*
 * En cours de remplacement par rechercherGaleries.php
 * nicole 2014-04-06
 * ------------------------------------------------------------
 * LOG
 * ------------------------------------------------------------
 * 2014-04-08
 * changer if else pour switch
 * ajout du case ajoutImageGalerie
 * ------------------------------------------------------------
 */

//-----------------------------------------------------------------------
include_once 'rechercherGalerie.class.php';
$cherche = new RechercherGalerie;

if(!isset($_POST['idGroupe'])){
	$idgroupe="";
}
else {
	$idgroupe= htmlentities($_POST['idGroupe']);
}
//-----------------------------------------------------------------------

if(!isset($_POST['typeGalerie'])){
	$typeGalerie="";
}
else {
	$typeGalerie= htmlentities($_POST['typeGalerie']);
}
//-----------------------------------------------------------------------

switch ($typeGalerie):

//-----------------------------------------------------------------------
//pour afficher une liste de toutes les galeries dans une table
//-----------------------------------------------------------------------
case "tous":
	$liste=$cherche->afficherGaleriesP();
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
	break;

	//-----------------------------------------------------------------------
	// pour afficher une liste des galeries publiques
	// dans un select qui est déjà dans
	// la page (ajouter juste les lignes options)
	//-----------------------------------------------------------------------
case"ajoutImageGalerie":
	$liste=$cherche->afficherGaleriesPubliques();
	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idgaleries_publiques"] . ">" . $ligne["titregalerie"] . "</option>";
	}
	break;
	//-----------------------------------------------------------------------
	// pour afficher une liste des galeries privées pour ajouter des images
	//-----------------------------------------------------------------------
case"ajoutImageGaleriePrivee":
	$liste=$cherche->afficherGaleries();
	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idgalerie"] . ">" . $ligne["descriptiongalerie"] . "</option>";
	}
	break;
	//-----------------------------------------------------------------------
	// pour afficher une liste des galeries privées pour enlever des images
	//-----------------------------------------------------------------------
case"enleverAGaleriePrivee":
	$liste=$cherche->afficherGaleries();
	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idgalerie"] . ">" . $ligne["descriptiongalerie"] . "</option>";
	}
	break;
	//-----------------------------------------------------------------------
	// pour afficher une liste des galeries publiques pour enlever des images
	//-----------------------------------------------------------------------
case"enleverAGaleriePublique":
	$liste=$cherche->afficherGaleriesPubliques();
	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idgaleries_publiques"] . ">" . $ligne["titregalerie"] . "</option>";
	}
	break;
	//-----------------------------------------------------------------------
	//
	//-----------------------------------------------------------------------
case"publique":
	$liste=$cherche->afficherGaleriesPubliques();
	//echo '<select  size="3" id="galerieSelect" name="galerieSelect" onchange="getListeImagesGaleriePublique(this)">'; // début select
	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idgaleries_publiques"] . ">" . $ligne["titregalerie"] . "</option>";
	}
	//echo "</select>"; // fin select
	break;
	//-----------------------------------------------------------------------
	//
	//-----------------------------------------------------------------------
case"tousPourSelect":
	$liste=$cherche->afficherGaleries();
	echo '<select  size="3" id="galerieSelect" name="galerieSelect" onchange="getListeImagesGaleriePublique(this)">'; // début select
	//echo "<option value=\"none\">S&eacute;lectionner une galerie</option>";

	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idgalerie"] . ">" . $ligne["descriptiongalerie"] . "</option>";
	}

	echo "</select>"; // fin select
	break;

	//-----------------------------------------------------------------------
	//pour afficher une liste des galeries d'un groupe
	// n.b. il reste à répartir les if else dans des cases
	// mais avant il faut que $typeGalerie soit initialisé
	// dans la page d'origine
	//-----------------------------------------------------------------------
default:
	$liste=$cherche->afficherGaleries();

	// les galerie

	$liste=$cherche->rechercherIdGroupe($idgroupe);

	echo '<select  size="3" id="galerieSelect" name="galerieSelect" onchange="getListeImages(this)">'; // début select
	//echo "<option value=\"none\">S&eacute;lectionner une galerie</option>";

	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idgalerie"] . ">" . $ligne["descriptiongalerie"] . "</option>";
	}

	echo "</select>"; // fin select
	//echo '<input type="hidden"  name="idGalerie"  value="' . $ligne["idgalerie"] . '">';
	break;
	endswitch;
	?>



