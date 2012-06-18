<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');
include_once('libs/groups.php');


html_display('header.txt', 'TITLE', 'Agregar Usuario');
html_format("Usuarios", "h1", 'style="margin-bottom: 10px"'); //titulo
html_display('users/menu.txt'); //dibujar menu


if (1) {
	html_display('users/nuevo-usuario-top.txt');
	
	$group = new Groups();
	$result = $group->all();
	html_format('','select','name="group_id" class="edt_mc"',False);
	while ($reg = mysql_fetch_assoc($result)) {
		html_format($reg['name'],'option','value="'.$reg['id'].'"');
	}
	tend('select');
	html_display('users/nuevo-usuario-bottom.txt');
	
	
	if (isset($_POST['username'])) {
		$user = new Users();
		$user->add($_POST['username'], $_POST['password1'], $_POST['first-name'], $_POST['last-name'], $_POST['email'], $_POST['group_id'], 0);
		
		echo "Usuario Agregado";
	
		
	}
	
}
else {
	html_display('denied-access.txt');
}



html_display('footer.txt');
?>
