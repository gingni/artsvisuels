<?php if(!isset($_SESSION)) 
{ 
	session_start(); 
}
include_once "includes/redirectProfesseur.php";
?>
<!DOCTYPE html>
<!-- 
-->
<html>
<head>
	<meta charset="ISO-8859-1">
	<script type="text/javascript" src="./js/navigationMembres.js"></script>
	<script type="text/javascript" src="./js/inscriptionValidation.js"></script>
	<?php include_once "./includes/style.php" ?>
	<title>Modifier un cours</title>
</head>
<body class="clearfix">
	<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
			<?php include_once 'includes/gauche.php';?>
			<div id="droit">

				<form class="formNavGauche" name="profil" id="profil" action="pageCoursModifier.php" method="post"
				onSubmit="return formValidation();">
				<fieldset>
					<legend>Modifier un cours</legend>
					<ul>
						<li>
							<p>S&eacute;lectionner le cours &agrave; modifier</p>
							<select  size="3" id="noCours" name="noCours" onchange="getCours(this)">
								<?php
								$_POST["type"]="tousPourSelect";
								require "./metier/getListeCours.php";
								?>
							</select>

						</li>

						<li>
							<p id="infosCours">
							</p>

						</li>

					</ul>
					<p id="messageErreur">
						<?php 
						include_once 'metier/modifierCours.class.php';
						$modif = new ModifierCours();
						$modif->modifierCours();
						?>
					</p>
					<input type="submit" name="soumettre" id="soumettre" value="Modifier" />
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
