<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template.php');

draw_header("Login");
format("Login", "h1", 'style="margin-bottom: 10px"'); //titulo
//display('templates/users/menu.txt'); //dibujar menu


if (isset($_SESSION['usuario'])) {
	display('messages/001.txt');
}
else {
	if (isset($_POST["usuario"])) {
		$mi_session = new Session();
		$band = $mi_session->login($_POST["usuario"], $_POST["password"]);
		if ($band) {
			display('messages/003.txt');
		}
		else {
			display('messages/004.txt'); //despues pongo un msj
		}
		
	}
	else {
		display('users/login.txt');
	}
}


draw_footer();
?>
