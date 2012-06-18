<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template-manager.php');

include_once('libs/groups.php');


html_display('header.txt', 'TITLE', 'Listado de Grupos');

html_format('Usuarios - Grupos', 'h1', 'style="margin-bottom: 10px"'); //titulo
html_display('users/menu.txt'); //dibujar menu

tbr(2);

$group = new Groups();
$result = $group->all();


$labels = array(
	'id'=>'Id',
	'name' => 'Nombre'
);

html_display_sql($result, $labels, 'Listado de Grupos', 'tbl-list', '', 'style="width: 400px;"');


html_display('footer.txt');
?>
