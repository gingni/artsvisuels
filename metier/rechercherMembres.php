<?php
/*
 * modifié 2014-04-06 par nicole
 * utilisation de switch au lieu de if else
 * */
$type = $_POST["type"];

include_once 'rechercherMembre.class.php';
$cherche = new RechercherMembre();

switch ($type):
// tous les membres actuels, dans une table
case "tous":
	$liste=$cherche->afficher_membres_actuels_ou_anciens($type, "1");
	echo "<tr>";
	//echo "<th>&nbsp;&nbsp;ID Membre&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Pr&eacute;nom&nbsp;&nbsp;</th>";
	//echo "<th>&nbsp;&nbsp;Alias&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Courriel&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;No DA&nbsp;&nbsp;</th>";
	echo "</tr>";
	foreach($liste as $ligne) {
		echo "<tr>";
		//echo "<td>" . $ligne['idmembre'] . "</td>";
		echo "<td>" . $ligne['nom'] . "</td>";
		echo "<td>" . $ligne['prenom'] . "</td>";
		//echo "<td>" . $ligne['alias'] . "</td>";
		echo "<td>" . $ligne['courriel'] . "</td>";
		echo "<td>" . $ligne['noda'] . "</td>";
		echo "</tr>";
	}
	break;
	// les étudiants actuellement inscrits
case "etudiant":
	$liste=$cherche->afficher_membres_actuels_ou_anciens($type, "1");
	echo "<tr>";
	//echo "<th>&nbsp;&nbsp;ID Membre&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Pr&eacute;nom&nbsp;&nbsp;</th>";
	//echo "<th>&nbsp;&nbsp;Alias&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Courriel&nbsp;&nbsp;</th>";
	//echo "<th>&nbsp;&nbsp;No DA&nbsp;&nbsp;</th>";
	echo "</tr>";
	foreach($liste as $ligne) {
		echo "<tr>";
		//echo "<td>" . $ligne['idmembre'] . "</td>";
		echo "<td>" . $ligne['nom'] . "</td>";
		echo "<td>" . $ligne['prenom'] . "</td>";
		//echo "<td>" . $ligne['alias'] . "</td>";
		echo "<td>" . $ligne['courriel'] . "</td>";
		//echo "<td>" . $ligne['noda'] . "</td>";
		echo "</tr>";
	}
	break;
	// les professeurs en poste
case "professeur":
	$liste=$cherche->afficher_membres_actuels_ou_anciens($type, "1");
	echo "<tr>";
	//echo "<th>&nbsp;&nbsp;ID Membre&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Pr&eacute;nom&nbsp;&nbsp;</th>";
	//echo "<th>&nbsp;&nbsp;Alias&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Courriel&nbsp;&nbsp;</th>";
	echo "</tr>";
	foreach($liste as $ligne) {
		echo "<tr>";
		//echo "<td>" . $ligne['idmembre'] . "</td>";
		echo "<td>" . $ligne['nom'] . "</td>";
		echo "<td>" . $ligne['prenom'] . "</td>";
		//echo "<td>" . $ligne['alias'] . "</td>";
		echo "<td>" . $ligne['courriel'] . "</td>";
		echo "</tr>";
	}
	break;
	
		// les professeurs en poste, pour un select
		// utilisé par pageGroupeModifier.php
case "professeurSelect":
	//var_dump($type);
	$liste=$cherche->afficher_membres_actuels_ou_anciens("professeur", "1");
	foreach($liste as $ligne) {
		echo '<option value="' . $ligne["idmembre"] . '">';
		echo $ligne['nom'];
		echo " " . $ligne['prenom'] . "</option>";
	}
	break;
	
	//tous les anciens membres
case "anciens":
	$liste=$cherche->afficher_membres_actuels_ou_anciens($type, "0");
	echo "<tr>";
	//echo "<th>&nbsp;&nbsp;ID Membre&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Pr&eacute;nom&nbsp;&nbsp;</th>";
	//echo "<th>&nbsp;&nbsp;Alias&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Courriel&nbsp;&nbsp;</th>";
	//echo "<th>&nbsp;&nbsp;No DA&nbsp;&nbsp;</th>";
	echo "</tr>";
	foreach($liste as $ligne) {
		echo "<tr>";
		//echo "<td>" . $ligne['idmembre'] . "</td>";
		echo "<td>" . $ligne['nom'] . "</td>";
		echo "<td>" . $ligne['prenom'] . "</td>";
		//echo "<td>" . $ligne['alias'] . "</td>";
		echo "<td>" . $ligne['courriel'] . "</td>";
		//echo "<td>" . $ligne['noda'] . "</td>";
		echo "</tr>";
	}
	break;
		// les étudiants des années passées
case "ancien_etudiant":
	$liste=$cherche->afficher_membres_actuels_ou_anciens($type, "1");
	echo "<tr>";
	//echo "<th>&nbsp;&nbsp;ID Membre&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Pr&eacute;nom&nbsp;&nbsp;</th>";
	//echo "<th>&nbsp;&nbsp;Alias&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Courriel&nbsp;&nbsp;</th>";
	//echo "<th>&nbsp;&nbsp;No DA&nbsp;&nbsp;</th>";
	echo "</tr>";
	foreach($liste as $ligne) {
		echo "<tr>";
		//echo "<td>" . $ligne['idmembre'] . "</td>";
		echo "<td>" . $ligne['nom'] . "</td>";
		echo "<td>" . $ligne['prenom'] . "</td>";
		//echo "<td>" . $ligne['alias'] . "</td>";
		echo "<td>" . $ligne['courriel'] . "</td>";
		//echo "<td>" . $ligne['noda'] . "</td>";
		echo "</tr>";
	}
	break;
	// les anciens professeurs
case "ancien_professeur":
	$liste=$cherche->afficher_membres_actuels_ou_anciens($type, "1");
	echo "<tr>";
	//echo "<th>&nbsp;&nbsp;ID Membre&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Pr&eacute;nom&nbsp;&nbsp;</th>";
	//echo "<th>&nbsp;&nbsp;Alias&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Courriel&nbsp;&nbsp;</th>";
	echo "</tr>";
	foreach($liste as $ligne) {
		echo "<tr>";
		//echo "<td>" . $ligne['idmembre'] . "</td>";
		echo "<td>" . $ligne['nom'] . "</td>";
		echo "<td>" . $ligne['prenom'] . "</td>";
		//echo "<td>" . $ligne['alias'] . "</td>";
		echo "<td>" . $ligne['courriel'] . "</td>";
		echo "</tr>";
	}
	break;
default:
	//tous les membres sans exception
	$liste=$cherche->rechercherSansCriteres();
	echo "<tr>";
	//echo "<th>&nbsp;&nbsp;ID Membre&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Nom&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Pr&eacute;nom&nbsp;&nbsp;</th>";
	//echo "<th>&nbsp;&nbsp;Alias&nbsp;&nbsp;</th>";
	echo "<th>&nbsp;&nbsp;Courriel&nbsp;&nbsp;</th>";
	//echo "<th>&nbsp;&nbsp;No DA&nbsp;&nbsp;</th>";
	echo "</tr>";
	foreach($liste as $ligne) {
		echo "<tr>";
		//echo "<td>" . $ligne['idmembre'] . "</td>";
		echo "<td>" . $ligne['nom'] . "</td>";
		echo "<td>" . $ligne['prenom'] . "</td>";
		//echo "<td>" . $ligne['alias'] . "</td>";
		echo "<td>" . $ligne['courriel'] . "</td>";
		//echo "<td>" . $ligne['noda'] . "</td>";
		echo "</tr>";
	}
	break;
	endswitch;