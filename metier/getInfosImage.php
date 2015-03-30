<?php
// utilisé par toutes les pages qui affichent une image et ses commentaires
// permettent d' ajouter un commentaire

include "rechercherImage.class.php";
$cherche = new RechercherImage();
$idimage= $_POST['idimage'];
$liste=$cherche->afficherToutesLesInfos($idimage);

echo "<fieldset>";
echo "<figure>";

echo "<figcaption>";
echo "<p>" . $liste[0]['titre'] . "</p>";
echo "<p>".$liste[0]['nomEtudiant']."</p>";
echo "<p>" . $liste[0]['medium'] . "&nbsp; &nbsp;" . $liste[0]['dimensions'] . "&nbsp; &nbsp;". $liste[0]['datecreation'] . "</p>";
echo "<p>" . $liste[0]['concept'] . "</p>";
echo "</figcaption>";
echo "<img id='imageFull' src ='".$liste[0]['src']."'/>";
echo "</figure>";

$liste=$cherche->afficherToutLesCommentaires($idimage);
foreach($liste as $ligne){
	echo "<blockquote>";
	echo $ligne[0]."<br />";
	echo "- ".$ligne[1]." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     ".$ligne[4];
	echo "<input type='hidden' value='".$ligne[3]."' id='idcommentaire'/>";
	echo "</blockquote>";
}


/*
 * cette partie est fonctionnelle pour permettre à un utilisateur de commenter une image
 * cependant elle requiert qu'il soit connecté
 * il faudrait donc modifier pour ajouter la possibilité que le visiteur
 * s'identifie d'une autre manière qu'en étant membre
 */
echo '<textarea placeholder="Ajouter un commentaire..." id="ajouterCommentaire" name="commentaire">';
echo "</textarea>";


echo '<input type="button" value="Enregistrer" onclick="enregistrerCommentaire';
echo "(getElementById('ajouterCommentaire'),getElementById('idimage'),getElementById('idMembre'))";
echo '"/>';
echo '<p id="reponse"></p>';
echo "</fieldset>";
echo "<input type='hidden' value='".$idimage."' id='idimage'/>";


