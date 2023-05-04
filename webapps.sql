-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6665
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for webapps
CREATE DATABASE IF NOT EXISTS `webapps` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `webapps`;

-- Dumping structure for table webapps.app_log
CREATE TABLE IF NOT EXISTS `app_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `module` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `activity` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.app_log: ~0 rows (approximately)

-- Dumping structure for table webapps.app_loga
CREATE TABLE IF NOT EXISTS `app_loga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `update` longtext NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `user_agent` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table webapps.app_loga: ~1 rows (approximately)
INSERT INTO `app_loga` (`id`, `id_user`, `name`, `update`, `ip_address`, `user_agent`, `timestamp`) VALUES
	(1, 2, 'API_IP', '{"user_ip":"::1","user_agent":"PostmanRuntime\\/7.29.2"}', '::1', 'PostmanRuntime/7.29.2', '2022-08-09 08:28:46');

-- Dumping structure for table webapps.app_logd
CREATE TABLE IF NOT EXISTS `app_logd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `table_name` varchar(9999) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `update` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.app_logd: ~0 rows (approximately)

-- Dumping structure for table webapps.app_settings
CREATE TABLE IF NOT EXISTS `app_settings` (
  `code` char(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table webapps.app_settings: ~1 rows (approximately)
INSERT INTO `app_settings` (`code`, `value`) VALUES
	('SETTING_LOCK_LOGIN_IP', 'YES');

-- Dumping structure for table webapps.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.migration: ~3 rows (approximately)
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1582665882),
	('m130524_201442_init', 1582665886),
	('m190124_110200_add_verification_token_column_to_user_table', 1582665887);

-- Dumping structure for table webapps.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(2) NOT NULL,
  `code` char(50) NOT NULL,
  `code_sub` char(50) NOT NULL,
  `level` char(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `name` char(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.user: ~5 rows (approximately)
INSERT INTO `user` (`id`, `type`, `code`, `code_sub`, `level`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `name`, `image`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
	(1, 'B', 'BCH001', '', '6fb4f22992a0d164b77267fde5477248', 'root', '0AwqpjBTwa9AAv2dih8TPqyZqfuhyla8', '$2y$13$nAKuTfVbllxviIwOczggg.QC2Wove1rZ06LKt3v26Uv6n9As6JuKC', NULL, 'root@root.com', 'The Root', '/images/upload/user/root.jpg', 10, 1582829438, 1586125515, NULL),
	(2, 'B', 'BCH001', '', '6fb4f22992a0d164b77267fde5477248', 'admin', '9d5iN9B7AnK7zusmBTJArV8AEbtAWdRJ', '$2y$13$na0oLU.ohHr.KH140vT2y..NjyOkEG9.QM7hPSc5flEMYoCjIn5bu', NULL, 'admin@admin.com', 'Admin', '/images/upload/user/admin.jpg', 10, 1582829973, 1582839032, NULL),
	(3, 'B', 'BCH001', '', '2b6cc9c30eaad9c109091ea928529cbd', 'user', 'gylSa9MSAmeHbulXhhFN7flRSMlanoxA', '$2y$13$jq5nJ8QWqcTB7nLT7KTpceIwo2nT7OPBcRsTrspY0MTHo3vq9SSKe', NULL, 'user@user.com', 'User', '/images/upload/user/user.jpg', 10, 1582830712, 1582839057, NULL),
	(4, 'B', 'BCH001', '', '3ed53fbeb1eab0443561b68ca0c0b5cf', 'menu', 'F_znQaWZQIDQ6uO-dgSk4YqVglt7Rkb5', '$2y$13$ZWRKAATXpkYNfAM8u1kOeOGXn1YY6em4XEeNP3sHN576DTCbWgzY6', NULL, 'menu@menu.com', 'Demo Menu', '/images/upload/user/menu.jpg', 10, 1598935611, 1646062741, NULL),
	(5, 'C', 'CUS00001', '', '2739e7b6438aaf3f6fa220ba7f097cb2', 'customer1', 'SelzstYuVIBVizx85a5cEHAV5KWY1Qxm', '$2y$13$wLoP55vDkGwcdf0SrBQWM.CinzfVqemfYKkrRVfGdw/meoyjBoP/.', NULL, 'customer1@email.com', 'Customer 1', '/images/upload/user/customer1.jpeg', 10, 1646108034, 1646108916, NULL);

-- Dumping structure for table webapps.user_access
CREATE TABLE IF NOT EXISTS `user_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `module` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `action` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_stamp` int(11) NOT NULL DEFAULT 0,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.user_access: ~16 rows (approximately)
INSERT INTO `user_access` (`id`, `level`, `module`, `controller`, `action`, `id_stamp`, `datestamp`, `timestamp`) VALUES
	(1, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-access', '{"index":false,"control":true,"cekidot":true,"view":false,"create":false,"update":false,"delete":false}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(2, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'app-log', '{"index":true,"view":true}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(3, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'app-logd', '{"index":true,"view":true}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(4, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'branch', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(5, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'customer', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(6, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'reff', '{"index":true,"user-type":true}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(7, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'site', '{"index":true,"login":true,"logout":true}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(8, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'system', '{"info":true}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(9, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(10, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-level', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(11, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-menu', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(12, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-type', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(13, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-log', '{"index":true,"view":true,"create":false,"update":false,"delete":false}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(14, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'app-loga', '{"index":true,"view":true,"delete":false}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(15, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'app-settings', '{"index":true,"view":true,"create":true,"update":true,"delete":false}', 2, '2023-04-29 06:14:34', '2023-04-28 23:14:34'),
	(16, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'transaction', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2023-04-29 06:14:34', '2023-05-04 16:34:56');

-- Dumping structure for table webapps.user_level
CREATE TABLE IF NOT EXISTS `user_level` (
  `code` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` char(2) NOT NULL,
  `name` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.user_level: ~5 rows (approximately)
INSERT INTO `user_level` (`code`, `type`, `name`) VALUES
	('ADM', 'B', 'ADMIN'),
	('API', 'B', 'API'),
	('MENU', 'B', 'MENU'),
	('USR', 'B', 'USER'),
	('USRC', 'C', 'USER');

-- Dumping structure for table webapps.user_log
CREATE TABLE IF NOT EXISTS `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `ip_address` varchar(15) NOT NULL,
  `user_agent` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table webapps.user_log: ~1 rows (approximately)
INSERT INTO `user_log` (`id`, `id_user`, `ip_address`, `user_agent`, `timestamp`) VALUES
	(28, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', '2023-05-03 07:42:41');

-- Dumping structure for table webapps.user_menu
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Menu',
  `id_sub` int(11) NOT NULL DEFAULT 0 COMMENT 'Submenu Level 1',
  `id_sub2` int(11) NOT NULL DEFAULT 0 COMMENT 'Submenu Level 2',
  `level` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `module` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `class` enum('H','D','S','L') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'L',
  `url_controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `url_view` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `url_parameter` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'param1=value1,param2=value2',
  `seq` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.user_menu: ~32 rows (approximately)
INSERT INTO `user_menu` (`id`, `id_sub`, `id_sub2`, `level`, `module`, `class`, `url_controller`, `url_view`, `url_parameter`, `seq`, `icon`, `name`) VALUES
	(1, 0, 0, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'L', 'site', 'index', '', 1, 'fa fa-file', 'Link'),
	(2, 0, 0, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'D', '', '', '', 2, '', 'Divider'),
	(3, 0, 0, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'H', '', '', '', 3, '', 'Header'),
	(4, 0, 0, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'S', '', '', '', 4, 'fa fa-file', 'Submenu Level_2'),
	(5, 4, 0, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'L', 'site', 'index', '', 5, 'fa fa-file', 'Menu Level_2 A'),
	(6, 4, 0, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'D', '', '', '', 6, '', 'Divider Submenu Level_2'),
	(7, 4, 0, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'L', 'site', 'index', '', 7, '', 'Menu Level_2 C'),
	(8, 4, 0, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'S', 'site', 'index', '', 8, 'fa fa-file', 'Submenu Level_3'),
	(9, 4, 8, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'L', 'site', 'index', '', 9, 'fa fa-file', 'Menu Level_3 A'),
	(10, 4, 8, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'D', '', '', '', 10, '', 'Divider Submenu Level_3'),
	(11, 4, 8, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'L', 'site', 'index', '', 11, 'fa fa-file', 'Menu Level_3 C'),
	(12, 4, 0, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'H', '', '', '', 6, '', 'Header Submenu Level_2'),
	(13, 4, 8, '3ed53fbeb1eab0443561b68ca0c0b5cf', 'app-backend-webapps', 'H', '', '', '', 10, '', 'Header Submenu Level_3'),
	(14, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'branch', 'index', '', 1, 'fa fa-store', 'Branch'),
	(15, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'customer', 'index', '', 2, 'fa fa-store-alt', 'Customer'),
	(16, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'D', '', '', '', 3, '', ''),
	(17, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'H', '', '', '', 4, '', 'Settings'),
	(18, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'S', '', '', '', 5, 'fa fa-user-check', 'User'),
	(19, 18, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'user', 'index', '', 6, 'fa fa-user', 'User'),
	(20, 18, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'user-access', 'control', '', 7, 'fa fa-user-lock', 'User Access'),
	(21, 18, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'user-level', 'index', '', 8, 'fa fa-user-shield', 'User Level'),
	(22, 18, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'user-menu', 'index', '', 9, 'fa fa-user-check', 'User Menu'),
	(23, 18, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'user-type', 'index', '', 10, 'fa fa-user-check', 'User Type'),
	(24, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'S', '', '', '', 11, 'fa fa-desktop', 'Apps'),
	(25, 24, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'app-log', 'index', '', 13, 'fa fa-cog', 'Log'),
	(26, 24, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'app-logd', 'index', '', 14, 'fa fa-cogs', 'Log Database'),
	(27, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'D', '', '', '', 14, '', ''),
	(28, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'system', 'info', '', 15, 'fa fa-info', 'System Info'),
	(29, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'transaction', 'index', '', 3, 'fa fa-reply', 'Transaction'),
	(30, 24, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'app-loga', 'index', '', 13, 'fa fa-cogs', 'Log API'),
	(31, 18, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'user-log', 'index', '', 10, 'fa fa-user-check', 'User Log'),
	(32, 24, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'app-settings', 'index', '', 12, 'fa fa-cogs', 'Settings');

-- Dumping structure for table webapps.user_type
CREATE TABLE IF NOT EXISTS `user_type` (
  `code` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `table` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.user_type: ~2 rows (approximately)
INSERT INTO `user_type` (`code`, `table`) VALUES
	('B', 'branch'),
	('C', 'customer');


-- Dumping database structure for webapps_table
CREATE DATABASE IF NOT EXISTS `webapps_table` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `webapps_table`;

-- Dumping structure for table webapps_table.branch
CREATE TABLE IF NOT EXISTS `branch` (
  `code` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bch_type` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bch_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bch_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps_table.branch: ~1 rows (approximately)
INSERT INTO `branch` (`code`, `bch_type`, `bch_name`, `bch_address`) VALUES
	('BCH001', 'CENTER', 'BRANCH 1', 'Street 1');

-- Dumping structure for table webapps_table.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `code` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `code_branch` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cus_type` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cus_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cus_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`code`),
  KEY `FK_customer_branch` (`code_branch`),
  CONSTRAINT `FK_customer_branch` FOREIGN KEY (`code_branch`) REFERENCES `branch` (`code`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps_table.customer: ~2 rows (approximately)
INSERT INTO `customer` (`code`, `code_branch`, `cus_type`, `cus_name`, `cus_address`) VALUES
	('CUS00001', 'BCH001', 'AGENT', 'CUSTOMER 1', 'Street 1'),
	('CUS00002', 'BCH001', 'AGENT', 'CUSTOMER 2', 'Street 2');

-- Dumping structure for table webapps_table.transaction
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code_customer` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` bigint(20) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps_table.transaction: ~1 rows (approximately)
INSERT INTO `transaction` (`id`, `number`, `code_customer`, `datetime`, `name`, `type`, `value`, `id_user`, `timestamp`) VALUES
	(1, 'TRX00001', 'CUS00001', '2023-05-03 14:43:30', '1', '1', 1000, 2, '2023-05-03 07:43:30');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
