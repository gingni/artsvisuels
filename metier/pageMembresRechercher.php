<?php
/*
 * appelé par pageMembresRechercher() dans navigationMembres.js
 */

$type = $_POST["type"];
echo '<fieldset>';
echo '<legend>Informations</legend>';
echo '<p class="selection">S&eacute;lectionner une personne</p>';
echo '<select size="3" id="membreSelect" name="membreSelect" onchange="getInfos(this)">';
//echo "<option value=\"none\">S&eacute;lection</option>";

include_once 'rechercherMembre.class.php';
$cherche = new RechercherMembre();
$liste=$cherche->rechercherSansCriteres();

foreach($liste as $ligne) {
	//var_dump($ligne["nom"]);
	$chaine = "<option value=" . $ligne["idmembre"] . ">" . $ligne["nom"] . " ". $ligne["prenom"] . "</option>";
	echo $chaine;
}
echo '</select>';
echo '<p id="infos"></p>';
echo '</fieldset>';
