-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: it_project
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `uname` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('admin','password');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `min_cgpa` float(4,2) DEFAULT NULL,
  `cse_vac` int(11) NOT NULL,
  `cve_vac` int(11) NOT NULL,
  `mee_vac` int(11) NOT NULL,
  `eee_vac` int(11) NOT NULL,
  `ece_vac` int(11) NOT NULL,
  `pee_vac` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (7,'Wipro',8.00,3,0,0,0,0,0),(8,'IBM',4.20,5,0,0,0,0,0),(9,'accenture',4.20,10,5,5,7,3,2),(10,'protech',0.00,0,10,6,5,7,2),(11,'google',9.00,2,0,0,0,0,0);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_list`
--

DROP TABLE IF EXISTS `final_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `final_list` (
  `student_id` varchar(20) NOT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_list`
--

LOCK TABLES `final_list` WRITE;
/*!40000 ALTER TABLE `final_list` DISABLE KEYS */;
INSERT INTO `final_list` VALUES ('2015CSE003','accenture'),('2015CSE005','accenture'),('2015CSE006','google'),('2015CSE008','accenture'),('2015CSE009','IBM'),('2015CSE010','accenture'),('2015CSE011','IBM'),('2015CSE012','accenture'),('2015CSE013','accenture'),('2015CSE014','IBM'),('2015CSE015','accenture'),('2015CSE016','accenture'),('2015CSE025','Wipro'),('2015CSE039','accenture'),('2015CSE040','Wipro'),('2015CSE041','Wipro'),('2015CSE043','IBM'),('2015CSE044','accenture'),('2015CSE045','accenture'),('2015CSE046','google'),('2015CSE103','IBM'),('2015MEE003','protech'),('2015MEE004','accenture');
/*!40000 ALTER TABLE `final_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `std_cmp`
--

DROP TABLE IF EXISTS `std_cmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `std_cmp` (
  `std_id` varchar(20) NOT NULL,
  `cmp_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `std_cmp`
--

LOCK TABLES `std_cmp` WRITE;
/*!40000 ALTER TABLE `std_cmp` DISABLE KEYS */;
INSERT INTO `std_cmp` VALUES ('2015cse003',8,1),('2015cse003',9,2),('2015cse004',8,2),('2015cse004',9,1),('2015cse005',7,4),('2015cse005',8,3),('2015cse005',9,2),('2015cse005',11,1),('2015cse006',7,2),('2015cse006',8,4),('2015cse006',9,3),('2015cse006',11,1),('2015cse007',8,1),('2015cse007',9,2),('2015cse008',8,1),('2015cse008',9,2),('2015cse009',7,1),('2015cse009',8,2),('2015cse010',9,0),('2015cse011',8,1),('2015cse011',9,2),('2015cse012',8,1),('2015cse012',9,2),('2015cse013',8,1),('2015cse013',9,2),('2015cse014',7,4),('2015cse014',8,2),('2015cse014',9,3),('2015cse014',11,1),('2015cse015',8,1),('2015cse015',9,2),('2015cse016',8,1),('2015cse016',9,2),('2015cse025',7,1),('2015cse025',8,3),('2015cse025',9,2),('2015cse039',8,1),('2015cse039',9,2),('2015cse040',7,2),('2015cse040',8,3),('2015cse040',11,0),('2015cse041',7,1),('2015cse041',8,2),('2015cse041',9,3),('2015cse043',8,1),('2015cse043',9,2),('2015cse044',8,1),('2015cse044',9,2),('2015cse045',8,2),('2015cse045',9,1),('2015cse046',7,2),('2015cse046',8,3),('2015cse046',9,4),('2015cse046',11,1),('2015mee003',9,2),('2015mee003',10,1),('2015mee004',9,1),('2015mee004',10,2);
/*!40000 ALTER TABLE `std_cmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `fname` char(25) NOT NULL,
  `lname` char(25) NOT NULL,
  `id` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `dept` char(3) NOT NULL,
  `gender` char(1) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `apply` int(11) DEFAULT NULL,
  `dp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('ABDULLAH','SIDDIQUE','2015CSE003','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 18:34:41',1,1),('ABHAY','HM','2015CSE004','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:20:52',1,1),('AJMAL','ROSHAN','2015CSE005','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:23:40',1,1),('AJAY','B','2015CSE006','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:24:35',1,1),('ARON','M','2015CSE007','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:45:09',1,1),('ABHILENDRA','JHA','2015CSE008','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:27:30',1,1),('AYSHA','C','2015CSE009','12345678','jaseemashraf97@gmail.com','CSE','F','2018-04-29 19:49:20',1,1),('AMIT','P','2015CSE010','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:28:33',1,1),('ACHALA','HEGDE','2015CSE011','12345678','jaseemashraf97@gmail.com','CSE','F','2018-04-29 19:29:03',1,1),('JAMES','MORTON','2015CSE012','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:46:36',1,1),('ANIL','B','2015CSE013','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:56:45',1,1),('ANZIL','AYOOB','2015CSE014','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:57:34',1,1),('RABEEH','AMEER','2015CSE015','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:58:44',1,1),('KARTHIK','C','2015CSE016','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:48:13',1,1),('ASHUTOSH','AWASTHI','2015CSE025','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:25:26',1,1),('IDRIS','MASOOD','2015CSE039','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:35:43',1,1),('HARSHITA','C','2015CSE040','12345678','jaseemashraf97@gmail.com','CSE','F','2018-04-29 19:31:31',1,1),('NAZIM','K','2015CSE041','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:32:09',1,1),('AHAAN','HEGDE','2015CSE043','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:50:08',1,1),('HARSHITHA','GN','2015CSE044','12345678','jaseemashraf97@gmail.com','CSE','F','2018-04-29 19:32:43',1,1),('HIBA','K','2015CSE045','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:42:09',1,1),('ISAAC','C','2015CSE046','12345678','jaseemashraf97@gmail.com','CSE','M','2018-04-29 19:33:23',1,1),('SHIBIL','VK','2015MEE003','12345678','jaseemashraf97@gmail.com','MEE','M','2018-04-29 19:59:33',1,5),('HARIS','C','2015MEE004','12345678','jaseemashraf97@gmail.com','MEE','M','2018-04-29 20:00:06',1,5);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_cgpa`
--

DROP TABLE IF EXISTS `student_cgpa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_cgpa` (
  `id` varchar(10) NOT NULL,
  `cgpa` double(4,2) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_cgpa`
--

LOCK TABLES `student_cgpa` WRITE;
/*!40000 ALTER TABLE `student_cgpa` DISABLE KEYS */;
INSERT INTO `student_cgpa` VALUES ('2015CSE003',7.00),('2015CSE004',5.00),('2015CSE005',9.00),('2015CSE006',10.00),('2015CSE007',5.00),('2015CSE008',6.00),('2015CSE009',8.00),('2015CSE010',5.60),('2015CSE011',7.80),('2015CSE012',5.40),('2015CSE013',7.30),('2015CSE014',9.80),('2015CSE015',7.20),('2015CSE016',5.90),('2015CSE017',7.30),('2015CSE018',5.10),('2015CSE020',9.00),('2015CSE022',7.60),('2015CSE025',8.00),('2015CSE026',9.10),('2015CSE028',8.26),('2015CSE029',5.96),('2015CSE030',7.80),('2015CSE033',7.10),('2015CSE034',6.80),('2015CSE035',6.90),('2015CSE036',7.54),('2015CSE038',9.67),('2015CSE039',6.00),('2015CSE040',9.11),('2015CSE041',8.22),('2015CSE042',6.64),('2015CSE043',7.56),('2015CSE044',6.25),('2015CSE045',7.90),('2015CSE046',10.00),('2015MEE003',7.00),('2015MEE004',5.00),('2015MEE005',9.00),('2015MEE006',10.00),('2015MEE007',5.00),('2015MEE008',6.00),('2015MEE009',8.00),('2015MEE010',5.60),('2015MEE011',7.80),('2015MEE012',5.40),('2015MEE013',7.30),('2015MEE014',9.80),('2015MEE015',7.20),('2015MEE016',5.90),('2015MEE018',5.10),('2015MEE020',9.00),('2015MEE022',7.60),('2015MEE026',9.10),('2015MEE028',8.26),('2015MEE029',5.96),('2015MEE030',7.80),('2015MEE033',7.10),('2015MEE034',6.80),('2015MEE035',6.90),('2015MEE036',7.54),('2015MEE038',9.67),('2015MEE039',3.50),('2015MEE040',9.11),('2015MEE041',8.22),('2015MEE042',6.64),('2015MEE043',7.56),('2015MEE044',6.25),('2015MEE045',7.90),('2015MEE046',10.00);
/*!40000 ALTER TABLE `student_cgpa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-12 14:21:09
