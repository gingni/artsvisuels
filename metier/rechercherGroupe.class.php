<?php
/*
 * Les fonctions pour faire des recherches sur les groupes
 * */
include_once "select.class.php";
class RechercherGroupe extends Select{

	private $select;

	function __construct() {
		$this->select = new Select();
	}

	function rechercherUnGroupe($critere)
	{
		$liste =$this->select->callPS("afficher_un_groupe", $critere);
		return $liste;
	}

	function rechercherSansCritere(){
		$liste =$this->select->callTous("afficher_groupes");
		if (count($liste)==0){
			echo "<option>Il n'y a pas de groupe</option>";
		}else{
			foreach($liste as $ligne) {
				$ligneaffichee = "<option value=" . $ligne["idgroupe"] . ">" . $ligne["descriptioncours"]. " - " . $ligne["annee"] . " - " . $ligne["session"] . "</option>";
				echo $ligneaffichee;
			}
		}
	}
	function rechercherTousLesGroupes(){
		$liste =$this->select->callTous("afficher_tous_les_groupes");
		if (count($liste)==0){
			echo "<option>Il n'y a pas de groupe</option>";
		}else{
			return $liste;
		}
	}


	function rechercherPourPageContenu(){
		$liste =$this->select->callTous("get_groupes_avec_galeries");
		//echo "<option value=\"none\">S&eacute;lectionner un groupe</option>";
		if (count($liste)==0){
			echo "<option>Il n'y a pas de groupe</option>";
		}else{
			foreach($liste as $ligne) {
				$ligneaffichee = "<option value=" . $ligne["idgroupe"] . ">" . $ligne["descriptioncours"]. " - " . $ligne["annee"] . " - " . $ligne["session"] . "</option>";
				echo $ligneaffichee;
			}
		}
	}

	function rechercherPourListe(){
		$liste =$this->select->callTous("get_groupes_avec_galeries");
		//echo "<option value=\"none\">S&eacute;lectionner un groupe</option>";
		if (count($liste)==0){
			echo "<option>Il n'y a pas de groupe</option>";
		}else{


			echo "<table>";
			echo "<tr>";
			echo "<th>id Groupe</th>";
			echo "<th>Cours</th>";
			echo "<th>Ann&eacute;</th>";
			echo "<th>Session</th>";
			echo "<th>Professeur</th>";
			echo "</tr>";

			foreach($liste as $ligne) {
				echo "<tr>";
				echo "<td>" . $ligne["idgroupe"] . "</td>";
				echo "<td>" . $ligne['descriptioncours'] . "</td>";
				echo "<td>" . $ligne['annee'] . "</td>";
				echo "<td>" . $ligne['session'] . "</td>";
				echo "<td>" . $ligne['professeur'] . "</td>";

				echo "</tr>";
			}
			echo "</table>";
		}
	}

	function rechercherPourPageImage(){
		// cette fonction permet de rechercher uniquement les groupes pour lesquels une galerie a été créée

		$liste =$this->select->callTous("get_groupes_avec_galeries");
		echo '<p class="selection">S&eacute;lectionner un groupe</p>';
		echo '<select size="3" id="groupeSelect" name="groupeSelect" onchange="getListeGaleries(this)">';

		//echo "<option value=\"none\">S&eacute;lectionner un groupe</option>";

		if (count($liste)==0){
			echo "<option>Il n'y a pas de groupe</option>";
		}else{
			foreach($liste as $ligne) {
				$ligneaffichee = "<option value=" . $ligne["idgroupe"] . ">" . $ligne["descriptioncours"]. " - " . $ligne["annee"] . " - " . $ligne["session"] . "</option>";
				echo $ligneaffichee;
			}
			echo '</select>';
			//echo '<input type="hidden"  name="dossier"  value="' . $ligne["dossier"] . '">';
			//echo '<input type="hidden"  name="session"  value="' . $ligne["session"] . '">';
			//echo '<input type="hidden"  name="annee"  value="' . $ligne["annee"] . '">';
		}
	}

	function rechercherPourModifierGalerie(){
		// cette fonction permet de rechercher uniquement les groupes pour lesquels une galerie a été créée

		$liste =$this->select->callTous("get_groupes_avec_galeries");
		return $liste;

	}

}
