-- MySQL dump 10.13  Distrib 5.5.30, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: aeurus
-- ------------------------------------------------------
-- Server version	5.5.30-1.1

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
-- Dumping data for table `Tag`
--

LOCK TABLES `Tag` WRITE;
/*!40000 ALTER TABLE `Tag` DISABLE KEYS */;
INSERT INTO `Tag` VALUES (6,'Admin Panel'),(7,'Blog'),(12,'Drupal'),(9,'eCommerce'),(15,'Email'),(8,'Gallery'),(11,'Joomla'),(13,'Landing'),(14,'phpBB'),(5,'Responsive');
/*!40000 ALTER TABLE `Tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Theme`
--

LOCK TABLES `Theme` WRITE;
/*!40000 ALTER TABLE `Theme` DISABLE KEYS */;
INSERT INTO `Theme` VALUES (7,'Chess Club',NULL,'750753b45d43fee7d3982f1ae0c5ddc28fdbee78.jpeg'),(8,'Agricultures',NULL,'1361ac6aec2612e86fd062ec31f1459b3ad18026.jpeg'),(9,'White Chapel',NULL,'c0b7a0c21b8ec6bd7aa0eb79159eac213147f799.jpeg'),(10,'Evaluating',NULL,'f5c6ebbb2fb6696467ee64cd6dddbb9b2ea49f0d.jpeg'),(11,'El Patio',NULL,'d49ae134d017dcf80919807c2c5785583014ac9f.jpeg'),(12,'Welcome',NULL,'66ceb229489f1b90393bd3836fa72f0af5e61ee4.jpeg'),(13,'Spirit',NULL,'073416c69d785df99b8d1cd51e3bf8775d91e7c6.jpeg'),(14,'Anna',NULL,'8db514174901a299869fab0e471995656a2b509b.jpeg'),(15,'Motive',NULL,'0356c0dfb6ff0836c5b6352b796046c649d8dbde.jpeg'),(16,'Andre & Gloria',NULL,'165d658777fe9ed70678eeb9dc3347441160a121.jpeg'),(17,'Defense',NULL,'ba5c2f19063bc1c4d2b9c34efa79ce3eb0510525.jpeg'),(18,'Alliance',NULL,'0543de34a82daaa7cab6ef9e44ff9d729414aa76.jpeg');
/*!40000 ALTER TABLE `Theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (1,'admin','admin','ricamphe@gmail.com','ricamphe@gmail.com',1,'k7l0b5joa5ckw0ksw4ogookocsscws8','XLog8K77lxEYu2XvXI2/2XsSkf9VihdAGxI5NUyjMB8nrrnPt21JjYpSYBdmjIXRyo8g8/G2pi94DMJe9Rdatg==','2013-08-27 00:33:05',0,0,NULL,NULL,NULL,'a:1:{i:0;s:10:\"ROLE_ADMIN\";}',0,NULL,'Rodrigo','Campos'),(4,'miguel','miguel','miguehermosilla@udec.cl','miguehermosilla@udec.cl',1,'lup6riwm0mookg8w4goccckw08ocwos','s8pzjk9RAy4wv8tEuskactv5XF1il/nI4350wYhRf6pYov3pQRdMGT3JhW2Ue7oM4lLGC0mSRfn5TgmgfPP0+A==','2013-08-01 15:30:08',0,0,NULL,NULL,NULL,'a:1:{i:0;s:10:\"ROLE_ADMIN\";}',0,NULL,'Miguel','Hermosilla');
/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme_tag`
--

--
-- Dumping data for table `theme_tag`
--

LOCK TABLES `theme_tag` WRITE;
/*!40000 ALTER TABLE `theme_tag` DISABLE KEYS */;
INSERT INTO `theme_tag` VALUES (7,11),(7,12),(8,7),(9,5),(10,9),(10,15),(11,12),(12,15),(13,7),(14,7),(15,9),(17,5),(18,7);
/*!40000 ALTER TABLE `theme_tag` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-03 22:31:05
