-- Insertando datos a tabla Cuentas
USE mobilatingodb;

SELECT * FROM mobilatingodb.Perfil;
INSERT INTO Pagina (pagid, pagnom, pagarc, pagmos, pagord, pagmen) VALUES
(10, 'Inicio', 'views/html/vdashboard.php', 1, 1, 'home'),
(11, 'Mis Suscripciones', 'views/html/vmisuscripcion.php', 1, 2, 'home'),
(13, 'Contactenos', 'views/html/vcontacto.php', 1, 97, 'home'),
(14, 'eShop', 'views/html/vshop.php', 1, 3, 'home'),
(19, 'Carrito', 'views/html/vcarrito.php', 1, 98, 'home'),
(100, 'Salir', 'views/html/vlogout.php', 1, 99, 'home'),
(102, 'Usuarios', 'views/html/vusuarios.php', 1, 5, 'home'),
(103, 'Servicios', 'views/html/vservicios.php', 1, 6, 'home'),
(104, 'Paginas', 'views/html/vpaginas.php', 1, 7, 'home'),
(105, 'Perfiles', 'views/html/vperfiles.php', 1, 8, 'home'),
(106, 'Faqs', 'views/html/vadminfaq.php', 1, 30, 'home'),
(107, 'Acerca', 'views/html/vadminacerca.php', 1, 31, 'home'),
(108, 'Config', 'views/html/vconfig.php', 1, 32, 'home'),
(1000, 'Inicio', 'views/html/vinicio.php', 1, 1, 'index'),
(1001, 'Planes', 'views/html/vplanes.php', 1, 2, 'index'),
(1002, 'Faq', 'views/html/vfaq.php', 1, 3, 'index'),
(1003, 'Acerca de', 'views/html/vacercade.php', 1, 4, 'index'),
(1004, 'Contactenos', 'views/html/vcontacto.php', 1, 5, 'index'),
(1005, 'Ingresar', 'views/html/vlogin.php', 1, 29, 'index'),
(1006, 'Registrarse', 'views/html/vregistrarse.php', 1, 6, 'index'),
(1020, 'Detalles', 'views/html/vdetresult.php', 0, 77, 'index');

INSERT INTO Pagina (pagid, pagnom, pagarc, pagmos, pagord, pagmen)
VALUES	(10, 'Inicio', 'views/html/vdashboard.php', 1, 1, 'home'),
		(11, 'Mis Suscripciones', 'views/html/vmisuscripcion.php', 1, 2, 'home'),
		(12, 'Mis Servicios', 'views/html/vmiservicios.php', 1, 3, 'home'),
		(13, 'contactenos', 'views/html/vcontacto.php', 1, 4, 'home'),
        (100, 'Salir', 'views/html/vlogout.php', 1, 99, 'home');
use mobilatingodb;        
INSERT INTO Pagina (pagid, pagnom, pagarc, pagmos, pagord, pagmen)
VALUES	(102, 'Usuarios', 'views/html/vsuscripcion.php', 1, 5, 'home'),
		(103, 'Servicios', 'views/html/vservicios.php', 1, 6, 'home'),
        (104, 'Paginas', 'views/html/vpaginas.php', 1, 7, 'home'),
        (105, 'Perfiles', 'views/html/vperfiles.php', 1, 8, 'home');
use mobilatingodb;	


INSERT INTO Pagper (pagid, pefid)
VALUES	(1000, 3),
		(1001, 3),
        (1002, 3),
        (1003, 3),
        (1004, 3),
        (1005, 3),
		(1006, 3),
        (1020, 3),
        (10, 2),
        (11, 2),
        (13, 2),
        (14, 2),
		(19, 2),
        (100, 2),
		(10, 1),
        (13, 1),
        (100, 1),        
        (102, 1),
        (103, 1),
        (104, 1),
		(105, 1),
        (106, 1),
        (107, 1),
        (108, 1);
		

INSERT INTO Perfil (pefid, pefnom, activo)
VALUES	(1, 'Admin', 1),
		(2, 'Empresa', 1),
		(3, 'Publico', 1);


SELECT * FROM mobilatingodb.Admins;	
INSERT INTO Cuentas (id_cuenta, password, perfil, activo)
VALUES	('admin@mobilatingo.com', '$2y$10$p36SR/PkxHeWA52YXFLCQuDpVRFzp13Kc8iRW5RcjLWXfv5e.sHLG', 1, 1),
		('reparamos@gmail.com', '$2y$10$BxBv4lt0XBoQTINWu7kL6uc9QX6.hJtvKL9w196bKMXXVqydvsD/e', 2, 1);
-- password de admin es admin, password de reparamos es reparamos.
-- Insertando datos a tabla Cuentas
INSERT INTO Admins (id_admin, nombre)
VALUES	('admin@mobilatingo.com', 'Alan Brito');



SELECT * FROM mobilatingodb.UbicacionEmpresas;	
-- Utilizando AUTOincremetn for id	
INSERT INTO UbicacionEmpresas (pais, departamento, ciudad, barrio, direccion, latitud, longitud)
VALUES	('Colombia', 'Antioquia', 'Medellin', 'Estacion Villa', 'Cll 56 # 54-99 oficina 101', 6.25649, -75.56943);
		

INSERT INTO Empresas (id_empresa, nit, nom_empresa, ubicacion, url_logo, contacto, servicios)
VALUES	('reparamos@gmail.com', '800.778.990-8', 'Reparamos SAS', 1, null, 'numeros aca', 'servicios aca' );
		

SELECT * FROM mobilatingodb.Planes_Mobilatingo;	
-- Insertando Datos Servicios Mobilatingo
INSERT INTO Planes_Mobilatingo (nom_plan, desc_plan, valor_plan, dias_vigencia, activo)
VALUES ('Mobilatingo Basico Mensual',
		'Con esta suscripcion podras hacer parte de la comunidad de empresas tecnologicas de mobilatingo. Esta suscripcion te garantiza que apareceras en los listados de busqueda de los usuarios si te encuentras en sus are de busqueda',
		25000.00, 30, 1),
		('Mobilatingo Basico Mensual Plus',
				'Con esta suscripcion podras hacer parte de la comunidad de empresas tecnologicas de mobilatingo. Esta suscripcion te garantiza que apareceras en los listados de busqueda de los usuarios si te encuentras en sus are de busqueda',
		35000.00, 30, 1),
		('Mobilatingo Basico Semestral',
		'Con esta suscripcion podras hacer parte de la comunidad de empresas tecnologicas de mobilatingo. Esta suscripcion te garantiza que apareceras en los listados de busqueda de los usuarios si te encuentras en sus are de busqueda',
        125000.00, 180, 1),
		('Mobilatingo Basico Semestral Plus',
		'Con esta suscripcion podras hacer parte de la comunidad de empresas tecnologicas de mobilatingo. Esta suscripcion te garantiza que apareceras en los listados de busqueda de los usuarios si te encuentras en sus are de busqueda',
        175000.00, 180, 1),
		('Mobilatingo Anual Selection',
		'Con esta suscripcion podras hacer parte de la comunidad de empresas tecnologicas de mobilatingo. Esta suscripcion te garantiza que apareceras en los listados de busqueda de los usuarios si te encuentras en sus are de busqueda',
        285000.00, 360, 1);			

SELECT * FROM mobilatingodb.Planes_Mobilatingo;	
INSERT INTO Faq (question, answer)
VALUES ('Tengo que pagar para buscar una empresa?', 'No, el servicio es gratis para las busquedas'),
	   ('Soy una empresa, debo comprar una suscripcion para anunciarme?', 'Si, como empresa hay que adquirir una suscripcion para publicar'),
	   ('Puedo vender a traves de la plataforma?', 'No, somos un directorio y no tenemos disponibles ese servicio.'),
		('Como creo un usuario??', 'Debes entrar a la pagina y hacer click en el apartado de registrarme.');
use mobilatingodb;        
INSERT INTO Acerca (id_acerca, texto_acerca)
VALUES (1, 'Texto Acerca de Aqui');
        
