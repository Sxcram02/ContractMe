-- --------------------------------------
-- MySQL Script by Marcos DOminguez
-- @charset=utf8mb4
-- @collation = utf8mb4_spanish_ci
-- --------------------------------------
-- Schema contractMe
-- --------------------------------------
DROP DATABASE IF EXISTS contractMe;
CREATE DATABASE IF NOT EXISTS contractMe CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE contractMe;
-- ---------------------------------------
-- Table users
-- ---------------------------------------
DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
    idUser INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userName VARCHAR(45) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    2surname VARCHAR(50) NULL,
    passwordd VARCHAR(100) NOT NULL,
    second_surname VARCHAR(50) NULL,
    email VARCHAR(100) NOT NULL,
    tlfMovil CHAR(10) NULL
) ENGINE = INNODB;
-- ---------------------------------------
-- Table telefono
-- ---------------------------------------
DROP TABLE IF EXISTS telefono;
CREATE IF NOT EXISTS telefono (
    phoneNumber CHAR(12) NOT NULL PRIMARY KEY,
    phoneHome CHAR(12) NULL,
)ENGINE = INNODB;
-- ---------------------------------------
-- Table aspirante
-- ---------------------------------------
DROP TABLE IF EXISTS aspirante;
CREATE TABLE IF NOT EXISTS aspirante (
    idAspirante INT NOT NULL PRIMARY KEY,
    idUser INT NOT NULL,
    INDEX(idUser),
    FOREIGN KEY (idUser) REFERENCES users(idUser) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = INNODB;
-- ----------------------------------------
-- Table experience
-- ----------------------------------------
DROP TABLE IF EXISTS experience;
