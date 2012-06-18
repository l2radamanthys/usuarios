<?php
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');


html_display('header.txt', 'TITLE', 'Listado de Usuarios');

html_format('Usuarios - Users', 'h1', 'style="margin-bottom: 10px"'); //titulo
html_display('users/menu.txt'); //dibujar menu
tbr(2);

$users = new Users();
$result = $users->all();

$labels = array(
	'username' => 'Usuario',
	'first_name' => 'Nombre',
	'last_name' => 'Apellido',
	'email' => 'Email',
	'group' => 'Grupo'
);

html_display_sql($result, $labels, 'Listado de Usuarios', 'tbl-list', '', 'style="width: 700px;"');

html_display('footer.txt');
?>
