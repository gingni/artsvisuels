<?php
// classe contenant les fonctions pour faire des inserts dans les
// tables groupes et galeries

include_once "insert.class.php";
class AjouterGroupeGalerie extends Insert {

	private $insert;
	function __construct() {
		$this->insert = new Insert();
	}
	// pageGaleriePriveeAjouter.php utilise cette fonction
	function ajouterGalerie() {
		$idgroupe = htmlentities($_POST['idGroupe']);
		$descriptiongalerie = htmlentities($_POST['descriptiongalerie']);
		$enonceTravail = htmlentities($_POST['enonceTravail']);
		$dateEcheance = htmlentities($_POST['dateEcheance']);
		//var_dump($descriptiongalerie);
		$this->insert->callInsert4param("ajouter_galerie",$idgroupe, $descriptiongalerie, $enonceTravail, $dateEcheance);

	}

	// pageGaleriePubliqueAjouter.php utilise cette fonction
	function ajouterGaleriePublique() {
		
		$descriptiongalerie = htmlentities($_POST['descriptiongalerie']);
		$titregalerie = htmlentities($_POST['titregalerie']);
		$this->insert->callInsert2param("ajouter_galerie_publique", $titregalerie, $descriptiongalerie);

	}

	function ajouterGroupe($session, $idcours, $idprofesseur, $annee) {

		$this->insert->callInsert4param("ajouter_groupe",$session, $idcours, $idprofesseur, $annee);

	}
}
