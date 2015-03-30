<?php

/**
 * c'est ce qui affiche les miniatures
 * des images de la galerie
 * ces miniatures sont cliquables
 */

$idGalerie = $_POST["idGalerie"];
include_once 'rechercherImage.class.php';

$cherche = new RechercherImage();

//-----------------------------------------------------------------------------------------------------

if(!isset($_POST['typeGalerie'])){
	$typeGalerie="";
}
else {
	$typeGalerie= htmlentities($_POST['typeGalerie']);

}
//-----------------------------------------------------------------------------------------------------

switch ($typeGalerie):

//-----------------------------------------------------------------------------------------------------

case "publique":
$liste=$cherche->rechercherImagesGaleriePublique($idGalerie);
foreach($liste as $ligne) {
		$uneImage = $cherche->getInfosImage($ligne['idimage']); // RechercherImage
		echo "<span  class=\"crop\" id='uneImage'>";
		echo "<p id='titreImage'>".$uneImage[0]['titre']."</p>";
		echo "<a href='#ici' onclick='getImage(".$ligne['idimage'].")' >";
		echo "<img class='imageGalerie' src='".$uneImage[0]['src']."'/>";
		echo  "<p id='authorImage'>".$uneImage[0]["nomEtudiant"]."</p>";
		echo "</a>";
		echo "</span>";
	}
	break;

//-----------------------------------------------------------------------------------------------------

	case "enleverAGaleriePublique":
	$liste=$cherche->rechercherImagesGaleriePublique($idGalerie);
	foreach($liste as $ligne) {
		$uneImage = $cherche->getInfosImage($ligne['idimage']); // RechercherImage
		echo "<span  class=\"crop\" id='uneImage'>";
		echo "<p id='titreImage'>".$uneImage[0]['titre']."</p>";
		echo "<a href='#ici' onclick='getImagePourEnleverAGaleriePublique(".$ligne['idimage'].")' >";
		echo "<img class='imageGalerie' src='".$uneImage[0]['src']."'/>";
		echo  "<p id='authorImage'>".$uneImage[0]["nomEtudiant"]."</p>";
		echo "</a>";
		echo "</span>";
	}
	break;

//-----------------------------------------------------------------------------------------------------

	case "enleverAGaleriePrivee":
	$liste=$cherche->rechercherImagesGaleries($idGalerie);
	foreach($liste as $ligne) {
		$uneImage = $cherche->getInfosImage($ligne['idimage']); // RechercherImage
		echo "<span  class=\"crop\" id='uneImage'>";
		echo "<p id='titreImage'>".$uneImage[0]['titre']."</p>";
		echo "<a href='#ici' onclick='getImagePourEnleverAGaleriePrivee(".$ligne['idimage'].")' >";
		echo "<img class='imageGalerie' src='".$uneImage[0]['src']."'/>";
		echo  "<p id='authorImage'>".$uneImage[0]["nomEtudiant"]."</p>";
		echo "</a>";
		echo "</span>";
	}
	break;

//-----------------------------------------------------------------------------------------------------


	case "commentaires":
	$liste=$cherche->rechercherImagesGaleries($idGalerie);
	foreach($liste as $ligne) {
		$idimage = $ligne['idimage'];
		$uneImage = $cherche->getInfosImage($idimage); // RechercherImage
		echo "<fieldset>";
		echo "<div class='clearfix'>";

		echo "<span  class=\"crop\" id='uneImage'>";
		echo "<p id='titreImage'>".$uneImage[0]['titre']."</p>";

		echo "<img class='imageGalerie' src='".$uneImage[0]['src']."'/>";
		echo  "<p id='authorImage'>".$uneImage[0]["nomEtudiant"]."</p>";

		echo "</span>";

		$liste=$cherche->afficherToutLesCommentaires($idimage);
		foreach($liste as $ligne){
			
			$idcommentaire = $ligne['idcommentaire'];
			//var_dump($idcommentaire);

			echo "<div class='clearfix'>";
			echo "<p>";
			echo $ligne[0]."</p>";
			echo "<p id='commentaire'>- ".$ligne[1]." " . $ligne['timestamp'];
			echo "</p>";
			echo '<hr>';
			echo "<p>";
			echo "</p>";

			echo "</div>";

		}

		echo "</div>";
		echo "</fieldset>";
	}
	break;

	//-----------------------------------------------------------------------------------------------------


	case "commentairesSupprimer":
	$liste=$cherche->rechercherImagesGaleries($idGalerie);
	foreach($liste as $ligne) {
		$idimage = $ligne['idimage'];
		$uneImage = $cherche->getInfosImage($idimage); // RechercherImage
		echo "<fieldset>";
		echo "<div class='clearfix'>";

		echo "<span  class=\"crop\" id='uneImage'>";
		echo "<p id='titreImage'>".$uneImage[0]['titre']."</p>";

		echo "<img class='imageGalerie' src='".$uneImage[0]['src']."'/>";
		echo  "<p id='authorImage'>".$uneImage[0]["nomEtudiant"]."</p>";

		echo "</span>";

		$liste=$cherche->afficherToutLesCommentaires($idimage);
		foreach($liste as $ligne){
			
			$idcommentaire = $ligne['idcommentaire'];
			//var_dump($idcommentaire);

			echo "<div class='clearfix'>";
			echo "<p>";
			echo $ligne[0]."</p>";
			echo "<p id='commentaire'>- ".$ligne[1]." " . $ligne['timestamp'];
			echo "</p>";
			echo '<hr>';
			echo "<p>";
			echo '<input type="button" value="Supprimer ce commentaire" onclick="supprimerCommentaire';
			echo "(" . $idcommentaire . ", ". $idGalerie .")";
			echo '"/>';

			echo "</p>";

			echo "</div>";

		}

		echo "</div>";
		echo "</fieldset>";
	}
	break;

//-----------------------------------------------------------------------------------------------------

	default;
	$liste=$cherche->rechercherImagesGaleries($idGalerie);
//echo '<input type="hidden" value=""/>';
	foreach($liste as $ligne) {
	$uneImage = $cherche->getInfosImage($ligne['idimage']); // RechercherImage
	echo "<span  class=\"crop\" id='uneImage'>";
	echo "<p id='titreImage'>".$uneImage[0]['titre']."</p>";
	echo "<a href='#ici' onclick='getImage(".$ligne['idimage'].")' >";
	echo "<img class='imageGalerie' src='".$uneImage[0]['src']."'/>";
	echo  "<p id='authorImage'>".$uneImage[0]["nomEtudiant"]."</p>";
	echo "</a>";
	echo "</span>";
}
break;

//-----------------------------------------------------------------------------------------------------

endswitch;

?>









