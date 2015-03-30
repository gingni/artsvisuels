<?php
/*en cours de modification
 * but: passer plusieurs critères
 * i.e. alias et mot de passe
 * */
include_once "update.class.php";

class ModifierMembre extends Update {
	private $modif;
	function __construct() {
		$this->modif= new Update();
	}

	function modifierMembre(){

		if(isset($_POST['alias'])){

			$nom=htmlentities($_POST['nom']);
			$prenom=htmlentities($_POST['prenom']);
			$alias=htmlentities($_POST['alias']);
			$mdp=htmlentities($_POST['mdp']);
			$type=htmlentities($_POST['type']);
			if($type!=="professeur"){
				$type="etudiant";
			}

			$mdp=sha1($mdp);

			if(empty($alias)||empty($nom)||empty($prenom)||empty($mdp)){
				echo "Tous les champs sont obligatoires";
			}
			else{
				$champs = array('nom','prenom','alias','mdp',"type"); //le nom des champs pour construire la requete
				$valeurs = array ($nom,$prenom,$alias,$mdp,$type); // les valeurs à inclure dans la requete
				$criteres = array ("alias");
				$valeursCriteres=array($alias);

				$resultat = $this->modif->modifier($champs,$valeurs,$criteres,$valeursCriteres,"membres");
				if ($resultat>0){
					echo "Modification faite";
				}
				else{
					echo "Pas modifié car n'existe pas";
				}
			}
		}

	}


/*
2014-04-18 pour permettre aux étudiants de choisir leur alias et modifier leur mot de passe
*/
	function modifierAliasMdp($idMembre){

		if(isset($_POST['alias'])){
			
			$alias=htmlentities($_POST['alias']);
			$courriel=htmlentities($_POST['courriel']);
			$mdp=htmlentities($_POST['mdp']);
			$mdp=sha1($mdp);

			if(empty($alias)||empty($mdp)){
				echo "Tous les champs sont obligatoires";
			}
			else{


				$resultat = $this->modif->call4("modifier_alias_mdp", $idMembre, $alias, $mdp, $courriel);
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
