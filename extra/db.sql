-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for osx10.10 (x86_64)
--
-- Host: 127.0.0.1    Database: apirest_db
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `doctrine_migration_versions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES ('DoctrineMigrations\\Version20230119045450','2023-01-19 15:50:34',118);

--
-- Table structure for table `user`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `reset_password_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `IDX_user_id` (`created_by`),
  CONSTRAINT `FK_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `telephone`, `address`, `avatar`, `token`, `active`, `reset_password_token`, `created_by`, `created_at`, `updated_at`) VALUES (1,'user1','email1@email.com','$argon2id$v=19$m=65536,t=4,p=1$GFim2OgYU+FF7L5+iFSkxw$aqEjXyXhuSeUOk8C+sHrzNo6EYEdb9J8KFEFbCc2tx0',NULL,NULL,NULL,'74f2342dd7d0b48cb225a7d6706e4dedd9b6c674',0,NULL,1,'2023-01-19 15:50:49','2023-01-19 15:50:49'),(2,'user','email@email.com','$argon2id$v=19$m=65536,t=4,p=1$iXOy1nEHbWodEye/YbJiYA$PS2y7P03NOQHzIAX9RdL6S2AGnN6oqVrtLZ1VEbwb2g',NULL,NULL,NULL,'aebf4a8231a516bdec489fd351a3aca2df5be270',0,NULL,NULL,'2023-01-19 15:51:01','2023-01-19 15:51:01'),(3,'user2','email2@email.com','$argon2id$v=19$m=65536,t=4,p=1$iia3zDRSqrlVkmdGPcHy4A$/Iqzd2qmJNsBtB4p7rOo88Im9KfIeE2NeEG7kYoRmUY',NULL,NULL,NULL,'6c175911df68e0dde6c64094208b7bd90c68ddbf',0,NULL,1,'2023-01-19 16:09:52','2023-01-19 16:09:52'),(7,'user3','email3@email.com','$argon2id$v=19$m=65536,t=4,p=1$EcSZT4Rx8oztKJlO7N8oaA$rgJUmSYT7MbB6/aVyFPTKebxf6kNlN4TUU0ysjQGv1w',NULL,NULL,NULL,'83a32425e0bcebf4afa09e57d5583c2152abf376',0,NULL,1,'2023-01-19 16:37:20','2023-01-19 16:37:20');
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-24 13:05:34
