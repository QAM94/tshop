-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: 50.21.181.31    Database: recall_db
-- ------------------------------------------------------
-- Server version	5.7.29

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
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `receipt_id` varchar(255) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (2,'1234567890','root@email.com','uzair khan','1',5,'2020-03-28 16:13:23','2020-03-28 16:13:23'),(3,'1234567890','root1@email.com','uzair khan','12',5,'2020-03-28 16:14:45','2020-03-28 16:14:45'),(4,'1234567890','root@email.com','uzair khan','1',5,'2020-03-28 16:15:50','2020-03-28 16:15:50'),(5,'03343362','uzair@cubix.co','Uzair Khan','987654',8,'2020-03-30 18:35:45','2020-03-30 18:36:45'),(6,'03452541258','fariha.hasan@cubixlabs.com','Fariha Hasan','1254',10,'2020-03-30 19:34:14','2020-03-30 19:34:14'),(8,'0304','sfhasan70@gmail.com','Fariha','14587',10,'2020-03-30 19:44:36','2020-03-30 19:44:36'),(9,'2','fariha.hasan@cubixlabs.com','Fariha Hasan','32323235454545454545455454545454545454545252352352',10,'2020-03-30 19:54:32','2020-03-30 20:04:43'),(10,'-12','fariha.hasan@cubixlabs.com','Fariha','-13',10,'2020-03-30 19:56:27','2020-03-30 19:56:27');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_templates`
--

LOCK TABLES `email_templates` WRITE;
/*!40000 ALTER TABLE `email_templates` DISABLE KEYS */;
INSERT INTO `email_templates` VALUES (2,8,'Recall Augmentin','Expired batch 2020','2020-03-30 18:37:14','2020-03-30 18:37:34'),(4,10,'Eid Mubarak','Dear Costumer!!! From the entire team of the Recall Safe we wish you a very happy Eid Mubarak. All the purchases are upto 50% discount','2020-03-30 19:52:23','2020-03-30 19:52:23');
/*!40000 ALTER TABLE `email_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `receipt_id` varchar(255) NOT NULL,
  `batch_id` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'2vFvBKyNP36XzJyAbc48kqeeV','1','Brown eggs',1,'2',NULL,'2020-04-01 11:08:20','2020-04-01 11:08:20',NULL),(2,'CBRwmP4xgilhuQHmnJM0vBseV','3','Fresh tomato',1,'1',NULL,'2020-04-01 11:08:59','2020-04-01 11:08:59',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES (2,'uzair.khan@cubixlabs.com','$2y$10$uvQ6A8sWnF3tZW//jVuso.pE9xIt8WGlkUlp9f1AWDigTXJN72TcG','2020-03-30 18:26:56');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recall_product_shops`
--

DROP TABLE IF EXISTS `recall_product_shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recall_product_shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recall_product_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recall_product_shops`
--

LOCK TABLES `recall_product_shops` WRITE;
/*!40000 ALTER TABLE `recall_product_shops` DISABLE KEYS */;
INSERT INTO `recall_product_shops` VALUES (3,2,5,'2020-03-28 13:42:59','2020-03-28 13:42:59'),(4,1,5,'2020-03-29 10:12:33','2020-03-29 10:12:33'),(6,4,8,'2020-03-30 18:16:54','2020-03-30 18:16:54'),(10,6,10,'2020-03-30 19:06:23','2020-03-30 19:06:23'),(11,3,NULL,'2020-03-30 19:16:53','2020-03-30 19:16:53'),(12,3,8,'2020-03-30 19:16:53','2020-03-30 19:16:53'),(13,5,10,'2020-04-01 20:10:43','2020-04-01 20:10:43'),(14,5,11,'2020-04-01 20:10:43','2020-04-01 20:10:43'),(15,5,14,'2020-04-01 20:10:43','2020-04-01 20:10:43');
/*!40000 ALTER TABLE `recall_product_shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recall_products`
--

DROP TABLE IF EXISTS `recall_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recall_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recalled_product` varchar(255) DEFAULT NULL,
  `date_of_recall` date DEFAULT NULL,
  `ref_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recall_products`
--

LOCK TABLES `recall_products` WRITE;
/*!40000 ALTER TABLE `recall_products` DISABLE KEYS */;
INSERT INTO `recall_products` VALUES (3,'Brufen','2001-03-22','www.Nurofen.com','2020-03-30 18:15:32','2020-03-30 18:15:32'),(4,'augmentin','2020-06-05','www.augmentin.com','2020-03-30 18:16:54','2020-03-30 18:16:54'),(5,'Dettol Liquid','2020-04-01','abcd','2020-03-30 19:02:50','2020-04-01 20:10:43'),(6,'Dettol Liquid','2020-04-04','abcd','2020-03-30 19:06:23','2020-03-30 19:06:23');
/*!40000 ALTER TABLE `recall_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_templates`
--

DROP TABLE IF EXISTS `sms_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_templates`
--

LOCK TABLES `sms_templates` WRITE;
/*!40000 ALTER TABLE `sms_templates` DISABLE KEYS */;
INSERT INTO `sms_templates` VALUES (2,8,'test','test','2020-03-30 18:37:46','2020-03-30 18:37:46'),(3,10,'Harry Potter','Dear Costumer!!! From the entire team of the Recall Safe we wish you a very happy Eid Mubarak. All the purchases are upto 50% discount','2020-03-30 19:53:23','2020-03-30 19:53:23');
/*!40000 ALTER TABLE `sms_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shops` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` VALUES (5,9,'Store 1','uzair.khan@cubixlabs.com','+6656565655','DHA',0,'2020-03-28 12:13:23','2020-03-28 12:30:01',NULL),(7,15,'Store11','store11@yopmail.com','+923467836789','Test, test',0,'2020-03-30 11:57:47','2020-03-30 19:20:04',NULL),(10,21,'Faraz Mart','faraz.danish@cubixlabs.com','+289382938283','New jersey',1,'2020-03-30 18:41:10','2020-03-30 19:25:52',NULL),(11,24,'Asda','farazd.92@gmail.com','+2514669333','Testing',1,'2020-03-30 19:59:41','2020-03-30 19:59:41',NULL),(14,27,'Dvago','store@yopmail.com','+123456789','Florida Homes',1,'2020-03-30 22:52:20','2020-03-30 22:52:20',NULL),(15,29,'Testing','adeel.ahmed@cubix.co','+9179325698','Testing',1,'2020-03-30 23:13:52','2020-03-30 23:13:52',NULL),(16,30,'Trader\'s Joe','enriquebargioni@msn.com','+9154785652','Testing',1,'2020-03-30 23:19:38','2020-03-30 23:19:38',NULL),(17,32,'Client8','client@yopmail.com','+9712345678','test',1,'2020-04-01 18:17:56','2020-04-01 18:18:05',NULL),(18,33,'Store22','store22@yopmail.com','+22222222222','222222',1,'2020-04-02 02:23:48','2020-04-02 02:23:48',NULL);
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_modules`
--

DROP TABLE IF EXISTS `system_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_modules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) unsigned NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `permit_sort` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_modules`
--

LOCK TABLES `system_modules` WRITE;
/*!40000 ALTER TABLE `system_modules` DISABLE KEYS */;
INSERT INTO `system_modules` VALUES (1,'Dashboard','dashboard','dashboard','shopping-bag',NULL,0,1,0,1,NULL,NULL,NULL),(2,'System Users','management',NULL,'users','with-sub',0,2,0,1,NULL,NULL,NULL),(3,'User Management','users','users.show','circle-o',NULL,2,0,1,1,NULL,NULL,NULL),(4,'Role Management','roles','roles.show','circle-o',NULL,2,0,2,1,NULL,NULL,NULL),(5,'Stores Management','shops','shops.show','shopping-cart',NULL,0,3,0,1,NULL,NULL,NULL),(6,'Agent Management','agents','agents.show','shopping-cart',NULL,0,7,0,1,NULL,NULL,NULL),(7,'Current Recalls','current_recalls','current_recalls.show','user',NULL,0,5,0,1,NULL,NULL,NULL),(8,'Customers','customers','customers.show','user',NULL,0,6,0,1,NULL,NULL,NULL),(9,'Recalled Products','recalled_products','recalled_products.show','shopping-cart',NULL,0,4,0,1,NULL,NULL,NULL),(10,'Email Templates','email_templates','email_templates.show','circle-o',NULL,11,0,1,1,NULL,NULL,NULL),(11,'Settings','settings',NULL,'settings','with-sub',0,8,0,1,NULL,NULL,NULL),(12,'Sms Templates','sms_templates','sms_templates.show','circle-o',NULL,11,0,2,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `system_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_role_permissions`
--

DROP TABLE IF EXISTS `system_role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_role_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `system_module` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system_role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `add` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_role_permissions_system_module_id_foreign` (`system_module`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_role_permissions`
--

LOCK TABLES `system_role_permissions` WRITE;
/*!40000 ALTER TABLE `system_role_permissions` DISABLE KEYS */;
INSERT INTO `system_role_permissions` VALUES (40,'users','store',0,0,0,0,0,'2020-03-29 11:17:09','2020-03-29 11:17:09'),(41,'roles','store',0,0,0,0,0,'2020-03-29 11:17:09','2020-03-29 11:17:09'),(42,'shops','store',0,0,0,0,0,'2020-03-29 11:17:09','2020-03-29 11:17:09'),(43,'agents','store',1,1,1,1,1,'2020-03-29 11:17:09','2020-03-29 11:17:09'),(44,'current_recalls','store',0,0,0,0,0,'2020-03-29 11:17:09','2020-03-29 11:17:09'),(45,'customers','store',1,1,1,1,1,'2020-03-29 11:17:09','2020-03-29 11:17:09'),(46,'recalled_products','store',1,0,0,0,1,'2020-03-29 11:17:09','2020-03-29 11:17:09'),(47,'email_templates','store',1,1,1,1,1,'2020-03-29 11:17:09','2020-03-29 11:17:09'),(48,'sms_templates','store',1,1,1,1,1,'2020-03-29 11:17:09','2020-03-29 11:17:09'),(67,'users','agent',0,0,0,0,0,'2020-03-29 11:22:50','2020-03-29 11:22:50'),(68,'roles','agent',0,0,0,0,0,'2020-03-29 11:22:50','2020-03-29 11:22:50'),(69,'shops','agent',0,0,0,0,0,'2020-03-29 11:22:50','2020-03-29 11:22:50'),(70,'recalled_products','agent',0,0,0,0,0,'2020-03-29 11:22:50','2020-03-29 11:22:50'),(71,'current_recalls','agent',0,0,0,0,0,'2020-03-29 11:22:50','2020-03-29 11:22:50'),(72,'customers','agent',0,1,0,0,0,'2020-03-29 11:22:50','2020-03-29 11:22:50'),(73,'agents','agent',0,0,0,0,0,'2020-03-29 11:22:50','2020-03-29 11:22:50'),(74,'email_templates','agent',0,0,0,0,0,'2020-03-29 11:22:50','2020-03-29 11:22:50'),(75,'sms_templates','agent',0,0,0,0,0,'2020-03-29 11:22:50','2020-03-29 11:22:50'),(76,'users','admin',0,0,0,0,0,'2020-03-29 11:23:03','2020-03-29 11:23:03'),(77,'roles','admin',0,0,0,0,0,'2020-03-29 11:23:03','2020-03-29 11:23:03'),(78,'shops','admin',1,1,1,1,1,'2020-03-29 11:23:03','2020-03-29 11:23:03'),(79,'recalled_products','admin',0,0,0,0,0,'2020-03-29 11:23:03','2020-03-29 11:23:03'),(80,'current_recalls','admin',1,1,1,1,1,'2020-03-29 11:23:03','2020-03-29 11:23:03'),(81,'customers','admin',0,0,0,0,0,'2020-03-29 11:23:03','2020-03-29 11:23:03'),(82,'agents','admin',0,0,0,0,0,'2020-03-29 11:23:03','2020-03-29 11:23:03'),(83,'email_templates','admin',0,0,0,0,0,'2020-03-29 11:23:03','2020-03-29 11:23:03'),(84,'sms_templates','admin',0,0,0,0,0,'2020-03-29 11:23:03','2020-03-29 11:23:03');
/*!40000 ALTER TABLE `system_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_roles`
--

DROP TABLE IF EXISTS `system_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_superadmin` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_roles`
--

LOCK TABLES `system_roles` WRITE;
/*!40000 ALTER TABLE `system_roles` DISABLE KEYS */;
INSERT INTO `system_roles` VALUES (1,'Admin','admin',1,1,NULL,NULL,NULL),(2,'Store','store',0,1,'2019-10-22 09:51:53','2019-10-22 09:51:53',NULL),(3,'Agent','agent',0,1,'2019-10-22 09:51:53',NULL,NULL);
/*!40000 ALTER TABLE `system_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_settings`
--

DROP TABLE IF EXISTS `system_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `input_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_settings`
--

LOCK TABLES `system_settings` WRITE;
/*!40000 ALTER TABLE `system_settings` DISABLE KEYS */;
INSERT INTO `system_settings` VALUES (1,'Maintenance Mode','maintenance-mode','0','checkbox',NULL,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `system_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_statistics`
--

DROP TABLE IF EXISTS `system_statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_statistics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `query` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_statistics`
--

LOCK TABLES `system_statistics` WRITE;
/*!40000 ALTER TABLE `system_statistics` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_statuses`
--

DROP TABLE IF EXISTS `system_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_statuses`
--

LOCK TABLES `system_statuses` WRITE;
/*!40000 ALTER TABLE `system_statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_ref_id` bigint(20) DEFAULT NULL,
  `ref_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filesize` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

LOCK TABLES `uploads` WRITE;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
INSERT INTO `uploads` VALUES (1,'users',9,'user','/files/1585496298logo-square-corner.png',NULL,NULL,NULL,'Store 1','2020-03-28 12:13:23','2020-03-29 10:38:18',NULL),(2,'users',14,'user','/files/1585494375cubix-fav.png',NULL,NULL,NULL,'ads','2020-03-29 10:05:59','2020-03-29 10:06:15',NULL),(3,'users',15,'user','/files/158555506415855549484045930751205751071010.jpg',NULL,NULL,NULL,'Store1','2020-03-30 11:57:44','2020-03-30 11:57:44',NULL),(4,'users',21,'user','/files/15855792682ee8be8187d6d2123015171a6dc9e23b-cool-stuff-man-stuff.jpg',NULL,NULL,NULL,'Faraz Mart','2020-03-30 18:41:08','2020-03-30 18:41:08',NULL),(5,'users',27,'user','/files/1585594338download.png',NULL,NULL,NULL,'Dvago','2020-03-30 22:52:18','2020-03-30 22:52:18',NULL),(6,'users',32,'user','/files/1585750714icon.png',NULL,NULL,NULL,'Client8','2020-04-01 18:18:34','2020-04-01 18:18:34',NULL),(7,'users',1,'user','uploads/1/1586252910recall-logo.png','uploads/1/thumbnail/1586252910recall-logo.png','recall-logo.png','69.67 KB','Administrator','2020-04-07 13:48:30','2020-04-07 13:48:30',NULL);
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `auto_recall` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `is_logout` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','Administrator','admin@recallsafe.com','$2y$10$i6pSkpKxP5iHra9ZnUteNOqmj1E3oe5YhHehH4INsImgTKuotTA1u',1,1,'2019-12-08 13:36:03',NULL,NULL,NULL,NULL,'2020-04-07 13:46:26'),(9,'store','Store 1','uzair.khan@cubixlabs.com','$2y$10$i6pSkpKxP5iHra9ZnUteNOqmj1E3oe5YhHehH4INsImgTKuotTA1u',1,0,NULL,NULL,NULL,NULL,'2020-03-28 12:13:15','2020-03-28 12:13:15'),(15,'store','Store1','store11@yopmail.com','$2y$10$tvhYTOrhhl8N4AEdcnvgWuwiNp1OGO2tORFs38CL71i9RgnKE5AOq',1,0,NULL,NULL,NULL,NULL,'2020-03-30 11:57:44','2020-03-30 11:57:44'),(16,'agent','Agent 11','agent11@yopmail.com','$2y$10$dmSMUZfnCXVP0gl2fNYoxepskEcV5EuWDwJvGsX61goRcLXPAtpIS',1,0,NULL,NULL,7,NULL,'2020-03-30 12:00:43','2020-03-30 12:00:43'),(17,'agent','Agent 12','agent12@yopmail.com','$2y$10$EsckATovAIU4QmBXxXgFbec2bhsoIJKLmGN5Vn71igbicA5cPkgs.',1,0,NULL,NULL,7,NULL,'2020-03-30 17:15:21','2020-03-30 17:15:21'),(20,'agent','Abeer','abeer@cubix.co','$2y$10$/2pYQ8p1gZ9GEfLKhNXdFeKQrhvlH3/K2GenVb3xjBv8S00Qh7mRG',1,0,NULL,NULL,8,NULL,'2020-03-30 18:28:06','2020-03-30 18:28:06'),(21,'store','Faraz Mart','faraz.danish@cubixlabs.com','$2y$10$lpkTkIkqVb9b15Yb5YJ0gegDP0Ii/TkkBqs9MWXrFQ7OaFH6izPpy',1,0,NULL,NULL,NULL,NULL,'2020-03-30 18:41:08','2020-03-30 18:41:08'),(23,'agent','Fariha Syed','sfhasan70@gmail.comm','$2y$10$Hd9bBIK6vU0tUrDy/0RwcONr7a2rMdchD8bbHafGqIGDy3jk7hu82',1,0,NULL,NULL,10,NULL,'2020-03-30 19:41:57','2020-03-30 20:05:59'),(24,'store','Asda','farazd.92@gmail.com','$2y$10$.2r2uUQTRUX2/Uw2VcXhqeMVYREQXwIn2gr9G1ir4ekfVy6V3nEBK',1,0,NULL,NULL,NULL,NULL,'2020-03-30 19:59:39','2020-03-30 19:59:39'),(27,'store','Dvago','store@yopmail.com','$2y$10$sZMmc66QYPDlGtjOlca7zOD5ENEFxEZXS9O4Iz.ig/3zRjImNaAr6',1,0,NULL,NULL,NULL,NULL,'2020-03-30 22:52:18','2020-03-30 22:52:18'),(29,'store','Testing','adeel.ahmed@cubix.co','$2y$10$k2zBDkZQN5J/sKhkknzXbuUE4gIhpquvYnMKKpyo0pVBFltAxdbmC',1,0,NULL,NULL,NULL,NULL,'2020-03-30 23:13:50','2020-03-30 23:13:50'),(30,'store','Trader\'s Joe','enriquebargioni@msn.com','$2y$10$iEuzo8bME7cZZh7etq5WeukdCBfQnvAqCEZb/2cG1VS2/qLYGhGpy',1,0,NULL,NULL,NULL,NULL,'2020-03-30 23:19:36','2020-03-30 23:19:36'),(31,'agent','Trader\'s Joe','testing123@gmail.com','$2y$10$eg2nQTjUL7K.TE1KLEkdHe054gKC3OLalXfEgSnQpDeDSSXPmYm4i',1,0,NULL,NULL,15,NULL,'2020-03-30 23:49:41','2020-03-30 23:49:41'),(32,'store','Client8','client@yopmail.com','$2y$10$te1EMa0X9/K/I1xZXGyGreIcgUbUubqEaUbZZol.g3ts.gUI9JPy6',1,0,NULL,NULL,NULL,NULL,'2020-04-01 18:17:53','2020-04-01 18:17:53'),(33,'store','Store22','store22@yopmail.com','$2y$10$utZY234IvY6ctt3XHZblJeyQ/e6HhxXCXlYe3TmLkD4y9XrrL4z7q',1,0,NULL,'PVCE9SsGZ0LQbO5P5r0VHsAS6ecGyVj6pCdWLhtz3B39f9ZZPZjDwdxjQQEq',NULL,NULL,'2020-04-02 02:23:46','2020-04-03 01:02:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'recall_db'
--

--
-- Dumping routines for database 'recall_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-07 14:49:26
