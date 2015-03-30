<?php if(!isset($_SESSION))
{
	session_start();
}
include_once "includes/redirect.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1" content="" />
<script type="text/javascript" src="./js/navigationMembres.js"></script>
</head>
<?php include_once "./includes/style.php" ?>
<title>Modifier galerie</title>
</head>
<body id="pageAccueil" class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<form class="formNavGauche" name="modifier" id="modifier"
					action="pageGaleriesModifier.php" method="post">
					<fieldset>
						<legend>Modifier une galerie</legend>
					
						<p id="groupes" class="selection" >S&eacute;lectionner un groupe</p>
						<select size="3" id="groupeSelect" name="groupeSelect"
							onchange="getListeGaleriesPourModifier(this)">
							<?php
							include_once 'metier/rechercherGroupe.class.php';
							$tous= new RechercherGroupe();
							$liste = $tous->rechercherPourModifierGalerie();
							//echo "<option value=\"none\">S&eacute;lectionner un groupe</option>";

							if (count($liste)==0){
								echo "<option>Il n'y a pas de groupe</option>";
							}else{
								foreach($liste as $ligne) {
									$ligneaffichee = "<option value=" . $ligne["idgroupe"] . ">" . $ligne["descriptioncours"]. " - " . $ligne["annee"] . " - " . $ligne["session"] . "</option>";
									echo $ligneaffichee;
									//var_dump($ligneaffichee);
								}
								echo '</select>';
								echo '<input type="hidden"  name="dossier"  value="' . $ligne["dossier"] . '">';
								echo '<input type="hidden"  name="session"  value="' . $ligne["session"] . '">';
								echo '<input type="hidden"  name="annee"  value="' . $ligne["annee"] . '">';
							}
							?>
						</select>
						<p id="galeries"></p>

						<div id="div_infos"></div>
						<input type="submit" name="modifier" id="modifier"
							value="Modifier" />
					</fieldset>

					<p id="messageErreur">
					<?php
					if(isset($_POST['galerieSelect']))
					{
						include_once 'metier/modifierGroupeGalerie.class.php';
						$modif = new ModifierGroupeGalerie();
						$modif->modifierGalerie($_POST['galerieSelect']);
					}
					else
					{
						echo "Il faut sélectionner un groupe puis une galerie.";
					}
					?>
					</p>
				</form>
				<p id="commentaire">À discuter pour prendre décision:
				<br/ ><br/ >
				Active = galerie dans laquelle on peut ajouter des images. 
					<br/ ><br/ >
					Fermée à l'ajout d'image = on ne peut plus ajouter d'images, mais on peut voir le contenu pour ajouter des commentaires.
					<br/ ><br/ >Fermée aux commentaires = pas d'ajout d'images, pas d'ajout de commentaires.
					<br/ ><br/ >Inactive = galerie pas visible (session terminée, groupe désactivé)
					<br/ ><br/ > 2014-04 : ça reste à coder.
				</p>
			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
