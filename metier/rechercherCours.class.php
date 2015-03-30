<?php
include_once "select.class.php";
class RechercherCours extends Select{

	private $select;

	function __construct() {
		$this->select = new Select();
	}

	//$liste qui peut �tre affich�e dans un tableau
	// am�lioration � faire : utiliser une proc�dure stock�e
	// --> callTous dans select.class.php
	function rechercherSansCriteres(){
		$liste =$this->select->rechercherTous(
		"select *
		from cours;"
		);
		if (count($liste)==0){
			echo "Il n'y a pas de cours";
		}
		return $liste;
	}

	function rechercherId($id){
		$liste =$this->select->rechercher($id,"select * from cours where idcours = :critere");
		if (count($liste)==0){
			echo "Pas de cours avec ce ID";
		}
		return $liste;
	}


}