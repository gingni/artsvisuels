<?php if(!isset($_SESSION))
{
	session_start();
}
/*
 * Comme on a besoin de modifier les groupes a peu près juste une fois par session
 * cette fonctionnalité est réservée au gestionnaire
 */
include_once "includes/redirectProfesseur.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1" content="" />
<script type="text/javascript" src="./js/navigationMembres.js"></script>
</head>
<?php include_once "./includes/style.php" ?>
<title>Supprimer groupe</title>
</head>
<body id="pageAccueil" class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" action="pageGroupeSupprimer.php"
					method="post">
					<fieldset>
						<legend>Supprimer un groupe</legend>

						<p id="groupes" class="selection">S&eacute;lectionner un groupe</p>

						<?php
						echo'<select size="10" onclick="" id="groupeSelect" name="groupeSelect" >';
						include './metier/rechercherGroupe.class.php';
						$tous= new RechercherGroupe();
						$liste = $tous->rechercherTousLesGroupes();
						foreach($liste as $ligne) {
							$ligneaffichee = "<option value=" . $ligne["idgroupe"] . ">" . $ligne["descriptioncours"]. " - " . $ligne["annee"] . " - " . $ligne["session"] . " - " . $ligne["professeur"] . "</option>";
							echo $ligneaffichee;
						}
						echo '</select>';
						?>
						<div>&nbsp;</div>
						<input type="submit" name="supprimer" id="supprimer"
							value="Supprimer" />
					</fieldset>

					<p id="messageErreur">
					<?php

					if(isset($_POST['groupeSelect']))
					{
						$idgroupe = htmlentities($_POST['groupeSelect']);
						include_once 'metier/supprimerGroupeGalerie.class.php';
						$supprime = new SupprimerGroupeGalerie();

						$supprime->supprimerGroupe($idgroupe);
						//unset ($_POST['supprimer']);
						?>
						<!-- rafraichir la page -->
						
						<script type='text/javascript'>document.location.replace('pageGroupeSupprimer.php');</script>
						<?php
					} else echo "Il faut choisir un groupe.";
					?>

					</p>
				</form>
			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
