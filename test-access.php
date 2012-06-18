<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template-manager.php');



html_display('header.txt', 'TITLE', 'Test de Acceso');

/* Init Code */

$user = new Session();

//if($user->login_username() == NULL) {
//	echo "NULL"."<br />";
//}
//else {
//	echo $user->login_username()."<br />";
//}
//echo $_SERVER['SCRIPT_NAME'].' -> '.$app_code.' <br>'; //nombre archivo donde se ejecuta mas adelante modifico y su codigo
//echo $app_code."<br />";
//$app_code = get_path_code($_SERVER['SCRIPT_NAME']); //Obtenemos el codigo de la Aplicacion
//$access = $user->validate_access($app_code); //confirmamos con la BD

if ($user->is_have_access()) {
    echo "si tiene permiso";
    
}
else {
	html_display('messages/010.txt');
}


/* End Code */

html_display('footer.txt');
?>
