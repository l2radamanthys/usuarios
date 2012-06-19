<?php

class Application {
	var $conn;
	
	
	function Application() {
		$this->conn = db_connect();	
	}
	
	
	/*
	 * Comprobar si existe una aplicacion con ese codigo
	 * 
	 * @param string $name //nombre del grupo
	 * 
	 * @return boolean 
	 */ 
	function exist($name) {
		$query = "SELECT COUNT(*) FROM Groups WHERE name='".$name."'";
		$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
        $count = mysql_num_rows($result); 
        if ($count >= 1) {
            return True;
        }
        else {
            return False;
       }
    }
    
    
	function add($name, $code, $desc) {
		if (!$this->exist($code)) {
			$query = "INSERT INTO `Applications`(`id`,`name`,`code`,`descripcion`) VALUES (NULL ,'".$name."' ,'".$code."' , '".$desc."')";
			$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
			return True;
		}
		else {
			return False;
		}
	}
	
	
	function all() {
		$query = "SELECT * FROM Applications ORDER BY code";
		$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
		return $result;
	}
	
	
	function delete($name) {
		
	}
	
	
}
	


?>
