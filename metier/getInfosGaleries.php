<?php
/*
 * appelé par getInfosGaleries() dans navigationMembres.js
 * et dans listeLieeImagesGaleries.js -> pour afficher dossier dans pageImageAjouter?
 *
 * nicole gingras modifié 2014-04-03
 */
$idGalerie = $_POST['idGalerie'];
include_once 'rechercherGalerie.class.php';
$cherche = new RechercherGalerie;
if(isset($_POST['requete']))
{
	$req = $_POST['requete'];

	$liste=$cherche->rechercherUneGalerie($idGalerie);
	if($req == "dossier"){
		foreach($liste as $ligne) {
			echo "exercice_1";
			//echo $ligne["dossier"];
		}

	}
}

/*pour afficher dant pageGaleriePubliqueModifier.php
* ajouté 2014-04-17 ng
*/
if(isset($_POST['type']) && $_POST['type'] == "modifier")
{
$liste=$cherche->rechercherUneGaleriePublique($idGalerie);
	foreach($liste as $ligne) {
		$status = $ligne["status"];
		$description = $ligne["descriptiongalerie"];
		$titre = $ligne["titregalerie"];
		echo '<p>';
		echo '<span class="etiquette" >Titre</span> ';
		echo '<input type="text" id="titregalerie" name="titregalerie" tabindex="2" value="';
		echo $titre;
		echo '" />';
		echo '</p>';
		/*
		 * ---------------------------------------------------------------
		 */
		echo '<p>';
		echo '<span class="etiquette" >Description</span> ';
		echo '<input type="text" id="descriptiongalerie" name="descriptiongalerie" tabindex="3" value="';
		echo $description;
		echo '" />';
		echo '</p>';
		/*
		 * ---------------------------------------------------------------
		 */
		echo '<p>';
		echo 'Active <input type="radio" id="prive" ';
		echo ($status == "0")? "checked":"";
		echo ' name="status" value="0" />';
		echo '</p>';

		echo '<p>';
		echo 'Inactive <input type="radio" id="public" ';
		echo ($status == "1")? "checked":"";
		echo ' name="status" value="1" />';
		echo '</p>';

		echo '<p>';
		echo 'Ferm&eacute;e <input type="radio" id="public" ';
		echo ($status == "2")? "checked":"";
		echo ' name="status" value="1" />';
		echo '</p>';
		/*
		 * ---------------------------------------------------------------
		 */		
	}
}



else
{
	// pour afficher dans la pageGaleriesModifier.php
	$liste=$cherche->rechercherUneGalerie($idGalerie);
	foreach($liste as $ligne) {
		$publique_privee = $ligne["publique_privee"];
		$status = $ligne["status"];
		/*echo '<p>';
		 echo '<span class="etiquette" >id galerie</span> ';
		 echo '<input type="text" id="idgalerie" name="idgalerie" tabindex="1" value="';
		 echo $ligne["idgalerie"];
		 echo '" />';
		 echo '</p>';*/
		/*
		 * ---------------------------------------------------------------
		 */
		echo '<p>';
		echo '<span class="etiquette" >Galerie choisie</span> ';
		echo '<input type="text" id="descriptionGalerie" name="descriptionGalerie" tabindex="1" value="';
		echo $ligne["descriptiongalerie"];
		echo '" />';
		echo '</p>';
		/*
		 * ---------------------------------------------------------------
		 */
		echo '<p>';
		echo '<span class="etiquette" >&Eacute;nonce du travail</span> ';
		echo '<input type="text" id="enonceTravail" name="enonceTravail"  tabindex="2" value="';
		echo $ligne["enonceTravail"];
		echo '" />';
		echo '</p>';
		/*
		 * ---------------------------------------------------------------
		 */
/*		echo '<p>';
		//var_dump($publique_privee);
		echo 'Galerie priv&eacute;e <input type="radio" id="prive" ';
		echo ($publique_privee == "0")? "checked":"";
		echo ' name="publique_privee" value="0" />';

		echo '</p>';
		echo '<p>';
		echo 'Galerie publique <input type="radio" id="public" ';
		echo ($publique_privee == "1")? "checked":"";

		echo ' name="publique_privee" value="1" />';
		echo '</p>';*/
		/*
		 * ---------------------------------------------------------------
		 */
		echo '<p>';
		echo '<span class="etiquette">Date d\'&eacute;cheance</span> ';
		echo '<input type="text" id="dateEcheance" name="dateEcheance" tabindex="4" value="';
		echo $ligne["dateEcheance"];
		echo '" />';
		echo '</p>';
		/*
		 * ---------------------------------------------------------------
		 */
		echo '<p>';
		echo 'Active <input type="radio" id="prive" ';
		echo ($status == "0")? "checked":"";
		echo ' name="status" value="0" />';
		echo '</p>';

		echo '<p>';
		echo 'Inactive <input type="radio" id="public" ';
		echo ($status == "1")? "checked":"";
		echo ' name="status" value="1" />';
		echo '</p>';

		echo '<p>';
		echo 'Ferm&eacute;e <input type="radio" id="public" ';
		echo ($status == "2")? "checked":"";
		echo ' name="status" value="1" />';
		echo '</p>';
		/*
		 * ---------------------------------------------------------------
		 */
	}
}




