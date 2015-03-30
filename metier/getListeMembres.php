<?php
/*
 * modifié 2014-04-08 par nicole
 * utilisation de switch au lieu de if else
 * */
$type = $_POST["type"];

include_once 'rechercherMembre.class.php';
$cherche = new RechercherMembre();

switch ($type):
// tous les membres actuels
case "tous":
	$liste=$cherche->afficher_membres_actuels_ou_anciens($type, "1");
	break;

	// les étudiants actuellement inscrits
case "etudiant":
	$liste=$cherche->afficher_membres_actuels_ou_anciens($type, "1");
	break;

	// les professeurs en poste
case "professeur":
	$liste=$cherche->afficher_membres_actuels_ou_anciens($type, "1");
	break;

	//tous les anciens membres
case "anciens":
	$liste=$cherche->afficher_membres_actuels_ou_anciens($type, "0");
	break;

	// les étudiants des années passées
case "ancien_etudiant":
	$liste=$cherche->afficher_membres_actuels_ou_anciens($type, "1");
	break;

	// les anciens professeurs
case "ancien_professeur":
	$liste=$cherche->afficher_membres_actuels_ou_anciens($type, "1");
	break;

default:
	$liste=$cherche->rechercherType($type);
	break;
	endswitch;

	foreach($liste as $ligne) {

		$chaine = "<option value=" . $ligne["idmembre"] . ">" . $ligne["nom"] . " ". $ligne["prenom"] . "</option>";

		echo $chaine;
	}


