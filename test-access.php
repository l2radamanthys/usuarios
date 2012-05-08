<?php
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template.php');


draw_header("Agregar Usuario");

/* Init Code */


$user = new Session();
//echo $_SERVER['SCRIPT_NAME'].' -> '.$app_code.' <br>'; //nombre archivo donde se ejecuta mas adelante modifico y su codigo
$app_code = get_path_code($_SERVER['SCRIPT_NAME']); //Obtenemos el codigo de la Aplicacion
$access = $user->validate_access("Admin", $app_code); //confirmamos con la BD
if ($access) {
    echo "si tiene permiso";
}
else {
    echo "no tiene permiso";
}


/* End Code */

draw_footer();
?>
