<?php

/*
 * Conector basico, para establecer conecion con la Base de Datos
 * CopyRight (C) CO2Soft - Ricardo D. Quiroga
 * http://www.co2soft.com.ar
 */ 


$HOST = "127.0.0.1"; /* direcion del servidor */
$USER = "root"; /* nombre de usuario */
$PSWD = ""; /* Contraseña del usuario */
$NAME = "usuarios"  /* Nombre de la Base de Datos a usar */


 
function db_connect() {
	/*
	 * Extablece la conecion con la Base de Datos
	 */
	global $HOST, $USER, $PSWD, $NAME;
	
	if (!$link = mysql_connect($HOST, $USER, $PSWD)) {
        echo "<p class='msj_error'>Error: Fallo la conecion a la BD</p>";
        exit();
    }
	
	 if (!mysql_select_db($NAME, $link)) { 
        echo "<p class='msj_error'>Error No existe las DB: ".$NAME."</p>"; 
        exit();
    }
    return $link;
}
?>
