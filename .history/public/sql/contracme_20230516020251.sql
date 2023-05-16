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
CREATE TABLE IF NOT EXISTS usuario CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    email VARCHAR(100) PRIMARY KEY NOT NULL,
    nombreUser VARCHAR(50) NOT NULL,
    apellido1 VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(60) NULL,
    contrasenia VARCHAR(200) NOT NULL
)ENGINE = INNODB;
-- --------------------------------------
-- Table telefono
-- --------------------------------------
CREATE TABLE IF NOT EXISTS telefono CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci (
    numTlfMovil CHAR(13) PRIMARY KEY NOT NULL,
    numTlfTrabajo CHAR(13) NULL,
    email VARCHAR(100) NOT NULL,
    INDEX(email),
    FOREIGN KEY (email) REFERENCES usuario(email) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;
-- --------------------------------------
-- Table empresa
-- --------------------------------------
CREATE TABLE IF NOT EXISTS empresa CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    codEmpresa INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombreEmpresa VARCHAR(100) NOT NULL,
    provincia VARCHAR(70) NOT NULL,
    sector ENUM("Marketing y Comercio","Informática","Industria","Electronica","AudioVisuales")
)ENGINE = INNODB;
-- --------------------------------------
-- Table empresario
-- --------------------------------------
CREATE TABLE IF NOT EXISTS empresario CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    email VARCHAR(100) PRIMARY KEY NOT NULL,
    codEmpresa INT NOT NULL,
    INDEX(codEmpresa),
    FOREIGN KEY (codEmpresa) REFERENCES usuario(email) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = INNODB;
-- --------------------------------------
-- Table expediente
-- --------------------------------------
CREATE TABLE IF NOT EXISTS expediente CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    codExpediente MEDIUMINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    informe BLOB NOT NULL UNIQUE,
    incidencias INT NULL
)ENGINE = INNODB;
-- --------------------------------------
-- Table aspirante
-- --------------------------------------
CREATE TABLE IF NOT EXISTS aspirante CHARACTER SET utf8mb4_spanish_ci COLLATE utf8mb4_spanish_ci(
    email VARCHAR(100) PRIMARY KEY NOT NULL,
    fechaNac DATE NOT NULL,
    dni CHAR(9) NOT NULL UNIQUE,
    familia ENUM("Informática","Administración","Maketing y comercio") NOT NULL,
    grado ENUM("GB","GM","GS") NOT NULL,
    expediente MEDIUMINT NOT NULL,
    INDEX(expediente),
    FOREIGN KEY (expediente) REFERENCES expediente(codExpediente) ON UPDATE RESTRICT ON DELETE RESTRICT
)ENGINE = INNODB;
-- --------------------------------------
-- Table estudios
-- --------------------------------------
CREATE TABLE IF NOT EXISTS estudios CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    idTitulo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    centro VARCHAR(100) NOT NULL,
    formacion ENUM("ESO","Bach","U","FP") NOT NULL
    familia ENUM("Ciencias","Letras") NULL,
    curso INT NOT NULL,
    año DATE NOT NULL
)ENGINE = INNODB;
-- --------------------------------------
-- Table experiencia
-- --------------------------------------
CREATE TABLE IF NOT EXISTS experiencia CHARACTER SET utf8mb4_spanish_ci(
    idExperiencia INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    empresa VARCHAR(60) NOT NULL,
    añoInicio DATE NOT NULL,
    añoFin DATE NOT NULL,
    sector ENUM("Marketing y Comercio","Informática","Industria","Electronica","AudioVisuales")
)ENGINE = INNODB;
-- --------------------------------------
-- Table aptitudes
-- --------------------------------------
CREATE TABLE IF NOT EXISTS aptitudes CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    idAptitud INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombreAptitud VARCHAR(70) NOT NULL,
    icono BLOB NULL
)ENGINE = INNODB;
-- --------------------------------------
-- Table idiomas
-- --------------------------------------
CREATE TABLE IF NOT EXISTS idiomas CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    idIdiomas INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idioma ENUM("En","Al","Sp","Fr","It","Jp","Ar")
    nivel ENUM("native","B1","B2","Advance","C1","C2")
)ENGINE = INNODB;
-- --------------------------------------
-- Table direccion
-- --------------------------------------
CREATE TABLE IF NOT EXISTS direccion CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    idDireccion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    codPostal CHAR(5) NOT NULL,
    calle VARCHAR(100) NOT NULL,
    localidad VARCHAR(100) NOT NULL,
    edificio INT NOT NULL
)ENGINE = INNODB;
-- --------------------------------------
-- Table aficciones
-- --------------------------------------
CREATE TABLE IF NOT EXISTS aficciones CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    idAficcion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombreAficcion VARCHAR(70) NOT NULL,
    descripcion TEXT NOT NULL
)ENGINE = INNODB;
-- -------------------------------------
-- Table curriculum
-- -------------------------------------
CREATE TABLE IF NOT EXISTS curriculum CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    codCurriculum INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    INDEX(email),
    FOREIGN KEY (email) REFERENCES aspirante(email)
)ENGINE = INNODB;
-- --------------------------------------
-- Table filtroEstudios
-- --------------------------------------
CREATE TABLE IF NOT EXISTS filtroEstudios CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    estudios INT NOT NULL AUTO_INCREMENT,
    curriculum INT NOT NULL,
    PRIMARY KEY(estudios, curriculum),
    INDEX(estudios, curriculum),
    FOREIGN KEY (estudios) REFERENCES estudios(idEstudios) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (curriculum) REFERENCES curriculum(codCurriculum) ON UPDATE RESTRICT ON DELETE RESTRICT
)ENGINE = INNODB;

-- --------------------------------------
-- Table filtroExperiencia
-- --------------------------------------

CREATE TABLE IF NOT EXISTS filtroExperiencia CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    experiencia INT NOT NULL AUTO_INCREMENT,
    curriculum INT NOT NULL,
    PRIMARY KEY(experiencia, curriculum),
    INDEX(experiencia, curriculum),
    FOREIGN KEY (experiencia) REFERENCES experiencia(idExperiencia) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (curriculum) REFERENCES curriculum(codCurriculum) ON UPDATE RESTRICT ON DELETE RESTRICT
)ENGINE = INNODB;
-- --------------------------------------
-- Table filtroAptitudes
-- --------------------------------------
CREATE TABLE IF NOT EXISTS filtroAptitudes CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    aptitudes INT NOT NULL AUTO_INCREMENT,
    curriculum INT NOT NULL,
    PRIMARY KEY(aptitudes, curriculum),
    INDEX(aptitudes, curriculum),
    FOREIGN KEY (aptitudes) REFERENCES aptitudes(idAptitudes) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (curriculum) REFERENCES curriculum(codCurriculum) ON UPDATE RESTRICT ON DELETE RESTRICT
)ENGINE = INNODB;
-- --------------------------------------
-- Table filtroIdiomas
-- --------------------------------------
CREATE TABLE IF NOT EXISTS filtroIdiomas CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    idiomas INT NOT NULL AUTO_INCREMENT,
    curriculum INT NOT NULL,
    PRIMARY KEY(idiomas, curriculum),
    INDEX(idiomas, curriculum),
    FOREIGN KEY (idiomas) REFERENCES idiomas(idIdiomas) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (curriculum) REFERENCES curriculum(codCurriculum) ON UPDATE RESTRICT ON DELETE RESTRICT
)ENGINE = INNODB;
-- --------------------------------------
-- Table filtroDireccion
-- --------------------------------------
CREATE TABLE IF NOT EXISTS filtroDireccion CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    direccion INT NOT NULL AUTO_INCREMENT,
    curriculum INT NOT NULL,
    PRIMARY KEY(direccion, curriculum),
    INDEX(direccion, curriculum),
    FOREIGN KEY (direccion) REFERENCES direccion(idDireccion) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (curriculum) REFERENCES curriculum(codCurriculum) ON UPDATE RESTRICT ON DELETE RESTRICT
)ENGINE = INNODB;

-- --------------------------------------
-- Table filtroAficiones
-- --------------------------------------
CREATE TABLE IF NOT EXISTS filtroAficciones CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci(
    aficciones INT NOT NULL AUTO_INCREMENT,
    curriculum INT NOT NULL,
    PRIMARY KEY(aficciones, curriculum),
    INDEX(aficciones, curriculum),
    FOREIGN KEY (aficciones) REFERENCES aficciones(idAficciones) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (curriculum) REFERENCES curriculum(codCurriculum) ON UPDATE RESTRICT ON DELETE RESTRICT
)ENGINE = INNODB;
