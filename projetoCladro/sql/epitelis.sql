-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Nov-2023 às 14:21
-- Versão do servidor: 8.0.34
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epitelis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paciente_id` int NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `socia_id` int NOT NULL,
  PRIMARY KEY (`id`,`paciente_id`,`socia_id`),
  KEY `fk_agenda_paciente1_idx` (`paciente_id`),
  KEY `fk_agenda_socia1_idx` (`socia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendente`
--

DROP TABLE IF EXISTS `atendente`;
CREATE TABLE IF NOT EXISTS `atendente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `funcao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`funcao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `servico` varchar(100) NOT NULL,
  `valor` float NOT NULL,
  `estoque` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo`
--

DROP TABLE IF EXISTS `conteudo`;
CREATE TABLE IF NOT EXISTS `conteudo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `link` varchar(400) NOT NULL,
  `adm_id` int NOT NULL,
  `atendente_id` int NOT NULL,
  `socia_id` int NOT NULL,
  PRIMARY KEY (`id`,`adm_id`,`atendente_id`,`socia_id`),
  KEY `fk_conteudo_atendente1_idx` (`atendente_id`),
  KEY `fk_conteudo_socia1_idx` (`socia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

DROP TABLE IF EXISTS `despesas`;
CREATE TABLE IF NOT EXISTS `despesas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor_despesa` float NOT NULL,
  `item_id` int NOT NULL,
  PRIMARY KEY (`id`,`item_id`),
  KEY `fk_despesas_item1_idx` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade_item` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_has_consulta`
--

DROP TABLE IF EXISTS `estoque_has_consulta`;
CREATE TABLE IF NOT EXISTS `estoque_has_consulta` (
  `estoque_id` int NOT NULL,
  `consulta_id` int NOT NULL,
  PRIMARY KEY (`estoque_id`,`consulta_id`),
  KEY `fk_estoque_has_consulta_estoque1_idx` (`estoque_id`),
  KEY `fk_estoque_has_consulta_consulta1_idx` (`consulta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exames`
--

DROP TABLE IF EXISTS `exames`;
CREATE TABLE IF NOT EXISTS `exames` (
  `id` int NOT NULL AUTO_INCREMENT,
  `link` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faturamento`
--

DROP TABLE IF EXISTS `faturamento`;
CREATE TABLE IF NOT EXISTS `faturamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor_total` int NOT NULL,
  `ganhos_id` int NOT NULL,
  `despesas_id` int NOT NULL,
  PRIMARY KEY (`id`,`ganhos_id`,`despesas_id`),
  KEY `fk_faturamento_ganhos1_idx` (`ganhos_id`),
  KEY `fk_faturamento_despesas1_idx` (`despesas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ganhos`
--

DROP TABLE IF EXISTS `ganhos`;
CREATE TABLE IF NOT EXISTS `ganhos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  `consulta_id` int NOT NULL,
  PRIMARY KEY (`id`,`consulta_id`),
  KEY `fk_ganhos_consulta1_idx` (`consulta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `data_validade` date NOT NULL,
  `reutilizavel` char(1) NOT NULL,
  `valor` float NOT NULL,
  `estoque_id` int NOT NULL,
  PRIMARY KEY (`id`,`estoque_id`),
  KEY `fk_item_estoque1_idx` (`estoque_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `idade` int NOT NULL,
  `data_nasc` date NOT NULL,
  `rg` int NOT NULL,
  `cpf` int NOT NULL,
  PRIMARY KEY (`id`,`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id`, `nome`, `email`, `senha`, `endereco`, `idade`, `data_nasc`, `rg`, `cpf`) VALUES
(19, 'klara', 'oi@oi', '74574f42cc1bdf7b79e0476facf32fe0', 'AV EUCLIDES KLIEMANN,598', 85, '2023-11-01', 4545, 785);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prontuario`
--

DROP TABLE IF EXISTS `prontuario`;
CREATE TABLE IF NOT EXISTS `prontuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `diagnostico` varchar(500) NOT NULL,
  `recomendacoes` varchar(500) NOT NULL,
  `evolucao` varchar(500) NOT NULL,
  `consulta_id` int NOT NULL,
  `exames_id` int NOT NULL,
  PRIMARY KEY (`id`,`consulta_id`,`exames_id`),
  KEY `fk_prontuario_exames1_idx` (`exames_id`),
  KEY `fk_prontuario_consulta1_idx` (`consulta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

DROP TABLE IF EXISTS `receita`;
CREATE TABLE IF NOT EXISTS `receita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `socia_id` int NOT NULL,
  `consulta_id` int NOT NULL,
  PRIMARY KEY (`id`,`socia_id`,`consulta_id`),
  KEY `fk_receita_socia1_idx` (`socia_id`),
  KEY `fk_receita_consulta1_idx` (`consulta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `socia`
--

DROP TABLE IF EXISTS `socia`;
CREATE TABLE IF NOT EXISTS `socia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `disponibilidade` varchar(45) NOT NULL,
  `servicos` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `socia`
--

INSERT INTO `socia` (`id`, `nome`, `email`, `senha`, `disponibilidade`, `servicos`) VALUES
(0, 'ADM', 'ADM@ADM', 'ADM', 'sempre', 'PODOX');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitarconsulta`
--

DROP TABLE IF EXISTS `solicitarconsulta`;
CREATE TABLE IF NOT EXISTS `solicitarconsulta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paciente_id` int NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `servico` varchar(100) NOT NULL,
  `data_aprov` date DEFAULT NULL,
  `situacao` tinyint NOT NULL,
  `socia_id` int DEFAULT NULL,
  `atendente_id` int DEFAULT NULL,
  PRIMARY KEY (`id`,`paciente_id`),
  KEY `fk_solicitarConsulta_paciente1_idx` (`paciente_id`),
  KEY `fk_solicitarConsulta_socia1_idx` (`socia_id`),
  KEY `fk_solicitarConsulta_atendente1_idx` (`atendente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `solicitarconsulta`
--

INSERT INTO `solicitarconsulta` (`id`, `paciente_id`, `data`, `hora`, `servico`, `data_aprov`, `situacao`, `socia_id`, `atendente_id`) VALUES
(0, 19, '2023-11-11', '22:25:00', 'podi', NULL, 0, NULL, NULL),
(1, 19, '2023-11-11', '22:25:00', 'podi', NULL, 0, NULL, NULL),
(3, 19, '2023-11-11', '22:54:00', 'podologia', NULL, 0, NULL, NULL),
(4, 19, '2023-11-08', '20:58:00', 'podologiax', NULL, 0, NULL, NULL),
(5, 19, '2023-11-15', '21:04:00', 'podologiax', NULL, 0, NULL, NULL),
(6, 19, '2023-11-15', '21:04:00', 'podologiax', NULL, 0, NULL, NULL);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `fk_agenda_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`),
  ADD CONSTRAINT `fk_agenda_socia1` FOREIGN KEY (`socia_id`) REFERENCES `socia` (`id`);

--
-- Limitadores para a tabela `conteudo`
--
ALTER TABLE `conteudo`
  ADD CONSTRAINT `fk_conteudo_atendente1` FOREIGN KEY (`atendente_id`) REFERENCES `atendente` (`id`),
  ADD CONSTRAINT `fk_conteudo_socia1` FOREIGN KEY (`socia_id`) REFERENCES `socia` (`id`);

--
-- Limitadores para a tabela `despesas`
--
ALTER TABLE `despesas`
  ADD CONSTRAINT `fk_despesas_item1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Limitadores para a tabela `estoque_has_consulta`
--
ALTER TABLE `estoque_has_consulta`
  ADD CONSTRAINT `fk_estoque_has_consulta_consulta1` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`),
  ADD CONSTRAINT `fk_estoque_has_consulta_estoque1` FOREIGN KEY (`estoque_id`) REFERENCES `estoque` (`id`);

--
-- Limitadores para a tabela `faturamento`
--
ALTER TABLE `faturamento`
  ADD CONSTRAINT `fk_faturamento_despesas1` FOREIGN KEY (`despesas_id`) REFERENCES `despesas` (`id`),
  ADD CONSTRAINT `fk_faturamento_ganhos1` FOREIGN KEY (`ganhos_id`) REFERENCES `ganhos` (`id`);

--
-- Limitadores para a tabela `ganhos`
--
ALTER TABLE `ganhos`
  ADD CONSTRAINT `fk_ganhos_consulta1` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`);

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_estoque1` FOREIGN KEY (`estoque_id`) REFERENCES `estoque` (`id`);

--
-- Limitadores para a tabela `prontuario`
--
ALTER TABLE `prontuario`
  ADD CONSTRAINT `fk_prontuario_consulta1` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`),
  ADD CONSTRAINT `fk_prontuario_exames1` FOREIGN KEY (`exames_id`) REFERENCES `exames` (`id`);

--
-- Limitadores para a tabela `receita`
--
ALTER TABLE `receita`
  ADD CONSTRAINT `fk_receita_consulta1` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`),
  ADD CONSTRAINT `fk_receita_socia1` FOREIGN KEY (`socia_id`) REFERENCES `socia` (`id`);

--
-- Limitadores para a tabela `solicitarconsulta`
--
ALTER TABLE `solicitarconsulta`
  ADD CONSTRAINT `fk_solicitarConsulta_atendente1` FOREIGN KEY (`atendente_id`) REFERENCES `atendente` (`id`),
  ADD CONSTRAINT `fk_solicitarConsulta_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`),
  ADD CONSTRAINT `fk_solicitarConsulta_socia1` FOREIGN KEY (`socia_id`) REFERENCES `socia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
