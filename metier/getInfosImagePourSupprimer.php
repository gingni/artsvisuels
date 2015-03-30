<?php
/*
 * utilisé par pageImagesSupprimer.php
 * par le biais de navigationMembres.js (function getImagePourSupprimer(valeur))
 */
include "rechercherImage.class.php";
$cherche = new RechercherImage();
$idimage= $_POST['idimage'];
$liste=$cherche->afficherToutesLesInfos($idimage);

echo "<fieldset>";
echo "<figure>";
echo "<img id='imageFull' src ='".$liste[0]['src']."'/>";
echo "<figcaption>";
echo "<p>".$liste[0]['titre']."</p>";
echo "<p>".$liste[0]['datecreation']."</p>";
echo "<p>".$liste[0]['nomEtudiant']."</p>";
echo "<p>".$liste[0]['medium']."</p>";
echo "<p>".$liste[0]['dimensions']."</p>";
echo "</figcaption>";
echo "</figure>";

echo "<input type='hidden' value='".$idimage."' id='idimage'/>";
$source = $liste[0]['src']; // pour pouvoir faire le unlink dans pageImagesSupprimer.php
echo '<input type="hidden" id="source" name="source" value="' . $liste[0]['src'] . '" />';
echo '<input type="submit" id="Supprimer" value="Supprimer" onclick="supprimerImage';
echo "(" . $idimage . ")";
echo '"/>';
echo '<p id="reponse"></p>';
echo "</fieldset>";

//var_dump($liste[0]['src']);