<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/config.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');



$user = new Session();
html_display('header.txt', 'TITLE', 'Mis Datos');
display_menu($user);  //dibujar menu
tbr(2);

if ($user->is_have_access()) {
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
	html_display('messages/010.txt');
}


html_display('footer.txt');
?>
