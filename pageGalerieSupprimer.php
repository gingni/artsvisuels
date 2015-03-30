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
<script type="text/javascript" src="./js/navigationMembres.js"></script>
<?php include_once "./includes/style.php" ?>
<title>Supprimer galerie</title>
</head>
<body class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" name="nouvelle_galerie"
					id="nouvelle_galerie" action="pageGalerieSupprimer.php"
					method="post">
					<fieldset>
						<legend>Supprimer une galerie</legend>

						<p id="groupes">
							<select id="groupeSelect" name="groupeSelect"
								onchange="getListeGaleries(this)">
								<?php
								include_once 'metier/rechercherGroupe.class.php';
								$tous= new RechercherGroupe();
								$tous->rechercherSansCritere();
								?>
							</select>
						</p>

						<p id="galerieSelect"></p>

						<div>&nbsp;</div>

						<input type="submit" name="soumettre" id="soumettre"
							value="Supprimer" />
					</fieldset>
					<p id="messageErreur">
					<?php
					if (isset($_POST['galerieSelect'])){
						$critere = htmlentities($_POST['galerieSelect']);
						include_once 'metier/supprimerGroupeGalerie.class.php';
						$supp = new SupprimerGroupeGalerie();
						$supp->supprimerGalerie($critere);
						unset ($_POST['galerieSelect']);
					}
					?>
					</p>
				</form>
				<p id="commentaire">
					Sélectionner un groupe
					puis une galerie.
				</p>
			</div>
		</div>
	</div>

	<?php require "includes/footer.php";
	//pour obtenir le current working directory
	//http://www.eclipse.org/pdt/help/html/include_paths.htm
	//echo getcwd(); ?>
</body>
</html>
