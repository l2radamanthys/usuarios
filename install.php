<?php
include_once('libs/config.php');
include_once('libs/template-manager.php');

html_display('header.txt', 'TITLE', 'Instalacion');
html_format('Instalacion del Modulo Usuarios', 'h1', 'style="margin-bottom: 10px"'); //titulo

tbr(3);

if(!isset($_POST['db_name'])) {
	html_display('install/header.txt');
}

else {
	
}

tbr(3);

html_display('footer.txt');
?>
