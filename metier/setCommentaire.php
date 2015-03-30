<?php
include_once "ajouterCommentaire.class.php";
$inserer = new ajouterCommentaire();
$commentaire=$_POST['commentaire'];
$idimage=$_POST['idimage'];
$idMembre=$_POST['idMembre'];
$inserer->ajouterCommentaire($commentaire,$idimage,$idMembre);