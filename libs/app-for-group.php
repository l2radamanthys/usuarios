<?php

class AppForGroup {
	var $conn;
	
	
	function AppForGroup() {
		$this->conn = db_connect();	
	}
	
	
	function exist($id) {
		$query = "SELECT COUNT(*) FROM AplicationsForGroups WHERE id=".$id;
		$result = mysql_query($query, $this->conn) or die("Error ".$query." <br/><br/> MySQL dice: ".mysql_error());
        $count = mysql_result($result, 0); 
        if ($count == 1) {
            return True;
        }
        else {
            return False;
        }
	}
	
	
	function add($app_id, $group_id) {
		if (!$this->exist($app_id)) {
			$query = "INSERT INTO AplicationsForGroups (`id`,`Applications_id`,`Groups_id`) VALUES (NULL ,".$app_id." ,".$group_id.")";
			mysql_query($query, $this->conn) or die("Error ".$query." <br/><br/> MySQL dice: ".mysql_error());
			return True;
		}
		else {
			return False;
		}
		
	}
	
	
	function all() {
		$query = "SELECT * FROM aplicationsforgroup";
		$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
		return $result;
	}
	
	
	function for_group($id) {
		$query = "SELECT * FROM aplicationsforgroup WHERE group_id=".$id;
		$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
		
		$list = array();
		while($row = mysql_fetch_assoc($result)){
			$list[] = $result['Applications_id'];
		}
		$list;
	}


	function delete_($list) {
		$query = "DELETE FROM AplicationsForGroups WHERE Groups_id = 1 AND Applications_id NOT IN ".$list;
		mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
		return True;
	}
	
	
}
	


?>