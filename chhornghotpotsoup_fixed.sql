-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2026 at 02:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chhornghotpotsoup`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
,
  `key` varchar(255) NOT NULL,,
  `value` mediumtext NOT NULL,,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
,
  `key` varchar(255) NOT NULL,,
  `owner` varchar(255) NOT NULL,,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
,
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,,
  `name` varchar(255) NOT NULL,,
  `created_at` timestamp NULL DEFAULT NULL,,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Soup', '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(2, 'Seafood', '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(3, 'Meat', '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(4, 'Vegetable', '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(5, 'Meatball', '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(6, 'Drink', '2026-07-29 15:39:26', '2026-07-29 15:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotpot_customers`
--

CREATE TABLE `hotpot_customers` (
,
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,,
  `name` varchar(255) NOT NULL,,
  `phone` varchar(20) NOT NULL,,
  `table_number` int(11) NOT NULL,,
  `created_at` timestamp NULL DEFAULT NULL,,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
,
  `id` varchar(255) NOT NULL,,
  `name` varchar(255) NOT NULL,,
  `total_jobs` int(11) NOT NULL,,
  `pending_jobs` int(11) NOT NULL,,
  `failed_jobs` int(11) NOT NULL,,
  `failed_job_ids` longtext NOT NULL,,
  `options` mediumtext DEFAULT NULL,,
  `cancelled_at` int(11) DEFAULT NULL,,
  `created_at` int(11) NOT NULL,,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `mengchhorng`
-- (See below for the actual view)
--
CREATE TABLE `mengchhorng` (
);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_14_125626_add_role_to_users_table', 1),
(5, '2026_02_24_042354_create_orders_table', 1),
(6, '2026_02_24_042355_create_order_items_table', 1),
(7, '2026_02_24_045346_create_categories_table', 1),
(8, '2026_02_24_045423_create_products_table', 2),
(9, '2026_03_11_121740_create_hotpot_customers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
,
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,,
  `order_number` varchar(255) NOT NULL,,
  `table_number` varchar(255) NOT NULL,,
  `total` decimal(10,2) NOT NULL,,
  `status` varchar(255) NOT NULL DEFAULT 'pending',,
  `created_at` timestamp NULL DEFAULT NULL,,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `special_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
,
  `email` varchar(255) NOT NULL,,
  `token` varchar(255) NOT NULL,,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tom Yum Soup', 5.00, 'image/tom-yum.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(2, 1, 'Mala Soup', 6.00, 'image/mala.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(3, 1, 'Chicken Soup', 4.00, 'image/chicken-soup.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(4, 1, 'Beef Bone Soup', 6.00, 'image/beef-bone.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(5, 1, 'Seafood Soup', 7.00, 'image/seafood-soup.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(6, 1, 'Vegetable Soup', 4.00, 'image/vegetable-soup.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(7, 2, 'Crab', 8.00, 'image/crab.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(8, 2, 'Shrimp', 7.00, 'image/shrimp.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(9, 2, 'Squid', 6.00, 'image/squid.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(10, 2, 'Fish', 5.00, 'image/fish.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(11, 3, 'Beef Slice', 6.00, 'image/beef-slice.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(12, 3, 'Pork Slice', 5.00, 'image/pork-slice.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(13, 3, 'Chicken', 4.00, 'image/chicken.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(14, 4, 'Cabbage', 2.00, 'image/cabbage.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(15, 4, 'Mushroom', 3.00, 'image/mushroom.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(16, 4, 'Spinach', 2.00, 'image/spinach.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(17, 5, 'Fish Ball', 3.00, 'image/fish-ball.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(18, 5, 'Beef Ball', 3.00, 'image/beef-ball.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(19, 6, 'Coca Cola', 1.50, 'image/coca-cola.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(20, 6, 'Pepsi', 1.50, 'image/pepsi.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26'),
(21, 6, 'Water', 1.00, 'image/water.jpg', 1, '2026-07-29 15:39:26', '2026-07-29 15:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@hotpot.com', NULL, '$2y$12$pf0spHBMbG9lr5OvDogV7.ygDhGOh1VzHZrDy/v4NkxruwykznKV.', NULL, '2026-07-29 15:39:26', '2026-07-29 16:06:31');

-- --------------------------------------------------------

--
-- Structure for view `mengchhorng`
--
DROP TABLE IF EXISTS `mengchhorng`;

CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY INVOKER VIEW `mengchhorng`  AS SELECT `customers`.`id` AS `id`, `customers`.`name` AS `name`, `customers`.`phone` AS `phone`, `customers`.`table_number` AS `table_number`, `customers`.`created_at` AS `created_at`, `customers`.`updated_at` AS `updated_at` FROM `customers` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--


--
-- Indexes for table `cache_locks`
--


--
-- Indexes for table `categories`
--


--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotpot_customers`
--


--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--


--
-- Indexes for table `migrations`
--


--
-- Indexes for table `orders`
--


--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--


--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categories`
--


--
-- AUTO_INCREMENT for table `failed_jobs`
--


--
-- AUTO_INCREMENT for table `orders`
--


--
-- AUTO_INCREMENT for table `users`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
