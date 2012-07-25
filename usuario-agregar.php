<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/config.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');
include_once('libs/groups.php');


$user = new Session();
html_display('header.txt', 'TITLE', 'Agregar Usuario');
display_menu($user);  //dibujar menu


if ($user->is_have_access()) {
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
		
		print_r($_POST);
		
		$user = new Users();
		$user->add($_POST['username'], $_POST['password1'], $_POST['email'], $_POST['group_id'], 0);
		
		html_display('messages/005.txt', array('key'=>'Usuario', 'name'=>$_POST['username']));
	}
}
else {
	html_display('messages/010.txt');
}

html_display('footer.txt');
?>
