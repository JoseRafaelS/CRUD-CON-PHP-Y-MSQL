
/* Script base de datos */

CREATE DATABASE usuario;

USE usuario;

CREATE TABLE persona(
    id INT auto_increment NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    CONSTRAINT pk_usuario PRIMARY KEY(id)
)ENGINE=InnoDB;