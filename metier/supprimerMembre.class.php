
<?php
include_once "delete.class.php";

class SupprimerMembre {

	private $delete;

	function __construct() {
		$this->delete = new Delete();
	}

	function supprimer($alias) {
		$table = "membres";
		//$alias est la clef de l'enregistrement � supprimer
		$resultat = $this->delete->supprimer("alias",$alias, $table);
		switch ($resultat) {
			case 0:
				echo "Pas supprim� car n'existe pas";
				break;
					
			case 23000:
				echo "Ce membre ne peut �tre supprim� que si on supprimer d'abord ses images et autres donn�es.";
				break;

			case 1:
				echo "Membre supprim�";
				break;
					
			default:
				echo "Plus d'un membre supprim�!";;
				break;
		}
	}
}

