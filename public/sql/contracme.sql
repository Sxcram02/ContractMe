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
-- Table usuario
-- --------------------------------------
DROP TABLE IF EXISTS usuario;
CREATE TABLE IF NOT EXISTS usuario  (
    idUsuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    nombreUser VARCHAR(50) NOT NULL,
    contrasenia VARCHAR(200) NOT NULL,
    apellido1 VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(60) NULL DEFAULT NULL,
    tipoUsuario ENUM("aspirante","empresario","docente") NOT NULL

)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table telefono
-- --------------------------------------
DROP TABLE IF EXISTS telefono;
CREATE TABLE IF NOT EXISTS telefono  (
    numTlfMovil CHAR(13) PRIMARY KEY NOT NULL,
    numTlfTrabajo CHAR(13) NULL DEFAULT NULL,
    idUsuario INT NOT NULL,

    INDEX(idUsuario),
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;
-- --------------------------------------
-- Table empresa
-- --------------------------------------
DROP TABLE IF EXISTS empresa;
CREATE TABLE IF NOT EXISTS empresa (
    codEmpresa INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombreEmpresa VARCHAR(100) NOT NULL,
    provincia VARCHAR(70) NOT NULL,
    sector ENUM("Marketing y Comercio","Informática","Industria","Electronica","AudioVisuales")
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table expediente
-- --------------------------------------
DROP TABLE IF EXISTS expediente;
CREATE TABLE IF NOT EXISTS expediente (
    codExpediente MEDIUMINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    informe BLOB NOT NULL,
    incidencias INT NULL
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table estudios
-- --------------------------------------
DROP TABLE IF EXISTS estudios;
CREATE TABLE IF NOT EXISTS estudios (
    idTitulo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    centro VARCHAR(100) NOT NULL,
    formacion ENUM("ESO","Bach","U","FP") NOT NULL,
    familia ENUM("Ciencias","Letras") NULL DEFAULT NULL,
    curso INT NOT NULL,
    año DATE NOT NULL
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table experiencia
-- --------------------------------------
DROP TABLE IF EXISTS experiencia;
CREATE TABLE IF NOT EXISTS experiencia (
    idExperiencia INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    empresa VARCHAR(60) NOT NULL,
    añoInicio DATE NOT NULL,
    añoFin DATE NOT NULL,
    sector ENUM("Marketing y Comercio","Informática","Industria","Electronica","AudioVisuales")
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table aptitudes
-- --------------------------------------
DROP TABLE IF EXISTS aptitudes;
CREATE TABLE IF NOT EXISTS aptitudes (
    idAptitud INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombreAptitud VARCHAR(70) NOT NULL,
    icono BLOB NULL
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table idiomas
-- --------------------------------------
DROP TABLE IF EXISTS idiomas;
CREATE TABLE IF NOT EXISTS idiomas (
    idIdiomas INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idioma ENUM("En","Al","Sp","Fr","It","Jp","Ar"),
    nivel ENUM("native","B1","B2","Advance","C1","C2")
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table direccion
-- --------------------------------------
DROP TABLE IF EXISTS direccion;
CREATE TABLE IF NOT EXISTS direccion (
    idDireccion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    codPostal CHAR(5) NOT NULL,
    calle VARCHAR(100) NOT NULL,
    localidad VARCHAR(100) NOT NULL,
    edificio INT NOT NULL
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table aficciones
-- --------------------------------------
DROP TABLE IF EXISTS aficciones;
CREATE TABLE IF NOT EXISTS aficciones (
    idAficcion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombreAficcion VARCHAR(70) NOT NULL,
    descripcion TEXT NOT NULL
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- -------------------------------------
-- Table curriculum
-- -------------------------------------
DROP TABLE IF EXISTS curriculum;
CREATE TABLE IF NOT EXISTS curriculum (
    codCurriculum INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idUsuario INT NOT NULL,
    INDEX(idUsuario),
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table filtroEstudios
-- --------------------------------------
DROP TABLE IF EXISTS filtroEstudios;
CREATE TABLE IF NOT EXISTS filtroEstudios (
    estudios INT NOT NULL AUTO_INCREMENT,
    curriculum INT NOT NULL,

    PRIMARY KEY(estudios, curriculum),
    INDEX(estudios, curriculum),

    FOREIGN KEY (estudios) REFERENCES estudios(idTitulo) ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY (curriculum) REFERENCES curriculum(codCurriculum) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;


-- --------------------------------------
-- Table filtroExperiencia
-- --------------------------------------
DROP TABLE IF EXISTS filtroExperiencia;
CREATE TABLE IF NOT EXISTS filtroExperiencia (
    experiencia INT NOT NULL AUTO_INCREMENT,
    curriculum INT NOT NULL,

    PRIMARY KEY(experiencia, curriculum),
    INDEX(experiencia, curriculum),

    FOREIGN KEY (experiencia) REFERENCES experiencia(idExperiencia) ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY (curriculum) REFERENCES curriculum(codCurriculum) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table filtroAptitudes
-- --------------------------------------
DROP TABLE IF EXISTS filtroAptitudes;
CREATE TABLE IF NOT EXISTS filtroAptitudes (
    aptitudes INT NOT NULL AUTO_INCREMENT,
    curriculum INT NOT NULL,

    PRIMARY KEY(aptitudes, curriculum),
    INDEX(aptitudes, curriculum),

    FOREIGN KEY (aptitudes) REFERENCES aptitudes(idAptitud) ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY (curriculum) REFERENCES curriculum(codCurriculum) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table filtroIdiomas
-- --------------------------------------
DROP TABLE IF EXISTS filtroIdiomas;
CREATE TABLE IF NOT EXISTS filtroIdiomas (
    idiomas INT NOT NULL AUTO_INCREMENT,
    curriculum INT NOT NULL,

    PRIMARY KEY(idiomas, curriculum),
    INDEX(idiomas, curriculum),

    FOREIGN KEY (idiomas) REFERENCES idiomas(idIdiomas) ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY (curriculum) REFERENCES curriculum(codCurriculum) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table filtroDireccion
-- --------------------------------------
DROP TABLE IF EXISTS filtroDireccion;
CREATE TABLE IF NOT EXISTS filtroDireccion (
    direccion INT NOT NULL AUTO_INCREMENT,
    curriculum INT NOT NULL,

    PRIMARY KEY(direccion, curriculum),
    INDEX(direccion, curriculum),

    FOREIGN KEY (direccion) REFERENCES direccion(idDireccion) ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY (curriculum) REFERENCES curriculum(codCurriculum) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;

-- --------------------------------------
-- Table filtroAficiones
-- --------------------------------------
DROP TABLE IF EXISTS filtroAficcion;
CREATE TABLE IF NOT EXISTS filtroAficcion (
    aficciones INT NOT NULL AUTO_INCREMENT,
    curriculum INT NOT NULL,

    PRIMARY KEY(aficciones, curriculum),
    INDEX(aficciones, curriculum),

    FOREIGN KEY (aficciones) REFERENCES aficciones(idAficcion) ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY (curriculum) REFERENCES curriculum(codCurriculum) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE utf8mb4_spanish_ci;
