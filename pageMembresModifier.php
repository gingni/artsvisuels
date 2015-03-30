<?php
session_start();
include_once "includes/redirectProfesseur.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<script type="text/javascript" src="./js/inscriptionValidation.js"></script>
<?php include_once "./includes/style.php" ?>
<title>Arts visuels</title>
</head>
<body class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<h3>Modification</h3>
				<form class="formNavGauche" name="profil" id="profil" action="pageMembresModifier.php" method="post"
					onSubmit="return formValidation();">
					<fieldset>
						<legend>Informations</legend>
						<ul>

							<li><p>
									<label for="prenom">Pr&eacute;nom:</label> <input type="text"
										name="prenom" id="prenom" tabindex="1"
										value="<?php if(isset($_POST['prenom'])) {
                        					echo htmlentities($_POST['prenom']);}?>"
										size="40" />
								</p>
							</li>

							<li><p>
									<label for="nom">Nom:</label> <input type="text" name="nom"
										id="nom" tabindex="2"
										value="<?php if(isset($_POST['nom'])) {
                        					echo htmlentities($_POST['nom']);}?>"
										size="40" />
								</p>
							</li>

							<li><p>
									<label for="alias">Nom utilisateur (alias):</label> <input
										type="text" name="alias" id="alias" tabindex="3"
										value="<?php if(isset($_POST['alias'])) {
                        					echo htmlentities($_POST['alias']);}?>"
										size="40" />
								</p>
							</li>

							<li><p>
									<label for="mdp">Mot de passe:</label> <input type="password"
										name="mdp" id="mdp" tabindex="4" value="" size="40" />
								</p>
							</li>

							<li><p>
									<label for="type">&Eacute;tudiant</label> <input type="radio"
										name="type" id="type" value="&Eacute;tudiant" checked />

									<label for="type">Professeur</label> <input type="radio"
										name="type" id="type" value="Professeur" />
								</p>
							</li>

						</ul>

						<input type="submit" name="soumettre" id="soumettre"
							value="Modifier" />
					</fieldset>
											<p id="messageErreur"><?php include_once 'metier/modifierMembre.class.php';
						$modif = new ModifierMembre();
						$modif->modifierMembre();?></p>
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
