<?php if(!isset($_SESSION)) 
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

Cette page fait partie de la navigation a partir de la page d'accueil
 -->
<html>
<head>
<meta charset="ISO-8859-1">
<script type="text/javascript" src="./js/inscriptionValidation.js"></script>
<script type="text/javascript" src="./js/listeLieeMembres.js"></script>
<?php include_once "./includes/style.php" ?>
<title>Arts Visuels</title>
</head>
<body class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<h3>Liste des cours</h3>

				<form action="pageCoursListe.php" method="post">
					<input type="hidden" name="type" id="type" value="tous" />
					<table>
					<?php
					$_POST["type"]="tous";
					require "./metier/getListeCours.php";
					?>
					</table>
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
