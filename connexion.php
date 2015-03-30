<?php if(!isset($_SESSION))
{
	session_start();
} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<?php include_once "./includes/style.php" ?>
	<title>Connexion</title>
</head>
<body id="pageAccueil" class="clearfix">
	<?php include_once 'includes/header.php'; ?>
	<div>
		<div id="contenu">
			<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" name="profil" id="profil"
				action="connexion.php" method="post">
				<fieldset>
					<legend>Informations de connexion</legend>
					<ul>
						<li><p>
							<label for="alias">Nom utilisateur (alias):</label> <input
							type="text" name="alias" id="alias" tabindex="1" required
							value="<?php if(isset($_POST['alias'])) {
								echo htmlentities($_POST['alias']);}?>" onfocus="this.select()" />
							</p>
						</li>

						<li><p>
							<label for="mdp">Mot de passe:</label> <input type="password"
							name="mdp" id="mdp" tabindex="2" value="" required onfocus="this.select()" />
						</p>
					</li>

				</ul>

				<input type="submit" name="soumettre" id="soumettre" tabindex="3"
				value="Soumettre" />

			</fieldset>
			<p id="commentaire">
				Entrer votre alias et votre mot de passe
			</p>
			<p id="commentaire">				

			</p>
			<p id="messageErreur">
				<?php include_once 'metier/authentifier.php'; ?>
			</p>
		</form>
		<p>
			<br />&nbsp;
		</p>
	</div>
</div>
</div>
<?php include_once 'includes/footer.php';?>
</body>
</html>


