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
<title>Supprimer image galerie</title>
</head>
<body id="pageAccueil" class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" action="pageGaleriePubliqueSupprimerImage.php"
					method="post">
					<input type="hidden" value="<?php echo $_SESSION['idMembre'];?>"
						id="idMembre" />
					<fieldset>
						<legend>Supprimer une image d'une galerie publique</legend>

						<p class="selection">S&eacute;lectionner une galerie</p>
						<select size="4" id="galeries" name="galeries" onchange="getListeImagesGaleriePublique(this)">
						<?php
						$_POST["typeGalerie"] = "enleverAGaleriePublique";
						include_once 'metier/getListeGaleries.php';
						?>
							<!--
							getListeGaleries -> cherche->afficherGaleriesPubliques()
							navigationMembres.js ->getListeImagesGaleriePublique(this)							
							getListeImagesGaleries.php -> $cherche->rechercherImagesGaleriePublique($idGalerie)
							navigationMembres.js ->  getImagePourEnleverAGaleriePublique(valeur) 
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
							$modif->enleverImageGaleriePublique($idimagechoisie, $idgalerie);
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
