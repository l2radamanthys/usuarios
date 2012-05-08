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
	
}
	


?>
