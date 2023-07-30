-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 09:19 AM
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setings`
--

INSERT INTO `setings` (`id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'win_cashire', '1', '2020-10-03 20:30:00', '2023-07-26 03:22:26'),
(2, 'unit', '1', '2020-10-03 20:30:00', '2023-07-26 03:22:25'),
(3, 'menu_cashire_1', '1', '2020-10-03 20:30:00', '2023-07-26 03:24:58'),
(4, 'menu_cashire_2', '1', '2020-10-30 20:30:00', '2023-07-26 03:24:56'),
(5, 'menu_cashire_3', '1', '2020-10-03 20:30:00', '2023-07-26 03:24:53'),
(6, 'menu_cashire_4', '1', '2020-10-03 20:30:00', '2023-07-26 03:24:51'),
(7, 'menu_store', '1', '2020-10-03 20:30:00', '2023-07-26 03:32:31'),
(8, 'menu_acco_1', '1', '2020-10-03 20:30:00', '2023-07-26 04:03:18'),
(9, 'menu_acco_2', '1', '2020-10-30 20:30:00', '2023-07-26 04:03:10'),
(10, 'def_acco', '1', '2020-10-03 20:30:00', '2023-07-26 10:52:47'),
(11, 'mult', '0', '2020-10-03 20:30:00', '2023-07-26 12:30:37'),
(12, 'lock_cashire', '0', '2020-10-03 20:30:00', '2021-10-05 20:03:38'),
(13, 'lock_acco', '0', '2020-10-30 20:30:00', '2022-05-10 18:45:39'),
(14, 'lock_store', '0', '2020-10-03 20:30:00', '2020-10-03 20:30:00');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
