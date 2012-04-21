<?php

/*
 * Manejador de Secciones de Usuarios
 * CopyRight (C) CO2Soft - Ricardo D. Quiroga
 * http://www.co2soft.com.ar
 * 
 * Requiere:
 * 		Sessiones
 *  	db_conector.php
 */ 


class Session {
	function login($user, $pswd) {
        /* Funcion que loguea un usuario en caso de no estar logueado
         *
         * @param string $user: nombre de usuario
         * @param string $pswd: contrasenia usuario
		 * 
		 * @return integer: 0 - error usuario/contraseña / 1 - login correcto / 2 - ya se encuentra logueado		
		 */ 
		if (isset($_SESSION['usuario'])) {
			/* en caso de sea el mismo usuario logueado */
			if ($_SESSION['usuario'] == md5($user)) {
				return 2;
			}
		}
		
		if ($user != NULL && $pswd != NULL) {
			//$user = stripslashes($user);
			$user = mysql_real_escape_string($user); 
            //$pswd = stripslashes($pswd);
            $pswd = mysql_real_escape_string($pswd); 
            
            $conn = db_conect();
            $query = "SELECT * FROM Users WHERE username='$user' AND password='$pswd'";
            $result = mysql_query($query, $cursor);
            $count = mysql_num_rows($result);
            if ($count == 1) {
				$reg = mysql_fetch_assoc($result);
                $_SESSION['usuario'] = md5($reg["username"]);
                return 1;
			}
			else {
				return 0;
			}
		}
	}
	
	
	function logout() {
		/*
        desconectar borra los datos de la session
        */
        session_unset();
        $_SESSION = array();
        session_destroy();
    }
