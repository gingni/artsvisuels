<?php
/*en cours de modification
 * but: passer plusieurs critères
 * i.e. alias et mot de passe
 * */
include_once "update.class.php";

class ModifierCours extends Update {
	private $modif;
	function __construct() {
		$this->modif= new Update();
	}
	function modifierCours(){

		if(isset($_POST['noCours'])){
				
			$nocours=htmlentities($_POST['noCours']);
			$descriptioncours=htmlentities($_POST['descriptionCours']);


			if(empty($nocours)||empty($descriptioncours)){
				echo "Tous les champs sont obligatoires";
			}
			else{
				$champs = array('descriptioncours'); //le nom des champs pour construire la requete
				$valeurs = array ($descriptioncours); // les valeurs à inclure dans la requete
				$criteres = array ("idcours");
				$valeurscriteres=array($nocours);


				$resultat = $this->modif->modifier($champs,$valeurs,$criteres,$valeurscriteres,"cours");
				
				if ($resultat>0){
					echo "Modification faite";
				}
				else{
					echo "Pas modifié car n'existe pas";
				}
			}
		}

	}

}
