<?php
if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirect.php";
$idMembre = $_SESSION['idMembre'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<?php include_once "./includes/style.php" ?>
<script type="text/javascript" src="./js/navigationMembres.js"></script>
<title>Professeur</title>
</head>
<body class="clearfix"
	onload="getListeImagesMembre($_SESSION['idMembre'])">
	<?php require "includes/header.php"; ?>
	<div id="contenu">
	<?php include_once 'includes/gauche.php';?>
		<div id="droit">

			<form class="formNavGauche" action="publicGaleriesListe.php"
				method="post">
				<input type="hidden" value="<?php echo $_SESSION['idMembre'];?>"
					id="idMembre" />
				<fieldset>
					<legend>Vos images</legend>
					<p>
						<!-- Le nom de l'utilisateur est automatiquement affiché -->
					<?php
					include_once 'metier/rechercherMembre.class.php';
					$tous= new RechercherMembre();
					$alias =$tous->rechercherUnMembre($idMembre);
					?>
					</p>

					<?php
					include_once 'metier/rechercherImage.class.php';

					$cherche = new RechercherImage();
					$liste=$cherche->rechercherImagesMembre($idMembre);
					//echo '<input type="hidden" value=""/>';
					if (is_array($liste)){
						foreach($liste as $ligne) {
							$uneImage = $cherche->getInfosImage($ligne[1]);
							echo "<span  class=\"crop\" id='uneImage'>";
							echo "<p id='titreImage'>".$uneImage[0]['titre']."</p>";
							echo "<a href='#ici'  onclick='getImage(".$ligne[1].")' >";
							echo "<img class='imageGalerie' src='".$uneImage[0][1]."'/>";
							echo "</a>";
							echo "</span>";
						}
					}
					?>
					<p id="listeImages"></p>
					<!-- place pour les miniatures utilisées pour le select de l'image -->
					<p id="image"></p>
					<!-- place pour l'image -->
				</fieldset>
				<p id="ici">&nbsp;</p>
			</form>
		</div>
	</div>
	<?php require "includes/footer.php"; ?>
</body>
</html>
