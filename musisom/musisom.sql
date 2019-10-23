drop database if exists musisom;
create database musisom;
CREATE TABLE produtos
(
 codigo int(3) NOT NULL auto_increment,
 tipo varchar(70) ,
 marca varchar(70) ,
 descricao varchar(100) ,
 valor varchar(70),
 qtd_estoque varchar(15),
 valor_total varchar(200),
 foto varchar(200),
 PRIMARY KEY (codigo),
 KEY codigo (codigo)
);

