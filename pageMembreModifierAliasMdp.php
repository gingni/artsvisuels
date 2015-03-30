<?php
session_start();
include_once "includes/redirect.php";
$idMembre = $_SESSION['idMembre'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<script type="text/javascript" src="./js/inscriptionValidation.js"></script>
	<?php include_once "./includes/style.php" ?>
	<title>Modification membre</title>
</head>
<body class="clearfix">
	<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
			<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" name="profil" id="profil" 
				action="pageMembreModifierAliasMdp.php" method="post" 
				onSubmit="return formValidation();">
					<fieldset>
						<legend>Modification de votre alias et mot de passe</legend>
						<ul>

							<p>
								<?php
								include_once './metier/rechercherMembre.class.php';
								$cherche = new RechercherMembre();
								$liste=$cherche->rechercherId($idMembre);

								//var_dump($liste[0]["nom"]);
								$nom = $liste[0]["nom"] ;
								$prenom = $liste[0]["prenom"];
								$alias = $liste[0]["alias"];
								$courriel = $liste[0]["courriel"];

								?>
							</p>
						</li>
						<li><p>
							<label for="idMembre">idMembre</label> <input
							type="text" name="idMembre" id="idMembre"
							value= "<?php echo $idMembre; ?>"
							disabled />
						</p>
					</li>

					<li><p>
						<label for="alias">Nom utilisateur (alias):</label> <input
						type="text" name="alias" id="alias" tabindex="1"
						value="<?php echo $alias; ?>"
						size="40" />
					</p>
				</li>
				<li><p>
				<label for="courriel">Courriel:</label> <input
					type="text" name="courriel" id="courriel" tabindex="1"
					value="<?php echo $courriel; ?>"
					size="40" />
				</p>
			</li>

			<li><p>
				<label for="mdp">Mot de passe :</label> <input type="password"
				name="mdp" id="mdp" tabindex="2" value="" size="40" />
			</p>
		</li>

	</ul>

	<input type="submit" name="soumettre" id="soumettre" tabindex="3"
	value="Modifier" />
</fieldset>
<li><p id="commentaire">Choisir son alias avec soin et ne plus le changer.
	<br />
	En cas d'oubli de mot de passe, 
	il faut demander &agrave; un professeur de le r&eacute;initialiser.
	<br />
	L'adresse de courriel est falcutative, ne rien mettre l'efface.</p></li>
	<li>
		<p id="messageErreur"><?php include_once 'metier/modifierMembre.class.php';
			$modif = new ModifierMembre();
			$modif->modifierAliasMdp($idMembre);?></p>
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
