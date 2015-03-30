
<?php
include_once "insert.class.php";
class AjouterCours extends Insert {

	private $insert;
	function __construct() {
		$this->insert = new Insert();
	}

	function ajouterCours() {
		if(isset($_POST['noCours'])){
			$idCours=htmlentities($_POST['idCours']);
			$noCours=htmlentities($_POST['noCours']);
			$descriptionCours=htmlentities($_POST['descriptionCours']);			


				if(empty($noCours)||empty($descriptionCours) ||empty($idCours)){
					echo "Tous les champs sont obligatoires";
					$valide = false;
				}

				else{
					$champs = array('idCours', 'noCours', 'descriptionCours'); //le nom des champs pour construire la requete
					$valeurs = array ($idCours, $noCours, $descriptionCours); // les valeurs à inclure dans la requete
					$critere = "idCours";

					$this->insert->ajouter($champs,$valeurs,$critere,$idCours,"cours");

			}
		}
	}
}
