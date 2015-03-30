<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
include_once "includes/redirect.php";
?>
<!DOCTYPE html>
<!-- 
Par Nicole Gingras
TP 2-3-4  R�aliser un site Web transactionnel complet
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
					sont s�par�s en groupe d'utilisateurs : �tudiants, professeurs et
					gestionnaires.
				</p>
				<p>Seul un gestionnaire peut ajouter un membre.</p>
				<p>En r�sum�, si on ne se connecte pas, on a acc�s au site publique. 
				Si on se connecte, selon qu'on est �tudiant, professeur ou gestionnaire
					il y a une redirection vers une page personnalis�e. La d�connexion
					ram�ne l'utilisateur � la page de connexion.</p>
				<p>Les vues, ou pages de pr�sentation du contenu sont dans la racine
					du site, en g�n�ral leur nom commencent par page ou par public.</p>
				<p>Les classes relatives � la base de donn�es sont dans le dossier metier.
				 J'ai mis dans le dossier includes diff�rents bouts de code
					qui sont utilis�s par beaucoup de pages.</p>
				<p>Les pages qui utilisent une ou des listes pour afficher du
					contenu le font avec ajax. (Les scripts php dont le nom d�bute par
					get sont appel�s par les scripts ajax)</p>
				<p>Avancement des travaux: </p>
				<p>Les cas d'utilisation
					relatifs � la maintenance des membres et des cours sont r�alis�s.</p>
				<p>Les cas des
					galeries et des images sont commenc�s</p>

			</div>
		</div>
	</div>

	<?php require "includes/footer.php"; ?>
</body>
</html>
