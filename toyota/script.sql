create database toyota;
use toyota;
create table cadastro(
cod_cli bigint not null auto_increment primary key,
nome_cli varchar(200) not null,
telefone VARCHAR(11) not null unique,
email varchar(200) not null unique,
senha VARCHAR(255) not null,
carro ENUM('sim','nao') not null,
marca varchar(200) not null,
modelo varchar(200) not null,
ano YEAR not null
);
create table login(
usuario varchar(200) not null unique primary key,
senha varchar(255) not null,
data_cad DATE not null
);