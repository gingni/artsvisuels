<?php
/*
 * supprimer l'image en appelant la ps supprimer_image_sans_commentaires
 * appelée dans navigationMembres.js par la fonction supprimerImage()
 */

$idimage= $_POST['idimage'];

// todo
// ajouter deux boutons oui et annuler
// faire un test d'erreur
include_once 'supprimerImage.class.php';
$supprimer = new SupprimerImage();
$supprimer->supprimerImagesSansCommentaires($idimage);