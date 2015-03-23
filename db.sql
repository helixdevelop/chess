-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: chess
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.10.1

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
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `name` varchar(50) NOT NULL COMMENT 'Name',
  `email` varchar(30) NOT NULL COMMENT 'E-mail',
  `password` varchar(255) NOT NULL COMMENT 'Password',
  `salt` varchar(255) NOT NULL COMMENT 'Salt',
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Create Date',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrators`
--

LOCK TABLES `administrators` WRITE;
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` VALUES (1,'Marcin Chmielik','mchmiel88@gmail.com','3dfa94cca536cf7d8e26f4eccc9fdd7ae50a464a','42e2d095bbf56ffb366221bc2a3d3705','2015-01-27 21:39:32'),(2,'Marcin Chmielik','mchmiel88@gmail.com2','3dfa94cca536cf7d8e26f4eccc9fdd7ae50a464a','42e2d095bbf56ffb366221bc2a3d3705','2015-01-27 21:39:32'),(3,'Marcin Chmielik','mchmiel88@gmail.com3','3dfa94cca536cf7d8e26f4eccc9fdd7ae50a464a','42e2d095bbf56ffb366221bc2a3d3705','2015-01-27 21:39:32'),(4,'MarcinChmielik','mchmiel8d8@gmail.com','cd0be16dba27c5fff14e654ee257284b52331d89','42e2d095bbf56ffb366221bc2a3d3705','2015-01-27 21:39:32'),(5,'MarcinChmielik','mchmielxx88@gmail.com','08ece35eb1bc472dc1b4b6559e274d4c8d94dafc','42e2d095bbf56ffb366221bc2a3d3705','2015-01-27 21:39:32'),(6,'Marcin Chmielik','mchmiel88@gmail.com6','3dfa94cca536cf7d8e26f4eccc9fdd7ae50a464a','42e2d095bbf56ffb366221bc2a3d3705','2015-01-27 21:39:32');
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-23 21:47:10
