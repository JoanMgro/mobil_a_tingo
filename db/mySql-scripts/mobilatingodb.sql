DROP SCHEMA IF EXISTS mobilatingodb;

CREATE SCHEMA IF NOT EXISTS mobilatingodb;

USE mobilatingodb;

-- Tabla Configuracion OLuchini

DROP TABLE IF EXISTS Configuracion;

-- Esta tabla es la configuracion de lo que mostramos en nuesto footer, 
-- son los datos de nuestra

CREATE TABLE IF NOT EXISTS Configuracion (
    idconfig BIGINT,
    nit VARCHAR(13),
    nomemp VARCHAR(50),
    dircon VARCHAR(100), 
    mosdir INT,  -- Mostrar Direccion
    telcon VARCHAR(20),
    mostel INT,  -- Mostrar Telefono
    celcon VARCHAR(20),
    moscel INT,  -- Mostrar Celular
    emacon VARCHAR(100),
    mosema INT,  -- Mostrar Email
    logocon VARCHAR(100),
    CONSTRAINT pk_idconfig PRIMARY KEY (idconfig)    
);

DROP TABLE IF EXISTS Planes_Mobilatingo;
CREATE TABLE IF NOT EXISTS Planes_Mobilatingo (
    id_plan INT NOT NULL AUTO_INCREMENT,
    nom_plan VARCHAR(100) NOT NULL,
    desc_plan VARCHAR(1500) NOT NULL,
    valor_plan DECIMAL(9,2) NOT NULL,
    CONSTRAINT pk_idplan PRIMARY KEY (id_plan) 
);


DROP TABLE IF EXISTS Faq;
CREATE TABLE IF NOT EXISTS Faq (
    id_faq INT NOT NULL AUTO_INCREMENT,
    question VARCHAR(1000) NOT NULL,
    answer VARCHAR(1000) NOT NULL,
    
    CONSTRAINT pk_idfaq PRIMARY KEY (id_faq) 
);


DROP TABLE IF EXISTS Acerca;
CREATE TABLE IF NOT EXISTS Acerca (
    id_acerca INT NOT NULL,
    texto_acerca VARCHAR(2500) NOT NULL,
    
    CONSTRAINT pk_idacerca PRIMARY KEY (id_acerca) 
);

-- Tabla Menus 

DROP TABLE IF EXISTS Menus;
CREATE TABLE IF NOT EXISTS Menus (
    id_menu INT NOT NULL AUTO_INCREMENT,
    nom_menu VARCHAR(25) NOT NULL,
    
    CONSTRAINT pk_idmenu PRIMARY KEY (id_menu) 
);

DROP TABLE IF EXISTS Links_Menu;
CREATE TABLE IF NOT EXISTS Links_Menu (
    id_link INT NOT NULL AUTO_INCREMENT,
    menu INT NOT NULL,
    ref_link VARCHAR(50) NOT NULL,
    pg INT NOT NULL,
    nom_link VARCHAR(15) NOT NULL,
    
    CONSTRAINT pk_idlink PRIMARY KEY (id_link),
    CONSTRAINT fk_menu FOREIGN KEY (menu)
    REFERENCES Menus (id_menu)
    ON DELETE CASCADE
    ON UPDATE CASCADE 
    
);

-- Tabla cuenta ppal

DROP TABLE IF EXISTS Cuentas;
CREATE TABLE IF NOT EXISTS Cuentas (
    -- El id de la cuenta es el correo electronico.
    id_cuenta VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    tipo_cuenta INT,
    activo INT,
    CONSTRAINT pk_cuentas PRIMARY KEY (id_cuenta)
);

DROP TABLE IF EXISTS Admins;
-- la tabla admin es hija de cuenta.
CREATE TABLE IF NOT EXISTS Admins(
    id_admin VARCHAR(50) NOT NULL,
    nombre VARCHAR(50) NOT NULL,    
    CONSTRAINT pk_admins PRIMARY KEY (id_admin),
    CONSTRAINT fk_admins FOREIGN KEY (id_admin) 
    REFERENCES Cuentas (id_cuenta)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);


DROP TABLE IF EXISTS Paises;
-- Tabla de paises donde hay servicio
CREATE TABLE IF NOT EXISTS Paises (
    id_pais VARCHAR(5) NOT NULL,
    nom_pais VARCHAR(25) NOT NULL,
    CONSTRAINT pk_paises PRIMARY KEY (id_pais)
);

DROP TABLE IF EXISTS Departamentos;
-- Tabla de departamentos donde hay servicio
CREATE TABLE IF NOT EXISTS Departamentos (
    id_depto VARCHAR(10) NOT NULL,
    nom_dept VARCHAR(25) NOT NULL,
    pais VARCHAR(5) NOT NULL,
    CONSTRAINT pk_departamentos PRIMARY KEY (id_depto),
    CONSTRAINT fk_pais_departamentos FOREIGN KEY (pais)
    REFERENCES Paises (id_pais)
);

DROP TABLE IF EXISTS Ciudades;
-- Tabla de ciudades donde hay servicio
CREATE TABLE IF NOT EXISTS Ciudades (
    id_ciudad VARCHAR(15) NOT NULL,
    nom_ciudad VARCHAR(25) NOT NULL,
    departamento VARCHAR(25) NOT NULL,
    CONSTRAINT pk_ciudades PRIMARY KEY (id_ciudad),
    CONSTRAINT fk_departamento_ciudades FOREIGN KEY (departamento)
    REFERENCES Departamentos (id_depto)
);

DROP TABLE IF EXISTS Barrios;
-- Tabla de barrios donde hay servicio
CREATE TABLE IF NOT EXISTS Barrios (
    id_barrio BIGINT NOT NULL AUTO_INCREMENT,
    nom_barrio VARCHAR(25) NOT NULL,
    ciudad VARCHAR(25) NOT NULL,
    CONSTRAINT pk_barrios PRIMARY KEY (id_barrio),
    CONSTRAINT fk_ciudad_barrios FOREIGN KEY (ciudad)
    REFERENCES Ciudades (id_ciudad)
);

DROP TABLE IF EXISTS UbicacionEmpresas;

CREATE TABLE IF NOT EXISTS UbicacionEmpresas (
    id_ubicacion BIGINT NOT NULL AUTO_INCREMENT,
    pais VARCHAR(25) NOT NULL,
    departamento VARCHAR(25) NOT NULL,
    ciudad VARCHAR(25) NOT NULL,
    barrio VARCHAR(25) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    latitud DOUBLE  NOT NULL,
    longitud DOUBLE  NOT NULL,
    CONSTRAINT pk_ubicacion_empresas PRIMARY KEY (id_ubicacion)
);


DROP TABLE IF EXISTS Empresas;

CREATE TABLE IF NOT EXISTS Empresas (
    id_empresa VARCHAR(50) NOT NULL,
    nit VARCHAR(50) NOT NULL,
    nom_empresa VARCHAR(50) NOT NULL,
    ubicacion BIGINT NOT NULL,
    url_logo VARCHAR(100) NULL,
    CONSTRAINT pk_empresa PRIMARY KEY (id_empresa),
    -- Referenciando a la tabla cuenta padre
    CONSTRAINT fk_empresas FOREIGN KEY (id_empresa)
    REFERENCES Cuentas (id_cuenta)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT fk_ubicacion_empresas FOREIGN KEY (ubicacion)
    REFERENCES UbicacionEmpresas (id_ubicacion)

);

-- Tabla agregada ubicacion 

DROP TABLE IF EXISTS Ubicacion;
-- Esta tabla es muy similar a mi tabla ubicacion empresa
-- De momento no la voy a unira mi esquema.
CREATE TABLE IF NOT EXISTS Ubicacion (
    codubi BIGINT,
    nomubi VARCHAR(30),
    depubi INT,
    estubi INT,
    pais_ubi INT NOT NULL,
    dep_ubi INT NOT NULL,
    cid_ubi INT NOT NULL,    
    CONSTRAINT pk_codubi PRIMARY KEY (codubi)    
);


-- Tabla Agregada Pagina

DROP TABLE IF EXISTS Pagina;
-- Esta tabla nos indica si una pagina con id se muestra o no a un usuario
CREATE TABLE IF NOT EXISTS Pagina (
    pagid BIGINT,
    pagnom VARCHAR(40),
    pagarc VARCHAR(100),
    pagmos INT,
    pagord INT,
    pagmen VARCHAR(30),
    cuenta VARCHAR(50),
    CONSTRAINT pk_pagid PRIMARY KEY (pagid),
    -- Aca inserto como llave foranea mi tabla cuenta
    CONSTRAINT fk_cuenta_pagina FOREIGN key (cuenta)
    REFERENCES Cuentas (id_cuenta)
);

-- Tabla Agregada Perfil

DROP TABLE IF EXISTS Perfil;

CREATE TABLE IF NOT EXISTS Perfil (
    pefid BIGINT,
    pefnom VARCHAR(50),
    CONSTRAINT pk_pefid PRIMARY KEY (pefid)
);

-- Tabla Agregada Pagper
DROP TABLE IF EXISTS Pagper;
-- Join table
CREATE TABLE IF NOT EXISTS Pagper (
    pagid BIGINT,
    pefid BIGINT,
    CONSTRAINT pk_pagper PRIMARY KEY (pagid, pefid),
    CONSTRAINT fk_pagid_pagper  FOREIGN KEY (pagid) REFERENCES Pagina (pagid),
    CONSTRAINT fk_pefid_pagper FOREIGN KEY (pefid) REFERENCES Perfil (pefid)
    
);




-- Tabla tipo de telefono
DROP TABLE IF EXISTS TipoTelefonos;

CREATE TABLE IF NOT EXISTS TipoTelefonos (
    id_tipo_telefono INT NOT NULL AUTO_INCREMENT,
    desc_tipo_telefono VARCHAR(25) NOT NULL,
    CONSTRAINT pk_tipo_telefono PRIMARY KEY (id_tipo_telefono)
);



-- Tabla telefonos de empresa
DROP TABLE IF EXISTS Telefonos;

CREATE TABLE IF NOT EXISTS Telefonos (
    id_telefono BIGINT NOT NULL AUTO_INCREMENT,
    num_telefono VARCHAR(25) NOT NULL,
    tipo_telefono INT NOT NULL, -- descripcion
    empresa VARCHAR(50) NOT NULL,
    CONSTRAINT pk_telefonos PRIMARY KEY (id_telefono),
    CONSTRAINT fk_empresa_telefonos FOREIGN KEY (empresa)
    REFERENCES Empresas (id_empresa) 
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT fk_tipo_telefono_telefonos FOREIGN KEY (tipo_telefono)
    REFERENCES TipoTelefonos (id_tipo_telefono) 
);




-- Tabla Servicios de empresas
DROP TABLE IF EXISTS Servicios;

CREATE TABLE IF NOT EXISTS Servicios (
    id_servicio BIGINT NOT NULL AUTO_INCREMENT,
    desc_servicio VARCHAR(100) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    empresa VARCHAR(50) NOT NULL,    
    CONSTRAINT pk_servicios PRIMARY KEY (id_servicio),
    CONSTRAINT fk_empresa_servicios FOREIGN KEY (empresa) 
    REFERENCES Empresas (id_empresa) 
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

-- Tabla dominio agregada
DROP TABLE IF EXISTS Dominio;
-- Esta tabla clasfica un producto ejemplo.. dominio electrodomestico, y va junto
-- con la tabla valor.. que indica la sub-clasificacion, electrodomestico/licuadora.
CREATE TABLE IF NOT EXISTS Dominio (
    iddom BIGINT,
    nomdom VARCHAR(50),
    CONSTRAINT pk_iddom PRIMARY KEY (iddom)    
);

-- Tabla valor agregada
DROP TABLE IF EXISTS Valor;
-- la tabla valor.. que indica la sub-clasificacion, electrodomestico/licuadora.
-- va junto con dominio
CREATE TABLE IF NOT EXISTS Valor (
    codval BIGINT,
    iddom BIGINT,
    nom_val VARCHAR(50),
    par_val VARCHAR(100),
    servicio BIGINT NOT NULL,
    CONSTRAINT pk_codval PRIMARY KEY (codval),
    CONSTRAINT fk_iddom_valor FOREIGN KEY (iddom) REFERENCES Dominio (iddom),
    CONSTRAINT fk_servicios_valor FOREIGN KEY (servicio) 
    REFERENCES Servicios (id_servicio)    
);


-- Tabla Ofertas de las empresas 
DROP TABLE IF EXISTS Ofertas;

CREATE TABLE IF NOT EXISTS Ofertas (
    id_oferta BIGINT NOT NULL AUTO_INCREMENT,
    empresa VARCHAR(50) NOT NULL,
    desc_oferta VARCHAR(200) NOT NULL,
    inicio_oferta DATETIME NOT NULL,
    final_oferta DATETIME NOT NULL,
    CONSTRAINT pk_ofertas PRIMARY KEY (id_oferta),
    CONSTRAINT fk_empresa_ofertas FOREIGN KEY (empresa) 
    REFERENCES Empresas (id_empresa) 
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

DROP TABLE IF EXISTS PlanesMobilatingo;

CREATE TABLE IF NOT EXISTS PlanesMobilatingo (
    id_plan INT NOT NULL AUTO_INCREMENT,
    desc_plan VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2),
    dias_vigencia INT NOT NULL,
    CONSTRAINT pk_planes_mobilatingo PRIMARY KEY (id_plan)
        
);

DROP TABLE IF EXISTS OpcionesPago;

CREATE TABLE IF NOT EXISTS OpcionesPago (
    id_opcion_pago INT NOT NULL AUTO_INCREMENT,
    desc_opcion VARCHAR(50) NOT NULL, -- opciones que ofrece mobilatingo (tarjeta, nequi.. etc)
    CONSTRAINT pk_opciones_pago PRIMARY KEY (id_opcion_pago)
        
);


-- Tablas metodos de pago : muestra las opciones de pago que ha utilizado la empresa
DROP TABLE IF EXISTS MetodosPago;

CREATE TABLE IF NOT EXISTS MetodosPago (
    id_metodo_pago INT NOT NULL AUTO_INCREMENT,
    empresa VARCHAR(50) NOT NULL,
    detalle JSON NOT NULL,
    CONSTRAINT pk_metodos_pago PRIMARY KEY (id_metodo_pago),
    CONSTRAINT fk_empresa_metodos_pago FOREIGN KEY (empresa) 
    REFERENCES Empresas (id_empresa)
    ON DELETE CASCADE
    ON UPDATE CASCADE        
);

-- Tabla suscripciones: suscripcion que ha tomado la empresa
DROP TABLE IF EXISTS Suscripciones;

CREATE TABLE IF NOT EXISTS Suscripciones (
    id_suscripcion INT NOT NULL AUTO_INCREMENT,
    empresa VARCHAR(50) NOT NULL,
    plan INT NOT NULL,
    fecha_inicio DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    fecha_fin DATETIME NOT NULL, -- debera ser llenado por las caracteristicas del plan
    estado_suscripcion INT NOT NULL, -- 0 para inactivo, 1 para activo
    metodo_pago INT NOT NULL,
    CONSTRAINT pk_suscripciones PRIMARY KEY (id_suscripcion),
    CONSTRAINT fk_empresa_suscripciones FOREIGN KEY (empresa) 
    REFERENCES Empresas (id_empresa)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT fk_plan_suscripciones FOREIGN KEY (plan) 
    REFERENCES PlanesMobilatingo (id_plan)
    ON UPDATE CASCADE,
    CONSTRAINT fk_metodo_pago_suscripciones FOREIGN KEY (metodo_pago) 
    REFERENCES MetodosPago (id_metodo_pago)
    
);

DROP TABLE if EXISTS Usuarios;
-- Tabla usuarios
CREATE TABLE IF NOT EXISTS Usuarios (
    id_usuario VARCHAR(50) NOT NULL,
    num_contacto VARCHAR(25) NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY (id_usuario)
);


DROP TABLE if EXISTS Agendas;
-- Tabla usuarios agenda
CREATE TABLE IF NOT EXISTS Agendas (
    id_agenda INT NOT NULL AUTO_INCREMENT,
    empresa VARCHAR(50) NOT NULL,
    CONSTRAINT pk_agendas PRIMARY KEY (id_agenda),
    CONSTRAINT fk_empresas_agendas FOREIGN KEY (empresa)
    REFERENCES Empresas (id_empresa)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

DROP TABLE if EXISTS Reservas;
-- Tabla usuarios agenda
CREATE TABLE IF NOT EXISTS Reservas (
    id_reserva BIGINT NOT NULL AUTO_INCREMENT,
    agenda INT NOT NULL,
    usuario VARCHAR(50) NOT NULL,
    fecha_reserva DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    estado_servicio ENUM('ABIERTO', 'EN PROGRESO', 'CERRADO'),
    CONSTRAINT pk_reservas PRIMARY KEY (id_reserva),
    CONSTRAINT fk_agendas_reservas FOREIGN KEY (agenda)
    REFERENCES Agendas (id_agenda)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT fk_usuarios_reservas FOREIGN KEY (usuario)
    REFERENCES Usuarios (id_usuario)
    ON DELETE CASCADE
    ON UPDATE CASCADE

);

DROP TABLE IF EXISTS Comentarios;
-- Tabla comentarios

CREATE TABLE IF NOT EXISTS Comentarios (
    id_comentario BIGINT NOT NULL AUTO_INCREMENT,
    calificacion BIGINT NULL,
    comentario VARCHAR(250) NULL,
    fecha DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    respuesta VARCHAR(250) NULL,
    fecha_repuesta DATETIME NULL,
    email_usuario VARCHAR(50) NOT NULL,
    confirmacion_usuario INT NOT NULL DEFAULT 0, -- El usuario debe ser confirmado para establecer comentario
    empresa VARCHAR(50) NOT NULL,
    CONSTRAINT pk_comentarios PRIMARY KEY (id_comentario),
    CONSTRAINT fk_empresa_comentarios FOREIGN KEY (empresa) 
    REFERENCES Empresas (id_empresa)
    ON DELETE CASCADE
    ON UPDATE CASCADE
     
);















