CREATE DATABASE  IF NOT EXISTS `glico` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `glico`;
-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: glico
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `diabetes`
--

DROP TABLE IF EXISTS `diabetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diabetes` (
  `id_usuario` int(11) NOT NULL,
  `tipo_diabetes` enum('pre-diabetes','tipo 1','tipo 2','gestacional') DEFAULT NULL,
  `terapia` enum('caneta','seringa','bomba de insulina') DEFAULT NULL,
  `data_diagnostico` date DEFAULT NULL,
  `meta_max` int(3) DEFAULT NULL,
  `meta_min` int(3) DEFAULT NULL,
  UNIQUE KEY `id_usuario` (`id_usuario`),
  KEY `fk_diabetes_usuario_id_usuario` (`id_usuario`),
  CONSTRAINT `fk_diabetes_usuario_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diabetes`
--

LOCK TABLES `diabetes` WRITE;
/*!40000 ALTER TABLE `diabetes` DISABLE KEYS */;
INSERT INTO `diabetes` VALUES (12,NULL,NULL,NULL,160,70),(13,NULL,NULL,NULL,160,70);
/*!40000 ALTER TABLE `diabetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `glicose`
--

DROP TABLE IF EXISTS `glicose`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `glicose` (
  `id_glicose` int(15) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(6) NOT NULL,
  `valor` int(3) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `condicao` enum('Nenhum','Jejum','Antes da refeição','2h após a refeição','Antes de dormir') DEFAULT 'Nenhum',
  `comentario` text DEFAULT NULL,
  `data_registro` date NOT NULL DEFAULT curdate(),
  `hora_registro` time NOT NULL DEFAULT curtime(),
  PRIMARY KEY (`id_glicose`),
  KEY `fk_glicose_usuario_id_usuario` (`id_usuario`),
  CONSTRAINT `fk_glicose_usuario_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `glicose`
--

LOCK TABLES `glicose` WRITE;
/*!40000 ALTER TABLE `glicose` DISABLE KEYS */;
INSERT INTO `glicose` VALUES (2,12,79,'2023-10-25','11:02:00','Antes da refeição','insulina: apidra\ndose: 10ui\n-------------------------\nmarmita pronta','2023-10-25','12:29:58'),(6,12,207,'2023-10-25','06:06:00','Antes da refeição','insulina: apidra\ndose: 16ui\n-------------------------\n1 chícara de café c/ leite','2023-10-25','12:33:47'),(7,12,190,'2023-10-24','19:10:00','Nenhum','insulina: apidra\ndose: 18ui\n-----------------------\n1 coxinha de frango\n1 churros de doce de leite','2023-10-25','12:35:17'),(9,12,116,'2023-10-24','17:32:00','Jejum',NULL,'2023-10-25','12:38:13'),(10,12,203,'2023-10-24','11:02:00','Antes da refeição','insulina: apidra\ndose: 10ui\n-----------------------\nmarmita pronta','2023-10-25','12:38:59'),(11,12,115,'2023-10-24','08:41:00','2h após a refeição',NULL,'2023-10-25','12:39:49'),(12,12,168,'2023-10-24','06:40:00','Antes da refeição',NULL,'2023-10-25','12:41:21'),(13,12,241,'2023-10-23','19:41:00','Nenhum',NULL,'2023-10-25','12:42:05'),(14,12,186,'2023-10-23','17:49:00','Nenhum',NULL,'2023-10-25','12:44:35'),(15,12,82,'2023-10-23','13:49:00','2h após a refeição',NULL,'2023-10-25','12:44:59'),(16,12,141,'2023-10-23','10:55:00','Antes da refeição',NULL,'2023-10-25','13:26:39'),(17,12,196,'2023-10-23','08:26:00','2h após a refeição',NULL,'2023-10-25','13:27:10'),(18,12,151,'2023-10-23','06:07:00','Antes da refeição',NULL,'2023-10-25','13:27:54'),(19,12,107,'2023-10-22','18:59:00','Antes da refeição',NULL,'2023-10-25','13:37:37'),(20,12,102,'2023-10-22','13:38:00','2h após a refeição',NULL,'2023-10-25','13:37:56'),(21,12,132,'2023-10-22','10:10:00','Antes da refeição',NULL,'2023-10-25','13:38:28'),(22,12,241,'2023-10-21','21:16:00','Antes de dormir',NULL,'2023-10-25','13:38:58'),(23,12,193,'2023-10-21','18:40:00','Antes da refeição',NULL,'2023-10-25','13:39:22'),(24,12,133,'2023-10-21','14:07:00','2h após a refeição',NULL,'2023-10-25','13:39:51'),(25,12,159,'2023-10-21','10:04:00','2h após a refeição',NULL,'2023-10-25','13:40:26'),(26,12,50,'2023-10-21','00:18:00','Nenhum',NULL,'2023-10-25','13:41:03'),(27,12,34,'2023-10-21','00:11:00','Nenhum',NULL,'2023-10-25','13:41:26'),(39,13,123,'2023-10-26','11:09:00','Nenhum',NULL,'2023-10-26','11:09:12'),(40,13,67,'2023-10-26','11:09:00','Nenhum',NULL,'2023-10-26','11:09:22');
/*!40000 ALTER TABLE `glicose` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` char(14) DEFAULT NULL,
  `foto` text DEFAULT '../img/png/anonymous-profile.png',
  `sexo` enum('H','M') DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `altura` decimal(3,2) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_cadastro` date NOT NULL DEFAULT curdate(),
  `perfil` enum('U','A') NOT NULL DEFAULT 'U',
  `situacao` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (12,'Douglas Souza de Lima','douglaslima','douglaslima-pro@outlook.com','$2y$10$kcMrdBGeJ/WalHO6QTWP6.qya8Nrs60tPRyb4/fM9og5A1DknOKRy','048.516.061-76','../img/png/anonymous-profile.png',NULL,NULL,NULL,'2003-01-11','2023-10-25','U',1),(13,'usuario teste','teste','teste@teste.com','$2y$10$26Ha/kVElG3mmtyuFMXSvuHIl4yiZarNI5jUA1EeeUX0CC9IL8NgO',NULL,'../img/png/anonymous-profile.png',NULL,NULL,NULL,NULL,'2023-10-26','U',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tgr_usuario_after_insert` AFTER INSERT
ON `usuario`
FOR EACH ROW
BEGIN
	INSERT INTO diabetes(id_usuario,meta_max,meta_min) VALUES(NEW.id_usuario,160,70);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping events for database 'glico'
--

--
-- Dumping routines for database 'glico'
--
/*!50003 DROP PROCEDURE IF EXISTS `usp_calcularHiperglicemias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_calcularHiperglicemias`(IN id_usuario INT)
BEGIN

SELECT ROUND(((h.hiperglicemias_qtd * 100)/g.glicoses_qtd),2) AS hiperglicemias_porcentagem
FROM
(
	SELECT COUNT(*) AS glicoses_qtd FROM glicose g
	WHERE g.id_usuario = id_usuario AND data BETWEEN DATE_SUB(CURDATE(),INTERVAL 30 DAY) AND CURDATE()
) g,
(
	SELECT COUNT(g.valor) AS hiperglicemias_qtd
	FROM diabetes d
	INNER JOIN glicose g ON
	d.id_usuario = g.id_usuario
	WHERE g.valor > d.meta_max
	AND g.id_usuario = id_usuario AND g.data BETWEEN DATE_SUB(CURDATE(),INTERVAL 30 DAY) AND CURDATE()
) h;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_calcularHipoglicemias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_calcularHipoglicemias`(IN id_usuario INT)
BEGIN

SELECT ROUND(((h.hipoglicemias_qtd * 100)/g.glicoses_qtd),2) AS hipoglicemias_porcentagem
FROM
(
	SELECT COUNT(*) AS glicoses_qtd FROM glicose g
	WHERE g.id_usuario = id_usuario AND data BETWEEN DATE_SUB(CURDATE(),INTERVAL 30 DAY) AND CURDATE()
) g,
(
	SELECT COUNT(g.valor) AS hipoglicemias_qtd
	FROM diabetes d
	INNER JOIN glicose g ON
	d.id_usuario = g.id_usuario
	WHERE g.valor < d.meta_min
	AND g.id_usuario = id_usuario AND g.data BETWEEN DATE_SUB(CURDATE(),INTERVAL 30 DAY) AND CURDATE()
) h;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-26 12:05:37
