<?php



function draw_header($title="Usuarios") {
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"';
	echo '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
	echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">';

	echo '<head>';
	echo '<title>'.$title.'</title>';
	echo '<meta http-equiv="content-type" content="text/html;charset=utf-8" />';
	echo '<link rel="stylesheet" type="text/css" href="css/style.css" />';
	echo '</head>';
	
	echo '<body>';
	echo '<div align="center">';
	echo '<div class="cuerpo">';
}


function draw_footer() {
	echo '</div>';
	echo '</div>';
	echo '</body>';
}

?>
