CREATE DATABASE IF NOT EXISTS hotel;

use hotel;

CREATE TABLE IF NOT EXISTS tbempresa (
    id_empresa int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(30),
    endereco varchar(60),
    telefone varchar(20),
    categoria varchar(20),
    email varchar(30)
);

CREATE TABLE IF NOT EXISTS tbservicos_oferecidos (
    id_servico int PRIMARY KEY AUTO_INCREMENT,
    tipo_servico varchar(40),
    preco_diaria float(20),
    epoca_ano varchar(10)
);

CREATE TABLE IF NOT EXISTS tbclientes (
    id_cliente int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(30),
    nacionalidade varchar(30),
    data_nascimento date,
    endereco varchar(40),
    telefone varchar(20),
    numero int(5),
    identidade varchar(20),
    passaporte varchar(30),
    email varchar(40),
    senha varchar(12)
);

CREATE TABLE IF NOT EXISTS tbfuncionarios (
    id_funcionario int PRIMARY KEY AUTO_INCREMENT,
    empresa varchar(15),
    nome varchar(30),
    login varchar(15),
    senha varchar(12),
    funcao varchar(20),
    fk_empresa int 
);
ALTER TABLE tbfuncionarios add foreign key (fk_empresa) references tbempresa(id_empresa);

CREATE TABLE IF NOT EXISTS tbalojamentos (
    id_alojamento int PRIMARY KEY AUTO_INCREMENT,
    capacidade int,
    numero int
);


CREATE TABLE IF NOT EXISTS tbreservas (
    id_reserva int PRIMARY KEY AUTO_INCREMENT,
    data_entrada date,
    data_saida date,
    numero_pessoas int(2),
    cartao_credito varchar(20),
    data_saida_prevista date,
    fk_servico int,
    fk_cliente int,
    fk_estadia int
);


CREATE TABLE tbestadias (
    id_estadia int PRIMARY KEY AUTO_INCREMENT,
    fk_alojamento int,
    fk_servico int,
    fk_reserva int
);

ALTER TABLE tbestadias add foreign key (fk_alojamento) 
references tbalojamentos(id_alojamento);
 
 ALTER TABLE tbestadias ADD FOREIGN KEY (fk_servico)
REFERENCES tbservicos_oferecidos(id_servico);

 ALTER TABLE tbestadias ADD FOREIGN KEY (fk_reserva)
REFERENCES tbreservas(id_reserva);

 
ALTER TABLE tbreservas ADD FOREIGN KEY (fk_servico)
REFERENCES tbservicos_oferecidos(id_servico);

ALTER TABLE tbreservas ADD FOREIGN KEY (fk_cliente)
REFERENCES tbclientes(id_cliente);

ALTER TABLE tbreservas ADD FOREIGN KEY (fk_estadia)
REFERENCES tbestadias(id_estadia);

