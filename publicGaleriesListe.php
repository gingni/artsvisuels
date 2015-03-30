<?php if(!isset($_SESSION))
{
	session_start();
}/*
include_once "includes/redirect.php";*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1" />
	<script type="text/javascript" src="./js/script.js"></script>
	<script type="text/javascript" src="./js/listeLieeImagesGaleries.js"></script>
	<?php include_once "./includes/style.php" ?>
	<title>Galeries</title>
</head>
<body id="pageAccueil" class="clearfix">
	<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
			<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" action="publicGaleriesListe.php" method="post">

					<!-- c'est une page publique il faut enlever ceci
					<input type="hidden" value="<?php //echo $_SESSION['idMembre'];?>"
						id="idMembre" />
						cependant ça va avec la partie commentée dans getInfosImage.php
						et permet d'ajouter un commentaire
						** ne pas supprimer, peut être utile plus tard si on veut permettre à un visiteur
						de commenter une image
					-->

					<fieldset>
						<legend>S&eacute;lectionner une galerie</legend>

						
						<p id="galeries">
							<select  size="3" id="galerieSelect" name="galerieSelect" onchange="getListeImagesGaleriePublique(this)">
								<?php
									$_POST["idGroupe"]="publique";// mettre la valeur tousPourSelect pour rechercher toutes les galeries de tous les groupes
									$_POST["typeGalerie"]="publique";
									// et les afficher dans un select
									//utilisation du script php initialement prévu pour ajax
									// mettre la valeur publique pour rechercher seulement les galeries publiques
									require "./metier/getListeGaleries.php";
									?>
								</select>
							</p>

							<!-- place pour le select de la galerie -->
							<p id="listeImages"></p>
							<!-- <p id="listeImages" style="visibility:hidden;">test</p>-->
							<!-- place pour les miniatures utilisées pour le select de l'image -->
							<p id="image"></p>
							<!-- place pour l'image -->

						</fieldset>
						<p id="ici">&nbsp;</p>
					</form>

				</div>
			</div>
		</div>

		<?php require "includes/footer.php"; ?>
	</body>
	</html>
