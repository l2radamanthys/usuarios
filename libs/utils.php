<?php

/*
 * Sencillo Sistema de Plantillas, para PHP 
 * 
 */ 

$TEMPLATE_PATH = 'templates/';



function post_info() {
	echo '<p> $_POST INFO: </p>';
	foreach($_POST as $key => $value) {
		echo '<p>'.$key.' -> '.$value.'</p>';
	}
}





?>
