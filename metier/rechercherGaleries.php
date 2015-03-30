
<?php
/*
 * 2014-04-06 par nicole
 * utilisation de switch au lieu de if else
 * modification : case publique était en double : mis un case publiqueSelect et ajouté $ligne["titregalerie"] . " "
 *
 * */

$idgroupe = $_POST['idgroupe'];
$type = $_POST['type'];
include_once 'rechercherGalerie.class.php';
$cherche = new RechercherGalerie;

switch ($type):

//-----------------------------------------------------------------------
//pour afficher une liste de toutes les galeries dans une table
//-----------------------------------------------------------------------
case "tous":
	$liste=$cherche->afficherToutesLesGaleries();

	echo "<table>";
	echo "<tr>";
	echo "<th>Description de la galerie</th>";
	echo "<th>Ann&eacute;e</th>";
	echo "<th>Session</th>";
	echo "<th>No cours</th>";	
	echo "<th>Nom du Cours</th>";	
	//echo "<th>Nom du professeur</th>";
	//echo "<th>Publique ou priv&eacute;e</th>";
	echo "<th>Statut</th>";
	echo "</tr>";

	foreach($liste as $ligne) {
		echo "<tr>";
		echo "<td>" . $ligne['descriptiongalerie'] . "</td>";
		echo "<td>" . $ligne['annee'] . "</td>";
		echo "<td>" . $ligne['session'] . "</td>";
		echo "<td>" . $ligne['idcours'] . "</td>";
		echo "<td>" . $ligne['descriptioncours'] . "</td>";		
		//echo "<td>" . $ligne['nomprofesseur'] . "</td>";
		//echo "<td>" . $ligne['publique_privee'] . "</td>";
		echo "<td>";
		switch ($ligne['status']) {
			case 0:
			echo "active";
			break;
			case 0:
			echo "inactive";
			break;			
			default:
			echo "ferm&eacute;";
			break;
		}
		echo  "</td>";
		echo "</tr>";
	}
	echo "</table>";
	break;
	//-----------------------------------------------------------------------
//pour afficher une liste de toutes les galeries dans une table
//-----------------------------------------------------------------------
case "publique":
	$liste=$cherche->afficherGaleriesPubliques();

	echo "<table>";
	echo "<tr>";
	echo "<th>Titre de la galerie</th>";	
	echo "<th>Description de la galerie</th>";

	echo "<th>Statut</th>";
	echo "</tr>";

	foreach($liste as $ligne) {
		echo "<tr>";
		echo "<td>" . $ligne['titregalerie'] . "</td>";	
		echo "<td>" . $ligne['descriptiongalerie'] . "</td>";	
		echo "<td>";
		switch ($ligne['status']) {
			case 0:
			echo "active";
			break;
			case 0:
			echo "inactive";
			break;			
			default:
			echo "ferm&eacute;";
			break;
		}
		echo  "</td>";
		echo "</tr>";
	}
	echo "</table>";
	break;

	//-----------------------------------------------------------------------
	//pour afficher une liste de toutes les galeries dans un select
	//-----------------------------------------------------------------------
case "tousPourSelect":
	$liste=$cherche->afficherGaleries();
	echo '<select  size="3" id="galerieSelect" name="galerieSelect" onchange="getListeImages(this)">';
	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idgalerie"] . ">" . $ligne["descriptiongalerie"] . "</option>";
	}
	echo "</select>";
	break;

	//-----------------------------------------------------------------------
	//pour afficher une liste de toutes les galeries publiques dans un select
	//-----------------------------------------------------------------------
case "publiqueSelect":
	$liste=$cherche->afficherGaleriesPubliques();

	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idgaleries_publiques"] . ">" . $ligne["titregalerie"] . " " . $ligne["descriptiongalerie"] . "</option>";
	}
	break;

	//-----------------------------------------------------------------------
	//pour afficher les galeries d'un groupe dans un select
	//-----------------------------------------------------------------------
default:
	$liste=$cherche->rechercherIdGroupe($idgroupe);
	echo '<select  size="3" id="galerieSelect" name="galerieSelect" onchange="getListeImages(this)">';
	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idgalerie"] . ">" . $ligne["descriptiongalerie"] . "</option>";
	}
	echo "</select>";
	break;
	endswitch;