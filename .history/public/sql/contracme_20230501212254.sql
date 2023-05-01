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
    second_surname VARCHAR(50) NULL,
    email VARCHAR(100) NOT NULL,
    tlfMovil CHAR(10) NULL,
    passwordd VARCHAR(150) NOT NULL
) ENGINE = INNODB;
-- ---------------------------------------
-- Table telefono
-- ---------------------------------------
DROP TABLE IF EXISTS telefono;
CREATE IF NOT EXISTS  (

)ENGINE = INNODB;