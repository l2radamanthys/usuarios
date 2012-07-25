<?php


/*
 * Genera un Cbox con la lista de paises
 *  
 * @param string $name nombre del elemento
 * @param string $css nombre de clase para hoja de estilo
 * 
 */ 
function cbox_paises($name="pais", $css="", $id="") {
	$conn = db_connect();
	$query = "SELECT pais_nombre FROM Paises";
	$result = mysql_query($query, $conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");	
	$text = '<select name="'.$name.'" class="'.$css.'" id="'.$id.'">';
	while($row = mysql_fetch_array($result)) {
		$text .= '<option value="'.$row['pais_nombre'].'">'.htmlentities($row['pais_nombre']).'</option>';
	}
	$text .= '</select>';
	return $text;
}



?>
