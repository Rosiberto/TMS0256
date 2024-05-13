CREATE DATABASE IF NOT EXISTS hotel;

use hotel;

CREATE TABLE Empresa (
    id_empresa int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(40),
    endereco varchar(60),
    telefone varchar(20),
    categoria varchar(20),
    email varchar(60)
);

CREATE TABLE Quarto (
    id_quarto INTEGER PRIMARY KEY AUTO_INCREMENT,
    numero INTEGER,
    capacidade_pessoa INTEGER,
    fk_Empresa_ID INTEGER
);

CREATE TABLE Empregado (
    id_empregado INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(40),
    fk_funcao_empregado_id INTEGER,
    fk_empresa_id INTEGER,
    fk_login_id INTEGER
);

CREATE TABLE Servico (
    id_servico INTEGER PRIMARY KEY AUTO_INCREMENT,
    periodo_inicial DATE,
    periodo_final DATE,
    qtd_pessoa INTEGER,
    valor DOUBLE,
    fk_Quarto_ID INTEGER
);

CREATE TABLE Funcao_Empregado (
    id_funcao_empregado INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome_funcao VARCHAR(35)
);

CREATE TABLE Cliente (
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

CREATE TABLE Reserva (
    id_reserva INTEGER PRIMARY KEY AUTO_INCREMENT,
    qtd_pessoa INTEGER,
    dt_entrada DATE,
    dt_saida DATE,
    servico VARCHAR(250),
    status_reserva INTEGER,
    fk_empregado_id INTEGER
);

CREATE TABLE Estadia (
    id_estadia INTEGER PRIMARY KEY AUTO_INCREMENT,
    dt_entrada DATE,
    dt_saida DATE,
    servico VARCHAR(250),
    fk_empregado_id INTEGER
);

CREATE TABLE Quarto_Reserva (
    id_quarto_reserva INTEGER PRIMARY KEY AUTO_INCREMENT,
    fk_quarto_id INTEGER,
    fk_reserva_id INTEGER
);

CREATE TABLE Pode_ter_Cliente_Reserva_Estadia (
    id_cliente_reserva_estadia INTEGER PRIMARY KEY AUTO_INCREMENT,
    fk_cliente_id INTEGER,
    fk_reserva_id INTEGER,
    fk_estadia_id INTEGER,
    fk_fatura_id INTEGER
);

CREATE TABLE Fatura (
    id_fatura INTEGER PRIMARY KEY AUTO_INCREMENT,
    dt_pagamento DATE,
    valor_pagamento DOUBLE
);

CREATE TABLE Login (
    id_login INTEGER PRIMARY KEY AUTO_INCREMENT,
    Login VARCHAR(30),
    Senha  VARCHAR(12)
);

CREATE TABLE Pagamento (
    id_pagamento INTEGER PRIMARY KEY AUTO_INCREMENT,
    num_cartao INTEGER,
    dt_vencimento_cartao DATE,
    cod_seguranca_cartao INTEGER
);
 
ALTER TABLE Quarto ADD CONSTRAINT FK_Quarto_2
    FOREIGN KEY (fk_Empresa_ID)
    REFERENCES Empresa (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE Empregado ADD CONSTRAINT FK_Empregado_2
    FOREIGN KEY (fk_Funcao_Empregado_ID)
    REFERENCES Funcao_Empregado (ID)
    ON DELETE CASCADE;
 
ALTER TABLE Empregado ADD CONSTRAINT FK_Empregado_3
    FOREIGN KEY (fk_Empresa_ID)
    REFERENCES Empresa (ID)
    ON DELETE CASCADE;
 
ALTER TABLE Empregado ADD CONSTRAINT FK_Empregado_4
    FOREIGN KEY (fk_Empresa_ID???, fk_Login_ID???)
    REFERENCES ??? (???);
 
ALTER TABLE Servico ADD CONSTRAINT FK_Servico_2
    FOREIGN KEY (fk_Quarto_ID)
    REFERENCES Quarto (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE Cliente ADD CONSTRAINT FK_Cliente_2
    FOREIGN KEY (fk_Empresa_ID)
    REFERENCES Empresa (ID)
    ON DELETE CASCADE;
 
ALTER TABLE Cliente ADD CONSTRAINT FK_Cliente_3
    FOREIGN KEY (fk_Empregado_ID???, fk_Login_ID???)
    REFERENCES ??? (???);
 
ALTER TABLE Reserva ADD CONSTRAINT FK_Reserva_2
    FOREIGN KEY (fk_Empregado_ID)
    REFERENCES Empregado (ID)
    ON DELETE CASCADE;
 
ALTER TABLE Estadia ADD CONSTRAINT FK_Estadia_2
    FOREIGN KEY (fk_Empregado_ID???)
    REFERENCES ??? (???);
 
ALTER TABLE Quarto_Reserva ADD CONSTRAINT FK_Quarto_Reserva_1
    FOREIGN KEY (fk_Quarto_ID)
    REFERENCES Quarto (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE Quarto_Reserva ADD CONSTRAINT FK_Quarto_Reserva_2
    FOREIGN KEY (fk_Reserva_ID)
    REFERENCES Reserva (ID)
    ON DELETE SET NULL;
 
ALTER TABLE Pode_ter_Cliente_Reserva_Estadia ADD CONSTRAINT FK_Pode_ter_Cliente_Reserva_Estadia_1
    FOREIGN KEY (fk_Cliente_ID)
    REFERENCES Cliente (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE Pode_ter_Cliente_Reserva_Estadia ADD CONSTRAINT FK_Pode_ter_Cliente_Reserva_Estadia_2
    FOREIGN KEY (fk_Reserva_ID)
    REFERENCES Reserva (ID)
    ON DELETE NO ACTION;
 
ALTER TABLE Pode_ter_Cliente_Reserva_Estadia ADD CONSTRAINT FK_Pode_ter_Cliente_Reserva_Estadia_3
    FOREIGN KEY (fk_Estadia_ID)
    REFERENCES Estadia (ID)
    ON DELETE NO ACTION;
 
ALTER TABLE Pode_ter_Cliente_Reserva_Estadia ADD CONSTRAINT FK_Pode_ter_Cliente_Reserva_Estadia_5
    FOREIGN KEY (fk_Fatura_ID???)
    REFERENCES ??? (???);
 
ALTER TABLE Login ADD CONSTRAINT FK_Login_2
    FOREIGN KEY (fk_Empregado_ID???)
    REFERENCES ??? (???);