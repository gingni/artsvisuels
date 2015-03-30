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

	<?php include_once "./includes/style.php" ?>
	<title>Ajouter groupe</title>
</head>
<body class="clearfix">
	<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
			<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" action="pageGroupeAjouter.php"
				method="post">
				<fieldset>
					<legend>Ajouter un groupe</legend>
					<ul>
						<li>

							<p>S&eacute;lectionner le cours pour lequel ajouter un groupe</p>
							<select  size="3" id="idCours" name="idCours" >
								<?php
								$_POST["type"]="tousPourSelect";
								require "./metier/getListeCours.php";
								?>
							</select>

						</li>

						<li>

							<p>S&eacute;lectionner une ann&eacute;e</p>
							<select  size="3" id="annee" name="annee" >
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
							</select>
						</li>

						<li>

							<p>S&eacute;lectionner une session</p>
							<select  size="3" id="session" name="session" >
								<option value="automne">automne</option>
								<option value="hiver">hiver</option>

							</select>

						</li>

					</ul>
					<p></p>
					<div>&nbsp;</div>

					<input type="submit" name="soumettre" id="soumettre"
					value="Ajouter" />
				</fieldset>
				<p id="messageErreur">
					<?php
					if(isset($_POST['idCours']))
					{
						$idcours = htmlentities($_POST['idCours']);
						$annee = htmlentities($_POST['annee']);
						$session = htmlentities($_POST['session']);
						include_once 'metier/ajouterGroupeGalerie.class.php';
						$ajout = new AjouterGroupeGalerie();
						$idprofesseur=1; //temporaire
						$ajout->ajouterGroupe($session, $idcours,$idprofesseur, $annee);
					}

					?>
				</p>
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
