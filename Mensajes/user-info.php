<?php

/*
 * Extencion de la tabla usuarios para almacenar informacion referentes a los
 * datos personales de los mismos
 */

//nombre de la tabla en la base de datos
$USER_INFO_TBL_NAME = 'DatosPersonales';


class UserInfo {
    var $conn;
    var $tbl_name;


    function UserInfo() {
        global $USER_INFO_TBL_NAME;
        $this->conn = db_connect();
        $this->tbl_name = $USER_INFO_TBL_NAME
    }


    function exist($username) {
        $query = "SELECT * FROM ".$this->tbl_name." WHERE fk_Users_username='".$username."'";
        $result = mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
        $count = mysql_num_rows($result);
        if ($count >= 1) {
            return True;
        }
        else {
            return False;
        }
    }


    function add($username, $first_name, $last_name, $address, $city, $state, $phone) {
        if(!$this->exist($username)) {
            $query = "INSERT INTO ".$this->tbl_name;
            $query .= "(`first_name`, `last_name`, `adress`, `city`, `state`, `phone`, `fk_Users_username`) VALUES ";
            $query .= "('".$first_name."', '".$last_name."', '".$address."', '".$city."', '".$state."', '".$phone."', '".$username."')";
            mysql_query($query, $this->conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
            return True;
        }
        else {
            return False;
        }
    }

}



?>
