<?php

class Groups {
	var $conn;
	
	
	function Groups() {
		$this->conn = db_connect();	
	}
	
	
	/*
	 * Comprobar si existe un grupo con ese nombre
	 * 
	 * @param string $name //nombre del grupo
	 * 
	 * @return boolean 
	 */ 
	function exist($code) {
		$query = "SELECT COUNT(*) FROM Applications WHERE code='".$code."'";
		$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");	
        $count = mysql_num_rows($result);
        if ($count >= 1) {
            return True;
        }
        else {
            return False;
        }
	}
	
	
	
	function get_name($id) {
		$query = "SELECT name";
	}
	
	
	function add($name=NULL) {
		if ($name == NULL) {
			return False;
		}
		
		elseif (!$this->exist($name)) {
			$query = "INSERT INTO `groups` (`id`, `name`) VALUES (NULL , '". $name. "')";
			mysql_query($query, $this->conn) or die("Error ".$query." <br/><br/> MySQL dice: ".mysql_error());
			return True;
		}
		
		else {
			return False;
		}
	}
	
	function all() {
		$query = "SELECT * FROM Groups";
		$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
		return $result;
	}
	
	
}
	


?>
