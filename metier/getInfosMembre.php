<?php

$id = $_POST["id"];
//var_dump($id);

include_once 'rechercherMembre.class.php';
$cherche = new RechercherMembre();
$liste=$cherche->rechercherId($id);

foreach($liste as $ligne) {
	$chaine = "Membre ID: " .$ligne["idmembre"] . "<br /><br />" . $ligne["nom"] . " ". $ligne["prenom"] . "<br /><br />Alias :  ". $ligne["alias"]. "<br />";
	echo $chaine;
}
