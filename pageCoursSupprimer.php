<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
include_once "includes/redirectProfesseur.php";
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
<script type="text/javascript" src="./js/inscriptionValidation.js"></script>
<?php include_once "./includes/style.php" ?>
<title>Supprimer cours</title>
</head>
<body class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" name="profil" id="profil" action="pageCoursSupprimer.php"
					method="post">
					<fieldset>
					<legend>Entrer le num&eacute;ro du cours &agrave; supprimer (3 chiffres)</legend>
						<!--  -->
						<ul>
							<li><p>
									<label for="idCours">Numéro du cours:</label> <input
										type="text" name="idCours" id="idCours" tabindex="1" value=""
										 size="40" />
								</p></li>
							<li><p>
									<input type="submit" name="soumettre" id="soumettre"
										value="Supprimer" tabindex="2" />
								</p></li>
						</ul>
						<p id="messageErreur">
						<?php if (isset($_POST['idCours'])) {
							$idCours = htmlentities($_POST['idCours']);
							include_once 'metier/supprimerCours.class.php';
							$supprimer = new SupprimerCours();
							$supprimer->supprimer($idCours);
						}?>
						</p>

					</fieldset>
				</form>

			</div>
		</div>
	</div>

	<?php require "includes/footer.php";
	//echo ini_get('include_path');
	//var_dump(stream_resolve_include_path("classes/select.class.php"));
	//pour obtenir le current working directory
	//http://www.eclipse.org/pdt/help/html/include_paths.htm
	//echo getcwd(); ?>
</body>
</html>
