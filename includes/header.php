<div id="header">
	<h1>Arts Visuels</h1>
	<h2></h2>
</div>
<div id="navigation">
	<ul id="menu">
		<li><a href="index.php">Accueil&nbsp; </a>
		</li>
<!--		<li><a href="publicGaleriesListe.php">Oeuvres par galerie&nbsp; </a> <!--<ul>-->
<!--				<li><a href=#>2013&nbsp; </a></li>-->
<!--			</ul>  d�commenter et compl�ter cette partie permetterait d'afficher un sous-menu d�roulant-->
<!--		</li>-->
	<!--  	<li><a href=#>Oeuvres par artiste &nbsp; </a>
		</li> -->
		<?php 
		if(!isset($_SESSION['utilisateur']))
		{
			echo '<li>';
			echo '<a href="connexion.php">Se connecter &nbsp;</a>';
			echo '</li>';
		}
		else
		{
			echo '<li>';
			echo '<a href="deconnexion.php">Fermer ma session &nbsp;</a>';
			echo '</li>';
			echo '<li>';
			echo '<a href="#">Bienvenue &nbsp; '. $_SESSION['prenom'] . '</a>';
			echo '</li>';
		}
		?>
		
<!--		<li><a href="a_propos.php">&Agrave; Propos</a></li>-->
	</ul>
</div>
<div class="clear"></div>
