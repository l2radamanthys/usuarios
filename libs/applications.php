<?php

class Application {
	var $conn;
	
	
	function Application() {
		$this->conn = db_connect();	
	}
	
	
	function add($name, $code, $desc) {
		$query = "INSERT INTO `Applications`(`id`,`name`,`code`,`descripcion`) VALUES (NULL ,'".$name."' ,'".$code."' , '".$desc."')";
		mysql_query($query, $this->conn) or die("Error ".$query." <br/><br/> MySQL dice: ".mysql_error());
		return True;
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
