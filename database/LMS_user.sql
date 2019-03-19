-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: LMS
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `RollNo` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Type` varchar(50) DEFAULT 'Student',
  `Category` varchar(50) DEFAULT NULL,
  `EmailId` varchar(50) DEFAULT NULL,
  `MobNo` bigint(11) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `status` boolean NULL DEFAULT 1,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`RollNo`),
  UNIQUE KEY `EmailId` (`EmailId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user`(RollNo,Name,Type,Category,EmailId,MobNo,Password) VALUES ('ADMIN','admin','Admin',NULL,'admin@ac.in',8178139588,'admin'),('17BCB0023','John','Student','GEN','john@gmail.com',9876543210,'17BCB0023'),('16BCB0003','Aham','Student','ST','aham@yahoo.com',7845965212,'16BCB0003'),('17BCE0203','Akshit','Student','OBC','akshit@hotmail.com',8512451245,'17BCE0203'),('17BME0004','bhanu','Student','GEN','bhanu@gmail.com',7352416352,'17BME0004'),('17BCE0057','bali','Student','SC','bali@gmail.com',96685747485,'17BCE0057'),('15BCE0114','Babita','Student','GEN','babita@gmail.com',7141415263,'15BCE0114'),('18BCE0104','Golu','Student','GEN','golu@yahoo.com',8545451212,'18BCE0104'),('18BCE0008','Bean','Student','GEN','bean10@hotmail.com',9352416345,'18BCE0008'),('17BCE0094','Aisha','Student','GEN','aisha@yahoo.com',7845124578,'17BCE0094'),('16BCE0014','Hari','Student','GEN','hari@hotmail.com',6578457845,'16BCE0014'),('17BIT0011','Ramlal','Student','GEN','ramlal@yahoo.com',9685747474,'17BIT0011'),('16BCL0012','Kalyan','Student','ST','kalyan@hotmail.com',9242425163,'16BCL0012'),('16BEE0013','Mahesh','Student','OBC','mahesh@gmail.com',9685748574,'16BEE0013'),('16BIT0111','Bharat','Student','GEN','bharat@gmail.com',123456,'abcd'),('17BCE0158','MANU','Student','GEN','manu@gmail.com',8365917597,'manu'),('16BME0257','Vignesh','Student','GEN','vignesh@gmail.com',9451525356,'16BME0257'),('16BME0217','Jai','Student','SC','jai@yahoo.com',9898982020,'16BME0217'),('16BCE0412','Bunty','Student','ST','legendary@gmail.com',9695989192,'16BCE0412'),('17BCE0432','Ruchi','Student','GEN','ruchi@gmail.com',7475787671,'17BCE0432'),('17BCE0511','MALHAR','Student','OBC','malhar@gmail.com',9756153859,'17BCE0511'),('16MIS0632','KENIL','Student','GEN','kenilshah081198@gmail.com',9892506094,'16MIS0632'),('17BEE0777','Sharon','Student','GEN','smartestperson@gmail.com',9696969696,'17BEE0777'),('16BCE0854','Ram Prabhu','Student','SC','ram@vit.ac.in',9685987659,'16BCE0854'),('17BCE0951','Milani','Student','SC','watermaster@hotmail.com',8145424847,'17BCE0951'),('17BEC0999','Chandni','Student','OBC','sarcastic@hotmail.com',9494959694,'17BEC0999');

	/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-27 13:20:27
