
USE mobilatingodb;

-- Insertando datos a menus
INSERT INTO Menus (nom_menu)
VALUES	('Menu Inicio'),
		('Menu Empresa'),
		

INSERT INTO Links_Menu (menu, ref_link, pg, nom_link)
VALUES	(1, '../../index.php?', 0, 'Inicio'),
		(1, '../../index.php?', 1001,'Planes'),
		(1, '../../index.php?', 1002,'Faq'),
		(1, '../../index.php?', 1003,'Acerca de'),
		(1, '../../index.php?', 1004,'Contactenos'),
		(1, '../../index.php?', 1005,'Ingresar'),			
		(2, '../../index.php?', 0, 'Inicio'),
		(2, '../../home.php?', 1, 'Home'),
		(2, '../../home.php?', 2, 'Suscripciones');


-- Insertando datos a tabla Cuentas
INSERT INTO Cuentas (id_cuenta, password, tipo_cuenta, activo)
VALUES	('admin01@mobilatingo.com', 'admin01', 0, 1),
		('admin02@mobilatingo.com', 'admin02', 0, 1),
		('info@reparamos.com', 'reparamos', 1, 1),
		('info@reparsomos.com', 'reparsomos', 1, 1),
		('info@repartecnicos.com', 'repartecnicos', 1, 1),
		('info@reparfix.com', 'reparfix', 1, 1),
		('info@repartech.com', 'repartech', 1, 0);

-- Insertando datos a tabla Cuentas
INSERT INTO Admins (id_admin, nombre)
VALUES	('admin01@mobilatingo.com', 'Armando Problemas'),
		('admin02@mobilatingo.com', 'Alan Brito');

-- Insertando datos a tabla Paises
INSERT INTO Paises (id_pais, nom_pais)
VALUES	('US', 'EEUU'),
		('CO', 'Colombia'),
		('EC', 'Ecuador'),
		('CA', 'Canada'); -- uSANDO CODIGO FIPS

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
VALUES	('Estacion Villa', '05001'),
		('Las Mercedes', '08001'),
		('Cedritos', '11001'), 
		('Chapinero Alto', '11001'),
		('Gaira', '47001'),
		('Almendros', '47001'),
		('Centro Historico', '47001'),
		('Rodadero', '47001');

-- Utilizando AUTOincremetn for id	
INSERT INTO UbicacionEmpresas (pais, departamento, ciudad, barrio, direccion, latitud, longitud)
VALUES	('Colombia', 'Antioquia', 'Medellin', 'Estacion Villa', 'Cll 56 # 54-99 oficina 101', 6.25649, -75.56943),
		('Colombia', 'Magdalena', 'Santa Marta', 'Rodadero', 'Cll 70 # 45-99 oficina 101', 11.199178, -75.226207),
		('Colombia', 'Magdalena', 'Santa Marta', 'Gaira', 'Cll 66 # 45-99 oficina 101', 11.19296, -75.22334),
		('Colombia', 'Magdalena', 'Santa Marta', 'Centro Historico', 'Cll 33 # 45-99 oficina 101', 11.243505, -75.210560),
		('Colombia', 'Atlantico', 'Barranquilla', 'Las Mercedes', 'Cll 77 # 38d-23 oficina 12-1', 10.98961, -74.81558);

INSERT INTO Empresas (id_empresa, nit, nom_empresa, ubicacion, url_logo)
VALUES	('info@reparamos.com', '800.778.990-8', 'Reparamos SAS', 1, 'http//'),
		('info@reparsomos.com', '800.733.990-8', 'Reparsomos SAS', 2, 'http//'),
		('info@repartecnicos.com', '800.733.990-8', 'Repartecnicos SAS', 3, 'http//'),
		('info@reparfix.com', '800.733.990-8', 'Reparfix SAS', 4, 'http//'),
		('info@repartech.com', '800.778.999-8', 'Repartech SAS', 5, 'http//');


-- Insertando Datos Servicios Mobilatingo
INSERT INTO Planes_Mobilatingo (nom_plan, desc_plan, valor_plan)
VALUES ('Mobilatingo Basico Mensual',
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus. Pellentesque dapibus ac nisl vitae scelerisque. Nunc egestas nec neque id dictum. Nam at volutpat odio. Aenean venenatis consectetur pulvinar. Maecenas non gravida nibh, vitae sollicitudin dui. Nullam pellentesque lorem vitae vehicula tincidunt. In eget quam mauris. Suspendisse auctor tempus mollis. Nam viverra arcu mattis augue imperdiet, quis fermentum felis imperdiet. Curabitur vehicula ipsum orci, quis aliquet mi venenatis sit amet. Integer maximus at ligula a congue. Pellentesque sit amet dui eu ante varius luctus. Aliquam risus eros, condimentum eu finibus in, tincidunt ac libero.',
		25000.00),
		('Mobilatingo Basico Mensual Plus',
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus. Pellentesque dapibus ac nisl vitae scelerisque. Nunc egestas nec neque id dictum. Nam at volutpat odio. Aenean venenatis consectetur pulvinar. Maecenas non gravida nibh, vitae sollicitudin dui. Nullam pellentesque lorem vitae vehicula tincidunt. In eget quam mauris. Suspendisse auctor tempus mollis. Nam viverra arcu mattis augue imperdiet, quis fermentum felis imperdiet. Curabitur vehicula ipsum orci, quis aliquet mi venenatis sit amet. Integer maximus at ligula a congue. Pellentesque sit amet dui eu ante varius luctus. Aliquam risus eros, condimentum eu finibus in, tincidunt ac libero.',
		35000.00),
		('Mobilatingo Basico Semestral',
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Pellentesque dapibus ac nisl vitae scelerisque. Nunc egestas nec neque id dictum. Nam at volutpat odio. Aenean venenatis consectetur pulvinar. Maecenas non gravida nibh, vitae sollicitudin dui. Nullam pellentesque lorem vitae vehicula tincidunt. In eget quam mauris. Suspendisse auctor tempus mollis. Nam viverra arcu mattis augue imperdiet, quis fermentum felis imperdiet. Curabitur vehicula ipsum orci, quis aliquet mi venenatis sit amet. Integer maximus at ligula a congue. Pellentesque sit amet dui eu ante varius luctus. Aliquam risus eros, condimentum eu finibus in, tincidunt ac libero.',
		125000.00),
		('Mobilatingo Basico Semestral Plus',
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus. Pellentesque dapibus ac nisl vitae scelerisque. Nunc egestas nec neque id dictum. Nam at volutpat odio. Aenean venenatis consectetur pulvinar. Maecenas non gravida nibh, vitae sollicitudin dui. Nullam pellentesque lorem vitae vehicula tincidunt. In eget quam mauris. Suspendisse auctor tempus mollis. Nam viverra arcu mattis augue imperdiet, quis fermentum felis imperdiet. Curabitur vehicula ipsum orci, quis aliquet mi venenatis sit amet. Integer maximus at ligula a congue. Pellentesque sit amet dui eu ante varius luctus. Aliquam risus eros, condimentum eu finibus in, tincidunt ac libero.',
		175000.00),
		('Mobilatingo Anual Selection',
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus. Pellentesque dapibus ac nisl vitae scelerisque. Nunc egestas nec neque id dictum. Nam at volutpat odio. Aenean venenatis consectetur pulvinar. Maecenas non gravida nibh, vitae sollicitudin dui. Nullam pellentesque lorem vitae vehicula tincidunt. In eget quam mauris. Suspendisse auctor tempus mollis. Nam viverra arcu mattis augue imperdiet, quis fermentum felis imperdiet. Curabitur vehicula ipsum orci, quis aliquet mi venenatis sit amet. Integer maximus at ligula a congue. Pellentesque sit amet dui eu ante varius luctus. Aliquam risus eros, condimentum eu finibus in, tincidunt ac libero.',
		285000.00);		


INSERT INTO Faq (question, answer)
VALUES ('Tengo que pagar para buscar una empresa?', 'No, el servicio es gratis para las busquedas'),
	   ('Soy una empresa, debo comprar una suscripcion para anunciarme?', 'Si, como empresa hay que adquirir una suscripcion para publicar'),
	   ('Lorem ipsum dolor sit amet, consectetur adipiscing elit.?', 'Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus.'),
		('Lorem ipsum dolor sit amet, consectetur adipiscing elit.?', 'Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus.'),
		('Lorem ipsum dolor sit amet, consectetur adipiscing elit.?', 'Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus.'),
		('Lorem ipsum dolor sit amet, consectetur adipiscing elit.?', 'Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus.'),
		('Lorem ipsum dolor sit amet, consectetur adipiscing elit.?', 'Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus.'),
		('Lorem ipsum dolor sit amet, consectetur adipiscing elit.?', 'Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus.'),
		('Lorem ipsum dolor sit amet, consectetur adipiscing elit.?', 'Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus.'),
		('Lorem ipsum dolor sit amet, consectetur adipiscing elit.?', 'Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus.'),
		('Lorem ipsum dolor sit amet, consectetur adipiscing elit.?', 'Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus.'),
		('Lorem ipsum dolor sit amet, consectetur adipiscing elit.?', 'Sed mattis vehicula risus, finibus mollis lacus efficitur eu. Quisque vitae felis tempor lacus convallis malesuada quis sed est. Pellentesque magna urna, pretium eu mollis nec, pellentesque sodales purus.');

INSERT INTO Acerca (id_acerca, texto_acerca)
VALUES (1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae urna viverra, suscipit nisi ac, aliquet nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae fermentum velit. In nec rutrum tellus. Praesent sem quam, euismod quis blandit eget, elementum non leo. Cras sit amet maximus tortor. Fusce lectus arcu, fermentum at mauris et, euismod volutpat nunc. Vestibulum at tortor massa. Maecenas sit amet ex dignissim, suscipit risus at, suscipit dui. Maecenas bibendum tristique nulla, quis tincidunt diam tempus et.

Suspendisse potenti. Phasellus non enim mauris. Nullam sed efficitur nunc. Phasellus vestibulum bibendum dolor, quis ultricies nibh luctus ut. Nunc at velit non mi consequat ultrices. Integer eget urna est. Phasellus sem justo, euismod nec egestas commodo, elementum ac lorem.');