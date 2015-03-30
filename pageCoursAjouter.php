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
	<title>Arts Visuels</title>
</head>
<body class="clearfix">
	<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
			<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" name="profil" id="profil"
				action="pageCoursAjouter.php" method="post"
				onSubmit="return formValidation();">
				<fieldset>
					<legend>Ajouter un Cours</legend>
					<ul>
						<li>
							<p>
								<label for="idCours">Num&eacute;ro de cours </label> <br /> <label>(3 caract&egrave;res
								seulement)</label><input type="text" name="idCours"
								id="idCours" tabindex="1" maxlength="3"
								value="" />
							</p>
						</li>

						<li>
							<p>
								<label for="noCours">Num&eacute;ro de cours complet
								</label><br /><label>(510-xxx-AT)</label> <input type="text" name="noCours"
								id="noCours" tabindex="2" maxlength="10"
								value="" />
							</p>
						</li>

						<li>
							<p>
								<label for="descriptionCours">Description</label> <br /><label>du cours</label>
								<input type="text" name="descriptionCours"
								id="descriptionCours" tabindex="3" maxlength="100"
								value="" />
							</p>
						</li>
					</ul>
					<input type="submit" name="soumettre" id="soumettre" value="Ajouter" tabindex="4" />
					<p>
						<span id="txtHint"></span>
					</p>
					<p id="messageErreur">		
						<?php
						include_once 'metier/ajouterCours.class.php';
						$ajout = new AjouterCours();
						$ajout->ajouterCours();
						?>
					</p>
				</fieldset>

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
