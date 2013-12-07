-- MySQL dump 10.13  Distrib 5.5.32, for Win32 (x86)
--
-- Host: localhost    Database: mkyrrh_makaya
-- ------------------------------------------------------
-- Server version	5.5.32

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
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `article_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `article_image` varchar(500) NOT NULL,
  `article_title` varchar(200) NOT NULL,
  `article_body` longtext NOT NULL,
  `article_type_id` tinyint(4) NOT NULL,
  `article_status` tinyint(4) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'3_20131101170429.jpg','Penchang the Creator','3_20131101170429.jpg',2,1,1,NULL,NULL),(2,'3_20131101170429.jpg','Jayvz the Great','3_20131101170429.jpg',2,1,1,NULL,NULL),(4,'15_20131026195144.jpg','The Greeny Ballpen','<p>Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.</p>\n<p>Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.</p>\n<p>Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.</p>',1,1,1,'2013-10-26 11:51:44',NULL),(5,'16_20131027120404.jpg','Pink Ballpen Song','<p>What does the fox say?</p>\n<p class=\"verse\">Ring-ding-ding-ding-dingeringeding!<br /> Gering-ding-ding-ding-dingeringeding!<br /> Gering-ding-ding-ding-dingeringeding!</p>',1,1,1,'2013-10-26 12:17:46','2013-10-27 17:04:04'),(8,'1_20131101152156.jpg','GKonomiks The Story','<p>GKonomics International, Inc. is a non-stock, non-profit organization, incorporated in 2009. We are a Gawad Kalinga partner in social enterprise development.</p>',3,1,1,'2013-11-01 07:21:56','2013-11-01 07:27:38'),(9,'3_20131101170429.jpg','2GO Philippnines Article','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>',3,1,1,'2013-11-01 09:04:29','2013-11-03 08:58:10'),(10,'7_20131111202415.png','The GKonomics','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>',3,1,1,'2013-11-12 02:24:15',NULL),(11,'4_20131116031557.jpg','Bluish Ballpen','<p>&lt;p&gt;Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.&lt;/p&gt;</p>\n<p>&lt;p&gt;Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.&lt;/p&gt;</p>\n<p>&lt;p&gt;Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.&lt;/p&gt;</p>',1,1,1,'2013-11-16 09:15:57',NULL);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_type`
--

DROP TABLE IF EXISTS `article_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_type` (
  `article_type_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `article_type` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`article_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_type`
--

LOCK TABLES `article_type` WRITE;
/*!40000 ALTER TABLE `article_type` DISABLE KEYS */;
INSERT INTO `article_type` VALUES (1,'product'),(2,'artisan'),(3,'enterprise');
/*!40000 ALTER TABLE `article_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artisan`
--

DROP TABLE IF EXISTS `artisan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artisan` (
  `artisan_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `artisan_name` varchar(200) NOT NULL,
  `artisan_description` longtext NOT NULL,
  `artisan_status` tinyint(4) NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `enterprise_id` bigint(20) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`artisan_id`),
  KEY `article_id` (`article_id`),
  KEY `enterprise_id` (`enterprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artisan`
--

LOCK TABLES `artisan` WRITE;
/*!40000 ALTER TABLE `artisan` DISABLE KEYS */;
INSERT INTO `artisan` VALUES (1,'Aleng Penchang','She is creating website',1,1,1,NULL,NULL),(2,'Mang Jayvz','He is creating website.',1,2,1,NULL,'2013-11-03 11:39:26');
/*!40000 ALTER TABLE `artisan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artisan_album`
--

DROP TABLE IF EXISTS `artisan_album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artisan_album` (
  `artisan_album_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `artisan_image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `artisan_id` bigint(20) NOT NULL,
  `is_primary` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`artisan_album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artisan_album`
--

LOCK TABLES `artisan_album` WRITE;
/*!40000 ALTER TABLE `artisan_album` DISABLE KEYS */;
INSERT INTO `artisan_album` VALUES (1,'20130921015223.jpeg',1,0,'2013-10-19 10:49:43'),(2,'20130921015223.jpeg',2,0,'2013-10-19 10:49:43'),(3,'2_20131027114646.jpg',2,1,'2013-10-27 16:46:46'),(4,'3_20131103193732.jpg',3,1,'2013-11-03 11:37:32'),(5,'4_20131103193834.jpg',4,1,'2013-11-03 11:38:34'),(6,'1_20131116060832.jpeg',1,1,'2013-11-16 12:08:33');
/*!40000 ALTER TABLE `artisan_album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artisan_product`
--

DROP TABLE IF EXISTS `artisan_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artisan_product` (
  `ap_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `artisan_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ap_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artisan_product`
--

LOCK TABLES `artisan_product` WRITE;
/*!40000 ALTER TABLE `artisan_product` DISABLE KEYS */;
INSERT INTO `artisan_product` VALUES (1,1,3,'2013-10-19 09:42:21'),(2,1,4,'2013-10-19 09:42:21'),(3,2,5,'2013-10-19 09:42:38'),(7,1,15,'2013-10-26 11:21:41'),(8,2,15,'2013-10-26 11:21:41'),(9,1,16,'2013-10-26 12:02:09'),(10,2,17,'2013-11-30 11:01:37'),(11,2,18,'2013-11-30 11:01:56'),(12,2,19,'2013-11-30 11:02:15');
/*!40000 ALTER TABLE `artisan_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection`
--

DROP TABLE IF EXISTS `collection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collection` (
  `collection_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `collection_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `collection_status` tinyint(4) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`collection_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection`
--

LOCK TABLES `collection` WRITE;
/*!40000 ALTER TABLE `collection` DISABLE KEYS */;
INSERT INTO `collection` VALUES (1,'Home And Office',1,NULL,NULL),(2,'House and Lot',1,'2013-10-14 06:06:57','2013-11-30 11:31:12'),(3,'Kitchen Showcase',1,'2013-10-14 06:06:57','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `collection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection_artisan`
--

DROP TABLE IF EXISTS `collection_artisan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collection_artisan` (
  `ca_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `collection_id` bigint(20) NOT NULL,
  `artisan_id` bigint(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection_artisan`
--

LOCK TABLES `collection_artisan` WRITE;
/*!40000 ALTER TABLE `collection_artisan` DISABLE KEYS */;
INSERT INTO `collection_artisan` VALUES (1,3,1,'2013-11-16 09:13:33');
/*!40000 ALTER TABLE `collection_artisan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection_enterprise`
--

DROP TABLE IF EXISTS `collection_enterprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collection_enterprise` (
  `ce_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `collection_id` bigint(20) NOT NULL,
  `enterprise_id` bigint(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ce_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection_enterprise`
--

LOCK TABLES `collection_enterprise` WRITE;
/*!40000 ALTER TABLE `collection_enterprise` DISABLE KEYS */;
INSERT INTO `collection_enterprise` VALUES (1,1,5,'2013-11-03 10:55:09'),(2,3,5,'2013-11-03 10:55:09'),(3,1,6,'2013-11-03 11:04:45'),(4,1,7,'2013-11-03 11:13:02'),(5,2,7,'2013-11-03 11:13:02'),(6,3,7,'2013-11-03 11:13:02'),(7,1,8,'2013-11-03 11:13:25');
/*!40000 ALTER TABLE `collection_enterprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection_product`
--

DROP TABLE IF EXISTS `collection_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collection_product` (
  `cp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `collection_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection_product`
--

LOCK TABLES `collection_product` WRITE;
/*!40000 ALTER TABLE `collection_product` DISABLE KEYS */;
INSERT INTO `collection_product` VALUES (1,1,3,'2013-10-26 09:10:20'),(2,2,4,'2013-10-26 09:10:20'),(3,3,5,'2013-10-26 09:10:20'),(7,1,15,'2013-10-26 11:21:41'),(8,2,15,'2013-10-26 11:21:41'),(9,3,15,'2013-10-26 11:21:41'),(10,3,16,'2013-10-26 12:02:09'),(11,3,4,'2013-11-16 12:06:19'),(12,2,17,'2013-11-30 11:01:37'),(13,2,18,'2013-11-30 11:01:56'),(14,2,19,'2013-11-30 11:02:15');
/*!40000 ALTER TABLE `collection_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `article_id` bigint(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `country_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `country_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enterprise`
--

DROP TABLE IF EXISTS `enterprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enterprise` (
  `enterprise_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `enterprise_name` varchar(200) NOT NULL,
  `enterprise_description` varchar(500) NOT NULL,
  `enterprise_status` tinyint(4) NOT NULL,
  `article_id` bigint(20) NOT NULL DEFAULT '0',
  `date_created` timestamp NULL DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`enterprise_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enterprise`
--

LOCK TABLES `enterprise` WRITE;
/*!40000 ALTER TABLE `enterprise` DISABLE KEYS */;
INSERT INTO `enterprise` VALUES (7,'GKonomics','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',1,10,'2013-11-03 11:13:02','2013-11-12 02:24:15'),(8,'2GO Philippines','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',1,9,'2013-11-03 11:13:25',NULL);
/*!40000 ALTER TABLE `enterprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enterprise_album`
--

DROP TABLE IF EXISTS `enterprise_album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enterprise_album` (
  `enterprise_album_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `enterprise_id` bigint(20) NOT NULL,
  `enterprise_image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `is_primary` tinyint(4) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`enterprise_album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enterprise_album`
--

LOCK TABLES `enterprise_album` WRITE;
/*!40000 ALTER TABLE `enterprise_album` DISABLE KEYS */;
INSERT INTO `enterprise_album` VALUES (3,1,'1_20131101154614.jpg',1,'2013-11-01 07:46:14'),(4,3,'3_20131101165401.jpg',1,'2013-11-01 08:54:01'),(5,3,'3_20131101165401.jpg',0,'2013-11-01 08:54:01'),(6,3,'3_20131101171537.jpg',0,'2013-11-01 09:15:37'),(7,2,'2_20131103181026.jpg',1,'2013-11-03 10:10:27'),(8,4,'4_20131103182545.jpg',1,'2013-11-03 10:25:45'),(9,5,'5_20131103185509.jpg',1,'2013-11-03 10:55:09'),(10,6,'6_20131103190445.jpg',1,'2013-11-03 11:04:45'),(11,7,'7_20131103191302.jpg',1,'2013-11-03 11:13:02'),(12,8,'8_20131103191325.jpg',1,'2013-11-03 11:13:25'),(13,8,'8_20131103194106.jpg',0,'2013-11-03 11:41:06');
/*!40000 ALTER TABLE `enterprise_album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enterprise_artisan`
--

DROP TABLE IF EXISTS `enterprise_artisan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enterprise_artisan` (
  `ea_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `enterprise_id` bigint(20) NOT NULL,
  `artisan_id` bigint(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enterprise_artisan`
--

LOCK TABLES `enterprise_artisan` WRITE;
/*!40000 ALTER TABLE `enterprise_artisan` DISABLE KEYS */;
INSERT INTO `enterprise_artisan` VALUES (1,7,1,'2013-11-16 09:07:50'),(2,7,2,'2013-11-16 09:07:53'),(3,8,3,'2013-11-03 11:37:32'),(4,8,4,'2013-11-03 11:38:34');
/*!40000 ALTER TABLE `enterprise_artisan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `feedback_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `feedback_subject` varchar(100) NOT NULL,
  `feedback_email` varchar(100) NOT NULL,
  `feedback_message` longtext NOT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'Good','jacyncampasa@yahoo.com','Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.','2013-11-16 11:53:06');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(300) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '0',
  `product_status` tinyint(4) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_highlighted` tinyint(4) NOT NULL DEFAULT '0',
  `article_id` bigint(20) DEFAULT '0',
  `date_created` timestamp NULL DEFAULT NULL,
  `product_last_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (4,'Blue Ballpen','a shiny red ballpen. Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.',6,1,5,10,0,2,5.25,0,11,'2013-10-14 08:23:32','2013-11-16 09:15:57'),(15,'Green Ballpen','Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.',6,1,1,2,3,4,5.00,0,4,'2013-10-26 11:21:41','2013-10-26 11:51:44'),(16,'Pink Ballpen','Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.',6,1,1,2,3,4,10.00,1,5,'2013-10-26 12:02:09','2013-11-23 07:44:18'),(17,'Test to be deleted','Ttt',1,0,1,1,1,12,1.00,0,0,'2013-11-30 11:01:37',NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_album`
--

DROP TABLE IF EXISTS `product_album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_album` (
  `product_album_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_image` varchar(500) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `is_primary` tinyint(4) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_album`
--

LOCK TABLES `product_album` WRITE;
/*!40000 ALTER TABLE `product_album` DISABLE KEYS */;
INSERT INTO `product_album` VALUES (2,'4_20131026173548.jpg',4,1,'2013-10-19 10:46:59'),(4,'4_20131026173637.jpg',4,0,'2013-10-26 09:36:37'),(5,'4_20131026173714.jpg',4,0,'2013-10-26 09:37:14'),(6,'15_20131026192141.jpg',15,1,'2013-10-26 09:37:14'),(7,'15_20131026193901.jpg',15,0,'2013-10-26 11:39:01'),(8,'16_20131026200209.jpg',16,1,'2013-10-26 12:02:09');
/*!40000 ALTER TABLE `product_album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_country`
--

DROP TABLE IF EXISTS `product_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_country` (
  `pc_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `country_product_price` decimal(10,2) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_country`
--

LOCK TABLES `product_country` WRITE;
/*!40000 ALTER TABLE `product_country` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_order`
--

DROP TABLE IF EXISTS `product_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_order` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `is_purchased` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NULL DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_order`
--

LOCK TABLES `product_order` WRITE;
/*!40000 ALTER TABLE `product_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_history`
--

DROP TABLE IF EXISTS `transaction_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_history` (
  `tx_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(500) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `transaction_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tx_id`),
  KEY `product_order_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_history`
--

LOCK TABLES `transaction_history` WRITE;
/*!40000 ALTER TABLE `transaction_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(88) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT '0',
  `user_status` tinyint(4) NOT NULL DEFAULT '0',
  `date_created` timestamp NULL DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT NULL,
  `access_token` varchar(100) NOT NULL,
  `activation_code` varchar(1000) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'jayvzolazo@gmail.com','dfe74cac7654a17b5b717091daec8b2693fe03e1','Jayvz','Olazo',1,1,'2013-10-13 07:58:00',NULL,'6684691d825c3b3e9b737162c5f8774ee5bfc5bd',''),(13,'jacyncampasa@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','Jacyn','Olazo',4,1,'2013-11-16 11:44:40','2013-11-16 13:11:09','','445aa41f688e99e25166bb79972b60eabce9d5b2'),(14,'jacyncampasa@yahoo.com','7c4a8d09ca3762af61e59520943dc26494f8941b','Jacyn2','Campasa2',4,1,'2013-11-16 11:51:46',NULL,'','143b378d6bedfec189455e6efdbf131d5eafda46');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'superadmin'),(2,'administrator'),(3,'staff'),(4,'member');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-07 17:13:46
