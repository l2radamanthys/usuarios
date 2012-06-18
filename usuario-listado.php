<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/config.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');

$user = new Session();
html_display('header.txt', 'TITLE', 'Listado de Usuarios');
html_format('Usuarios - Users', 'h1', 'style="margin-bottom: 10px"'); //titulo
display_menu($user);  //dibujar menu
tbr(2);

if ($user->is_have_access()) {
	
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
}
else {
	html_display('messages/010.txt');
}

html_display('footer.txt');
?>
