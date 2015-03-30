<?php
if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirect.php";
?>
<!DOCTYPE html>
<!-- 
Par Nicole Gingras
TP 2-3-4  Réaliser un site Web transactionnel complet
Programmation Internet 420-458-AT
Professeur:  Claude Boutet
Automne 2013
 -->
<html>
<head>
<meta charset="ISO-8859-1">
<?php include_once "./includes/style.php" ?>
<link rel="stylesheet" type="text/css" href="./css/form.css" />
<title>Connexion</title>
</head>
<body id="pageAccueil" class="clearfix">
<?php include_once 'includes/header.php'; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" name="profil" id="profil"
					action="deconnexion.php" method="post">
					<fieldset>
						<legend>Voulez-vous vraiment fermer votre session ?</legend>
						<div>&nbsp;</div>
						<div>&nbsp;</div>
						<input type="submit" tabindex="1" name="quitter" id="quitter" value="Oui" /> 
						<input type="submit" tabindex="2" name="nePasQuitter" id="nePasQuitter" value="Non" />

					</fieldset>
				</form>
				<p>
					<br />&nbsp;
				</p>
			</div>
		</div>
	</div>
	<?php include_once 'includes/footer.php';?>
</body>
</html>
	<?php
	if (isset($_POST['quitter']))
	{
		session_destroy();
		echo "<script type='text/javascript'>document.location.replace('connexion.php');</script>";
		//header('location:connexion.php');
	}
	if (isset($_POST['nePasQuitter']))
	{
		echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
	}
	?>
