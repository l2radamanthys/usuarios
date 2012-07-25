<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/config.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');
include_once('libs/applications.php');


$user = new Session();
html_display('header.txt', 'TITLE', 'Agregar Aplicacion');
//html_format('Usuarios - Aplicaciones', 'h1', 'style="margin-bottom: 10px"'); //titulo
display_menu($user);  //dibujar menu

//echo $_SERVER['SCRIPT_NAME'];

if ($user->is_have_access()) {
	html_display('users/nuevo-permiso.txt');
	
	if (isset($_POST['name'])) {
		$app = new Application();
		if($app->add($_POST['name'], $_POST['code'], $_POST['description'])) {
			html_display('messages/005.txt', array('key' => 'Aplicacion', 'name' => $_POST['name']));
		}
		else {
			html_display('messages/005.txt', array('key' => 'Aplicacion', 'name' => $_POST['name']));
		}
		
		
	}
	
}
else {
	html_display('messages/010.txt');
}


html_display('footer.txt');
?>
