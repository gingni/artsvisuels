<?php if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirect.php";
/*
 * Cette page sert à ajouter à une galerie (publique)
 *  une ou des images qu'un membre a ajouté dans une
 *  autre galerie (privée)
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
				<form class="formNavGauche" action="pageGaleriePubliqueAjouterImage.php"
					method="post">
					<input type="hidden" value="<?php echo $_SESSION['idMembre'];?>"
						id="idMembre" />
					<fieldset>
						<legend>Ajouter une image &agrave; une galerie</legend>

						<p class="selection">S&eacute;lectionner un membre</p>
						<select size="4" id="membreSelect" name="membreSelect"
							onchange="getListeImagesIdMembre(this)">
							<!-- appel de metier/getListeImagesMembre.php 
							puis $cherche->getInfosImage($ligne[1]); 
							puis onclick='getImagePourAjouterAGalerie(".$ligne[1].")'
							puis metier/getInfosImagePourModifier.php-->
							<?php
							$_POST["type"] = "tous"; // ce qui permet de déterminer quels membres on veut dans le select
							include_once 'metier/getListeMembres.php';
							?>
						</select>

						<p class="selection">S&eacute;lectionner une galerie</p>
						<select size="4" id="galeries" name="galeries">
						<?php
						$_POST["typeGalerie"] = "ajoutImageGalerie";
						include_once 'metier/getListeGaleries.php';
						?>
						</select>

						<p id="listeImages"></p>
						<!-- place pour les miniatures utilisées pour le select de l'image -->

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
							//var_dump($idimagechoisie);
							$idgalerie = htmlentities($_POST["galeries"]);
							//var_dump($idgalerie);
							include_once 'metier/ajouterImage.class.php';
							$modif = new AjouterImage();
							$modif->ajouterContenuGalerie($idgalerie, $idimagechoisie);
							unset($_POST['Ajouter']);
						}
					}
					?>
					</p>
				</form>
				<p id="commentaire"><br /><br />Publier une image, c'est l'ajouter à une galerie
					publique. L'image doit déjà faire partie d'une galerie privée.</p>
			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
