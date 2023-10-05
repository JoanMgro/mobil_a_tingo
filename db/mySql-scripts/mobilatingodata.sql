-- Insertando datos a tabla Cuentas
INSERT INTO Cuentas (id_cuenta, password, tipo_cuenta, activo)
VALUES	('admin01@mobilatingo.com', 'admin01', 0, 1),
		('admin02@mobilatingo.com', 'admin02', 0, 1),
		('info@reparamos.com', 'reparamos', 1, 1),
		('info@repartech.com', 'repartech', 1, 0);

-- Insertando datos a tabla Cuentas
INSERT INTO Admins (id_admin, nombre)
VALUES	('admin01@mobilatingo.com', 'Armando Problemas'),
		('admin02@mobilatingo.com', 'Alan Brito');

-- Insertando datos a tabla Paises
INSERT INTO Paises (id_pais, nom_pais)
VALUES	('CO', 'Colombia'); -- uSANDO CODIGO FIPS

-- Insertando datos a tabla Departamentos		
INSERT INTO Departamentos (id_depto, nom_dept, pais)
VALUES	('CO02', 'Antioquia', 'CO'),
		('CO04', 'Atlantico', 'CO'),
		('CO34', 'Bogota D.C', 'CO'),
		('CO35', 'Bolivar', 'CO'),
		('CO38', 'Magdalena', 'CO');

-- Insertando datos a tabla Ciudades
-- Utilizando codigo DANE de ciudades	
INSERT INTO Ciudades (id_ciudad, nom_ciudad, departamento)
VALUES	('05001', 'Medellin', 'CO02'),
		('08001', 'Barranquilla', 'CO04'),
		('11001', 'Bogota D.C', 'CO34'), 
		('13001', 'Cartagena', 'CO35'),
		('47001', 'Santa Marta', 'CO38');

-- Utilizando AUTOincremetn for id	
INSERT INTO Barrios (nom_barrio, ciudad)
VALUES	('Laureles', '05001'),
		('La Chinita', '08001'),
		('Cedritos', '11001'), 
		('Chapinero Alto', '11001'),
		('Rodadero', '47001');

-- Utilizando AUTOincremetn for id	
INSERT INTO UbicacionEmpresas (pais, departamento, ciudad, barrio, direccion)
VALUES	('Colombia', 'Antioquia', 'Medellin', 'Laureles', 'Cr5 # 23-99 oficina 101'),
		('Colombia', 'Atlantico', 'Barranquilla', 'La Chinita', 'Cr1b # 11-23 oficina 12-1');

INSERT INTO Empresas (id_empresa, nit, nom_empresa, ubicacion, url_logo)
VALUES	('info@reparamos.com', '800.778.990-8', 'Reparamos SAS', 1, 'http//'),
		('info@repartech.com', '800.778.999-8', 'Repartech SAS', 2, 'http//');

