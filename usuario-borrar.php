<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/config.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');

$user = new Session();
html_display('header.txt', 'TITLE', 'Eliminar Usuario');

html_format('Usuarios - Eliminar Usuario', 'h1', 'style="margin-bottom: 10px"'); //titulo
//html_display('users/menu.txt'); //dibujar menu
display_menu($user); 

if ($user->is_have_access()) {
	
}

else {
	html_display('messages/010.txt');
}

html_display('footer.txt');
?>
