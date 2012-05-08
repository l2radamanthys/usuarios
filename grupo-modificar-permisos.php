<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template.php');

include_once('libs/groups.php');
include_once('libs/applications.php');
include_once('libs/app-for-group.php');

draw_header("Modificar Permisos Grupo");
format("Modificar Permisos Grupo", "h1", 'style="margin-bottom: 10px"'); //titulo
display('users/menu.txt'); //dibujar menu


//si no se envio datos por post
if (!isset($_POST['query'])) {
	display('users/edit-app-group-tbl-header-01.txt');
	
	$group = new Groups();
	$result = $group->all();
	
	while ($reg = mysql_fetch_assoc($result)) {
		format($reg['name'], 'option', 'value="'.$reg['id'].'"');
	}
	display('users/edit-app-group-tbl-footer-01.txt');
}

//se seleciono el grupo
elseif ($_POST['query'] == 'group') {
	
	display('users/edit-app-group-tbl-header-02.txt');

	$conn = db_connect();
	$query = "SELECT * FROM Applications AS App WHERE EXISTS (SELECT * FROM AppGroups WHERE AppGroups.Applications_id = App.id AND AppGroups.id = "."1".")";
	$result = mysql_query($query, $conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
	
	while ($reg = mysql_fetch_assoc($result)) {
		format('', 'tr', '', False);
		format('<input type="checkbox" name="'.$reg['id'].'" value="'.$reg['name'].'" checked>', 'td');
		format('<label>'.$reg['name'].'</label>', 'td');
		end_tag('tr');
	}

	$query = "SELECT * FROM Applications AS App WHERE NOT EXISTS (SELECT * FROM AppGroups WHERE AppGroups.Applications_id = App.id AND AppGroups.id = "."1".")";
	$result = mysql_query($query, $conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
	
	while ($reg = mysql_fetch_assoc($result)) {
		format('', 'tr', '', False);
		format('<input type="checkbox" name="'.$reg['id'].'" value="'.$reg['name'].'" >', 'td');
		format('<label>'.$reg['name'].'</label>', 'td');
		end_tag('tr');
	}
	display('users/edit-app-group-tbl-footer-02.txt', array('id' => $_POST['group_id']));
	
	
}

//selecionado el grupo se selecionaron permisso
elseif ($_POST['query'] == 'application') {
	
	$app_group = new AppForGroup();
	$list = "(";
	foreach($_POST as $key => $value) {
		if (is_numeric($key)) {
			$app_group->add($key, $_POST['group_id']);
			$list .= $key.", ";
			
			//echo "<p> -> ".$key."</p>";
			/*if ($app_group->add($key, $_POST['group_id'])) {
				echo "<p>Permiso: <strong>".$value."</strong> Agregado</p>";
			}
			else {
				echo "<p>Permiso: <strong>".$value."</strong> Ya Existe</p>";
			}*/
		}
	}
	$list .= "0)";
	$app_group->delete_($list);
	display('messages/009.txt');
	
}




draw_footer();
?>
