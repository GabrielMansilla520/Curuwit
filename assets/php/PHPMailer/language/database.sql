CREATE DATABASE IF NOT EXISTS curuwit_database;
USE curuwit_database;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    nombre_usuario VARCHAR(50) UNIQUE,
    correo VARCHAR(50) UNIQUE,
    contrasena VARCHAR(255),
    fecha_nacimiento DATE,
    recordar_contraseña BOOLEAN
);
