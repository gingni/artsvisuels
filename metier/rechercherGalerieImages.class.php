<?php
/*
 * Par Nicole Gingras
 */
include_once "select.class.php";
class RechercherGalerieImages extends Select{

	private $select;

	function __construct() {
		$this->select = new Select();
	}

	function rechercherIdGalerie($idgalerie){
		$liste = $this->select->rechercher($idgalerie,"select * from contenuegalerie where idgalerie = :critere");
		if (count($liste)==0){
			echo "Il n'y a pas d'images pour cette galerie";
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
		//var_dump($liste);
		return $liste;
	}

	function rechercherTousPourSelect(){
		echo "<option value=\"none\">Selectionner une galerie</option>";
		
		$liste = $this->select->rechercherTous("select * from galeries");
		if (count($liste)==0){
			echo "Il n'y a pas de galeries";//peu probable
		}
		else{
			foreach($liste as $ligne) {
				echo "<option value=" . $ligne["idgalerie"] . ">" . $ligne["descriptiongalerie"] . "</option>";
			}
		}
	}
}


