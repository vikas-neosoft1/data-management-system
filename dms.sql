-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: dms
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `indate` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category`
--

LOCK TABLES `tbl_category` WRITE;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` VALUES (1,'Automobiles','Trasport totaly depend on auto mnobiles industry','2022-06-14 12:49:22',1,5,'2022-06-14 13:10:27',1),(2,'Cate-2','cate-2 for tesing','2022-06-14 12:58:20',1,1,NULL,NULL),(3,'cate-3','cate-3 for test','2022-06-14 12:58:32',1,1,NULL,NULL),(4,'Category-3','category-232','2022-06-14 13:14:16',1,1,NULL,NULL),(5,'category-5909','Description here\r\n ','2022-06-14 18:01:18',NULL,1,'2022-06-14 18:08:06',NULL),(6,'IT','Information technologies','2022-06-14 22:57:36',5,5,'2022-06-15 09:56:14',5),(7,'Development','devbelopemnmn','2022-06-15 09:48:11',5,1,NULL,NULL);
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT '0',
  `indate` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_products`
--

LOCK TABLES `tbl_products` WRITE;
/*!40000 ALTER TABLE `tbl_products` DISABLE KEYS */;
INSERT INTO `tbl_products` VALUES (1,'Product- one-two','productdeddede',1234,'1655198735-Screenshot_from_2022-05-30_08-41-13.png',2,'2022-06-14 14:55:35',1,5,'2022-06-14 15:14:17',1),(2,'Produt-two','projhhghvbdvbdvbq',1222,'1655199235-Screenshot_from_2022-05-30_12-38-57.png',3,'2022-06-14 15:03:55',1,1,NULL,NULL),(3,'Product one','derrewrew',1234,'1655199257-Screenshot_from_2022-05-31_17-39-28.png',4,'2022-06-14 15:04:17',1,1,'2022-06-14 18:22:21',1),(4,'Produt-2','dfrvb',1212,'1655211644-Screenshot_from_2022-05-30_12-37-32.png',4,'2022-06-14 18:30:44',1,1,NULL,NULL),(5,'Product-fivbe','pri  5',1234,'1655211719-Screenshot_from_2022-05-31_19-00-06.png',3,'2022-06-14 18:31:59',1,1,NULL,NULL),(6,'Product-six','sixth product',789,'1655211751-Screenshot_from_2022-06-01_18-10-41.png',2,'2022-06-14 18:32:31',1,1,NULL,NULL),(7,'product-12','de',20,'1655211775-Screenshot_from_2022-06-14_14-05-59.png',2,'2022-06-14 18:32:55',1,1,NULL,NULL),(8,'oppo','opp dec',12345,'1655211803-Screenshot_from_2022-06-14_14-53-30.png',2,'2022-06-14 18:33:23',1,1,NULL,NULL),(9,'Nokia','desc nokia',7899,'1655211832-Screenshot_from_2022-06-13_19-46-03.png',4,'2022-06-14 18:33:52',1,1,NULL,NULL),(10,'samnsung','samnsung desc',12789,'1655212331-Screenshot_from_2022-06-14_14-05-59.png',5,'2022-06-14 18:34:18',1,1,'2022-06-14 18:42:11',1),(11,'MNotorola','mnotorola desc',1278,'1655211894-Screenshot_from_2022-06-14_14-53-30.png',5,'2022-06-14 18:34:54',1,1,NULL,NULL),(12,'Product-1','tytu',128,'1655266853-Screenshot_from_2022-06-14_14-53-30.png',6,'2022-06-15 09:50:53',5,5,'2022-06-15 09:56:14',5);
/*!40000 ALTER TABLE `tbl_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  `controllers` text,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_roles`
--

LOCK TABLES `tbl_roles` WRITE;
/*!40000 ALTER TABLE `tbl_roles` DISABLE KEYS */;
INSERT INTO `tbl_roles` VALUES (1,'Super Admnin','','2022-06-13 18:08:27'),(2,'User Admin',NULL,'2022-06-14 08:37:03'),(3,'Sales Team',NULL,'2022-06-14 20:33:11');
/*!40000 ALTER TABLE `tbl_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint DEFAULT '1',
  `created_by` int DEFAULT '0',
  `status` tinyint DEFAULT '1',
  `indate` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'vikas kumnar','sharma','vikas.s@neosoftmail.com','d0ff951631904f9e6a85156305d08054',1,1,1,NULL,1,'2022-06-14 10:43:54'),(2,'kanak kumnar','kumar','kanak@gmail.com','4b35dee768a5f864c373f9299d53b331',2,NULL,1,'2022-06-14 08:39:28',1,'2022-06-14 20:24:47'),(3,'ajay','kumar','ajay@gmail.com','25d55ad283aa400af464c76d713c07ad',2,1,5,'2022-06-14 10:11:02',1,'2022-06-14 10:40:19'),(4,'anuj','sharma','anuj@gmail.com','c4235bc2f52a6982d3698d8ed4f520f2',2,1,1,'2022-06-14 10:44:54',NULL,NULL),(5,'chirag kashyap','Kumar','chirag@gmail.com','da36f1dd5300dbb62671844db234824d',3,1,1,'2022-06-14 11:34:55',2,'2022-06-15 07:13:37'),(6,'aman','singh','aman@gmail.com','8276bff3d2bbd1f7c4c3c3b6981d0658',2,2,1,'2022-06-15 09:24:06',NULL,NULL);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-15 10:11:53
