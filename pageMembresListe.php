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
<script type="text/javascript" src="./js/inscriptionValidation.js"></script>
<script type="text/javascript" src="./js/listeLieeMembres.js"></script>
<?php include_once "./includes/style.php" ?>
<title>Arts visuels</title>
</head>
<body class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">

				<form class="formNavGauche" action="pageMembresListe.php" method="post">
				<fieldset>
				<legend>Liste des professeurs</legend>
					<table>
					<?php
					$_POST["type"]="professeur";
					//utilisation du script php initialement prévu pour ajax
					require "./metier/rechercherMembres.php";
					
					?>
					</table>
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
