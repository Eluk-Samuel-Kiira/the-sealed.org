-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2022 at 11:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abss`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantities` int(111) DEFAULT NULL,
  `total_price` int(34) DEFAULT NULL,
  `status` smallint(1) DEFAULT 1,
  `deleted` smallint(1) DEFAULT 0,
  `date_created` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantities`, `total_price`, `status`, `deleted`, `date_created`) VALUES
(17, 1, 12, 1, 0, 1, 0, '2022-09-23'),
(30, 1, 8, 1, 0, 1, 0, '2022-09-23'),
(31, 1, 9, 1, 0, 1, 0, '2022-09-23'),
(32, 1, 10, 1, 0, 1, 0, '2022-09-24'),
(33, 1, 8, 1, 0, 1, 0, '2022-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `cronjobs`
--

CREATE TABLE `cronjobs` (
  `id` int(11) NOT NULL,
  `user` char(64) DEFAULT NULL,
  `request_made` char(64) DEFAULT NULL,
  `response_made` time(6) NOT NULL DEFAULT current_timestamp(),
  `request_seen` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cronjobs`
--

INSERT INTO `cronjobs` (`id`, `user`, `request_made`, `response_made`, `request_seen`) VALUES
(207, 'ken', NULL, '10:29:01.000000', '10:28:17.548690009'),
(208, 'ken', NULL, '10:29:03.000000', '10:28:17.620606088'),
(209, 'ken', '10:29:44.302764567', '10:30:03.000000', NULL),
(210, 'ken', NULL, '10:30:03.000000', '10:29:10.109681627'),
(211, 'ken', NULL, '10:30:03.000000', '10:29:10.152819930'),
(216, 'ken', '10:34:07.302376772', '10:35:01.000000', NULL),
(217, 'ken', NULL, '10:36:01.000000', '10:35:33.878461959'),
(218, 'ken', NULL, '10:36:01.000000', '10:35:33.926877992'),
(219, 'Opio', '10:36:06.744939055', '10:37:01.000000', NULL),
(220, 'ken', NULL, '10:37:02.000000', '10:37:00.641299872'),
(221, 'ken', NULL, '10:37:02.000000', '10:37:00.692718350'),
(222, 'ken', NULL, '10:38:01.000000', '10:37:23.510579364'),
(223, 'ken', NULL, '10:38:01.000000', '10:37:23.555680241');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantitiez` int(23) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user`, `product_id`, `quantitiez`, `date`) VALUES
(24, 1, 12, 8, '2022-09-24'),
(25, 1, 8, 10, '2022-09-24'),
(26, 1, 9, 7, '2022-09-24'),
(27, 1, 12, 8, '2022-09-24'),
(28, 1, 8, 10, '2022-09-24'),
(29, 1, 9, 7, '2022-09-24'),
(30, 1, 12, 8, '2022-09-24'),
(31, 1, 8, 10, '2022-09-24'),
(32, 1, 9, 7, '2022-09-24'),
(33, 1, 12, 8, '2022-09-24'),
(34, 1, 8, 10, '2022-09-24'),
(35, 1, 9, 8, '2022-09-24'),
(36, 1, 12, 8, '2022-09-24'),
(37, 1, 8, 10, '2022-09-24'),
(38, 1, 9, 8, '2022-09-24'),
(39, 1, 12, 8, '2022-09-24'),
(40, 1, 8, 10, '2022-09-24'),
(41, 1, 9, 8, '2022-09-24'),
(42, 1, 10, 5, '2022-09-24'),
(43, 1, 10, 5, '2022-09-24'),
(44, 1, 10, 5, '2022-09-24'),
(45, 1, 10, 5, '2022-09-24'),
(46, NULL, 10, 5, '2022-09-24'),
(47, NULL, 10, 5, '2022-09-24'),
(48, NULL, 10, 5, '2022-09-24'),
(49, NULL, 10, 5, '2022-09-24'),
(50, 1, 8, 1, '2022-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `partid` varchar(11) DEFAULT NULL,
  `name` varchar(23) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `product` varchar(64) DEFAULT NULL,
  `date_of_birth` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `created_at`, `partid`, `name`, `password`, `product`, `date_of_birth`) VALUES
(115, '2022-09-20', '1', 'sam', '1122', 'bread', '1998'),
(116, '2022-09-20', '2', 'jose', '656', 'cake', '1767'),
(117, '2022-09-20', '3', 'aron', '6556', 'juice', '1755'),
(118, '2022-09-20', '4', 'ben', '6999', 'jerrycan', '1745'),
(119, '2022-09-20', '5', 'gin', '4545', 'food', '155'),
(120, '2022-09-20', '6', 'grr', '4545', 'food', '155'),
(121, '2022-09-20', '7', 'james', '2323', 'jacket', '1989'),
(122, '2022-09-21', '8', 'bob', '4343', 'papers', '1987'),
(123, '2022-09-21', '9', 'den', '3434', 'hoes', '8787'),
(124, '2022-09-23', '0', 'ken', '5454', 'hen', '1657');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performances`
--

CREATE TABLE `performances` (
  `id` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `participant` varchar(64) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `points` int(64) DEFAULT NULL,
  `quantity_left` int(64) DEFAULT NULL,
  `returns` int(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performances`
--

INSERT INTO `performances` (`id`, `date_created`, `participant`, `rank`, `points`, `quantity_left`, `returns`) VALUES
(1, '2022-09-20', 'ken', 56, 3, 52, 5),
(2, '2022-09-20', 'Opio', 34, 45, 66, 67),
(3, '2022-09-20', 'jose', 20, 90, 52, 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` int(11) NOT NULL,
  `proid` int(11) DEFAULT NULL,
  `uname` varchar(64) DEFAULT NULL,
  `product` varchar(64) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(64) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `proid`, `uname`, `product`, `quantity`, `price`, `description`, `date_created`) VALUES
(8, 8, 'sam', 'bread', 52, 5656, 'expired braeds', '2022-09-22'),
(9, 9, 'jose', 'cake', 55, 23232, 'Best of the best', '2022-09-22'),
(10, 10, 'gin', 'food', 58, 3400, 'Very well cooked', '2022-09-22'),
(11, 7, 'ken', 'hen', 23, 4500, 'hshshs', '2022-09-23'),
(12, 11, 'den', 'hoes', 55, 2323, 'hoes', '2022-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Samuel', 's@w', 2, NULL, '$2y$10$wSrcnXCXMyv1apONxptCjuBDBCnx897MNN9XSmaKOHm5QOr.7hEXy', NULL, '2022-09-22 10:25:06', '2022-09-22 10:25:06'),
(2, 'kenneth', 'kenneth@gmail.com', 1, NULL, '$2y$10$bEbfqbEaSiloN7VIQZIcGu1VHzcOZ1J4PCOn2.RmW/qn2SLenLQrW', NULL, '2022-09-24 04:56:20', '2022-09-24 04:56:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cronjobs`
--
ALTER TABLE `cronjobs`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `performances`
--
ALTER TABLE `performances`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cronjobs`
--
ALTER TABLE `cronjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `performances`
--
ALTER TABLE `performances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
