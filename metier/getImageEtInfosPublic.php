<?php
// utilis� par la page publicGaleriesListe.php qui affiche une image et ses informations
// peut permettre d'afficher commentaires et d'en ajouter mais cette partie est d�sactiv�e

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
echo "<p>".$liste[0]['concept']."</p>";
echo "<p>".$liste[0]['medium']."</p>";
echo "<p>".$liste[0]['dimensions']."</p>";
echo "</figcaption>";
echo "</figure>";

// ne pas supprimer m�me si comment�
/*
$liste=$cherche->afficherToutLesCommentaires($idimage);
foreach($liste as $ligne){
	echo "<blockquote>";
	echo"<p>".$ligne[0]."</p>";
	echo "<p> - ".$ligne[1]."</p>";
	echo "</blockquote>";
}
*/

/*
 * cette partie est fonctionnelle pour permettre � un utilisateur de commenter une image
 * cependant elle requiert qu'il soit connect�
 * il faudrait donc modifier pour ajouter la possibilit� que le visiteur
 * s'identifie d'une autre mani�re qu'en �tant membre
 */

/*
echo '<textarea placeholder="Ajouter un commentaire..." id="ajouterCommentaire" name="commentaire">';
echo "</textarea>";


echo '<input type="button" value="Enregistrer" onclick="enregistrerCommentaire';
echo "(getElementById('ajouterCommentaire'),getElementById('idimage'),getElementById('idMembre'))";
echo '"/>';
echo '<p id="reponse"></p>';
echo "</fieldset>";
echo "<input type='hidden' value='".$idimage."' id='idimage'/>";
*/


