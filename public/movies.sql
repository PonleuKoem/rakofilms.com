-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2017 at 03:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2DW9RXBfZhGufeEzorifxwW2hgbTP9Sj', 1, '2016-12-07 04:52:28', '2016-12-07 04:19:54', '2016-12-07 04:52:28'),
(13, 15, 'UAdcRONfi5For7qe9Yeb3dzHmS1FFrpA', 1, '2016-12-07 05:55:27', '2016-12-07 05:54:57', '2016-12-07 05:55:27'),
(14, 17, 'ZCHm5zIBOcIqh1UuHBjZXqYMETtUbaso', 0, NULL, '2016-12-22 14:44:13', '2016-12-22 14:44:13'),
(15, 18, '1ZdBlZI8DuxVbhHs40nVPRQL3YjMlZJJ', 0, NULL, '2016-12-22 14:44:50', '2016-12-22 14:44:50'),
(16, 19, 'BB4ptxDdPggwzJJWJcX5dYJKr6pznYZy', 0, NULL, '2016-12-22 14:45:13', '2016-12-22 14:45:13'),
(17, 20, 'QIcRI0MY3ShrCVHMvVhwxxajjIGPWvgL', 0, NULL, '2016-12-22 14:46:03', '2016-12-22 14:46:03'),
(18, 21, 'YEPj3xBHPzSeBpRMl3Ipbj7RCzcG5aSI', 0, NULL, '2016-12-22 14:46:27', '2016-12-22 14:46:27'),
(19, 22, 'I6prfqyAMAzee1sGrtRxD53OQOwTmC6q', 0, NULL, '2016-12-22 14:48:41', '2016-12-22 14:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(3, '2016_12_08_231729_create_items_table', 2),
(4, '2016_12_09_072542_create_post_table', 3),
(5, '2016_12_19_013545_create_nerds_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(5, 1, '2RB3IMXgsVDgbgj2YUH6fTO9cyU0VtjX', '2016-12-07 09:25:35', '2016-12-07 09:25:35'),
(7, 15, 'uOHFahi9F01k52mrUZdZewlYImafVOCj', '2016-12-07 11:27:36', '2016-12-07 11:27:36'),
(12, 1, 'KTMfVQgCh3lDFBYXHOxQ98ENecp0CZdq', '2016-12-08 08:21:03', '2016-12-08 08:21:03'),
(13, 1, 'MscxpD21evJJMgzUKnC5G51wyUHkahzO', '2016-12-08 10:03:43', '2016-12-08 10:03:43'),
(14, 1, 'GBnGyrjvklkFflDhI3huEMHLGLbVzRoD', '2016-12-08 13:38:32', '2016-12-08 13:38:32'),
(16, 1, '5OXMfdU68eg0tf7CpbPrqVyr2jK7941h', '2016-12-08 17:05:43', '2016-12-08 17:05:43'),
(17, 1, 'b289z6jyjdLOMl2rY4eWXeeY90zBam2l', '2016-12-09 00:54:59', '2016-12-09 00:54:59'),
(19, 1, 'Bq7TpevCPttYBArV2D0tOXokVrvcNzuM', '2016-12-09 06:58:33', '2016-12-09 06:58:33'),
(20, 1, 'vyEnOefAxn7gAJfb54tjT3x2JCnz0Lsm', '2016-12-09 11:06:38', '2016-12-09 11:06:38'),
(21, 1, 'GG4zRg5NTeNpZOLL4QyBdsIEpuAczJ2n', '2016-12-09 13:53:43', '2016-12-09 13:53:43'),
(22, 1, 'QKgIRFSqrt0OWN4CxJgHXrrBticT8Sih', '2016-12-10 01:39:46', '2016-12-10 01:39:46'),
(23, 1, 'qXGUp48ii0ugPMyFL1IYN7NyouVh9l5W', '2016-12-10 02:44:05', '2016-12-10 02:44:05'),
(24, 1, 'FreXvln0LOsDg8GobFkZS5GsSZxtmIuS', '2016-12-10 08:49:26', '2016-12-10 08:49:26'),
(25, 1, '6vtqnjfm1fKbP6OVZNerKjUVzrpuDzH7', '2016-12-17 01:42:03', '2016-12-17 01:42:03'),
(26, 1, 'PcoQL8SJH0lYArARLlC8xgmQdlnd4IJ6', '2016-12-17 11:17:19', '2016-12-17 11:17:19'),
(27, 1, 'wlGxpToKhpJMZ5M7CNRwRjJ7tdwRTopZ', '2016-12-18 01:43:43', '2016-12-18 01:43:43'),
(28, 1, 'bMpEbsVbl1UcLJV6z9q2w07jzxWG6frk', '2016-12-18 13:56:46', '2016-12-18 13:56:46'),
(30, 1, 'fX7Rjpjk8XTfnQNcnkcX9lmEKKCIj60F', '2016-12-18 14:44:53', '2016-12-18 14:44:53'),
(33, 1, 'vMZ6BIActUEfj9XkWV4BhLcwuLsuWtEL', '2016-12-19 09:15:39', '2016-12-19 09:15:39'),
(34, 1, 'esLwH01YiffC23CHxQiHgxSPfP0zg7PK', '2016-12-20 08:09:38', '2016-12-20 08:09:38'),
(35, 1, 'DvB6VRiCMJCCwAWzN5lxao9WKNoj8iwn', '2016-12-20 08:10:21', '2016-12-20 08:10:21'),
(36, 1, 'DsMXbGSTjOtCOGqo12dyvUOVaNevm24p', '2016-12-20 08:24:55', '2016-12-20 08:24:55'),
(37, 1, 's0O5RQt496edK2UQGtV8itrd8LSLYG0E', '2016-12-20 08:28:46', '2016-12-20 08:28:46'),
(38, 1, 'VhgzYGvuRVPKJWd7fUXBr3BzMNJnJnYT', '2016-12-20 08:41:35', '2016-12-20 08:41:35'),
(39, 1, '63GxG7VVrfIT1Xq5NVvzN342vvvc55X9', '2016-12-20 09:03:00', '2016-12-20 09:03:00'),
(40, 1, 'bVClGMItJWnu5nS6t4ciSAbXpoSG94Lh', '2016-12-20 09:04:39', '2016-12-20 09:04:39'),
(41, 1, 'rfyiPjz5ANob40auzqNSzaeerjVDw0C0', '2016-12-20 09:05:53', '2016-12-20 09:05:53'),
(42, 1, 'choSohoGlGw0htqZcSPNgXGB7KCBrzt4', '2016-12-20 09:12:04', '2016-12-20 09:12:04'),
(43, 1, 'hXrXFY3j19YTrB39YL4vcfmqicD1eRir', '2016-12-20 09:13:24', '2016-12-20 09:13:24'),
(44, 1, '19s4qojMYpgPsuCO0q9F5nLNzAfSCALJ', '2016-12-20 11:10:14', '2016-12-20 11:10:14'),
(54, 1, 'IIotww1Urwoyj1HX6mTn89fVTDaV7vmV', '2016-12-22 15:12:14', '2016-12-22 15:12:14'),
(58, 1, 'Uj3REJxkRvzxXMKFuMh4uLRoJH9vU6Pg', '2016-12-22 16:00:37', '2016-12-22 16:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, NULL, NULL),
(2, 'manager', 'Manager', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2016-12-07 04:19:54', '2016-12-07 04:19:54'),
(2, 2, '2016-12-07 05:17:36', '2016-12-07 05:17:36'),
(4, 2, '2016-12-07 05:18:48', '2016-12-07 05:18:48'),
(6, 2, '2016-12-07 05:20:01', '2016-12-07 05:20:01'),
(7, 2, '2016-12-07 05:22:42', '2016-12-07 05:22:42'),
(8, 2, '2016-12-07 05:23:16', '2016-12-07 05:23:16'),
(9, 2, '2016-12-07 05:23:53', '2016-12-07 05:23:53'),
(10, 2, '2016-12-07 05:44:08', '2016-12-07 05:44:08'),
(11, 2, '2016-12-07 05:47:16', '2016-12-07 05:47:16'),
(12, 2, '2016-12-07 05:50:44', '2016-12-07 05:50:44'),
(13, 2, '2016-12-07 05:53:28', '2016-12-07 05:53:28'),
(14, 2, '2016-12-07 05:54:08', '2016-12-07 05:54:08'),
(15, 1, '2016-12-07 05:54:57', '2016-12-07 05:54:57'),
(16, 2, '2016-12-18 14:21:49', '2016-12-18 14:21:49'),
(17, 2, '2016-12-18 14:24:13', '2016-12-18 14:24:13'),
(18, 2, '2016-12-18 14:24:56', '2016-12-18 14:24:56'),
(19, 2, '2016-12-18 14:31:29', '2016-12-18 14:31:29'),
(20, 2, '2016-12-22 14:46:03', '2016-12-22 14:46:03'),
(21, 2, '2016-12-18 14:32:11', '2016-12-18 14:32:11'),
(22, 2, '2016-12-22 14:48:41', '2016-12-22 14:48:41'),
(23, 2, '2016-12-18 14:35:02', '2016-12-18 14:35:02'),
(24, 2, '2016-12-18 14:35:35', '2016-12-18 14:35:35'),
(26, 2, '2016-12-18 14:37:50', '2016-12-18 14:37:50'),
(28, 2, '2016-12-18 14:39:49', '2016-12-18 14:39:49'),
(29, 2, '2016-12-18 14:43:10', '2016-12-18 14:43:10'),
(30, 2, '2016-12-18 16:01:34', '2016-12-18 16:01:34'),
(31, 2, '2016-12-18 16:04:42', '2016-12-18 16:04:42'),
(32, 2, '2016-12-18 16:13:51', '2016-12-18 16:13:51'),
(33, 2, '2016-12-18 16:14:14', '2016-12-18 16:14:14'),
(34, 2, '2016-12-18 16:16:54', '2016-12-18 16:16:54'),
(35, 2, '2016-12-18 16:17:16', '2016-12-18 16:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `years` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `description`, `img`, `url`, `years`, `type`, `active`, `created_date`, `updated_at`) VALUES
(91, 'Laravel upload images', 'Hello', 'h1.jpg', '1111111111', '2015', 'movies', 1, '2016-12-08 08:45:25', '2016-12-08 16:45:25'),
(92, 'Laravel upload image', 'Laravel upload image', '1481154972.jpg', 'https://www.youtube.com/embed/N_i3UFw0_84', '2016', 'animations', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'Laravel upload image', 'Laravel upload image', '1481154972.jpg', 'https://www.youtube.com/embed/N_i3UFw0_84', '2016', 'movies', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'Laravel upload image', 'Laravel upload image', '1481154972.jpg', 'https://www.youtube.com/embed/N_i3UFw0_84', '2016', 'movies', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'Laravel upload image', 'Laravel upload image', '1481154972.jpg', 'https://www.youtube.com/embed/N_i3UFw0_84', '2016', 'animations', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'Laravel upload imagei', 'Laravel upload image', '1481154972.jpg', 'https://www.youtube.com/embed/N_i3UFw0_84', '2015', 'movies', 1, '2016-12-21 03:26:04', '2016-12-21 11:26:04'),
(97, 'Laravel upload image1111', 'Laravel upload image', '1481154972.jpg', 'https://www.youtube.com/embed/N_i3UFw0_84', '2016', 'animations', 1, '2016-12-19 20:35:16', '2016-12-20 04:35:16'),
(104, 'KungFu Panda22ss111', '<p>sdasd</p>', '1481954442.jpg', 'asdfasdf', '2015', 'animations', 1, '2016-12-20 07:47:49', '2016-12-20 15:47:49'),
(105, 'KungFu Panda22w2sssssssssssssssssssssssssssssssssssssssssssss', '<p>asfas</p>', '1481954481.jpg', 'asdf', '2015', 'animations', 1, '2016-12-17 06:01:21', '2016-12-17 06:01:21'),
(106, 'KungFu Panda22ssssssssssssseeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '<p>sdfas</p>', '1481954628.jpg', 'sdfasd', '2014', 'animations', 1, '2016-12-17 06:03:48', '2016-12-17 06:03:48'),
(107, 'hj asd asd asd as as as as as asdasdf asdfa sdf asdf asdf asfasgs tdhtyjrtyjrtj  jtg yjrt tyj f tghjghk jgjyfghjf ghj yjtyjfgh j gu yu tyuk tyukk ki yu uk yukyu  yu k', '<p>sd</p>', '1481955718.jpg', 'sdf', '2012', 'movies', 1, '2016-12-17 06:21:59', '2016-12-17 06:21:59'),
(108, 'sdfasd', '<p>sdfa</p>', '1481958303.jpg', 'sdf', '212', 'movies', 1, '2016-12-17 07:05:03', '2016-12-17 07:05:03'),
(109, 'KungFu Panda22', '<p>ds</p>', '1481958321.jpg', 'dsd', '2115', 'movies', 1, '2016-12-17 07:05:21', '2016-12-17 07:05:21'),
(110, 'Ching Chang', '<p>asdfa</p>', '1482003370.jpg', 'asdfa', '208', 'movies', 1, '2016-12-17 19:36:11', '2016-12-17 19:36:11'),
(111, 'Ching Chang', '<p>asdfa</p>', '1482003381.jpg', 'asdfa', '2083', 'animations', 1, '2016-12-17 19:36:21', '2016-12-17 19:36:21'),
(112, 'Ching Changsss', '<p>asdfass</p>', '1482004270.jpg', 'asdfa', '2083', 'animations', 1, '2016-12-17 19:51:10', '2016-12-17 19:51:10'),
(113, 's', '<p>dfas</p>', '1482013872.jpg', 'sdfas', '212', 'animations', 1, '2016-12-17 22:31:13', '2016-12-17 22:31:13'),
(114, 'dsfa', '<p>dfasd</p>', '1482014146.jpg', 'dfads', '2011', 'animations', 1, '2016-12-19 17:05:00', '2016-12-20 01:05:00'),
(115, 'dsfa111111111', 'dfasd', '1482014174.jpg', 'dfads', '2015', 'animations', 1, '2016-12-19 18:43:49', '2016-12-20 02:43:49'),
(116, 'Laravel upload image', 'sdfas', '1482016380.jpg', 'https://www.youtube.com/embed/eFwml9ZM2So', '2012', 'animations', 1, '2016-12-17 23:13:01', '2016-12-17 23:13:01'),
(119, 'Keea', 'sdfas', '1482041375.jpg', 'https://www.youtube.com/embed/eFwml9ZM2So', '2012', 'animations', 1, '2016-12-19 18:46:05', '2016-12-20 02:46:05'),
(121, 'KungFu Panda', 'sdf', '1482392056.jpg', 'https://www.youtube.com/embed/eFwml9ZM2So', '2012', 'animations', 1, '2016-12-22 07:34:18', '2016-12-22 07:34:18'),
(122, 'KungFu Panda22222', 'sdf', '1482392301.jpg', 'https://www.youtube.com/embed/eFwml9ZM2So', '2012', 'animations', 1, '2016-12-22 07:38:43', '2016-12-22 15:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2016-12-08 01:24:55', '2016-12-08 01:24:55'),
(2, NULL, 'ip', '::1', '2016-12-08 01:24:55', '2016-12-08 01:24:55'),
(3, 1, 'user', NULL, '2016-12-08 01:24:55', '2016-12-08 01:24:55'),
(4, NULL, 'global', NULL, '2016-12-08 01:30:10', '2016-12-08 01:30:10'),
(5, NULL, 'ip', '::1', '2016-12-08 01:30:10', '2016-12-08 01:30:10'),
(6, 1, 'user', NULL, '2016-12-08 01:30:11', '2016-12-08 01:30:11'),
(7, NULL, 'global', NULL, '2016-12-08 01:30:32', '2016-12-08 01:30:32'),
(8, NULL, 'ip', '::1', '2016-12-08 01:30:32', '2016-12-08 01:30:32'),
(9, 1, 'user', NULL, '2016-12-08 01:30:32', '2016-12-08 01:30:32'),
(10, NULL, 'global', NULL, '2016-12-08 01:32:17', '2016-12-08 01:32:17'),
(11, NULL, 'ip', '::1', '2016-12-08 01:32:17', '2016-12-08 01:32:17'),
(12, 1, 'user', NULL, '2016-12-08 01:32:17', '2016-12-08 01:32:17'),
(13, NULL, 'global', NULL, '2016-12-08 01:33:45', '2016-12-08 01:33:45'),
(14, NULL, 'ip', '::1', '2016-12-08 01:33:45', '2016-12-08 01:33:45'),
(15, 1, 'user', NULL, '2016-12-08 01:33:45', '2016-12-08 01:33:45'),
(16, NULL, 'global', NULL, '2016-12-08 01:37:49', '2016-12-08 01:37:49'),
(17, NULL, 'ip', '::1', '2016-12-08 01:37:49', '2016-12-08 01:37:49'),
(18, 1, 'user', NULL, '2016-12-08 01:37:49', '2016-12-08 01:37:49'),
(19, NULL, 'global', NULL, '2016-12-08 01:43:56', '2016-12-08 01:43:56'),
(20, NULL, 'ip', '::1', '2016-12-08 01:43:56', '2016-12-08 01:43:56'),
(21, 1, 'user', NULL, '2016-12-08 01:43:56', '2016-12-08 01:43:56'),
(22, NULL, 'global', NULL, '2016-12-08 06:19:58', '2016-12-08 06:19:58'),
(23, NULL, 'ip', '::1', '2016-12-08 06:19:58', '2016-12-08 06:19:58'),
(24, 1, 'user', NULL, '2016-12-08 06:19:58', '2016-12-08 06:19:58'),
(25, NULL, 'global', NULL, '2016-12-08 10:03:29', '2016-12-08 10:03:29'),
(26, NULL, 'ip', '::1', '2016-12-08 10:03:29', '2016-12-08 10:03:29'),
(27, NULL, 'global', NULL, '2016-12-18 15:24:22', '2016-12-18 15:24:22'),
(28, NULL, 'ip', '127.0.0.1', '2016-12-18 15:24:22', '2016-12-18 15:24:22'),
(29, NULL, 'global', NULL, '2016-12-18 16:03:15', '2016-12-18 16:03:15'),
(30, NULL, 'ip', '127.0.0.1', '2016-12-18 16:03:15', '2016-12-18 16:03:15'),
(31, NULL, 'global', NULL, '2016-12-18 16:04:08', '2016-12-18 16:04:08'),
(32, NULL, 'ip', '127.0.0.1', '2016-12-18 16:04:08', '2016-12-18 16:04:08'),
(33, 1, 'user', NULL, '2016-12-18 16:04:08', '2016-12-18 16:04:08'),
(34, NULL, 'global', NULL, '2016-12-20 09:05:46', '2016-12-20 09:05:46'),
(35, NULL, 'ip', '::1', '2016-12-20 09:05:46', '2016-12-20 09:05:46'),
(36, 1, 'user', NULL, '2016-12-20 09:05:46', '2016-12-20 09:05:46'),
(37, NULL, 'global', NULL, '2016-12-22 14:23:12', '2016-12-22 14:23:12'),
(38, NULL, 'ip', '::1', '2016-12-22 14:23:12', '2016-12-22 14:23:12'),
(39, 1, 'user', NULL, '2016-12-22 14:23:12', '2016-12-22 14:23:12'),
(40, NULL, 'global', NULL, '2016-12-22 14:58:14', '2016-12-22 14:58:14'),
(41, NULL, 'ip', '::1', '2016-12-22 14:58:14', '2016-12-22 14:58:14'),
(42, NULL, 'global', NULL, '2016-12-22 14:59:26', '2016-12-22 14:59:26'),
(43, NULL, 'ip', '::1', '2016-12-22 14:59:26', '2016-12-22 14:59:26'),
(44, 1, 'user', NULL, '2016-12-22 14:59:26', '2016-12-22 14:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'hello@gmail.com', '$2y$10$krPB2JEqdl7KIkXiEqxPFO6IY6LTA97QK7WVb1v/UCFqmTifjzWT6', NULL, '2016-12-22 16:00:37', 'Hello', 'Hello', '2016-12-07 04:19:54', '2016-12-22 16:00:37'),
(15, 'ssss@maileme101.com', '$2y$10$pxVk1WdxzrHTHLZUwCny5OxxxCCB9aM/Wcl0cLzO//xuazFnAzs7i', NULL, '2016-12-07 11:27:37', 'sss', 'sss', '2016-12-07 05:54:57', '2016-12-07 11:27:37'),
(17, 'helloaasasaa@gmail.com', '$2y$10$I1POyPNg3HMiDZCGWSSg5ukUEh1feVRjFykK4QU0P23mmTp.BpJ6a', NULL, NULL, 'sss', 'sss', '2016-12-22 14:44:13', '2016-12-22 14:44:13'),
(18, 'helloaasasasasaa@gmail.com', '$2y$10$ZB2niiQJjd3QdXDUxqkIvOAqv5Vi9ZqzaLbbCOROY9GZFWMMf6MHu', NULL, NULL, 'sssqer', 'sssfasdf', '2016-12-22 14:44:50', '2016-12-22 14:44:50'),
(19, 'qw@gmail.com', '$2y$10$ouVbKlqPzi8C95cRsafFZehsrjTZBz7vK.8i70wy2sY9Oe7DRvpHW', NULL, NULL, 'asfd', 'asdf', '2016-12-22 14:45:13', '2016-12-22 14:45:13'),
(20, 'ssss@asdfasdfmaileme101.com', '$2y$10$xw6zNJjgNOzJnq5keYlzt.Hd27pnbG7TiYA60ZflAvoAoXhODNLOe', NULL, NULL, 'son', 'sunny', '2016-12-22 14:46:03', '2016-12-22 14:46:03'),
(21, 'sssserwe@maileme101.com', '$2y$10$65kGbVOIOJR/M2NHvLluVeJem9kIdqkwy.Lsa4pYb1koj7d3TO8Ta', NULL, NULL, 'son', 'sunny', '2016-12-22 14:46:27', '2016-12-22 14:46:27'),
(22, 'helloasaaaaaaaaaaa@gmail.com', '$2y$10$.xAys/z5wj7c7AIabqZCe.BtUIA0KgfmrAEWio4a13e7HZanSjk4y', NULL, NULL, 'son', 'sunny', '2016-12-22 14:48:41', '2016-12-22 14:48:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

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
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
