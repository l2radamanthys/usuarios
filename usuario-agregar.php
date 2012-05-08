<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template.php');

include_once('libs/groups.php');


draw_header("Agregar Usuarios");
format("Usuarios", "h1", 'style="margin-bottom: 10px"'); //titulo
display('users/menu.txt'); //dibujar menu


if (1) {
	display('users/nuevo-usuario-top.txt');
	
	$group = new Groups();
	$result = $group->all();
	format('','select','name="group_id" class="edt_mc"',False);
	while ($reg = mysql_fetch_assoc($result)) {
		format($reg['name'],'option','value="'.$reg['id'].'"');
	}
	end_tag('select');
	
	display('users/nuevo-usuario-bottom.txt');
}
else {
	display('denied-access.txt');
}




draw_footer();
?>
