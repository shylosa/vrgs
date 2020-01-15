-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: vrgs
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Игорь','Можейко','Всеволодович','2020-01-11 10:19:51','2020-01-11 10:19:53'),(2,'Жюль','Верн','Габриэль','2020-01-11 10:21:26','2020-01-11 10:21:28'),(3,'Рэй','Брэдбери',NULL,'2020-01-11 10:22:38','2020-01-11 10:22:40'),(5,'Филип','Дик',NULL,'2020-01-11 10:23:22','2020-01-12 11:42:56'),(6,'Роджер','Желязны',NULL,'2020-01-11 10:23:44','2020-01-11 10:23:45'),(7,'Гарри','Гаррисон',NULL,'2020-01-11 10:29:40','2020-01-11 10:29:42'),(8,'Клиффорд','Саймак',NULL,'2020-01-11 10:29:43','2020-01-11 10:29:45'),(9,'Гордон','Диксон',NULL,'2020-01-11 10:29:46','2020-01-11 10:29:48'),(11,'Джордж','Мартин',NULL,'2020-01-11 10:29:53','2020-01-11 10:29:54'),(12,'Дэн','Симмонс',NULL,'2020-01-11 10:29:55','2020-01-11 10:29:57'),(13,'Айзек','Азимов',NULL,'2020-01-14 15:54:39','2020-01-11 10:30:00'),(14,'Ларри','Нивен',NULL,'2020-01-11 10:30:02','2020-01-11 10:30:04'),(15,'Роберт','Хайнлайн',NULL,'2020-01-11 10:30:05','2020-01-11 10:30:07'),(16,'Артур','Кларк',NULL,'2020-01-11 10:30:09','2020-01-11 10:30:10'),(17,'Джордж','Оруэлл',NULL,'2020-01-11 10:30:12','2020-01-11 10:30:13'),(18,'Орсон','Скотт','Кард','2020-01-11 10:30:15','2020-01-11 10:30:16'),(33,'Станислав','Лемешко','Борисович','2020-01-14 13:36:21','2020-01-12 15:03:50'),(59,'Станислав','Лем',NULL,'2020-01-12 15:10:34','2020-01-12 15:10:34'),(60,'Эдмонд','Лем',NULL,'2020-01-12 15:12:19','2020-01-12 15:12:19'),(61,'Станислав','Лем',NULL,'2020-01-12 15:12:29','2020-01-12 15:12:29'),(62,'Стивен','Кинг',NULL,'2020-01-12 15:12:43','2020-01-12 15:12:43'),(63,'Иван','Ефремов','Николаевич','2020-01-14 21:32:26','2020-01-12 15:13:22'),(64,'Лесь','Лем',NULL,'2020-01-12 15:14:02','2020-01-12 15:14:02'),(74,'Александр','Подеревянский','Сергеевич','2020-01-14 20:52:16','2020-01-13 19:59:06'),(75,'Сергей','Лукьяненко','Леонидович','2020-01-14 12:12:13','2020-01-14 12:12:13'),(76,'Стивен','Ефремов','Сергеевич','2020-01-14 13:37:39','2020-01-14 13:37:39'),(77,'Михаил','Булгаков','Афанасьевич','2020-01-14 13:39:47','2020-01-14 13:39:47'),(78,'Терри','Пратчетт',NULL,'2020-01-14 20:50:44','2020-01-14 20:50:44'),(80,'Роберт','Шекли',NULL,'2020-01-14 20:55:49','2020-01-14 20:55:49');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Пятнадцать тысяч лье под водой','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','350CKxaYuQ.jpg',1854,'2020-01-13 11:07:47','2020-01-13 08:28:31'),(2,'Из пушки на луну','Lorem ipsum','vBDTrl6XoD.jpg',1871,'2020-01-12 18:18:44','2020-01-13 08:21:56'),(3,'Планета райского блаженства','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','w6KI4PK7fI.jpg',1971,'2020-01-12 19:19:52','2020-01-13 07:36:23'),(4,'Гостья из будущего','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','0eW7S0JNTk.jpg',1970,'2020-01-12 19:20:41','2020-01-13 07:37:03'),(5,'Монах на краю земли','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','3s4JQ96Bui.jpg',1999,'2020-01-13 12:55:39','2020-01-12 19:21:12'),(6,'Волшебник изумрудного города','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','kOe85obQk2.jpg',1990,'2020-01-13 12:55:59','2020-01-12 19:24:06'),(7,'Возрождение','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','C1zs6WZHrL.jpg',1980,'2020-01-13 13:04:16','2020-01-12 19:24:16'),(9,'Багровый пик','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','0TIjc3McUh.jpg',1693,'2020-01-13 13:06:05','2020-01-12 19:24:20'),(11,'Heralds of the mornings','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','ADTAMJd8al.jpg',1332,'2020-01-13 13:06:36','2020-01-12 19:24:23'),(12,'Последние дни нового Парижа','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','xXscK0TIVK.jpg',2015,'2020-01-13 13:06:50','2020-01-12 19:24:25'),(13,'Shroud of Eternity','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','MSaY7scctF.jpg',1956,'2020-01-14 21:30:44','2020-01-12 19:29:12'),(14,'Пробуждение Левиафана','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','REIpOeQ94s.jpg',1960,'2020-01-13 13:07:15','2020-01-12 19:29:13'),(15,'Огнепад','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','qamlfu3ii0.jpg',1970,'2020-01-13 13:07:31','2020-01-12 19:29:14'),(16,'Кровь Амбера','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','ZAbOGfUqXR.jpg',1900,'2020-01-13 13:14:57','2020-01-12 19:29:15'),(17,'Тёмное путшествие','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','lBaMjEt11z.jpg',1987,'2020-01-13 13:15:13','2020-01-12 19:29:16'),(18,'Рыцарь теней','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','PHK8W4dLpC.jpg',2000,'2020-01-13 13:15:29','2020-01-12 19:29:17'),(19,'Подземелье ведьм','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','hx7iyWxtyz.jpg',2005,'2020-01-13 13:15:50','2020-01-12 19:29:18'),(20,'Роузвотер','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','dL3Nk549Fe.jpg',2007,'2020-01-13 13:16:04','2020-01-12 19:29:19'),(21,'Рыночные силы','авааа  аваыа вава ваваыффф','6tQVqu3Nwq.jpg',2009,'2020-01-13 13:16:44','2020-01-12 19:29:20'),(23,'Белая смерть','Ubi est teres abactus?Fraternal manifestations witness most enlightenments.','YGbtqXcMS6.jpg',2015,'2020-01-13 11:06:44','2020-01-12 19:29:21'),(25,'Гостья из будущего','Lorem ipsum','ocflGsdnfk.jpg',1970,'2020-01-13 11:50:33','2020-01-13 11:50:33'),(26,'Пробуждение Левиафана','Lorem ipsum','TQmDb9YE6x.jpg',1960,'2020-01-13 20:04:29','2020-01-13 20:04:29'),(27,'Пробуждение Левиафана','Lorem ipsum','dLX0lOZsya.jpg',1900,'2020-01-14 12:10:09','2020-01-14 12:10:08'),(28,'Собачье сердце','авааа  аваыа вава ваваыффф','vwzwFsswBi.jpg',1932,'2020-01-14 13:39:04','2020-01-14 13:39:03');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_authors`
--

DROP TABLE IF EXISTS `books_authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books_authors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_authors`
--

LOCK TABLES `books_authors` WRITE;
/*!40000 ALTER TABLE `books_authors` DISABLE KEYS */;
INSERT INTO `books_authors` VALUES (3,2,17,'2020-01-12 18:19:49','2020-01-12 18:19:51'),(5,4,11,'2020-01-12 19:30:16','2020-01-12 19:30:21'),(6,4,12,'2020-01-12 19:30:18','2020-01-12 19:30:23'),(7,23,2,'2020-01-13 11:06:44','2020-01-13 11:06:44'),(8,23,8,'2020-01-13 11:06:44','2020-01-13 11:06:44'),(13,1,2,'2020-01-13 11:07:47','2020-01-13 11:07:47'),(28,5,2,'2020-01-13 12:55:39','2020-01-13 12:55:39'),(29,5,3,'2020-01-13 12:55:39','2020-01-13 12:55:39'),(31,7,2,'2020-01-13 13:04:16','2020-01-13 13:04:16'),(37,11,1,'2020-01-13 13:06:36','2020-01-13 13:06:36'),(38,12,2,'2020-01-13 13:06:50','2020-01-13 13:06:50'),(39,13,60,'2020-01-13 13:07:03','2020-01-13 13:07:03'),(41,15,5,'2020-01-13 13:07:31','2020-01-13 13:07:31'),(43,14,9,'2020-01-13 13:14:17','2020-01-13 13:14:17'),(44,16,2,'2020-01-13 13:14:57','2020-01-13 13:14:57'),(46,17,11,'2020-01-13 13:15:13','2020-01-13 13:15:13'),(47,18,8,'2020-01-13 13:15:29','2020-01-13 13:15:29'),(48,19,3,'2020-01-13 13:15:50','2020-01-13 13:15:50'),(49,19,9,'2020-01-13 13:15:50','2020-01-13 13:15:50'),(50,20,8,'2020-01-13 13:16:04','2020-01-13 13:16:04'),(51,21,63,'2020-01-13 13:16:44','2020-01-13 13:16:44'),(52,26,2,'2020-01-13 20:04:29','2020-01-13 20:04:29'),(55,28,77,'2020-01-14 13:40:01','2020-01-14 13:40:01'),(57,3,12,'2020-01-14 20:53:07','2020-01-14 20:53:07'),(58,25,14,'2020-01-14 20:53:50','2020-01-14 20:53:50'),(59,25,17,'2020-01-14 20:53:50','2020-01-14 20:53:50'),(60,16,1,'2020-01-14 20:56:17','2020-01-14 20:56:17'),(61,16,14,'2020-01-14 20:56:17','2020-01-14 20:56:17'),(62,16,80,'2020-01-14 20:56:17','2020-01-14 20:56:17');
/*!40000 ALTER TABLE `books_authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2019_08_19_000000_create_failed_jobs_table',1),(16,'2020_01_10_171223_create_books_table',1),(17,'2020_01_10_171245_create_authors_table',1),(18,'2020_01_10_171301_create_books_authors_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
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

-- Dump completed on 2020-01-14 23:34:15
