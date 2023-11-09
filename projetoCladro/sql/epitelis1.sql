-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07-Nov-2023 às 00:43
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
-- Banco de dados: epitelis
--

-- --------------------------------------------------------

--
-- Estrutura da tabela agenda
--

DROP TABLE IF EXISTS agenda;
CREATE TABLE IF NOT EXISTS agenda (
  id int NOT NULL AUTO_INCREMENT,
  paciente_id int NOT NULL,
  adm_id int NOT NULL,
  data_hora datetime NOT NULL,
  PRIMARY KEY (id,paciente_id,adm_id),
  KEY fk_agenda_paciente1_idx (paciente_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela atendente
--

DROP TABLE IF EXISTS atendente;
CREATE TABLE IF NOT EXISTS atendente (
  id int NOT NULL AUTO_INCREMENT,
  funcao varchar(45) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela consulta
--

DROP TABLE IF EXISTS consulta;
CREATE TABLE IF NOT EXISTS consulta (
  id int NOT NULL AUTO_INCREMENT,
  data_hora datetime NOT NULL,
  servico varchar(100) NOT NULL,
  valor float NOT NULL,
  estoque float NOT NULL,
  paciente_id int NOT NULL,
  PRIMARY KEY (id,paciente_id),
  KEY fk_consulta_paciente1_idx (paciente_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela conteudo
--

DROP TABLE IF EXISTS conteudo;
CREATE TABLE IF NOT EXISTS conteudo (
  id int NOT NULL AUTO_INCREMENT,
  link varchar(400) NOT NULL,
  adm_id int NOT NULL,
  PRIMARY KEY (id,adm_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela despesas
--

DROP TABLE IF EXISTS despesas;
CREATE TABLE IF NOT EXISTS despesas (
  id int NOT NULL AUTO_INCREMENT,
  valor_despesa float NOT NULL,
  item_id int NOT NULL,
  PRIMARY KEY (id,item_id),
  KEY fk_despesas_item1_idx (item_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela estoque
--

DROP TABLE IF EXISTS estoque;
CREATE TABLE IF NOT EXISTS estoque (
  id int NOT NULL AUTO_INCREMENT,
  quantidade_item int NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela estoque_has_consulta
--

DROP TABLE IF EXISTS estoque_has_consulta;
CREATE TABLE IF NOT EXISTS estoque_has_consulta (
  estoque_id int NOT NULL,
  consulta_id int NOT NULL,
  PRIMARY KEY (estoque_id,consulta_id),
  KEY fk_estoque_has_consulta_consulta1_idx (consulta_id),
  KEY fk_estoque_has_consulta_estoque1_idx (estoque_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela exames
--

DROP TABLE IF EXISTS exames;
CREATE TABLE IF NOT EXISTS exames (
  id int NOT NULL AUTO_INCREMENT,
  link varchar(400) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela faturamento
--

DROP TABLE IF EXISTS faturamento;
CREATE TABLE IF NOT EXISTS faturamento (
  id int NOT NULL AUTO_INCREMENT,
  valor_total int NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela ganhos
--

DROP TABLE IF EXISTS ganhos;
CREATE TABLE IF NOT EXISTS ganhos (
  id int NOT NULL AUTO_INCREMENT,
  valor float NOT NULL,
  consulta_id int NOT NULL,
  PRIMARY KEY (id,consulta_id),
  KEY fk_ganhos_consulta1_idx (consulta_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela item
--

DROP TABLE IF EXISTS item;
CREATE TABLE IF NOT EXISTS item (
  id int NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  data_validade date NOT NULL,
  reutilizavel char(1) NOT NULL,
  valor float NOT NULL,
  estoque_id int NOT NULL,
  PRIMARY KEY (id,estoque_id),
  KEY fk_item_estoque1_idx (estoque_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela paciente
--

DROP TABLE IF EXISTS paciente;
CREATE TABLE IF NOT EXISTS paciente (
  id int NOT NULL AUTO_INCREMENT,
  email varchar(100) NOT NULL,
  nome varchar(45) NOT NULL,
  senha varchar(45) NOT NULL,
  endereco varchar(90) NOT NULL,
  idade int NOT NULL,
  data_nasc date NOT NULL,
  rg int NOT NULL,
  cpf int NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela paciente
--

INSERT INTO paciente (id, email, nome, senha, endereco, idade, data_nasc, rg, cpf) VALUES
(1, '', '', '', '', 0, '0000-00-00', 0, 0),
(2, '', '', '', '', 0, '0000-00-00', 0, 0),
(3, '', '', '', '', 0, '0000-00-00', 0, 0),
(4, '', '', '', '', 0, '0000-00-00', 0, 0),
(5, '', '', '', '', 0, '0000-00-00', 0, 0),
(6, '', '', '', '', 0, '0000-00-00', 0, 0),
(7, '', '', '', '', 0, '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela prontuario
--

DROP TABLE IF EXISTS prontuario;
CREATE TABLE IF NOT EXISTS prontuario (
  id int NOT NULL AUTO_INCREMENT,
  diagnostico varchar(500) NOT NULL,
  recomendacoes varchar(500) NOT NULL,
  evolucao varchar(500) NOT NULL,
  consulta_id int NOT NULL,
  exames_id int NOT NULL,
  PRIMARY KEY (id,consulta_id,exames_id),
  KEY fk_prontuario_consulta1_idx (consulta_id),
  KEY fk_prontuario_exames1_idx (exames_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela receita
--

DROP TABLE IF EXISTS receita;
CREATE TABLE IF NOT EXISTS receita (
  id int NOT NULL AUTO_INCREMENT,
  descricao text NOT NULL,
  socia_id int NOT NULL,
  consulta_id int NOT NULL,
  PRIMARY KEY (id,socia_id,consulta_id),
  KEY fk_receita_socia1_idx (socia_id),
  KEY fk_receita_consulta1_idx (consulta_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela socia
--

DROP TABLE IF EXISTS socia;
CREATE TABLE IF NOT EXISTS socia (
  id int NOT NULL AUTO_INCREMENT,
  disponibilidade varchar(45) NOT NULL,
  servicos varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela agenda
--
ALTER TABLE agenda
  ADD CONSTRAINT fk_agenda_paciente1 FOREIGN KEY (paciente_id) REFERENCES paciente (id);

--
-- Limitadores para a tabela consulta
--
ALTER TABLE consulta
  ADD CONSTRAINT fk_consulta_paciente1 FOREIGN KEY (paciente_id) REFERENCES paciente (id);

--
-- Limitadores para a tabela despesas
--
ALTER TABLE despesas
  ADD CONSTRAINT fk_despesas_item1 FOREIGN KEY (item_id) REFERENCES item (id);

--
-- Limitadores para a tabela estoque_has_consulta
--
ALTER TABLE estoque_has_consulta
  ADD CONSTRAINT fk_estoque_has_consulta_consulta1 FOREIGN KEY (consulta_id) REFERENCES consulta (id),
  ADD CONSTRAINT fk_estoque_has_consulta_estoque1 FOREIGN KEY (estoque_id) REFERENCES estoque (id);

--
-- Limitadores para a tabela ganhos
--
ALTER TABLE ganhos
  ADD CONSTRAINT fk_ganhos_consulta1 FOREIGN KEY (consulta_id) REFERENCES consulta (id);

--
-- Limitadores para a tabela item
--
ALTER TABLE item
  ADD CONSTRAINT fk_item_estoque1 FOREIGN KEY (estoque_id) REFERENCES estoque (id);

--
-- Limitadores para a tabela prontuario
--
ALTER TABLE prontuario
  ADD CONSTRAINT fk_prontuario_consulta1 FOREIGN KEY (consulta_id) REFERENCES consulta (id),
  ADD CONSTRAINT fk_prontuario_exames1 FOREIGN KEY (exames_id) REFERENCES exames (id);

--
-- Limitadores para a tabela receita
--
ALTER TABLE receita
  ADD CONSTRAINT fk_receita_consulta1 FOREIGN KEY (consulta_id) REFERENCES consulta (id),
  ADD CONSTRAINT fk_receita_socia1 FOREIGN KEY (socia_id) REFERENCES socia (id);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;