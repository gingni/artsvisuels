<?php if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirect.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1" />
<script type="text/javascript" src="./js/script.js"></script>
<script type="text/javascript" src="./js/navigationMembres.js"></script>
<?php include_once "./includes/style.php" ?>
<title>Supprimer image galerie</title>
</head>
<body id="pageAccueil" class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" action="pageGaleriePriveeSupprimerImage.php"
					method="post">
					<input type="hidden" value="<?php echo $_SESSION['idMembre'];?>"
						id="idMembre" />
					<fieldset>
						<legend>Supprimer une image d'une galerie priv&eacute;e</legend>

						<p class="selection">S&eacute;lectionner une galerie</p>
						<select size="4" id="galeries" name="galeries" onchange="getListeImagesGalerie(this)">
						<?php
						$_POST["typeGalerie"] = "enleverAGaleriePrivee";
						include_once 'metier/getListeGaleries.php';
						?>
							<!--
							getListeGaleries -> cherche->afficherGaleriesPrivee()
							navigationMembres.js ->getListeImagesGalerie(this)						
							getListeImagesGaleries.php -> $cherche->rechercherImagesGaleries($idGalerie)
							navigationMembres.js ->  getImagePourEnleverAGaleriePrivee(valeur) 
							getInfosImagePourModifier.php
							
							-->
							
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
							
							$idgalerie = htmlentities($_POST["galeries"]);
							
							include_once 'metier/supprimerGroupeGalerie.class.php';
							$modif = new SupprimerGroupeGalerie();
							$modif->enleverImageGalerie($idimagechoisie, $idgalerie);
							//unset($_POST['Ajouter']);
						}
					}
					else
					{
						echo 'Il faut s&eacute;lectionner une galerie';
					}
					?>
					</p>
				</form>
				<p id="commentaire">Enlever une image d'une galerie ne la supprime pas.  Seulement
				les professeurs peuvent enlever une image d'une galerie publique.</p>
			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
