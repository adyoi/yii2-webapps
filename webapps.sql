-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6426
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
CREATE DATABASE IF NOT EXISTS `webapps` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `webapps`;

-- Dumping structure for table webapps.app_log
CREATE TABLE IF NOT EXISTS `app_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `module` varchar(50) CHARACTER SET latin1 NOT NULL,
  `activity` varchar(50) CHARACTER SET latin1 NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.app_log: ~157 rows (approximately)
REPLACE INTO `app_log` (`id`, `id_user`, `module`, `activity`, `timestamp`) VALUES
	(1, 2, 'app-backend-webapps/system', 'info', '2022-02-28 13:30:57'),
	(2, 2, 'app-backend-webapps/system', 'info', '2022-02-28 13:31:17'),
	(3, 2, 'app-backend-webapps/system', 'info', '2022-02-28 13:32:21'),
	(4, 2, 'app-backend-webapps/system', 'info', '2022-02-28 13:32:52'),
	(5, 2, 'app-backend-webapps/system', 'info', '2022-02-28 13:33:12'),
	(6, 2, 'app-backend-webapps/system', 'info', '2022-02-28 13:37:16'),
	(7, 2, 'app-backend-webapps/system', 'info', '2022-02-28 13:37:44'),
	(8, 2, 'app-backend-webapps/system', 'info', '2022-02-28 13:38:05'),
	(9, 2, 'app-backend-webapps/system', 'info', '2022-02-28 13:38:39'),
	(10, 2, 'app-backend-webapps/user-menu', 'index', '2022-02-28 13:38:52'),
	(11, 2, 'app-backend-webapps/user-menu', 'update', '2022-02-28 13:38:57'),
	(12, 2, 'app-backend-webapps/user-menu', 'update', '2022-02-28 13:39:17'),
	(13, 2, 'app-backend-webapps/user-menu', 'view', '2022-02-28 13:39:17'),
	(14, 2, 'app-backend-webapps/user-menu', 'update', '2022-02-28 13:39:27'),
	(15, 2, 'app-backend-webapps/user-menu', 'index', '2022-02-28 13:39:30'),
	(16, 2, 'app-backend-webapps/user-menu', 'update', '2022-02-28 13:39:35'),
	(17, 2, 'app-backend-webapps/user-menu', 'update', '2022-02-28 13:39:52'),
	(18, 2, 'app-backend-webapps/user-menu', 'view', '2022-02-28 13:39:52'),
	(19, 2, 'app-backend-webapps/user-menu', 'index', '2022-02-28 13:39:57'),
	(20, 2, 'app-backend-webapps/user-menu', 'index', '2022-02-28 13:40:15'),
	(21, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 13:40:18'),
	(22, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 13:42:11'),
	(23, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 13:43:13'),
	(24, 2, 'app-backend-webapps/system', 'info', '2022-02-28 13:43:27'),
	(25, 2, 'app-backend-webapps/user', 'index', '2022-02-28 13:43:35'),
	(26, 2, 'app-backend-webapps/user-access', 'control', '2022-02-28 13:43:44'),
	(27, 2, 'app-backend-webapps/user', 'index', '2022-02-28 13:43:50'),
	(28, 2, 'app-backend-webapps/user', 'index', '2022-02-28 13:43:52'),
	(29, 2, 'app-backend-webapps/user', 'index', '2022-02-28 13:45:06'),
	(30, 2, 'app-backend-webapps/user', 'index', '2022-02-28 13:45:16'),
	(31, 2, 'app-backend-webapps/user', 'index', '2022-02-28 13:47:40'),
	(32, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:07:46'),
	(33, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:09:56'),
	(34, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:10:08'),
	(35, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:10:58'),
	(36, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:11:20'),
	(37, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:11:46'),
	(38, 2, 'app-backend-webapps/user-access', 'control', '2022-02-28 14:12:20'),
	(39, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 14:12:24'),
	(40, 2, 'app-backend-webapps/user-level', 'create', '2022-02-28 14:12:33'),
	(41, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 14:12:35'),
	(42, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 14:13:41'),
	(43, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 14:14:54'),
	(44, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 14:14:57'),
	(45, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 14:15:20'),
	(46, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 14:15:28'),
	(47, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 14:16:00'),
	(48, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:16:02'),
	(49, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:16:36'),
	(50, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:17:07'),
	(51, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:17:31'),
	(52, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:18:41'),
	(53, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:20:13'),
	(54, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:20:35'),
	(55, 2, 'app-backend-webapps/user', 'create', '2022-02-28 14:20:36'),
	(56, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:54:17'),
	(57, 2, 'app-backend-webapps/system', 'info', '2022-02-28 14:58:05'),
	(58, 2, 'app-backend-webapps/app-log', 'index', '2022-02-28 14:58:10'),
	(59, 2, 'app-backend-webapps/app-logd', 'index', '2022-02-28 14:58:11'),
	(60, 2, 'app-backend-webapps/user', 'index', '2022-02-28 14:58:13'),
	(61, 2, 'app-backend-webapps/user-access', 'control', '2022-02-28 14:58:15'),
	(62, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 14:58:17'),
	(63, 2, 'app-backend-webapps/user-menu', 'index', '2022-02-28 14:58:18'),
	(64, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:01:14'),
	(65, 2, 'app-backend-webapps/user', 'create', '2022-02-28 15:01:21'),
	(66, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:06:20'),
	(67, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:06:21'),
	(68, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:06:26'),
	(69, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:07:12'),
	(70, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:07:14'),
	(71, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:07:15'),
	(72, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:07:19'),
	(73, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:09:12'),
	(74, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:10:20'),
	(75, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:10:38'),
	(76, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:10:42'),
	(77, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:10:43'),
	(78, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:10:43'),
	(79, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:10:57'),
	(80, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:10:58'),
	(81, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:11:05'),
	(82, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:11:14'),
	(83, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:11:30'),
	(84, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:11:31'),
	(85, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:11:43'),
	(86, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:11:45'),
	(87, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:11:49'),
	(88, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:11:54'),
	(89, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:12:18'),
	(90, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:12:25'),
	(91, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:12:30'),
	(92, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:12:32'),
	(93, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:12:36'),
	(94, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:12:41'),
	(95, 2, 'app-backend-webapps/user-access', 'control', '2022-02-28 15:12:41'),
	(96, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 15:12:42'),
	(97, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:12:43'),
	(98, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:12:43'),
	(99, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:12:45'),
	(100, 2, 'app-backend-webapps/user-access', 'control', '2022-02-28 15:13:03'),
	(101, 2, 'app-backend-webapps/user-menu', 'index', '2022-02-28 15:13:05'),
	(102, 2, 'app-backend-webapps/user-menu', 'view', '2022-02-28 15:13:08'),
	(103, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:13:11'),
	(104, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:13:13'),
	(105, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:13:16'),
	(106, 2, 'app-backend-webapps/user-access', 'control', '2022-02-28 15:13:21'),
	(107, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 15:13:22'),
	(108, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 15:13:52'),
	(109, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:13:53'),
	(110, 2, 'app-backend-webapps/user-access', 'control', '2022-02-28 15:13:57'),
	(111, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 15:13:59'),
	(112, 2, 'app-backend-webapps/user-menu', 'index', '2022-02-28 15:14:04'),
	(113, 2, 'app-backend-webapps/user-menu', 'view', '2022-02-28 15:14:10'),
	(114, 2, 'app-backend-webapps/user-menu', 'view', '2022-02-28 15:14:18'),
	(115, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:14:20'),
	(116, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:14:22'),
	(117, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:15:20'),
	(118, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:16:24'),
	(119, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:16:48'),
	(120, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:16:57'),
	(121, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:16:59'),
	(122, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:17:02'),
	(123, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:17:30'),
	(124, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:17:32'),
	(125, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:17:41'),
	(126, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:19:08'),
	(127, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:19:11'),
	(128, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:19:13'),
	(129, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:19:15'),
	(130, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:19:19'),
	(131, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:19:21'),
	(132, 2, 'app-backend-webapps/app-log', 'index', '2022-02-28 15:20:32'),
	(133, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:31:00'),
	(134, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:31:04'),
	(135, 2, 'app-backend-webapps/user-access', 'control', '2022-02-28 15:31:45'),
	(136, 2, 'app-backend-webapps/user-level', 'index', '2022-02-28 15:31:47'),
	(137, 2, 'app-backend-webapps/user-level', 'create', '2022-02-28 15:31:49'),
	(138, 2, 'app-backend-webapps/system', 'info', '2022-02-28 15:31:55'),
	(139, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:37:41'),
	(140, 2, 'app-backend-webapps/user', 'create', '2022-02-28 15:37:42'),
	(141, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:38:04'),
	(142, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:38:08'),
	(143, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:38:10'),
	(144, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:38:23'),
	(145, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:38:23'),
	(146, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:38:28'),
	(147, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:38:45'),
	(148, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:38:47'),
	(149, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:38:49'),
	(150, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:39:01'),
	(151, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:39:02'),
	(152, 2, 'app-backend-webapps/user', 'update', '2022-02-28 15:39:07'),
	(153, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:39:29'),
	(154, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:39:33'),
	(155, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:39:36'),
	(156, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:39:39'),
	(157, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:39:41'),
	(158, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:39:45'),
	(159, 2, 'app-backend-webapps/user', 'view', '2022-02-28 15:39:47'),
	(160, 2, 'app-backend-webapps/app-log', 'index', '2022-02-28 15:40:23'),
	(161, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:40:25'),
	(162, 2, 'app-backend-webapps/user', 'index', '2022-02-28 15:57:47'),
	(163, 2, 'app-backend-webapps/user', 'create', '2022-02-28 15:57:49'),
	(164, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:03:25'),
	(165, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:07:19'),
	(166, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:08:58'),
	(167, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:09:25'),
	(168, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:20:34'),
	(169, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:21:43'),
	(170, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:22:34'),
	(171, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:23:15'),
	(172, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:24:03'),
	(173, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:24:37'),
	(174, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:26:05'),
	(175, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:27:25'),
	(176, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:27:56'),
	(177, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:30:26'),
	(178, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:30:59'),
	(179, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:31:46'),
	(180, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:31:56'),
	(181, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:32:31'),
	(182, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:33:32'),
	(183, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:34:23'),
	(184, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:35:32'),
	(185, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:37:36'),
	(186, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:38:46'),
	(187, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:39:56'),
	(188, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:40:41'),
	(189, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:41:29'),
	(190, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:42:40'),
	(191, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:43:09'),
	(192, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:47:41'),
	(193, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:48:34'),
	(194, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:49:53'),
	(195, 2, 'app-backend-webapps/user', 'create', '2022-02-28 16:50:33'),
	(196, 2, 'app-backend-webapps/user-access', 'control', '2022-02-28 16:52:31'),
	(197, 2, 'app-backend-webapps/user-menu', 'index', '2022-02-28 16:52:38'),
	(198, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 16:52:40'),
	(199, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 16:53:48'),
	(200, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 16:54:24'),
	(201, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 16:55:19'),
	(202, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 16:55:42'),
	(203, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 16:56:30'),
	(204, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 16:59:16'),
	(205, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:01:16'),
	(206, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:01:48'),
	(207, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:14:41'),
	(208, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:15:57'),
	(209, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:17:03'),
	(210, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:17:32'),
	(211, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:20:58'),
	(212, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:21:41'),
	(213, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:22:38'),
	(214, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:24:57'),
	(215, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:26:12'),
	(216, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:28:12'),
	(217, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:28:38'),
	(218, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:29:16'),
	(219, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:29:32'),
	(220, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:32:00'),
	(221, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:33:42'),
	(222, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:34:20'),
	(223, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:35:12'),
	(224, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:35:59'),
	(225, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:36:07'),
	(226, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:38:51'),
	(227, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:41:17'),
	(228, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:41:55'),
	(229, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:42:32'),
	(230, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:43:16'),
	(231, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:45:01'),
	(232, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:45:11'),
	(233, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:46:52'),
	(234, 2, 'app-backend-webapps/user', 'view', '2022-02-28 17:49:18'),
	(235, 2, 'app-backend-webapps/user', 'update', '2022-02-28 17:49:25'),
	(236, 2, 'app-backend-webapps/user-menu', 'index', '2022-02-28 17:49:56'),
	(237, 2, 'app-backend-webapps/user-menu', 'create', '2022-02-28 17:49:57');

-- Dumping structure for table webapps.app_logd
CREATE TABLE IF NOT EXISTS `app_logd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `table_name` varchar(9999) CHARACTER SET latin1 DEFAULT NULL,
  `update` text CHARACTER SET latin1 DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.app_logd: ~2 rows (approximately)
REPLACE INTO `app_logd` (`id`, `id_user`, `table_name`, `update`, `timestamp`) VALUES
	(1, 2, 'user/update', '{"type":"B","code":"BCH001","username":"menu","password":"menu","password_repeat":"menu","level":"3ed53fbeb1eab0443561b68ca0c0b5cf","email":"menu@menu.com","name":"Demo Menu","status":"9","image":""}', '2022-02-28 15:38:23'),
	(2, 2, 'user/update', '{"type":"B","code":"BCH001","username":"menu","password":"menu","password_repeat":"menu","level":"3ed53fbeb1eab0443561b68ca0c0b5cf","email":"menu@menu.com","name":"Demo Menu","status":"10","image":""}', '2022-02-28 15:39:02');

-- Dumping structure for table webapps.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) CHARACTER SET latin1 NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.migration: ~3 rows (approximately)
REPLACE INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1582665882),
	('m130524_201442_init', 1582665886),
	('m190124_110200_add_verification_token_column_to_user_table', 1582665887);

-- Dumping structure for table webapps.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `code` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
REPLACE INTO `user` (`id`, `type`, `code`, `level`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `name`, `image`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
	(1, 'B', 'BCH001', '6fb4f22992a0d164b77267fde5477248', 'root', '0AwqpjBTwa9AAv2dih8TPqyZqfuhyla8', '$2y$13$nAKuTfVbllxviIwOczggg.QC2Wove1rZ06LKt3v26Uv6n9As6JuKC', NULL, 'root@root.com', 'The Root', '/images/upload/user/root.jpg', 10, 1582829438, 1586125515, 'aFPU-cKNQjyh2bkekFVImt2RbVI4A_Vy_1582666196'),
	(2, 'B', 'BCH001', '6fb4f22992a0d164b77267fde5477248', 'admin', '9d5iN9B7AnK7zusmBTJArV8AEbtAWdRJ', '$2y$13$na0oLU.ohHr.KH140vT2y..NjyOkEG9.QM7hPSc5flEMYoCjIn5bu', NULL, 'admin@admin.com', 'Admin', '/images/upload/user/admin.jpg', 10, 1582829973, 1582839032, NULL),
	(3, 'B', 'BCH001', '2b6cc9c30eaad9c109091ea928529cbd', 'user', 'gylSa9MSAmeHbulXhhFN7flRSMlanoxA', '$2y$13$jq5nJ8QWqcTB7nLT7KTpceIwo2nT7OPBcRsTrspY0MTHo3vq9SSKe', NULL, 'user@user.com', 'User', '/images/upload/user/user.jpg', 10, 1582830712, 1582839057, NULL),
	(4, 'B', 'BCH001', '3ed53fbeb1eab0443561b68ca0c0b5cf', 'menu', 'F_znQaWZQIDQ6uO-dgSk4YqVglt7Rkb5', '$2y$13$ZWRKAATXpkYNfAM8u1kOeOGXn1YY6em4XEeNP3sHN576DTCbWgzY6', NULL, 'menu@menu.com', 'Demo Menu', '/images/upload/user/menu.jpg', 10, 1598935611, 1646062741, NULL);

-- Dumping structure for table webapps.user_access
CREATE TABLE IF NOT EXISTS `user_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` char(32) CHARACTER SET latin1 NOT NULL,
  `module` varchar(20) CHARACTER SET latin1 NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 NOT NULL,
  `action` text CHARACTER SET latin1 NOT NULL,
  `id_stamp` int(11) NOT NULL DEFAULT 0,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.user_access: ~10 rows (approximately)
REPLACE INTO `user_access` (`id`, `level`, `module`, `controller`, `action`, `id_stamp`, `datestamp`, `timestamp`) VALUES
	(1, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-access', '{"control":true,"cekidot":true}', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-level', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '0000-00-00 00:00:00', '2022-02-28 13:15:05'),
	(3, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '0000-00-00 00:00:00', '2022-02-28 13:15:05'),
	(4, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'site', '{"index":true,"login":true,"logout":true}', 2, '0000-00-00 00:00:00', '2022-02-28 13:15:05'),
	(5, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'system', '{"info":true}', 2, '0000-00-00 00:00:00', '2022-02-28 13:15:05'),
	(6, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'app-log', '{"index":true,"view":true}', 2, '0000-00-00 00:00:00', '2022-02-28 13:15:05'),
	(7, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'app-logd', '{"index":true,"view":true}', 2, '0000-00-00 00:00:00', '2022-02-28 13:15:05'),
	(8, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-menu', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '0000-00-00 00:00:00', '2022-02-28 13:15:05'),
	(9, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'user-type', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2022-02-28 19:59:42', '2022-02-28 13:15:21'),
	(10, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'branch', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2022-02-28 20:06:38', '2022-02-28 13:15:05'),
	(11, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'customer', '{"index":true,"view":true,"create":true,"update":true,"delete":true}', 2, '2022-02-28 20:06:38', '2022-02-28 13:15:05');

-- Dumping structure for table webapps.user_level
CREATE TABLE IF NOT EXISTS `user_level` (
  `code` char(10) CHARACTER SET latin1 NOT NULL,
  `type` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.user_level: ~5 rows (approximately)
REPLACE INTO `user_level` (`code`, `type`, `name`) VALUES
	('ADM', 'B', 'ADMIN'),
	('API', 'B', 'API'),
	('MENU', 'B', 'MENU'),
	('USR', 'B', 'USER'),
	('USRC', 'C', 'USER');

-- Dumping structure for table webapps.user_menu
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Menu',
  `id_sub` int(11) NOT NULL DEFAULT 0 COMMENT 'Submenu Level 1',
  `id_sub2` int(11) NOT NULL DEFAULT 0 COMMENT 'Submenu Level 2',
  `level` varchar(50) CHARACTER SET latin1 NOT NULL,
  `module` varchar(50) CHARACTER SET latin1 NOT NULL,
  `class` enum('H','D','S','L') CHARACTER SET latin1 NOT NULL DEFAULT 'L',
  `url_controller` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `url_view` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `url_parameter` varchar(50) CHARACTER SET latin1 DEFAULT NULL COMMENT 'param1=value1,param2=value2',
  `seq` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.user_menu: ~28 rows (approximately)
REPLACE INTO `user_menu` (`id`, `id_sub`, `id_sub2`, `level`, `module`, `class`, `url_controller`, `url_view`, `url_parameter`, `seq`, `icon`, `name`) VALUES
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
	(25, 24, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'app-log', 'index', '', 12, 'fa fa-cog', 'Log'),
	(26, 24, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'app-logd', 'index', '', 13, 'fa fa-cogs', 'Log Database'),
	(27, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'D', '', '', '', 14, '', ''),
	(28, 0, 0, '6fb4f22992a0d164b77267fde5477248', 'app-backend-webapps', 'L', 'system', 'info', '', 15, 'fa fa-info', 'System Info');

-- Dumping structure for table webapps.user_type
CREATE TABLE IF NOT EXISTS `user_type` (
  `code` char(2) CHARACTER SET latin1 NOT NULL,
  `table` char(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps.user_type: ~2 rows (approximately)
REPLACE INTO `user_type` (`code`, `table`) VALUES
	('B', 'branch'),
	('C', 'customer');


-- Dumping database structure for webapps_table
CREATE DATABASE IF NOT EXISTS `webapps_table` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `webapps_table`;

-- Dumping structure for table webapps_table.branch
CREATE TABLE IF NOT EXISTS `branch` (
  `code` char(50) CHARACTER SET latin1 NOT NULL,
  `bch_type` char(50) CHARACTER SET latin1 NOT NULL,
  `bch_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `bch_address` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps_table.branch: ~1 rows (approximately)
REPLACE INTO `branch` (`code`, `bch_type`, `bch_name`, `bch_address`) VALUES
	('BCH001', 'CENTER', 'BRANCH 1', 'Street 1');

-- Dumping structure for table webapps_table.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `code` char(50) CHARACTER SET latin1 NOT NULL,
  `code_branch` char(50) CHARACTER SET latin1 NOT NULL,
  `cus_type` char(50) CHARACTER SET latin1 NOT NULL,
  `cus_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `cus_address` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`code`),
  KEY `FK_customer_branch` (`code_branch`),
  CONSTRAINT `FK_customer_branch` FOREIGN KEY (`code_branch`) REFERENCES `branch` (`code`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webapps_table.customer: ~2 rows (approximately)
REPLACE INTO `customer` (`code`, `code_branch`, `cus_type`, `cus_name`, `cus_address`) VALUES
	('CUS00001', 'BCH001', 'AGENT', 'CUSTOMER 1', 'Street 1'),
	('CUS00002', 'BCH001', 'AGENT', 'CUSTOMER 2', 'Street 2');

-- Dumping structure for table webapps_table.transaction
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_branch` char(20) NOT NULL,
  `code_customer` char(20) NOT NULL,
  `datetime` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` char(50) NOT NULL,
  `value` bigint(20) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table webapps_table.transaction: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
