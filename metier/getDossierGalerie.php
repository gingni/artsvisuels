<?php
$idGalerie = $_POST['idGalerie'];
include_once 'rechercherGalerie.class.php';
$cherche = new RechercherGalerie;


$liste=$cherche->getInfosGalerie($idGalerie);

foreach($liste as $ligne) {
	//echo "exercice_1";
	echo $ligne["dossier"];
}
