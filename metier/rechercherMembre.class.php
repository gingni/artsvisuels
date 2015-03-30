<?php
include_once "select.class.php";
class RechercherMembre extends Select{

	private $select;

	function __construct() {
		$this->select = new Select();
	}

	//$liste qui peut etre affichee dans un tableau
	// amelioration a faire : utiliser une proedure stockee
	// --> callTous dans select.class.php
	function rechercherSansCriteres(){
		$liste =$this->select->rechercherTous(
		"SELECT * FROM  `membres` order by nom, prenom"
		);
		if (count($liste)==0){
			echo "Il n'y a pas de membres";
		}
		//var_dump($liste);
		return $liste;
	}

	function rechercherAlias($alias){
		$liste =$this->select->rechercher($alias,"select * from membres where alias = :critere");
		if (count($liste)==0){
			echo "Cet alias n'existe pas";
		}
		return $liste;
	}

	function rechercherId($id){
		$liste =$this->select->rechercher($id,"select * from membres where idmembre = :critere");
		if (count($liste)==0){
			echo "Pas de membre avec ce ID";
		}
		return $liste;
	}

	function rechercherType($critere){

		$liste =$this->select->rechercher($critere,"select * from membres where type = :critere");

		if (count($liste)==0){
			echo "Aucun membre de ce type";
		}
		return $liste;
	}

	function rechercherAliasEtMdp($alias, $mdp){
		$liste =$this->select->rechercherDeuxCriteres($alias, $mdp, "select * from membres where alias = :critere1 and mdp = :critere2");
		if (count($liste)==0){
			echo "Les informations sont incorrectes";
		}
		return $liste;
	}
/*
 * il ne devrait pas y avoir ce genre de fonction ici
 * elle retourne des lignes dans un select
 * au lieu du résultat de la requête
 * séparation des couches interface et métier
 * */
	function rechercherMembresPourSelect(){
		$liste =$this->select->rechercherTous( "select * from membres order by nom, prenom;");		
		echo '<select name="alias" id="alias">';

		if (count($liste)==0){
			echo "Il n'y a pas de membres";
		}else {
			foreach($liste as $ligne) {
				echo "<option value=" . $ligne["idmembre"] . ">" . $ligne["prenom"] . " ". $ligne["nom"] . "</option>";
				//var_dump($_SESSION['idmembre']);

				if($_SESSION['idmembre']==$ligne["idmembre"]){
					//var_dump($ligne["idmembre"]);
					echo "<option value=". $_SESSION['idmembre']. " selected>". $ligne["prenom"] . " ". $ligne["nom"] . "</option>";
				}
			}
			echo "</select>";
		}		
	}
	
/*
 * il ne devrait pas y avoir ce genre de fonction ici
 * elle retourne des lignes dans un select
 * au lieu du résultat de la requête
 * séparation des couches interface et métier
 * */	function rechercherUnMembre($id){
		$liste =$this->select->rechercher($id,"select * from membres where idmembre = :critere");
		if (count($liste)==0){
			echo "Pas de membre avec ce ID";
		}else{
			foreach($liste as $ligne) {
				echo $ligne["prenom"] . " ". $ligne["nom"];
				return $ligne["alias"];
			}
		}
	}
	
	function afficher_membres_actuels_ou_anciens($type, $actif)
	{
		$liste = $this->select->callPS2("afficher_membres_actuels_ou_anciens", $type, $actif);
		return $liste;
	}
}