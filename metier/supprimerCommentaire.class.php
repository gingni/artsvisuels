
<?php
include_once "delete.class.php";

class SupprimerCommentaire {

	private $delete;

	function __construct() {
		$this->delete = new Delete();
	}

	function supprimer($valeurCritere) {

		$resultat = $this->delete->callPS("supprimer_commentaire", $valeurCritere);
	}
}

