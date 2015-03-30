<?php
/*
 * utilisé par pageImageModifier.php
 * par le biais de navigationMembres.js (function getImagePourModifier(valeur))
 *

 * ------------------------------------------------------------
 * LOG
 * ------------------------------------------------------------
 * 2014-04-08 par nicole
 * utilisé par pageGaleriePubliqueAjouterImage.php
 * ------------------------------------------------------------
 */
$idimage= htmlentities($_POST['idimage']);

//-----------------------------------------------------------------------
if(!isset($_POST['type'])){
	$type="";
}
else {
	$type= htmlentities($_POST['type']);
}
//-----------------------------------------------------------------------
include "rechercherImage.class.php";
$cherche = new RechercherImage();
$liste=$cherche->afficherToutesLesInfos($idimage);
//-----------------------------------------------------------------------
switch ($_POST['type']):
//-----------------------------------------------------------------------
// afficher l'image à modifier
//-----------------------------------------------------------------------
case "modifier":
	echo "<fieldset>";
	echo "<figure>";
	echo "<img id='imageFull' src ='".$liste[0]['src']."'/>";
	echo "</figure>";

	$titre = $liste[0]["titre"];
	echo "<p>";
	echo 'Titre <input type="text" id="titre" name="titre" value="' . $liste[0]["titre"] . '" />';

	echo "</p><p>";
	echo 'Date de cr&eacute;ation <input type="text" id="datecreation" name="datecreation" value="' . $liste[0]["datecreation"] . '" />';
	echo "</p><p>";
	echo 'Medium <input type="text" id="medium" name="medium" value="' . $liste[0]["medium"] . '" />';
	echo "</p><p>";
	echo 'Dimensions <input type="text" id="dimensions" name="dimensions" value="' . $liste[0]["dimensions"] . '" />';
	echo "</p><p>";
	echo '<textarea rows="5" id="concept" name="concept" placeholder="Concept...">' . $liste[0]["concept"] . '</textarea>';
	echo "</p>";
	echo "<input type='hidden' value='".$idimage."' id='idimage' name='idimage'/>";
	$source = $liste[0]['src'];
	echo '<input type="hidden" id="source" name="source" value="' . $liste[0]['src'] . '" />';
	echo '<input type="submit" id="Modifier" name="Modifier" value="Modifier" />';
	echo "</fieldset>";
	break;

	//-----------------------------------------------------------------------
	// afficher l'image à ajouter à une galerie
	//-----------------------------------------------------------------------
case "ajoutAGalerie":
	echo "<fieldset>";
	echo "<figure>";
	echo "<img id='imageFull' src ='".$liste[0]['src']."'/>";
	echo "</figure>";
	$_POST['idimagechoisie']= $idimage;
	echo "<input type='hidden' value='" . $idimage . "' id='idimagechoisie' name='idimagechoisie'/>";
	echo '<input type="submit" id="Ajouter" name="Ajouter" value="Ajouter" />';
	echo "</fieldset>";
	break;

	//-----------------------------------------------------------------------
	// afficher l'image à enlever d'une galerie
	//-----------------------------------------------------------------------
case "enleverAGaleriePublique":
	echo "<fieldset>";
	echo "<figure>";
	echo "<img id='imageFull' src ='".$liste[0]['src']."'/>";
	echo "</figure>";
	$_POST['idimagechoisie']= $idimage;
	echo "<input type='hidden' value='" . $idimage . "' id='idimagechoisie' name='idimagechoisie'/>";
	echo '<input type="submit" id="Enlever" name="Enlever" value="Enlever" />';
	echo "</fieldset>";
	break;

case "enleverAGaleriePrivee":
	echo "<fieldset>";
	echo "<figure>";
	echo "<img id='imageFull' src ='".$liste[0]['src']."'/>";
	echo "</figure>";
	$_POST['idimagechoisie']= $idimage;
	echo "<input type='hidden' value='" . $idimage . "' id='idimagechoisie' name='idimagechoisie'/>";
	echo '<input type="submit" id="Enlever" name="Enlever" value="Enlever" />';
	echo "</fieldset>";
	break;



default:
	echo "erreur";
	break;
	endswitch;



