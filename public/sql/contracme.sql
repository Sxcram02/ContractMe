-- --------------------------------------
-- MySQL Script by Marcos DOminguez
-- @charset=utf8mb4
-- @collation = utf8mb4_spanish_ci
-- --------------------------------------
-- Schema contractMe
-- --------------------------------------

DROP DATABASE IF EXISTS contractme;
CREATE DATABASE IF NOT EXISTS contractMe CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE contractme;
-- --------------------------------------
-- Table expediente
-- --------------------------------------
DROP TABLE IF EXISTS expediente;
CREATE TABLE IF NOT EXISTS expediente(

    codExpediente INT NOT NULL PRIMARY KEY,
    boletin INT NOT NULL,
    retrasos INT NOT NULL DEFAULT 0,
    faltas INT NOT NULL DEFAULT 0,
    incidencias INT NOT NULL DEFAULT 0

)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table usuario
-- --------------------------------------
DROP TABLE IF EXISTS usuario;
CREATE TABLE IF NOT EXISTS usuario(

    idUsuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(40) NOT NULL,
    apellido1 VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(50) NULL DEFAULT NULL,
    contrasenia VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL,
    fechaNacimiento DATE NOT NULL,
    tipoUsuario ENUM("Empresario","Aspirante","Docente") NOT NULL,
    codExpediente INT NULL DEFAULT NULL,
    FOREIGN KEY (codExpediente) REFERENCES expediente(codExpediente) ON UPDATE RESTRICT ON DELETE CASCADE

)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table telefono
-- --------------------------------------
DROP TABLE IF EXISTS telefono;
CREATE TABLE IF NOT EXISTS telefono(

    tlfMovil CHAR(13) NOT NULL PRIMARY KEY,
    tlfTrabajo VARCHAR(14) NULL DEFAULT NULL,
    idUsuario INT NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE

)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table direccion
-- --------------------------------------
DROP TABLE IF EXISTS direccion;
CREATE TABLE IF NOT EXISTS direccion(

    idDireccion INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    codPostal CHAR(5) NOT NULL,
    calle VARCHAR(70) NOT NULL,
    edificio INT NULL DEFAULT NULL,
    idUsuario INT NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE 

)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;
-- --------------------------------------
-- Table empresa
-- --------------------------------------
DROP TABLE IF EXISTS empresa;
CREATE TABLE IF NOT EXISTS empresa(

    idEmpresa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(80) NOT NULL,
    provincia VARCHAR(50) NOT NULL,
    sector ENUM("Informática","Marketing y Comercio","Administración") NOT NULL,
    idUsuario INT NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE

)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;


-- ----------------------------------------------------------------------------

-- -------------------------------------
-- Table curriculum
-- -------------------------------------
DROP TABLE IF EXISTS curriculum;
CREATE TABLE IF NOT EXISTS curriculum(

    idCurriculum INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    autor VARCHAR(50) NOT NULL,
    introduccion TEXT NOT NULL,
    idUsuario INT NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE

)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;
-- --------------------------------------
-- Table estudio
-- --------------------------------------
DROP TABLE IF EXISTS estudio;
CREATE TABLE IF NOT EXISTS estudio(

    idEstudio INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    centro VARCHAR(70) NOT NULL,
    formacion ENUM("Bachillerato","Grado Universitario","GM","GS","GB"),
    familia ENUM("administracion","marketing y comercio","informática"),
    curso INT NULL,
    anio DATE NOT NULL

)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table experiencia
-- --------------------------------------
DROP TABLE IF EXISTS experiencia;
CREATE TABLE IF NOT EXISTS experiencia(

    idExperencia INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    empresa VARCHAR(70) NOT NULL,
    duracion INT NOT NULL,
    sector ENUM("Informática","Comercio","Autónomo","Consultoría") NOT NULL,
    cargo VARCHAR(80) NULL DEFAULT NULL

)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table aptitud
-- --------------------------------------
DROP TABLE IF EXISTS aptitud;
CREATE TABLE IF NOT EXISTS aptitud(

    idAptitud INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    descripcion TEXT NULL DEFAULT NULL

)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table idioma
-- --------------------------------------
DROP TABLE IF EXISTS idioma;
CREATE TABLE IF NOT EXISTS idioma(

    idIdioma INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idioma VARCHAR(60) NOT NULL,
    nivel ENUM("A1","A2","B1","B2","C1")

)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table aficcion
-- --------------------------------------
DROP TABLE IF EXISTS aficcion;
CREATE TABLE IF NOT EXISTS aficcion(

    idAficcion INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NULL DEFAULT NULL

)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;


-- ---------------------------------------------------------------

-- --------------------------------------
-- Table filtroEstudio
-- --------------------------------------
DROP TABLE IF EXISTS filtroEstudio;
CREATE TABLE IF NOT EXISTS filtroEstudio(

    idCurriculum INT NOT NULL,
    idEstudio INT NOT NULL,

    FOREIGN KEY (idCurriculum) REFERENCES curriculum(idCurriculum) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idEstudio) REFERENCES estudio(idEstudio) ON UPDATE CASCADE ON DELETE CASCADE

)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table filtroExperiencia
-- --------------------------------------
DROP TABLE IF EXISTS filtroExperiencia;
CREATE TABLE IF NOT EXISTS filtroExperiencia(

    idCurriculum INT NOT NULL,
    idExperencia INT NOT NULL,

    FOREIGN KEY (idCurriculum) REFERENCES curriculum(idCurriculum) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idExperencia) REFERENCES experiencia(idExperencia) ON UPDATE CASCADE ON DELETE CASCADE
    
)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table filtroAptitud
-- --------------------------------------
DROP TABLE IF EXISTS filtroAptitud;
CREATE TABLE IF NOT EXISTS filtroAptitud(

    idCurriculum INT NOT NULL,
    idAptitud INT NOT NULL,

    FOREIGN KEY (idCurriculum) REFERENCES curriculum(idCurriculum) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idAptitud) REFERENCES aptitud(idAptitud) ON UPDATE CASCADE ON DELETE CASCADE
    
)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table filtroIdioma
-- --------------------------------------
DROP TABLE IF EXISTS filtroIdioma;
CREATE TABLE IF NOT EXISTS filtroIdioma(

    idCurriculum INT NOT NULL,
    idIdioma INT NOT NULL,

    FOREIGN KEY (idCurriculum) REFERENCES curriculum(idCurriculum) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idIdioma) REFERENCES idioma(idIdioma) ON UPDATE CASCADE ON DELETE CASCADE
    
)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;
-- --------------------------------------
-- Table filtroAficcion
-- --------------------------------------
DROP TABLE IF EXISTS filtroAficcion;
CREATE TABLE IF NOT EXISTS filtroAficcion(

    idCurriculum INT NOT NULL,
    idAficcion INT NOT NULL,

    FOREIGN KEY (idCurriculum) REFERENCES curriculum(idCurriculum) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idAficcion) REFERENCES aficcion(idAficcion) ON UPDATE CASCADE ON DELETE CASCADE
    
)ENGINE = INNODB DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;
