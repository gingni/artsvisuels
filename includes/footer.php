<div id="footer">
	<p>
		<a href="index.php">&nbsp;&nbsp; &nbsp;Accueil &nbsp; &#149; &nbsp;</a>

	<?php if(!isset($_SESSION['utilisateur']))
	{
		echo '<a href="connexion.php">Se connecter &nbsp;</a>';
	}
	else {
		if ($_SESSION['utilisateur']=="etudiant"){
			echo '<a href="etudiant.php">Ma page principale</a> &nbsp; &#149; &nbsp;<span style="font-size: .8em;">Je suis &eacute;tudiant '. $_SESSION['idMembre'] .'</span> &nbsp; &#149; &nbsp;';
		}

		if($_SESSION['utilisateur']=="professeur")
		{
			echo '<a href="professeur.php">Ma page principale</a> &nbsp; &#149; &nbsp;<span style="font-size: .8em;">Je suis professeur</span> &nbsp; &#149; &nbsp;';
		}
		if($_SESSION['utilisateur']=="gestion")
		{
			echo '<a href="gestionnaire.php">Maintenance du site</a> &nbsp; &#149; &nbsp; <span style="font-size: .8em;">Je suis gestionnaire</span> &nbsp; &#149; &nbsp;';
		}
		echo '<a href="deconnexion.php">Fermer ma session</a>';
	}
	?>
	</p>

	<p id="copyR">
		&nbsp;&nbsp;&nbsp;&#149; &nbsp; &#169;2015 Nicole Gingras<a href="#"></a> &nbsp; &#149;
	</p>
</div>
