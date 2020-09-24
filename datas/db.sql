CREATE DATABASE  IF NOT EXISTS `bibbrary` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bibbrary`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bibbrary
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(50) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Cay S. Horstmann'),(2,'John Paul Mueller'),(3,'Mike Chapple'),(4,'Barbara Abercrombie');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(50) NOT NULL,
  `book_isbn` varchar(20) NOT NULL,
  `book_edition` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `fk_author_id` (`author_id`),
  KEY `fk_publisher_id` (`publisher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Pilgrim Souls','9780684843117',1,1,1),(2,'Pilgrim Souls','9780684843117',2,1,1),(3,'Python for Data Science','9781119547662',1,2,2),(4,'Python for Data Science','9781119547662',1,2,2),(5,'Python for Data Science','9781119547662',1,2,2),(6,'C# 7.0 All-in-One','9781119428107',1,3,3),(7,'C# 7.0 All-in-One','9781119428107',2,3,3),(8,'C# 7.0 All-in-One','9781119428107',3,3,3),(9,'C# 7.0 All-in-One','9781119428107',3,3,3),(10,'C# 7.0 All-in-One','9781119428107',3,3,3),(11,'Reality Check','9780061227684',1,4,2),(12,'Cultivating Delight','9780060505363',1,4,1),(13,'Cultivating Delight','9780060505363',1,4,1),(14,'Pearls of wisdom','9780060962005',1,4,2),(15,'Magnificent Machines','9781471122477',1,1,1),(16,'Magnificent Machines','9781471122477',1,1,1),(17,'Magnificent Machines','9781471122477',1,1,1),(18,'Magnificent Machines','9781471122477',1,1,1),(19,'CompTIA Complete Cybersecurity Study Guide','9781119483663',2,3,2),(20,'CompTIA Complete Cybersecurity Study Guide','9781119483663',2,3,2),(21,'Java For Everyone','9781119186717',1,4,3),(22,'Java For Everyone','9781119186717',1,4,3),(23,'Java For Everyone','9781119186717',1,4,3),(24,'Java For Everyone','9781119186717',1,4,3),(25,'The Energy Equation','9781119638681',1,1,1),(26,'The Energy Equation','9781119638681',1,1,1),(27,'The Energy Equation','9781119638681',2,1,1),(28,'qwe','66565',1,3,1);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'James Benson','6649 N Blue Gum St'),(2,'Gladys Rim','12270 Caton Center Dr'),(3,'Bette Stenseth','81 Norris Ave #525'),(4,'Alicia Saylors','03 N Radcliffe St'),(5,'Eric Bowley','287 Youngstown Warren Rd'),(6,'Richard Emerson','70 Euclid Ave #722'),(7,'Robert Lipke','9939 N 14th St'),(8,'Bonnie Klusman','6 Middlegate Rd #106'),(9,'Sue Kullmann','8739 Hudson St'),(10,'Tim Murphy','2140 Diamond Blvd'),(11,'Roger Dell','3958 S Dupont Hwy #7'),(12,'Scott Butchers','96263 Greenwood Pl'),(13,'Mary Maybury','33 Lewis Rd #46'),(14,'Jill Devera','60 Fillmore Ave'),(15,'Jack Lundren','57254 Brickell Ave #372');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `librarians`
--

DROP TABLE IF EXISTS `librarians`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `librarians` (
  `librarian_id` int(11) NOT NULL AUTO_INCREMENT,
  `librarian_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`librarian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `librarians`
--

LOCK TABLES `librarians` WRITE;
/*!40000 ALTER TABLE `librarians` DISABLE KEYS */;
INSERT INTO `librarians` VALUES (1,'Julia Roosevelt'),(2,'Tom White'),(3,'Kate Bilden'),(4,'qwe');
/*!40000 ALTER TABLE `librarians` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loans` (
  `loan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loan_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loan_is_active` tinyint(1) NOT NULL DEFAULT '1',
  `customer_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `librarian_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`loan_id`),
  UNIQUE KEY `lian_id_UNIQUE` (`loan_id`),
  KEY `fk_customer_id` (`customer_id`),
  KEY `fk_book_id` (`book_id`),
  KEY `fk_librarian_id` (`librarian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loans`
--

LOCK TABLES `loans` WRITE;
/*!40000 ALTER TABLE `loans` DISABLE KEYS */;
INSERT INTO `loans` VALUES (1,'2019-01-03 11:15:00',1,1,2,1),(2,'2019-01-03 11:15:00',1,1,2,1),(3,'2019-01-03 11:22:11',1,2,2,1),(4,'2019-01-03 11:34:34',1,1,2,1),(5,'2019-01-03 11:45:00',1,3,2,1),(6,'2019-01-03 11:45:00',1,3,20,1),(7,'2019-01-15 16:29:13',1,4,1,2),(8,'2019-01-15 16:29:13',1,4,5,2),(9,'2019-01-15 16:29:13',1,4,15,2),(10,'2019-01-15 16:32:13',1,5,10,2),(11,'2019-01-15 16:32:13',1,5,21,2),(12,'2019-01-15 16:40:13',1,1,3,2),(13,'2019-01-16 09:11:25',1,6,4,3),(14,'2019-01-16 09:13:25',1,7,5,3),(15,'2019-01-16 09:15:25',1,8,6,3),(16,'2019-01-17 10:16:25',1,2,2,2),(17,'2019-01-17 10:11:23',1,3,2,2),(18,'2019-01-17 10:11:43',1,5,2,2),(19,'2019-01-17 10:22:25',1,8,6,2),(20,'2019-01-17 10:22:25',1,8,14,2),(21,'2019-01-19 08:59:12',1,9,17,1);
/*!40000 ALTER TABLE `loans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publishers`
--

DROP TABLE IF EXISTS `publishers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publishers` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(50) NOT NULL,
  PRIMARY KEY (`publisher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publishers`
--

LOCK TABLES `publishers` WRITE;
/*!40000 ALTER TABLE `publishers` DISABLE KEYS */;
INSERT INTO `publishers` VALUES (1,'Harper Collins'),(2,'Simon & Schuster'),(3,'Wiley');
/*!40000 ALTER TABLE `publishers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-24 17:01:15
