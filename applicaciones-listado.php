<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template-manager.php');

include_once('libs/applications.php');


html_display('header.txt', 'TITLE', 'Listado de Aplicaciones');
html_format("Usuarios - Aplicaciones", "h1", 'style="margin-bottom: 10px"'); //titulo
html_display('users/menu.txt'); //dibujar menu

tbr(2);

$app = new Application();
$result = $app->all();

$labels = array(
	'id'=>'Id',
	'name' => 'Nombre',
	'code' => 'Codigo Aplicacion',
	'descripcion' => 'Descripcion'
);

html_display_sql($result, $labels, 'Listado de Aplicaciones', 'tbl-list', '', 'style="width: 680px;"');

html_display('footer.txt');
?>
