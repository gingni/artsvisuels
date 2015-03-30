<?php if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirect.php";
$idMembre = $_SESSION['idMembre'];
/*
 * Cette page sert à ajouter à une galerie
 *  une ou des images qu'un membre a déjà ajouté dans une
 *  autre galerie
 *  J'ai mis les professeurs aussi dans la liste des membres
 *  car il se pourrait qu'ils ajoutent des images de leurs oeuvres
 *  par nicole 2014-04-08
 *
 */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1" />
	<script type="text/javascript" src="./js/script.js"></script>
	<script type="text/javascript" src="./js/navigationMembres.js"></script>
	<?php include_once "./includes/style.php" ?>
	<title>Ajouter image galerie</title>
</head>
<body id="pageAccueil" class="clearfix">
	<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
			<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche"
				action="pageGaleriePriveeAjouterImage.php" method="post">
				<input type="hidden" value="<?php echo $_SESSION['idMembre'];?>"
				id="idmembre" />
				<fieldset>
					<legend>Ajouter une image &agrave; une galerie</legend>

					<p>
						<!-- Le nom de l'utilisateur est automatiquement affiché -->
						<?php
						include_once 'metier/rechercherMembre.class.php';
						$tous= new RechercherMembre();
						$alias =$tous->rechercherUnMembre($idMembre);
						?>
					</p>

					<p class="selection">S&eacute;lectionner une galerie</p>
					<select size="4" id="galeries" name="galeries">
						<?php
						$_POST["idGroupe"] = "ajoutImageGaleriePrivee";
						$_POST["typeGalerie"] = "ajoutImageGaleriePrivee";
						include_once 'metier/getListeGaleries.php';
						?>
					</select>

					<p id="listeImages"></p>
					<!-- place pour les miniatures utilisées pour le select de l'image -->
					<?php
					include_once 'metier/rechercherImage.class.php';

					$cherche = new RechercherImage();
					$liste=$cherche->rechercherImagesMembre($idMembre);
						//echo '<input type="hidden" value=""/>';
					if (is_array($liste)){
						foreach($liste as $ligne) {
							$uneImage = $cherche->getInfosImage($ligne[1]);
							echo "<span  class=\"crop\" id='uneImage'>";
							echo "<p id='titreImage'>".$uneImage[0]['titre']."</p>";
							echo "<a href='#ici'  onclick='getImagePourAjouterAGalerie(".$ligne[1].")' >";
							echo "<img class='imageGalerie' src='".$uneImage[0][1]."'/>";
							echo "</a>";
							echo "</span>";
						}
					}
					?>


					<p id="image"></p>
					<!-- place pour l'image -->

				</fieldset>
				<p id="messageErreur">
					<?php
					if(isset($_POST["galeries"]))
					{
						if(isset($_POST["idimagechoisie"]))
						{
							$idimagechoisie = htmlentities($_POST["idimagechoisie"]);

							$idgalerie = htmlentities($_POST["galeries"]);

							include_once 'metier/ajouterImage.class.php';
							$modif = new AjouterImage();
							$modif->ajouterContenuGaleriePrivee($idgalerie, $idimagechoisie);
							//unset($_POST['Ajouter']);
						}
					}
					?>
				</p>

				<p id="commentaire"><br /><br/ >Pour ajouter une image &agrave; une galerie, l'image doit déjà faire partie d'une galerie privée.<br/ >
					Comme c'est le membre lui-même qui doit faire cela, ce sont ses images à lui qui apparaissent ici.</p>
				</form>

			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
