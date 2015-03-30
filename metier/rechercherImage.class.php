<?php
include_once "select.class.php";
class RechercherImage extends Select{

	private $select;

	function __construct() {
		$this->select = new Select();
	}

	//------------------------------------------------
	// utilis�e dans getListeImagesGaleries.php
	function rechercherImagesGaleries($idGalerie){
		$liste =$this->select->rechercher($idGalerie,"select * from contenugalerie where idgalerie = :critere");
		if (count($liste)==0){
			echo "Il n'y a pas d'images dans cette galerie!";
		}
		return $liste;
	}
	
	//------------------------------------------------
	// utilis�e dans getListeImagesGaleries.php
	function rechercherImagesGaleriePublique($idGalerie){
		$liste =$this->select->rechercher($idGalerie,"select * from contenugalerie_publique where idgalerie = :critere");
		if (count($liste)==0){
			echo "Il n'y a pas d'images dans cette galerie!";
		}
		return $liste;
	}
	//------------------------------------------------
	//
	function rechercherImagesMembre($idmembre){
		$liste =$this->select->callPS("afficher_images_membre", $idmembre);
		if (count($liste)==0){
			echo "Il n'y a pas d'images!";
			return 0;
		}
		else
			{return $liste;}		
	}
	
	//------------------------------------------------
	// utilis�e par pageImagesSupprimer.php
	// comme on n'affiche que les images pas encore comment�es
	// le membre ne peut choisir de supprimer une image comment�e
	function rechercherImagesMembreSanscommentaires($idmembre){
		$liste =$this->select->callPS("afficher_images_membre_sans_commentaires", $idmembre);
		if (count($liste)==0){
			echo "Il n'y a pas d'images!";
		}
		return $liste;
	}
	
	//------------------------------------------------
	// utilis�e dans getListeImagesGaleries.php
	function getInfosImage($idimage){
		$liste=$this->select->rechercher($idimage,
		"select i.titre, i.src, concat (m.nom, ' ', m.prenom) as 'nomEtudiant'
        from images as i
	   		left JOIN imagesmembres as im
        	ON im.idimage = i.idimage
        	
	   		left JOIN membres as m 
	   		on m.idmembre=im.idmembre
	   	where i.idimage = :critere");
		return $liste;
	}
	
	//------------------------------------------------
	// utilis�e par getInfosImages.php
	function afficherToutesLesInfos($idimage)
	{
		// appel d'une proc�dure stock�e pour obtenir toutes les informations relatives � une image
		// cette procedure recherche aussi toutes les galeries dans laquelle se trouve l'image
		$liste=$this->select->callPS("get_infos_images", $idimage);
		return $liste;
	}

	
	//------------------------------------------------
	// utilis�e par getInfosImages.php mais c'est d�sactiv� 2014-03-31
	// 
	function afficherToutLesCommentaires($idimage){
		$liste=$this->select->callPS("get_commentaires", $idimage);
		return $liste;
	}
}