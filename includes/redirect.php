<?php
if (empty ($_SESSION['authentifie']))
{
	header('Location: connexion.php');
}