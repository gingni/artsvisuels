<?php
/*
 * nicole gingras modifié 2014-04-03
 */
include_once 'connexion.class.php';

class Update {

	private $connexion;
	private $listeChamps;
	private $listeBindParam;

	function __construct() {
		$this->connexion = new Connexion();
	}

	// champs valeurs sont des array
	//$champs,$valeurs,$criteres,$valeursCriteres,"membres"
	public function modifier($champs, $valeurs, $criteres, $valeursCriteres, $table) {
		try {

			// construction de la chaine des champs
			$nb = count($champs);
			$listeChamps="";
			$arrayChamps= array();
			$arrayValeurs= array();
			for ($i = 0; $i < $nb; $i++){

				if ($i == $nb - 1) {
					$listeChamps = "$listeChamps$champs[$i]=:$champs[$i]";

				}
				else{
					$listeChamps = "$listeChamps$champs[$i]=:$champs[$i], ";
				}
				array_push($arrayChamps, ":$champs[$i]");
				array_push($arrayValeurs, "$valeurs[$i]");
			}

			// construction de la chaine des criteres
			$nbCriteres = count($criteres);
			$listeCriteres="";
			$arrayCriteres= array();
			$arrayValeursCriteres= array();
			for ($i = 0; $i < $nbCriteres; $i++){

				if ($i == $nbCriteres - 1) {
					$listeCriteres = "$listeCriteres$criteres[$i]=:$criteres[$i]";

				}
				else{
					$listeCriteres = "$listeCriteres$criteres[$i]=:$criteres[$i] and ";
				}
				array_push($arrayCriteres, ":$criteres[$i]");
				array_push($arrayValeursCriteres, $valeursCriteres[$i]);
			}

			$requete = $this->connexion->prepare("Update $table set $listeChamps where $listeCriteres");
			//var_dump($requete);
			for ($i = 0; $i < $nb; $i++){
				//var_dump($arrayValeurs[$i]);
				//var_dump($arrayChamps[$i]);
				$requete->bindValue($arrayChamps[$i], $arrayValeurs[$i]);
			}

			for ($i = 0; $i < $nbCriteres; $i++){
				$requete->bindValue($arrayCriteres[$i], $arrayValeursCriteres[$i]);
			}
			$requete->execute();
			return $requete->rowCount();
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}

	/*
	 * utilisé par modifierImage.class.php
	 */
	function call6($procedureStockee, $champ1, $champ2, $champ3, $champ4, $champ5, $champ6)
	{
		try {
			$requete = $this->connexion->prepare("CALL $procedureStockee(?,?,?,?,?,?)");
			// faire le bindParam du critère			
			$requete->bindParam(1, $champ1, PDO::PARAM_STR, 4000);		
			$requete->bindParam(2, $champ2, PDO::PARAM_STR, 4000);	
			$requete->bindParam(3, $champ3, PDO::PARAM_STR, 4000);
			$requete->bindParam(4, $champ4, PDO::PARAM_STR, 4000);	
			$requete->bindParam(5, $champ5, PDO::PARAM_STR, 4000);	
			$requete->bindParam(6, $champ6, PDO::PARAM_STR, 4000);
			$requete->execute();			
			$nbLigne = $requete->fetchAll();			
			return $nbLigne;
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}

	/*
	 * utilisé par modifierGroupeGalerie.class.php
	 */
	function call4($procedureStockee, $champ1, $champ2, $champ3, $champ4)
	{
		try {
			$requete = $this->connexion->prepare("CALL $procedureStockee(?,?,?,?)");
			// faire le bindParam du critère			
			$requete->bindParam(1, $champ1, PDO::PARAM_STR, 4000);		
			$requete->bindParam(2, $champ2, PDO::PARAM_STR, 4000);	
			$requete->bindParam(3, $champ3, PDO::PARAM_STR, 4000);
			$requete->bindParam(4, $champ4, PDO::PARAM_STR, 4000);
			$requete->execute();			
			$nbLigne = $requete->fetchAll();			
			return $nbLigne;
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}


	/*
	 * utilisé par
	 */
	function call3($procedureStockee, $champ1, $champ2, $champ3)
	{
		try {
			$requete = $this->connexion->prepare("CALL $procedureStockee(?,?,?)");
			// faire le bindParam du critère			
			$requete->bindParam(1, $champ1, PDO::PARAM_STR, 4000);		
			$requete->bindParam(2, $champ2, PDO::PARAM_STR, 4000);	
			$requete->bindParam(3, $champ3, PDO::PARAM_STR, 4000);
			$requete->execute();			
			$nbLigne = $requete->fetchAll();			
			return $nbLigne;
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}

	/*
	 * utilisé par
	 */
	function call2($procedureStockee, $champ1, $champ2)
	{
		try {
			$requete = $this->connexion->prepare("CALL $procedureStockee(?,?)");
			// faire le bindParam du critère			
			$requete->bindParam(1, $champ1, PDO::PARAM_STR, 4000);		
			$requete->bindParam(2, $champ2, PDO::PARAM_STR, 4000);	
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