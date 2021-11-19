CREATE DATABASE IF NOT EXISTS usuarios;
USE usuarios;
CREATE TABLE IF NOT EXISTS usuarios(
    id bigint unsigned not null auto_increment,
    correo varchar(255) not null unique, 
    contrasena varchar(255) not null,
    empresa varchar(255) not null,
    primary key(id)
);

CREATE TABLE IF NOT EXISTS tickets(
    id bigint unsigned not null auto_increment,
    descripcion varchar(255) not null,
    fecha varchar(255),
    empresa varchar(100),
    correo_usuario varchar(100),
    estado varchar(50) default 'EN PROCESO',
    primary key(id)
);