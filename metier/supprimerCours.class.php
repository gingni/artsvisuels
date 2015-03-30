
<?php
include_once "delete.class.php";

class SupprimerCours {

	private $delete;

	function __construct() {
		$this->delete = new Delete();
	}

	function supprimer($idCours) {
		$table = "cours";
		//$alias est la clef de l'enregistrement à supprimer
		$resultat = $this->delete->supprimer("idCours",$idCours, $table);
		switch ($resultat) {
			case 0:
				echo "Pas supprimé car n'existe pas";
				break;
					
			case 23000:
				echo "Ce cours ne peut être supprimé car il a un historique de galeries, membres ou autres";
				break;

			case 1:
				echo "Cours supprimé";
				break;
					
			default:
				echo "Plus d'un cours supprimé!";;
				break;
		}
	}
}

