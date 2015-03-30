<?php if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirectProfesseur.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<script type="text/javascript" src="./js/inscriptionValidation.js"></script>
<?php include_once "./includes/style.php" ?>
<title>Arts Visuels</title>
</head>
<!-- faire en sorte que le input noda est disabled si le type du membre est professeur 
effacer messageErreur-->
<body class="clearfix" onload="onload()">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" name="profil" id="profil"
					action="pageMembresAjouter.php" method="post"
					onSubmit="return formValidation();">
					<fieldset>
						<legend>Ajouter un membre</legend>
						<ul>
							<li><p>
									<label for="prenom">Pr&eacute;nom:</label> <input type="text"
										name="prenom" id="prenom" tabindex="1"
										value="<?php if(isset($_POST['prenom'])) {
                       					echo htmlentities($_POST['prenom']);}?>" />
								</p>
							</li>

							<li><p>
									<label for="nom">Nom:</label> <input type="text" name="nom"
										id="nom" tabindex="2"
										value="<?php if(isset($_POST['nom'])) {
                        				echo htmlentities($_POST['nom']);}?>" />
								</p>
							</li>

							<li><p>
									<label for="alias">Nom utilisateur (alias):</label> <input
										type="text" name="alias" id="alias" tabindex="3"
										value=""
										onkeyup="showHint(this.value)" />
								</p>
							</li>

							<li><p>
									<label for="mdp">Mot de passe:</label> <input type="password"
										name="mdp" id="mdp" tabindex="4" value="" />
								</p>
							</li>

							<li><p>
									<label for="type">&Eacute;tudiant</label> <input type="radio"
										name="type" id="etudiant" value="etudiant" checked="checked" />
									&nbsp;&nbsp;&nbsp; <label for="type">Professeur</label> <input
										type="radio" name="type" id="professeur" value="professeur" />
								</p>
							</li>
							<li>
								<p>
									<label for="noda">No DA si étudiant</label> <input type="text"
										name="noda" id="noda" tabindex="6" value="" />
								</p>
								<p id="messageErreur">
								<?php
								// vérifier si clic sur bouton
								if (isset ($_POST['soumettre']))
								{
									// si on ajoute un etudiant il faut entrer un no da
									$type= htmlentities($_POST['type']);
									if($type=="etudiant"){
										if(!isset($_POST['noda'])){
											echo "inscrire un no DA";
										}else{
											// on ajoute l'étudiant
											include_once 'metier/ajouterMembre.class.php';
											$ajout = new AjouterMembre();
											$ajout->ajouterMembre();
										}
										// sinon et si les autres champs ont été complétés, c'est ok
									}else{
										// on ajoute le professeur ou le gestionnaire
										include_once 'metier/ajouterMembre.class.php';
										$ajout = new AjouterMembre();
										$ajout->ajouterMembre();
									}
								}
								?>
								</p>
							</li>

						</ul>
						<p>
							<span id="txtHint"></span>
						</p>

						<input type="submit" name="soumettre" id="soumettre" tabindex="7"
							value="Ajouter" />
					</fieldset>

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
