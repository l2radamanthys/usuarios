<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/config.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');
include_once('libs/applications.php');


$user = new Session();
html_display('header.txt', 'TITLE', 'Listado de Aplicaciones');
html_format("Usuarios - Aplicaciones", "h1", 'style="margin-bottom: 10px"'); //titulo
display_menu($user);  //dibujar menu
tbr(2);

if ($user->is_have_access()) {
	$app = new Application();
	$result = $app->all();

	$labels = array(
		//'id'=>'Id',
		'code' => 'Codigo Aplicacion',
		'name' => 'Nombre',
		'descripcion' => 'Descripcion'
	);
	html_display_sql($result, $labels, 'Listado de Aplicaciones', 'tbl-list', '', 'style="width: 680px;"');
}

else {
	html_display('messages/010.txt');
}


html_display('footer.txt');
?>
