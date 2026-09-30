-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2026 at 11:12 PM
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
-- Database: `ridenet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `tag`, `password`, `remember_token`, `json`, `status`, `updated`, `date`) VALUES
(1, 'master', '$2y$12$9.2R2RU7GN1Sz.n1lbnmI.7y9P4QjjPZONMpxhScf9/bqX.zFGjAS', 'mOT9PPeK909tiJ03IQdKIGY5Mb4D80XHrx8UHAFZMOmDELBj7dQ3d8a3PyjU', NULL, 'active', '2026-03-07 17:02:07', '2026-03-07 17:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `package` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`package`)),
  `vendor` bigint(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `gamings`
--

CREATE TABLE `gamings` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `game` varchar(255) NOT NULL DEFAULT 'Memory game',
  `stake` float NOT NULL DEFAULT 2500,
  `win` float NOT NULL DEFAULT 7000,
  `status` varchar(255) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gift_codes`
--

CREATE TABLE `gift_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL COMMENT 'The gift code',
  `value` bigint(20) NOT NULL COMMENT 'The gift code value',
  `limit` bigint(20) NOT NULL DEFAULT 100 COMMENT 'The gift code limit i.e total users before being invalid',
  `redeemed` bigint(20) NOT NULL DEFAULT 0 COMMENT 'Totla units redeemed',
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Added details' CHECK (json_valid(`json`)),
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'active'
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
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `amount` float DEFAULT NULL,
  `bank` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`bank`)),
  `status` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`url`)),
  `icon` text DEFAULT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`title`)),
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`body`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'json status format for user and admin wether read or unread' CHECK (json_valid(`status`)),
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL COMMENT 'user email',
  `otp` bigint(20) DEFAULT NULL COMMENT 'otp code',
  `purpose` text DEFAULT NULL COMMENT 'Otp purpose',
  `status` varchar(255) NOT NULL DEFAULT 'active' COMMENT 'code status',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Product name',
  `photo` varchar(255) NOT NULL COMMENT 'The display photo',
  `category` varchar(255) NOT NULL COMMENT 'The product category',
  `price` double NOT NULL COMMENT 'The product price',
  `location` varchar(255) NOT NULL COMMENT 'The location in state',
  `address` text DEFAULT NULL COMMENT 'Address',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchased_products`
--

CREATE TABLE `purchased_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `product` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'The product json gotten from products table' CHECK (json_valid(`product`)),
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'The status in json for both buyer and seller' CHECK (json_valid(`status`)),
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivery_address` text DEFAULT NULL,
  `delivery_state` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redeemed_gift_codes`
--

CREATE TABLE `redeemed_gift_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'The user who redeemed the code',
  `gift_code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Gift code json fetched from the gift codes table based on the code' CHECK (json_valid(`gift_code`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('UZPOErkmZlWpdaJpokFKvPvptpgOVsjxmNqbBzEO', NULL, '172.20.10.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.6.1 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTFVUkpuaHZzdk8weDBZdHN3YmZ1bDdxSkozSUdXWjZ5YVUxWDhaMiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xNzIuMjAuMTAuMy9yaWRlbmV0L3B1YmxpYy91c2Vycy9sb2dpbiI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1790802758);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`value`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `json`, `status`, `updated`, `date`) VALUES
(1, 'general_settings', '{\"email_verification\":null,\"maintenance_mode\":null,\"welcome_bonus\":\"400\",\"referral_commission\":\"400\",\"task\":{\"penalty\":\"500\"}}', NULL, 'active', '2026-06-24 19:36:07', '2026-03-24 03:09:32'),
(2, 'social_settings', '{\"whatsapp_community\":\"https:\\/\\/wa.com.sh\",\"telegram_community\":\"https:\\/\\/t.com.edhd\",\"site_notification\":\"Welcome to TaskHub, Your welcome bonus has been added. Complete daily tasks, spin to win cash, and redeem gift codes from our WhatsApp & Telegram groups. For any issues, contact admin anytime. Enjoy!\",\"advert\":{\"telegram\":\"https:\\/\\/telegram.com\\/biz\\/\",\"whatsapp\":\"https:\\/\\/whatsapp.com\\/biz\\/\"}}', NULL, 'active', '2026-06-24 19:36:11', '2026-03-24 03:48:42'),
(3, 'bank_settings', '{\"account_number\":\"5005016577\",\"bank_name\":\"Kuda\",\"account_name\":\"David James\"}', NULL, 'active', '2026-04-30 02:58:30', '2026-04-17 06:16:37'),
(4, 'finance_settings', '{\"withdrawal\":{\"fee\":\"15\",\"count\":\"5\",\"affiliate_balance\":{\"portal\":\"on\",\"minimum\":\"60\",\"maximum\":\"857\"},\"main_balance\":{\"portal\":\"on\",\"minimum\":\"300\",\"maximum\":\"8079\"}},\"vtu\":{\"portal\":\"on\"}}', NULL, 'active', '2026-05-17 20:43:56', '2026-04-29 07:29:09'),
(5, 'upgrade_settings', '{\"upgrade\":{\"fee\":\"1000\",\"cashback\":\"300\",\"portal\":\"on\"}}', NULL, 'active', '2026-05-25 05:41:00', '2026-04-30 02:58:48'),
(6, 'gaming_balance', '[{\"main_balance\":{\"portal\":\"on\",\"minimum\":\"500\"}},{\"affiliate_balance\":{\"portal\":\"on\",\"minimum\":\"200\"}},{\"gaming_balance\":{\"portal\":\"on\",\"minimum\":\"465\"}}]', NULL, 'active', '2026-06-24 21:46:02', '2026-06-24 21:45:25'),
(7, 'withdrawal_settings', '{\"main_balance\":{\"portal\":\"off\",\"minimum\":\"4000\"},\"affiliate_balance\":{\"portal\":\"on\",\"minimum\":\"250\"}}', NULL, 'active', '2026-09-28 00:45:09', '2026-06-24 21:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `track_id` bigint(20) NOT NULL,
  `track` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'The track streamed as a json' CHECK (json_valid(`track`)),
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `category` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `earning` bigint(20) NOT NULL,
  `slots` bigint(20) NOT NULL DEFAULT 100 COMMENT 'The total proofs needed',
  `completed` bigint(20) NOT NULL DEFAULT 0 COMMENT 'The total proofs submitted',
  `link` varchar(255) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_categories`
--

CREATE TABLE `task_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `earning` double NOT NULL DEFAULT 0,
  `platform` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_categories`
--

INSERT INTO `task_categories` (`id`, `uniqid`, `icon`, `name`, `earning`, `platform`, `status`, `updated`, `date`) VALUES
(1, 'UBFIGE1717906114', 'hfx8fvfe17906114.jpeg', 'Task', 20, 'Vvv', 'active', '2026-09-29 00:04:19', '2026-09-29 00:04:19'),
(2, 'YZEVUREF17906114', 'iyaqxbo617906114.jpeg', 'Bjhhj', 30, 'Tutu', 'active', '2026-09-29 00:04:56', '2026-09-29 00:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `task_proofs`
--

CREATE TABLE `task_proofs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `task` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'the task performed in json format fetched from task table based on task id submitted' CHECK (json_valid(`task`)),
  `proofs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'The prrofs submitted in json format' CHECK (json_valid(`proofs`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'added details' CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracklist`
--

CREATE TABLE `tracklist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL COMMENT 'Display Banner',
  `audio` varchar(255) DEFAULT NULL COMMENT 'Track Audio',
  `name` varchar(255) DEFAULT NULL COMMENT 'Track Name',
  `artist` varchar(255) DEFAULT NULL COMMENT 'Artist/Musician who sang the song',
  `reward` bigint(20) DEFAULT NULL COMMENT 'Streaming Reward',
  `streams` bigint(20) NOT NULL DEFAULT 0 COMMENT 'Total streams',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT 0,
  `fee` float DEFAULT 0,
  `icon` text DEFAULT NULL,
  `wallet` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`wallet`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `package` varchar(255) NOT NULL DEFAULT 'free',
  `pkg` varchar(255) DEFAULT NULL,
  `coupon` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`coupon`)),
  `type` varchar(255) DEFAULT 'user',
  `username` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'nigeria',
  `currency` varchar(255) NOT NULL DEFAULT '₦',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `main_balance` float NOT NULL DEFAULT 0,
  `affiliate_balance` double NOT NULL DEFAULT 0,
  `gaming_balance` float NOT NULL DEFAULT 0,
  `activities_balance` double NOT NULL DEFAULT 0,
  `deposit_balance` float NOT NULL DEFAULT 0,
  `withdrawal_balance` float NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `transaction_pin` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `bank` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`bank`)),
  `status` varchar(255) DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `value` float NOT NULL DEFAULT 0,
  `used_by` bigint(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gamings`
--
ALTER TABLE `gamings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_codes`
--
ALTER TABLE `gift_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased_products`
--
ALTER TABLE `purchased_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeemed_gift_codes`
--
ALTER TABLE `redeemed_gift_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_categories`
--
ALTER TABLE `task_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_proofs`
--
ALTER TABLE `task_proofs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracklist`
--
ALTER TABLE `tracklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gamings`
--
ALTER TABLE `gamings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gift_codes`
--
ALTER TABLE `gift_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchased_products`
--
ALTER TABLE `purchased_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redeemed_gift_codes`
--
ALTER TABLE `redeemed_gift_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_categories`
--
ALTER TABLE `task_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_proofs`
--
ALTER TABLE `task_proofs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracklist`
--
ALTER TABLE `tracklist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
