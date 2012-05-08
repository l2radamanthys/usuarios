<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template.php');

include_once('libs/groups.php');

draw_header("Agregar Grupo");


format("Usuarios - Grupos", "h1", 'style="margin-bottom: 10px"'); //titulo
display('users/menu.txt'); //dibujar menu

if (1) {
	display('users/nuevo-grupo.txt');
	
	if (isset($_POST['name'])) {
		$group = new Groups();
		$band = $group->add($_POST['name']);
		if ($band) {
			display('messages/005.txt', array('key'=>'Grupo' ,'name'=> $_POST['name']));
		}
		else {	
			display('messages/006.txt', array('key'=>'Grupo' ,'name'=> $_POST['name']));
		}
	}
	
}
else {
	display('denied-access.txt');
}



draw_footer();
?>
