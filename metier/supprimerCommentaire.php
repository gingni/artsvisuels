<?php
/*
 * supprimer l'image en appelant la ps supprimer_image_sans_commentaires
 * appelée dans navigationMembres.js par la fonction supprimerImage()
 */

$idcommentaire= $_POST['idcommentaire'];
var_dump($idcommentaire);

// todo
// ajouter deux boutons oui et annuler
// faire un test d'erreur
include_once 'supprimerCommentaire.class.php';
$supprimer = new SupprimerCommentaire();
$supprimer->supprimer($idcommentaire);