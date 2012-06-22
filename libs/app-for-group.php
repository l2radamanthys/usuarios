<?php

class AppForGroup {
	var $conn;
	
	
	function AppForGroup() {
		$this->conn = db_connect();	
	}
	
	
	function exist($app_id, $group_id) {
		$query = "SELECT * FROM AplicationsForGroups WHERE Applications_id=".$app_id." AND Groups_id=".$group_id;
		$result = mysql_query($query, $this->conn) or die("Error ".$query." <br/><br/> MySQL dice: ".mysql_error());
        $count = mysql_num_rows($result); 
        if ($count == 1) {
            return True;
        }
        else {
            return False;
        }
	}
	
	
	function add($app_id, $group_id) {
		if (!$this->exist($app_id, $group_id)) {
			$query = "INSERT INTO AplicationsForGroups (`id`,`Applications_id`,`Groups_id`) VALUES (NULL ,".$app_id." ,".$group_id.")";
			mysql_query($query, $this->conn) or die("Error ".$query." <br /><br /> MySQL dice: ".mysql_error());
			return True;
		}
		else {
			return False;
		}
		
	}
	
	
	function all() {
		$query = "SELECT * FROM aplicationsforgroup";
		$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br /><br /> MySQL dice: ".mysql_error()."</p>");
		return $result;
	}
	
	
	function for_group($id) {
		$query = "SELECT * FROM aplicationsforgroup WHERE group_id=".$id;
		$result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br /><br /> MySQL dice: ".mysql_error()."</p>");
		
		$list = array();
		while($row = mysql_fetch_assoc($result)){
			$list[] = $result['Applications_id'];
		}
		$list;
	}


	function delete_($list, $group_id=1) {
		$query = "DELETE FROM AplicationsForGroups WHERE Groups_id=".$group_id." AND Applications_id NOT IN ".$list;
		mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br /><br /> MySQL dice: ".mysql_error()."</p>");
		return True;
	}
	
	
}
	


?>
