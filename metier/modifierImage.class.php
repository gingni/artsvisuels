<?php
/*
 * appelée par un clic sur le bouton modifier
 * dans pageImageModifier.php
 * créé par nicole gingras 2014-04-04
 * */
include_once "update.class.php";

class ModifierImage extends Update {
	private $modif;
	function __construct() {
		$this->modif= new Update();
	}
	function modifierImage(){
		$idimage = htmlentities($_POST['imageSelect']);
		$titre = htmlentities($_POST['titre']);
		//var_dump($titre);
		$datecreation = htmlentities($_POST['datecreation']);
		$medium = htmlentities($_POST['medium']);
		$dimensions = htmlentities($_POST['dimensions']);
		$concept = htmlentities($_POST['concept']);

		$resultat = $this->modif->call6("modifier_image", $idimage, $titre, $datecreation, $medium, $dimensions, $concept);
		if ($resultat>0){
			echo "Les modifications de l'image sont enregistr&eacute;es";
		}
		else{
			echo "Pas modifié car n'existe pas";
		}
	}
}
