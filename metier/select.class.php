<?php
include_once 'connexion.class.php';
class Select extends Connexion{

	private $connexion;

	function __construct() {
		$this->connexion = new Connexion();
	}

	public function rechercherTous($requete) {
		try {
			$requete = $this->connexion->prepare($requete);
			$requete->execute();
			$nbLigne = $requete->fetchAll();/*$nbLigne sera vide si la requete ne retourne rien*/
			return $nbLigne;
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}

	public function rechercher($critere, $requete) {
		try {
			$requete = $this->connexion->prepare($requete);
			$requete->bindParam(':critere', $critere);
			$requete->execute();
			$nbLigne = $requete->fetchAll();/*$nbLigne sera vide si la requete ne retourne rien*/
			return $nbLigne;
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}

	public function rechercherDeuxCriteres($critere1,$critere2, $requete) {
		try {
			$requete = $this->connexion->prepare($requete);
			$requete->bindParam(':critere1', $critere1);
			$requete->bindParam(':critere2', $critere2);
			$requete->execute();
			$nbLigne = $requete->fetchAll();/*$nbLigne sera vide si la requete ne retourne rien*/
			return $nbLigne;
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}

	public function callTous($procedureStockee) {
		// plus simple d'utiliser une procédure stockée pour faire un select sur plusieurs tables
		// il faut avoir fait le bindParam si la procédure stockée a des critères
		try {
			$requete = $this->connexion->prepare("CALL $procedureStockee");
			$requete->execute();
			$nbLigne = $requete->fetchAll();
			return $nbLigne;
			$this->connexion = null;
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
	
	public function callPS2($procedureStockee, $valeurCritere, $valeurCritere2) {	
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