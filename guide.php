<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
include_once "includes/redirect.php";
?>
<!DOCTYPE html>
<!-- 
Par Nicole Gingras
TP 2-3-4  Réaliser un site Web transactionnel complet
Programmation Internet 420-458-AT
Professeur:  Claude Boutet
Automne 2013
 -->
<html>
<head>
<meta charset="ISO-8859-1">
<?php include_once "./includes/style.php" ?>
<title>Petit guide</title>
</head>
<body id="pageAccueil" class="clearfix">
<?php require "includes/header.php"; ?>
	<div>
		<div id="contenu">
		<?php include_once 'includes/gauche.php';?>
			<div id="droit">
				<h1>Notes sur l'utilisation et l'avancement des travaux</h1>
				<p>
					Les membres regroupent tous les utilisateurs. Ils
					sont séparés en groupe d'utilisateurs : étudiants, professeurs et
					gestionnaires.
				</p>
				<p>Seul un gestionnaire peut ajouter un membre.</p>
				<p>En résumé, si on ne se connecte pas, on a accès au site publique. 
				Si on se connecte, selon qu'on est étudiant, professeur ou gestionnaire
					il y a une redirection vers une page personnalisée. La déconnexion
					ramène l'utilisateur à la page de connexion.</p>
				<p>Les vues, ou pages de présentation du contenu sont dans la racine
					du site, en général leur nom commencent par page ou par public.</p>
				<p>Les classes relatives à la base de données sont dans le dossier metier.
				 J'ai mis dans le dossier includes différents bouts de code
					qui sont utilisés par beaucoup de pages.</p>
				<p>Les pages qui utilisent une ou des listes pour afficher du
					contenu le font avec ajax. (Les scripts php dont le nom débute par
					get sont appelés par les scripts ajax)</p>
				<p>Avancement des travaux: </p>
				<p>Les cas d'utilisation
					relatifs à la maintenance des membres et des cours sont réalisés.</p>
				<p>Les cas des
					galeries et des images sont commencés</p>

			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
