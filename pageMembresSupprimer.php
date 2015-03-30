<?php if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirectProfesseur.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<script type="text/javascript" src="./js/inscriptionValidation.js"></script>
<?php include_once "./includes/style.php" ?>
<title>Arts visuels</title>
</head>
<body class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<h3>Entrer l'alias du membre &agrave; supprimer</h3>
				<form class="formNavGauche" name="profil" id="profil"
					action="pageMembresSupprimer.php" method="post">
					<fieldset>
						<!--  -->
						<ul>
							<li><p>
									<label for="alias">Nom utilisateur (alias):</label> <input
										type="text" name="alias" id="alias" tabindex="1" value=""
										onkeyup="showHint(this.value)" size="40" />
								</p></li>
							<li><p>
									<input type="submit" name="soumettre" id="soumettre"
										value="Supprimer" tabindex="2" />
								</p></li>
						</ul>

					</fieldset>
					<p id="messageErreur">
					<?php if (isset($_POST['alias'])) {
						$alias = htmlentities($_POST['alias']);
						include_once 'metier/supprimerMembre.class.php';
						$supprimer = new SupprimerMembre();
						$supprimer->supprimer($alias);
					}?>
					</p>
				</form>

			</div>
		</div>
	</div>

	<?php require "includes/footer.php";
	//echo ini_get('include_path');
	//var_dump(stream_resolve_include_path("classes/select.class.php"));
	//pour obtenir le current working directory
	//http://www.eclipse.org/pdt/help/html/include_paths.htm
	//echo getcwd(); ?>
</body>
</html>
