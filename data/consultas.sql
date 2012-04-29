USE `usuarios;


-- SELECT * FROM Groups INNER JOIN AplicationsForGroups AS AppGroup ON Groups.id = AplicationsForGroups.groups_id
-- SELECT * FROM Groups INNER JOIN AplicationsForGroups AS AppGroup ON Groups.id = AppGroup.groups_id
-- SELECT * FROM Applications as App INNER JOIN AplicationsForGroups AS AppGroup ON App.id = AppGroup.Applications_id


-- mostrar los grupos y sus permisos --
-- SELECT 
--     Groups.id, Groups.name, App.id, App.name, App.code, App.descripcion 
-- FROM 
--     Applications as App 
-- INNER JOIN 
--     (Groups INNER JOIN AplicationsForGroups AS AppGroup ON Groups.id = AppGroup.groups_id) 
-- ON 
--     App.id = AppGroup.Applications_id
-- WHERE
--    Groups.id = 1


-- mostrar los usuarios y sus permisos --

-- SELECT 
--    Users.username, App.name, App.code
-- FROM 
--     Users 
-- INNER JOIN (
--         Groups
--     INNER JOIN
--         (Applications AS App INNER JOIN AplicationsForGroups AS AppGroup ON App.id = AppGroup.Applications_id)
--     ON 
--         Groups.id = AppGroup.groups_id) 
-- ON
--     Groups.id = Users.groups_id
-- WHERE
--     Users.username = 'Admin'


-- SELECT Users.username, App.name, App.code FROM Users INNER JOIN (Groups INNER JOIN (Applications AS App 
-- INNER JOIN AplicationsForGroups AS AppGroup ON App.id = AppGroup.Applications_id) ON Groups.id = AppGroup.groups_id) ON Groups.id = Users.groups_id WHERE Users.username = 'Admin'


    