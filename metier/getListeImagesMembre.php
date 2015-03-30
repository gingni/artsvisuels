<?php

/**
 * @author nicole
 * @copyright 2014-04-08
 */

//valeur fournie par la page php d'origine
$idMembre = $_POST["idMembre"];
//valeur fournie par getListeImagesIdMembre dans navigationMembres.js
$type = $_POST["type"];

include_once 'rechercherImage.class.php';

$cherche = new RechercherImage();
$liste=$cherche->rechercherImagesMembre($idMembre);
//echo '<input type="hidden" value=""/>';

switch ($type):
// tous les membres actuels
case "un":
	if(is_array($liste)){
		foreach($liste as $ligne) {
			$uneImage = $cherche->getInfosImage($ligne[1]);
			echo "<span id='uneImage'>";
			echo "<a  onclick='getImage(".$ligne[1].")' >";
			echo "<p id='titreImage'>".$uneImage[0][0]."</p>";
			echo "<img id='imageGalerie' src='".$uneImage[0][1]."'/>";
			echo  "<p id='authorImage'>".$uneImage[0]["nomEtudiant"]."</p>";;
			echo "</a>";
			echo "</span>";
		}
	}
	break;

case "deux":
	//echo '<input type="hidden" value=""/>';
	if(is_array($liste)){
		foreach($liste as $ligne) {
			$uneImage = $cherche->getInfosImage($ligne[1]);
			echo "<span  class=\"crop\" id='uneImage'>";
			echo "<p id='titreImage'>".$uneImage[0]['titre']."</p>";
			echo "<a href='#ici'  onclick='getImagePourAjouterAGalerie(".$ligne[1].")' >";
			echo "<img class='imageGalerie' src='".$uneImage[0][1]."'/>";
			echo "</a>";
			echo "</span>";
		}
	}
	break;
	endswitch;
	?>