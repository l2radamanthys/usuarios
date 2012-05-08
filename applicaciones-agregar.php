<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template.php');

include_once('libs/applications.php');

draw_header("Agregar Aplicacion");

format("Usuarios - Aplicaciones", "h1", 'style="margin-bottom: 10px"'); //titulo
display('users/menu.txt'); //dibujar menu

//echo $_SERVER['SCRIPT_NAME'];

if (1) {
	display('users/nuevo-permiso.txt');
	
	if (isset($_POST['name'])) {
		$app = new Application();
		if($app->add($_POST['name'], $_POST['code'], $_POST['description'])) {
			display('messages/005.txt', array('key' => 'Aplicacion', 'name' => $_POST['name']));
		}
		else {
			display('messages/005.txt', array('key' => 'Aplicacion', 'name' => $_POST['name']));
		}
		
		
	}
	
}
else {
	display('denied-access.txt');
}



draw_footer();
?>
