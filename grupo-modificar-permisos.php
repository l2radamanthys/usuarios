<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/config.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');
include_once('libs/groups.php');
include_once('libs/applications.php');
include_once('libs/app-for-group.php');


$user = new Session();
html_display('header.txt', 'TITLE', 'Modificar Permisos Grupo');
html_format("Usuarios - Grupos", "h1", 'style="margin-bottom: 10px"'); //titulo
display_menu($user);  //dibujar menu


//si no se envio datos por post
if ($user->is_have_access()) {
	if (!isset($_POST['query'])) {
		html_display('users/edit-app-group-tbl-header-01.txt');
	
		$group = new Groups();
		$result = $group->all();
	
		while ($reg = mysql_fetch_assoc($result)) {
			html_format($reg['name'], 'option', 'value="'.$reg['id'].'"');
		}
		html_display('users/edit-app-group-tbl-footer-01.txt');
	}

	//se seleciono el grupo
	elseif ($_POST['query'] == 'group') {
		html_display('users/edit-app-group-tbl-header-02.txt');

		$group_id = $_POST['group_id'];
		//echo "Grupo ID: ".$_POST['group_id'];
		$conn = db_connect();
		$query = "SELECT * FROM Applications AS App WHERE EXISTS (SELECT * FROM AppGroups WHERE AppGroups.Applications_id = App.id AND AppGroups.id = ".$group_id.")";
		$result = mysql_query($query, $conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
	
		while ($reg = mysql_fetch_assoc($result)) {
			html_format('', 'tr', '', False);
			html_format('<input type="checkbox" name="'.$reg['id'].'" value="'.$reg['name'].'" checked>', 'td');
			html_format('<label>'.$reg['name'].'</label>', 'td');
			tend('tr');
		}

		$query = "SELECT * FROM Applications AS App WHERE NOT EXISTS (SELECT * FROM AppGroups WHERE AppGroups.Applications_id = App.id AND AppGroups.id = ".$group_id.")";
		$result = mysql_query($query, $conn) or die("<p style='color:#F00;'>Error ".$query." <br/><br/> MySQL dice: ".mysql_error()."</p>");
	
		while ($reg = mysql_fetch_assoc($result)) {
			html_format('', 'tr', '', False);
			html_format('<input type="checkbox" name="'.$reg['id'].'" value="'.$reg['name'].'" >', 'td');
			html_format('<label>'.$reg['name'].'</label>', 'td');
			tend('tr');
		}
		html_display('users/edit-app-group-tbl-footer-02.txt','id', $_POST['group_id']);
	}

	//selecionado el grupo se selecionaron permisso
	elseif ($_POST['query'] == 'application') {
		//echo "Grupo ID: ".$_POST['group_id'];
		$app_group = new AppForGroup();
		$list = "(";
		foreach($_POST as $key => $value) {
			if (is_numeric($key)) {
				$app_group->add($key, $_POST['group_id']);
				$list .= $key.", ";
			}
		}
		$list .= "0)";
		$app_group->delete_($list, $_POST['group_id']);
		html_display('messages/009.txt');
	}
}

else {
	html_display('messages/010.txt');
}

html_display('footer.txt');
?>
