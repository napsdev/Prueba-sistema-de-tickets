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

CREATE TABLE IF NOT EXISTS empresa(
    id bigint unsigned not null,
    nombre varchar (100),
    nit varchar (100),
    descripcion varchar (255),
    primary key(id)
);

INSERT INTO empresa (id, nombre, nit, descripcion) VALUES 
(1,'Empresa1', '10203040', 'Diseñar y desarrollar sistemas de información para empresas.'),
(2,'Empresa2', '10203040', 'Diseñar sistemas de información para empresas.'),
(3,'Empresa3', '10203040', 'Automatizar sistemas de información para empresas.'),
(4,'Empresa4', '10203040', 'Optimizar sistemas de información para empresas.');