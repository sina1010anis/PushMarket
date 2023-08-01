-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 04:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pushmarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `setings`
--

CREATE TABLE `setings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setings`
--

INSERT INTO `setings` (`id`, `type`, `status`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'win_cashire', '1', NULL, NULL, '2020-10-03 20:30:00', '2023-07-29 04:19:58'),
(2, 'unit', '0', NULL, NULL, '2020-10-03 20:30:00', '2023-07-31 10:03:12'),
(3, 'menu_cashire_1', '1', NULL, NULL, '2020-10-03 20:30:00', '2023-07-26 03:24:58'),
(4, 'menu_cashire_2', '1', NULL, NULL, '2020-10-30 20:30:00', '2023-07-26 03:24:56'),
(5, 'menu_cashire_3', '1', NULL, NULL, '2020-10-03 20:30:00', '2023-07-26 03:24:53'),
(6, 'menu_cashire_4', '1', NULL, NULL, '2020-10-03 20:30:00', '2023-07-26 03:24:51'),
(7, 'menu_store', '1', NULL, NULL, '2020-10-03 20:30:00', '2023-07-29 04:10:48'),
(8, 'menu_acco_1', '1', NULL, NULL, '2020-10-03 20:30:00', '2023-07-26 04:03:18'),
(9, 'menu_acco_2', '1', NULL, NULL, '2020-10-30 20:30:00', '2023-07-29 12:43:27'),
(10, 'def_acco', '1', NULL, NULL, '2020-10-03 20:30:00', '2023-07-26 10:52:47'),
(11, 'mult', '0', NULL, NULL, '2020-10-03 20:30:00', '2023-07-31 11:09:02'),
(12, 'lock_cashire', '0', 'test', 'test', '2020-10-03 20:30:00', '2023-07-30 16:52:48'),
(13, 'lock_acco', '0', 'test', '123', '2020-10-30 20:30:00', '2023-07-27 05:08:20'),
(14, 'lock_store', '0', 'test', '123', '2020-10-03 20:30:00', '2023-07-27 03:51:02'),
(15, 'version', '1.0.5', NULL, NULL, NULL, NULL),
(16, 'name', 'Push Market', NULL, NULL, NULL, NULL),
(17, 'key', 'wnsN1[>3:|6Wx6NTH0>z\r\n', NULL, NULL, NULL, NULL),
(18, 'devloper', 'Sina Nayebzade', NULL, NULL, NULL, NULL),
(19, 'time', '1', NULL, NULL, NULL, '2023-07-30 11:29:33'),
(20, 'Git Hub', 'https://github.com/sina1010anis', NULL, NULL, NULL, NULL),
(21, 'type', 'فروشگاهی مواد غذایی (پیشرفته)', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `setings`
--
ALTER TABLE `setings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `setings`
--
ALTER TABLE `setings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
