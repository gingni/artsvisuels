<?php
include_once 'connexion.class.php';

/*
 * classe conçue dans le but d'être réutilisée le plus simplement possible
 * par Nicole Gingras
 * automne 2013
 * */

class Delete {

	private $connexion;

	function __construct() {
		$this->connexion = new Connexion();
	}

	// champs valeurs sont des array
	public function supprimer($critere, $valeurCritere, $table) {
		try {
			$requete = $this->connexion->prepare("delete from $table where $critere = :$critere");
			$requete->bindParam(":$critere", $valeurCritere);
			$requete->execute();
			$test = $requete->errorCode();
			if ($test != 00000) {
				$resultat = $test;
			} else{
				$resultat = $requete->rowCount();
			}
			$this->connexion = null;
			return $resultat;

		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}
	
	public function callPS($procedureStockee, $valeurCritere) {	
		try {
			$requete = $this->connexion->prepare("CALL $procedureStockee(?)");
			// faire le bindParam du critère			
			$requete->bindParam(1, $valeurCritere);			
			$requete->execute();			
			$nbLigne = $requete->fetchAll();			
			return $nbLigne;
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}
	
	public function callPS2param($procedureStockee, $valeurCritere, $valeurCritere2) {	
		try {
			$requete = $this->connexion->prepare("CALL $procedureStockee(?,?)");
			// faire le bindParam du critère		
			$requete->bindParam(1, $valeurCritere);	
			$requete->bindParam(2, $valeurCritere2);			
			$requete->execute();			
			$nbLigne = $requete->fetchAll();			
			return $nbLigne;
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}
}
?>