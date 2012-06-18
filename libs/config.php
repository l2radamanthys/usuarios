<?php

/*
 * Archivo de Configuracion
 * 
 */ 

//plantillas de menu dependiendo el tipo de usuario
$USER_MENU_TPL = array(
	'default' => 'users/admin-menu.txt',
	//'Usuarios' => 'users/users-menu.txt',
	'Admins' => 'users/admin-menu.txt',
);


/*
 * Retorna el menu dependiendo el tipo de usuario
 * 
 * requiere que se incluyan las siguientes librerias PHP:
 * - users.php
 * - session.php
 * 
 * 
 * 
 */ 
function display_menu($user) {
	global $USER_MENU_TPL;
		
	if ($user->login_username() != '') {
		$username = $user->login_username();
		
		$user = new Users();
		$group = $user->group($username);
		//echo $group['name']."--";
		if (isset($USER_MENU_TPL[$group['name']])) {
			html_display($USER_MENU_TPL[$group['name']]);
		}
		
		//si no tiene menu definido usa el por defecto
		else {
			html_display($USER_MENU_TPL['default']);
		}
	}
	
	//si no esta registrado muestra el menu por defecto
	else {
		html_display($USER_MENU_TPL['default']);
	}
}


?>
