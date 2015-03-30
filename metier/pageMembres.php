<?php

echo '<h3>Liste des membres</h3>';
echo '<fieldset>';

$type = $_POST["type"];
echo '<p id="types">';
echo '<select id="typeSelect" name="typeSelect" onchange="getListePourTable(this);">';
echo "<option value=\"none\">S&eacute;lection</option>";
echo '<option value="etudiant">&Eacute;tudiants</option>';
echo '<option value="professeur">Professeurs</option>';
echo '<option value="gestion">Gestionnaires du site</option>';
echo '<option value="tous">Tous les membres</option>';
echo '</select>';
echo '</p>';
echo '<table id="membreSelect"></table>';
echo '</fieldset>';
echo '';

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
