-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2024 at 07:44 AM
-- Server version: 8.0.40-0ubuntu0.24.10.1
-- PHP Version: 8.3.11

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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indebted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acco_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `total`, `indebted`, `creditor`, `des`, `acco_id`, `created_at`, `updated_at`) VALUES
(36, '987987987897', '89798', '897', 'fdfdf', 1, '2023-07-26 04:22:15', '2023-07-26 04:22:15'),
(37, '987987897987', '3', '3', 'ewr', 1, '2023-07-26 10:42:13', '2023-07-26 10:42:13'),
(38, '3455333', '44', '44', 'شیر', 2, '2023-07-26 10:42:38', '2023-07-26 10:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `account_bancks`
--

CREATE TABLE `account_bancks` (
  `id` bigint UNSIGNED NOT NULL,
  `total` int NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stauts` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_cashes`
--

CREATE TABLE `account_cashes` (
  `id` bigint UNSIGNED NOT NULL,
  `total` int NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stauts` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_cashes`
--

INSERT INTO `account_cashes` (`id`, `total`, `des`, `stauts`, `created_at`, `updated_at`) VALUES
(20, 78978, 'ewe', 1, '2023-07-29 13:12:24', '2023-07-29 13:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `all_accounts`
--

CREATE TABLE `all_accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_accounts`
--

INSERT INTO `all_accounts` (`id`, `name`, `number`, `created_at`, `updated_at`) VALUES
(1, 'بانک پارسیان', '6221061206129480', '2020-10-03 20:30:00', '2021-10-05 20:03:38'),
(2, 'بانک ملت', '6104337446122283', '2020-10-03 20:30:00', '2022-05-10 18:45:39'),
(3, 'ملی', '111111111111', '2023-07-26 10:52:30', '2023-07-26 10:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `cashires`
--

CREATE TABLE `cashires` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stuats` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `creditors`
--

CREATE TABLE `creditors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL,
  `des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creditors`
--

INSERT INTO `creditors` (`id`, `name`, `price`, `des`, `created_at`, `updated_at`) VALUES
(36, 'صندوقدار اول', 3442343, 'qwqwqw', '2023-07-29 12:18:51', '2023-07-29 12:18:51'),
(37, 'test 2', 897987, 'test', '2023-07-29 12:56:21', '2023-07-29 12:56:21'),
(38, 'احمد اقا', 897987, 'est', '2023-07-29 12:56:34', '2023-07-31 11:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `factors`
--

CREATE TABLE `factors` (
  `id` bigint UNSIGNED NOT NULL,
  `total_price` int NOT NULL,
  `total_number` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `factors`
--

INSERT INTO `factors` (`id`, `total_price`, `total_number`, `created_at`, `updated_at`) VALUES
(8, 630000, 3, '2023-07-01 11:39:53', '2023-07-01 11:39:53'),
(9, 930000, 4, '2023-07-01 11:45:31', '2023-07-01 11:45:31'),
(10, 500000, 1, '2023-07-01 11:45:52', '2023-07-01 11:45:52'),
(11, 750000, 6, '2023-07-01 11:57:40', '2023-07-01 11:57:40'),
(12, 300000, 1, '2023-07-01 11:57:51', '2023-07-01 11:57:51'),
(13, 350000, 7, '2023-07-01 12:42:12', '2023-07-01 12:42:12'),
(14, 600000, 2, '2023-07-02 12:42:31', '2023-07-01 12:42:31'),
(15, 900000, 9, '2023-07-03 02:00:27', '2023-07-02 02:00:27'),
(16, 88527987, 4, '2023-07-04 03:25:44', '2023-07-04 03:25:44'),
(17, 1900000, 8, '2023-07-05 10:59:30', '2023-07-05 10:59:30'),
(18, 65000, 1, '2023-07-05 11:30:57', '2023-07-05 11:30:57'),
(19, 472500, 5, '2023-07-05 11:41:02', '2023-07-05 11:41:02'),
(20, 792500, 4, '2023-07-05 12:00:47', '2023-07-05 12:00:47'),
(21, 378000, 3, '2023-07-09 04:10:22', '2023-07-09 04:10:22'),
(22, 850000, 4, '2023-07-09 10:45:27', '2023-07-09 10:45:27'),
(23, 18000, 2, '2023-07-24 11:00:42', '2023-07-24 11:00:42'),
(24, 9000, 1, '2023-07-24 11:09:46', '2023-07-24 11:09:46'),
(25, 9000, 1, '2023-07-24 11:16:01', '2023-07-24 11:16:01'),
(26, 9000, 1, '2023-07-24 11:16:36', '2023-07-24 11:16:36'),
(27, 9000, 1, '2023-07-24 11:17:20', '2023-07-24 11:17:20'),
(28, 9000, 1, '2023-07-24 11:17:37', '2023-07-24 11:17:37'),
(29, 9000, 1, '2023-07-24 11:20:31', '2023-07-24 11:20:31'),
(30, 9000, 1, '2023-07-24 11:20:56', '2023-07-24 11:20:56'),
(31, 9000, 1, '2023-07-24 11:21:11', '2023-07-24 11:21:11'),
(32, 9000, 1, '2023-07-24 11:21:27', '2023-07-24 11:21:27'),
(33, 9000, 1, '2023-07-24 11:21:49', '2023-07-24 11:21:49'),
(34, 45000, 5, '2023-07-26 03:10:54', '2023-07-26 03:10:54'),
(35, 27000, 3, '2023-07-29 12:18:02', '2023-07-29 12:18:02'),
(36, 149000, 3, '2023-07-31 10:32:37', '2023-07-31 10:32:37'),
(37, 189000, 3, '2024-11-13 00:39:04', '2024-11-13 00:39:04'),
(38, 1050000, 12, '2024-11-13 03:55:36', '2024-11-13 03:55:36'),
(39, 85000, 1, '2024-11-13 11:43:36', '2024-11-13 11:43:36'),
(40, 85000, 1, '2024-11-14 02:37:52', '2024-11-14 02:37:52'),
(41, 110000, 2, '2024-11-14 02:48:43', '2024-11-14 02:48:43'),
(42, 5000, 1, '2024-11-14 02:48:59', '2024-11-14 02:48:59'),
(43, 0, 0, '2024-11-14 02:49:20', '2024-11-14 02:49:20'),
(44, 0, 0, '2024-11-14 02:49:41', '2024-11-14 02:49:41'),
(45, 85000, 1, '2024-11-14 05:04:42', '2024-11-14 05:04:42'),
(46, 85000, 1, '2024-11-15 01:33:17', '2024-11-15 01:33:17'),
(47, 85000, 1, '2024-11-15 04:54:19', '2024-11-15 04:54:19'),
(49, 813000, 9, '2024-11-16 00:39:01', '2024-11-16 00:39:01'),
(50, 85000, 1, '2024-11-16 02:08:13', '2024-11-16 02:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_01_062920_create_products_table', 1),
(6, '2023_07_01_062933_create_stores_table', 1),
(7, '2023_07_01_074559_add_image_to_products', 1),
(8, '2023_07_01_075658_create_product_simpels_table', 1),
(9, '2023_07_01_080741_add_des_to_product_simpels', 1),
(10, '2023_07_01_082913_add_des1_to_product_simpels', 1),
(11, '2023_07_01_083157_add_des2_to_product_simpels', 1),
(12, '2023_07_01_143028_create_factors_table', 1),
(13, '2023_07_01_144557_add_des5_to_product_simpels', 1),
(14, '2023_07_04_143035_create_creditors_table', 2),
(15, '2023_07_04_170913_create_receipts_table', 3),
(16, '2023_07_05_143204_add_stauts_to_products', 4),
(17, '2023_07_09_154534_create_new__p_s_table', 5),
(18, '2023_07_09_163531_create_accounts_table', 6),
(19, '2023_07_09_171256_create_account_cashes_table', 7),
(20, '2023_07_09_172021_add_status_to_account_cashes', 8),
(21, '2023_07_09_172625_create_account_bancks_table', 8),
(22, '2023_07_24_081546_add_price_to_stores', 9),
(23, '2023_07_24_150206_create_setings_table', 10),
(24, '2023_07_26_074735_add_acco_id_to_accounts', 11),
(25, '2023_07_26_075413_create_all_accounts_table', 12),
(26, '2023_07_26_142814_create_cashires_table', 13),
(27, '2023_07_26_145523_add_status_to_cashires', 14),
(28, '2023_07_27_072421_add_pass_to_setings', 15);

-- --------------------------------------------------------

--
-- Table structure for table `new__p_s`
--

CREATE TABLE `new__p_s` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new__p_s`
--

INSERT INTO `new__p_s` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'محصول یک', '250000', '2020-10-03 20:30:00', '2020-10-03 20:30:00'),
(2, 'محصول دو', '870000', '2020-10-30 20:30:00', '2022-05-10 18:45:39'),
(3, 'محصول یک', '250000', '2020-10-03 20:30:00', '2020-10-03 20:30:00'),
(4, 'محصول \\هار', '870000', '2020-10-30 20:30:00', '2022-05-10 18:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` bigint NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `price` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `barcode`, `image`, `price`, `created_at`, `updated_at`, `status`) VALUES
(1, 'روغن لادن 5 کیلویی', 11111, 'storage/images/P1.jpg', 365000, '2020-10-03 17:00:00', '2023-07-05 11:16:58', 1),
(2, 'شکلات تک تک کوچک', 22222, 'storage/images/P2.jpg', 5000, '2020-10-30 17:00:00', '2023-07-05 11:16:46', 1),
(3, 'ادامس موزی', 33333, 'storage/images/P3.jpg', 8000, '2020-10-03 17:00:00', '2023-07-05 11:16:36', 1),
(4, 'دوغ عالیس', 44444, 'storage/images/P4.jpg', 30000, '2020-10-03 17:00:00', '2023-07-05 11:16:09', 1),
(35, 'نوشابه خانواده 1.5', 55555, 'storage/images/P5.jpg', 25000, '2023-07-03 10:38:03', '2023-07-05 11:16:21', 1),
(46, 'لپه', 66666, 'storage/images/download.jpg', 65000, '2023-07-05 11:18:39', '2023-07-05 11:19:59', NULL),
(47, 'چای دبش 500 گرمی', 77777, 'storage/images/debsh jayeze 500.jpg', 115000, '2023-07-05 12:03:11', '2024-11-16 02:47:10', NULL),
(51, 'شکلات تک تک بزرگ', 252525, 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, '2023-07-09 10:30:27', '2023-07-09 10:31:29', NULL),
(67, 'دوغ عالیس بزرگ', 88888, 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 26000, '2023-07-31 11:23:31', '2023-07-31 11:23:31', NULL),
(69, 'چای دبش 100 گرمی', 99999, 'storage/images/Debsh-100.jpg', 85000, '2024-11-13 03:46:17', '2024-11-13 03:46:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_simpels`
--

CREATE TABLE `product_simpels` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `total_number` float NOT NULL,
  `total_price` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL,
  `factor_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_simpels`
--

INSERT INTO `product_simpels` (`id`, `product_id`, `total_number`, `total_price`, `name`, `image`, `price`, `factor_id`) VALUES
(28, 2, 7, 350000, 'شکلات تک تک کوچک', 'images/P2.jpg', 50000, 13),
(31, 4, 2, 600000, 'دوغ عالیس', 'images/P4.jpg', 300000, 14),
(32, 1, 1, 500000, 'روغن لادن 5 کیلویی', 'images/P1.jpg', 500000, 15),
(33, 2, 8, 400000, 'شکلات تک تک کوچک', 'images/P2.jpg', 50000, 15),
(42, 1, 1, 500000, 'روغن لادن 5 کیلویی', 'storage/images/P1.jpg', 500000, 16),
(43, 2, 1, 50000, 'شکلات تک تک کوچک', 'storage/images/P2.jpg', 50000, 16),
(44, 3, 1, 80000, 'ادامس موزی', 'storage/images/P3.jpg', 80000, 16),
(45, 4, 1, 87897987, 'دوغ عالیس', 'storage/images/P4.jpg', 87897987, 16),
(48, 1, 3, 1500000, 'روغن لادن 5 کیلویی', 'storage/images/P1.jpg', 500000, 17),
(49, 3, 5, 400000, 'ادامس موزی', 'storage/images/P3.jpg', 80000, 17),
(51, 46, 1, 65000, 'لپه', 'storage/images/download.jpg', 65000, 18),
(54, 35, 3, 75000, 'نوشابه خانواده 1.5', 'storage/images/P5.jpg', 25000, 19),
(55, 1, 1, 365000, 'روغن لادن 5 کیلویی', 'storage/images/P1.jpg', 365000, 19),
(56, 46, 1, 32500, 'لپه', 'storage/images/download.jpg', 65000, 19),
(61, 4, 1, 30000, 'دوغ عالیس', 'storage/images/P4.jpg', 30000, 20),
(63, 46, 1, 32500, 'لپه', 'storage/images/download.jpg', 65000, 20),
(64, 1, 2, 730000, 'روغن لادن 5 کیلویی', 'storage/images/P1.jpg', 365000, 20),
(73, 2, 1, 5000, 'شکلات تک تک کوچک', 'storage/images/P2.jpg', 5000, 21),
(74, 3, 1, 8000, 'ادامس موزی', 'storage/images/P3.jpg', 8000, 21),
(75, 1, 1, 365000, 'روغن لادن 5 کیلویی', 'storage/images/P1.jpg', 365000, 21),
(77, 1, 2, 730000, 'روغن لادن 5 کیلویی', 'storage/images/P1.jpg', 365000, 22),
(78, 2, 1, 5000, 'شکلات تک تک کوچک', 'storage/images/P2.jpg', 5000, 22),
(79, 47, 1, 115000, 'چای دبش 500 گرمی', 'storage/images/debsh jayeze 500.jpg', 115000, 22),
(81, 51, 2, 18000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 23),
(82, 51, 1, 9000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 24),
(83, 51, 1, 9000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 25),
(84, 51, 1, 9000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 26),
(85, 51, 1, 9000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 27),
(86, 51, 1, 9000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 28),
(87, 51, 1, 9000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 29),
(88, 51, 1, 9000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 30),
(89, 51, 1, 9000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 31),
(90, 51, 1, 9000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 32),
(91, 51, 1, 9000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 33),
(92, 51, 5, 45000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 34),
(93, 51, 3, 27000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 35),
(94, 51, 1, 9000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 36),
(95, 47, 1, 115000, 'چای دبش 500 گرمی', 'storage/images/debsh jayeze 500.jpg', 115000, 36),
(97, 35, 1, 25000, 'نوشابه خانواده 1.5', 'storage/images/P5.jpg', 25000, 36),
(105, 51, 1, 9000, 'شکلات تک تک بزرگ', 'storage/images/015e46d5-c599-46b6-8a9d-f8184c1924ce.jpg', 9000, 37),
(106, 47, 1, 115000, 'چای دبش 500 گرمی', 'storage/images/debsh jayeze 500.jpg', 115000, 37),
(107, 46, 1, 65000, 'لپه', 'storage/images/download.jpg', 65000, 37),
(109, 47, 5, 575000, 'چای دبش 500 گرمی', 'storage/images/debsh jayeze 500.jpg', 115000, 38),
(110, 69, 5, 425000, 'چای دبش 100 گرمی', 'storage/images/Debsh-100.jpg', 85000, 38),
(111, 35, 2, 50000, 'نوشابه خانواده 1.5', 'storage/images/P5.jpg', 25000, 38),
(118, 69, 1, 85000, 'چای دبش 100 گرمی', 'storage/images/Debsh-100.jpg', 85000, 39),
(124, 69, 1, 85000, 'چای دبش 100 گرمی', 'storage/images/Debsh-100.jpg', 85000, 40),
(125, 69, 1, 85000, 'چای دبش 100 گرمی', 'storage/images/Debsh-100.jpg', 85000, 41),
(126, 35, 1, 25000, 'نوشابه خانواده 1.5', 'storage/images/P5.jpg', 25000, 41),
(127, 2, 1, 5000, 'شکلات تک تک کوچک', 'storage/images/P2.jpg', 5000, 42),
(128, 69, 1, 85000, 'چای دبش 100 گرمی', 'storage/images/Debsh-100.jpg', 85000, 45),
(129, 69, 1, 85000, 'چای دبش 100 گرمی', 'storage/images/Debsh-100.jpg', 85000, 46),
(130, 69, 1, 85000, 'چای دبش 100 گرمی', 'storage/images/Debsh-100.jpg', 85000, 47),
(133, 47, 2, 230000, 'چای دبش 500 گرمی', 'storage/images/debsh jayeze 500.jpg', 115000, 49),
(134, 46, 1, 65000, 'لپه', 'storage/images/download.jpg', 65000, 49),
(135, 35, 1, 25000, 'نوشابه خانواده 1.5', 'storage/images/P5.jpg', 25000, 49),
(136, 4, 1, 30000, 'دوغ عالیس', 'storage/images/P4.jpg', 30000, 49),
(137, 3, 1, 8000, 'ادامس موزی', 'storage/images/P3.jpg', 8000, 49),
(138, 2, 1, 5000, 'شکلات تک تک کوچک', 'storage/images/P2.jpg', 5000, 49),
(139, 1, 1, 365000, 'روغن لادن 5 کیلویی', 'storage/images/P1.jpg', 365000, 49),
(140, 69, 1, 85000, 'چای دبش 100 گرمی', 'storage/images/Debsh-100.jpg', 85000, 49),
(141, 69, 1, 85000, 'چای دبش 100 گرمی', 'storage/images/Debsh-100.jpg', 85000, 50);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(6, 'test', 878978, '2023-07-29 12:55:38', '2023-07-29 12:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `setings`
--

CREATE TABLE `setings` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(11, 'mult', '0', NULL, NULL, '2020-10-03 20:30:00', '2024-11-15 07:46:32'),
(12, 'lock_cashire', '0', 'test', 'test', '2020-10-03 20:30:00', '2023-07-30 16:52:48'),
(13, 'lock_acco', '0', 'test', '123', '2020-10-30 20:30:00', '2023-07-27 05:08:20'),
(14, 'lock_store', '0', 'test', '123', '2020-10-03 20:30:00', '2023-07-27 03:51:02'),
(15, 'version', '1.0.5', NULL, NULL, NULL, NULL),
(16, 'name', 'Push Market', NULL, NULL, NULL, NULL),
(17, 'key', 'wnsN1[>3:|6Wx6NTH0>z\r\n', NULL, NULL, NULL, NULL),
(18, 'devloper', 'Sina Nayebzade', NULL, NULL, NULL, NULL),
(19, 'time', '1', NULL, NULL, NULL, '2023-07-30 11:29:33'),
(20, 'Git Hub', 'https://github.com/sina1010anis', NULL, NULL, NULL, NULL),
(21, 'type', 'فروشگاهی مواد غذایی (پیشرفته)', NULL, NULL, NULL, NULL),
(22, 'loding', '1', NULL, NULL, NULL, '2024-11-15 07:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` bigint DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_number` bigint NOT NULL,
  `box` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `barcode`, `location`, `total_number`, `box`, `created_at`, `updated_at`) VALUES
(14, 'werwer', NULL, 'wewe', 2323, '232323', '2023-07-29 13:12:50', '2023-07-29 13:12:50'),
(15, 'فثسف', NULL, 'rewer', 65465, '564654', '2023-07-31 11:28:41', '2023-07-31 11:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_bancks`
--
ALTER TABLE `account_bancks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_cashes`
--
ALTER TABLE `account_cashes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_accounts`
--
ALTER TABLE `all_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashires`
--
ALTER TABLE `cashires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditors`
--
ALTER TABLE `creditors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factors`
--
ALTER TABLE `factors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new__p_s`
--
ALTER TABLE `new__p_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_simpels`
--
ALTER TABLE `product_simpels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_simpels_product_id_foreign` (`product_id`),
  ADD KEY `product_simpels_factor_id_foreign` (`factor_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setings`
--
ALTER TABLE `setings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `account_bancks`
--
ALTER TABLE `account_bancks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `account_cashes`
--
ALTER TABLE `account_cashes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `all_accounts`
--
ALTER TABLE `all_accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cashires`
--
ALTER TABLE `cashires`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `creditors`
--
ALTER TABLE `creditors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `factors`
--
ALTER TABLE `factors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `new__p_s`
--
ALTER TABLE `new__p_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `product_simpels`
--
ALTER TABLE `product_simpels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setings`
--
ALTER TABLE `setings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_simpels`
--
ALTER TABLE `product_simpels`
  ADD CONSTRAINT `product_simpels_factor_id_foreign` FOREIGN KEY (`factor_id`) REFERENCES `factors` (`id`),
  ADD CONSTRAINT `product_simpels_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
