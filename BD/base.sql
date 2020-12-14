create database agenda;
use agenda;

create table t_categorias(id_categoria int AUTO_INCREMENT PRIMARY KEY,
                          nombre_categoria varchar(255),
                          descripcion varchar(255));

create table t_contacto(id_contacto int AUTO_INCREMENT PRIMARY KEY,
                        nombre_contacto varchar(255),
                        a_paterno varchar(255),
                        a_materno varchar(255),
                        telefono varchar(10),
                        email varchar(255),
                        id_categoria int,
                        FOREIGN KEY(id_categoria) REFERENCES t_categorias(id_categoria));

create table t_usuario(id_usuario int AUTO_INCREMENT PRIMARY KEY,
                        nombre_usuario varchar(255),
                        password varchar(255));
