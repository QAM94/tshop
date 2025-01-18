-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for function tshop.CalcIncome
DELIMITER //
CREATE FUNCTION `CalcIncome`() RETURNS int(11)
BEGIN

   DECLARE str1 VARCHAR(100);
	DECLARE str2 VARCHAR(100);

   SET str1 = ' 14700 West Park Ave';
	SET str2 = ' 14700 West Park Ave';
	
	IF(SOUNDEX(str1) = SOUNDEX(str2)) THEN
		RETURN 1;
	END IF;
	

   RETURN 0;
	

   

END//
DELIMITER ;

-- Dumping structure for table tshop.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_popular` tinyint(4) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tshop.categories: ~2 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `parent_id`, `title`, `is_popular`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, NULL, 'cat1', 0, 1, '2022-05-31 19:51:03', '2022-05-31 19:51:03', NULL),
	(2, 1, 'subcat1-edit', 0, 1, '2022-05-31 19:56:11', '2022-05-31 20:43:04', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table tshop.category_products
CREATE TABLE IF NOT EXISTS `category_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tshop.category_products: ~11 rows (approximately)
DELETE FROM `category_products`;
/*!40000 ALTER TABLE `category_products` DISABLE KEYS */;
INSERT INTO `category_products` (`id`, `product_id`, `category_id`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 2, 1, '2022-05-31 21:45:58', '2022-05-31 21:45:58', NULL),
	(2, 2, 2, 1, '2022-05-31 21:47:22', '2022-05-31 21:47:22', NULL),
	(3, 3, 2, 1, '2022-06-08 22:19:39', '2022-06-08 22:19:39', NULL),
	(4, 4, 2, 1, '2022-06-08 22:20:11', '2022-06-08 22:20:11', NULL),
	(5, 5, 2, 1, '2022-07-02 23:35:43', '2022-07-02 23:35:43', NULL),
	(6, 6, 2, 1, '2022-07-02 23:36:25', '2022-07-02 23:36:25', NULL),
	(7, 7, 2, 1, '2022-07-02 23:45:10', '2022-07-02 23:45:10', NULL),
	(8, 8, 2, 1, '2022-07-08 23:59:38', '2022-07-08 23:59:38', NULL),
	(9, 9, 2, 1, '2022-07-08 23:59:49', '2022-07-08 23:59:49', NULL),
	(10, 10, 2, 1, '2022-07-26 23:08:40', '2022-07-26 23:08:40', NULL),
	(13, 13, 2, 1, '2022-07-26 23:11:10', '2022-07-26 23:11:10', NULL);
/*!40000 ALTER TABLE `category_products` ENABLE KEYS */;

-- Dumping structure for table tshop.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table tshop.customers: ~15 rows (approximately)
DELETE FROM `customers`;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `shop_id`, `name`, `phone_number`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2, 'QCustomer', '+923142558569', 'customer1@yopmail.com', '2022-05-24 12:49:18', '2022-05-24 12:49:18', NULL),
	(2, 1, 'Test New', '+123456789', 'tese_new@yopmail.com', '2022-06-21 16:20:16', '2022-06-21 16:20:16', NULL),
	(3, 1, 'Test New', '+1234567891', 'test_new@yopmail.com', '2022-06-27 21:25:13', '2022-06-27 21:25:13', NULL),
	(4, 1, 'Test New', '+1234567891', 'test_new@yopmail.com', '2022-06-27 21:26:46', '2022-06-27 21:26:46', NULL),
	(5, 1, 'Test Newq', 'newq@yopmail.com', NULL, '2022-07-02 14:57:07', '2022-07-02 14:57:07', NULL),
	(6, 1, 'Test New', NULL, NULL, '2022-07-09 16:13:50', '2022-07-09 16:13:50', NULL),
	(7, 1, 'qam test', NULL, NULL, '2022-07-19 21:18:56', '2022-07-29 22:26:30', NULL),
	(8, 1, 'Test New11', '+111111111', NULL, '2022-07-26 21:10:19', '2022-07-29 22:26:18', NULL),
	(9, 1, 'Test Newtt', NULL, NULL, '2022-07-29 22:28:12', '2022-07-29 22:28:12', NULL),
	(10, 1, 'q', NULL, NULL, '2022-07-31 00:12:47', '2022-07-31 00:12:47', NULL),
	(11, 1, 'w', NULL, NULL, '2022-07-31 01:10:31', '2022-07-31 01:10:31', NULL),
	(12, 1, 'e', NULL, NULL, '2022-07-31 01:10:58', '2022-07-31 01:10:58', NULL),
	(13, 1, 'r', NULL, NULL, '2022-07-31 01:21:14', '2022-07-31 01:21:14', NULL),
	(14, 1, 't', NULL, NULL, '2022-07-31 01:24:55', '2022-07-31 01:24:55', NULL),
	(15, 2, 'Test Qam', NULL, NULL, '2022-07-31 01:34:14', '2022-07-31 01:34:14', NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for function tshop.IncomeLevel
DELIMITER //
CREATE FUNCTION `IncomeLevel`( monthly_value INT ) RETURNS varchar(20) CHARSET latin1
BEGIN

   DECLARE income_level varchar(20);

   IF monthly_value <= 4000 THEN
      SET income_level = 'Low Income';

   ELSEIF monthly_value > 4000 AND monthly_value <= 7000 THEN
      SET income_level = 'Avg Income';

   ELSE
      SET income_level = 'High Income';

   END IF;

   RETURN income_level;

END//
DELIMITER ;

-- Dumping structure for table tshop.inventories
CREATE TABLE IF NOT EXISTS `inventories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `quantity` float DEFAULT '1',
  `length` float DEFAULT NULL,
  `yards` float DEFAULT NULL,
  `unit` varchar(6) DEFAULT 'gaz',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table tshop.inventories: ~11 rows (approximately)
DELETE FROM `inventories`;
/*!40000 ALTER TABLE `inventories` DISABLE KEYS */;
INSERT INTO `inventories` (`id`, `product_id`, `quantity`, `length`, `yards`, `unit`) VALUES
	(1, 2, 5, 10, 50, NULL),
	(2, 1, -1, 10, -17, NULL),
	(3, 3, 5, 10, 45, NULL),
	(4, 4, 2, 10, 16, NULL),
	(5, 5, 1, 10, 5, 'gaz'),
	(6, 6, 1, 10, 3, 'gaz'),
	(7, 7, 1, 10, 5, 'gaz'),
	(8, 8, 2, 10, 17, NULL),
	(9, 9, 1, 10, 10, NULL),
	(10, 10, 3, 10, 30, NULL),
	(11, 13, 1, 10, 10, 'gaz');
/*!40000 ALTER TABLE `inventories` ENABLE KEYS */;

-- Dumping structure for table tshop.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tshop.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table tshop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` bigint(20) unsigned NOT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` float DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tshop.products: ~13 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `shop_id`, `sku`, `title`, `slug`, `description`, `price`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2, '111', 'pro1', 'title', 'test', 2, 1, '2022-05-31 21:45:58', '2022-06-27 23:03:58', NULL),
	(2, 2, '31112', 'pro2', 'title', '2', 22, 1, '2022-05-31 21:47:22', '2022-06-27 23:03:58', NULL),
	(3, 1, '333', 'pro3', 'title', 'test', 22, 1, '2022-06-08 22:19:39', '2022-06-27 23:04:05', NULL),
	(4, 1, '444', 'pro4', 'title', 'tedt', 44, 1, '2022-06-08 22:20:11', '2022-06-27 23:04:05', NULL),
	(5, 2, NULL, 'pro4', NULL, 'tedt', 44, 1, '2022-07-02 23:35:43', '2022-07-02 23:35:43', NULL),
	(6, 3, NULL, 'pro4', NULL, 'tedt', 44, 1, '2022-07-02 23:36:25', '2022-07-02 23:36:25', NULL),
	(7, 1, NULL, 'pro1', NULL, 'test', 2, 1, '2022-07-02 23:45:10', '2022-07-02 23:45:10', NULL),
	(8, 1, '2145', 'Fabric 1', 'title', 'Test', 22, 1, '2022-07-08 23:59:38', '2022-07-08 23:59:38', NULL),
	(9, 2, NULL, 'Fabric 1', 'title', 'Test', 22, 1, '2022-07-08 23:59:49', '2022-07-09 00:18:15', NULL),
	(10, 1, '21454', 'new new', 'title', 'test', 12, 1, '2022-07-26 23:08:40', '2022-07-26 23:08:40', NULL),
	(11, 2, NULL, 'new new', NULL, 'test', 12, 1, '2022-07-26 23:08:54', '2022-07-26 23:09:38', '2022-07-26 23:09:38'),
	(12, 2, NULL, 'new new', NULL, 'test', 12, 1, '2022-07-26 23:10:05', '2022-07-26 23:10:55', '2022-07-26 23:10:55'),
	(13, 2, NULL, 'new new', NULL, 'test', 12, 1, '2022-07-26 23:11:10', '2022-07-26 23:11:10', NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table tshop.receipts
CREATE TABLE IF NOT EXISTS `receipts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(50) DEFAULT NULL,
  `shop_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `sub_total` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `advance_payment` float DEFAULT '0',
  `remaining_payment` float DEFAULT NULL,
  `description` text,
  `items_sold_qty` varchar(50) DEFAULT '0',
  `own_cloth` tinyint(1) DEFAULT '0',
  `is_delivered` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table tshop.receipts: ~27 rows (approximately)
DELETE FROM `receipts`;
/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;
INSERT INTO `receipts` (`id`, `receipt_no`, `shop_id`, `customer_id`, `sub_total`, `discount`, `vat`, `total`, `advance_payment`, `remaining_payment`, `description`, `items_sold_qty`, `own_cloth`, `is_delivered`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '11', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2022-06-08 17:51:27', '2022-06-08 17:51:27', NULL),
	(2, '12', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, '2022-06-08 17:53:57', '2022-06-08 17:53:57', NULL),
	(3, '13', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, '2022-06-08 17:54:49', '2022-06-08 17:54:49', NULL),
	(4, '14', 2, 1, 22, 0, NULL, 22, NULL, NULL, NULL, NULL, 0, 0, 1, '2022-06-08 22:24:38', '2022-06-10 23:17:43', NULL),
	(5, '15', 2, 1, 6, 0, NULL, 6, NULL, NULL, NULL, NULL, 0, 0, 1, '2022-06-08 22:26:38', '2022-06-10 23:17:25', NULL),
	(6, '16', 2, 1, 46, 0, NULL, 46, NULL, NULL, NULL, NULL, 0, 0, 1, '2022-06-08 22:40:36', '2022-06-10 23:17:19', NULL),
	(7, '17', 2, 1, 90, 0, NULL, 90, NULL, NULL, NULL, NULL, 0, 0, 1, '2022-06-08 22:44:55', '2022-06-10 23:17:03', NULL),
	(8, '18', 2, 1, 30, 2, NULL, 28, NULL, NULL, NULL, NULL, 0, 0, 1, '2022-06-10 22:58:49', '2022-06-10 23:16:29', NULL),
	(9, '19', 2, 1, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, 0, 0, 0, '2022-06-13 21:57:02', '2022-06-13 21:57:02', NULL),
	(10, '110', 2, 1, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, 0, 0, 0, '2022-06-13 22:00:35', '2022-06-13 22:00:35', NULL),
	(11, '111', 2, 1, 4, NULL, NULL, 4, NULL, NULL, NULL, NULL, 0, 0, 0, '2022-06-13 22:01:13', '2022-06-13 22:01:13', NULL),
	(12, '112', 2, 1, 20, NULL, NULL, 20, NULL, NULL, NULL, NULL, 0, 0, 0, '2022-06-13 22:01:58', '2022-06-13 22:01:58', NULL),
	(13, '213', 1, 2, 44, 0, NULL, 44, NULL, NULL, NULL, NULL, 0, 0, 1, '2022-06-21 16:20:16', '2022-06-30 21:50:20', NULL),
	(14, '114', 2, 1, 5, 0.5, NULL, 4.5, NULL, NULL, NULL, NULL, 0, 0, 1, '2022-06-21 17:13:00', '2022-06-21 21:27:52', NULL),
	(15, 'test123ll', 1, 3, 100, 0, NULL, 100, NULL, 100, NULL, NULL, 0, 0, 1, '2022-06-27 21:25:13', '2022-07-02 16:00:32', NULL),
	(16, 'test123q', 1, 4, 55, 10, 0, 45, 21, 24, NULL, NULL, 0, 0, 1, '2022-06-27 21:26:46', '2022-07-08 23:42:51', NULL),
	(17, 'test123ff', 1, 5, 110, 5, 2, 107, 100, 7, '<ol><li><b>qmaaaas</b></li></ol>', '2', 0, 1, 1, '2022-07-02 14:57:07', '2022-07-26 23:13:05', NULL),
	(18, NULL, 2, 1, 48, 0, 0, 48, 3, 45, '<p><br></p><p><br></p><ol><li>Test124</li></ol>', '1', 0, 0, 1, '2022-07-09 14:36:19', '2022-07-09 22:06:05', NULL),
	(19, 'rrrrrr', 1, 6, 44, 0, 0, 44, 0, 44, NULL, NULL, 1, 0, 1, '2022-07-09 16:13:50', '2022-07-09 21:51:18', NULL),
	(20, 'test123rr', 1, 4, 88, 0, 0, 88, 0, 88, NULL, '2', 0, 0, 1, '2022-07-19 21:18:56', '2022-07-29 22:22:44', NULL),
	(21, 'test123', 1, 2, 22, 0, 0, 22, 0, 22, NULL, '1', 1, 1, 1, '2022-07-26 21:10:19', '2022-07-29 22:22:36', NULL),
	(22, 'test123gg', 1, 9, 26, 0, 0, 26, 0, 26, NULL, '0', 0, 0, 1, '2022-07-29 22:28:12', '2022-07-29 22:28:48', NULL),
	(23, '12121212', 1, 10, 2, 0, 0, 2, 0, 2, NULL, NULL, 0, 0, 1, '2022-07-31 00:12:47', '2022-07-31 00:12:47', NULL),
	(24, '12346', 1, 13, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, 0, 1, '2022-07-31 01:21:14', '2022-07-31 01:21:14', NULL),
	(25, NULL, 1, 14, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, 0, 1, '2022-07-31 01:24:55', '2022-07-31 01:24:55', NULL),
	(26, NULL, 1, 2, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, 0, 1, '2022-07-31 01:33:32', '2022-07-31 01:33:32', NULL),
	(27, NULL, 2, 15, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, 0, 1, '2022-07-31 01:34:14', '2022-07-31 01:34:14', NULL);
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;

-- Dumping structure for table tshop.receipt_details
CREATE TABLE IF NOT EXISTS `receipt_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `receipt_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `yards` float DEFAULT NULL,
  `items_sold` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT '0',
  `unit` varchar(6) DEFAULT 'gaz',
  `price` float DEFAULT '0',
  `remaining_payment` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Dumping data for table tshop.receipt_details: ~28 rows (approximately)
DELETE FROM `receipt_details`;
/*!40000 ALTER TABLE `receipt_details` DISABLE KEYS */;
INSERT INTO `receipt_details` (`id`, `receipt_id`, `product_id`, `yards`, `items_sold`, `unit_price`, `unit`, `price`, `remaining_payment`) VALUES
	(1, 1, 1, 2, NULL, 2, NULL, NULL, 0),
	(2, 3, 1, 2, NULL, 2, NULL, NULL, 0),
	(3, 6, 1, 1, NULL, 2, NULL, 2, 0),
	(4, 2, 1, 2, NULL, 2, NULL, NULL, 0),
	(5, 2, 3, 1, NULL, 22, NULL, NULL, 0),
	(6, 6, 3, 2, NULL, 22, NULL, 44, 0),
	(7, 7, 1, 1, NULL, 2, NULL, 2, 0),
	(8, 7, 3, 4, NULL, 22, NULL, 88, 0),
	(9, 5, 1, 3, NULL, 2, NULL, 6, 0),
	(10, 8, 1, 4, NULL, NULL, 'meter', 8, 0),
	(11, 8, 3, 1, NULL, NULL, 'meter', 22, 0),
	(12, 4, 2, 1, NULL, NULL, NULL, 22, 0),
	(13, 9, 1, 1, NULL, NULL, 'meter', 2, 0),
	(14, 10, 1, 1, NULL, NULL, 'meter', 2, 0),
	(17, 13, 2, 1, NULL, NULL, 'meter', 22, 0),
	(18, 14, 1, 2.5, NULL, NULL, 'meter', 5, 0),
	(20, 16, 3, 2.5, NULL, 0, 'gaz', 55, 0),
	(21, 13, 4, 1, NULL, 0, 'gaz', 44, 0),
	(22, 17, 3, 1, NULL, 0, 'gaz', 22, 0),
	(24, 17, 4, 2, NULL, 0, 'gaz', 22, 0),
	(25, 18, 1, 24, NULL, 0, 'gaz', 48, 0),
	(27, 20, 8, 3, 1, 0, 'gaz', 66, 0),
	(28, 19, 3, 2, 1, 0, 'gaz', 44, 0),
	(29, 20, 3, 1, 1, 0, 'gaz', 66, 0),
	(30, 21, 3, 1, 1, 0, 'gaz', 22, 0),
	(31, 22, 3, 1, 1, 0, 'gaz', 22, 0),
	(32, 22, 7, 2, 1, 0, 'gaz', 4, 0),
	(33, 23, 7, 1, 0, 0, 'gaz', 2, 0);
/*!40000 ALTER TABLE `receipt_details` ENABLE KEYS */;

-- Dumping structure for table tshop.sales_purchases
CREATE TABLE IF NOT EXISTS `sales_purchases` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `shop_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `type` enum('sale','purchase') DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table tshop.sales_purchases: ~25 rows (approximately)
DELETE FROM `sales_purchases`;
/*!40000 ALTER TABLE `sales_purchases` DISABLE KEYS */;
INSERT INTO `sales_purchases` (`id`, `shop_id`, `product_id`, `type`, `quantity`, `price`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 2, 'sale', 2, 25, 1, '2022-06-16 21:29:10', '2022-06-16 21:34:32', NULL),
	(2, 2, 1, 'sale', 3, 2, NULL, '2022-06-21 17:55:53', '2022-06-21 17:55:53', NULL),
	(3, 2, 1, 'sale', 3, 2, NULL, '2022-06-21 17:57:13', '2022-06-21 17:57:13', NULL),
	(4, 2, 1, 'sale', 2.5, 2, 0, '2022-06-21 21:22:32', '2022-06-21 21:25:28', NULL),
	(5, 2, 1, 'sale', 3, 2, NULL, '2022-06-21 21:25:48', '2022-06-21 21:25:48', NULL),
	(6, 2, 1, 'sale', 2.5, 2, NULL, '2022-06-21 21:27:52', '2022-06-21 21:27:52', NULL),
	(7, 1, 2, 'sale', 2.5, 22, 1, '2022-06-27 21:40:44', '2022-06-27 21:40:44', NULL),
	(8, 1, 2, 'sale', 2.5, 22, 1, '2022-06-27 21:42:15', '2022-06-27 21:42:15', NULL),
	(9, 1, 2, 'sale', 2.5, 22, 1, '2022-06-27 21:43:30', '2022-06-27 21:43:30', NULL),
	(10, 1, 2, 'sale', 2.5, 22, 1, '2022-06-27 22:00:58', '2022-06-27 22:00:58', NULL),
	(11, 1, 3, 'sale', 2.5, 22, 1, '2022-06-30 21:49:48', '2022-06-30 21:49:48', NULL),
	(12, 1, 4, 'sale', 1, 44, 1, '2022-06-30 21:50:20', '2022-06-30 21:50:20', NULL),
	(13, 1, 3, 'sale', 2.5, 22, 1, '2022-07-02 14:57:07', '2022-07-02 14:57:07', NULL),
	(14, 1, 4, 'sale', 1, 44, 1, '2022-07-02 14:57:07', '2022-07-02 14:57:07', NULL),
	(15, 1, 3, 'sale', 1, 22, 1, '2022-07-02 14:57:07', '2022-07-02 14:57:07', NULL),
	(16, 1, 4, 'sale', 2, 44, 1, '2022-07-02 23:28:09', '2022-07-02 23:28:09', NULL),
	(17, 2, 1, 'sale', 24, 2, 1, '2022-07-09 14:36:20', '2022-07-09 14:36:20', NULL),
	(18, 1, 3, 'sale', 2, 22, 1, '2022-07-09 16:13:50', '2022-07-09 16:13:50', NULL),
	(19, 1, 8, 'sale', 3, 22, 1, '2022-07-19 21:18:56', '2022-07-19 21:18:56', NULL),
	(20, 1, 3, 'sale', 2, 22, 1, '2022-07-19 21:21:04', '2022-07-19 21:21:04', NULL),
	(21, 1, 3, 'sale', 1, 22, 1, '2022-07-19 21:52:35', '2022-07-19 21:52:35', NULL),
	(22, 1, 3, 'sale', 1, 22, 1, '2022-07-26 21:10:19', '2022-07-26 21:10:19', NULL),
	(23, 1, 3, 'sale', 1, 22, 1, '2022-07-29 22:28:48', '2022-07-29 22:28:48', NULL),
	(24, 1, 7, 'sale', 2, 2, 1, '2022-07-29 22:28:48', '2022-07-29 22:28:48', NULL),
	(25, 1, 7, 'sale', 1, 2, 1, '2022-07-31 00:12:47', '2022-07-31 00:12:47', NULL);
/*!40000 ALTER TABLE `sales_purchases` ENABLE KEYS */;

-- Dumping structure for table tshop.shops
CREATE TABLE IF NOT EXISTS `shops` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table tshop.shops: ~3 rows (approximately)
DELETE FROM `shops`;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` (`id`, `name`, `email`, `contact`, `address`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Shop 1', 'shop1@yopmail.com', '+1111111111', '157 E. Elizabeth St. Montgomery Village, MD 20886', 1, '2022-05-23 21:50:48', '2022-08-22 22:10:07', NULL),
	(2, 'QShop', 'qshop@yopmail.com', '+11111111111', 'test', 1, '2022-05-24 12:38:07', '2022-05-24 12:38:07', NULL),
	(3, 'Test New', 'shopneww@tshop.com', '+1234567898', 'twsttttt', 1, '2022-06-25 23:36:03', '2022-06-25 23:36:03', NULL);
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;

-- Dumping structure for table tshop.shop_users
CREATE TABLE IF NOT EXISTS `shop_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `shop_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table tshop.shop_users: ~1 rows (approximately)
DELETE FROM `shop_users`;
/*!40000 ALTER TABLE `shop_users` DISABLE KEYS */;
INSERT INTO `shop_users` (`id`, `shop_id`, `user_id`) VALUES
	(1, 1, 8);
/*!40000 ALTER TABLE `shop_users` ENABLE KEYS */;

-- Dumping structure for function tshop.similarityChk
DELIMITER //
CREATE FUNCTION `similarityChk`() RETURNS varchar(100) CHARSET latin1
BEGIN
   DECLARE str1 VARCHAR(100);
	DECLARE str2 VARCHAR(100);
   DECLARE sd1 VARCHAR(20);
	DECLARE sd2 VARCHAR(20);

   SET str1 = ' 14700 W Park Ave';
	SET str2 = ' 14700, West Park AVENUE.';
	SET sd1 = SOUNDEX(str1);
	SET sd2 = SOUNDEX(str2);	
	
	IF(sd1 = sd2 OR sd1 LIKE CONCAT('%', sd2 ,'%') OR sd2 LIKE CONCAT('%', sd1 ,'%')) THEN
		RETURN TRUE;
	END IF;
	
	SET str1 = REPLACE(str1, ' ', '%');
	SET str2 = REPLACE(str2, ' ', '%');
	
	IF(str1 = str2 OR str1 LIKE CONCAT('%',str2,'%') OR str2 LIKE CONCAT('%',str1,'%')) THEN
		RETURN TRUE;
	END IF;
	
	SET str1 = REPLACE(LOWER(RTRIM(str1)), ',', '');
	SET str2 = REPLACE(LOWER(RTRIM(str2)), ',', '');
	
	SET str1 = REPLACE(str1, '.', '');
	SET str2 = REPLACE(str2, '.', '');
	
	SET str1 = REPLACE(str1, ' road', ' rd');
	SET str2 = REPLACE(str2, ' road', ' rd');
	
	SET str1 = REPLACE(str1, ' lane', ' ln');
	SET str2 = REPLACE(str2, ' lane', ' ln');
	
	SET str1 = REPLACE(str1, ' avenue', ' ave');
	SET str2 = REPLACE(str2, ' avenue', ' ave');
	
	IF(str1 = str2 OR str1 LIKE CONCAT('%',str2,'%') OR str2 LIKE CONCAT('%',str1,'%')) THEN
		RETURN TRUE;
	END IF;
	
	RETURN FALSE;

END//
DELIMITER ;

-- Dumping structure for table tshop.system_modules
CREATE TABLE IF NOT EXISTS `system_modules` (
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

-- Dumping data for table tshop.system_modules: ~12 rows (approximately)
DELETE FROM `system_modules`;
/*!40000 ALTER TABLE `system_modules` DISABLE KEYS */;
INSERT INTO `system_modules` (`id`, `title`, `slug`, `route_name`, `icon`, `class`, `parent_id`, `sort`, `permit_sort`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Dashboard', 'dashboard', 'dashboard', 'shopping-bag', NULL, 0, 1, 0, 1, NULL, NULL, NULL),
	(2, 'System Users', 'management', NULL, 'users', 'with-sub', 0, 2, 0, 1, NULL, NULL, NULL),
	(3, 'Roles Management', 'roles', 'roles.show', 'circle-o', NULL, 2, 0, 1, 1, NULL, NULL, NULL),
	(4, 'Users Management', 'users', 'users.show', 'circle-o', NULL, 2, 0, 2, 1, NULL, NULL, NULL),
	(5, 'Shops Management', 'shops', 'shops.show', 'shopping-cart', NULL, 0, 3, 0, 1, NULL, NULL, NULL),
	(6, 'Customers Management', 'customers', 'customers.show', 'user', NULL, 0, 6, 0, 1, NULL, NULL, NULL),
	(7, 'Inventory Management', 'inventory', NULL, 'shopping-cart', 'with-sub', 0, 4, 0, 1, NULL, NULL, NULL),
	(8, 'Categories', 'categories', 'categories.show', 'circle-o', NULL, 7, 0, 0, 1, NULL, NULL, NULL),
	(9, 'Products', 'products', 'products.show', 'circle-o', NULL, 7, 0, 1, 1, NULL, NULL, NULL),
	(10, 'Billing', 'billing', NULL, 'file-text', 'with-sub', 0, 8, 0, 1, NULL, NULL, NULL),
	(11, 'Receipt', 'receipts', 'receipts.show', 'circle-o', NULL, 10, 0, 2, 1, NULL, NULL, NULL),
	(12, 'Sales/Purchase Management', 'sales-purchase', 'sales-purchase.show', 'file-text', NULL, 0, 7, 0, 1, NULL, NULL, NULL);
/*!40000 ALTER TABLE `system_modules` ENABLE KEYS */;

-- Dumping structure for table tshop.system_roles
CREATE TABLE IF NOT EXISTS `system_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_superadmin` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tshop.system_roles: ~2 rows (approximately)
DELETE FROM `system_roles`;
/*!40000 ALTER TABLE `system_roles` DISABLE KEYS */;
INSERT INTO `system_roles` (`id`, `title`, `slug`, `is_superadmin`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Admin', 'admin', 1, 1, NULL, NULL, NULL),
	(2, 'Shop', 'shop', 0, 1, '2019-10-22 14:51:53', '2019-10-22 14:51:53', NULL);
/*!40000 ALTER TABLE `system_roles` ENABLE KEYS */;

-- Dumping structure for table tshop.system_role_permissions
CREATE TABLE IF NOT EXISTS `system_role_permissions` (
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
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tshop.system_role_permissions: ~28 rows (approximately)
DELETE FROM `system_role_permissions`;
/*!40000 ALTER TABLE `system_role_permissions` DISABLE KEYS */;
INSERT INTO `system_role_permissions` (`id`, `system_module`, `system_role`, `is_visible`, `add`, `edit`, `delete`, `view`, `created_at`, `updated_at`) VALUES
	(40, 'users', 'shop', 0, 0, 0, 0, 0, '2020-03-29 16:17:09', '2020-03-29 16:17:09'),
	(41, 'roles', 'shop', 0, 0, 0, 0, 0, '2020-03-29 16:17:09', '2020-03-29 16:17:09'),
	(42, 'shops', 'shop', 0, 0, 0, 0, 0, '2020-03-29 16:17:09', '2020-03-29 16:17:09'),
	(43, 'agents', 'shop', 0, 1, 1, 1, 1, '2020-03-29 16:17:09', '2020-03-29 16:17:09'),
	(44, 'current_recalls', 'shop', 0, 0, 0, 0, 0, '2020-03-29 16:17:09', '2020-03-29 16:17:09'),
	(45, 'customers', 'shop', 1, 1, 1, 1, 1, '2020-03-29 16:17:09', '2020-03-29 16:17:09'),
	(46, 'recalled_products', 'shop', 0, 0, 0, 0, 1, '2020-03-29 16:17:09', '2020-03-29 16:17:09'),
	(47, 'email_templates', 'shop', 1, 1, 1, 1, 1, '2020-03-29 16:17:09', '2020-03-29 16:17:09'),
	(48, 'sms_templates', 'shop', 1, 1, 1, 1, 1, '2020-03-29 16:17:09', '2020-03-29 16:17:09'),
	(67, 'users', 'agent', 0, 0, 0, 0, 0, '2020-03-29 16:22:50', '2020-03-29 16:22:50'),
	(68, 'roles', 'agent', 0, 0, 0, 0, 0, '2020-03-29 16:22:50', '2020-03-29 16:22:50'),
	(69, 'shops', 'agent', 0, 0, 0, 0, 0, '2020-03-29 16:22:50', '2020-03-29 16:22:50'),
	(70, 'recalled_products', 'agent', 0, 0, 0, 0, 0, '2020-03-29 16:22:50', '2020-03-29 16:22:50'),
	(71, 'current_recalls', 'agent', 0, 0, 0, 0, 0, '2020-03-29 16:22:50', '2020-03-29 16:22:50'),
	(72, 'customers', 'agent', 0, 1, 0, 0, 0, '2020-03-29 16:22:50', '2020-03-29 16:22:50'),
	(73, 'agents', 'agent', 0, 0, 0, 0, 0, '2020-03-29 16:22:50', '2020-03-29 16:22:50'),
	(74, 'email_templates', 'agent', 0, 0, 0, 0, 0, '2020-03-29 16:22:50', '2020-03-29 16:22:50'),
	(75, 'sms_templates', 'agent', 0, 0, 0, 0, 0, '2020-03-29 16:22:50', '2020-03-29 16:22:50'),
	(85, 'categories', 'admin', 1, 1, 1, 1, 1, '2022-05-31 19:15:11', '2022-05-31 19:15:11'),
	(86, 'products', 'admin', 1, 1, 1, 1, 1, '2022-05-31 19:15:11', '2022-05-31 19:15:11'),
	(87, 'users', 'admin', 1, 1, 1, 1, 1, '2022-05-31 19:15:11', '2022-05-31 19:15:11'),
	(88, 'roles', 'admin', 1, 1, 1, 1, 1, '2022-05-31 19:15:11', '2022-05-31 19:15:11'),
	(89, 'shops', 'admin', 1, 1, 1, 1, 1, '2022-05-31 19:15:11', '2022-05-31 19:15:11'),
	(90, 'inventory', 'admin', 1, 1, 1, 1, 1, '2022-05-31 19:15:11', '2022-05-31 19:15:11'),
	(91, 'customers', 'admin', 1, 1, 1, 1, 1, '2022-05-31 19:15:11', '2022-05-31 19:15:11'),
	(92, 'billing', 'admin', 1, 1, 1, 1, 1, '2022-05-31 19:15:11', '2022-05-31 19:15:11'),
	(93, 'receipts', 'admin', 1, 1, 1, 1, 1, '2022-05-31 19:15:11', '2022-05-31 19:15:11'),
	(94, 'sales-purchase', 'admin', 1, 1, 1, 1, 1, NULL, NULL);
/*!40000 ALTER TABLE `system_role_permissions` ENABLE KEYS */;

-- Dumping structure for table tshop.system_settings
CREATE TABLE IF NOT EXISTS `system_settings` (
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

-- Dumping data for table tshop.system_settings: ~1 rows (approximately)
DELETE FROM `system_settings`;
/*!40000 ALTER TABLE `system_settings` DISABLE KEYS */;
INSERT INTO `system_settings` (`id`, `label`, `slug`, `value`, `input_type`, `helper`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Maintenance Mode', 'maintenance-mode', '0', 'checkbox', NULL, 1, NULL, NULL, NULL);
/*!40000 ALTER TABLE `system_settings` ENABLE KEYS */;

-- Dumping structure for table tshop.system_statistics
CREATE TABLE IF NOT EXISTS `system_statistics` (
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

-- Dumping data for table tshop.system_statistics: ~0 rows (approximately)
DELETE FROM `system_statistics`;
/*!40000 ALTER TABLE `system_statistics` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_statistics` ENABLE KEYS */;

-- Dumping structure for table tshop.system_statuses
CREATE TABLE IF NOT EXISTS `system_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tshop.system_statuses: ~0 rows (approximately)
DELETE FROM `system_statuses`;
/*!40000 ALTER TABLE `system_statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_statuses` ENABLE KEYS */;

-- Dumping structure for table tshop.uploads
CREATE TABLE IF NOT EXISTS `uploads` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tshop.uploads: ~3 rows (approximately)
DELETE FROM `uploads`;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
INSERT INTO `uploads` (`id`, `model_name`, `model_ref_id`, `ref_name`, `source`, `thumbnail`, `filename`, `filesize`, `caption`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'users', 1, 'user', 'uploads/1/1653391679ed74d5259d2b415e958d71e9f6e434e0.jpg', 'uploads/1/thumbnail/1653391679ed74d5259d2b415e958d71e9f6e434e0.jpg', 'ed74d5259d2b415e958d71e9f6e434e0.jpg', '13.22 KB', 'Administrator', '2022-05-24 11:27:36', '2022-05-24 11:27:59', NULL),
	(2, 'users', 7, 'user', 'uploads/7/1653395887imgg.png', 'uploads/7/thumbnail/1653395887imgg.png', 'imgg.png', '2.22 KB', 'QShop', '2022-05-24 12:38:07', '2022-05-24 12:38:07', NULL),
	(3, 'users', 8, 'user', 'uploads/8/1655331755avatar.jpg', 'uploads/8/thumbnail/1655331755avatar.jpg', 'avatar.jpg', '2.75 KB', '', '2022-06-15 21:39:00', '2022-06-15 22:22:35', NULL);
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;

-- Dumping structure for table tshop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'shop',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tshop.users: ~4 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `contact`, `is_active`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin', 'Administrator', 'admin@tshop.com', '$2y$10$kOtT2PPN22nepXVdr8sUB..b6eX6O.WEQ5Hx9OPo9s.3DNEWmviXG', NULL, 1, '2019-12-08 18:36:03', NULL, NULL, '2022-05-24 11:40:26', NULL),
	(6, 'shop', 'Store 1', 'store1@yopmail.com', '$2y$10$Dd1BON8MPFtJuRpZplQ0m.OFowHSFPEtaHkBcwCvRCQ4gUhFvW/Wu', NULL, 1, NULL, NULL, '2022-05-23 21:50:48', '2022-05-23 21:50:48', NULL),
	(7, 'shop', 'QShop', 'qshop@yopmail.com', '$2y$10$lSdcPpHMv/wnG8mbpx81ouSUOZlrQiD4RXoze24NTfOsTzuUkJ/N.', NULL, 1, NULL, NULL, '2022-05-24 12:38:07', '2022-05-24 12:38:07', NULL),
	(8, 'shop', 'User', 'user1s1@yopmail.com', '$2y$10$3aPBCWy.3y5vTjpjsr17nextrnuPWZh8g0N1SXaesGCNDxaK61r.u', '+923458745896', 1, NULL, NULL, '2022-06-15 21:38:59', '2022-06-15 22:22:21', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
