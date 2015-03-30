<?php
/*
 * ------------------------
 * log des changements
 * ------------------------
 * 2014-04-08
 * ajout de enleverImageGalerie et supprimerImageContenuGalerie
 * ------------------------
 */
include_once "delete.class.php";

class SupprimerGroupeGalerie {

	private $delete;

	function __construct() {
		$this->delete = new Delete();
	}

	function supprimerGalerie($critere){
		$this->delete->callPS("supprimer_galerie_et_contenu", $critere);
	}
	
	function supprimerGroupe($critere){
		$this->delete->callPS("supprimer_groupe", $critere);
	}
	
	// une fonction pour faire le grand ménage dans les galeries privées
	// ne supprime pas les images car elles peuvent être utilisées pour la partie publique
	function supprimerGroupeGalerieContenu($critere){
		$this->delete->callPS("supprimer_groupe_galeries_contenu", $critere);
	}
	
	// appelée par pageGaleriePriveeSupprimerImage.php
	function enleverImageGalerie($idimage, $idgalerie){
		
		$this->delete->callPS2param("supprimer_contenu_galerie", $idimage, $idgalerie);
	}
	
	// appelée par pageGaleriePubliqueSupprimerImage.php
	function enleverImageGaleriePublique($idimage, $idgalerie){

		$this->delete->callPS2param("supprimer_contenu_galerie_publique", $idimage, $idgalerie);
	}
}

