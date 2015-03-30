<?php
// pour v�rifier avec ajax si un alias est disponible ou pas
include_once "connexion.class.php";
$alias=$_GET["q"];

$response="";

$critere = "alias";
$connexion = new Connexion();
// On r�cup�re la liste des membres et on verifie si l'alias existe d�j�
$requete = $connexion->prepare("SELECT * FROM membres WHERE $critere = :$critere");

$requete->bindParam(":$critere", $alias);
$requete->execute();


// On d�roule la liste
$chk_pseudo = $requete->fetch(PDO::FETCH_ASSOC);

// Si le pseuo existe d�j� 
if($chk_pseudo == '1' || $chk_pseudo > '1')
{
	$response="--- Cet alias n'est pas disponible";
	$ok = false;
}
else
{
	$response="";
}

echo $response;
?>