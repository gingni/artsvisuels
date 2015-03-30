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
<title>Modifier infos images</title>
</head>
<body class="clearfix" onload="getListeImages($_SESSION['idMembre'])">
<?php require "includes/header.php"; ?>
	<div id="contenu">
	<?php include_once 'includes/gauche.php';?>
		<div id="droit">
			<form class="formNavGauche" method='post'
				action='pageImageModifier.php'>
				<fieldset>
					<legend>
						Images de
						<?php
						include_once 'metier/rechercherMembre.class.php';
						$tous= new RechercherMembre();
						$alias =$tous->rechercherUnMembre($idMembre);
						?>
					</legend>
					<p id="commentaire"></p>

					<?php
					include_once 'metier/rechercherImage.class.php';
					$cherche = new RechercherImage();
					$liste=$cherche->rechercherImagesMembre($idMembre);
					if($liste ==0)
					{

					}
					else {
						echo '<select name="imageSelect" id="imageSelect" size="5" onchange="getImagePourModifier(this)" >';
						foreach($liste as $ligne) {
							echo '<option value="' . $ligne[1] . '">';
							echo $ligne["titre"];
							echo ' ' . $ligne["dimensions"];
							echo ' ' . $ligne["datecreation"];
							echo '</option>';
						}
						echo '</select>';
					}
					?>

					<div id="div_infos"></div>

				</fieldset>
				<p id="messageErreur">
				<?php
				if(isset($_POST['Modifier']))
				{
					include_once 'metier/modifierImage.class.php';
					$modif = new ModifierImage();
					$modif->modifierImage();
					//unset($_POST['Modifier']);
				}
				?>
				</p>
			</form>
			<p id="commentaire">Modifier une image</p>
		</div>
	</div>
	<?php require "includes/footer.php"; ?>
</body>
</html>
