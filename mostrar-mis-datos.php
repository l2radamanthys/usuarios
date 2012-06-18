<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');




html_display('header.txt', 'TITLE', 'Mis Datos');
html_format("Usuarios - Mis Datos", "h1", 'style="margin-bottom: 10px"'); //titulo
html_display('users/menu.txt'); //dibujar menu

if (1) {
	if (isset($_SESSION['usuario'])) {
	
		$user = new Users();
		$row = $user->get($_SESSION['usuario']);
		html_display('users/datos-usuario.txt', $row); //dibujar menu
		/*foreach($row as $k => $v) {
				echo "<p>".$k."->".$v."</p>";
		}*/
	
		
	}
	else {
		html_display('messages/002.txt');
	}
}
else {
	html_display('denied-access.txt');
}


html_display('footer.txt');
?>
