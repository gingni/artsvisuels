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
<title>Ajouter galerie priv&eacute;e</title>
</head>
<body class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" action="pageGaleriePriveeAjouter.php" method="post">
					<fieldset>
						<legend>Ajouter une galerie priv&eacute;e</legend>

						<!-- mettre les groupes dans un select -->
						<p>
							Groupe &nbsp;<select id="idGroupe" name="idGroupe">
							<?php
							include_once 'metier/rechercherGroupe.class.php';
							$tous= new RechercherGroupe();
							$tous->rechercherSansCritere();
							?>
							</select>

						</p>
						<p>
							Description de la galerie<input type="text"
								id="descriptiongalerie" name="descriptiongalerie"
								maxlength="100" value=""/>
						</p>


						<p>
							Date d'&eacute;ch&eacute;ance<input type="text" id="dateEcheance"
								name="dateEcheance" value="" />
						</p>

						<p>
							<textarea " placeholder="Inscrire l'&eacute;noncé du travail..."
								id="enonceTravail" name="enonceTravail"></textarea>
						</p>
						<div>&nbsp;</div>

						<input type="submit" name="soumettre" id="soumettre"
							value="Ajouter" />
					</fieldset>
					<p id="messageErreur">
					<?php
					if (isset($_POST['descriptiongalerie'])){
						include_once 'metier/ajouterGroupeGalerie.class.php';
						$ajout = new AjouterGroupeGalerie();
						$ajout->ajouterGalerie();
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
