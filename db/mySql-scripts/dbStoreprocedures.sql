DELIMITER //
CREATE PROCEDURE cargar_empresa(
    IN user varchar(50)
    
    )
BEGIN
    select e.id_empresa, e.nit, e.nom_empresa, e.url_logo, u.pais, u.departamento, u.barrio, u.direccion, u.latitud, u.longitud
	from Empresas e
    inner join UbicacionEmpresas u on e.ubicacion = u.id_ubicacion 
    where e.id_empresa = user; 

END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE cargar_admin(
    IN user varchar(50)
    
    )
BEGIN
    select a.id_admin, a.nombre
	from Admins a
    where a.id_admin = user; 

END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE crear_usuario(
    IN user varchar(50),
    IN pass varchar(255),
    IN per INT    
    )
BEGIN
INSERT INTO Cuentas (id_cuenta, password, perfil)
    VALUES	(user, pass, per);
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE crear_empresa(
    IN iuser varchar(50),
    IN init varchar(50),
    IN inombre varchar(50),
    IN iurllogo varchar(100),
    IN iubicacion varchar(100),
    IN icontacto varchar(250),
    IN iservicios varchar(2000)
    )
BEGIN
INSERT INTO Empresas (id_empresa, nit, nom_empresa, ubicacion, url_logo, contacto, servicios)
    VALUES	(iuser, init, inombre, iubicacion, iurllogo, icontacto, iservicios);
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE validar_hash_usr(
    IN user varchar(50)
    )
BEGIN
    select c.id_cuenta, p.pefid, c.password
	from Cuentas c
    inner join Perfil p on c.perfil = p.pefid 
    where c.id_cuenta = user; 

END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE crear_admin(
    IN auser varchar(50),
    IN anombre varchar(50)
    )
BEGIN
INSERT INTO Admins (id_admin, nombre)
    VALUES	(auser, anombre);
END //
DELIMITER ;







