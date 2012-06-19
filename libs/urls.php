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
$URLS = array(
    //'URL' => 'URL_CODE',
    
    '/usuarios/panel.php' => 'LOGIN', /**/
    
    /** Permisos para Usuarios **/
    '/usuarios/usuario-agregar.php' => 'USER_ADD',
    '/usuarios/usuario-listado.php' => 'USER_LIST',
    '/usuarios/usuario-borrar.php' => 'USER_DEL',
    '/usuarios/usuario-modificar.php' => 'USER_EDIT',
    '/usuarios/mostrar-mis-datos.php' => 'USER_MI_INFO',
    
    
    /** Permisos para Aplicaciones **/
    '/usuarios/applicaciones-agregar.php' => 'APP_ADD',
    '/usuarios/applicaciones-listado.php' => 'APP_LIST',
    '/usuarios/applicaciones-modificar.php' => 'APP_EDIT',
    '/usuarios/applicaciones-borrar.php' => 'APP_DEL',
    
    /** Permisos para Grupos **/
    '/usuarios/grupo-agregar.php' => 'GROUP_ADD',
    '/usuarios/grupo-listado.php' => 'GROUP_LIST',
    '/usuarios/grupo-modificar-permisos.php' => 'GROUP_APP_EDT',
    
    
    '/usuarios/test-access.php' => 'USER_TEST',   /*para prueba de acceso*/
    
);


//path de la aplicacion principal
$APP_PATH = "/usuarios/";


function get_path_code($url) {
    global $URLS;
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
