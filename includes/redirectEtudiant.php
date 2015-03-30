<?php
if (empty ($_SESSION['authentifie']))
{
	header('Location: connexion.php');
}else{
	if ($_SESSION['utilisateur']=="etudiant")
	{
		header('Location: etudiant.php');
	}
}