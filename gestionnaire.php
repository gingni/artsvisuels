<?php
if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirectProfesseur.php";
include_once "includes/redirect.php";
$idMembre = $_SESSION['idMembre'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<?php include_once "./includes/style.php" ?>
<link rel="stylesheet" type="text/css" href="./css/maintenance.css" />
<script type="text/javascript" src="js/navigationMembres.js"></script>
<title>Maintenance</title>
</head>
<body class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">

			</div>
		</div>
	</div>
	<?php require "includes/footer.php"; ?>
</body>
</html>
