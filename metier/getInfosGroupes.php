<?php
/*
 * appelé par getInfosGaleries() dans navigationMembres.js
 * et dans listeLieeImagesGaleries.js -> pour afficher dossier dans pageImageAjouter?
 *
 * nicole gingras modifié 2014-04-03
 */
$idgroupe = $_POST['idgroupe'];
include_once 'rechercherGroupe.class.php';
$cherche = new RechercherGroupe;

$_POST['type'] = "professeurSelect";


// pour afficher dans la pageGroupeModifier.php
$liste=$cherche->rechercherUnGroupe($idgroupe);
foreach($liste as $groupe) {
	$actif = $groupe["actif"];
	$idprofesseur = $groupe["idprofesseur"];

	/*
	 * ---------------------------------------------------------------
	 */
	echo '<p>';
	//var_dump($actif);
	echo 'Ce groupe est actif (le cours se donne cette session-ci) <input type="radio" id="prive" ';
	echo ($actif == "1")? "checked":"";
	echo ' name="actif" value="1" />';

	echo '</p>';
	echo '<p>';
	echo 'Le groupe est inactif <input type="radio" id="public" ';
	echo ($actif == "0")? "checked":"";
	echo ' name="actif" value="0" />';
	echo '</p>';

	/*
	 * ---------------------------------------------------------------
	 */

}





