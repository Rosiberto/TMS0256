-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela Hotel.cliente
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
  KEY `FK_Cliente_3` (`fk_Empresa_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela Hotel.cliente: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela Hotel.empregado
CREATE TABLE IF NOT EXISTS `empregado` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `fk_Funcao_Empregado_ID` int(11) NOT NULL,
  `fk_Empresa_ID` int(11) NOT NULL,
  `fk_Login_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Login_ID` (`fk_Login_ID`),
  KEY `FK_Empregado_1` (`fk_Funcao_Empregado_ID`),
  KEY `FK_Empregado_2` (`fk_Empresa_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela Hotel.empregado: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela Hotel.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) DEFAULT NULL,
  `Endereço` varchar(100) DEFAULT NULL,
  `Telefone` varchar(100) DEFAULT NULL,
  `Categoria` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela Hotel.empresa: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela Hotel.estadia
CREATE TABLE IF NOT EXISTS `estadia` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Dt_Entrada` date DEFAULT NULL,
  `Dt_Saida` date DEFAULT NULL,
  `Servico` varchar(100) DEFAULT NULL,
  `fk_Empregado_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Estadia_1` (`fk_Empregado_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela Hotel.estadia: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela Hotel.fatura
CREATE TABLE IF NOT EXISTS `fatura` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Dt_Pagamento` date DEFAULT NULL,
  `Valor_Pagamento` double DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela Hotel.fatura: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela Hotel.funcao_empregado
CREATE TABLE IF NOT EXISTS `funcao_empregado` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_Funcao` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela Hotel.funcao_empregado: ~2 rows (aproximadamente)
INSERT INTO `funcao_empregado` (`ID`, `Nome_Funcao`) VALUES
	(1, 'Recepcionista '),
	(2, 'Gerente');

-- Copiando estrutura para tabela Hotel.historico_cliente_reserva_estadia
CREATE TABLE IF NOT EXISTS `historico_cliente_reserva_estadia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Registro` int(11) NOT NULL DEFAULT 0,
  `Novo_Cliente` int(11) NOT NULL,
  `Dt_Update` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela Hotel.historico_cliente_reserva_estadia: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela Hotel.login
CREATE TABLE IF NOT EXISTS `login` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(100) NOT NULL,
  `Senha` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela Hotel.login: ~2 rows (aproximadamente)
INSERT INTO `login` (`ID`, `Login`, `Senha`) VALUES
	(1, 'Aline', 'e10adc3949ba59abbe56e057f20f883e'),
	(2, 'Carol', 'e10adc3949ba59abbe56e057f20f883e');

-- Copiando estrutura para tabela Hotel.pagamento
CREATE TABLE IF NOT EXISTS `pagamento` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Cartao` int(11) NOT NULL,
  `Dt_Vencimento_Cartao` date NOT NULL,
  `Cod_Seguranca_Cartao` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela Hotel.pagamento: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela Hotel.pode_ter_cliente_reserva_estadia
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
  KEY `FK_pode_ter_cliente_reserva_estadia_4` (`fk_Fatura_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela Hotel.pode_ter_cliente_reserva_estadia: ~1 rows (aproximadamente)

-- Copiando estrutura para tabela Hotel.quarto
CREATE TABLE IF NOT EXISTS `quarto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) DEFAULT NULL,
  `Capacidade_Pessoa` int(11) DEFAULT NULL,
  `fk_Empresa_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Quarto_1` (`fk_Empresa_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela Hotel.quarto: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela Hotel.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Qtd_Pessoa` int(11) NOT NULL,
  `Dt_Entrada` date DEFAULT NULL,
  `Dt_Saida` date DEFAULT NULL,
  `servico`VARCHAR(50) NOT NULL,
  `status` int(11) NOT NULL,
  `fk_Empregado_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Copiando estrutura para tabela hotel.quarto_reserva
CREATE TABLE IF NOT EXISTS `quarto_reserva` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fk_Quarto_ID` int(11) DEFAULT NULL,
  `fk_Reserva_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Quarto_Reserva_1` (`fk_Quarto_ID`),
  KEY `FK_Quarto_Reserva_2` (`fk_Reserva_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando estrutura para tabela hotel.servico
CREATE TABLE IF NOT EXISTS `servico` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Periodo_Inicial` date NOT NULL,
  `Periodo_Final` date NOT NULL,
  `Qtd_Pessoa` int(11) NOT NULL,
  `Valor` double NOT NULL,
  `fk_Quarto_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Quarto_ID` (`fk_Quarto_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela Hotel.reserva: ~0 rows (aproximadamente)

-- Adicionando as constraints após criar as tabelas
ALTER TABLE `cliente`
  ADD CONSTRAINT `FK_Cliente_2` FOREIGN KEY (`fk_Login_ID`) REFERENCES `login` (`ID`),
  ADD CONSTRAINT `FK_Cliente_3` FOREIGN KEY (`fk_Empresa_ID`) REFERENCES `empresa` (`ID`);

ALTER TABLE `empregado`
  ADD CONSTRAINT `FK_Empregado_1` FOREIGN KEY (`fk_Funcao_Empregado_ID`) REFERENCES `funcao_empregado` (`ID`),
  ADD CONSTRAINT `FK_Empregado_2` FOREIGN KEY (`fk_Empresa_ID`) REFERENCES `empresa` (`ID`),
  ADD CONSTRAINT `fk_Login_ID` FOREIGN KEY (`fk_Login_ID`) REFERENCES `login` (`ID`);

ALTER TABLE `estadia`
  ADD CONSTRAINT `FK_Estadia_1` FOREIGN KEY (`fk_Empregado_ID`) REFERENCES `empregado` (`ID`);

ALTER TABLE `pode_ter_cliente_reserva_estadia`
  ADD CONSTRAINT `FK_pode_ter_cliente_reserva_estadia_1` FOREIGN KEY (`fk_Cliente_ID`) REFERENCES `cliente` (`ID`),
  ADD CONSTRAINT `FK_pode_ter_cliente_reserva_estadia_2` FOREIGN KEY (`fk_Reserva_ID`) REFERENCES `reserva` (`ID`),
  ADD CONSTRAINT `FK_pode_ter_cliente_reserva_estadia_3` FOREIGN KEY (`fk_Estadia_ID`) REFERENCES `estadia` (`ID`),
  ADD CONSTRAINT `FK_pode_ter_cliente_reserva_estadia_4` FOREIGN KEY (`fk_Fatura_ID`) REFERENCES `fatura` (`ID`);

ALTER TABLE `quarto`
  ADD CONSTRAINT `FK_Quarto_1` FOREIGN KEY (`fk_Empresa_ID`) REFERENCES `empresa` (`ID`);

ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_Reserva_1` FOREIGN KEY (`fk_Empregado_ID`) REFERENCES `empregado` (`ID`);


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

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
