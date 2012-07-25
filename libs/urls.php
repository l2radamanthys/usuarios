<?php

/*
 * Configuracion de las URL para gestion de permisos del Modulo Usuarios
 * listado de URLs y sus codigo de aplicacion, solo se definen codigos, 
 * de Aplicacion, para las urls que mantienen algun sistema de permiso
 * las mismas deben ser definidas en este dicionario y en la Base de Datos
 */
 
 
/*
 * Listado de urls y permisos requeridos 
 */
 
 $URL_PAHT = '/proyectos/Tutos';
 $URL_DEBUG = True;
 
$URLS = array(
    //'URL' => 'URL_CODE',
    
    $URL_PAHT.'/usuarios/panel.php' => 'LOGIN', /**/
    
    /** Permisos para Usuarios **/
    $URL_PAHT.'/usuarios/usuario-agregar.php' => 'USER_ADD',
    $URL_PAHT.'/usuarios/usuario-listado.php' => 'USER_LIST',
    $URL_PAHT.'/usuarios/usuario-borrar.php' => 'USER_DEL',
    $URL_PAHT.'/usuarios/usuario-modificar.php' => 'USER_EDIT',
    $URL_PAHT.'/usuarios/mostrar-mis-datos.php' => 'USER_MI_INFO',
    
    
    /** Permisos para Aplicaciones **/
    $URL_PAHT.'/usuarios/applicaciones-agregar.php' => 'APP_ADD',
    $URL_PAHT.'/usuarios/applicaciones-listado.php' => 'APP_LIST',
    $URL_PAHT.'/usuarios/applicaciones-modificar.php' => 'APP_EDIT',
    $URL_PAHT.'/usuarios/applicaciones-borrar.php' => 'APP_DEL',
    
    /** Permisos para Grupos **/
    $URL_PAHT.'/usuarios/grupo-agregar.php' => 'GROUP_ADD',
    $URL_PAHT.'/usuarios/grupo-listado.php' => 'GROUP_LIST',
    $URL_PAHT.'/usuarios/grupo-modificar-permisos.php' => 'GROUP_APP_EDT',
    
    
    $URL_PAHT.'/usuarios/test-access.php' => 'USER_TEST',   /*para prueba de acceso*/
    
);


//path de la aplicacion principal
$APP_PATH = "/usuarios/";


function get_path_code($url) {
    global $URLS, $URL_DEBUG;
    if ($URL_DEBUG) {
		echo '<p style="color: #D94600">URL APLICACION: '.$url.'</p>';
	}
    if(isset($URLS[$url])) {
        return $URLS[$url];
    }
    
    else {
        echo '<p style="color: #D94600">URL APLICACION: '.$url.'</p>';
        return 'NO_CODE';
    }
}

function get_file_code() {
	
}

?>
