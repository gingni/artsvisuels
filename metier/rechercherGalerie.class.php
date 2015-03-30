<?php
/*
 * Par Nicole Gingras
 */
include_once "select.class.php";
class RechercherGalerie extends Select{

	private $select;

	function __construct() {
		$this->select = new Select();
	}

	function rechercherIdGroupe($idgroupe){
		$liste = $this->select->rechercher($idgroupe,"select * from galeries where idgroupe = :critere order by descriptiongalerie");
		if (count($liste)==0){
			echo "Il n'y a pas de galeries pour ce groupe";
		}
		return $liste;
	}
	
	function rechercherUneGalerie($idgalerie){
		$liste = $this->select->rechercher($idgalerie,"select * from galeries where idgalerie = :critere");
		if (count($liste)==0){
			echo "Cette galerie n'existe pas";
		}
		return $liste;
	}

	function getInfosGalerie($idgalerie){
		$liste = $this->select->callPS("get_infos_galerie", $idgalerie);
		if (count($liste)==0){
			echo "Cette galerie n'existe pas";
		}
		return $liste;
	}

	function rechercherUneGaleriePublique($idgalerie){
		$liste = $this->select->rechercher($idgalerie,"select * from galeries_publiques where idgaleries_publiques = :critere");
		if (count($liste)==0){
			echo "Cette galerie n'existe pas";
		}
		return $liste;
	}

	function rechercherSansCriteres(){
		$liste = $this->select->rechercherTous("select * from galeries");
		if (count($liste)==0){
			echo "Il n'y a pas de galeries pour ce groupe";
		}
		return $liste;
	}

	function afficherGaleries(){
		$procedureStockee= "afficherGaleries()";
		$liste = $this->select->callTous($procedureStockee);
		return $liste;
	}
	
	function afficherToutesLesGaleries(){
		$procedureStockee= "afficher_toutes_les_galeries()";
		$liste = $this->select->callTous($procedureStockee);
		return $liste;
	}
	
	function afficherGaleriesPubliques(){
		$procedureStockee= "afficher_galeries_publiques()";
		$liste = $this->select->callTous($procedureStockee);
		return $liste;
	}

	function rechercherTousPourSelect(){
		echo "<option value=\"none\">Selectionner une galerie</option>";
		
		$liste = $this->select->rechercherTous("select * from galeries");
		if (count($liste)==0){
			echo "Il n'y a pas de galeries";
		}
		else{
			foreach($liste as $ligne) {
				echo "<option value=" . $ligne["idgalerie"] . ">" . $ligne["descriptiongalerie"] . "</option>";
			}
		}
	}
}


