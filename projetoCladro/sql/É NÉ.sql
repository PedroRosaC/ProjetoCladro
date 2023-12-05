-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: epitelis
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agenda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paciente_id` int NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `socia_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paciente_id` (`paciente_id`),
  KEY `socia_id` (`socia_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atendente`
--

DROP TABLE IF EXISTS `atendente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atendente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `funcao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`funcao`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendente`
--

LOCK TABLES `atendente` WRITE;
/*!40000 ALTER TABLE `atendente` DISABLE KEYS */;
INSERT INTO `atendente` VALUES (1,'Pedro Rosa Cauduro','pedro@pedro','6fb4f22992a0d164b77267fde5477248','ATENDER');
/*!40000 ALTER TABLE `atendente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consulta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `servico` varchar(100) NOT NULL,
  `valor` float NOT NULL,
  `estoque` tinyint NOT NULL,
  `paciente_nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`paciente_nome`),
  KEY `paciente_nome` (`paciente_nome`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (1,'2023-12-09','22:11:00','poder',547,0,''),(2,'2023-12-13','22:38:00','sos',547,0,''),(3,'2023-12-09','17:23:00','socorroo',547,0,''),(4,'2023-12-08','17:30:00','socorroo',547,0,'Artur Negro'),(5,'2023-12-01','17:36:00','socorroo',547,1,'Artur Negro'),(6,'2023-12-07','18:39:00','poder',547,1,'Pedro Rosa Cauduro'),(7,'2023-12-15','18:40:00','teste13',547,0,'Pedro Rosa Cauduro'),(8,'2023-12-08','18:50:00','teste13',547,0,'Pedro Rosa Cauduro'),(9,'2023-12-07','18:49:00','teste13',547,0,'Pedro Rosa Cauduro'),(10,'2023-12-08','18:56:00','teste13',547,0,'Pedro Rosa Cauduro'),(11,'2023-11-29','18:56:00','teste13',547,0,'Pedro Rosa Cauduro'),(12,'2023-12-01','18:56:00','teste13',547,0,'Pedro Rosa Cauduro'),(13,'2023-12-01','18:56:00','teste13',800,0,'Pedro Rosa Cauduro'),(14,'2023-12-07','11:50:00','socorroo',800,1,'Pedro Rosa Cauduro');
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conteudo`
--

DROP TABLE IF EXISTS `conteudo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conteudo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `link` varchar(400) NOT NULL,
  `atendente_id` int NOT NULL,
  `socia_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `atendente_id` (`atendente_id`),
  KEY `socia_id` (`socia_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conteudo`
--

LOCK TABLES `conteudo` WRITE;
/*!40000 ALTER TABLE `conteudo` DISABLE KEYS */;
/*!40000 ALTER TABLE `conteudo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `despesas`
--

DROP TABLE IF EXISTS `despesas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `despesas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor_despesa` float NOT NULL,
  `descricao` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despesas`
--

LOCK TABLES `despesas` WRITE;
/*!40000 ALTER TABLE `despesas` DISABLE KEYS */;
INSERT INTO `despesas` VALUES (1,500,0),(2,850,0),(3,850,0),(4,547,85),(5,89,0),(6,250,0),(7,250,0);
/*!40000 ALTER TABLE `despesas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exames`
--

DROP TABLE IF EXISTS `exames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exames` (
  `id` int NOT NULL AUTO_INCREMENT,
  `link` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exames`
--

LOCK TABLES `exames` WRITE;
/*!40000 ALTER TABLE `exames` DISABLE KEYS */;
/*!40000 ALTER TABLE `exames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faturamento`
--

DROP TABLE IF EXISTS `faturamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faturamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor_total` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faturamento`
--

LOCK TABLES `faturamento` WRITE;
/*!40000 ALTER TABLE `faturamento` DISABLE KEYS */;
INSERT INTO `faturamento` VALUES (2,0);
/*!40000 ALTER TABLE `faturamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ganhos`
--

DROP TABLE IF EXISTS `ganhos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ganhos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  `consulta_valor` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `consulta_valor` (`consulta_valor`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ganhos`
--

LOCK TABLES `ganhos` WRITE;
/*!40000 ALTER TABLE `ganhos` DISABLE KEYS */;
INSERT INTO `ganhos` VALUES (1,547,547),(2,547,547),(3,547,547),(4,547,547),(5,547,547),(6,800,800),(7,800,800);
/*!40000 ALTER TABLE `ganhos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `data_validade` date NOT NULL,
  `reutilizavel` char(1) NOT NULL,
  `valor` float NOT NULL,
  `Quantidade` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'soro','2024-01-06','s',850,18),(2,'soro','2023-12-29','',250,180),(27,'soro','2023-12-22','',250,180),(26,'soro','2023-12-22','',250,180),(28,'soro','2023-12-29','',258,180);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_has_consulta`
--

DROP TABLE IF EXISTS `item_has_consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item_has_consulta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `consulta_id` int NOT NULL,
  PRIMARY KEY (`id`,`consulta_id`),
  KEY `item_id` (`item_id`),
  KEY `consulta_id` (`consulta_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_has_consulta`
--

LOCK TABLES `item_has_consulta` WRITE;
/*!40000 ALTER TABLE `item_has_consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_has_consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente` (
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (20,'Carlos','oi@oi','74574f42cc1bdf7b79e0476facf32fe0','gfgfdg',96,'2023-12-21',2147483647,425);
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prontuario`
--

DROP TABLE IF EXISTS `prontuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prontuario` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prontuario`
--

LOCK TABLES `prontuario` WRITE;
/*!40000 ALTER TABLE `prontuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `prontuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receita`
--

DROP TABLE IF EXISTS `receita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `receita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `socia_id` int NOT NULL,
  `consulta_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `socia_id` (`socia_id`),
  KEY `consulta_id` (`consulta_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receita`
--

LOCK TABLES `receita` WRITE;
/*!40000 ALTER TABLE `receita` DISABLE KEYS */;
/*!40000 ALTER TABLE `receita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socia`
--

DROP TABLE IF EXISTS `socia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `socia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `disponibilidade` varchar(45) NOT NULL,
  `servicos` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socia`
--

LOCK TABLES `socia` WRITE;
/*!40000 ALTER TABLE `socia` DISABLE KEYS */;
INSERT INTO `socia` VALUES (5,'Pedro Rosa Cauduro','ADM@ADM','6fb4f22992a0d164b77267fde5477248','SMP','É');
/*!40000 ALTER TABLE `socia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitarconsulta`
--

DROP TABLE IF EXISTS `solicitarconsulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitarconsulta` (
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitarconsulta`
--

LOCK TABLES `solicitarconsulta` WRITE;
/*!40000 ALTER TABLE `solicitarconsulta` DISABLE KEYS */;
INSERT INTO `solicitarconsulta` VALUES (2,19,'2023-12-01','19:35:00','poder','2023-12-01',1,1,NULL),(3,19,'2023-12-01','19:35:00','poder','2023-12-02',1,5,NULL),(5,19,'2023-12-07','20:26:00','socorroo','2023-12-01',0,NULL,NULL),(6,19,'2023-12-07','20:26:00','sos','2023-12-02',1,5,NULL),(7,19,'2023-12-07','20:26:00','teste13','2023-12-01',1,1,NULL),(8,19,'2023-12-02','22:34:00','poder',NULL,0,NULL,NULL),(9,19,'2023-12-02','22:34:00','poder',NULL,0,NULL,NULL),(10,19,'2023-12-22','22:38:00','sos',NULL,0,NULL,NULL),(11,19,'2023-12-02','22:37:00','poder',NULL,0,NULL,NULL),(12,20,'2023-12-22','08:40:00','socorroo','2023-12-04',1,5,NULL);
/*!40000 ALTER TABLE `solicitarconsulta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-04 20:59:56
