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
	<title>Cas d'utilisation</title>
</head>
<body id="pageAccueil" class="clearfix">
	<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
			<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<h3>Cas d'utilisation pr&eacute;vus</h3>
				<p>
					<img alt="" width="850" src="documentation/casPrevus.png" />
				</p>

				<h3>Cas d'utilisation r&eacute;alis&eacute;s &eacute;tudiants</h3>
				<p>
					<img alt="" width="850" src="documentation/cas_realises_etudiant.violet.png" />
				</p>

				<h3>Cas d'utilisation r&eacute;alis&eacute;s professeurs</h3>
				<p>
					<img alt="" width="850" src="documentation/cas_realises_professeur.violet.png" />
				</p>
				
				<h3>Cas d'utilisation r&eacute;alis&eacute;s gestionnaire</h3>
				<p>
					<img alt="" width="850" src="documentation/cas_realises_gestionnaire.violet.png" />
				</p>
			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
