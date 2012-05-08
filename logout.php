<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template.php');

draw_header("Logout");
format("Usuarios - Logout", "h1", 'style="margin-bottom: 10px"'); //titulo
//display('templates/users/menu.txt'); //dibujar menu

$mi_session = new Session();
$mi_session->logout();
display('messages/007.txt');

draw_footer();
?>
