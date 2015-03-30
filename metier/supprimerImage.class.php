<?php

include_once "delete.class.php";

class SupprimerImage {

	private $delete;

	function __construct() {
		$this->delete = new Delete();
	}

	function supprimer($idimage) {
		$table = "images";
		
		$resultat = $this->delete->supprimer("idimage", $idimage, $table);
		switch ($resultat) {
			case 0:
				echo "Pas supprim�e car n'existe pas";
				break;
					
			case 23000:
				echo "Cette image ne peut �tre supprim�e";
				break;

			case 1:
				echo "Image supprim�e";
				break;
					
			default:
				echo "Plusieurs images supprim�es";
				break;
		}
	}
	
	// peut �tre ex�cut�e par un �tudiant
	// uniquement pour supprimer une image qui n'a pas �t� comment�e
	function supprimerImagesSansCommentaires($idimage){
		$this->delete->callPS("supprimer_image_sans_commentaires", $idimage);
	}
	

}

