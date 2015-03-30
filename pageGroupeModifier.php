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
<title>Modifier groupe</title>
</head>
<body id="pageAccueil" class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" name="formModifier" id="formModifier"
					action="pageGroupeModifier.php" method="post">
					<fieldset>
						<legend>Modifier un groupe</legend>

						<p id="groupes" class="selection">S&eacute;lectionner un groupe</p>

						<?php
						echo'<select size="10" onclick="" id="groupeSelect" name="groupeSelect" onchange="getGroupePourModifier(this); getListeProfesseurs();">';
						include './metier/rechercherGroupe.class.php';
						$tous= new RechercherGroupe();
						$liste = $tous->rechercherTousLesGroupes();
						foreach($liste as $ligne) {
							$ligneaffichee = "<option value=" . $ligne["idgroupe"] . ">" . $ligne["descriptioncours"]. " - " . $ligne["annee"] . " - " . $ligne["session"] . " - " . $ligne["professeur"] . "</option>";
							echo $ligneaffichee;
						}
						echo '</select>';
						if(isset($_POST['groupeSelect']))
						{
							$idgroupe = htmlentities($_POST['groupeSelect']);
						}
						?>

						<p id="infosGroupe"></p>
						<select size="5" name="professeurs" id="professeurs"></select>
						<div>&nbsp;</div>
						<input type="submit" name="modifier" id="modifier"
							value="Modifier" />
					</fieldset>

					<p id="messageErreur">
					<?php
					if(isset($_POST['modifier']))
					{
						include_once 'metier/modifierGroupeGalerie.class.php';
						$modif = new ModifierGroupeGalerie();
						if(isset($_POST['professeurs']))
						{
							$idprofesseur = htmlentities($_POST['professeurs']);
							$modif->modifierGroupe($idgroupe, $idprofesseur);
						}
						else
						$modif->groupe_Actif_Inactif($idgroupe);
						unset ($_POST['modifier']);
						?>
						<!-- rafraichir la page -->
						<script type='text/javascript'>document.location.replace('pageGroupeModifier.php');</script>
						<?php
					} ?>

					</p>
				</form>
				<p id="commentaire">
					Rendre actifs les groupes de la session courante et
					inactifs tous les autres.<br /> <br />On peut créer d'avance des groupes. <br /> <br />
					C'est ici qu'on peut changer le nom
					du professeur en sélectionnant celui que l'on veut dans la 2e
					liste. Ne rien sélectionner si on ne veut pas changer le
					professeur. <br /> <br /> On peut aussi décider de n'activer que
					les groupes pour lesquels le site est utilisé.
				</p>
			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
