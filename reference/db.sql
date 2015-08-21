-- MySQL dump 10.13  Distrib 5.1.73, for Win32 (ia32)
--
-- Host: localhost    Database: als_dev
-- ------------------------------------------------------
-- Server version	5.1.73-community

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
-- Table structure for table `tbl_book`
--

DROP TABLE IF EXISTS `tbl_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_book` (
  `bid` varchar(20) NOT NULL DEFAULT '',
  `b_name` varchar(128) NOT NULL DEFAULT '',
  `author` varchar(128) DEFAULT NULL,
  `country` varchar(32) DEFAULT NULL,
  `age` varchar(32) DEFAULT NULL,
  `pub_date` date DEFAULT NULL,
  `pub_house` varchar(128) DEFAULT NULL,
  `type` varchar(4) DEFAULT NULL,
  `rectime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_book`
--

LOCK TABLES `tbl_book` WRITE;
/*!40000 ALTER TABLE `tbl_book` DISABLE KEYS */;
INSERT INTO `tbl_book` VALUES ('1439883823437751','史记','司马迁','中国','汉','1949-01-01','测试','k1','2015-08-18 07:43:43');
/*!40000 ALTER TABLE `tbl_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_book_seq`
--

DROP TABLE IF EXISTS `tbl_book_seq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_book_seq` (
  `bid` varchar(20) NOT NULL,
  `serial_no` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_book_seq`
--

LOCK TABLES `tbl_book_seq` WRITE;
/*!40000 ALTER TABLE `tbl_book_seq` DISABLE KEYS */;
INSERT INTO `tbl_book_seq` VALUES ('1439883823437751','1'),('1439883823437751','2'),('1439883823437751','3');
/*!40000 ALTER TABLE `tbl_book_seq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_book_type`
--

DROP TABLE IF EXISTS `tbl_book_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_book_type` (
  `t_no` varchar(6) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`t_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_book_type`
--

LOCK TABLES `tbl_book_type` WRITE;
/*!40000 ALTER TABLE `tbl_book_type` DISABLE KEYS */;
INSERT INTO `tbl_book_type` VALUES ('i1','小说'),('j1','书法'),('j2','绘画'),('k1','传记'),('k2','诗集'),('k3','地理');
/*!40000 ALTER TABLE `tbl_book_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-21 15:41:34
