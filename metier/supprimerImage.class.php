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
				echo "Pas supprimée car n'existe pas";
				break;
					
			case 23000:
				echo "Cette image ne peut être supprimée";
				break;

			case 1:
				echo "Image supprimée";
				break;
					
			default:
				echo "Plusieurs images supprimées";
				break;
		}
	}
	
	// peut être exécutée par un étudiant
	// uniquement pour supprimer une image qui n'a pas été commentée
	function supprimerImagesSansCommentaires($idimage){
		$this->delete->callPS("supprimer_image_sans_commentaires", $idimage);
	}
	

}

