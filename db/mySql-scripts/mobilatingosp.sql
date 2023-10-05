-- Procedure para consultar paises
DELIMITER //
CREATE PROCEDURE get_paises()
    OUT paises VARCHAR(25);
)
BEGIN
    SELECT nom_pais
    INTO paises
    FROM Paises  


END //
DELIMITER ;



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
-- Si el user no existe o el pass esta mal regresa null
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