<?php

//configuracion de variables para el Modulo Usuarios

//listado de URLs y sus codigo de aplicacion, solo se definen codigos, de Aplicacion, para las urls que mantienen algun sistema de permiso
//las mismas deben ser definidas en este dicionario y en la Base de Datos
$URLS = array(
    //'URL' => 'URL_CODE',
    '/usuarios/panel.php' => 'LOGIN',
    '/usuarios/usuarios-modificar.php' => 'USER_EDIT',
    '/usuarios/usuarios-borrar.php' => 'USER_ADD',
    '/usuarios/usuarios-crear.php' => 'USER_DEL',
    '/usuarios/test-access.php' => 'USER-TEST',
);

function get_path_code($url) {
    global $URLS;
    if(isset($URLS[$url])) {
        return $URLS[$url];
    }
    
    else {
        return 'NO_CODE';
    }
    
}

function get_file_code() {
    
}

?>
