<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template.php');
draw_header("Login");

if (isset($_SESSION['usuario'])) {
	display('templates/messages/001.txt');
}
else {
	if (isset($_POST["usuario"])) {
		$mi_session = new Session();
		$band = $mi_session->login($_POST["usuario"], $_POST["password"]);
		if ($band) {
			display('templates/messages/003.txt');
		}
		else {
			echo "login error"; //despues pongo un msj
		}
		
	}
	else {
		display('templates/users/login.txt');
	}
}


draw_footer();
?>
