<?php if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirect.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1" />
<script type="text/javascript" src="./js/navigationMembres.js"></script>
</head>

<?php include_once "./includes/style.php" ?>
<title>Liste galeries</title>
</head>
<body id="pageAccueil" class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche">
					<fieldset>
						<legend>Liste des galeries</legend>
						<?php
						$_POST["type"]="tous";
						$_POST["idgroupe"]="tous";
						require "./metier/rechercherGaleries.php";
						?>
					</fieldset>
				</form>
				<p id="commentaire">
					<br/ ><br/ >		
				</p>
			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
