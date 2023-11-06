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
  `tipo_diabetes` enum('Nenhum','Pré-diabetes','Diabetes Mellitus Tipo 1','Diabetes Mellitus Tipo 2','Diabetes gestacional') DEFAULT 'Nenhum',
  `terapia` enum('Nenhum','Insulina (caneta)','Insulina (seringa)','Insulina (bomba)','Medicação oral','Outro') DEFAULT 'Nenhum',
  `data_diagnostico` date DEFAULT NULL,
  `meta_max` int(3) DEFAULT NULL,
  `meta_min` int(3) DEFAULT NULL,
  UNIQUE KEY `id_usuario` (`id_usuario`),
  KEY `fk_diabetes_usuario_id_usuario` (`id_usuario`),
  CONSTRAINT `fk_diabetes_usuario_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `recuperacao`
--

DROP TABLE IF EXISTS `recuperacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recuperacao` (
  `id_usuario` int(6) NOT NULL,
  `chave` varchar(155) NOT NULL,
  KEY `id_usuario` (`id_usuario`,`chave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `sexo` enum('M','F') DEFAULT NULL,
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

-- Dump completed on 2023-11-06 12:31:51
