
<?php
// en processus de codage 2014-03-13
include_once "insert.class.php";
class AjouterImage extends Insert {

	private $insert;
	function __construct() {
		$this->insert = new Insert();
	}

	function ajouterImage($idGalerie, $idMembre, $concept, $src, $titre, $datecreation, $dimensions, $medium) {
		$this->insert->callInsert8AvecPS("ajouter_image", $idGalerie, $idMembre, $concept, $src, $titre, $datecreation, $dimensions, $medium, "out");
	}

	function ajouterGalerie() {

	}
	// pour publier une image
	// l'ajouter � une galerie publique, elle doit d�j� �tre dans une galerie priv�e
	// 2014-04-08
	function ajouterContenuGalerie($idGalerie, $idimage) {
		$this->insert->callInsert2param("ajouter_contenu_galerie", $idGalerie, $idimage);
	}


	// pour ajouter une image � une galerie, elle doit d�j� �tre dans une autre galerie priv�e
	// 2014-04-10
	function ajouterContenuGaleriePrivee($idGalerie, $idimage) {
		$this->insert->callInsert2param("ajouter_contenu_galerie_privee", $idGalerie, $idimage);
	}

	function ajouterImageMembre($idMembre, $idimage) {
		$this->insert->callInsert2param($idMembre, $idimage, "ajouter_image_membre");
	}
}



