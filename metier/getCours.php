<?php
/*
 * appelé par getInfosGaleries() dans navigationMembres.js
 * et dans listeLieeImagesGaleries.js -> pour afficher dossier dans pageImageAjouter?
 *
 * nicole gingras modifié 2014-04-03
 */
$idcours = $_POST['idcours'];
include_once 'rechercherCours.class.php';
$cherche = new RechercherCours;


// pour afficher dans la pageCoursModifier.php
$liste=$cherche->rechercherId($idcours);

	echo '<label for="descriptionCours">Description du cours:</label>';
	echo '<input type="text" name="descriptionCours" id="descriptionCours" tabindex="2" value=" ';
	echo $liste[0]['descriptioncours'] ;
	echo '"size="40" />';








