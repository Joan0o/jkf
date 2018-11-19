-- MySQL dump 10.13  Distrib 8.0.13, for macos10.14 (x86_64)
--
-- Host: localhost    Database: sala
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banda`
--
create database if exists sala;
use sala;

DROP TABLE IF EXISTS `banda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `banda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `bio` varchar(300) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banda`
--

LOCK TABLES `banda` WRITE;
/*!40000 ALTER TABLE `banda` DISABLE KEYS */;
INSERT INTO `banda` VALUES (1,'null','null',1,'2018-10-26 22:43:18','0000-00-00 00:00:00'),(2,'Dmind','Tributo a iron maiden',1,'2018-10-26 22:43:01','2018-10-23 07:57:41'),(4,'Mi otra banda','Mi otra descripcion',1,'2018-10-23 03:26:31','2018-10-23 08:26:31'),(5,'jiji','Oh it works',1,'2018-10-26 22:01:24','2018-10-27 03:01:24'),(6,'Banda de customer','dubi dubi duba dubi dubi dubaa',1,'2018-10-23 08:50:32','2018-10-23 08:50:32');
/*!40000 ALTER TABLE `banda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cancion`
--

DROP TABLE IF EXISTS `cancion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cancion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `links` text,
  `banda_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cancion_banda` (`banda_id`),
  CONSTRAINT `cancion_banda` FOREIGN KEY (`banda_id`) REFERENCES `banda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cancion`
--

LOCK TABLES `cancion` WRITE;
/*!40000 ALTER TABLE `cancion` DISABLE KEYS */;
INSERT INTO `cancion` VALUES (1,'123',NULL,2,'2018-10-23 08:07:26','2018-10-23 08:07:26'),(2,'what now','[\"sfs\"]',2,'2018-10-23 08:10:11','2018-10-23 08:10:11'),(3,'sdgsd','[\"ss.com\"]',2,'2018-10-23 08:18:16','2018-10-23 08:18:16'),(4,'1','[\"1\",\"3\"]',5,'2018-10-27 03:01:53','2018-10-27 03:01:53');
/*!40000 ALTER TABLE `cancion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comentario_curso` (`curso_id`),
  CONSTRAINT `comentario_curso` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(145) NOT NULL,
  `texto` text,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'Un curso','una descripcion',NULL,'2018-11-19 13:02:04','2018-11-19 13:02:04'),(2,'Un curso','una descripcion',NULL,'2018-11-19 13:05:21','2018-11-19 13:05:21'),(3,'Un curso','una descripcion',NULL,'2018-11-19 13:06:50','2018-11-19 13:06:50'),(4,'Un curso','una descripcion',NULL,'2018-11-19 13:06:54','2018-11-19 13:06:54'),(5,'asdasd','qweqweº',NULL,'2018-11-19 13:15:09','2018-11-19 13:15:09'),(6,'asdasd','qweqweº',NULL,'2018-11-19 13:15:16','2018-11-19 13:15:16'),(7,'asdasd','qweqweº',NULL,'2018-11-19 13:15:18','2018-11-19 13:15:18'),(8,'asdasd','qweqweº',NULL,'2018-11-19 13:15:19','2018-11-19 13:15:19'),(9,'asdasd','qweqweº',NULL,'2018-11-19 13:15:19','2018-11-19 13:15:19'),(10,'asdasd','qweqweº',NULL,'2018-11-19 13:15:19','2018-11-19 13:15:19'),(11,'qweqe','addsb',NULL,'2018-11-19 13:17:55','2018-11-19 13:17:55'),(12,'qweqe','addsb',NULL,'2018-11-19 13:18:29','2018-11-19 13:18:29');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ejercicio`
--

DROP TABLE IF EXISTS `ejercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ejercicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`curso_id`),
  KEY `fk_ejercicio_curso1_idx` (`curso_id`),
  CONSTRAINT `fk_ejercicio_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejercicio`
--

LOCK TABLES `ejercicio` WRITE;
/*!40000 ALTER TABLE `ejercicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `ejercicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ensayo`
--

DROP TABLE IF EXISTS `ensayo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ensayo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `fecha_programada` varchar(15) DEFAULT NULL,
  `hora` int(11) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `estado` text,
  `pagado` decimal(10,0) DEFAULT NULL,
  `banda_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `contacto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`,`banda_id`),
  KEY `ensayo_bando` (`banda_id`),
  CONSTRAINT `ensayo_bando` FOREIGN KEY (`banda_id`) REFERENCES `banda` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ensayo`
--

LOCK TABLES `ensayo` WRITE;
/*!40000 ALTER TABLE `ensayo` DISABLE KEYS */;
INSERT INTO `ensayo` VALUES (8,'2018-11-19 10:40:38','2018-11-19',7,1,'reservado',0,1,'2018-11-19 10:40:38','342 - admin@admin.com');
/*!40000 ALTER TABLE `ensayo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membresia`
--

DROP TABLE IF EXISTS `membresia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `membresia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_adquirida` datetime DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `usuario_has_banda_usuario_id` int(11) NOT NULL,
  `usuario_has_banda_banda_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`usuario_has_banda_usuario_id`,`usuario_has_banda_banda_id`),
  KEY `fk_membresia_usuario_has_banda1_idx` (`usuario_has_banda_usuario_id`,`usuario_has_banda_banda_id`),
  CONSTRAINT `fk_membresia_usuario_has_banda1` FOREIGN KEY (`usuario_has_banda_usuario_id`, `usuario_has_banda_banda_id`) REFERENCES `usuario_has_banda` (`usuario_id`, `banda_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membresia`
--

LOCK TABLES `membresia` WRITE;
/*!40000 ALTER TABLE `membresia` DISABLE KEYS */;
/*!40000 ALTER TABLE `membresia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(345) DEFAULT NULL,
  `detalles` text,
  `ejercicio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`ejercicio_id`),
  KEY `fk_preguntas_ejercicio1_idx` (`ejercicio_id`),
  CONSTRAINT `fk_preguntas_ejercicio1` FOREIGN KEY (`ejercicio_id`) REFERENCES `ejercicio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas`
--

LOCK TABLES `preguntas` WRITE;
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(100) DEFAULT NULL,
  `esCorrecta` tinyint(4) DEFAULT NULL,
  `preguntas_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`preguntas_id`),
  KEY `fk_respuestas_preguntas1_idx` (`preguntas_id`),
  CONSTRAINT `fk_respuestas_preguntas1` FOREIGN KEY (`preguntas_id`) REFERENCES `preguntas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas`
--

LOCK TABLES `respuestas` WRITE;
/*!40000 ALTER TABLE `respuestas` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tema`
--

DROP TABLE IF EXISTS `tema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tema`
--

LOCK TABLES `tema` WRITE;
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tema_curso`
--

DROP TABLE IF EXISTS `tema_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tema_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id_fk` (`curso_id`),
  KEY `tema_id_fk` (`tema_id`),
  CONSTRAINT `curso_id_fk` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tema_id_fk` FOREIGN KEY (`tema_id`) REFERENCES `tema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tema_curso`
--

LOCK TABLES `tema_curso` WRITE;
/*!40000 ALTER TABLE `tema_curso` DISABLE KEYS */;
/*!40000 ALTER TABLE `tema_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(200) NOT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `foto` varchar(140) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rol` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correounico` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,'Joan Sebastián Varón forero','shuan779@gmail.com','$2y$10$nC1jZGlAWUFCMYVZDaLbkeF4lvKVlwUktozUKnwnlD9kr.wX3PNUS',NULL,NULL,NULL,'kuU1uMt3pOGx8Rg0PJY7boMR3f5bZG0vcFxaOq4CAhSWJhNnLBLzxIa0ztyL','2018-10-26 22:02:13','2018-10-26 22:02:13','2018-10-26 22:02:13',''),(3,'Customer','customer@customer.com','$2y$10$KSrHuIEMDCaDWDJfjxxmVeL1XTjqwn2.gf1/vjets53/oNTpUf2TW',NULL,NULL,NULL,NULL,'2018-10-23 03:47:26','2018-10-23 08:47:26','2018-10-23 08:47:26',''),(4,'custom','custom@custom.com','$2y$10$/CeSnLYfPqanykt4EPg9yuLeW9tPeD8hhNKOtib9.zf2iOx9JmqZC',NULL,NULL,NULL,'OwnDx4ltBzA5LxT83W0C5OY7rlfATR1JoEOLJ76XO6wKaLQQPMquLIuTrqIN','2018-11-19 04:39:49','2018-11-19 04:39:49','2018-11-19 04:39:49',NULL),(5,'admin','admin@admin.com','$2y$10$7VBbqZHYLE8aKQLe4gEisehBa.uDAkU1u.rOUzJbAqM4CDnmBw5tW','342',NULL,NULL,NULL,'2018-11-19 05:22:26','2018-11-19 05:22:26','2018-11-19 05:22:26','admin');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_has_banda`
--

DROP TABLE IF EXISTS `usuario_has_banda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario_has_banda` (
  `usuario_id` int(11) NOT NULL,
  `banda_id` int(11) NOT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`,`banda_id`),
  KEY `fk_usuario_has_banda_banda1_idx` (`banda_id`),
  KEY `fk_usuario_has_banda_usuario1_idx` (`usuario_id`),
  CONSTRAINT `fk_usuario_has_banda_banda1` FOREIGN KEY (`banda_id`) REFERENCES `banda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_has_banda_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_has_banda`
--

LOCK TABLES `usuario_has_banda` WRITE;
/*!40000 ALTER TABLE `usuario_has_banda` DISABLE KEYS */;
INSERT INTO `usuario_has_banda` VALUES (2,2,1),(2,4,1),(2,5,1),(3,6,1);
/*!40000 ALTER TABLE `usuario_has_banda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_has_curso`
--

DROP TABLE IF EXISTS `usuario_has_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario_has_curso` (
  `usuario_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`curso_id`),
  KEY `fk_usuario_has_curso_curso1_idx` (`curso_id`),
  KEY `fk_usuario_has_curso_usuario1_idx` (`usuario_id`),
  CONSTRAINT `fk_usuario_has_curso_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`),
  CONSTRAINT `fk_usuario_has_curso_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_has_curso`
--

LOCK TABLES `usuario_has_curso` WRITE;
/*!40000 ALTER TABLE `usuario_has_curso` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_has_curso` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-19  3:35:37
