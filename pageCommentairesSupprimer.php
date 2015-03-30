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
<script type="text/javascript" src="./js/script.js"></script>
<script type="text/javascript" src="./js/navigationMembres.js"></script>
<script type="text/javascript" src="./js/listeLiee.js"></script>
<?php include_once "./includes/style.php" ?>
<title>Commentaires galerie</title>
</head>
<body id="pageAccueil" class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" action="pageCommentaires.php"
					method="post">
					<input type="hidden" value="<?php echo $_SESSION['idMembre'];?>"
						id="idMembre" />
					<fieldset>
						<legend>Consulter les commentaires pour une galerie</legend>

						<p class="selection">S&eacute;lectionner un groupe</p>
						<select size="3" id="groupeSelect" name="groupeSelect"
							onchange="getListeGaleries(this)">
							<?php
							include_once 'metier/rechercherGroupe.class.php';
							$tous= new RechercherGroupe();
							$tous->rechercherPourPageContenu();
							?>
						</select>
<!--
//*********************
étapes:
//*********************
select groupe 	-> onchange="getListeGaleries(this)"	-> ./metier/getListeGaleries.php
select galerie	-> onchange="getListeCommentaires(this)"		-> "./metier/getListeImagesGaleries.php" 


	case "commentaires":
	$liste=$cherche->rechercherImagesGaleries($idGalerie);
	foreach($liste as $ligne) {
		$uneImage = $cherche->getInfosImage($ligne['idimage']); // RechercherImage
		echo "<span  class=\"crop\" id='uneImage'>";
		echo "<p id='titreImage'>".$uneImage[0]['titre']."</p>";

		echo "<img class='imageGalerie' src='".$uneImage[0]['src']."'/>";
		echo  "<p id='authorImage'>".$uneImage[0]["nomEtudiant"]."</p>";

		echo "</span>";
	}
	break;


//*********************
-->

						<p class="selection">S&eacute;lectionner une galerie</p>
						<select size="3" id="galerieSelect" name="galerieSelect"
							onchange="getListeCommentairesPourSupprimer(this)">
						</select>


						<p id="listeImages"></p>
						<!-- place pour les miniatures utilisées pour le select de l'image -->
						<p id="image"></p>
						<!-- place pour l'image -->
					</fieldset>
				</form>
				<p id="commentaire">Pour voir les images d'une galerie privée, sélectionner un groupe puis une galerie.
				<br/ > Pour voir les images d'une galerie publique, cliquer sur "Oeuvres par galerie" dans la barre de navigation.</p>
			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
