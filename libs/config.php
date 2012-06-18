<?php

/*
 * Archivo de Configuracion
 * 
 */ 

//plantillas de menu dependiendo el tipo de usuario
$USER_MENU_TPL = array(
	'default' => 'users/default-menu.txt',
	'Usuarios' => 'users/users-menu.txt',
	'Admins' => 'users/admin-menu.txt',
);


/*
 * Retorna el menu dependiendo el tipo de usuario
 * 
 * requiere que se incluyan las siguientes librerias PHP:
 * - users.php
 * - session.php
 * 
 * @param string $group_name nombre del grupo al que pertenece el usuario
 * 
 */ 
function display_menu() {
	global $USER_MENU_TPL;
		
	if (isset($_SESSION['usuario'])) {
		$username = $_SESSION['usuario'];
		
		$user = new Users();
		$group = $user->group($username);
		echo $group['name']."--";
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
