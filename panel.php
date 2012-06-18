<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/config.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');


html_display('header.txt', 'TITLE', 'Panel de Control');

html_format('Usuarios - Panel Control', 'h1', 'style="margin-bottom: 10px"'); //titulo
//html_display('users/menu.txt'); //dibujar menu
display_menu(); 



html_display('footer.txt');
?>
