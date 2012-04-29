<?php

function draw_header($title="Usuarios") {
	drawn_and_assign('templates/header.txt', array('TITLE' => $title));
	//draw_block('templates/header-sup.txt');
	//echo '<title>'.$title.'</title>';
	//draw_block('templates/header-inf.txt');
}


function draw_footer() {
	draw_block('templates/footer.txt');
}


function draw_block($file) {
	//$buffer = file($file);
	//foreach($buffer as $line) {
	//	echo $line."\n";
	//}
	$content = file_get_contents($file);
	echo $content;
	
}


function drawn_and_assign($file, $dict) {
	$content = file_get_contents($file);
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



?>
