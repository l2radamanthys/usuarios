INSERT INTO `Applications` (`id`, `name`, `code`, `descripcion`) VALUES
	(1, 'Crear Usuario', 'USER_ADD', 'Permite agregar un usuario'),
	(2, 'Lista de Usuarios', 'USER_LIST', 'Permite ver el listado de Usuaros'),
	(3, 'Agregar Grupo', 'GROUP_ADD', NULL),
	(4, 'Agregar Aplicacion', 'APP_ADD', NULL),
	(5, 'Modificar Aplicaciones Grupo', 'GROUP_APP_EDT', 'Modifica los permisos sobre las aplicaciones en los grupos'),
	(6, 'Borrar Usuario', 'USER_DEL', 'Permite Eliminar un usuario determinado.'),
	(7, 'Modificar  Usuarios', 'USER_EDIT', 'Modifica los Datos del Usuario'),
	(8, 'Test Only', 'USER_TEST', 'Solo para prueba de permisos'),
	(9, 'Mostrar Aplicaciones', 'APP_LIST', 'Muestra un listado con todas las aplicaciones disponibles'),
	(10, 'Modificar Aplicaciones', 'APP_EDIT', 'Modificar Aplicaciones'),
	(11, 'Borrar Aplicacion', 'APP_DEL', 'Permite eliminar un permiso'),
	(12, 'Acceso al Panel', 'LOGIN', 'Acceso al panel de usuario importante solo para que te avise si estas logueado o no. :D'),
	(13, 'Listado de Grupos', 'GROUP_LIST', 'Mostrar el Listado de todos Grupos'),
	(14, 'Mis Datos', 'USER_MI_INFO', 'Muestra los datos del usuario');


INSERT INTO `Groups` (`id`, `name`) VALUES
	(1, 'Admins'),
	(2, 'Usuarios');


INSERT INTO `Users` (`username`, `password`, `first_name`, `last_name`, `is_active`, `email`, `Groups_id`) VALUES
	('admin', '123456', 'Admin', 'Sistema', 1, 'adm@site.com', 1),
	('wyrven', '123456', 'Ricardo Daniel', 'Quiroga', 0, 'l2radamanthys@gmail.com', 2),
	('test', '12345', 'Usuario de ', 'Prueba', 0, 'usernet@dot.cm', 2);

