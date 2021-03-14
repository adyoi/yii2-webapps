-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for webapps
CREATE DATABASE IF NOT EXISTS `webapps` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `webapps`;

-- Dumping structure for table webapps.app_log
CREATE TABLE IF NOT EXISTS `app_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `module` varchar(50) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table webapps.app_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `app_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_log` ENABLE KEYS */;

-- Dumping structure for table webapps.app_logd
CREATE TABLE IF NOT EXISTS `app_logd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `table_name` varchar(9999) DEFAULT NULL,
  `update` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table webapps.app_logd: ~0 rows (approximately)
/*!40000 ALTER TABLE `app_logd` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_logd` ENABLE KEYS */;

-- Dumping structure for table webapps.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table webapps.migration: ~3 rows (approximately)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT IGNORE INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1582665882),
	('m130524_201442_init', 1582665886),
	('m190124_110200_add_verification_token_column_to_user_table', 1582665887);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Dumping structure for table webapps.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT IGNORE INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `name`, `image`, `level`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
	(1, 'root', '0AwqpjBTwa9AAv2dih8TPqyZqfuhyla8', '$2y$13$nAKuTfVbllxviIwOczggg.QC2Wove1rZ06LKt3v26Uv6n9As6JuKC', NULL, 'root@root.com', 'The Root', '/images/upload/user/root.jpg', '6fb4f22992a0d164b77267fde5477248', 10, 1582829438, 1586125515, 'aFPU-cKNQjyh2bkekFVImt2RbVI4A_Vy_1582666196'),
	(2, 'admin', '9d5iN9B7AnK7zusmBTJArV8AEbtAWdRJ', '$2y$13$na0oLU.ohHr.KH140vT2y..NjyOkEG9.QM7hPSc5flEMYoCjIn5bu', NULL, 'admin@admin.com', 'Admin', '/images/upload/user/admin.jpg', '6fb4f22992a0d164b77267fde5477248', 10, 1582829973, 1582839032, NULL),
	(3, 'user', 'gylSa9MSAmeHbulXhhFN7flRSMlanoxA', '$2y$13$jq5nJ8QWqcTB7nLT7KTpceIwo2nT7OPBcRsTrspY0MTHo3vq9SSKe', NULL, 'user@user.com', 'User', '/images/upload/user/user.jpg', '2b6cc9c30eaad9c109091ea928529cbd', 10, 1582830712, 1582839057, NULL),
	(4, 'menu', 'fwzIqkFJpXdfGsaYldIT9Bv-Q-57C3ox', '$2y$13$WH8O0Wf4psPSzEjRAStA7ekYoBH98RWLJpfZNlLm//qRyB6004q9C', NULL, 'menu@menu.com', 'Demo Menu', '/images/upload/user/menu.jpg', '3ed53fbeb1eab0443561b68ca0c0b5cf', 10, 1598935611, 1599105578, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table webapps.user_access
CREATE TABLE IF NOT EXISTS `user_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` char(32) NOT NULL,
  `module` varchar(20) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` text NOT NULL,
  `id_stamp` int(11) NOT NULL DEFAULT 0,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table webapps.user_access: ~8 rows (approximately)
/*!40000 ALTER TABLE `user_access` DISABLE KEYS */;
INSERT IGNORE INTO `user_access` (`id`, `level`, `module`, `controller`, `action`, `id_stamp`, `datestamp`, `timestamp`) VALUES
	(1, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-access', '{"control":true,"cekidot":true}', 1, '2020-02-26 13:00:06', '2020-02-28 02:27:33'),
	(2, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-level', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2020-02-26 13:00:06', '2020-09-02 14:17:23'),
	(3, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2020-02-26 13:00:06', '2020-09-02 14:17:23'),
	(4, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'site', '{"index":true,"login":true,"logout":true}', 2, '2020-02-26 13:00:06', '2020-09-02 14:17:23'),
	(5, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'system', '{"info":true}', 2, '2020-02-27 02:10:36', '2020-09-02 14:19:14'),
	(6, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'app-log', '{"index":true,"view":true}', 2, '2020-02-28 03:39:30', '2020-09-02 14:17:23'),
	(7, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'app-logd', '{"index":true,"view":true}', 2, '2020-02-28 03:39:30', '2020-09-02 14:17:23'),
	(8, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-menu', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2020-09-02 14:31:55', '2020-09-02 14:31:55');
/*!40000 ALTER TABLE `user_access` ENABLE KEYS */;

-- Dumping structure for table webapps.user_level
CREATE TABLE IF NOT EXISTS `user_level` (
  `code` char(10) NOT NULL,
  `name` char(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table webapps.user_level: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT IGNORE INTO `user_level` (`code`, `name`) VALUES
	('ADM', 'ADMIN'),
	('MENU', 'MENU'),
	('USR', 'USER');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;

-- Dumping structure for table webapps.user_menu
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Menu',
  `id_sub` int(11) NOT NULL DEFAULT 0 COMMENT 'Submenu Level 1',
  `id_sub2` int(11) NOT NULL DEFAULT 0 COMMENT 'Submenu Level 2',
  `level` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `class` enum('H','D','S','L') NOT NULL DEFAULT 'L',
  `url_controller` varchar(50) DEFAULT NULL,
  `url_view` varchar(50) DEFAULT NULL,
  `url_parameter` varchar(50) DEFAULT NULL COMMENT 'param1=value1,param2=value2',
  `seq` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table webapps.user_menu: ~23 rows (approximately)
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
INSERT IGNORE INTO `user_menu` (`id`, `id_sub`, `id_sub2`, `level`, `module`, `class`, `url_controller`, `url_view`, `url_parameter`, `seq`, `icon`, `name`) VALUES
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
	(14, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'S', '', '', '', 0, 'fa fa-user-check', 'User'),
	(15, 14, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'user', 'index', '', 1, 'fa fa-user', 'User'),
	(16, 14, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'user-access', 'control', '', 2, 'fa fa-user-lock', 'User Access'),
	(17, 14, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'user-level', 'index', '', 3, 'fa fa-user-shield', 'User Level'),
	(18, 14, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'user-menu', 'index', '', 4, 'fa fa-user-check', 'User Menu'),
	(21, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'S', '', '', '', 5, 'fa fa-desktop', 'Apps'),
	(22, 21, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'app-log', 'index', '', 6, 'fa fa-cog', 'Log'),
	(23, 21, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'app-logd', 'index', '', 7, 'fa fa-cogs', 'Log Database'),
	(24, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'D', '', '', '', 8, '', ''),
	(25, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'system', 'info', '', 9, 'fa fa-info', 'System Info');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
