<?php
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template-manager.php');


html_display('header.txt', 'TITLE', 'Page Title');
html_display('users/menu.txt'); //dibujar menu




html_display('footer.txt');
?>
