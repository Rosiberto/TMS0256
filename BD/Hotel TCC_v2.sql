-- Copiando estrutura do banco de dados para hotel
CREATE DATABASE IF NOT EXISTS `hotel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `hotel`;

-- Copiando estrutura para tabela hotel.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `fk_Empresa_ID` int(11) NOT NULL,
  `fk_Login_ID` int(11) DEFAULT NULL,
  `Nacionalidade` varchar(100) DEFAULT NULL,
  `Dt_Nascimento` date DEFAULT NULL,
  `Morada` varchar(100) DEFAULT NULL,
  `Telefone` varchar(100) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Documento` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Cliente_2` (`fk_Login_ID`),
  KEY `FK_Cliente_3` (`fk_Empresa_ID`),
  CONSTRAINT `FK_Cliente_2` FOREIGN KEY (`fk_Login_ID`) REFERENCES `login` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Cliente_3` FOREIGN KEY (`fk_Empresa_ID`) REFERENCES `empresa` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.cliente: ~2 rows (aproximadamente)
INSERT INTO `cliente` (`ID`, `Nome`, `fk_Empresa_ID`, `fk_Login_ID`, `Nacionalidade`, `Dt_Nascimento`, `Morada`, `Telefone`, `Numero`, `Documento`, `Email`) VALUES
	(1, 'Fernando', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'Marcus', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Copiando estrutura para tabela hotel.empregado
CREATE TABLE IF NOT EXISTS `empregado` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `fk_Funcao_Empregado_ID` int(11) NOT NULL,
  `fk_Empresa_ID` int(11) NOT NULL,
  `fk_Login_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Login_ID` (`fk_Login_ID`),
  KEY `FK_Empregado_1` (`fk_Funcao_Empregado_ID`),
  KEY `FK_Empregado_2` (`fk_Empresa_ID`),
  CONSTRAINT `FK_Empregado_1` FOREIGN KEY (`fk_Funcao_Empregado_ID`) REFERENCES `funcao_empregado` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Empregado_2` FOREIGN KEY (`fk_Empresa_ID`) REFERENCES `empresa` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Empregado_3` FOREIGN KEY (`fk_Login_ID`) REFERENCES `login` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.empregado: ~2 rows (aproximadamente)
INSERT INTO `empregado` (`ID`, `Nome`, `fk_Funcao_Empregado_ID`, `fk_Empresa_ID`, `fk_Login_ID`) VALUES
	(1, 'Aline', 1, 1, 1),
	(2, 'Fernanda', 2, 1, 2);

-- Copiando estrutura para tabela hotel.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) DEFAULT NULL,
  `Endereço` varchar(100) DEFAULT NULL,
  `Telefone` varchar(100) DEFAULT NULL,
  `Categoria` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.empresa: ~2 rows (aproximadamente)
INSERT INTO `empresa` (`ID`, `Nome`, `Endereço`, `Telefone`, `Categoria`, `Email`) VALUES
	(1, 'Inovare', NULL, NULL, NULL, NULL),
	(2, 'Nexus', NULL, NULL, NULL, NULL);

-- Copiando estrutura para tabela hotel.estadia
CREATE TABLE IF NOT EXISTS `estadia` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Dt_Entrada` date DEFAULT NULL,
  `Dt_Saida` date DEFAULT NULL,
  `Servico` varchar(100) DEFAULT NULL,
  `fk_Empregado_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Estadia_1` (`fk_Empregado_ID`),
  CONSTRAINT `FK_Estadia_1` FOREIGN KEY (`fk_Empregado_ID`) REFERENCES `empregado` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.estadia: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela hotel.fatura
CREATE TABLE IF NOT EXISTS `fatura` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Dt_Pagamento` date DEFAULT NULL,
  `Valor_Pagamento` double DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.fatura: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela hotel.funcao_empregado
CREATE TABLE IF NOT EXISTS `funcao_empregado` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_Funcao` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.funcao_empregado: ~2 rows (aproximadamente)
INSERT INTO `funcao_empregado` (`ID`, `Nome_Funcao`) VALUES
	(1, 'Recepcionista '),
	(2, 'Gerente');

-- Copiando estrutura para tabela hotel.historico_cliente_reserva_estadia
CREATE TABLE IF NOT EXISTS `historico_cliente_reserva_estadia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Registro` int(11) NOT NULL DEFAULT 0,
  `Novo_Cliente` int(11) NOT NULL,
  `Dt_Update` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.historico_cliente_reserva_estadia: ~7 rows (aproximadamente)
INSERT INTO `historico_cliente_reserva_estadia` (`id`, `Id_Registro`, `Novo_Cliente`, `Dt_Update`) VALUES
	(1, 4, 0, '0000-00-00 00:00:00'),
	(2, 4, 1, '0000-00-00 00:00:00'),
	(3, 1, 2, '0000-00-00 00:00:00'),
	(4, 1, 1, '0000-00-00 00:00:00'),
	(5, 1, 2, '0000-00-00 00:00:00'),
	(6, 1, 1, '2024-05-13 18:30:19'),
	(7, 3, 2, '2024-05-13 19:48:56');

-- Copiando estrutura para tabela hotel.login
CREATE TABLE IF NOT EXISTS `login` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(100) NOT NULL,
  `Senha` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.login: ~2 rows (aproximadamente)
INSERT INTO `login` (`ID`, `Login`, `Senha`) VALUES
	(1, 'Aline', 'e10adc3949ba59abbe56e057f20f883e'),
	(2, 'Carol', 'e10adc3949ba59abbe56e057f20f883e');

-- Copiando estrutura para tabela hotel.pagamento
CREATE TABLE IF NOT EXISTS `pagamento` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Cartao` int(11) NOT NULL,
  `Dt_Vencimento_Cartao` date NOT NULL,
  `Cod_Seguranca_Cartao` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.pagamento: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela hotel.pode_ter_cliente_reserva_estadia
CREATE TABLE IF NOT EXISTS `pode_ter_cliente_reserva_estadia` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fk_Cliente_ID` int(11) NOT NULL,
  `fk_Reserva_ID` int(11) DEFAULT NULL,
  `fk_Estadia_ID` int(11) DEFAULT NULL,
  `fk_Fatura_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_pode_ter_cliente_reserva_estadia_1` (`fk_Cliente_ID`),
  KEY `FK_pode_ter_cliente_reserva_estadia_2` (`fk_Reserva_ID`),
  KEY `FK_pode_ter_cliente_reserva_estadia_3` (`fk_Estadia_ID`),
  KEY `FK_pode_ter_cliente_reserva_estadia_4` (`fk_Fatura_ID`),
  CONSTRAINT `FK_pode_ter_cliente_reserva_estadia_1` FOREIGN KEY (`fk_Cliente_ID`) REFERENCES `cliente` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pode_ter_cliente_reserva_estadia_2` FOREIGN KEY (`fk_Reserva_ID`) REFERENCES `reserva` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pode_ter_cliente_reserva_estadia_3` FOREIGN KEY (`fk_Estadia_ID`) REFERENCES `estadia` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pode_ter_cliente_reserva_estadia_4` FOREIGN KEY (`fk_Fatura_ID`) REFERENCES `fatura` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.pode_ter_cliente_reserva_estadia: ~3 rows (aproximadamente)
INSERT INTO `pode_ter_cliente_reserva_estadia` (`ID`, `fk_Cliente_ID`, `fk_Reserva_ID`, `fk_Estadia_ID`, `fk_Fatura_ID`) VALUES
	(1, 1, 1, NULL, NULL),
	(2, 2, 2, NULL, NULL),
	(3, 2, 3, NULL, NULL);

-- Copiando estrutura para tabela hotel.quarto
CREATE TABLE IF NOT EXISTS `quarto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) DEFAULT NULL,
  `Capacidade_Pessoa` int(11) DEFAULT NULL,
  `fk_Empresa_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Quarto_1` (`fk_Empresa_ID`),
  CONSTRAINT `FK_Quarto_1` FOREIGN KEY (`fk_Empresa_ID`) REFERENCES `empresa` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.quarto: ~5 rows (aproximadamente)
INSERT INTO `quarto` (`ID`, `Numero`, `Capacidade_Pessoa`, `fk_Empresa_ID`) VALUES
	(1, 10, 10, 1),
	(2, 9, 5, 2),
	(3, 8, 4, 1),
	(4, 10, 8, 2),
	(5, 15, 5, 2);

-- Copiando estrutura para tabela hotel.quarto_reserva
CREATE TABLE IF NOT EXISTS `quarto_reserva` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fk_Quarto_ID` int(11) DEFAULT NULL,
  `fk_Reserva_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Quarto_Reserva_1` (`fk_Quarto_ID`),
  KEY `FK_Quarto_Reserva_2` (`fk_Reserva_ID`),
  CONSTRAINT `FK_Quarto_Reserva_1` FOREIGN KEY (`fk_Quarto_ID`) REFERENCES `quarto` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Quarto_Reserva_2` FOREIGN KEY (`fk_Reserva_ID`) REFERENCES `reserva` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.quarto_reserva: ~3 rows (aproximadamente)
INSERT INTO `quarto_reserva` (`ID`, `fk_Quarto_ID`, `fk_Reserva_ID`) VALUES
	(1, 2, 1),
	(2, 1, 2),
	(3, 3, 3);

-- Copiando estrutura para tabela hotel.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Qtd_Pessoa` int(11) NOT NULL,
  `Dt_Entrada` date NOT NULL,
  `Dt_Saida` date NOT NULL,
  `Status` int(11) NOT NULL,
  `fk_Empregado_ID` int(11) NOT NULL,
  `fk_Cliente` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Reserva_1` (`fk_Empregado_ID`),
  KEY `FK_Reserva_2` (`fk_Cliente`),
  CONSTRAINT `FK_Reserva_1` FOREIGN KEY (`fk_Empregado_ID`) REFERENCES `empregado` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Reserva_2` FOREIGN KEY (`fk_Cliente`) REFERENCES `cliente` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.reserva: ~3 rows (aproximadamente)
INSERT INTO `reserva` (`ID`, `Qtd_Pessoa`, `Dt_Entrada`, `Dt_Saida`, `Status`, `fk_Empregado_ID`, `fk_Cliente`) VALUES
	(1, 5, '2024-05-13', '2024-05-13', 0, 1, 2),
	(2, 5, '2024-05-09', '2024-05-10', 0, 1, 1),
	(3, 5, '2024-05-10', '2024-05-11', 0, 1, 2);

-- Copiando estrutura para tabela hotel.servico
CREATE TABLE IF NOT EXISTS `servico` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Periodo_Inicial` date NOT NULL,
  `Periodo_Final` date NOT NULL,
  `Qtd_Pessoa` int(11) NOT NULL,
  `Valor` double NOT NULL,
  `fk_Quarto_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Quarto_ID` (`fk_Quarto_ID`),
  CONSTRAINT `FK_Servico_1` FOREIGN KEY (`fk_Quarto_ID`) REFERENCES `quarto` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela hotel.servico: ~3 rows (aproximadamente)
INSERT INTO `servico` (`ID`, `Periodo_Inicial`, `Periodo_Final`, `Qtd_Pessoa`, `Valor`, `fk_Quarto_ID`) VALUES
	(1, '2024-05-01', '2024-05-20', 5, 200, 1),
	(2, '2024-05-02', '2024-05-25', 5, 200, 2),
	(3, '2024-05-02', '2024-05-25', 5, 200, 3);

-- Copiando estrutura para view hotel.vw_indisponibilidade
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_indisponibilidade` (
	`empresa` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`id_empresa` INT(11) NOT NULL,
	`Num_Quarto` INT(11) NULL,
	`Entrada` DATE NOT NULL,
	`Saida` DATE NOT NULL
) ENGINE=MyISAM;

-- Copiando estrutura para trigger hotel.pcr_pode_ter_cliente_reserva_estadia_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `pcr_pode_ter_cliente_reserva_estadia_before_insert` AFTER UPDATE ON `pode_ter_cliente_reserva_estadia` FOR EACH ROW BEGIN
	 IF NEW.fk_Reserva_ID = OLD.fk_Reserva_ID AND NEW.fk_Cliente_ID <> OLD.fk_Cliente_ID THEN
        INSERT INTO `hotel`.`historico_cliente_reserva_estadia` (`id_registro`, `novo_cliente`)
        VALUES ( OLD.ID, NEW.fk_Cliente_ID );
    END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Copiando estrutura para view hotel.vw_indisponibilidade
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_indisponibilidade`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_indisponibilidade` AS SELECT 
	 e.Nome AS empresa,
	 e.id AS id_empresa,	
    q.Numero AS `Num_Quarto`, 
    r.Dt_Entrada AS `Entrada`,
    r.Dt_Saida AS `Saida`
FROM pode_ter_cliente_reserva_estadia AS cre
INNER JOIN reserva AS r ON cre.fk_Reserva_ID = r.ID
INNER JOIN cliente AS c ON cre.fk_Cliente_ID = c.ID
INNER JOIN quarto_reserva AS qr ON r.ID = qr.fk_Reserva_ID
INNER JOIN quarto AS q ON qr.fk_Quarto_ID = q.ID 
INNER JOIN empresa AS e ON q.fk_Empresa_ID = e.ID ;

