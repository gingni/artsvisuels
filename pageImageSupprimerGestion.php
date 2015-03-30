<?php
if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirect.php";
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
			action='pageImageSupprimerGestion.php'>
			<fieldset>
				<legend>
					Images
				</legend>
				<p>
					<span class="etiquette" >Num&eacute;ro du membre</span><input type="text" id="idmembre" name="idmembre" />
				</p>

				<select size="3" id="membreSelect" name="membreSelect">
					<?php
					include_once './metier/rechercherMembre.class.php';
					$cherche = new RechercherMembre();
					$liste=$cherche->rechercherSansCriteres();

					foreach($liste as $ligne) {
						var_dump($ligne["nom"]);
						$chaine = "<option value=" . $ligne["idmembre"] . ">" . $ligne["idmembre"] . " " . $ligne["nom"] . " ". $ligne["prenom"] . "</option>";
						echo $chaine;
					}
					?>
				</select>

				<div>&nbsp;</div>

				<?php
				if (isset($_POST['idmembre']))
				{
					$idmembre = htmlentities($_POST['idmembre']);


					include_once 'metier/rechercherImage.class.php';
						// dans le cas du gestionnaire ou du professeur, afficher toutes les images?
						// pour l'étudiant : il ne peut supprimer que ses propres images et seulement si
						// elles n'ont pas été commentées
					$cherche = new RechercherImage();
					$liste=$cherche->rechercherImagesMembre($idmembre);
						//echo '<input type="hidden" value=""/>';
					if($liste !=0 ) {
						foreach($liste as $ligne) {
							$uneImage = $cherche->getInfosImage($ligne[1]);
							echo "<span  class=\"crop\" id='uneImage'>";
							echo "<p id='titreImage'>".$uneImage[0]['titre']."</p>";
							echo "<a href='#Supprimer'  onclick='getImagePourSupprimer(".$ligne[1].")' >";
							echo "<img class='imageGalerie' src='".$uneImage[0][1]."'/>";
							echo "</a>";
							echo "</span>";	
						}
					}
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
					<script type='text/javascript'>document.location.replace('pageImageSupprimerGestion.php');</script>
					;
					<?php
				}
				?>
			</fieldset>
			<p id="commentaire">
				Cette page permet de supprimer n'importe quelle image.  <br /><br />Entrer le num&eacute;ro du membre pour sélectionner une de ses images, puis taper sur la touche entr&eacute;e.<br /><br />
				Utiliser la liste d&eacute;roulante pour connaître le num&eacute;ro du membre.<br /><br />
				N.B. s'il y beaucoup d'images, cliquer 1 fois pour choisir l'image
				<br />puis une 2&egrave;me fois pour aller dans le bas de la page.
			</p>
			<p id="messageErreur">

			</form>
			<p id="ici">&nbsp;</p>

		</div>
	</div>
	<?php require "includes/footer.php"; ?>
</body>
</html>


