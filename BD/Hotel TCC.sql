CREATE DATABASE IF NOT EXISTS hotel;

use hotel;

CREATE TABLE IF NOT EXISTS Empresa (
    id_empresa int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(40),
    endereco varchar(60),
    telefone varchar(20),
    categoria varchar(20),
    email varchar(60)
);

CREATE TABLE IF NOT EXISTS Quarto (
    id_quarto INTEGER PRIMARY KEY AUTO_INCREMENT,
    numero INTEGER,
    capacidade_pessoa INTEGER,
    fk_empresa_id INTEGER, 
    FOREIGN KEY (fk_empresa_id) REFERENCES Empresa(id_empresa)
);

CREATE TABLE IF NOT EXISTS Empregado (
    id_empregado INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(40),
    fk_funcao_empregado_id INTEGER,
    FOREIGN KEY (fk_funcao_empregado_id) REFERENCES Funcao_Empregado(id_funcao_empregado),
    fk_empresa_id INTEGER,
    FOREIGN KEY (fk_empresa_id) REFERENCES Empresa(id_empresa),
    fk_login_id INTEGER,
    FOREIGN KEY (fk_login_id) REFERENCES Login(id_login)
);

CREATE TABLE IF NOT EXISTS Servico (
    id_servico INTEGER PRIMARY KEY AUTO_INCREMENT,
    periodo_inicial DATE,
    periodo_final DATE,
    qtd_pessoa INTEGER,
    valor DOUBLE,
    fk_quarto_id INTEGER,
    FOREIGN KEY (fk_quarto_id) REFERENCES Quarto(id_quarto)
);

CREATE TABLE IF NOT EXISTS Funcao_Empregado (
    id_funcao_empregado INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome_funcao VARCHAR(35)
);

CREATE TABLE IF NOT EXISTS Cliente (
    id_cliente INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(40),
    fk_empresa_id INTEGER,
    fk_login_id INTEGER,
    nacionalidade VARCHAR(18),
    dt_nascimento DATE,
    morada VARCHAR(30),
    telefone VARCHAR(20),
    numero  INTEGER,
    documento VARCHAR(20),
    email varchar(60)
);

CREATE TABLE IF NOT EXISTS Reserva (
    id_reserva INTEGER PRIMARY KEY AUTO_INCREMENT,
    qtd_pessoa INTEGER,
    dt_entrada DATE,
    dt_saida DATE,
    servico VARCHAR(250),
    status_reserva INTEGER,
    fk_empregado_id INTEGER,
    FOREIGN KEY (fk_empregado_id) REFERENCES Empregado(id_empregado)
);

CREATE TABLE IF NOT EXISTS Estadia (
    id_estadia INTEGER PRIMARY KEY AUTO_INCREMENT,
    dt_entrada DATE,
    dt_saida DATE,
    servico VARCHAR(250),
    fk_empregado_id INTEGER,
    FOREIGN KEY (fk_empregado_id) REFERENCES Empregado(id_empregado)
);

CREATE TABLE IF NOT EXISTS Quarto_Reserva (
    id_quarto_reserva INTEGER PRIMARY KEY AUTO_INCREMENT,
    fk_quarto_id INTEGER,
    FOREIGN KEY (fk_quarto_id) REFERENCES Quarto(id_quarto),
    fk_reserva_id INTEGER,
    FOREIGN KEY (fk_reserva_id) REFERENCES Reserva(id_reserva)
);

CREATE TABLE Pode_ter_Cliente_Reserva_Estadia (
    id_cliente_reserva_estadia INTEGER PRIMARY KEY AUTO_INCREMENT,
    fk_cliente_id INTEGER,
	FOREIGN KEY (fk_cliente_id) REFERENCES Cliente(id_cliente),
    fk_reserva_id INTEGER,
	FOREIGN KEY (fk_reserva_id) REFERENCES Reserva(id_reserva),
    fk_estadia_id INTEGER,
	FOREIGN KEY (fk_estadia_id) REFERENCES Estadia(id_estadia),
    fk_fatura_id INTEGER,
	FOREIGN KEY (fk_fatura_id) REFERENCES Fatura(id_fatura)
);

CREATE TABLE IF NOT EXISTS Fatura (
    id_fatura INTEGER PRIMARY KEY AUTO_INCREMENT,
    dt_pagamento DATE,
    valor_pagamento DOUBLE
);

CREATE TABLE IF NOT EXISTS Login (
    id_login INTEGER PRIMARY KEY AUTO_INCREMENT,
    Login VARCHAR(30),
    Senha  VARCHAR(12)
);

CREATE TABLE IF NOT EXISTS Pagamento (
    id_pagamento INTEGER PRIMARY KEY AUTO_INCREMENT,
    num_cartao INTEGER,
    dt_vencimento_cartao DATE,
    cod_seguranca_cartao INTEGER
);
 