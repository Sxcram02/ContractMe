-- -----------------------------
-- MySql Script by Marcos Dominguez Vega
-- @charset = utf8mb4
-- @collation = utf8mb4_spanish_ci
-- --------------------------------
-- --------------------------------
-- Schema ContractMe
-- --------------------------------
DROP DATABASE IF EXISTS ContractMe;

CREATE DATABASE IF NOT EXISTS ContractMe CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE ContractMe;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS telefono;
DROP TABLE IF EXISTS aspirante;
-- --------------------------------
-- Table telefono
-- ---------------------------------
CREATE TABLE IF NOT EXISTS telefono (
    tlfMovil CHAR(12) NOT NULL PRIMARY KEY,
    tlfCasa CHAR(9) NULL,
    tlfTrabajo CHAR(9) NULL
) ENGINE = INNODB;
-- --------------------------------
-- Table aspirante
-- --------------------------------
CREATE TABLE IF NOT EXISTS aspirante (
    idAspirante INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nameAspirante VARCHAR(45) NOT NULL,
    contrasena VARCHAR(100) NULL
) ENGINE = INNODB;
-- ---------------------------------
-- Table users
-- --------------------------------
CREATE TABLE IF NOT EXISTS users (
    userId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userName VARCHAR(50) NOT NULL,
    userAp1 VARCHAR(70) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono CHAR(12) NOT NULL,
    aspirante INT NULL,
    INDEX(telefono, aspirante),
    FOREIGN KEY (telefono) REFERENCES telefono(tlfMovil) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (aspirante) REFERENCES aspirante(idAspirante) ON UPDATE RESTRICT ON DELETE CASCADE
) ENGINE = INNODB;

CREATE TRIGGER actualizacion_users
AFTER INSERT ON users
FOR EACH ROW
INSERT INTO contractMe.aspirante (idAspirante, nameAspirante) VALUES (NEW.userId, NEW.userName);

START TRANSACTION;
    INSERT INTO telefono (tlfMovil) VALUES ("+34642363013");
    INSERT INTO users VALUES (1,"Marcos","Dominguez","ms2d0v4@gmail.com","+34642363013", NULL);
COMMIT;


