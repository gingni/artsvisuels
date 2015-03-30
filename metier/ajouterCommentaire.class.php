<?php
include_once "insert.class.php";
class AjouterCommentaire extends Insert {

	private $insert;
	function __construct() {
		$this->insert = new Insert();
	}

	function ajouterCommentaire($commentaire,$idimage,$idMembre) {
		if(isset($_POST['commentaire'])){
					$champs = array('commentaire', 'idimage', 'idMembre'); //le nom des champs pour construire la requete
					$valeurs = array ($commentaire, $idimage, $idMembre); // les valeurs à inclure dans la requete
					$critere = "idCours";
					$this->insert->ajouterCommentaire($champs,$valeurs,"commentaires");
		}
	}
}
