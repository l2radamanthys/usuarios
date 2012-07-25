<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/config.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');
include_once('libs/groups.php');


$user = new Session();
html_display('header.txt', 'TITLE', 'Listado de Grupos');
display_menu($user);  //dibujar menu
tbr(2);

if ($user->is_have_access()) {
	$group = new Groups();
	$result = $group->all();
	$labels = array('id'=>'Id', 'name' => 'Nombre');
	html_display_sql($result, $labels, 'Listado de Grupos', 'tbl-list', '', 'style="width: 400px;"');
}

else {
	html_display('messages/010.txt');
}

html_display('footer.txt');
?>
