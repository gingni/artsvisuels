
<?php
include_once "insert.class.php";
class AjouterMembre extends Insert {

	private $insert;
	function __construct() {
		$this->insert = new Insert();
	}

	function ajouterMembre() {
		if(isset($_POST['alias'])){

			$nom=htmlentities($_POST['nom']);
			$prenom=htmlentities($_POST['prenom']);
			$alias=htmlentities($_POST['alias']);
			$mdp=htmlentities($_POST['mdp']);
			$type=htmlentities($_POST['type']);
			$mdp=sha1($mdp);

			if($type=="etudiant"){
				if(isset($_POST['noda'])){
					$noda=htmlentities($_POST['noda']);

					if(empty($alias)||empty($nom)||empty($prenom)||empty($mdp)||empty($noda)){
						echo "Pour ajouter un �tudiant, tous les champs sont obligatoires";

					}
					else{

						$champs = array('noda', 'nom', 'prenom','alias','mdp', "type"); //le nom des champs pour construire la requete
						$valeurs = array ($noda, $nom, $prenom, $alias, $mdp, "$type"); // les valeurs � inclure dans la requete

						// v�rifier si un �tudiant existe d�j� avec ce noda avant de l'ins�rer
						// si c'est ok on fait l'ajout dans la table membre
						$this->insert->ajouter($champs,$valeurs,"noda",$noda,"membres");
					}
				}
			}
			if($type=="professeur"){

				if(empty($alias)||empty($nom)||empty($prenom)||empty($mdp)){
					echo "tous les champs sont obligatoires";
					$valide = false;
				}

				else{
					$champs = array('nom', 'prenom', 'alias', 'mdp', "type"); //le nom des champs pour construire la requete
					$valeurs = array ($nom, $prenom, $alias, $mdp, $type); // les valeurs � inclure dans la requete insert
					// on passe "alias" pour v�rifier si un membre existe d�j� avec cet alias avant de l'ins�rer
					// n.b. v�rification inutile car faite avec javascript, mais �a ne change rien de la laisser l�
					// si c'est ok on fait l'ajout dans la table membre
					$this->insert->ajouter($champs,$valeurs,"alias",$alias,"membres");
				}
			}
		}
	}
}
