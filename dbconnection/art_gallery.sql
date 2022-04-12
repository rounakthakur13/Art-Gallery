-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2020 at 11:45 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidreport`
--

DROP TABLE IF EXISTS `bidreport`;
CREATE TABLE IF NOT EXISTS `bidreport` (
  `bidid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `bidder` varchar(60) NOT NULL,
  `biddatetime` varchar(60) NOT NULL,
  `bidamount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`bidid`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidreport`
--

INSERT INTO `bidreport` (`bidid`, `productid`, `bidder`, `biddatetime`, `bidamount`, `status`) VALUES
(12, 1, '1', '2011-09-15 11:03:05', 500, 1),
(13, 53, '1', '2011-09-15 11:05:18', 222, 1),
(14, 2, '1', '2011-09-15 11:06:10', 100, 1),
(15, 3, '1', '2011-09-15 11:06:36', 400, 1),
(49, 2, '2', '2020-04-07 15:56:45', 1501, 0),
(50, 2, '2', '2020-04-07 15:57:05', 1700, 0),
(51, 2, '2', '2020-04-08 17:28:11', 130000000, 0),
(52, 5, '2', '2020-04-11 18:38:52', 18000000, 0),
(53, 4, '2', '2020-05-04 20:06:28', 1201, 0),
(54, 4, '2', '2020-05-04 20:07:02', 12011, 0),
(55, 1, '2', '2020-05-04 20:09:14', 12000, 1),
(56, 53, '6', '2020-05-04 20:11:09', 120001, 1),
(57, 1, '2', '2020-05-04 20:14:52', 120002, 1),
(58, 1, '2', '2020-05-05 11:22:17', 120003, 1),
(59, 1, '2', '2020-05-05 12:18:53', 120004, 1),
(60, 1, '6', '2020-05-05 12:20:36', 120005, 1),
(61, 2, '2', '2020-05-05 12:28:44', 130000001, 0),
(62, 3, '2', '2020-05-05 12:58:12', 1201, 0),
(63, 1, '2', '2020-05-05 14:23:47', 120006, 1),
(64, 1, '2', '2020-05-06 13:17:13', 120007, 1),
(65, 55, '2', '2020-05-09 18:16:59', 20, 0),
(66, 55, '25', '2020-05-09 18:18:15', 21, 0),
(67, 56, '2', '2020-05-10 13:05:19', 701, 0),
(68, 56, '2', '2020-05-10 13:05:56', 702, 0),
(69, 56, '2', '2020-05-10 13:06:37', 703, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(4) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(150) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Painting'),
(2, 'Sculpture');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'akash', 'neashonly@gmail.com', 'ldfjdkf', 'hihihi'),
(2, 'akash', 'dakash952177@gmail.com', 'ldfjdkf', 'fuck'),
(3, 'ds', 'ad952177@gmail.comd', 'ho', 'ddfghjk'),
(4, 'hello', 'dakash952177@gmail.com', 'ldfjdkf', 'xcxcx');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `account_type` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `password`, `email`, `mobile`, `address`, `account_type`, `image`, `created_at`, `updated_at`) VALUES
(32, 'akash', '123456', 'ad952177@gmail.com', '8699310353', 'qwerty', 'Buyer', '1.jpg', '2020-05-22 12:29:35', '0000-00-00 00:00:00'),
(51, 'Bk', '123456', 'neashonly@gmail.com', '8699310353', 'Miranpur', 'Artist', 'IMG_20181207_102418_edit.jpg', '2020-05-23 08:25:34', '2020-05-23 08:25:34'),
(52, 'Shekhar', '123456', 'dakash952177@gmail.com', '8699310353', 'Jalandhar', 'Artist', 'IMG_20181210_120623.jpg', '2020-05-23 08:30:26', '2020-05-23 08:30:26'),
(53, 'Jasskaran', '123456', 'jasss@gmail.com', '234567890', 'Sofi Pind', 'Artist', '1590222727.jpeg', '2020-05-23 08:32:08', '2020-05-23 08:32:08'),
(54, 'Mohit', '123456', 'Mohit@gmail.com', '1111111111', 'Bhargo Camp', 'Artist', '1590222792.jpeg', '2020-05-23 08:33:12', '2020-05-23 08:33:12'),
(55, 'Kamal', '123456', 'Kamal@gmail.com', '2222222222', 'Jamsher', 'Artist', '1590222859.jpeg', '2020-05-23 08:34:19', '2020-05-23 08:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_22_060722_add_votes_to_login_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(150) NOT NULL,
  `category_id` int(11) NOT NULL,
  `prod_description` varchar(500) NOT NULL,
  `prod_image` varchar(200) NOT NULL,
  `regular_price` int(11) NOT NULL,
  `date_posted` date NOT NULL,
  `due_date` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `starting_bid` int(150) NOT NULL,
  `artist` varchar(200) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `prod_name`, `category_id`, `prod_description`, `prod_image`, `regular_price`, `date_posted`, `due_date`, `status`, `starting_bid`, `artist`) VALUES
(1, 'Art-1', 1, 'lorem', 'link1.jpg', 1000, '2020-04-08', '2020-05-09', '1', 1200, 'Bk'),
(3, 'Green Leaf', 1, 'helo', '8.jpg', 200, '2020-04-08', '2021-04-13', '0', 1200, 'Bk'),
(4, 'Scenery', 1, 'dfdsfdf', '4.jpg', 200, '2020-04-08', '2020-07-13', '0', 1200, 'Bk'),
(5, 'Yoga', 1, 'tgere', '7.png', 1000, '2020-04-08', '2020-06-13', '0', 1200, 'Shekhar'),
(58, 'Horses', 2, 'Old Horses Sculpture', 'Untitled-6.jpg', 450, '2020-05-10', '2020-07-16', '0', 600, 'Bk'),
(59, 'Cute Cat', 1, 'She is not a bad omen.', 'Untitled-9.jpg', 1500, '2020-05-10', '2020-06-16', '0', 1500, 'Bk'),
(57, 'Pain', 2, 'Men in Pain', 'Untitled-5.jpg', 1000, '2020-05-10', '2020-06-08', '0', 1300, 'Shekhar'),
(56, 'Princess', 1, 'Cute Princess', 'Untitled-3.jpg', 500, '2020-05-10', '2020-05-31', '0', 700, 'Shekhar'),
(60, 'Bow', 2, 'Arrow and Bow', 'Untitled-10.jpg', 250, '2020-05-18', '2020-05-30', '0', 450, 'Shekhar'),
(61, 'Cat', 1, 'Cat With Lamp', 'Untitled-7.jpg', 400, '2020-05-23', '2020-05-31', '0', 405, 'Kamal'),
(62, 'Cat', 1, 'Cat With Lamp', 'Untitled-7.jpg', 400, '2020-05-23', '2020-05-31', '0', 405, 'Kamal'),
(63, 'ds', 1, 'fdfgd', 'bidding report.PNG', 2, '2020-05-23', '2020-06-02', '0', 4, 'Kamal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'akash', 'ad952177@gmail.com', NULL, '$2y$10$Ema4S0J6G1VKq4lDzDs36OAj5AiLREkOIW3pMeC7NM9fyCZtCs.M6', 'UQKEW3d3SNEahwdGdaPhvQTE47Gis6WILxlaYe52zoY2so2Sw7XRArqz0Ugw', '2020-05-20 14:02:51', '2020-05-19 08:14:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
