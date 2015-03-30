<?php if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirect.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1" content="" />
<script type="text/javascript" src="./js/navigationMembres.js"></script>
</head>
<?php include_once "./includes/style.php" ?>
<title>Modifier galerie</title>
</head>
<body id="pageAccueil" class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" name="modifier" id="modifier"
					action="pageGaleriePubliqueModifier.php" method="post">
					<fieldset>
						<legend>Modifier une galerie publique</legend>
						<select size="3" id="galerieSelect" name="galerieSelect" onchange="getInfosGaleriePublique(this)" tabindex="1">
						<?php
						$_POST["type"]="publiqueSelect";
						$_POST["idgroupe"]="publiqueSelect";
						require "./metier/rechercherGaleries.php";
						?>
						</select>

						<p id="galeries"></p>

						<div id="div_infos"></div>
						<input type="submit" name="modifier" id="modifier"
							value="Modifier" tabindex="4" />
					</fieldset>

					<p id="messageErreur">
					<?php
					if(isset($_POST['galerieSelect']))
					{
						$titregalerie = htmlentities($_POST['titregalerie']);
						$descriptiongalerie = htmlentities($_POST['descriptiongalerie']);

						include_once 'metier/modifierGroupeGalerie.class.php';
						$modif = new ModifierGroupeGalerie();
						$modif->modifierGaleriePublique($_POST['galerieSelect']);
						unset($_POST['galerieSelect']);
					}
					else
					{
						echo "Il faut sélectionner une galerie.";
					}
					?>
					</p>
				</form>
				<p id="commentaire">À discuter pour prendre décision:
				<br/ ><br/ >
				Active = galerie dans laquelle on peut ajouter des images. 
					<br/ ><br/ >
					Fermée à l'ajout d'image = on ne peut plus ajouter d'images, mais on peut voir le contenu pour ajouter des commentaires.
					<br/ ><br/ >Fermée aux commentaires = pas d'ajout d'images, pas d'ajout de commentaires.
					<br/ ><br/ >Inactive = galerie pas visible (session terminée, groupe désactivé)
					<br/ ><br/ > 2014-04 : ça reste à coder.
				</p>
			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
