<?php

class Users {
	var $conn;
	
	
	function Users() {
		$this->conn = db_connect();	
	}
	
	
	function get($username) {
		$query = "SELECT username, password, first_name, last_name, email, name as `group` FROM Users INNER JOIN Groups ON Users.Groups_id = Groups.id WHERE username = '".$username."'";
		$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
		$row = mysql_fetch_array($result);
		return $row;		
	}
	
	
	function all() {
		$query = "SELECT username, password, first_name, last_name, email, name as `group` FROM Users INNER JOIN Groups ON Users.Groups_id = Groups.id";
		$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");	
		return $result;
	} 
	
	
	function add($user, $pwd, $nombre, $apellido, $email, $group, $active=False) {
		$query = "INSERT INTO users (id, username, password, first_name, last_name, is_active, email, Groups_id) VALUE ";
		$query .= "(NULL, '".$user."', '".$pwd."', '".$nombre."', '".$apellido."', ".$active.", '".$email."', ".$group.")";
		//echo $query;
		$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");	
	}
	
	
	function group($username) {
		$query = "SELECT Groups.id, Groups.name FROM Users INNER JOIN Groups ON Users.Groups_id = Groups.id WHERE username = '".$username."'";
		$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
		$row = mysql_fetch_array($result);
		return $row;
	}
	
	
}
	


?>
