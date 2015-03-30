<?php if (isset($_POST['soumettre'])) // si l'utilisateur a clique
{
	if(empty($_POST['alias'])||empty($_POST['mdp'])){
		echo "Un champ obligatoire est vide";
		//utile juste si l'attribut required du input n'est pas supportee
	}
	else{
		$alias = htmlentities($_POST['alias']);
		$mdp = sha1(htmlentities($_POST['mdp']));
		include_once "./metier/rechercherMembre.class.php";
		$tous = new RechercherMembre();
		$liste =$tous->rechercherAliasEtMdp($alias, $mdp);

		//on identifie l'utilisateur comme etant un membre et comme
		//etant authentifie, ce qui lui permettera d'acceder au reste du site
		//TODO : ajouter gestionnaire, professeur et etudiant comme valeurs
		//de la variable de session utilisateur et modifier l'acces au site
		//en fonction de ca
		if (count($liste)>0){
				// pour savoir si c'est un prof ou un étudiant
			$_SESSION['utilisateur']=$liste[0]['type'];
				// pour indiquer que l'utilisateur est authentifie
			$_SESSION['authentifie']="ok";
				// pour savoir qui utilise le site			
			$_SESSION['idMembre']=$liste[0]['idmembre'];
			$_SESSION['prenom']=$liste[0]['prenom'];

			if ($_SESSION['utilisateur']=="etudiant"){
				echo "<script type='text/javascript'>document.location.replace('etudiant.php');</script>";
			}

			if($_SESSION['utilisateur']=="professeur")
			{
				echo "<script type='text/javascript'>document.location.replace('professeur.php');</script>";
			}
			if($_SESSION['utilisateur']=="gestion")
			{
				echo "<script type='text/javascript'>document.location.replace('gestionnaire.php');</script>";
			}
		}

	}
}


