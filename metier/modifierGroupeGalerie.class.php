<?php
/*
 * appelée par un clic sur le bouton modifier
 * dans pageGaleriesModifier.php
 * modifié par nicole gingras 2014-04-03
 * -------------------------------------
 * log des changements
 * -------------------------------------
 * 2014-04-09
 * $publique_privee n'est plus utile car ajout de la table galeries_publiques
 * nicole
 * -------------------------------------
 * 
 * -------------------------------------
 * */
include_once "update.class.php";

class ModifierGroupeGalerie extends Update {

	private $modif;

	function __construct() {

		$this->modif= new Update();

	}

	function modifierGalerie($idGalerie){
			
		$descriptionGalerie = htmlentities($_POST['descriptionGalerie']);
		$enonceTravail = htmlentities($_POST['enonceTravail']);
		//var_dump($enonceTravail);
		$dateEcheance = htmlentities($_POST['dateEcheance']);
		$status = htmlentities($_POST['status']);
		//le nom des champs pour construire la requete
		$champs = array('descriptiongalerie', 'enonceTravail', 'dateEcheance', 'status');
		// les valeurs à inclure dans la requete
		$valeurs = array ($descriptionGalerie, $enonceTravail, $dateEcheance, $status);
		$criteres = array ("idgalerie");
		$valeursCriteres=array($idGalerie);

		$resultat = $this->modif->modifier($champs,$valeurs,$criteres,$valeursCriteres,"galeries");
		if ($resultat>0){
			echo "Modification faite";
		}
		else{
			echo "Pas modifié car n'existe pas";
		}

	}
	
	/* 
	ajouté, modifié le 2014-04-17
	*/
		function modifierGaleriePublique($idGalerie){

		$titregalerie = htmlentities($_POST['titregalerie']);			
		$descriptiongalerie = htmlentities($_POST['descriptiongalerie']);
		//var_dump($descriptiongalerie);
		$status = htmlentities($_POST['status']);

		$resultat = $this->modif->call4("modifier_galerie_publique", $idGalerie, $titregalerie, $descriptiongalerie, $status);
		if ($resultat>0){
			echo "Modification faite";
		}
		else{
			echo "Pas modifiée car n'existe pas";
		}
		
	}
	
	function modifierGroupe($idgroupe, $idprofesseur){
			
		$actif = htmlentities($_POST['actif']);
		
		//le nom des champs pour construire la requete
		$champs = array('idprofesseur', 'actif');
		
		// les valeurs à inclure dans la requete
		$valeurs = array ($idprofesseur, $actif);
		
		$criteres = array ("idgroupe");
		$valeursCriteres=array($idgroupe);

		$resultat = $this->modif->modifier($champs,$valeurs,$criteres,$valeursCriteres,"groupes");
		if ($resultat>0){
			echo "Modification faite";
		}
		else{
			echo "Pas modifié car n'existe pas";
		}
	}


	function groupe_Actif_Inactif($idgroupe){
			
		$actif = htmlentities($_POST['actif']);
		
		//le nom des champs pour construire la requete
		$champs = array('actif');
		
		// les valeurs à inclure dans la requete
		$valeurs = array ($actif);
		
		$criteres = array ("idgroupe");
		$valeursCriteres=array($idgroupe);

		$resultat = $this->modif->modifier($champs,$valeurs,$criteres,$valeursCriteres,"groupes");
		if ($resultat>0){
			echo "Modification faite";
		}
		else{
			echo "Pas modifié car n'existe pas";
		}
	}
}
