<?php
if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirect.php";
$idMembre = $_SESSION['idMembre'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<?php include_once "./includes/style.php" ?>
<script type="text/javascript" src="./js/navigationMembres.js"></script>
<title>Supprimer image</title>
</head>
<body class="clearfix" onload="getListeImages($_SESSION['idMembre'])">
<?php require "includes/header.php"; ?>
	<div id="contenu">
	<?php include_once 'includes/gauche.php';?>
		<div id="droit">
			<form class="formNavGauche" method='post'
				action='pageImagesSupprimer.php'>
				<fieldset>
					<legend>
						Images de
						<?php
						include_once 'metier/rechercherMembre.class.php';
						$tous= new RechercherMembre();
						$alias =$tous->rechercherUnMembre($idMembre);
						?>
					</legend>
					<p id="commentaire">
						N.B. s'il y beaucoup d'images, cliquer 1 fois pour choisir l'image
						<br />puis une 2&egrave;me fois pour aller dans le bas de la page.
					</p>
					<?php
					include_once 'metier/rechercherImage.class.php';
					// dans le cas du gestionnaire ou du professeur, afficher toutes les images?
					// pour l'étudiant : il ne peut supprimer que ses propres images et seulement si
					// elles n'ont pas été commentées
					$cherche = new RechercherImage();
					$liste=$cherche->rechercherImagesMembreSanscommentaires($idMembre);
					//echo '<input type="hidden" value=""/>';

					foreach($liste as $ligne) {
						$uneImage = $cherche->getInfosImage($ligne[1]);
						echo "<span  class=\"crop\" id='uneImage'>";
						echo "<p id='titreImage'>".$uneImage[0]['titre']."</p>";
						echo "<a href='#Supprimer'  onclick='getImagePourSupprimer(".$ligne[1].")' >";
						echo "<img class='imageGalerie' src='".$uneImage[0][1]."'/>";
						echo "</a>";
						echo "</span>";

					}

					?>
					<p id="image"></p>
					<!-- place pour les miniatures utilisées pour le select de l'image -->
					<p id="supprimerImage"></p>
					<!-- place pour ajouter le bouton pour supprimer -->
					<?php
					if(isset($_POST['source'])){
						//var_dump($_POST['source']);
						unlink($_POST['source']);
						unset($_POST['source']);
						?>
					<!-- rafraichir la page pour que l'image supprimée n'y soit plus -->
					<script type='text/javascript'>document.location.replace('pageImagesSupprimer.php');</script>
					;
					<?php
					}
					?>
				</fieldset>
				<p id="messageErreur">
			
			</form>
			<p id="ici">&nbsp;</p>
			<p id="commentaire">Vous ne pouvez supprimer que les images n'ayant
				pas été commentées. Les autres n'apparaissent donc pas ici. Seul le gestionnaire peut supprimer les images
				que des utilisateurs ont commenté.</p>
		</div>
	</div>
	<?php require "includes/footer.php"; ?>
</body>
</html>
