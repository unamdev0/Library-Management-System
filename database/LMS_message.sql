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
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `M_Id` int(10) NOT NULL AUTO_INCREMENT,
  `SNo` varchar(50) NOT NULL,
  `RNo` varchar(50) NOT NULL,
  `Msg` varchar(255) NOT NULL,
  `Date` date NOT NULL DEFAULT (CURRENT_DATE),
  `Time` time NOT NULL DEFAULT (CURRENT_TIME),
  PRIMARY KEY (`M_Id`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`SNo`) REFERENCES `user` (`RollNo`),
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`RNo`) REFERENCES `user` (`RollNo`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*INSERT INTO `message` VALUES (1,'16BIT0111','Your request for BookId: 1  has been accepted','2018-10-15','23:47:40'),(2,'17BCE0158','Your request for BookId: 1  has been accepted','2018-10-15','23:47:50'),(3,'17BCE0158','Your request for BookId: 2  has been rejected','2018-10-15','23:47:58'),(4,'16MIS0632','Your request for BookId: 3  has been accepted','2018-10-16','16:54:29'),(5,'17BCE0511','Your request for BookId: 2  has been accepted','2018-10-16','16:54:58'),(6,'17BCE0511','Your request for BookId: 6  has been accepted','2018-10-16','21:56:11'),(7,'16BCE0854','Your request for BookId: 6 has been accepted','2018-10-16','22:11:12'),(8,'17BCE0158','Your request for renewal of BookId: 1  has been accepted','2018-10-16','22:43:24'),(9,'17BCE0511','Your request for return of BookId: 6  has been accepted','2018-10-16','22:44:24'),(10,'17BCE0158','Your request for renewal of BookId: 1  has been accepted','2018-10-16','23:05:12'),(11,'17BCE0158','Your request for renewal of BookId: 1  has been accepted','2018-10-16','23:09:51'),(12,'17BCE0511','Your request for return of BookId: 6  has been accepted','2018-10-16','23:10:27'),(13,'17BCE0511','Your request for return of BookId: 2  has been accepted','2018-10-16','23:36:10'),(14,'17BCE0511','Your request for issue of BookId: 1  has been rejected','2018-10-16','23:36:20'),(15,'17BCE0158','Your request for issue of BookId: 3  has been rejected','2018-10-16','23:43:37'),(16,'17BCE0158','Your request for issue of BookId: 6  has been rejected','2018-10-16','23:43:42'),(17,'17BCE0158','Your request for issue of BookId: 2  has been accepted','2018-10-16','23:47:31'),(18,'16MIS0632','Your request for issue of BookId: 2  has been rejected','2018-10-16','23:47:34'),(19,'16MIS0632','Your request for issue of BookId: 7  has been rejected','2018-10-25','23:25:25'),(20,'16MIS0632','Your request for issue of BookId: 15  has been accepted','2018-10-25','23:25:27'),(21,'16MIS0632','Your request for renewal of BookId: 3  has been accepted','2018-10-25','23:25:44'),(22,'16MIS0632','Your request for return of BookId: 3  has been accepted','2018-10-25','23:25:48'),(23,'17BCE0203','Your request for issue of BookId: 9  has been accepted','2018-10-25','23:27:46'),(24,'17BIT0011','Your request for issue of BookId: 10  has been accepted','2018-10-25','23:27:49'),(25,'17BIT0011','Your request for issue of BookId: 17  has been accepted','2018-10-25','23:27:53'),(26,'17BCB0023','Your request for issue of BookId: 11  has been accepted','2018-10-25','23:27:57'),(27,'17BCB0023','Your request for issue of BookId: 9  has been accepted','2018-10-25','23:30:41'),(28,'17BCE0158','Your request for issue of BookId: 9  has been accepted','2018-10-25','23:30:43'),(29,'17BCE0511','Your request for issue of BookId: 10  has been accepted','2018-10-25','23:30:46'),(30,'17BCE0158','Your request for issue of BookId: 18  has been accepted','2018-10-25','23:30:49'),(31,'17BCE0511','Your request for issue of BookId: 11  has been accepted','2018-10-25','23:30:58'),(32,'17BCE0511','Your request for issue of BookId: 13  has been accepted','2018-10-25','23:31:01'),(33,'17BCE0203','Your request for issue of BookId: 15  has been rejected','2018-10-26','03:04:51');*/
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-27 13:20:28
