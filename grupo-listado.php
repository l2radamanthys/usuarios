<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template.php');

include_once('libs/groups.php');

draw_header("Listado de Grupos");
format("Usuarios - Grupos", "h1", 'style="margin-bottom: 10px"'); //titulo
display('users/menu.txt'); //dibujar menu

br_tag(2);
format("Listado Grupos", "h2"); //titulo

$group = new Groups();

echo '<br />';
echo '<table width="500px" cellspacing="5px;" class="tbl-list" style="margin: 0 auto;">';
echo '<tr>';
echo '<th>Id</th>';
echo '<th>Nombre Grupo</th>';
echo '</tr>';

$result = $group->all();
while ($reg = mysql_fetch_assoc($result)) {
	echo '<tr>';
	echo '<td>'.$reg['id'].'</td>';
	echo '<td>'.$reg['name'].'</td>';
	echo '</tr>';
}

echo '</table>';

draw_footer();
?>
