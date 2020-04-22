-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for webapps
CREATE DATABASE IF NOT EXISTS `webapps` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `webapps`;

-- Dumping structure for table webapps.app_log
CREATE TABLE IF NOT EXISTS `app_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `module` varchar(50) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

-- Dumping data for table webapps.app_log: ~40 rows (approximately)
/*!40000 ALTER TABLE `app_log` DISABLE KEYS */;
INSERT IGNORE INTO `app_log` (`id`, `id_user`, `module`, `activity`, `timestamp`) VALUES
	(33, 1, 'app-backend-webapps/app-log', 'index', '2020-02-28 05:33:35'),
	(34, 1, 'app-backend-webapps/app-logd', 'index', '2020-02-28 05:34:06'),
	(35, 1, 'app-backend-webapps/user', 'index', '2020-02-29 06:18:19'),
	(36, 1, 'app-backend-webapps/user-level', 'index', '2020-02-29 06:18:28'),
	(37, 1, 'app-backend-webapps/user-access', 'control', '2020-02-29 06:18:36'),
	(38, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:19:05'),
	(39, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:19:32'),
	(40, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:22:42'),
	(41, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:30:20'),
	(42, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:35:13'),
	(43, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:36:47'),
	(44, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:37:53'),
	(45, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:38:15'),
	(46, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:39:44'),
	(47, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:41:43'),
	(48, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:43:07'),
	(49, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:43:28'),
	(50, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:44:11'),
	(51, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:53:02'),
	(52, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:55:35'),
	(53, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 06:57:37'),
	(54, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 07:02:10'),
	(55, 1, 'app-backend-webapps/app-log', 'index', '2020-02-29 18:08:53'),
	(56, 1, 'app-backend-webapps/user', 'index', '2020-03-06 00:37:10'),
	(57, 1, 'app-backend-webapps/user', 'update', '2020-03-06 00:37:16'),
	(58, 1, 'app-backend-webapps/user', 'index', '2020-03-06 00:45:44'),
	(59, 1, 'app-backend-webapps/user-level', 'index', '2020-03-06 00:45:53'),
	(60, 1, 'app-backend-webapps/user-access', 'control', '2020-03-06 00:45:57'),
	(61, 1, 'app-backend-webapps/user-access', 'control', '2020-03-06 00:46:04'),
	(62, 1, 'app-backend-webapps/user', 'index', '2020-03-06 00:47:05'),
	(63, 1, 'app-backend-webapps/user', 'index', '2020-03-06 00:47:14'),
	(64, 1, 'app-backend-webapps/user', 'index', '2020-03-06 00:47:20'),
	(65, 1, 'app-backend-webapps/user', 'index', '2020-03-06 00:47:25'),
	(66, 1, 'app-backend-webapps/user', 'index', '2020-03-06 00:49:28'),
	(67, 3, 'app-backend-webapps/system', 'info', '2020-04-06 05:23:41'),
	(68, 2, 'app-backend-webapps/system', 'info', '2020-04-06 05:24:20'),
	(69, 2, 'app-backend-webapps/user', 'index', '2020-04-06 05:24:28'),
	(70, 2, 'app-backend-webapps/user', 'index', '2020-04-06 05:24:58'),
	(71, 2, 'app-backend-webapps/user', 'update', '2020-04-06 05:25:03'),
	(72, 2, 'app-backend-webapps/user', 'update', '2020-04-06 05:25:15'),
	(73, 2, 'app-backend-webapps/user', 'view', '2020-04-06 05:25:18'),
	(74, 2, 'app-backend-webapps/user', 'update', '2020-04-06 05:25:31'),
	(75, 1, 'app-backend-webapps/system', 'info', '2020-04-11 08:28:00'),
	(76, 1, 'app-backend-webapps/app-logd', 'index', '2020-04-12 07:14:40'),
	(77, 1, 'app-backend-webapps/app-log', 'index', '2020-04-12 07:14:48'),
	(78, 1, 'app-backend-webapps/app-log', 'index', '2020-04-12 07:15:07'),
	(79, 1, 'app-backend-webapps/app-log', 'index', '2020-04-12 07:15:14'),
	(80, 1, 'app-backend-webapps/app-log', 'index', '2020-04-12 12:43:26'),
	(81, 1, 'app-backend-webapps/app-log', 'index', '2020-04-12 12:43:45'),
	(82, 1, 'app-backend-webapps/app-log', 'index', '2020-04-13 08:32:55');
/*!40000 ALTER TABLE `app_log` ENABLE KEYS */;

-- Dumping structure for table webapps.app_logd
CREATE TABLE IF NOT EXISTS `app_logd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `table_name` varchar(50) DEFAULT NULL,
  `update` longtext,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table webapps.app_logd: ~2 rows (approximately)
/*!40000 ALTER TABLE `app_logd` DISABLE KEYS */;
INSERT IGNORE INTO `app_logd` (`id`, `id_user`, `table_name`, `update`, `timestamp`) VALUES
	(4, 1, 'user/update', '{"username":"admin","password":"admin","password_repeat":"admin","email":"admin@admin.com","name":"Admin","level":"6fb4f22992a0d164b77267fde5477248","status":"10","image":""}', '2020-02-28 04:30:33'),
	(5, 1, 'user/update', '{"username":"user","password":"user","password_repeat":"user","email":"user@user.com","name":"User","level":"2b6cc9c30eaad9c109091ea928529cbd","status":"10","image":""}', '2020-02-28 04:30:58'),
	(6, 2, 'user/update', '{"username":"root","password":"root","password_repeat":"root","email":"root@root.com","name":"The Root","level":"6fb4f22992a0d164b77267fde5477248","status":"10","image":""}', '2020-04-06 05:25:17');
/*!40000 ALTER TABLE `app_logd` ENABLE KEYS */;

-- Dumping structure for table webapps.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table webapps.migration: ~2 rows (approximately)
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
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT IGNORE INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `name`, `image`, `level`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
	(1, 'root', '0AwqpjBTwa9AAv2dih8TPqyZqfuhyla8', '$2y$13$nAKuTfVbllxviIwOczggg.QC2Wove1rZ06LKt3v26Uv6n9As6JuKC', NULL, 'root@root.com', 'The Root', '/images/upload/user/root.jpg', '6fb4f22992a0d164b77267fde5477248', 10, 1582829438, 1586125515, 'aFPU-cKNQjyh2bkekFVImt2RbVI4A_Vy_1582666196'),
	(2, 'admin', '9d5iN9B7AnK7zusmBTJArV8AEbtAWdRJ', '$2y$13$na0oLU.ohHr.KH140vT2y..NjyOkEG9.QM7hPSc5flEMYoCjIn5bu', NULL, 'admin@admin.com', 'Admin', '/images/upload/user/admin.jpg', '6fb4f22992a0d164b77267fde5477248', 10, 1582829973, 1582839032, NULL),
	(3, 'user', 'gylSa9MSAmeHbulXhhFN7flRSMlanoxA', '$2y$13$jq5nJ8QWqcTB7nLT7KTpceIwo2nT7OPBcRsTrspY0MTHo3vq9SSKe', NULL, 'user@user.com', 'User', '/images/upload/user/user.jpg', '2b6cc9c30eaad9c109091ea928529cbd', 10, 1582830712, 1582839057, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table webapps.user_access
CREATE TABLE IF NOT EXISTS `user_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` char(32) NOT NULL,
  `module` varchar(20) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` text NOT NULL,
  `id_stamp` int(11) NOT NULL DEFAULT '0',
  `datestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table webapps.user_access: ~7 rows (approximately)
/*!40000 ALTER TABLE `user_access` DISABLE KEYS */;
INSERT IGNORE INTO `user_access` (`id`, `level`, `module`, `controller`, `action`, `id_stamp`, `datestamp`, `timestamp`) VALUES
	(1, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-access', '{"control":true,"cekidot":true}', 1, '2020-02-26 13:00:06', '2020-02-28 02:27:33'),
	(2, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-level', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 1, '2020-02-26 13:00:06', '2020-02-28 02:27:35'),
	(3, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 1, '2020-02-26 13:00:06', '2020-02-28 02:27:35'),
	(4, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'site', '{"index":true,"login":true,"logout":true}', 1, '2020-02-26 13:00:06', '2020-02-28 02:27:36'),
	(5, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'system', '{"info":true}', 1, '2020-02-27 02:10:36', '2020-02-28 02:27:38'),
	(6, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'app-log', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 1, '2020-02-28 03:39:30', '2020-02-28 03:39:30'),
	(7, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'app-logd', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 1, '2020-02-28 03:39:30', '2020-02-28 03:39:30');
/*!40000 ALTER TABLE `user_access` ENABLE KEYS */;

-- Dumping structure for table webapps.user_level
CREATE TABLE IF NOT EXISTS `user_level` (
  `code` char(10) NOT NULL,
  `name` char(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table webapps.user_level: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT IGNORE INTO `user_level` (`code`, `name`) VALUES
	('ADM', 'ADMIN'),
	('ANON', 'ANONYMOUS'),
	('USR', 'USER');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;

-- Dumping structure for table webapps.user_menu
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Menu',
  `id_sub` int(11) NOT NULL DEFAULT '0' COMMENT 'Submenu Level 1',
  `id_sub2` int(11) NOT NULL DEFAULT '0' COMMENT 'Submenu Level 2',
  `level` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `class` enum('H','D','S','L') NOT NULL DEFAULT 'L',
  `url_controller` varchar(50) DEFAULT NULL,
  `url_view` varchar(50) DEFAULT NULL,
  `url_parameter` varchar(50) DEFAULT NULL COMMENT 'param1=value1,param2=value2',
  `seq` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table webapps.user_menu: ~1 rows (approximately)
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
INSERT IGNORE INTO `user_menu` (`id`, `id_sub`, `id_sub2`, `level`, `module`, `class`, `url_controller`, `url_view`, `url_parameter`, `seq`, `icon`, `name`) VALUES
	(1, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'site', 'index', '', 1, 'icon-alert-octagon', 'Link'),
	(2, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'D', '', '', '', 2, '', 'Divider'),
	(3, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'H', '', '', '', 3, '', 'Header'),
	(4, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'S', '', '', '', 4, 'icon-alert-octagon', 'Submenu Level_2'),
	(5, 4, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'site', 'index', '', 5, '', 'Menu Level_2 A'),
	(6, 4, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'D', '', '', '', 6, '', 'Divider Submenu Level_2'),
	(7, 4, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'site', 'index', '', 7, '', 'Menu Level_2 C'),
	(8, 4, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'S', 'site', 'index', '', 8, 'icon-alert-octagon', 'Submenu Level_3'),
	(9, 4, 8, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'site', 'index', '', 9, '', 'Menu Level_3 A'),
	(10, 4, 8, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'D', '', '', '', 10, '', 'Divider Submenu Level_3'),
	(11, 4, 8, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'site', 'index', '', 11, '', 'Menu Level_3 C'),
	(12, 4, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'H', '', '', '', 6, '', 'Header Submenu Level_2'),
	(13, 4, 8, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'H', '', '', '', 10, '', 'Header Submenu Level_3');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
