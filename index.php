<?php
if(!isset($_SESSION))
{
	session_start();
}
/* Cette partie est comment�e pour enlever la redirection
include_once "includes/redirect.php";
*/
/* en cas d'avoir besoin de d�truire la session
 $_SESSION = array();
 if (ini_get("session.use_cookies")) {
 $params = session_get_cookie_params();
 setcookie(session_name(), '', time() - 42000,
 $params["path"], $params["domain"],
 $params["secure"], $params["httponly"]
 );
 }
 session_destroy();
 */
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="ISO-8859-1">
 	<?php include_once "./includes/style.php" ?>
 	<title>Arts visuels</title>
 </head>
 <body id="pageAccueil" class="clearfix">
 	<?php require "includes/header.php"; ?>
 	<div>
 		<div id="contenu">
 			<?php include_once 'includes/gauche.php';?>
 			<div id="droit">
 			<p class="apropos"></p>

 			</div>
 		</div>
 	</div>

 	<?php require "includes/footer.php"; ?>
 </body>
 </html>
