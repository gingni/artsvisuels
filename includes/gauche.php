
<?php
if (isset ($_SESSION['utilisateur']))
{
	if ($_SESSION['utilisateur']=="etudiant")
	{
		include_once 'includes/navGaucheEtudiant.php';
	}

	if($_SESSION['utilisateur']=="professeur")
	{
		include_once 'includes/navGaucheProfesseur.php';
	}
	if($_SESSION['utilisateur']=="gestion")
	{
		include_once 'includes/navGaucheGestion.php';
	}
}
else
{
	echo'<div id="gauche"><ul id="nav_maintenance"></ul></div>';

}
?>


