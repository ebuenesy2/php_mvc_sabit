-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 May 2025, 17:21:59
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `site_test`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `surname` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_byId` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_status` int(11) NOT NULL DEFAULT 0,
  `updated_byId` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_status` int(11) NOT NULL DEFAULT 0,
  `deleted_byId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `test`
--

INSERT INTO `test` (`id`, `name`, `surname`, `created_at`, `created_byId`, `updated_at`, `updated_status`, `updated_byId`, `deleted_at`, `deleted_status`, `deleted_byId`) VALUES
(47, 'name', NULL, '2025-05-12 12:58:34', 2, '2025-05-15 05:40:02', 1, 15, NULL, 1, NULL),
(48, 'name', NULL, '2025-05-12 13:01:08', 2, '2025-05-12 14:01:08', 0, 0, NULL, 0, NULL),
(49, 'name deneme', 'surname güncelleme', '2025-05-12 13:13:34', 2, '2025-05-22 11:40:26', 1, 5, NULL, 0, NULL),
(50, 'name', NULL, '2025-05-12 13:16:45', 8, '2025-05-13 07:23:58', 1, 8, NULL, 0, NULL),
(51, 'name', NULL, '2025-05-12 13:22:43', 8, '2025-05-12 14:22:43', 0, 0, NULL, 0, NULL),
(53, 'name', NULL, '2025-05-12 13:24:05', 8, '2025-05-13 06:24:12', 1, 8, NULL, 0, NULL),
(54, 'name', NULL, '2025-05-13 07:18:48', 8, '2025-05-13 08:18:48', 0, 0, NULL, 0, NULL),
(55, 'name güncelle', NULL, '2025-05-13 07:41:11', 1, '2025-05-22 12:30:55', 1, 10, '2025-05-22 12:30:55', 1, 10),
(56, 'name güncelle', NULL, '2025-05-13 09:51:57', 1, '2025-05-22 12:30:55', 1, 10, '2025-05-22 12:30:55', 1, 10),
(57, 'name', NULL, '2025-05-14 10:15:28', 1, '2025-05-14 11:15:28', 0, 0, NULL, 0, NULL),
(58, 'name', NULL, '2025-05-22 04:38:38', 1, '2025-05-22 05:38:38', 0, 0, NULL, 0, NULL),
(59, 'name', NULL, '2025-05-22 04:38:49', 1, '2025-05-22 05:38:49', 0, 0, NULL, 0, NULL),
(60, 'name', NULL, '2025-05-22 04:39:11', 1, '2025-05-22 05:39:11', 0, 0, NULL, 0, NULL),
(61, 'name', NULL, '2025-05-22 04:39:46', 1, '2025-05-22 05:39:46', 0, 0, NULL, 0, NULL),
(62, 'name add', 'surname add', '2025-05-22 04:42:06', 1, '2025-05-22 05:42:06', 0, 0, NULL, 0, NULL),
(63, 'name add', 'surname add', '2025-05-22 04:43:16', 115, '2025-05-22 05:43:16', 0, 0, NULL, 0, NULL),
(70, 'name add', 'surname add', '2025-05-22 12:31:45', 1, '2025-05-22 12:31:45', 0, 0, NULL, 0, NULL),
(72, 'TestName', 'TestSurname', '2025-05-22 13:05:38', 1, '2025-05-22 13:05:38', 0, 0, NULL, 0, NULL),
(73, 'EditedName', 'EditedSurname', '2025-05-22 13:06:47', 1, '2025-05-22 13:06:47', 1, 1, NULL, 0, NULL),
(77, 'EditedName', 'EditedSurname', '2025-05-22 13:12:10', 1, '2025-05-22 13:12:10', 1, 1, NULL, 0, NULL),
(78, 'EditedName', 'EditedSurname', '2025-05-22 13:14:41', 1, '2025-05-22 13:14:41', 1, 1, NULL, 0, NULL),
(79, 'EditedName', 'EditedSurname', '2025-05-22 13:16:40', 1, '2025-05-22 13:16:40', 1, 1, NULL, 0, NULL),
(80, 'EditedName', 'EditedSurname', '2025-05-22 13:17:26', 1, '2025-05-22 13:17:26', 1, 1, NULL, 0, NULL),
(81, 'EditedName', 'EditedSurname', '2025-05-22 13:17:39', 1, '2025-05-22 13:17:40', 1, 1, NULL, 0, NULL),
(82, 'EditedName', 'EditedSurname', '2025-05-22 13:20:43', 1, '2025-05-22 13:20:44', 1, 1, NULL, 0, NULL),
(83, 'EditedName', 'EditedSurname', '2025-05-22 13:22:55', 1, '2025-05-22 13:22:55', 1, 1, NULL, 0, NULL),
(84, 'EditedName', 'EditedSurname', '2025-05-22 13:23:28', 1, '2025-05-22 13:23:28', 1, 1, NULL, 0, NULL),
(85, 'EditedName', 'EditedSurname', '2025-05-22 13:24:48', 1, '2025-05-22 13:24:48', 1, 1, NULL, 0, NULL),
(86, 'EditedName', 'EditedSurname', '2025-05-22 13:25:47', 1, '2025-05-22 13:25:47', 1, 1, NULL, 0, NULL),
(87, 'EditedName', 'EditedSurname', '2025-05-22 13:27:26', 1, '2025-05-22 13:27:26', 1, 1, NULL, 0, NULL),
(88, 'EditedName', 'EditedSurname', '2025-05-22 13:27:30', 1, '2025-05-22 13:27:30', 1, 1, NULL, 0, NULL),
(90, 'EditedName', 'EditedSurname', '2025-05-22 13:28:42', 1, '2025-05-22 13:28:42', 1, 1, NULL, 0, NULL),
(91, 'EditedName', 'EditedSurname', '2025-05-22 13:28:43', 1, '2025-05-22 13:28:43', 1, 1, NULL, 0, NULL),
(92, 'EditedName', 'EditedSurname', '2025-05-22 13:28:44', 1, '2025-05-22 13:28:44', 1, 1, NULL, 0, NULL),
(93, 'EditedName', 'EditedSurname', '2025-05-22 13:28:44', 1, '2025-05-22 13:28:44', 1, 1, NULL, 0, NULL),
(96, 'EditedName', 'EditedSurname', '2025-05-22 13:29:39', 1, '2025-05-22 13:29:39', 1, 1, NULL, 0, NULL),
(97, 'EditedName', 'EditedSurname', '2025-05-22 13:29:52', 1, '2025-05-22 13:29:52', 1, 1, NULL, 0, NULL),
(98, 'EditedName', 'EditedSurname', '2025-05-22 13:29:57', 1, '2025-05-22 13:29:57', 1, 1, NULL, 0, NULL),
(102, 'EditedName', 'EditedSurname', '2025-05-22 13:30:50', 1, '2025-05-22 13:30:50', 1, 1, NULL, 0, NULL),
(103, 'EditedName', 'EditedSurname', '2025-05-22 13:30:59', 1, '2025-05-22 13:30:59', 1, 1, NULL, 0, NULL),
(104, 'EditedName', 'EditedSurname', '2025-05-22 13:31:36', 1, '2025-05-22 13:31:36', 1, 1, NULL, 0, NULL),
(105, 'EditedName', 'EditedSurname', '2025-05-22 13:32:27', 1, '2025-05-22 13:32:27', 1, 1, NULL, 0, NULL),
(106, 'EditedName', 'EditedSurname', '2025-05-22 13:32:53', 1, '2025-05-22 13:32:54', 1, 1, NULL, 0, NULL),
(107, 'EditedName', 'EditedSurname', '2025-05-22 13:33:06', 1, '2025-05-22 13:33:06', 1, 1, NULL, 0, NULL),
(108, 'EditedName', 'EditedSurname', '2025-05-22 13:33:16', 1, '2025-05-22 13:33:16', 1, 1, NULL, 0, NULL),
(109, 'EditedName', 'EditedSurname', '2025-05-22 13:33:36', 1, '2025-05-22 13:33:36', 1, 1, NULL, 0, NULL),
(110, 'EditedName', 'EditedSurname', '2025-05-22 13:34:02', 1, '2025-05-22 13:34:02', 1, 1, NULL, 0, NULL),
(111, 'EditedName', 'EditedSurname', '2025-05-22 13:34:17', 1, '2025-05-22 13:34:17', 1, 1, NULL, 0, NULL),
(112, 'EditedName', 'EditedSurname', '2025-05-22 13:45:28', 1, '2025-05-22 13:45:29', 1, 1, NULL, 0, NULL),
(113, 'EditedName', 'EditedSurname', '2025-05-22 13:46:01', 1, '2025-05-22 13:46:01', 1, 1, NULL, 0, NULL),
(114, 'EditedName', 'EditedSurname', '2025-05-22 13:46:12', 1, '2025-05-22 13:46:12', 1, 1, NULL, 0, NULL),
(115, 'EditedName', 'EditedSurname', '2025-05-22 13:46:30', 1, '2025-05-22 13:46:30', 1, 1, NULL, 0, NULL),
(116, 'EditedName', 'EditedSurname', '2025-05-22 13:46:30', 1, '2025-05-22 13:46:30', 1, 1, NULL, 0, NULL),
(117, 'EditedName', 'EditedSurname', '2025-05-22 13:46:48', 1, '2025-05-22 13:46:48', 1, 1, NULL, 0, NULL),
(118, 'EditedName', 'EditedSurname', '2025-05-22 13:47:17', 1, '2025-05-22 13:47:17', 1, 1, NULL, 0, NULL),
(119, 'EditedName', 'EditedSurname', '2025-05-22 13:47:33', 1, '2025-05-22 13:47:33', 1, 1, NULL, 0, NULL),
(121, 'EditedName', 'EditedSurname', '2025-05-22 13:47:54', 1, '2025-05-22 13:47:54', 1, 1, NULL, 0, NULL),
(122, 'EditedName', 'EditedSurname', '2025-05-22 13:48:09', 1, '2025-05-22 13:48:09', 1, 1, NULL, 0, NULL),
(123, 'EditedName', 'EditedSurname', '2025-05-22 13:48:44', 1, '2025-05-22 13:48:44', 1, 1, NULL, 0, NULL),
(124, 'EditedName', 'EditedSurname', '2025-05-22 13:49:36', 1, '2025-05-22 13:49:36', 1, 1, NULL, 0, NULL),
(125, 'EditedName', 'EditedSurname', '2025-05-22 13:50:50', 1, '2025-05-22 13:50:50', 1, 1, NULL, 0, NULL),
(126, 'EditedName', 'EditedSurname', '2025-05-22 13:52:18', 1, '2025-05-22 13:52:18', 1, 1, NULL, 0, NULL),
(133, 'TestName', 'TestSurname', '2025-05-22 13:55:53', 1, '2025-05-22 13:55:53', 0, 0, NULL, 0, NULL),
(134, 'TestName', 'TestSurname', '2025-05-22 13:56:03', 1, '2025-05-22 13:56:03', 0, 0, NULL, 0, NULL),
(135, 'EditedName', 'EditedSurname', '2025-05-22 13:56:39', 1, '2025-05-22 13:56:39', 1, 1, NULL, 0, NULL),
(138, 'EditedName', 'EditedSurname', '2025-05-22 13:57:53', 1, '2025-05-22 13:57:53', 1, 1, NULL, 0, NULL),
(139, 'EditedName', 'EditedSurname', '2025-05-22 13:58:11', 1, '2025-05-22 13:58:11', 1, 1, NULL, 0, NULL),
(145, 'EditedName', 'EditedSurname', '2025-05-22 14:01:55', 1, '2025-05-22 14:01:55', 1, 1, NULL, 0, NULL),
(146, 'EditedName', 'EditedSurname', '2025-05-22 14:02:13', 1, '2025-05-22 14:02:14', 1, 1, NULL, 0, NULL),
(147, 'EditedName', 'EditedSurname', '2025-05-22 14:02:51', 1, '2025-05-22 14:02:51', 1, 1, NULL, 0, NULL),
(148, 'EditedName', 'EditedSurname', '2025-05-22 14:03:29', 1, '2025-05-22 14:03:29', 1, 1, NULL, 0, NULL),
(149, 'EditedName', 'EditedSurname', '2025-05-22 14:03:45', 1, '2025-05-22 14:03:45', 1, 1, NULL, 0, NULL),
(150, 'EditedName', 'EditedSurname', '2025-05-22 14:03:58', 1, '2025-05-22 14:03:58', 1, 1, NULL, 0, NULL),
(151, 'EditedName', 'EditedSurname', '2025-05-22 14:04:51', 1, '2025-05-22 14:04:51', 1, 1, NULL, 0, NULL),
(152, 'EditedName', 'EditedSurname', '2025-05-22 14:05:12', 1, '2025-05-22 14:05:12', 1, 1, NULL, 0, NULL),
(153, 'EditedName', 'EditedSurname', '2025-05-22 14:06:03', 1, '2025-05-22 14:06:03', 1, 1, NULL, 0, NULL),
(154, 'EditedName', 'EditedSurname', '2025-05-22 14:06:03', 1, '2025-05-22 14:06:04', 1, 1, NULL, 0, NULL),
(155, 'EditedName', 'EditedSurname', '2025-05-22 14:06:11', 1, '2025-05-22 14:06:11', 1, 1, NULL, 0, NULL),
(156, 'EditedName', 'EditedSurname', '2025-05-22 14:06:11', 1, '2025-05-22 14:06:11', 1, 1, NULL, 0, NULL),
(157, 'TestName', 'TestSurname', '2025-05-22 14:32:14', 1, '2025-05-22 14:32:14', 0, 0, NULL, 0, NULL),
(158, 'TestName', 'TestSurname', '2025-05-22 14:32:26', 1, '2025-05-22 14:32:26', 0, 0, NULL, 0, NULL),
(159, 'TestName', 'TestSurname', '2025-05-22 14:32:58', 1, '2025-05-22 14:32:58', 0, 0, NULL, 0, NULL),
(160, 'TestName', 'TestSurname', '2025-05-22 14:33:05', 1, '2025-05-22 14:33:05', 0, 0, NULL, 0, NULL),
(161, 'EditedName', 'EditedSurname', '2025-05-22 15:01:57', 1, '2025-05-22 15:01:57', 1, 1, NULL, 0, NULL),
(162, 'EditedName', 'EditedSurname', '2025-05-22 15:03:26', 1, '2025-05-22 15:03:26', 1, 1, NULL, 0, NULL),
(163, 'EditedName', 'EditedSurname', '2025-05-22 15:04:24', 1, '2025-05-22 15:04:24', 1, 1, NULL, 0, NULL),
(164, 'EditedName', 'EditedSurname', '2025-05-22 15:05:04', 1, '2025-05-22 15:05:04', 1, 1, NULL, 0, NULL),
(165, 'EditedName', 'EditedSurname', '2025-05-22 15:05:16', 1, '2025-05-22 15:05:16', 1, 1, NULL, 0, NULL),
(166, 'EditedName', 'EditedSurname', '2025-05-22 15:05:23', 1, '2025-05-22 15:05:23', 1, 1, NULL, 0, NULL),
(167, 'EditedName', 'EditedSurname', '2025-05-22 15:06:15', 1, '2025-05-22 15:06:15', 1, 1, NULL, 0, NULL),
(168, 'EditedName', 'EditedSurname', '2025-05-22 15:07:44', 1, '2025-05-22 15:07:44', 1, 1, NULL, 0, NULL),
(169, 'EditedName', 'EditedSurname', '2025-05-22 15:07:52', 1, '2025-05-22 15:07:52', 1, 1, NULL, 0, NULL),
(170, 'EditedName', 'EditedSurname', '2025-05-22 15:08:11', 1, '2025-05-22 15:08:11', 1, 1, NULL, 0, NULL),
(171, 'EditedName', 'EditedSurname', '2025-05-22 15:08:30', 1, '2025-05-22 15:08:30', 1, 1, NULL, 0, NULL),
(172, 'EditedName', 'EditedSurname', '2025-05-22 15:09:08', 1, '2025-05-22 15:09:08', 1, 1, NULL, 0, NULL),
(173, 'EditedName', 'EditedSurname', '2025-05-22 15:09:30', 1, '2025-05-22 15:09:30', 1, 1, NULL, 0, NULL),
(174, 'EditedName', 'EditedSurname', '2025-05-22 15:09:33', 1, '2025-05-22 15:09:33', 1, 1, NULL, 0, NULL),
(175, 'EditedName', 'EditedSurname', '2025-05-22 15:11:08', 1, '2025-05-22 15:11:08', 1, 1, NULL, 0, NULL),
(176, 'EditedName', 'EditedSurname', '2025-05-22 15:12:28', 1, '2025-05-22 15:12:28', 1, 1, NULL, 0, NULL),
(177, 'EditedName', 'EditedSurname', '2025-05-22 15:12:46', 1, '2025-05-22 15:12:46', 1, 1, NULL, 0, NULL),
(178, 'EditedName', 'EditedSurname', '2025-05-22 15:16:01', 1, '2025-05-22 15:16:01', 1, 1, NULL, 0, NULL),
(179, 'EditedName', 'EditedSurname', '2025-05-22 15:17:57', 1, '2025-05-22 15:17:57', 1, 1, NULL, 0, NULL),
(180, 'EditedName', 'EditedSurname', '2025-05-22 15:18:14', 1, '2025-05-22 15:18:14', 1, 1, NULL, 0, NULL),
(181, 'EditedName', 'EditedSurname', '2025-05-22 15:18:40', 1, '2025-05-22 15:18:40', 1, 1, NULL, 0, NULL),
(182, 'EditedName', 'EditedSurname', '2025-05-22 15:18:45', 1, '2025-05-22 15:18:45', 1, 1, NULL, 0, NULL),
(183, 'EditedName', 'EditedSurname', '2025-05-22 15:19:44', 1, '2025-05-22 15:19:44', 1, 1, NULL, 0, NULL),
(184, 'EditedName', 'EditedSurname', '2025-05-22 15:21:14', 1, '2025-05-22 15:21:14', 1, 1, NULL, 0, NULL),
(185, 'EditedName', 'EditedSurname', '2025-05-22 15:21:32', 1, '2025-05-22 15:21:32', 1, 1, NULL, 0, NULL),
(186, 'EditedName', 'EditedSurname', '2025-05-22 15:21:44', 1, '2025-05-22 15:21:44', 1, 1, NULL, 0, NULL),
(187, 'EditedName', 'EditedSurname', '2025-05-22 15:24:03', 1, '2025-05-22 15:24:03', 1, 1, NULL, 0, NULL),
(188, 'EditedName', 'EditedSurname', '2025-05-22 15:24:43', 1, '2025-05-22 15:24:43', 1, 1, NULL, 0, NULL),
(189, 'EditedName', 'EditedSurname', '2025-05-23 05:32:16', 1, '2025-05-23 05:32:16', 1, 1, NULL, 0, NULL),
(198, 'TestName 1', 'TestSurname 1', '2025-05-23 05:43:13', 1, '2025-05-23 05:43:13', 0, 0, NULL, 0, NULL),
(200, 'TestName 1', 'TestSurname 1', '2025-05-23 05:44:12', 1, '2025-05-23 05:44:12', 0, 0, NULL, 0, NULL),
(202, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:45:09', 1, '2025-05-23 05:45:09', 0, 0, NULL, 0, NULL),
(203, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:45:09', 1, '2025-05-23 05:45:09', 0, 0, NULL, 0, NULL),
(205, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:46:59', 1, '2025-05-23 05:46:59', 0, 0, NULL, 0, NULL),
(206, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:46:59', 1, '2025-05-23 05:46:59', 0, 0, NULL, 0, NULL),
(208, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:47:13', 1, '2025-05-23 05:47:13', 0, 0, NULL, 0, NULL),
(209, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:47:13', 1, '2025-05-23 05:47:13', 0, 0, NULL, 0, NULL),
(211, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:47:34', 1, '2025-05-23 05:47:34', 0, 0, NULL, 0, NULL),
(212, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:47:34', 1, '2025-05-23 05:47:34', 0, 0, NULL, 0, NULL),
(214, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:47:58', 1, '2025-05-23 05:47:58', 0, 0, NULL, 0, NULL),
(215, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:47:58', 1, '2025-05-23 05:47:58', 0, 0, NULL, 0, NULL),
(217, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:48:28', 1, '2025-05-23 05:48:28', 0, 0, NULL, 0, NULL),
(218, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:48:28', 1, '2025-05-23 05:48:28', 1, 1, '2025-05-23 05:48:28', 1, 1),
(220, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:48:37', 1, '2025-05-23 05:48:37', 0, 0, NULL, 0, NULL),
(221, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:48:37', 1, '2025-05-23 05:48:37', 1, 1, '2025-05-23 05:48:37', 1, 1),
(223, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:49:21', 1, '2025-05-23 05:49:21', 0, 0, NULL, 0, NULL),
(224, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:49:21', 1, '2025-05-23 05:49:21', 1, 1, '2025-05-23 05:49:21', 1, 1),
(226, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:49:52', 1, '2025-05-23 05:49:52', 0, 0, NULL, 0, NULL),
(227, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:49:52', 1, '2025-05-23 05:49:52', 1, 1, '2025-05-23 05:49:52', 1, 1),
(229, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:51:37', 1, '2025-05-23 05:51:37', 0, 0, NULL, 0, NULL),
(230, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:51:37', 1, '2025-05-23 05:51:37', 1, 1, '2025-05-23 05:51:37', 1, 1),
(232, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:52:43', 1, '2025-05-23 05:52:43', 0, 0, NULL, 0, NULL),
(233, 'son', 'TestSurname 2', '2025-05-23 05:52:43', 1, '2025-05-23 05:52:43', 1, 1, '2025-05-23 05:52:43', 1, 1),
(235, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:54:19', 1, '2025-05-23 05:54:19', 0, 0, NULL, 0, NULL),
(236, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:54:19', 1, '2025-05-23 05:54:19', 1, 1, '2025-05-23 05:54:19', 1, 1),
(238, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:54:52', 1, '2025-05-23 05:54:52', 0, 0, NULL, 0, NULL),
(239, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:54:52', 1, '2025-05-23 05:54:52', 1, 1, '2025-05-23 05:54:52', 1, 1),
(241, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:55:00', 1, '2025-05-23 05:55:00', 0, 0, NULL, 0, NULL),
(242, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:55:00', 1, '2025-05-23 05:55:00', 1, 1, '2025-05-23 05:55:00', 1, 1),
(244, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:55:21', 1, '2025-05-23 05:55:21', 0, 0, NULL, 0, NULL),
(245, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:55:21', 1, '2025-05-23 05:55:21', 1, 1, '2025-05-23 05:55:21', 1, 1),
(247, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:55:31', 1, '2025-05-23 05:55:31', 0, 0, NULL, 0, NULL),
(248, 'TestName multi 2', 'TestSurname 2', '2025-05-23 05:55:31', 1, '2025-05-23 05:55:31', 1, 1, '2025-05-23 05:55:31', 1, 1),
(250, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:55:38', 1, '2025-05-23 05:55:38', 0, 0, NULL, 0, NULL),
(253, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:56:42', 1, '2025-05-23 05:56:42', 0, 0, NULL, 0, NULL),
(256, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:57:09', 1, '2025-05-23 05:57:09', 0, 0, NULL, 0, NULL),
(259, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:57:18', 1, '2025-05-23 05:57:18', 0, 0, NULL, 0, NULL),
(262, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:58:04', 1, '2025-05-23 05:58:04', 0, 0, NULL, 0, NULL),
(265, 'TestName multi 1', 'TestSurname 1', '2025-05-23 05:58:54', 1, '2025-05-23 05:58:54', 0, 0, NULL, 0, NULL),
(268, 'TestName multi 1', 'TestSurname 1', '2025-05-23 06:00:07', 1, '2025-05-23 06:00:07', 0, 0, NULL, 0, NULL),
(271, 'TestName multi 1', 'TestSurname 1', '2025-05-23 06:00:51', 1, '2025-05-23 06:00:51', 0, 0, NULL, 0, NULL),
(274, 'TestName multi 1', 'TestSurname 1', '2025-05-23 06:02:21', 1, '2025-05-23 06:02:21', 0, 0, NULL, 0, NULL),
(277, 'TestName multi 1', 'TestSurname 1', '2025-05-23 06:02:40', 1, '2025-05-23 06:02:40', 0, 0, NULL, 0, NULL),
(280, 'TestName multi 1', 'TestSurname 1', '2025-05-23 06:05:41', 1, '2025-05-23 06:05:41', 0, 0, NULL, 0, NULL),
(283, 'TestName multi 1', 'TestSurname 1', '2025-05-23 13:36:09', 1, '2025-05-23 13:36:09', 0, 0, NULL, 0, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
