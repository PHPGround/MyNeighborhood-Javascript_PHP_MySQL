CREATE DATABASE  IF NOT EXISTS `MyHood` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `MyHood`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: MyHood
-- ------------------------------------------------------
-- Server version	5.6.23-log

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
-- Table structure for table `Block`
--

DROP TABLE IF EXISTS `Block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Block` (
  `blockId` int(11) NOT NULL AUTO_INCREMENT,
  `hoodId` int(11) NOT NULL,
  `blockName` varchar(45) NOT NULL,
  `lat` decimal(13,10) NOT NULL,
  `lng` decimal(13,10) NOT NULL,
  PRIMARY KEY (`blockId`),
  KEY `hoodId_idx` (`hoodId`),
  CONSTRAINT `BKhoodId` FOREIGN KEY (`hoodId`) REFERENCES `Hood` (`hoodId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Block`
--

LOCK TABLES `Block` WRITE;
/*!40000 ALTER TABLE `Block` DISABLE KEYS */;
INSERT INTO `Block` VALUES (40,5,'330 W Broadway',40.7221810000,-74.0039780000),(42,5,'96 Greene St',40.7240680000,-73.9998000000),(43,5,'157 Prince St',40.7259700000,-74.0012590000),(44,5,'558 Broadway',40.7236610000,-73.9974820000),(45,7,'183 Centre St',40.7183430000,-73.9997090000),(46,7,'126 Baxter St',40.7181080000,-73.9989800000),(47,7,'152A Mott St',40.7190830000,-73.9964690000),(48,7,'140 Bowery',40.7192330000,-73.9949730000),(49,7,'389 Broome St',40.7203770000,-73.9970630000),(50,7,'179 Grand St',40.7194210000,-73.9979280000),(51,8,'70 Lafayette St',40.7171390000,-74.0021270000),(52,8,'65 Bayard St',40.7152190000,-73.9982010000),(53,8,'46 Eldridge St',40.7158050000,-73.9927930000),(54,5,'330 W Broadway',40.7221810000,-74.0039780000),(56,5,'96 Greene St',40.7240680000,-73.9998000000),(57,5,'157 Prince St',40.7259700000,-74.0012590000),(58,5,'558 Broadway',40.7236610000,-73.9974820000),(59,7,'183 Centre St',40.7183430000,-73.9997090000),(60,7,'126 Baxter St',40.7181080000,-73.9989800000),(84,6,'48 W 12th St',40.7282660000,-74.0030270000),(85,4,'90 Beekman St',40.7130520000,-74.0042700000),(89,4,'66 Frankfort St',40.7130520000,-74.0042700000),(90,6,'6 Grove Ct',40.7282660000,-74.0030270000),(91,4,'10 Hanover Square',40.7130520000,-74.0042700000),(92,4,'New York Stock Exchange',40.7130520000,-74.0042700000),(93,4,'26 Broadway',40.7130520000,-74.0042700000),(94,5,'27 Forsyth St',40.7193340000,-74.0019130000),(95,5,'68 Bank St',40.7282660000,-74.0030270000),(96,5,'71 Wooster St',40.7219290000,-74.0054700000),(97,6,'68 Jane St',40.7282660000,-74.0030270000),(98,5,'90 William St',40.7130520000,-74.0042700000),(99,5,'60 Beaver St',40.7130520000,-74.0042700000),(100,8,'27 Forsyth St',40.7193340000,-74.0019130000),(101,8,'35 E Broadway',40.7193340000,-74.0019130000),(102,8,'Confucius Plaza',40.7193340000,-74.0019130000),(103,6,'47 Perry St',40.7282660000,-74.0030270000),(104,4,'217 Pearl St',40.7130520000,-74.0042700000),(105,4,'10 Warren St',40.7130520000,-74.0042700000),(106,6,'71 W 12th St',40.7282660000,-74.0030270000),(108,4,'100 Gold St',40.7130520000,-74.0042700000);
/*!40000 ALTER TABLE `Block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BlockApproval`
--

DROP TABLE IF EXISTS `BlockApproval`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BlockApproval` (
  `fromUserId` int(11) NOT NULL,
  `toUserId` int(11) NOT NULL,
  KEY `fromUserId_idx` (`fromUserId`),
  KEY `toUserID_idx` (`toUserId`),
  CONSTRAINT `BAfromUserId` FOREIGN KEY (`fromUserId`) REFERENCES `User` (`userId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `BAtoUserId` FOREIGN KEY (`toUserId`) REFERENCES `User` (`userId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BlockApproval`
--

LOCK TABLES `BlockApproval` WRITE;
/*!40000 ALTER TABLE `BlockApproval` DISABLE KEYS */;
INSERT INTO `BlockApproval` VALUES (31,29);
/*!40000 ALTER TABLE `BlockApproval` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BlockMember`
--

DROP TABLE IF EXISTS `BlockMember`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BlockMember` (
  `blockId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `count` int(11) DEFAULT '3',
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`blockId`,`userId`),
  KEY `blockId_idx` (`blockId`),
  KEY `userId_idx` (`userId`),
  CONSTRAINT `BMblockId` FOREIGN KEY (`blockId`) REFERENCES `Block` (`blockId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `BMuserId` FOREIGN KEY (`userId`) REFERENCES `User` (`userId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BlockMember`
--

LOCK TABLES `BlockMember` WRITE;
/*!40000 ALTER TABLE `BlockMember` DISABLE KEYS */;
INSERT INTO `BlockMember` VALUES (40,21,0,'2015-12-17 04:31:36'),(42,23,1,'2015-12-17 04:31:36'),(56,24,0,'2015-12-17 04:31:36'),(57,25,1,'2015-12-17 04:31:36'),(58,22,0,'2015-12-17 04:31:36'),(58,27,0,'2015-12-17 04:31:36'),(58,28,0,'2015-12-17 04:31:36'),(58,29,1,'2015-12-17 04:31:36'),(58,30,0,'2015-12-17 04:31:36'),(58,31,0,'2015-12-18 19:54:39'),(58,32,0,'2015-12-17 04:31:36'),(58,33,0,'2015-12-17 04:31:36'),(58,76,0,'2015-12-24 06:19:11'),(95,72,0,'2015-12-18 21:56:41'),(96,70,0,'2015-12-18 21:48:02'),(96,74,0,'2015-12-18 22:17:49'),(97,26,0,'2015-12-18 19:18:08');
/*!40000 ALTER TABLE `BlockMember` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FriendRequest`
--

DROP TABLE IF EXISTS `FriendRequest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FriendRequest` (
  `fromUserId` int(11) NOT NULL,
  `toUserId` int(11) NOT NULL,
  KEY `fromUserId_idx` (`fromUserId`),
  KEY `toUserID_idx` (`toUserId`),
  CONSTRAINT `FRfromUserId` FOREIGN KEY (`fromUserId`) REFERENCES `User` (`userId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FRtoUserID` FOREIGN KEY (`toUserId`) REFERENCES `User` (`userId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FriendRequest`
--

LOCK TABLES `FriendRequest` WRITE;
/*!40000 ALTER TABLE `FriendRequest` DISABLE KEYS */;
INSERT INTO `FriendRequest` VALUES (30,31),(31,21),(26,31),(74,70);
/*!40000 ALTER TABLE `FriendRequest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Hood`
--

DROP TABLE IF EXISTS `Hood`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Hood` (
  `hoodId` int(11) NOT NULL AUTO_INCREMENT,
  `hoodName` varchar(45) NOT NULL,
  PRIMARY KEY (`hoodId`),
  UNIQUE KEY `hoodName_UNIQUE` (`hoodName`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Hood`
--

LOCK TABLES `Hood` WRITE;
/*!40000 ALTER TABLE `Hood` DISABLE KEYS */;
INSERT INTO `Hood` VALUES (8,'Chinatown'),(4,'Financial District'),(6,'Greenwich Village'),(7,'Little Italy'),(5,'Soho');
/*!40000 ALTER TABLE `Hood` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HoodMap`
--

DROP TABLE IF EXISTS `HoodMap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HoodMap` (
  `hoodId` int(11) NOT NULL,
  `lat` decimal(13,10) NOT NULL,
  `lng` decimal(13,10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HoodMap`
--

LOCK TABLES `HoodMap` WRITE;
/*!40000 ALTER TABLE `HoodMap` DISABLE KEYS */;
INSERT INTO `HoodMap` VALUES (5,40.7283280000,-74.0028470000),(5,40.7251730000,-73.9959000000),(5,40.7189450000,-74.0012530000),(5,40.7219290000,-74.0054700000),(7,40.7184360000,-74.0005380000),(7,40.7168150000,-73.9977550000),(7,40.7189990000,-73.9964690000),(7,40.7184270000,-73.9948120000),(7,40.7195240000,-73.9944410000),(7,40.7210420000,-73.9982250000),(8,40.7168300000,-74.0040050000),(8,40.7152030000,-74.0005290000),(8,40.7143570000,-74.0004430000),(8,40.7134790000,-73.9985980000),(8,40.7139670000,-73.9974820000),(8,40.7128290000,-73.9970960000),(8,40.7133490000,-73.9901430000),(8,40.7155930000,-73.9897140000),(8,40.7172520000,-73.9954220000),(8,40.7184560000,-73.9948210000),(8,40.7189930000,-73.9964630000),(8,40.7168300000,-73.9977930000),(8,40.7193340000,-74.0019130000),(6,40.7290950000,-74.0108050000),(6,40.7421190000,-74.0082620000),(6,40.7346890000,-73.9908060000),(6,40.7317300000,-73.9914500000),(6,40.7253550000,-73.9968680000),(6,40.7282660000,-74.0030270000),(4,40.7170450000,-74.0126550000),(4,40.7047970000,-74.0165070000),(4,40.7024220000,-74.0141680000),(4,40.7008440000,-74.0151120000),(4,40.7005680000,-74.0130730000),(4,40.7050250000,-74.0040180000),(4,40.7041460000,-74.0027740000),(4,40.7053990000,-74.0008210000),(4,40.7069360000,-74.0012390000),(4,40.7080580000,-73.9993940000),(4,40.7124660000,-74.0048930000),(4,40.7130520000,-74.0042700000);
/*!40000 ALTER TABLE `HoodMap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Message`
--

DROP TABLE IF EXISTS `Message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Message` (
  `messageId` int(11) NOT NULL AUTO_INCREMENT,
  `topicId` int(11) NOT NULL,
  `authorUserId` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`messageId`),
  KEY `topicId_idx` (`topicId`),
  CONSTRAINT `MGtopicId` FOREIGN KEY (`topicId`) REFERENCES `Topic` (`topicId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Message`
--

LOCK TABLES `Message` WRITE;
/*!40000 ALTER TABLE `Message` DISABLE KEYS */;
INSERT INTO `Message` VALUES (76,35,21,'2015-12-17 04:37:59','Hey, An accident just took place on the main street across the medical shop.'),(77,35,31,'2015-12-17 04:38:19','Anyone hurt?'),(79,35,26,'2015-12-17 04:40:31','Nope, just a minor accident...'),(80,35,28,'2015-12-17 04:41:29','Traffic block though :('),(81,37,31,'2015-12-18 10:30:08','Movire tonight at 7pm                                    '),(82,44,31,'2015-12-18 14:25:38','Our neighborhood, for the first time has been shortlisted on bestneighborhoods.com'),(83,44,31,'2015-12-18 14:26:12','Visit bestneighborhoods.com and vote for our neighborhood as the best place to live'),(84,42,31,'2015-12-18 14:28:54','Its been long since we all met. So r u guys free for dinner tonight?'),(85,43,31,'2015-12-18 14:30:39','Did you all receive the notice about the new sidewalk around our block?'),(86,36,31,'2015-12-18 14:34:47','I am selling my garage. Don&#039;t need it anymore. If anyone interested, plz contact me'),(87,41,31,'2015-12-18 14:37:47','There seems to be a drainage problem near our home. It smells very bad. R u guys facing the same problem?'),(88,38,31,'2015-12-18 14:39:52','What are u guys planning this time for Dec 25th? I was planning to throw a party if u all could make it then. '),(91,39,21,'2015-12-18 14:43:04','I have my exams this week and I am getting distracted because of high volume on TV.'),(92,39,21,'2015-12-18 14:44:06','So can u guys please reduce the volume while watching TV?'),(93,44,21,'2015-12-18 14:44:58','Thanks for the info. I just voted for our neighborhood'),(94,43,21,'2015-12-18 14:45:39','Yeah. Seems to be a nice move'),(95,42,21,'2015-12-18 14:46:36','Yup.. What time?'),(96,41,21,'2015-12-18 14:47:10','Yeah. It stinks'),(97,38,21,'2015-12-18 14:48:54','Not sure of any plan yet. Will let u know in a couple of days '),(98,40,24,'2015-12-18 14:52:00','I am planning to throw a Birthday Party for my mom&#039;s 50th birthday.. Any ideas on how to make it more special?'),(99,37,26,'2015-12-18 14:53:50','I am in'),(100,44,26,'2015-12-18 14:54:19','Done'),(101,43,26,'2015-12-18 14:55:15','yes. But they are taking away my parking space :('),(102,36,26,'2015-12-18 14:57:15','I might need it.. I am waiting to hear if I will be allotted a new parking space. Can I confirm you in a couple of days?'),(103,42,26,'2015-12-18 14:57:53','Yes.. Whats there for dinner? ;)'),(104,40,26,'2015-12-18 14:58:19','When is the birthday?'),(105,39,26,'2015-12-18 14:58:53','Sure.. Adam. Good luck with your exams!!!'),(106,38,26,'2015-12-18 14:59:25','I am in'),(107,37,26,'2015-12-18 15:00:03','Which movie?'),(108,37,21,'2015-12-18 15:00:52','Star Wars?'),(109,39,21,'2015-12-18 15:01:53','Thanks:)'),(110,45,31,'2015-12-18 18:59:14','Guys lets have a soccer match near W4. Check map for location'),(111,45,31,'2015-12-18 19:08:35','its tomorrow eve'),(112,45,31,'2015-12-18 19:12:03','4pm'),(113,45,31,'2015-12-18 19:12:59','and dont forget the pass'),(114,45,31,'2015-12-18 19:13:05','and the ball'),(115,46,70,'2015-12-18 21:57:53','This is a block &lt;br&gt; test'),(116,47,70,'2015-12-18 22:00:01','new new'),(117,48,72,'2015-12-18 22:11:25','123                                    '),(118,48,31,'2015-12-18 22:34:01','test ner'),(119,48,31,'2015-12-18 22:34:01','test ner'),(120,45,76,'2015-12-24 07:30:49','I am in. Please don&#039;t be late guys. '),(123,51,76,'2015-12-25 00:15:09','Look at the map for location. Washington Square Park                                    ');
/*!40000 ALTER TABLE `Message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Relation`
--

DROP TABLE IF EXISTS `Relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Relation` (
  `firstUserId` int(11) NOT NULL,
  `secondUserId` int(11) NOT NULL,
  `isFriend` int(11) NOT NULL DEFAULT '0',
  `isNeighbor` int(11) NOT NULL DEFAULT '0',
  KEY `firstUserId_idx` (`firstUserId`),
  KEY `secondUserId_idx` (`secondUserId`),
  CONSTRAINT `RLfirstUserId` FOREIGN KEY (`firstUserId`) REFERENCES `User` (`userId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `RLsecondUserId` FOREIGN KEY (`secondUserId`) REFERENCES `User` (`userId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Relation`
--

LOCK TABLES `Relation` WRITE;
/*!40000 ALTER TABLE `Relation` DISABLE KEYS */;
INSERT INTO `Relation` VALUES (21,31,1,1),(24,21,1,1),(21,26,0,1),(31,28,1,1),(30,31,1,0),(24,31,1,1),(26,24,1,0),(24,28,1,1),(31,76,1,1),(24,76,1,1),(76,22,1,1),(76,21,1,1);
/*!40000 ALTER TABLE `Relation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Topic`
--

DROP TABLE IF EXISTS `Topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Topic` (
  `topicId` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `authorUserId` int(11) NOT NULL,
  `location` varchar(45) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tagType` varchar(45) NOT NULL,
  `recipient` varchar(200) NOT NULL,
  `parentHoodId` int(11) NOT NULL,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`topicId`),
  KEY `authorUserId_idx` (`authorUserId`),
  KEY `parentHoodId_idx` (`parentHoodId`),
  CONSTRAINT `TPauthorUserId` FOREIGN KEY (`authorUserId`) REFERENCES `User` (`userId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `TPparentHoodId` FOREIGN KEY (`parentHoodId`) REFERENCES `Hood` (`hoodId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Topic`
--

LOCK TABLES `Topic` WRITE;
/*!40000 ALTER TABLE `Topic` DISABLE KEYS */;
INSERT INTO `Topic` VALUES (35,'Accident on main street!',21,'0','2015-12-17 04:37:59','HOOD','5',5,'2015-12-17 04:41:29'),(36,'Garage Sale',31,NULL,'2015-12-17 06:56:34','BLOCK','58',5,'2015-12-18 14:57:15'),(37,'Movie reminder                         ',31,'','2015-12-18 10:30:08','PERSONAL','21,26',5,'2015-12-18 15:00:52'),(38,'Christmas Party Next Week',31,NULL,'2015-12-18 08:56:35','NEIGHBORS','21,24,28',5,'2015-12-18 14:59:25'),(39,'Keep the volume down',21,NULL,'2015-12-18 09:03:35','NEIGHBORS','24,26,31',5,'2015-12-18 15:01:53'),(40,'Birthday Party Planning',24,NULL,'2015-12-18 09:03:59','FRIENDS','21,26,28,31',5,'2015-12-18 14:58:19'),(41,'Drainage Issue',31,NULL,'2015-12-18 09:04:35','NEIGHBORS','21,24,28',5,'2015-12-18 14:47:10'),(42,'Dinner at my place tonight',31,NULL,'2015-12-18 09:09:35','FRIENDS','21,24,26,28,30',5,'2015-12-18 14:57:53'),(43,'Proposed sidewalk around block',31,NULL,'2015-12-18 09:18:35','BLOCK','58',5,'2015-12-18 14:55:15'),(44,'Vote for our neighbourhood',21,NULL,'2015-12-18 09:19:35','HOOD','5',5,'2015-12-18 14:54:19'),(45,'Soccer match                                    ',31,'40.73034831215804,-74.00012969970703','2015-12-18 18:59:14','HOOD','5',5,'2015-12-24 07:30:49'),(46,'New post                                    ',70,'40.724754504892424,-73.99961471557617','2015-12-18 21:57:53','FRIENDS','72',6,'2015-12-18 21:57:53'),(47,'new                                    ',70,'','2015-12-18 22:00:01','FRIENDS','72',6,'2015-12-18 22:00:01'),(48,'TEST                                    ',72,'40.72228267283148,-73.9958381652832','2015-12-18 22:11:25','FRIENDS','70',4,'2015-12-18 22:34:01'),(51,'Lets meet here at 7am to begin our trip to Florida',76,'40.731486529317024,-73.997962474823','2015-12-25 00:15:09','PERSONAL','21,31',5,'2015-12-25 00:15:09');
/*!40000 ALTER TABLE `Topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `zip` int(11) NOT NULL,
  `about` varchar(100) DEFAULT NULL,
  `family` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `lastLogin` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (21,'Adam Gabriel','adamgabriel@gmail.com','NY','Manhattan',10004,'Working at Chase bank','Unmarried','','2015-12-17 04:24:21'),(22,'Julie S Wee','julieswee@gmail.com','NY','Manhattan',10004,'Student at CUNY','Staying with mom','','2015-12-17 04:24:21'),(23,'Lori Greene','lorigreene@gmail.com','NY','Manhattan',10004,'Studying at Stern Business school','3 roommates','','2015-12-17 04:24:21'),(24,'Renata Jacobs','renetajacobs@gmail.com','NY','Manhattan',10004,'Teacher at St. Agnes','','','2015-12-17 04:24:21'),(25,'Ophir Marom','ophirmarom@gmail.com','NY','Manhattan',10004,'','','','2015-12-17 04:24:22'),(26,'Dedrick Bullard','dedrickbullard@gmail.com','NY','Manhattan',10004,'','Family of 4.','','2015-12-17 04:24:22'),(27,'Carla Davis','carladavis@gmail.com','NY','Manhattan',10004,'','Eldery couple','','2015-12-17 04:24:22'),(28,'Tristan A Daley','tristanadadley@gmail.com','NY','Manhattan',10004,'Business analyst','','','2015-12-17 04:24:22'),(29,'Kun Jiang','kunjiang@gmail.com','NY','Manhattan',10004,'Soccer coach, train kids under 12.','','','2015-12-17 04:24:22'),(30,'Neha Sharma','nehasharma@gmail.com','NY','Manhattan',10004,'International student at Stony Brooke','','','2015-12-17 04:24:23'),(31,'Waqid Munawar','waqid7@gmail.com','NY','Manhattan',10004,'Student at NYU Engineering','Live with uncle','','2015-12-17 04:24:23'),(32,'Ugur Iniac','uguriniac@gmail.com','NY','Manhattan',10004,'','','','2015-12-17 04:24:23'),(33,'Mohammed Aizaaz Ali','ali.aizu94@gmail.com','NY','Manhattan',10004,'Student','','','2015-12-17 04:24:23'),(70,'newuser123','waqidvolli@gmail.com','','',0,'newuser','newuser',NULL,'2015-12-18 21:47:41'),(72,'seconduser','seconduser@gmail.com','','',0,'su','su',NULL,'2015-12-18 21:49:22'),(74,'thirduser','wmv214@nyu.edu','','',0,'third','third',NULL,'2015-12-18 22:16:44'),(76,'Mark','maa832@nyu.edu','','',0,'Student at NYU','Wife and 2 children',NULL,'2015-12-24 05:45:43');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserPreference`
--

DROP TABLE IF EXISTS `UserPreference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserPreference` (
  `userId` int(11) NOT NULL,
  `prefName` varchar(45) NOT NULL,
  `prefValue` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserPreference`
--

LOCK TABLES `UserPreference` WRITE;
/*!40000 ALTER TABLE `UserPreference` DISABLE KEYS */;
INSERT INTO `UserPreference` VALUES (31,'NOTIFICATION',1),(70,'NOTIFICATION',1);
/*!40000 ALTER TABLE `UserPreference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'MyHood'
--

--
-- Dumping routines for database 'MyHood'
--
/*!50003 DROP PROCEDURE IF EXISTS `add_friend` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `add_friend`(
IN _firstUserId INT,
IN _secondUserId INT
)
this_proc:BEGIN
/*Check if there is an existing relation. If yes, update relation else insert new relation.*/
IF (SELECT COUNT(*) FROM Relation 
WHERE (firstUserId=_firstUserId AND secondUserId=_secondUserId)
OR (firstUserId=_secondUserId AND secondUserId=_firstUserId))>0
THEN UPDATE Relation set isFriend=1 
WHERE (firstUserId=_firstUserId AND secondUserId=_secondUserId)
OR (firstUserId=_secondUserId AND secondUserId=_firstUserId);
ELSE
INSERT INTO Relation VALUES(_firstUserId,_secondUserId,1,0);
END IF;
DELETE FROM FriendRequest WHERE (fromUserId=_firstUserId AND toUserId=_secondUserId)
OR (fromUserId=_secondUserId AND toUserId=_firstUserId);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_neighbor` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `add_neighbor`(
IN _firstUserId INT,
IN _secondUserId INT
)
this_proc:BEGIN
/*Check if there is an existing relation. If yes, update relation else insert new relation.*/
IF (SELECT COUNT(*) FROM Relation 
WHERE (firstUserId=_firstUserId AND secondUserId=_secondUserId)
OR (firstUserId=_secondUserId AND secondUserId=_firstUserId))>0
THEN UPDATE Relation set isNeighbor=1 
WHERE (firstUserId=_firstUserId AND secondUserId=_secondUserId)
OR (firstUserId=_secondUserId AND secondUserId=_firstUserId);
ELSE
INSERT INTO Relation VALUES(_firstUserId,_secondUserId,0,1);
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `all_feed` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `all_feed`(
IN _userId INT,
IN _hoodId INT, 
IN _blockId INT
)
this_proc:BEGIN

IF (SELECT count FROM BlockMember where userId=_userId)>0
THEN LEAVE this_proc;
END IF;

SELECT tagType, t.topicId, t.authorUserId as topicOwner, messageId, m.authorUserId as messageOwner, message, m.created as messagePosted  FROM Topic t, Message m
WHERE t.topicId = m.topicId
	AND 
		parentHoodId=_hoodId
    AND
	(	
		t.authorUserId=_userId
		OR
		((tagType= "FRIENDS" OR tagType="NEIGHBORS" OR tagType="PERSONAL") AND FIND_IN_SET(_userId, recipient))
	)
    
UNION    
SELECT tagType, t.topicId, t.authorUserId as topicOwner, messageId, m.authorUserId as messageOwner, message, m.created as messagePosted  FROM Topic t, Message m
WHERE t.topicId = m.topicId
	AND 
		parentHoodId=_hoodId
    AND
	(	
		t.authorUserId=_userId
		OR
		((tagType= "HOOD") AND recipient=_hoodId)
	)
    
UNION
SELECT tagType, t.topicId, t.authorUserId as topicOwner, messageId, m.authorUserId as messageOwner, message, m.created as messagePosted  FROM Topic t, Message m
WHERE t.topicId = m.topicId
	AND 
		parentHoodId=_hoodId
    AND
	(	
		t.authorUserId=_userId
		OR
		((tagType= "BLOCK") AND recipient=_blockId)
	);
    

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `approve_join_request` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `approve_join_request`(
IN _blockId INT,
IN _fromUserId INT,
IN _toUserId INT
)
BEGIN
UPDATE BlockMember SET count=count-1 WHERE blockId=_blockId AND userId=_toUserId;
IF(SELECT count FROM BlockMember WHERE blockId=_blockId AND userId=_toUserId)=0
THEN DELETE FROM BlockApproval WHERE toUserId=_toUserId;
ELSE INSERT INTO BlockApproval VALUES(_fromUserId,_toUserId);
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `block_requests` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `block_requests`(in _userid int, in _blockid int)
this_proc:BEGIN

IF (SELECT count FROM BlockMember where userId=_userId)>0
THEN LEAVE this_proc;
END IF;
select u2.userId,u2.userName,u2.photo from User u2, User u1, BlockMember bm1, BlockMember bm2 
where u1.userId=_userid and bm1.blockId=_blockid 
and bm1.userId=u1.userId and bm1.count=0 
and bm2.blockId=bm1.blockId and u2.userId=bm2.userId and bm2.count>0
and u1.userId not in
(select fromUserId from BlockApproval where fromUserId=_userId and toUserId=u2.userId);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `create_topic` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `create_topic`(
IN _subject varchar(100),
IN _message varchar(200),
IN _myUserId INT,
IN _location varchar(45),
IN _tagType varchar(45),
IN _recipient varchar(200),
IN _myHoodId INT
)
BEGIN
DECLARE _recipientDL varchar(200);
DECLARE _lastInsertId INT;
IF(_tagType="HOOD")
THEN 
INSERT INTO Topic (subject,authorUserId,location,tagType,recipient,parentHoodId)  
VALUES(_subject,_myUserId,_location,"HOOD",_myHoodId,_myHoodId);

ELSE IF(_tagType="BLOCK")
THEN 
SELECT blockId INTO _recipientDL FROM BlockMember WHERE userId = _myUserId;
INSERT INTO Topic (subject,authorUserId,location,tagType,recipient,parentHoodId)  
VALUES(_subject,_myUserId,_location,"BLOCK",_recipientDL,_myHoodId);

ELSE IF(_tagType="FRIENDS")
THEN 
call get_friends_list(_myUserId,@_friendsList);
INSERT INTO Topic (subject,authorUserId,location,tagType,recipient,parentHoodId)  
VALUES(_subject,_myUserId,_location,"FRIENDS",@_friendsList,_myHoodId);

ELSE IF(_tagType="NEIGHBORS")
THEN 
call get_neighbors_list(_myUserId,@_neighborsList);
INSERT INTO Topic (subject,authorUserId,location,tagType,recipient,parentHoodId)  
VALUES(_subject,_myUserId,_location,"NEIGHBORS",@_neighborsList,_myHoodId);

ELSE
INSERT INTO Topic (subject,authorUserId,location,tagType,recipient,parentHoodId)  
VALUES(_subject,_myUserId,_location,"PERSONAL",_recipient,_myHoodId);

END IF;
END IF;
END IF;
END IF;

SELECT LAST_INSERT_ID() INTO _lastInsertId;
INSERT INTO Message (topicId, authorUserId, message) VALUES(_lastInsertId,_myUserId,_message);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `edit_user_profile` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `edit_user_profile`(
IN _userId INT,
IN _userName varchar(45),
IN _email varchar(45),
IN _about varchar(100),
IN _family varchar(100),
IN _photo varchar(100)
)
BEGIN
UPDATE User 
SET userName=_userName, email=_email,  
about=_about, family=_family, photo=_photo
WHERE userId=_userId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `friend_requests` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `friend_requests`(in _userid int)
this_proc:BEGIN

IF (SELECT count FROM BlockMember where userId=_userId)>0
THEN LEAVE this_proc;
END IF;
select u.userId, u.userName, u.photo from User u,FriendRequest fr where fr.toUserId=_userid and u.userId=fr.fromUserId; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_feed` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `get_feed`(
IN _userId INT,
IN _hoodId INT, 
IN _blockId INT, 
IN _tagType VARCHAR(45)
)
this_proc:BEGIN

IF (SELECT count FROM BlockMember where userId=_userId)>0
THEN LEAVE this_proc;
END IF;

SELECT tagType, t.topicId, t.authorUserId as topicOwner, messageId, m.authorUserId as messageOwner, message, m.created as messagePosted  FROM Topic t, Message m
WHERE t.topicId = m.topicId
	AND 
		parentHoodId=_hoodId
	AND
		tagType=_tagType
    AND
	(	
		t.authorUserId=_userId
		OR
		((tagType= "FRIENDS" OR tagType="NEIGHBORS" OR tagType="PERSONAL") AND FIND_IN_SET(_userId, recipient))
        OR
		((tagType= "HOOD") AND recipient=_hoodId)
        OR
		((tagType= "BLOCK") AND recipient=_blockId)
	);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_friends` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `get_friends`(
IN _myUserId INT
)
BEGIN
SELECT userId, userName,firstUserId,secondUserId,isFriend,isNeighbor FROM Relation, User
WHERE (firstUserId=17 OR secondUserId=17) AND isFriend=1
AND ((secondUserId!=17 AND secondUserId=userId) OR ( firstUserId!=17 AND firstUserId=userId));
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_friends_list` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `get_friends_list`(
IN _myUserId INT,
OUT _friendsList varchar(200)
)
BEGIN
SELECT group_concat(X)as friendsList INTO _friendsList FROM(
SELECT GROUP_CONCAT(secondUserId)as X FROM MyHood.Relation
where isFriend=1 and firstUserId=_myUserId
UNION
SELECT GROUP_CONCAT(firstUserId)as X FROM MyHood.Relation
where isFriend=1 and secondUserId=_myUserId)Z;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_hood_members` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `get_hood_members`(
in _userId INT,
in _hoodId INT
)
this_proc:BEGIN

IF (SELECT count FROM BlockMember where userId=_userId)>0
THEN LEAVE this_proc;
END IF;

select * from Relation r

right outer join (

select photo, userName, u.userId, u.userId as memberId, b.lat, b.lng from User u, Block b, BlockMember bm
where  bm.count=0 and b.hoodId = _hoodId and bm.blockId=b.blockId and bm.userId=u.userId and 
u.userId not in (select userId from User where userId=_userId)

)x on ((r.firstUserId= memberId and secondUserId=_userId) OR (r.secondUserId=memberId and firstUserId=_userId));


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_neighbors` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `get_neighbors`(
IN _myUserId INT
)
BEGIN
SELECT userId, userName,firstUserId,secondUserId,isFriend,isNeighbor FROM Relation, User
WHERE (firstUserId=17 OR secondUserId=17) AND isNeighbor=1
AND ((secondUserId!=17 AND secondUserId=userId) OR ( firstUserId!=17 AND firstUserId=userId));
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_neighbors_list` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `get_neighbors_list`(
IN _myUserId INT,
OUT _neighborsList varchar(200)
)
BEGIN
SELECT group_concat(X)as neighborsList INTO _neighborsList FROM(
SELECT GROUP_CONCAT(secondUserId)as X FROM Relation
where isNeighbor=1 and firstUserId=_myUserId
UNION
SELECT GROUP_CONCAT(firstUserId)as X FROM Relation
where isNeighbor=1 and secondUserId=_myUserId)Z;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_unread_messages_by_tagtype` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `get_unread_messages_by_tagtype`(
IN _userId INT,
IN _hoodId INT, 
IN _blockId INT, 
IN _tagType VARCHAR(45)
)
BEGIN
DECLARE _lastLogin DATETIME;
SELECT lastLogin INTO _lastLogin FROM User WHERE userId=_userId;

SELECT tagType, t.topicId, t.authorUserId as topicOwner, messageId, m.authorUserId as messageOwner, message, m.created as messagePosted  FROM Topic t, Message m
WHERE t.topicId = m.topicId
	AND 
		parentHoodId=_hoodId
	AND
		tagType=_tagType
    AND
	(	
		t.authorUserId=_userId
		OR
		((tagType= "FRIENDS" OR tagType="NEIGHBORS" OR tagType="PERSONAL") AND FIND_IN_SET(_userId, recipient))
        OR
		((tagType= "HOOD") AND recipient=_hoodId)
        OR
		((tagType= "BLOCK") AND recipient=_blockId)
	)
    AND t.modified>_lastLogin;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_user_data` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `get_user_data`(in _email varchar(40))
BEGIN
SELECT u.userId, b.blockId, b.hoodId FROM User u, Block b, BlockMember bm 
WHERE u.email=_email and u.userId = bm.userId and bm.blockId = b.blockId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `join_block_request` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `join_block_request`(
IN _userId INT,
IN _hoodId INT,
IN _blockName varchar(45),
IN _lat decimal(13,10),
IN _lng decimal(13,10)
)
this_proc:BEGIN
DECLARE _blockId INT;

delete from BlockMember where userId=_userId;

select blockId INTO _blockId FROM Block where blockName=_blockName and hoodId = _hoodId;

IF(_blockId IS NULL)
THEN insert into Block (hoodId, blockName, lat,lng) values(_hoodId, _blockName, _lat, _lng);
SELECT LAST_INSERT_ID() INTO _blockId;
ELSE IF (select count(*) from BlockMember where blockId=_blockId and userId =_userId)>0
THEN LEAVE this_proc; 
END IF;
END IF;

IF (select count(*) from BlockMember where blockId=_blockId and count =0)=0
THEN insert into BlockMember (blockId,userId,count) values(_blockId,_userId,0);
ELSE IF (select count(*) from BlockMember where blockId=_blockId and count =0)=1
THEN insert into BlockMember (blockId,userId,count) values(_blockId,_userId,1);
ELSE IF (select count(*) from BlockMember where blockId=_blockId and count =0)=2
THEN insert into BlockMember (blockId,userId,count) values(_blockId,_userId,2);
ELSE insert into BlockMember (blockId,userId,count) values(_blockId,_userId,3);
END IF;
END IF;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `reply_message` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `reply_message`(
IN _topicId INT,
IN _myUserId INT,
IN _message varchar(200)
)
BEGIN 
DECLARE _topicModified DATETIME;
INSERT INTO Message (topicId,authorUserId,message)  VALUES(_topicId,_myUserId,_message);
SELECT created INTO _topicModified FROM Message WHERE messageId = last_insert_id();
UPDATE Topic SET modified=_topicModified where topicid=_topicId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `search_messages` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `search_messages`(
IN _userId INT,
IN _hoodId INT, 
IN _blockId INT, 
IN _searchKey VARCHAR(45)
)
BEGIN
SELECT t.topicId, t.authorUserId as topicOwner, messageId, m.authorUserId as messageOwner, message, m.created as messagePosted  FROM Topic t, Message m
WHERE t.topicId = m.topicId

	AND 
		parentHoodId=_hoodId
	AND
	(	
		t.authorUserId=_userId
		OR
		((tagType= "FRIENDS" OR tagType="NEIGHBORS" OR tagType="PERSONAL") AND FIND_IN_SET(_userId, recipient))
        OR
		((tagType= "HOOD") AND recipient=_hoodId)
        OR
		((tagType= "BLOCK") AND recipient=_blockId)
	)
	AND(
	message LIKE CONCAT('%','_searchKey','%')
    );
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `send_friend_request` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `send_friend_request`(
IN _myUserId INT,
IN _friendUserId INT
)
this_proc:BEGIN
/*Check if user A has previously sent a friend request to user B. If yes, do nothing.*/
IF (SELECT COUNT(*) FROM FriendRequest WHERE fromUserId=_myUserId AND toUserId=_friendUserId)>0
THEN LEAVE this_proc; 
END IF;

/*Check if there is an existing friend request from user B. If yes, then user A is trying to 
become friends with user B, hence confirm they are friends by calling add_friend().*/
IF (SELECT COUNT(*) FROM FriendRequest WHERE fromUserId=_friendUserId AND toUserId=_myUserId)>0
THEN call add_friend(_friendUserId,_myUserId);
LEAVE this_proc; 
END IF;

/*Add a friend request from user A to user B*/
INSERT INTO FriendRequest Values(_myUserId,_friendUserId);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `user_profile` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `user_profile`(in _userId int)
BEGIN
select userName, email, about, family, photo from User where userId=_userId; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `user_signup` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`prabodh`@`%` PROCEDURE `user_signup`(
IN _userName varchar(45),
IN _email varchar(45),
IN _state varchar(45),
IN _city varchar(45),
IN _zip INT
)
BEGIN
INSERT INTO User (userName,email,state,city,zip)  VALUES(_userName,_email,_state,_city,_zip);
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

-- Dump completed on 2015-12-24 21:03:50
