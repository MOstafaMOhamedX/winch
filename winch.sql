-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 02:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT 'logo.png',
  `lang` varchar(255) NOT NULL DEFAULT 'en',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `points`, `image`, `lang`, `status`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'safy', 'safyeissa208@gmail.com', '123456', 0, 'logo.png', 'en', 1, NULL, '$2y$10$AcnJXw5PcxLHel/5YrFNZeYQAb.KlinRGh6JOUSEFh2VXesqtDgoG', NULL, NULL, '2023-02-22 10:28:26', '2023-02-22 10:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `device_tokens`
--

CREATE TABLE `device_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `device_token` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `device_tokens`
--

INSERT INTO `device_tokens` (`id`, `client_id`, `device_token`, `created_at`, `updated_at`) VALUES
(4, 9, NULL, '2023-02-22 10:28:26', '2023-02-22 10:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'logo.png',
  `lang` varchar(255) NOT NULL DEFAULT 'en',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `email`, `phone`, `image`, `lang`, `status`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(12, 'safy', 'safyeissa208@gmail.com', '123456', 'logo.png', 'en', 1, '$2y$10$/Iql0AIb2nynuYTTcJK/tO6T1wD7NZFOsbwfOEMLz1Mp6dQbgCOIa', NULL, NULL, '2023-02-22 10:32:59', '2023-02-22 10:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `drivers_device_token`
--

CREATE TABLE `drivers_device_token` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `device_token` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers_device_token`
--

INSERT INTO `drivers_device_token` (`id`, `driver_id`, `device_token`, `created_at`, `updated_at`) VALUES
(6, 12, NULL, '2023-02-22 10:32:59', '2023-02-22 10:32:59');

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
(1, '2014_10_12_000000_create_admins_table', 1),
(2, '2014_10_12_000000_create_clients_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_device_tokens_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2023_02_19_215652_create_settings_table', 2),
(9, '2023_02_22_104312_create_drivers_table', 3),
(10, '2023_02_22_111811_create_drivers_device_token_table', 4),
(11, '2014_10_12_100000_create_password_resets_table', 5),
(12, '2023_02_22_192328_create_users_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\Client', 2, 'ClientToken', '2db063ebf1f90cf42f713481f1348d80bc295322e1defc598ee09cc48191096b', '[\"*\"]', NULL, NULL, '2023-02-16 12:46:39', '2023-02-16 12:46:39'),
(3, 'App\\Models\\Client', 3, 'ClientToken', 'eff14ea8c27af16722e5bb150c82ba0ffb9bf2994c35efdff2bf67f218e1b232', '[\"*\"]', NULL, NULL, '2023-02-16 12:46:48', '2023-02-16 12:46:48'),
(4, 'App\\Models\\Client', 4, 'ClientToken', 'dbbe4ed55826a9eda4468ebcd20de8e12a602058040333b26ff7ee9d1105c618', '[\"*\"]', NULL, NULL, '2023-02-16 12:47:46', '2023-02-16 12:47:46'),
(5, 'App\\Models\\Client', 5, 'ClientToken', 'c590b09f1fd00ca565459eb986133d271fc843132230e119096a6eb6cbe2f8fe', '[\"*\"]', NULL, NULL, '2023-02-16 12:48:52', '2023-02-16 12:48:52'),
(16, 'App\\Models\\Client', 6, 'ClientToken', '20f723f40824743d7a60884ca7fbb79c18009d3b1f83e9d86e041d3f559471c9', '[\"*\"]', NULL, NULL, '2023-02-22 09:13:36', '2023-02-22 09:13:36'),
(17, 'App\\Models\\Driver', 4, 'ClientToken', 'f38b52edd09878a3e5020e85b4bdd3055110ee8d4c12a104cb5f995875f7bf3b', '[\"*\"]', NULL, NULL, '2023-02-22 09:26:42', '2023-02-22 09:26:42'),
(18, 'App\\Models\\Driver', 5, 'ClientToken', 'f71c6b8154d0a412fa83e55fb528b7a3e9311375e455824c3f708aef1767aec6', '[\"*\"]', NULL, NULL, '2023-02-22 09:27:26', '2023-02-22 09:27:26'),
(19, 'App\\Models\\Client', 2, 'ClientToken', 'e264eaa0e4bfde48c07f316457d8e16f5a3c9f65183b4a78e9e4f2f205178c73', '[\"*\"]', NULL, NULL, '2023-02-22 09:28:51', '2023-02-22 09:28:51'),
(20, 'App\\Models\\Driver', 6, 'ClientToken', 'b3297954378e723f5f6159027dd651cb1caea9796e0dd7c80e283681c1b1da99', '[\"*\"]', NULL, NULL, '2023-02-22 09:30:06', '2023-02-22 09:30:06'),
(21, 'App\\Models\\Client', 2, 'ClientToken', 'b45d97853d3fa692b5022dc348145e8e172639477b8c4407cc14a874cc7b0fc8', '[\"*\"]', NULL, NULL, '2023-02-22 09:30:09', '2023-02-22 09:30:09'),
(25, 'App\\Models\\Driver', 8, 'ClientToken', '214817b0266bfe1d367ef0cd4e540a7ef38b00648d0046b8b2af9f6ebf21e694', '[\"*\"]', '2023-02-22 09:51:31', NULL, '2023-02-22 09:51:09', '2023-02-22 09:51:31'),
(26, 'App\\Models\\Driver', 8, 'ClientToken', '0fa23ed53d20ba91594969c45a141c9fc9e26ce1c4787f91a9d12f49ff884379', '[\"*\"]', NULL, NULL, '2023-02-22 09:51:31', '2023-02-22 09:51:31'),
(27, 'App\\Models\\Client', 8, 'ClientToken', '9b39fb848239249a42838b21e1d9037dcc770eacd5968b3f32c4971c1e7e788c', '[\"*\"]', NULL, NULL, '2023-02-22 09:58:48', '2023-02-22 09:58:48'),
(28, 'App\\Models\\Driver', 9, 'ClientToken', '4cd277936e5587093ba084d0dbf12df8c70a5c75cd4a5e8e6a066b735351dd16', '[\"*\"]', NULL, NULL, '2023-02-22 10:21:13', '2023-02-22 10:21:13'),
(29, 'App\\Models\\Driver', 10, 'ClientToken', '5f101006d202935a4a83949ac729c69e6d2e6e5e91d3ec2619525bfbeb93a181', '[\"*\"]', NULL, NULL, '2023-02-22 10:23:04', '2023-02-22 10:23:04'),
(30, 'App\\Models\\Driver', 11, 'ClientToken', '9c3b661f35405a4ef34cddd43f2e3cfcb879a60e773a08cb9d396c886bf4bf7d', '[\"*\"]', NULL, NULL, '2023-02-22 10:23:07', '2023-02-22 10:23:07'),
(31, 'App\\Models\\Client', 8, 'ClientToken', '7dd4f87e8b048faf1f146af3d4bf4cf4aa2c07f12284033ee056b8dbc99bdc75', '[\"*\"]', NULL, NULL, '2023-02-22 10:27:57', '2023-02-22 10:27:57'),
(32, 'App\\Models\\Client', 9, 'ClientToken', '065ea8aac1125b1cfde0b7b982fe9170846f36565fefbf3b784ebdcae3dd54dd', '[\"*\"]', NULL, NULL, '2023-02-22 10:28:26', '2023-02-22 10:28:26'),
(33, 'App\\Models\\Client', 9, 'ClientToken', 'de89e06c1defde2493f695c53444e9e5f35dc04ad4c5b567cb7cfa3c62f1327c', '[\"*\"]', NULL, NULL, '2023-02-22 10:28:45', '2023-02-22 10:28:45'),
(34, 'App\\Models\\Driver', 12, 'ClientToken', '7ff6733f57f8a77631160a8e434699bb6115c6fa5c76955e5f11167767aae1ec', '[\"*\"]', NULL, NULL, '2023-02-22 10:32:59', '2023-02-22 10:32:59'),
(35, 'App\\Models\\Driver', 12, 'ClientToken', '80f9025cd49d64b1e59537bd3672046196a18e3b819884a78fa5113e85434909', '[\"*\"]', NULL, NULL, '2023-02-22 10:33:11', '2023-02-22 10:33:11'),
(36, 'App\\Models\\Driver', 12, 'ClientToken', '535694d61aff0329959f18b42f31f17a7245ff972b44fcbe0419a756c551b0ca', '[\"*\"]', NULL, NULL, '2023-02-22 11:04:39', '2023-02-22 11:04:39'),
(37, 'App\\Models\\Driver', 12, 'ClientToken', '8800782e81b10b46281122f253dac4ec85e37f75e7b699a84ebd67d79d55c007', '[\"*\"]', NULL, NULL, '2023-02-22 16:44:12', '2023-02-22 16:44:12'),
(38, 'App\\Models\\Client', 9, 'ClientToken', '90718b8109509356359996fb6509e97662e0cce2a5dcd64ee1f10f20451a5d8b', '[\"*\"]', NULL, NULL, '2023-02-22 17:42:02', '2023-02-22 17:42:02'),
(39, 'App\\Models\\Client', 9, 'ClientToken', 'cc29bed5a18af68268173686cb69074e1056d53c565c3ce23862ba140c9171ff', '[\"*\"]', NULL, NULL, '2023-02-22 17:42:13', '2023-02-22 17:42:13'),
(40, 'App\\Models\\Driver', 12, 'ClientToken', '03250a7d1da468c8c740f89f7ebdec4c187f87848df523d5ff1d8fa4e5cf0de5', '[\"*\"]', NULL, NULL, '2023-02-22 17:42:19', '2023-02-22 17:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'accept_order', '0', 'public', '2021-06-01 15:39:27', '2023-01-02 09:18:27'),
(2, 'discount', '0', 'public', '2021-06-01 15:39:27', '2023-02-01 13:07:57'),
(3, 'VAT', '10', 'public', '2021-06-01 15:39:27', '2022-04-25 09:15:40'),
(4, 'delivery_cost', '2', 'public', '2021-06-01 15:39:27', '2022-11-19 12:32:35'),
(5, 'about_ar', 'عن الموقع', 'about', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(6, 'about_en', 'About Website', 'about', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(7, 'privacy_ar', 'سياسة الاسترجاع', 'privacy', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(8, 'privacy_en', 'privacy', 'privacy', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(9, 'terms_ar', 'الشروط و الاحكام', 'terms', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(10, 'terms_en', 'terms and condition', 'terms', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(11, 'technical_support', '97339115252', 'technical_support', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(12, 'website', 'http://btchocolateapp.com', 'contact', '2021-06-01 15:39:27', '2022-03-22 07:09:52'),
(13, 'phone', '97366725588', 'contact', '2021-06-01 15:39:27', '2023-01-10 14:18:27'),
(14, 'address_ar', 'المنامة, شارع الملك', 'contact', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(15, 'address_en', 'AlManama, King st', 'contact', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(16, 'facebook', 'http://facebook.com', 'contact', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(17, 'twitter', 'http://twitter.com', 'contact', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(18, 'instagram', 'http://instagram.com', 'contact', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(19, 'android_version', '1.43', 'mobile_app', '2021-06-01 15:39:27', '2023-01-18 14:40:48'),
(20, 'ios_version', '3.04', 'mobile_app', '2021-06-01 15:39:27', '2023-01-18 13:40:55'),
(21, 'android_link', 'https://google.com', 'mobile_app', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(22, 'ios_link', 'https://google.com', 'mobile_app', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(23, 'copyright_name', 'Emcan', 'mobile_app', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(24, 'copyright_link', 'https://www.instagram.com/emcansolutions', 'mobile_app', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(25, 'min_order', '1', 'public', '2021-06-01 15:39:27', '2021-06-01 15:39:27'),
(26, 'confirm_order_ar', 'في حال عدم توفر التفاصيل المحددة لطلبكم سيتم تنسيق الطلب حسب المتوفر من الوان الورد وقطع الشوكولاتة التي تتناسب مع طلبكم', 'confirm_order', '2021-08-18 12:05:19', '2022-09-27 14:47:18'),
(27, 'confirm_order_en', 'In the event that the specific details of your request are not available, the order will be coordinated according to the available colors of roses and chocolate pieces that match your request', 'confirm_order', '2021-08-18 12:05:19', '2022-09-27 14:47:18'),
(28, 'order_time_ar', 'موعد التوصيل سيتم بالتنسيق مع المرسل له وعلى الوقت الذي يناسبه للاستلام', 'order_time', '2021-08-22 08:26:04', '2022-09-27 14:36:58'),
(29, 'order_time_en', 'Delivery will be in coordination with the sender and at the time that suits him for receipt', 'order_time', '2021-08-22 08:26:04', '2022-09-27 14:36:58'),
(30, 'whatsApp_message', '97336923388', 'settings', '2022-05-29 11:52:43', '2023-01-04 09:20:20'),
(31, 'email', 'Btchocolate81@gmail.com', 'settings', '2022-05-29 12:01:33', '2023-01-04 09:20:20'),
(32, 'order_min_time', '60', 'order_time', '2021-08-22 08:26:04', '2023-02-07 18:09:59'),
(33, 'order_closeing_time', '22:00', 'order_time', '2021-08-22 08:26:04', '2022-08-17 14:41:09');

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$AcnJXw5PcxLHel/5YrFNZeYQAb.KlinRGh6JOUSEFh2VXesqtDgoG', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_tokens`
--
ALTER TABLE `device_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_tokens_client_id_foreign` (`client_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers_device_token`
--
ALTER TABLE `drivers_device_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drivers_device_token_driver_id_foreign` (`driver_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `drivers_device_token`
--
ALTER TABLE `drivers_device_token`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `device_tokens`
--
ALTER TABLE `device_tokens`
  ADD CONSTRAINT `device_tokens_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drivers_device_token`
--
ALTER TABLE `drivers_device_token`
  ADD CONSTRAINT `drivers_device_token_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
