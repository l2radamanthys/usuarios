<?php

/*
 * Sencillo Sistema de Plantillas, para PHP 
 * 
 */ 


$TEMPLATE_PATH = 'templates/';



function draw_header($title="Usuarios") {
	display('header.txt', array('TITLE' => $title));
}


function draw_footer() {
	display('footer.txt');
}


function draw_block($file) {
	global $TEMPLATE_PATH;
	$content = file_get_contents($TEMPLATE_PATH.$file);
	echo $content;
	
}


/*
 * Renplaza los TAGS por los valores que sean pasado en el diccionario 
 */ 
function drawn_and_assign($file, $dict) {
	global $TEMPLATE_PATH;
	$content = file_get_contents($TEMPLATE_PATH.$file);
	foreach ($dict as $key => $value) {
		$content = preg_replace('/<#'.$key.'#>/', $value, $content);
		//echo '/[$'.$key.'$] -> '.$value;
	}
	echo $content;
}


/*
 * Funcion para para cargar y dibujar plantillas 
 */ 
function display($file, $dict=NULL) {
	if ($dict == NULL) {
		draw_block($file);	
	}
	else {
		drawn_and_assign($file, $dict);
	}
}


/*
 * Formatea un texto para dejar un salida HTML
 * por ejemplo
 * 
 * >> format('hola mundo', 'h1', 'class="title"')
 * imprimira en el documento:
 * <h1 class="title">hola mundo</h1>
 * 
 */ 
function format($text="", $key="p", $argv="", $end_tag=True) {
	if ($end_tag) {
		$cad = "<".$key." $argv>".$text."</".$key.">\n";
	}
	else {
		$cad = "<".$key." $argv>".$text."\n";
	}
	echo $cad;
}


function end_tag($key) {
	echo "</".$key.">\n";
}


/*
 * Para dibujar varios saltos de lineas
 */ 
function br_tag($num=1) {
	for ($i=1; $i < $num; $i++) {
		echo '<br />';
	}

}

//function format_ini($text)




?>
