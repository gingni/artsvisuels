<?php

$type = $_POST["type"];

include_once 'rechercherCours.class.php';
$cherche = new RechercherCours();
$liste=$cherche->rechercherSansCriteres();
switch ($type) {

	case "tous":

	echo "<tr>";
	echo "<th>&nbsp;&nbsp;no Cours&nbsp;&nbsp;</th>";
	echo "<th>Description du cours</th>";
	echo "</tr>";

	foreach($liste as $ligne) {
		echo "<tr>";
		echo "<td>" . $ligne['nocours'] . "</td>";
		echo "<td>" . $ligne['descriptioncours'] . "</td>";
		echo "</tr>";
	}

	break;

	case 'tousPourSelect':

	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idcours"] . ">" . $ligne["idcours"] . " " . $ligne["descriptioncours"] . "</option>";
	}

	break;

	default:
	//echo '<option value="none">Choisir le cours</option>';
	foreach($liste as $ligne) {
		echo "<option value=" . $ligne["idcours"] . ">" . $ligne["idcours"] . $ligne["descriptioncours"] . "</option>";
	}

	break;
}
