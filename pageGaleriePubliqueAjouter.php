<?php if(!isset($_SESSION))
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
<title>Ajouter galerie publique</title>
</head>
<body class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" name="nouvelle_galerie"
					id="nouvelle_galerie" action="pageGaleriePubliqueAjouter.php" method="post">
					<fieldset>
						<legend>Ajouter une galerie publique</legend>

						<p>
							Description de la galerie<input type="text"
								id="titregalerie" name="titregalerie"
								maxlength="100" value="">
						</p>

						<p>
							<textarea " placeholder="Inscrire une description plus détaillée..."
								id="descriptiongalerie" name="descriptiongalerie"></textarea>
						</p>
						<div>&nbsp;</div>

						<input type="submit" name="soumettre" id="soumettre"
							value="Ajouter" />
					</fieldset>
					<p id="messageErreur">
					<?php
					if (isset($_POST['titregalerie'])){
						include_once 'metier/ajouterGroupeGalerie.class.php';
						$ajout = new AjouterGroupeGalerie();
						$ajout->ajouterGaleriePublique();
					}

					?>
					</p>
				</form>
			</div>
		</div>
	</div>

	<?php require "includes/footer.php";
	//pour obtenir le current working directory
	//http://www.eclipse.org/pdt/help/html/include_paths.htm
	//echo getcwd(); ?>
</body>
</html>
