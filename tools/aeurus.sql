-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: aeurus
-- ------------------------------------------------------
-- Server version	5.5.31-0ubuntu0.13.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Tag`
--

DROP TABLE IF EXISTS `Tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3BC4F1635E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tag`
--

LOCK TABLES `Tag` WRITE;
/*!40000 ALTER TABLE `Tag` DISABLE KEYS */;
INSERT INTO `Tag` VALUES (6,'Admin Panel'),(7,'Blog'),(12,'Drupal'),(9,'eCommerce'),(15,'Email'),(8,'Gallery'),(11,'Joomla'),(13,'Landing'),(14,'phpBB'),(5,'Responsive'),(10,'Wordpress');
/*!40000 ALTER TABLE `Tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Theme`
--

DROP TABLE IF EXISTS `Theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_56B4C80C5E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Theme`
--

LOCK TABLES `Theme` WRITE;
/*!40000 ALTER TABLE `Theme` DISABLE KEYS */;
INSERT INTO `Theme` VALUES (7,'Chess Club',NULL,'750753b45d43fee7d3982f1ae0c5ddc28fdbee78.jpeg'),(8,'Agriculture',NULL,'1361ac6aec2612e86fd062ec31f1459b3ad18026.jpeg'),(9,'White Chapel',NULL,'c0b7a0c21b8ec6bd7aa0eb79159eac213147f799.jpeg'),(10,'Evaluating',NULL,'f5c6ebbb2fb6696467ee64cd6dddbb9b2ea49f0d.jpeg'),(11,'El Patio',NULL,'d49ae134d017dcf80919807c2c5785583014ac9f.jpeg'),(12,'Welcome',NULL,'66ceb229489f1b90393bd3836fa72f0af5e61ee4.jpeg'),(13,'Spirit',NULL,'073416c69d785df99b8d1cd51e3bf8775d91e7c6.jpeg'),(14,'Anna',NULL,'8db514174901a299869fab0e471995656a2b509b.jpeg'),(15,'Motive',NULL,'0356c0dfb6ff0836c5b6352b796046c649d8dbde.jpeg'),(16,'Andre & Gloria',NULL,'165d658777fe9ed70678eeb9dc3347441160a121.jpeg'),(17,'Defense',NULL,'ba5c2f19063bc1c4d2b9c34efa79ce3eb0510525.jpeg'),(18,'Alliance',NULL,'0543de34a82daaa7cab6ef9e44ff9d729414aa76.jpeg');
/*!40000 ALTER TABLE `Theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme_tag`
--

DROP TABLE IF EXISTS `theme_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theme_tag` (
  `theme_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`theme_id`,`tag_id`),
  KEY `IDX_1BD8CBE759027487` (`theme_id`),
  KEY `IDX_1BD8CBE7BAD26311` (`tag_id`),
  CONSTRAINT `FK_1BD8CBE759027487` FOREIGN KEY (`theme_id`) REFERENCES `Theme` (`id`),
  CONSTRAINT `FK_1BD8CBE7BAD26311` FOREIGN KEY (`tag_id`) REFERENCES `Tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme_tag`
--

LOCK TABLES `theme_tag` WRITE;
/*!40000 ALTER TABLE `theme_tag` DISABLE KEYS */;
INSERT INTO `theme_tag` VALUES (7,11),(8,7),(8,8),(8,12),(9,5),(10,8),(10,9),(10,11),(10,15),(11,12),(12,15),(13,7),(14,7),(15,9),(16,10),(17,5),(18,7);
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

-- Dump completed on 2013-07-19 13:58:08
