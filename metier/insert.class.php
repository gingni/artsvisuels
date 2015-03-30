<?php
include_once 'connexion.class.php';

class Insert extends Connexion{

	private $connexion;
	private $listeChamps;
	private $listeBindParam;

	function __construct() {
		$this->connexion = new Connexion();
	}

	// champs valeurs sont des array
	public function ajouter($champs, $valeurs, $critere, $valeurCritere, $table) {
		try {
			//avant d'ajouter on vérifie si c'est déjà là

			//NB cette vérification peut sembler inutile puisqu'on peut
			//mettre une condition sur le insert et simplement vérifier s'il n'a pas eu lieu (valeur déjà existante)

			//mais ce qu'il ne faut pas oublier, c'est que la recherche peut se
			//faire sur un champ qui n'est pas une clé primaire
			//et on veut éviter de créer deux
			//enregistrements différents avec cette valeur

			$requete = $this->connexion->prepare("select * from $table where $critere = :$critere");

			$requete->bindParam(":$critere", $valeurCritere);
			$requete->execute();
			$resultat = $requete->rowCount();

			if ($resultat>0) // s'il y a quelque chose la requete retourne true
			{
				echo "Déjà existant";
			}
			//sinon on ajoute
			else
			{
				$nb = count($champs);
				$listeChamps="";
				$listeValeurs="";
				$arrayChamps= array();
				$arrayValeurs= array();
				foreach ($champs as $clef => $champ){
					//var_dump($clef);
					//var_dump($champ);
					//var_dump(count($champs));
					if ($clef == $nb - 1) {
						$listeChamps = $listeChamps . ":" . $champ;
						$listeValeurs = $listeValeurs . "$champ";
					}
					else{
						$listeChamps = $listeChamps . ":" . $champ. ", ";
						$listeValeurs = $listeValeurs . "$champ, ";
					}
					array_push($arrayChamps, ":$champ");
				}
				foreach ($valeurs as $clef => $valeur){
					array_push($arrayValeurs, $valeur);
				}

				$requete = $this->connexion->prepare("insert into $table ($listeValeurs) values ($listeChamps)");
				for ($i = 0; $i < $nb; $i++){
					$requete->bindValue($arrayChamps[$i], $arrayValeurs[$i]);
				}
				$requete->execute();

				$this->connexion = null;
				echo "Ajout fait";
			}
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}

	public function callInsert3champs($procedureStockee, $valeurCritere1, $valeurCritere2, $valeurCritere3 ) {	
		try {
			$requete = $this->connexion->prepare("CALL $procedureStockee(?,?,?)");
			// faire le bindParam du critère			
			$requete->bindParam(1, $valeurCritere);		
			$requete->bindParam(2, $valeurCritere);	
			$requete->bindParam(3, $valeurCritere);		
			$requete->execute();			
			$nbLigne = $requete->fetchAll();			
			return $nbLigne;
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}
	
	public function callInsert2param($procedureStockee, $valeurCritere1, $valeurCritere2 ) {	
		try {
			$requete = $this->connexion->prepare("CALL $procedureStockee(?,?)");
			// faire le bindParam du critère			
			$requete->bindParam(1, $valeurCritere1);		
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
	public function callInsert4param($procedureStockee, $valeurCritere1, $valeurCritere2, $valeurCritere3, $valeurCritere4 ) {	
		try {
			$requete = $this->connexion->prepare("CALL $procedureStockee(?,?,?,?)");
			// faire le bindParam du critère			
			$requete->bindParam(1, $valeurCritere1);		
			$requete->bindParam(2, $valeurCritere2);
			$requete->bindParam(3, $valeurCritere3);
			$requete->bindParam(4, $valeurCritere4);
			$requete->execute();			
			$nbLigne = $requete->fetchAll();			
			return $nbLigne;
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}

	
	public function callInsert8AvecPS($procedureStockee, $champ1, $champ2, $champ3, $champ4, $champ5, $champ6, $champ7, $champ8) {	
		try {
			$requete = $this->connexion->prepare("CALL $procedureStockee(?,?,?,?,?,?,?,?)");		
			$requete->bindParam(1, $champ1, PDO::PARAM_STR, 4000);		
			$requete->bindParam(2, $champ2, PDO::PARAM_STR, 4000);	
			$requete->bindParam(3, $champ3, PDO::PARAM_STR, 4000);
			$requete->bindParam(4, $champ4, PDO::PARAM_STR, 4000);	
			$requete->bindParam(5, $champ5, PDO::PARAM_STR, 4000);	
			$requete->bindParam(6, $champ6, PDO::PARAM_STR, 4000);	
			$requete->bindParam(7, $champ7, PDO::PARAM_STR, 4000);	
			$requete->bindParam(8, $champ8, PDO::PARAM_STR, 4000);			
			$requete->execute();
			$requete = $this->connexion->prepare("select last_insert_id()");
			$requete->execute();
			
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}
	
	public function callInsert5AvecPS($procedureStockee, $champ1, $champ2, $champ3, $champ4, $champ5) {	
		try {
			$requete = $this->connexion->prepare("CALL $procedureStockee(?,?,?,?,?)");		
			$requete->bindParam(1, $champ1, PDO::PARAM_STR, 4000);		
			$requete->bindParam(2, $champ2, PDO::PARAM_STR, 4000);	
			$requete->bindParam(3, $champ3, PDO::PARAM_STR, 4000);
			$requete->bindParam(4, $champ4, PDO::PARAM_STR, 4000);	
			$requete->bindParam(5, $champ5, PDO::PARAM_STR, 4000);			
			$requete->execute();
			
			//var_dump($requete);
			$requete = $this->connexion->prepare("select last_insert_id()");
			$requete->execute();
			
			$this->connexion = null;
		}
		catch (PDOException $e) {
			echo "<p>Erreur: " . $e->getMessage() . "</p>";
		}
	}

	
	function ajouterCommentaire($champs, $valeurs, $table){
	$nb = count($champs);
				$listeChamps="";
				$listeValeurs="";
				$arrayChamps= array();
				$arrayValeurs= array();
				foreach ($champs as $clef => $champ){
					//var_dump($clef);
					//var_dump($champ);
					//var_dump(count($champs));
					if ($clef == $nb - 1) {
						$listeChamps = $listeChamps . ":" . $champ;
						$listeValeurs = $listeValeurs . "$champ";
					}
					else{
						$listeChamps = $listeChamps . ":" . $champ. ", ";
						$listeValeurs = $listeValeurs . "$champ, ";
					}
					array_push($arrayChamps, ":$champ");
				}
				foreach ($valeurs as $clef => $valeur){
					array_push($arrayValeurs, $valeur);
				}

				$requete = $this->connexion->prepare("insert into $table ($listeValeurs) values ($listeChamps)");
				for ($i = 0; $i < $nb; $i++){
					$requete->bindValue($arrayChamps[$i], $arrayValeurs[$i]);
				}
				$requete->execute();

				$this->connexion = null;
				echo "Ajout fait";
	}

}
?>