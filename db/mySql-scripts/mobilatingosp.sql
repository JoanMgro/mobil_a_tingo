-- Procedure para crear Admin

DELIMITER //
CREATE PROCEDURE create_admin(
    IN cta VARCHAR(50),
    IN pass VARCHAR(50),
    IN tipo INT,
    IN act INT,
    IN nom VARCHAR(50)
)
BEGIN
    -- Insertando datos a tabla Cuentas
    INSERT INTO Cuentas (id_cuenta, password, tipo_cuenta, activo)
    VALUES	(cta, pass, tipo, act);

    -- Insertando datos a tabla Cuentas
    INSERT INTO Admins (id_admin, nombre)
    VALUES	(cta, nom);


END //
DELIMITER ;
-- Procedure para Validar

-- Procedure para Validar
DELIMITER //
CREATE PROCEDURE validate_user(
    IN cta VARCHAR(50),
    IN pass VARCHAR(50),
    OUT tipo INT,
    OUT act INT
    
)
BEGIN
    SELECT tipo_cuenta, activo 
    INTO tipo, act
    FROM Cuentas
    WHERE id_cuenta = cta AND password = pass;

END //
DELIMITER ;

-- Procedure para consultar paises

DELIMITER //
CREATE PROCEDURE get_paises(
   
)
BEGIN
    SELECT nom_pais
        FROM Paises; 


END //
DELIMITER ;

-- Procedure para consultar empresas

DELIMITER //
CREATE PROCEDURE get_empresas(
	IN pais VARCHAR(15),
    IN depto VARCHAR(15),
    IN ciudad VARCHAR(15),
    IN barrio VARCHAR(15)   
)
BEGIN
    select e.nom_empresa, ub.direccion
	from Empresas e
	inner join UbicacionEmpresas ub on e.ubicacion = ub.id_ubicacion
	where ub.pais = pais and ub.departamento like (ifnull(depto, '%'))
		and ub.ciudad like (ifnull(ciudad, '%')) AND ub.barrio like (ifnull(barrio, '%'));


END //
DELIMITER ;

-- Procedure para consultar Planes

DELIMITER //
CREATE PROCEDURE get_planes(
)
BEGIN
    select pm.id_plan, pm.nom_plan, pm.desc_plan, pm.valor_plan
	from Planes_Mobilatingo pm;

END //
DELIMITER ;

-- Procedure para consultar Planes

DELIMITER //
CREATE PROCEDURE get_planes(
)
BEGIN
    select pm.id_plan, pm.nom_plan, pm.desc_plan, pm.valor_plan
	from Planes_Mobilatingo pm;

END //
DELIMITER ;

-- Procedure para consultar Faq

DELIMITER //
CREATE PROCEDURE get_faq(
)
BEGIN
    select fq.id_faq, fq.question, fq.answer
	from Faq as fq;

END //
DELIMITER ;

-- Procedure para sacar el acerca de

DELIMITER //
CREATE PROCEDURE get_texto_acerca(
)
BEGIN
    select ac.texto_acerca
	from Acerca as ac;

END //
DELIMITER ;

-- Procedure para sacar menus

DELIMITER //
CREATE PROCEDURE get_menu(
    IN currMenu INT
    )
BEGIN
    select lm.nom_link
	from Links_Menu as lm 
    where lm.menu = currMenu; 

END //
DELIMITER ;





