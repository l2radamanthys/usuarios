<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template-manager.php');


html_display('header.txt', 'TITLE', 'Login');
html_format("Login", "h1", 'style="margin-bottom: 10px"'); //titulo

$mi_session = new Session();

//mensaje de si ya se encuentra logueado
if ($mi_session->login_username() != '') {
	
	html_display('messages/001.txt', 'USER', $mi_session->login_username());
}

else {
	if (isset($_POST["usuario"])) {
		$band = $mi_session->login($_POST["usuario"], $_POST["password"]);
		if ($band) {
			html_display('messages/003.txt');
		}
		else {
			html_display('messages/004.txt'); //despues pongo un msj
		}
		
	}
	else {
		html_display('users/login.txt');
	}
}


html_display('footer.txt');
?>
