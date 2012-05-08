<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template.php');

include_once('libs/users.php');

draw_header("Mis Datos Personales");
format("Usuarios - Mis Datos", "h1", 'style="margin-bottom: 10px"'); //titulo
display('users/menu.txt'); //dibujar menu

if (1) {
	if (isset($_SESSION['usuario'])) {
	
		$user = new Users();
		$row = $user->get($_SESSION['usuario']);
		display('users/datos-usuario.txt', $row); //dibujar menu
		/*foreach($row as $k => $v) {
				echo "<p>".$k."->".$v."</p>";
		}*/
	
		
	}
	else {
		display('messages/002.txt');
	}
}
else {
	display('denied-access.txt');
}


draw_footer();
?>
