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

$DEBUG = True;  //muestra los mensajes para de debug


class Session {
	
	/* Funcion que loguea un usuario en caso de no estar logueado
     *
     * @param string $user: nombre de usuario
     * @param string $pswd: contrasenia usuario
	 * 
	 * @return integer: 0 - error usuario/contraseña / 1 - login correcto / 2 - ya se encuentra logueado		
	 */ 
	function login($user, $pswd) {
        
		//if (isset($_SESSION['usuario'])) {
		//	/* en caso de sea el mismo usuario logueado */
		//	if ($_SESSION['usuario'] == $user) {
		//		return 2;
		//	}
		//}
		
		if ($user != NULL && $pswd != NULL) {
			//$user = stripslashes($user);
			$user = mysql_real_escape_string($user); 
            //$pswd = stripslashes($pswd);
            $pswd = mysql_real_escape_string($pswd); 
            
            $conn = db_connect();
            $query = "SELECT * FROM Users WHERE username='$user' AND password='$pswd'";
            $result = mysql_query($query, $conn);
            $count = mysql_num_rows($result);
            if ($count == 1) {
				$reg = mysql_fetch_assoc($result);
                $_SESSION['usuario'] = $reg["username"];
                return 1;
			}
			else {
				return 0;
			}
		}
	}

	
	/*
	 * Retorna el nombre de usuario del que se encuentra logueado actualmente
	 * caso contrario retorna una cadena vacia
	 */ 
	function login_username() {
		global $DEBUG;
		if (isset($_SESSION['usuario'])) {
			return $_SESSION['usuario'];
		}
		else {
			if ($DEBUG) {
				'<p style="color: #D94600">USERNAME = NULL</p>';
			}
			return '';
		}
	}
	
	
	/*
	 * Permite validar el acceso a una determinada area de un sitio
	 * 
	 * @param string $app_code codigo del sitio
	 * 
	 * @return int
	 * 		0 - pagina sin permiso definido
	 * 		1 - tiene permiso
	 * 		2 - no tiene permisos
	 * 		3 - no logueado
	 * 
	 */ 
	function validate_access($app_code) {
        //entrara aqui cuando a la aplicacion no se le haya definido un codigo de seguridad para permisos
		global $DEBUG;
        if ($app_code == 'NO_CODE') {
			if ($DEBUG) {
				echo '<p style="color: #D94600">ALERTA: ESTA PAGINA NO TIENE PERMISOS ASIGNADO</p>';
				echo '<p style="color: #D94600">CODIGO APLICACION: '.$app_code.'</p>';
			}
            return 0;
        }
        
        else {
			//si no esta conectado 
			$username = $this->login_username();
			if ($username != '') {
				$query = "SELECT Users.username, App.name, App.code FROM Users INNER JOIN (Groups INNER JOIN (Applications AS App ";
				$query .= "INNER JOIN AplicationsForGroups AS AppGroup ON App.id = AppGroup.Applications_id) ON Groups.id = AppGroup.groups_id) ON Groups.id = Users.groups_id ";
				$query .= "WHERE Users.username = '".$username."' AND App.code = '".$app_code."'";
			
			
				$conn = db_connect();
				$result = mysql_query($query, $conn) or die("Error ".$query." <br/><br/> MySQL dice: ".mysql_error());
				$count = mysql_num_rows($result); //mysql_result($result, 0); 
				if ($count == 1) {
					return 1;
				}
				else {
					return 2;
				}
			}
			else {
				if ($DEBUG) {
					echo '<p style="color: #D94600">USUARIO: '.$username.'</p>';
					echo '<p style="color: #D94600">CODIGO APLICACION: '.$app_code.'</p>';
				}
				return 3;
			}	
		}
	}
	
	
	/*
	 * Permite verificar si el usuario tiene acceso
	 * 
	 * @return boolean retorna un valor booleano de si tiene acceso 
	 * o no al sitio.
	 */ 
	function is_have_access() {
		$app_code = get_path_code($_SERVER['SCRIPT_NAME']);
		if ($this->validate_access($app_code) < 2) {
			return True;
		}
		else {
			return False;
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
}
