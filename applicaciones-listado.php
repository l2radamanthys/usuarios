<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/template.php');

include_once('libs/applications.php');

draw_header("Listado de Aplicaciones");
format("Usuarios - Aplicaciones", "h1", 'style="margin-bottom: 10px"'); //titulo
display('users/menu.txt'); //dibujar menu

br_tag(2);
format("Listado de Aplicacions", "h2"); //titulo

$app = new Application();

echo '<br />';
echo '<table width="680px" cellspacing="5px;" class="tbl-list" style="margin: 0 auto;">';
echo '<tr>';
//echo '<th>Id</th>';
echo '<th>Nombre Aplicacion</th>';
echo '<th>Codigo</th>';
echo '<th>Descripcion</th>';
echo '<th>Opciones</th>';
echo '</tr>';

$result = $app->all();
while ($reg = mysql_fetch_assoc($result)) {
	echo '<tr>';
	//echo '<td>'.$reg['id'].'</td>';
	echo '<td>'.$reg['name'].'</td>';
	echo '<td>'.$reg['code'].'</td>';
	echo '<td>'.$reg['descripcion'].'</td>';
	
	echo '<td align="center">';
	echo '<a href="applicaciones-modificar.php?id='.$reg['id'].'" title="Modificar"><img src="images/edit-ico.png"></a>&nbsp;';
	echo '<a href="applicaciones-borrar.php?id='.$reg['id'].'" title="Borrar"><img src="images/delete-ico.png"></a>';
	echo '</td>';
	echo '</tr>';
}

echo '</table>';

draw_footer();
?>
