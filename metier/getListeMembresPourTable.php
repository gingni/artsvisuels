<?php

$type = $_POST["type"];

include_once 'rechercherMembre.class.php';
$cherche = new RechercherMembre();

if($type == "tous"){
	$liste=$cherche->rechercherSansCriteres();
	echo "<tr>";
	echo "<th>&nbsp;&nbsp;ID Membre&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Pr&eacute;nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Alias&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Courriel&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;No DA&nbsp;&nbsp;</th>";
	echo "</tr>";
	foreach($liste as $ligne) {
		echo "<tr>";
		echo "<td>" . $ligne['idmembre'] . "</td>";
		echo "<td>" . $ligne['nom'] . "</td>";
		echo "<td>" . $ligne['prenom'] . "</td>";
		echo "<td>" . $ligne['alias'] . "</td>";
		echo "<td>" . $ligne['courriel'] . "</td>";
		echo "<td>" . $ligne['noda'] . "</td>";
		echo "</tr>";
	}
}
else{

	if($type == "etudiant"){
		$liste=$cherche->rechercherType($type);
		echo "<tr>";
	echo "<th>&nbsp;&nbsp;ID Membre&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Pr&eacute;nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Alias&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Courriel&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;No DA&nbsp;&nbsp;</th>";
		echo "</tr>";
		foreach($liste as $ligne) {
			echo "<tr>";
			echo "<td>" . $ligne['idmembre'] . "</td>";
			echo "<td>" . $ligne['nom'] . "</td>";
			echo "<td>" . $ligne['prenom'] . "</td>";
			echo "<td>" . $ligne['alias'] . "</td>";
			echo "<td>" . $ligne['courriel'] . "</td>";
			echo "<td>" . $ligne['noda'] . "</td>";
			echo "</tr>";
		}
	}
	else {
		$liste=$cherche->rechercherType($type);
		echo "<tr>";
	echo "<th>&nbsp;&nbsp;ID Membre&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Pr&eacute;nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Alias&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Courriel&nbsp;&nbsp;</th>";
		echo "</tr>";
		foreach($liste as $ligne) {
			echo "<tr>";
			echo "<td>" . $ligne['idmembre'] . "</td>";
			echo "<td>" . $ligne['nom'] . "</td>";
			echo "<td>" . $ligne['prenom'] . "</td>";
			echo "<td>" . $ligne['alias'] . "</td>";
			echo "<td>" . $ligne['courriel'] . "</td>";
			echo "</tr>";
		}
	}

}


