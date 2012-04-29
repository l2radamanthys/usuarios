<?php
include('libs/template.php');
draw_header("Nuevo Usuario");
?>

<h1>Nuevo Usuario</h1>

<br />

<form  action="" method="POST">
<table>
	<tr>
		<td colspan="2">
		<h2>Datos de Usuario</h2>
		</td>
	</tr>

	<tr>
		<td><label>Nombre Usuario:</label></td>
		<td><input type="text" name="username" class="edt_c" /></td>
	</tr>
	<tr>
		<td><label>Contraseña:</label></td>
		<td><input type="password" name="password1" class="edt_c" /></td>
	</tr>
	<tr>
		<td><label>Repetir Contraseña:</label></td>
		<td><input type="password" name="password2" class="edt_c" /></td>
	</tr>
	
	<tr>
		<td><label>Email:</label></td>
		<td><input type="text" name="email" class="edt_m" /></td>
	</tr>
	
	<tr>
		<td colspan="2">
		<h2>Datos Personales</h2>
		</td>
	</tr>
	
	<tr>
		<td><label>Direccion:</label></td>
		<td><input type="text" name="direccion" class="edt_m" /></td>
	</tr>

	<tr>
		<td><label>Ciudad:</label></td>
		<td><input type="text" name="ciudad" class="edt_m" /></td>
	</tr>
	
	<tr>
		<td><label>Pais:</label></td>
		<td><input type="text" name="ciudad" class="edt_m" /></td>
	</tr>
	
	<tr>
		<td><label>Telefono:</label></td>
		<td><input type="text" name="telefono" class="edt_c" /></td>
	</tr>
	<tr>
		<td><label>Celular:</label></td>
		<td><input type="text" name="celular" class="edt_c" /></td>
	</tr>
	
	<tr>
		<td colspan="2">
		<br />
		</td>
	</tr>
	
	<tr>
		<td colspan="2" align="center">
		<input type="submit" value="Crear" class="boton"/>
		<input type="reset" value="Limpiar" class="boton"/>
		</td>
	</tr>
</table>
</form>






<?php
draw_footer();
?>
