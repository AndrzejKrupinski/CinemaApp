-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: CinemaApp
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `film_shows`
--

DROP TABLE IF EXISTS `film_shows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `film_shows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `cinema_hall` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `film_shows`
--

LOCK TABLES `film_shows` WRITE;
/*!40000 ALTER TABLE `film_shows` DISABLE KEYS */;
INSERT INTO `film_shows` VALUES (1,1,'2018-01-29 12:00:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-01-27 23:40:54','2018-01-27 23:40:55'),(2,1,'2018-01-30 12:00:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-01-27 23:41:08','2018-01-27 23:41:10'),(3,1,'2018-01-31 12:00:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-01-27 23:41:22','2018-01-27 23:41:23'),(4,2,'2018-01-29 12:00:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-01-27 23:41:35','2018-01-27 23:41:37'),(5,2,'2018-02-01 12:00:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-01-27 23:41:53','2018-01-27 23:41:54'),(6,1,'2018-01-30 14:00:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-01-29 21:32:29','2018-01-29 21:32:31'),(7,2,'2018-02-04 21:20:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-02-01 20:49:29','2018-02-01 20:49:29'),(8,1,'2018-02-04 22:00:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-02-04 21:08:32','2018-02-04 21:08:34'),(9,2,'2018-02-05 12:00:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-02-04 21:09:08','2018-02-04 21:09:11'),(10,1,'2018-02-06 16:00:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-02-04 21:09:52','2018-02-04 21:09:54'),(11,1,'2018-02-06 20:00:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-02-04 21:10:31','2018-02-04 21:10:32'),(12,2,'2018-02-08 20:00:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-02-04 21:11:01','2018-02-04 21:11:02'),(13,1,'2018-02-09 09:00:00','[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,1,1,0,0,0,0,0],[0,0,0,0,0,0,0,1,0,0],[0,0,0,0,1,1,1,0,0,0]]','2018-02-04 21:11:22','2018-02-04 21:11:24');
/*!40000 ALTER TABLE `film_shows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2018_01_23_203445_create_table_movies',1),(16,'2018_01_23_203819_create_table_film_shows',1),(17,'2018_01_23_210041_create_table_reservations',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `year` year(4) DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(4,2) DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movies_title_index` (`title`),
  KEY `movies_year_index` (`year`),
  KEY `movies_country_index` (`country`),
  KEY `movies_genre_index` (`genre`),
  KEY `movies_director_index` (`director`),
  KEY `movies_rating_index` (`rating`),
  KEY `movies_duration_index` (`duration`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'Apocalypse Now','My favourite with Martin Sheen',1979,'USA','war','Francis Ford Coppola',9.20,153,'2018-01-27 22:51:50','2018-01-27 22:51:52'),(2,'Heat','Best ever',1995,'USA','action','Michael Mann',9.97,170,'2018-01-27 22:59:10','2018-01-27 22:59:11');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `film_show_id` int(11) NOT NULL,
  `code` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seats` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reservations_code_unique` (`code`),
  KEY `reservations_film_show_id_index` (`film_show_id`),
  KEY `reservations_name_index` (`name`),
  KEY `reservations_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-04 22:14:13
