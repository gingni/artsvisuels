<?php if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirect.php";
?>
<!DOCTYPE html>
<!-- page pour ajout d'image -->
<html>
<head>
<meta charset="ISO-8859-1">
<script type="text/javascript" src="./js/inscriptionValidation.js"></script>
<script type="text/javascript" src="./js/navigationMembres.js"></script>
<?php include_once "./includes/style.php" ?>
<title>Ajout Image</title>
</head>
<body class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<p id="membres"></p>
				<!--formulaire pour uploader une image-->
				<form class="formNavGauche" method='post'
					action='pageImagesAjouter.php' enctype='multipart/form-data'>
					<fieldset>
						<legend>
						<?php
						include_once 'metier/rechercherMembre.class.php';
						$tous= new RechercherMembre();
						$idMembre = $_SESSION['idMembre'];
						//var_dump($idMembre);
						$alias =$tous->rechercherUnMembre($idMembre);
						?>
							- Ajouter une image au site
						</legend>

						<p id="groupes">
							<!-- Une liste déroulante des groupes pour lesquels il y a des galeries -->
						<?php
						include_once 'metier/rechercherGroupe.class.php';
						$tous= new RechercherGroupe();
						$tous->rechercherPourPageImage();
						?>
						</p>

						<p id="galeries">
							<!-- Une liste déroulante des galeries -->
							<p>S&eacute;lectionner une galerie</p>
							<select size="3" id="galerieSelect" name="galerieSelect"
								onchange="getIdGalerie(this)" tabindex="1" >
							</select>
							<!-- la place ou inscrire le dossier de la galerie choisie -->
							<input type="hidden" name="idGalerie" id="idGalerie" value="" />
							<input type="hidden" name="dossierGalerie" id="dossierGalerie"
								value="" tabindex="2" />
						</p>
						<div id="div_infos">



							<p>
								<label>Titre</label> <input type="text" name="titre" id="titre"
									tabindex="3"
									value="<?php if(isset($_POST['titre'])) {
                        		echo htmlentities($_POST['titre']);}?>" />
							</p>

							<p>
								<label>Dimensions</label> <input type="text" name="dimensions"
									id="dimensions" tabindex="4"
									value="<?php if(isset($_POST['dimensions'])) {
                        		echo htmlentities($_POST['dimensions']);}?>" />


							</p>

							<p>
								<label>Medium</label> <input type="text" name="medium"
									id="medium" tabindex="5"
									value="<?php if(isset($_POST['medium'])) {
                        		echo htmlentities($_POST['medium']);}?>" />
							</p>
							<p>
								<label>Date ou ann&eacute;e de cr&eacute;ation</label> <input
									type="text" name="datecreation" id="datecreation" tabindex="6"
									value="<?php if(isset($_POST['erreur'])) {
                        		echo htmlentities($_POST['datecreation']);}?>" />
							</p>

							<p>
								<textarea rows="5" id="concept" name="concept"
									placeholder="Décrire le concept..." tabindex="7"></textarea>
							</p>
						</div>
						<p>
							<input type='file' name='image' value='tmp_name' size='150' tabindex="8" />
						</p>
						<div class="clearfix">&nbsp;</div>
						<p>
							<input type='submit' name="upload" id="upload"
								value='Ajouter une image' tabindex="9"/>
						</p>


					</fieldset>
					<p id="messageErreur">

					<?php
					if(isset($_POST['upload'])){
						if(isset($_POST['idGalerie']) && !empty($_POST['idGalerie'])){
							$erreurs = array();
							$acceptable = array( 'image/jpeg', 'image/jpg', 'image/gif', 'image/png');
							$taille_max_image = 5000000;
							//var_dump($taille_max_image);
							$taille = filesize($_FILES['image']['tmp_name']);
							//var_dump($taille);
							$idGalerie = htmlentities ($_POST['idGalerie']); // re echo dans getListeGaleries.php

							$dossier = htmlentities ($_POST['dossierGalerie']);

							$concept = htmlentities ($_POST['concept']);
							//$concept = "pas de concept, mais ça viendra";  //pas de concept pour le moment
							$src = "";
							$titre = htmlentities ($_POST['titre']);
							//var_dump($concept);
							if(empty($titre)){
								$erreurs[] = "Il faut entrer un titre!";
							}
							$datecreation = htmlentities ($_POST['datecreation']);
							$dimensions = htmlentities ($_POST['dimensions']);
							$medium = htmlentities ($_POST['medium']);
							$timestamp = time(); // utiliser le timestamp pour nommer l'image

							// gestion de quelques erreurs
							if (empty($_FILES['image']['tmp_name']))
							{
								$erreurs[] = "Il faut choisir une image.";
							}
							if ($taille > $taille_max_image)
							{
								$erreurs[] = "La taille de l'image doit être inférieure à 500 ko";
							}
							// s'il n'y a pas eu d'erreur
							if(count($erreurs) === 0){
								//<!-- construction du chemin de l'image dans la structure de dossiers -->
								$nom = $_FILES['image']['tmp_name'];
								$src = $dossier;
								$src = $src . $alias;
								$src = $src . "_";
								$src = $src . $timestamp;
								$src = $src . ".jpg";

								//<!-- Ajout image dans la base de donnees -->
								include_once 'metier/ajouterImage.class.php';
								$ajouter = new AjouterImage();
								$ajouter->ajouterImage($idGalerie, $idMembre, $concept, $src, $titre, $datecreation, $dimensions, $medium);

								//$ajouter->ajouterContenuGalerie($idGalerie, $idimage);
								//$ajouter->ajouterImageMembre($idMembre, $idimage);

								if (move_uploaded_file($nom, $src))// cette fonction retourne false s'il n'y a pas eu de fichier copie
								{
									//echo '<script>alert ("Image ajoutée");</script>';
									echo "Image ajoutée";
								}
							}
							else {
								foreach($erreurs as $erreur)
								{
									//echo '<script>alert (" ' . $erreur . ' ");</script>';
									echo $erreur;
								}
							}
						}
						else
						{
							echo "Il faut choisir un groupe, puis une galerie de ce groupe, puis compléter les champs.";
						}
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
