-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Dez-2023 às 22:00
-- Versão do servidor: 8.0.31
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
  PRIMARY KEY (`id`),
  KEY `paciente_id` (`paciente_id`),
  KEY `socia_id` (`socia_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `paciente_nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`paciente_nome`,`valor`),
  KEY `fk_consulta_paciente_idx` (`paciente_nome`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`id`, `data`, `hora`, `servico`, `valor`, `estoque`, `paciente_nome`) VALUES
(1, '2023-12-09', '22:11:00', 'poder', 547, 0, ''),
(2, '2023-12-13', '22:38:00', 'sos', 547, 0, ''),
(3, '2023-12-09', '17:23:00', 'socorroo', 547, 0, ''),
(4, '2023-12-08', '17:30:00', 'socorroo', 547, 0, 'Artur Negro'),
(5, '2023-12-01', '17:36:00', 'socorroo', 547, 1, 'Artur Negro'),
(6, '2023-12-07', '18:39:00', 'poder', 547, 1, 'Pedro Rosa Cauduro'),
(7, '2023-12-15', '18:40:00', 'teste13', 547, 0, 'Pedro Rosa Cauduro'),
(8, '2023-12-08', '18:50:00', 'teste13', 547, 0, 'Pedro Rosa Cauduro'),
(9, '2023-12-07', '18:49:00', 'teste13', 547, 0, 'Pedro Rosa Cauduro'),
(10, '2023-12-08', '18:56:00', 'teste13', 547, 0, 'Pedro Rosa Cauduro'),
(11, '2023-11-29', '18:56:00', 'teste13', 547, 0, 'Pedro Rosa Cauduro'),
(12, '2023-12-01', '18:56:00', 'teste13', 547, 0, 'Pedro Rosa Cauduro'),
(13, '2023-12-01', '18:56:00', 'teste13', 800, 0, 'Pedro Rosa Cauduro');

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
  PRIMARY KEY (`id`),
  KEY `atendente_id` (`atendente_id`),
  KEY `socia_id` (`socia_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

DROP TABLE IF EXISTS `despesas`;
CREATE TABLE IF NOT EXISTS `despesas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor_despesa` float NOT NULL,
  `item_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade_item` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_has_consulta`
--

DROP TABLE IF EXISTS `estoque_has_consulta`;
CREATE TABLE IF NOT EXISTS `estoque_has_consulta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `estoque_id` int NOT NULL,
  `consulta_id` int NOT NULL,
  PRIMARY KEY (`id`,`estoque_id`,`consulta_id`),
  KEY `estoque_id` (`estoque_id`),
  KEY `consulta_id` (`consulta_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exames`
--

DROP TABLE IF EXISTS `exames`;
CREATE TABLE IF NOT EXISTS `exames` (
  `id` int NOT NULL AUTO_INCREMENT,
  `link` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`id`),
  KEY `ganhos_id` (`ganhos_id`),
  KEY `despesas_id` (`despesas_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ganhos`
--

DROP TABLE IF EXISTS `ganhos`;
CREATE TABLE IF NOT EXISTS `ganhos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  `consulta_valor` float NOT NULL,
  PRIMARY KEY (`id`,`consulta_valor`),
  KEY `fk_ganhos_consulta_idx` (`consulta_valor`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `ganhos`
--

INSERT INTO `ganhos` (`id`, `valor`, `consulta_valor`) VALUES
(1, 547, 547),
(2, 547, 547),
(3, 547, 547),
(4, 547, 547),
(5, 547, 547),
(6, 800, 800);

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
  PRIMARY KEY (`id`),
  KEY `estoque_id` (`estoque_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id`, `nome`, `email`, `senha`, `endereco`, `idade`, `data_nasc`, `rg`, `cpf`) VALUES
(19, 'Pedro Rosa Cauduro', 'oi@oi', '26657d5ff9020d2abefe558796b99584', 'gfgfdg', 13, '2024-01-06', 2147483647, 2147483647);

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
  PRIMARY KEY (`id`),
  KEY `consulta_id` (`consulta_id`),
  KEY `exames_id` (`exames_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`id`),
  KEY `socia_id` (`socia_id`),
  KEY `consulta_id` (`consulta_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `socia`
--

INSERT INTO `socia` (`id`, `nome`, `email`, `senha`, `disponibilidade`, `servicos`) VALUES
(5, 'Pedro Rosa Cauduro', 'ADM@ADM', '6fb4f22992a0d164b77267fde5477248', 'SMP', 'É');

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
  KEY `paciente_id` (`paciente_id`),
  KEY `socia_id` (`socia_id`),
  KEY `atendente_id` (`atendente_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `solicitarconsulta`
--

INSERT INTO `solicitarconsulta` (`id`, `paciente_id`, `data`, `hora`, `servico`, `data_aprov`, `situacao`, `socia_id`, `atendente_id`) VALUES
(2, 19, '2023-12-01', '19:35:00', 'poder', '2023-12-01', 1, 1, NULL),
(3, 19, '2023-12-01', '19:35:00', 'poder', '2023-12-02', 1, 5, NULL),
(5, 19, '2023-12-07', '20:26:00', 'socorroo', '2023-12-02', 1, 5, NULL),
(6, 19, '2023-12-07', '20:26:00', 'sos', '2023-12-02', 1, 5, NULL),
(7, 19, '2023-12-07', '20:26:00', 'teste13', '2023-12-01', 1, 1, NULL),
(8, 19, '2023-12-02', '22:34:00', 'poder', NULL, 0, NULL, NULL),
(9, 19, '2023-12-02', '22:34:00', 'poder', '2023-12-02', 1, 5, NULL),
(10, 19, '2023-12-22', '22:38:00', 'sos', NULL, 0, NULL, NULL),
(11, 19, '2023-12-02', '22:37:00', 'poder', '2023-12-02', 1, 5, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
