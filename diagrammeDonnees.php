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
 -->
<html>
<head>
<meta charset="ISO-8859-1">
<?php include_once "./includes/style.php" ?>
<title>Diagramme</title>
</head>
<body id="pageAccueil" class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<h3>Diagramme des données</h3>
				<img alt="diagramme" width="800" src="documentation/diagrammeDonnees.png" />
			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
