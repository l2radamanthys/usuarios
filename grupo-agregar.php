<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template-manager.php');

include_once('libs/groups.php');


html_display('header.txt', 'TITLE', 'Agregar Grupo');

html_format("Usuarios - Grupos", "h1", 'style="margin-bottom: 10px"'); //titulo
html_display('users/menu.txt'); //dibujar menu

if (1) {
	html_display('users/nuevo-grupo.txt');
	
	if (isset($_POST['name'])) {
		$group = new Groups();
		$band = $group->add($_POST['name']);
		if ($band) {
			html_display('messages/005.txt', array('key'=>'Grupo' ,'name'=> $_POST['name']));
		}
		else {	
			html_display('messages/006.txt', array('key'=>'Grupo' ,'name'=> $_POST['name']));
		}
	}
	
}
else {
	html_display('denied-access.txt');
}


html_display('footer.txt');
?>
