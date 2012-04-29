<?php
include('libs/template.php');
draw_header("hola");

/* Init Code */
include_once("session.php");

$APP_CODE = "APP-TEST";

$user = new Session();
$access = $user->validate_access("admin", $APP_CODE);



/* End Code */

draw_footer();
?>
