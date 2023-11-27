DROP SCHEMA IF EXISTS mobilatingodb;

CREATE SCHEMA IF NOT EXISTS mobilatingodb;

USE mobilatingodb;

DROP TABLE IF EXISTS Configuracion;

-- Esta tabla es la configuracion de lo que mostramos en nuesto footer, 
-- son los datos de nuestra

CREATE TABLE IF NOT EXISTS Configuracion (
    idconfig BIGINT NOT NULL DEFAULT 1,
    nit VARCHAR(13) NOT NULL DEFAULT '900-888-777-0',
    nomemp VARCHAR(50) NOT NULL DEFAULT 'Mobilatingo',
    dircon VARCHAR(100) NOT NULL DEFAULT 'Cra 5 # 7-90 Edificio Ojera Ofc 101', 
    mosdir INT NOT NULL DEFAULT 1,  -- Mostrar Direccion
    telcon VARCHAR(20) NOT NULL DEFAULT '+57-601-779955',
    mostel INT NOT NULL DEFAULT 1,  -- Mostrar Telefono
    celcon VARCHAR(20) NOT NULL DEFAULT '+57-316-7799559',
    moscel INT NOT NULL DEFAULT 1,  -- Mostrar Celular
    emacon VARCHAR(100) NOT NULL DEFAULT 'admin@mobilatingo.com',
    mosema INT NOT NULL DEFAULT 1,  -- Mostrar Email
    mosface INT NOT NULL DEFAULT 1,
    mosinst INT NOT NULL DEFAULT 1,
    moswass INT NOT NULL DEFAULT 1,
    mosx INT NOT NULL DEFAULT 1,
    CONSTRAINT pk_idconfig PRIMARY KEY (idconfig)    
);


DROP TABLE IF EXISTS Faq;
CREATE TABLE IF NOT EXISTS Faq (
    id_faq INT NOT NULL AUTO_INCREMENT,
    question VARCHAR(1000) NOT NULL,
    answer VARCHAR(1000) NOT NULL,
    activo INT NOT NULL DEFAULT 1,
    
    CONSTRAINT pk_idfaq PRIMARY KEY (id_faq) 
);


DROP TABLE IF EXISTS Acerca;
CREATE TABLE IF NOT EXISTS Acerca (
    id_acerca INT NOT NULL DEFAULT 1,
    texto_acerca VARCHAR(2500) NOT NULL DEFAULT 'TEXTO ACA',
    
    CONSTRAINT pk_idacerca PRIMARY KEY (id_acerca) 
);

-- Tabla Menus 


-- Tabla Agregada Pagina

DROP TABLE IF EXISTS Pagina;
-- Esta tabla nos indica si una pagina con id se muestra o no a un usuario
CREATE TABLE IF NOT EXISTS Pagina (
    pagid BIGINT,
    pagnom VARCHAR(40),
    pagarc VARCHAR(100),
    pagmos INT,
    pagord INT, -- orden en el menu
    pagmen VARCHAR(30), -- Pag menu
    
    CONSTRAINT pk_pagid PRIMARY KEY (pagid)
    -- Aca inserto como llave foranea mi tabla cuenta

);

-- Tabla Agregada Perfil

DROP TABLE IF EXISTS Perfil;

CREATE TABLE IF NOT EXISTS Perfil (
    pefid BIGINT,
    pefnom VARCHAR(50),
    activo INT DEFAULT 1,
    CONSTRAINT pk_pefid PRIMARY KEY (pefid)
);

-- Tabla Agregada Pagper
DROP TABLE IF EXISTS Pagper;
-- Join table
CREATE TABLE IF NOT EXISTS Pagper (
    pagid BIGINT,
    pefid BIGINT,
    CONSTRAINT pk_pagper PRIMARY KEY (pagid, pefid),
    CONSTRAINT fk_pagid_pagper  FOREIGN KEY (pagid) REFERENCES Pagina (pagid)
	ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT fk_pefid_pagper FOREIGN KEY (pefid) REFERENCES Perfil (pefid)
    
);

-- Tabla cuenta ppal

DROP TABLE IF EXISTS Cuentas;
CREATE TABLE IF NOT EXISTS Cuentas (
    -- El id de la cuenta es el correo electronico.
    id_cuenta VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    perfil BIGINT,
    activo BIGINT NOT NULL DEFAULT 1,
    
    CONSTRAINT pk_cuentas PRIMARY KEY (id_cuenta),
    CONSTRAINT fk_perfil_cuentas FOREIGN KEY (perfil)
    REFERENCES Perfil (pefid)
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
    contacto VARCHAR(250) NULL,
    servicios VARCHAR(2000) NULL,
    CONSTRAINT pk_empresa PRIMARY KEY (id_empresa),
    -- Referenciando a la tabla cuenta padre
    CONSTRAINT fk_empresas FOREIGN KEY (id_empresa)
    REFERENCES Cuentas (id_cuenta)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT fk_ubicacion_empresas FOREIGN KEY (ubicacion)
    REFERENCES UbicacionEmpresas (id_ubicacion)

);




DROP TABLE IF EXISTS Planes_Mobilatingo;

CREATE TABLE IF NOT EXISTS Planes_Mobilatingo (
    id_plan INT NOT NULL AUTO_INCREMENT,
    nom_plan VARCHAR(100) NOT NULL,
    desc_plan VARCHAR(1500) NOT NULL,
    valor_plan DECIMAL(10,2),
    dias_vigencia INT NOT NULL,
    activo INT NOT NULL DEFAULT 1, 
    CONSTRAINT pk_planes_mobilatingo PRIMARY KEY (id_plan)
        
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
   
    CONSTRAINT pk_suscripciones PRIMARY KEY (id_suscripcion),
    CONSTRAINT fk_empresa_suscripciones FOREIGN KEY (empresa) 
    REFERENCES Empresas (id_empresa)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT fk_plan_suscripciones FOREIGN KEY (plan) 
    REFERENCES Planes_Mobilatingo (id_plan)
    ON UPDATE CASCADE    
);


















