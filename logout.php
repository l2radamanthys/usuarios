<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template-manager.php');


html_display('header.txt', 'TITLE', 'LogOut');
html_format('Usuarios - LogOut', 'h1', 'style="margin-bottom: 10px"'); //titulo

$mi_session = new Session();
$mi_session->logout();
html_display('messages/007.txt');


html_display('footer.txt');
?>
