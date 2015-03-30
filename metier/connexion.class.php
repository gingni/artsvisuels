<?php
	include_once "config.inc.php";
	
	class Connexion extends PDO {
		function __construct() {
			parent::__construct(DSN, USAGER, MOTPASSE);
		}
	}