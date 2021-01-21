-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2020 at 03:11 AM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broofiix_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `role`, `active`, `deleted`) VALUES
(1, 'bright', 'Bright', 'Nanevie', 'emehado@gmail.com', '8b1a9953c4611296a827abf8c47804d7', 'admin', 1, 1),
(2, 'adolf', 'Adolf', 'Okrah', 'adolfokrah1@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'admin', 1, 0),
(40, 'Kbright', 'bright', 'Quansah', '', '7a768daa42d0fd64bbb06172a013623a', 'admin', 1, 0),
(44, 'adwoaObikyere', 'Dorcas', 'Obikyere', '', 'b31bb74b6b23519c0c71969fa5043f4c', 'admin', 1, 0),
(43, 'yakubu', 'ibrahim', 'yakubu', '', '1e47076010b81a004351eaf6d6e2d433', 'hotel', 1, 0),
(42, 'Mr.JOE', 'Martin', 'Quaicoe', '', '962e56a8a0b0420d87272a682bfd1e53', 'hotel', 1, 0),
(41, 'Adams', 'Salifu', 'Adams', '', '109d2dd3608f669ca17920c511c2a41e', 'hotel', 1, 0),
(39, 'Kweku Antwi', 'Bright', 'Quansah', '', '7a768daa42d0fd64bbb06172a013623a', 'admin', 0, 1),
(38, 'Network1', 'Nana', 'Ama', '', '589ef52cb06778c2c7edebc71c2460ad', 'hotel', 1, 0),
(37, 'NETWORK 1', 'NANA', 'AMA', '', 'bea8ad78091ba7e1c51fe2396f7ae85b', 'admin', 0, 1),
(36, 'KOFI', 'NANA', 'KOFI', '', '7b7a53e239400a13bd6be6c91c4f6c4e', 'hotel', 1, 0),
(35, 'yussif2', 'yussif', 'suleman', '', 'efe2d094f516b62a1b1afcfcc57365b9', 'bar', 1, 0),
(34, 'yussif', 'yussif', 'suleman', '', 'efe2d094f516b62a1b1afcfcc57365b9', 'hotel', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bar_history`
--

CREATE TABLE `bar_history` (
  `bh_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `item` varchar(80) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` double NOT NULL,
  `total_cost` double NOT NULL,
  `price` double NOT NULL,
  `limit_alert` int(11) NOT NULL,
  `action` tinytext NOT NULL,
  `worth` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bar_history`
--

INSERT INTO `bar_history` (`bh_id`, `user`, `item`, `quantity`, `cost`, `total_cost`, `price`, `limit_alert`, `action`, `worth`, `date`) VALUES
(1, 'yussif suleman', 'fanta bottle', 1, 0, 0, 0, 0, 'deletion', 2, '2020-02-29 09:02:47'),
(2, 'yussif suleman', 'sprite bottle', 1, 0, 0, 0, 0, 'deletion', 2, '2020-02-29 09:02:07'),
(3, 'yussif suleman', 'Heineken Bottle', 5, 0, 0, 0, 0, 'deletion', 25, '2020-02-29 09:02:13'),
(4, 'yussif suleman', 'Star Small', 0, 0, 0, 0, 0, 'deletion', 0, '2020-02-29 09:02:26'),
(5, 'yussif suleman', 'Shandy Big', 1, 0, 0, 0, 0, 'deletion', 6, '2020-02-29 09:02:30'),
(6, 'yussif suleman', 'Joy twedee', 60, 0, 0, 0, 0, 'deletion', 60, '2020-02-29 09:02:44'),
(7, 'yussif suleman', 'Red Bull', 1, 0, 0, 0, 0, 'deletion', 5, '2020-02-29 09:02:22'),
(8, 'yussif suleman', 'Castle Bridge', 1, 0, 0, 0, 0, 'deletion', 1, '2020-03-02 01:03:51'),
(9, 'yussif suleman', 'Kpoo keke Bottle', 1, 0, 0, 0, 0, 'deletion', 1, '2020-03-02 01:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `bar_operations_history`
--

CREATE TABLE `bar_operations_history` (
  `boh_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `item` tinytext NOT NULL,
  `detail_type` tinytext NOT NULL,
  `figure` double NOT NULL,
  `initial` double NOT NULL,
  `new_fig` int(11) NOT NULL,
  `action` tinytext NOT NULL,
  `action_worth` double NOT NULL,
  `worth` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bar_operations_history`
--

INSERT INTO `bar_operations_history` (`boh_id`, `user`, `item`, `detail_type`, `figure`, `initial`, `new_fig`, `action`, `action_worth`, `worth`, `date`) VALUES
(1, 'yussif suleman', 'Vita Milk', 'quantity', 183, 2, 185, 'increased', 915, 925, '2020-02-29 09:02:29'),
(2, 'yussif suleman', 'Malta Guiness Can', 'quantity', 1, 1, 2, 'increased', 5, 10, '2020-02-29 09:02:29'),
(3, 'yussif suleman', 'Coke bottle', 'quantity', 92, 0, 92, 'increased', 184, 184, '2020-02-29 09:02:29'),
(4, 'yussif suleman', 'Sminoff', 'quantity', 104, 3, 107, 'increased', 520, 535, '2020-02-29 09:02:29'),
(5, 'yussif suleman', 'Alvaro', 'quantity', -20, 27, 7, 'decreased', -80, 28, '2020-02-29 09:02:29'),
(6, 'yussif suleman', 'Voltic Midium', 'quantity', 109, 4, 113, 'increased', 327, 339, '2020-02-29 09:02:29'),
(7, 'yussif suleman', 'Savana', 'quantity', 22, 0, 22, 'increased', 154, 154, '2020-02-29 09:02:29'),
(8, 'yussif suleman', 'Star Big', 'quantity', 11, 0, 11, 'increased', 66, 66, '2020-02-29 09:02:29'),
(9, 'yussif suleman', 'Voltic Big', 'quantity', 143, 4, 147, 'increased', 572, 588, '2020-02-29 09:02:29'),
(10, 'yussif suleman', 'Don Simon', 'quantity', 43, 3, 46, 'increased', 430, 460, '2020-02-29 09:02:29'),
(11, 'yussif suleman', 'Origin Beer', 'quantity', 80, 0, 80, 'increased', 480, 480, '2020-02-29 09:02:30'),
(12, 'yussif suleman', 'Club Beer', 'quantity', 105, 4, 109, 'increased', 630, 654, '2020-02-29 09:02:31'),
(13, 'yussif suleman', ' Malta Guiness (Glass) ', 'quantity', 270, 0, 270, 'increased', 1080, 1080, '2020-02-29 09:02:11'),
(14, 'yussif suleman', 'Heineken Can', 'price', 2, 5, 7, 'increased', 0, 28, '2020-02-29 09:02:00'),
(15, 'yussif suleman', 'Heineken Can', 'quantity', 28, 4, 32, 'increased', 196, 224, '2020-02-29 09:02:09'),
(16, 'yussif suleman', 'Twedea Bitter', 'quantity', 59, 1, 60, 'increased', 59, 60, '2020-02-29 09:02:13'),
(17, 'yussif suleman', 'Abe Suoa', 'quantity', -4, 20, 16, 'decreased', -4, 16, '2020-02-29 09:02:53'),
(18, 'yussif suleman', 'Dry Gin', 'quantity', 89, 1, 90, 'increased', 89, 90, '2020-02-29 09:02:16'),
(19, 'yussif suleman', 'Voltic Midium', 'quantity', 1, 113, 114, 'increased', 3, 342, '2020-02-29 09:02:30'),
(20, 'yussif suleman', 'Don Simon', 'quantity', -12, 46, 34, 'decreased', -120, 340, '2020-03-02 12:03:16'),
(21, 'yussif suleman', 'Guiness', 'quantity', 250, 0, 250, 'increased', 1250, 1250, '2020-03-02 12:03:35'),
(22, 'yussif suleman', 'Faxe Beer', 'quantity', 7, 5, 12, 'increased', 70, 120, '2020-03-02 12:03:51'),
(23, 'yussif suleman', 'Kiss', 'quantity', -7, 15, 8, 'decreased', -70, 80, '2020-03-02 12:03:30'),
(24, 'yussif suleman', 'Hunters', 'quantity', 7, 15, 22, 'increased', 49, 154, '2020-03-02 12:03:45'),
(25, 'yussif suleman', 'Storm', 'price', -1, 5, 4, 'decreased', 0, 16, '2020-03-02 12:03:41'),
(26, 'yussif suleman', 'Storm', 'quantity', 9, 4, 13, 'increased', 36, 52, '2020-03-02 12:03:41'),
(27, 'yussif suleman', 'Shandy', 'quantity', -2, 31, 29, 'decreased', -10, 145, '2020-03-02 12:03:22'),
(28, 'yussif suleman', 'Darling', 'quantity', -5, 15, 10, 'decreased', -20, 40, '2020-03-02 12:03:09'),
(29, 'yussif suleman', 'Shandy', 'price', 1, 5, 6, 'increased', 0, 174, '2020-03-02 12:03:22'),
(30, 'yussif suleman', 'Sminoff', 'price', 1, 5, 6, 'increased', 0, 642, '2020-03-02 12:03:49'),
(31, 'yussif suleman', 'kpoo keke', 'quantity', 6, 7, 13, 'increased', 90, 195, '2020-03-02 12:03:40'),
(32, 'yussif suleman', 'Choice', 'quantity', -1, 12, 11, 'decreased', -1, 11, '2020-03-02 01:03:43'),
(33, 'yussif suleman', 'Madringo', 'price', 0.5, 1, 2, 'increased', 0, 1.5, '2020-03-02 01:03:00'),
(34, 'yussif suleman', 'Madringo', 'quantity', 5, 1, 6, 'increased', 7.5, 9, '2020-03-02 01:03:00'),
(35, 'yussif suleman', 'Herberfric', 'quantity', -22, 40, 18, 'decreased', -22, 18, '2020-03-02 01:03:26'),
(36, 'yussif suleman', 'Castle Bridge', 'quantity', 3, 1, 4, 'increased', 3, 4, '2020-03-02 01:03:58'),
(37, 'yussif suleman', ' Malta Guiness (Glass) ', 'quantity', -20, 266, 246, 'decreased', -80, 984, '2020-03-02 01:03:31'),
(38, 'yussif suleman', ' Malta Guiness (Glass) ', 'quantity', 20, 246, 266, 'increased', 80, 1064, '2020-03-02 01:03:29'),
(39, 'yussif suleman', 'Coke bottle', 'quantity', 120, 32, 152, 'increased', 240, 304, '2020-03-17 12:03:39'),
(40, 'yussif suleman', 'Voltic Big', 'quantity', 24, 72, 96, 'increased', 96, 384, '2020-03-17 12:03:18'),
(41, 'yussif suleman', 'Voltic Midium', 'quantity', 120, 58, 178, 'increased', 360, 534, '2020-03-17 12:03:47'),
(42, 'yussif suleman', 'Madringo', 'quantity', 20, 6, 26, 'increased', 30, 39, '2020-03-17 12:03:08'),
(43, 'yussif suleman', 'Herberfric', 'quantity', 20, 11, 31, 'increased', 20, 31, '2020-03-17 12:03:07'),
(44, 'yussif suleman', 'Choice', 'quantity', 19, 1, 20, 'increased', 19, 20, '2020-03-17 12:03:40'),
(45, 'yussif suleman', 'Abe Suoa', 'quantity', 20, 9, 29, 'increased', 20, 29, '2020-03-17 12:03:13'),
(46, 'yussif suleman', 'Abe Suoa', 'price', 0.5, 1, 2, 'increased', 0, 43.5, '2020-03-17 12:03:38'),
(47, 'yussif suleman', 'Choice', 'price', 0.5, 1, 2, 'increased', 0, 30, '2020-03-17 12:03:52'),
(48, 'yussif suleman', 'Herberfric', 'price', 0.5, 1, 2, 'increased', 0, 46.5, '2020-03-17 12:03:18'),
(49, 'yussif suleman', 'Charley ginger', 'price', 14, 1, 15, 'increased', 0, 75, '2020-03-17 12:03:03'),
(50, 'yussif suleman', 'Rush', 'quantity', 36, 1, 37, 'increased', 144, 148, '2020-03-20 02:03:38'),
(51, 'yussif suleman', 'Darling', 'quantity', 36, 1, 37, 'increased', 144, 148, '2020-03-20 02:03:25'),
(52, 'yussif suleman', 'Rush', 'quantity', -36, 37, 1, 'decreased', -144, 4, '2020-03-20 02:03:46'),
(53, 'bright Quansah', 'Kasapreko Lime', 'quantity', 4, 2, 6, 'increased', 4, 6, '2020-05-02 06:05:05'),
(54, 'bright Quansah', 'Storm', 'quantity', 24, 10, 34, 'increased', 96, 136, '2020-05-02 06:05:45'),
(55, 'bright Quansah', 'Voltic Midium', 'quantity', 72, 143, 215, 'increased', 216, 645, '2020-05-02 06:05:28'),
(56, 'bright Quansah', 'Voltic Big', 'quantity', 72, 48, 120, 'increased', 288, 480, '2020-05-02 06:05:53'),
(57, 'bright Quansah', 'Choice', 'quantity', 15, 5, 20, 'increased', 22.5, 30, '2020-05-02 06:05:21'),
(58, 'bright Quansah', 'Guiness', 'quantity', 48, 89, 137, 'increased', 240, 685, '2020-05-05 06:05:52'),
(59, 'bright Quansah', 'Don Simon', 'quantity', 24, 3, 27, 'increased', 240, 270, '2020-05-05 06:05:10'),
(60, 'bright Quansah', 'Star Big', 'quantity', 12, 0, 12, 'increased', 72, 72, '2020-05-05 06:05:12'),
(61, 'bright Quansah', 'Club Beer', 'quantity', 36, 53, 89, 'increased', 216, 534, '2020-05-05 06:05:33'),
(62, 'bright Quansah', 'Savana', 'quantity', 6, 14, 20, 'increased', 42, 140, '2020-05-05 06:05:12'),
(63, 'bright Quansah', 'Kasapreko Lime', 'quantity', 4, 5, 9, 'increased', 4, 9, '2020-05-05 06:05:38'),
(64, 'bright Quansah', 'Joy Daddy', 'quantity', 4, 40, 44, 'increased', 4, 44, '2020-05-05 06:05:21'),
(65, 'bright Quansah', 'Adonko Bitter', 'quantity', 5, 40, 45, 'increased', 5, 45, '2020-05-05 06:05:37'),
(66, 'bright Quansah', 'Hunters', 'quantity', 6, 13, 19, 'increased', 42, 133, '2020-05-05 06:05:04'),
(67, 'bright Quansah', 'Heineken Can', 'quantity', 12, 3, 15, 'increased', 84, 105, '2020-05-05 06:05:54'),
(68, 'bright Quansah', 'Kiss', 'quantity', 12, 0, 12, 'increased', 120, 120, '2020-05-05 06:05:13'),
(69, 'bright Quansah', 'Herberfric', 'quantity', 2, 31, 33, 'increased', 3, 49.5, '2020-05-05 06:05:59'),
(70, 'bright Quansah', 'Choice', 'quantity', 20, 1, 21, 'increased', 30, 31.5, '2020-05-05 06:05:03'),
(71, 'bright Quansah', 'Charley ginger', 'quantity', 3, 4, 7, 'increased', 45, 105, '2020-05-05 06:05:07'),
(72, 'bright Quansah', 'Origin Bitters', 'quantity', 2, 40, 42, 'increased', 2, 42, '2020-05-05 06:05:26'),
(73, 'bright Quansah', 'Madringo', 'quantity', 2, 26, 28, 'increased', 3, 42, '2020-05-05 06:05:59'),
(74, 'bright Quansah', 'Dry Gin', 'quantity', 1, 90, 91, 'increased', 1, 91, '2020-05-05 06:05:45'),
(75, 'bright Quansah', 'Darling', 'quantity', 24, 25, 49, 'increased', 96, 196, '2020-05-05 06:05:29'),
(76, 'bright Quansah', 'Twedea Bitter', 'quantity', 3, 60, 63, 'increased', 3, 63, '2020-05-05 06:05:13'),
(77, 'bright Quansah', 'kpoo keke', 'quantity', 3, 5, 8, 'increased', 45, 120, '2020-05-05 06:05:59'),
(78, 'bright Quansah', 'Voltic Midium', 'quantity', 60, 100, 160, 'increased', 180, 480, '2020-05-05 06:05:23'),
(79, 'bright Quansah', 'Voltic Big', 'quantity', 36, 57, 93, 'increased', 144, 372, '2020-05-05 06:05:00'),
(80, 'bright Quansah', 'Coke bottle', 'quantity', 72, 78, 150, 'increased', 144, 300, '2020-05-05 06:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `bar_products`
--

CREATE TABLE `bar_products` (
  `p_id` int(11) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `limit_alert` int(11) NOT NULL,
  `cost` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bar_products`
--

INSERT INTO `bar_products` (`p_id`, `product_name`, `quantity`, `price`, `limit_alert`, `cost`) VALUES
(1, ' Malta Guiness (Glass) ', 163, 4, 1, 4),
(2, 'Malta Guiness Can', 0, 5, 1, 5),
(3, 'Coke bottle', 150, 2, 1, 2),
(4, 'Alvaro', 0, 4, 1, 4),
(5, 'Don Simon', 27, 10, 1, 10),
(6, 'Voltic Big', 93, 4, 1, 4),
(7, 'Vita Milk', 114, 5, 1, 5),
(8, 'Voltic Midium', 160, 3, 1, 3),
(9, 'Sminoff', 58, 6, 1, 5),
(10, 'Savana', 20, 7, 1, 7),
(11, 'Origin Beer', 69, 6, 1, 6),
(12, 'Club Beer', 89, 6, 1, 6),
(13, 'Star Big', 12, 6, 1, 6),
(15, 'Guiness', 137, 5, 1, 5),
(17, 'Heineken Can', 15, 7, 1, 5),
(18, 'Faxe Beer', 10, 10, 1, 10),
(19, 'Kiss', 12, 10, 1, 10),
(20, 'Hunters', 19, 7, 1, 7),
(21, 'Rush', 1, 4, 1, 4),
(22, 'Storm', 31, 4, 1, 5),
(24, 'Shandy', 28, 6, 1, 5),
(26, 'Darling', 49, 4, 1, 4),
(27, 'Don Caser', 1, 15, 1, 15),
(28, 'Kasapreko Lime', 9, 1, 1, 1),
(29, 'Adonko Bitter', 45, 1, 4, 1),
(30, 'Joy Daddy', 44, 1, 1, 1),
(31, 'Madringo', 28, 1.5, 1, 1),
(32, 'Origin Bitters', 42, 1, 1, 1),
(33, 'Herberfric', 33, 1.5, 1, 1),
(35, 'Twedea Bitter', 63, 1, 1, 1),
(36, 'Alomo Bitters', 40, 1, 1, 1),
(37, 'kpoo keke', 8, 15, 1, 15),
(38, 'Charley ginger', 7, 15, 1, 1),
(40, 'Alomo', 0, 1, 1, 1),
(41, 'Castle Bridge', 4, 1, 1, 1),
(42, 'Dry Gin', 91, 1, 1, 1),
(43, 'Abe Suoa', 24, 1.5, 1, 1),
(44, 'Choice', 21, 1.5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bar_sales`
--

CREATE TABLE `bar_sales` (
  `bs_id` int(11) NOT NULL,
  `user` varchar(80) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_per_item` double NOT NULL,
  `subtotal` double NOT NULL,
  `profit` double NOT NULL,
  `batch_id` varchar(15) NOT NULL,
  `date_time` datetime NOT NULL,
  `returned` tinyint(1) NOT NULL,
  `qty_returned` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bar_sales`
--

INSERT INTO `bar_sales` (`bs_id`, `user`, `product_name`, `quantity`, `price_per_item`, `subtotal`, `profit`, `batch_id`, `date_time`, `returned`, `qty_returned`) VALUES
(1, 'yussif suleman', 'Voltic Midium', 8, 3, 24, 0, '200302120320', '2020-03-02 12:03:20', 0, 0),
(2, 'yussif suleman', 'Voltic Big', 9, 4, 36, 0, '200302120338', '2020-03-02 12:03:38', 0, 0),
(3, 'yussif suleman', 'Don Simon', 3, 10, 30, 0, '200302120325', '2020-03-02 12:03:25', 0, 0),
(4, 'yussif suleman', ' Malta Guiness (Glass) ', 4, 4, 16, 0, '200302120309', '2020-03-02 12:03:09', 0, 0),
(5, 'yussif suleman', 'Guiness', 6, 5, 30, 0, '200302120354', '2020-03-02 12:03:54', 0, 0),
(6, 'yussif suleman', 'Shandy', 1, 6, 6, 1, '200302120359', '2020-03-02 12:03:59', 0, 0),
(7, 'yussif suleman', 'Star Big', 2, 6, 12, 0, '200302120327', '2020-03-02 12:03:27', 0, 0),
(8, 'yussif suleman', 'Coke bottle', 12, 2, 24, 0, '200302120328', '2020-03-02 12:03:28', 0, 0),
(9, 'yussif suleman', 'Alvaro', 2, 4, 8, 0, '200302120310', '2020-03-02 12:03:10', 0, 0),
(10, 'yussif suleman', 'Vita Milk', 1, 5, 5, 0, '200302120319', '2020-03-02 12:03:19', 0, 0),
(11, 'yussif suleman', 'Sminoff', 3, 6, 18, 3, '200302120327', '2020-03-02 12:03:27', 0, 0),
(12, 'yussif suleman', 'kpoo keke', 2, 15, 30, 0, '200302120335', '2020-03-02 12:03:35', 0, 0),
(13, 'yussif suleman', 'Darling', 1, 4, 4, 0, '200305120323', '2020-03-05 12:03:23', 0, 0),
(14, 'yussif suleman', 'Voltic Midium', 8, 3, 24, 0, '200305120335', '2020-03-05 12:03:35', 0, 0),
(15, 'yussif suleman', 'Voltic Big', 23, 4, 92, 0, '200305120319', '2020-03-05 12:03:19', 0, 0),
(16, 'yussif suleman', ' Malta Guiness (Glass) ', 8, 4, 32, 0, '200305010307', '2020-03-05 01:03:07', 0, 0),
(17, 'yussif suleman', 'Guiness', 10, 5, 50, 0, '200305010340', '2020-03-05 01:03:40', 0, 0),
(18, 'yussif suleman', 'Club Beer', 1, 6, 6, 0, '200305010325', '2020-03-05 01:03:25', 0, 0),
(19, 'yussif suleman', 'Origin Beer', 1, 6, 6, 0, '200305010334', '2020-03-05 01:03:34', 0, 0),
(20, 'yussif suleman', 'Coke bottle', 14, 2, 28, 0, '200305010351', '2020-03-05 01:03:51', 0, 0),
(21, 'yussif suleman', 'Sminoff', 1, 6, 6, 1, '200305010309', '2020-03-05 01:03:09', 0, 0),
(22, 'yussif suleman', 'Darling', 6, 4, 24, 0, '200309020324', '2020-03-09 02:03:24', 0, 0),
(23, 'yussif suleman', 'Voltic Big', 43, 4, 172, 0, '200309020337', '2020-03-09 02:03:37', 0, 0),
(24, 'yussif suleman', 'Voltic Midium', 40, 3, 120, 0, '200309020337', '2020-03-09 02:03:37', 0, 0),
(25, 'yussif suleman', 'Don Simon', 11, 10, 110, 0, '200309020358', '2020-03-09 02:03:58', 0, 0),
(26, 'yussif suleman', 'Heineken Can', 1, 7, 7, 2, '200309020308', '2020-03-09 02:03:08', 0, 0),
(27, 'yussif suleman', 'Malta Guiness Can', 1, 5, 5, 0, '200309020328', '2020-03-09 02:03:28', 0, 0),
(28, 'yussif suleman', ' Malta Guiness (Glass) ', 19, 4, 76, 0, '200309020350', '2020-03-09 02:03:50', 0, 0),
(29, 'yussif suleman', 'Guiness', 31, 5, 155, 0, '200309020317', '2020-03-09 02:03:17', 0, 0),
(30, 'yussif suleman', 'Kiss', 1, 10, 10, 0, '200309020331', '2020-03-09 02:03:31', 0, 0),
(31, 'yussif suleman', 'Storm', 3, 4, 12, -3, '200309020301', '2020-03-09 02:03:01', 0, 0),
(32, 'yussif suleman', 'Star Big', 1, 6, 6, 0, '200309020313', '2020-03-09 02:03:13', 0, 0),
(33, 'yussif suleman', 'Club Beer', 13, 6, 78, 0, '200309020334', '2020-03-09 02:03:34', 0, 0),
(34, 'yussif suleman', 'Coke bottle', 34, 2, 68, 0, '200309020358', '2020-03-09 02:03:58', 0, 0),
(35, 'yussif suleman', 'Alvaro', 1, 4, 4, 0, '200309020319', '2020-03-09 02:03:19', 0, 0),
(36, 'yussif suleman', 'Vita Milk', 13, 5, 65, 0, '200309020341', '2020-03-09 02:03:41', 0, 0),
(37, 'yussif suleman', 'Sminoff', 18, 6, 108, 18, '200309020305', '2020-03-09 02:03:05', 0, 0),
(38, 'yussif suleman', 'kpoo keke', 5, 15, 75, 0, '200309020333', '2020-03-09 02:03:33', 0, 0),
(39, 'yussif suleman', 'Abe Suoa', 7, 1, 7, 0, '200309020319', '2020-03-09 02:03:19', 0, 0),
(40, 'yussif suleman', 'Choice', 10, 1, 10, 0, '200309020348', '2020-03-09 02:03:48', 0, 0),
(41, 'yussif suleman', 'Herberfric', 7, 1, 7, 0, '200309020323', '2020-03-09 02:03:23', 0, 0),
(42, 'yussif suleman', 'Darling', 2, 4, 8, 0, '200317120316', '2020-03-17 12:03:16', 0, 0),
(43, 'yussif suleman', 'Voltic Midium', 35, 3, 105, 0, '200317120350', '2020-03-17 12:03:50', 0, 0),
(44, 'yussif suleman', 'Voltic Big', 48, 4, 192, 0, '200317120328', '2020-03-17 12:03:28', 0, 0),
(45, 'yussif suleman', 'Don Simon', 8, 10, 80, 0, '200317120307', '2020-03-17 12:03:07', 0, 0),
(46, 'yussif suleman', 'Heineken Can', 1, 7, 7, 2, '200317120326', '2020-03-17 12:03:26', 0, 0),
(47, 'yussif suleman', ' Malta Guiness (Glass) ', 27, 4, 108, 0, '200317120312', '2020-03-17 12:03:12', 0, 0),
(48, 'yussif suleman', 'Kiss', 7, 10, 70, 0, '200317120354', '2020-03-17 12:03:54', 0, 0),
(49, 'yussif suleman', 'Guiness', 56, 5, 280, 0, '200317120341', '2020-03-17 12:03:41', 0, 0),
(50, 'yussif suleman', 'Faxe Beer', 1, 10, 10, 0, '200317120358', '2020-03-17 12:03:58', 0, 0),
(51, 'yussif suleman', 'Star Big', 8, 6, 48, 0, '200317120357', '2020-03-17 12:03:57', 0, 0),
(52, 'yussif suleman', 'Club Beer', 16, 6, 96, 0, '200317120318', '2020-03-17 12:03:18', 0, 0),
(53, 'yussif suleman', 'Origin Beer', 2, 6, 12, 0, '200317120334', '2020-03-17 12:03:34', 0, 0),
(54, 'yussif suleman', 'Coke bottle', 20, 2, 40, 0, '200317120354', '2020-03-17 12:03:54', 0, 0),
(55, 'yussif suleman', 'Alvaro', 1, 4, 4, 0, '200317120352', '2020-03-17 12:03:52', 0, 0),
(56, 'yussif suleman', 'Vita Milk', 8, 5, 40, 0, '200317120331', '2020-03-17 12:03:31', 0, 0),
(57, 'yussif suleman', 'Sminoff', 4, 6, 24, 4, '200317120351', '2020-03-17 12:03:51', 0, 0),
(58, 'yussif suleman', 'Savana', 1, 7, 7, 0, '200317120305', '2020-03-17 12:03:05', 0, 0),
(59, 'yussif suleman', 'kpoo keke', 1, 15, 15, 0, '200317120316', '2020-03-17 12:03:16', 0, 0),
(60, 'yussif suleman', 'Abe Suoa', 1, 1.5, 1.5, 0.5, '200317120352', '2020-03-17 12:03:52', 0, 0),
(61, 'yussif suleman', 'Choice', 14, 1.5, 21, 7, '200317120315', '2020-03-17 12:03:15', 0, 0),
(62, 'yussif suleman', 'Charley ginger', 1, 15, 15, 14, '200317120326', '2020-03-17 12:03:26', 0, 0),
(63, 'bright Quansah', 'Darling', 12, 4, 48, 0, '200502060559', '2020-05-02 06:05:59', 0, 0),
(64, 'bright Quansah', 'Voltic Midium', 115, 3, 345, 0, '200502060527', '2020-05-02 06:05:27', 0, 0),
(65, 'bright Quansah', 'Voltic Big', 63, 4, 252, 0, '200502060550', '2020-05-02 06:05:50', 0, 0),
(66, 'bright Quansah', 'Don Simon', 9, 10, 90, 0, '200502060518', '2020-05-02 06:05:18', 0, 0),
(67, 'bright Quansah', 'Don Caser', 2, 15, 30, 0, '200502060511', '2020-05-02 06:05:11', 0, 0),
(68, 'bright Quansah', 'Malta Guiness Can', 1, 5, 5, 0, '200502060530', '2020-05-02 06:05:30', 0, 0),
(69, 'bright Quansah', ' Malta Guiness (Glass) ', 49, 4, 196, 0, '200502060524', '2020-05-02 06:05:24', 0, 0),
(70, 'bright Quansah', 'Guiness', 58, 5, 290, 0, '200502060516', '2020-05-02 06:05:16', 0, 0),
(71, 'bright Quansah', 'Faxe Beer', 1, 10, 10, 0, '200502060508', '2020-05-02 06:05:08', 0, 0),
(72, 'bright Quansah', 'Storm', 3, 4, 12, -3, '200502060520', '2020-05-02 06:05:20', 0, 0),
(73, 'bright Quansah', 'Club Beer', 26, 6, 156, 0, '200502060548', '2020-05-02 06:05:48', 0, 0),
(74, 'bright Quansah', 'Origin Beer', 8, 6, 48, 0, '200502060530', '2020-05-02 06:05:30', 0, 0),
(75, 'bright Quansah', 'Hunters', 9, 7, 63, 0, '200502060519', '2020-05-02 06:05:19', 0, 0),
(76, 'bright Quansah', 'Sminoff', 23, 6, 138, 23, '200502060509', '2020-05-02 06:05:09', 0, 0),
(77, 'bright Quansah', 'Alvaro', 3, 4, 12, 0, '200502060527', '2020-05-02 06:05:27', 0, 0),
(78, 'bright Quansah', 'Vita Milk', 49, 5, 245, 0, '200502060539', '2020-05-02 06:05:39', 0, 0),
(79, 'bright Quansah', 'kpoo keke', 2, 15, 30, 0, '200502060520', '2020-05-02 06:05:20', 0, 0),
(80, 'bright Quansah', 'Abe Suoa', 4, 1.5, 6, 2, '200502060552', '2020-05-02 06:05:52', 0, 0),
(81, 'bright Quansah', 'Choice', 1, 1.5, 1.5, 0.5, '200502060550', '2020-05-02 06:05:50', 0, 0),
(82, 'bright Quansah', 'Heineken Can', 27, 7, 189, 54, '200502060550', '2020-05-02 06:05:50', 0, 0),
(83, 'bright Quansah', 'Alomo', 1, 1, 1, 0, '200502060515', '2020-05-02 06:05:15', 0, 0),
(84, 'bright Quansah', 'Kasapreko Lime', 1, 1, 1, 0, '200502060502', '2020-05-02 06:05:02', 0, 0),
(85, 'bright Quansah', 'Choice', 19, 1.5, 28.5, 9.5, '200502070544', '2020-05-02 07:05:44', 0, 0),
(86, 'bright Quansah', 'Savana', 7, 7, 49, 0, '200502070516', '2020-05-02 07:05:16', 0, 0),
(87, 'bright Quansah', 'Coke bottle', 20, 2, 40, 0, '200502080543', '2020-05-02 08:05:43', 0, 0),
(88, 'bright Quansah', 'Coke bottle', 34, 2, 68, 0, '200502080535', '2020-05-02 08:05:35', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `b_id` int(11) NOT NULL,
  `b_roomtype` varchar(100) NOT NULL,
  `b_room` int(11) NOT NULL,
  `guest_name` varchar(80) NOT NULL,
  `guest_phone` varchar(30) NOT NULL,
  `no_persons` int(11) NOT NULL,
  `checkin` datetime NOT NULL,
  `checkout` datetime NOT NULL,
  `nights` int(11) NOT NULL,
  `original_price` double NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `discount_type` varchar(30) NOT NULL,
  `discount_value` double NOT NULL,
  `extra_charge` double NOT NULL,
  `user` varchar(80) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `booked_at` varchar(50) NOT NULL,
  `discount_reason` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `extra_hours` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`b_id`, `b_roomtype`, `b_room`, `guest_name`, `guest_phone`, `no_persons`, `checkin`, `checkout`, `nights`, `original_price`, `price`, `discount`, `discount_type`, `discount_value`, `extra_charge`, `user`, `date_time_created`, `booked_at`, `discount_reason`, `status`, `extra_hours`) VALUES
(1, 'COMFORT (+FAN)', 28, 'EMINEO', '0572295913', 2, '2020-02-29 23:52:00', '2020-03-01 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-02-29 11:53:53', 'hotel', '', 'Checked out', 0),
(2, 'GOLDEN (+AC, FAN &  FRIDGE)', 18, 'MOROW', '0000', 2, '2020-02-29 23:54:00', '2020-03-01 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-02-29 11:55:55', 'hotel', '', 'Checked out', 0),
(3, 'COMFORT (+FAN)', 33, 'NANA', '0249374757', 2, '2020-02-29 23:55:00', '2020-03-01 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-02-29 11:57:32', 'hotel', '', 'Checked out', 0),
(4, 'COMFORT (+FAN)', 39, 'JOSEPH', '0242647093', 2, '2020-02-29 23:57:00', '2020-03-01 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-02-29 11:58:31', 'hotel', '', 'Checked out', 0),
(5, 'COMFORT (+FAN)', 40, 'JOSEPH', '0242647093', 2, '2020-02-29 23:58:00', '2020-03-01 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-02-29 11:59:36', 'hotel', '', 'Checked out', 0),
(6, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'josehp', '0000', 2, '2020-02-29 23:59:00', '2020-03-01 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-02-29 23:59:00', 'hotel', '', 'Checked out', 0),
(7, 'COMFORT (+FAN)', 29, 'KOBBY', '0240228835', 2, '2020-02-29 00:00:00', '2020-03-01 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-02-29 00:00:00', 'hotel', '', 'Checked out', 0),
(8, 'COMFORT (+FAN)', 25, 'MR.WILLIMS', '0276009602', 2, '2020-02-29 00:01:00', '2020-03-01 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-02-29 00:01:00', 'hotel', '', 'Checked out', 0),
(9, 'COMFORT (+FAN)', 19, 'DANNIS', '024387754', 2, '2020-02-29 00:03:00', '2020-03-01 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-02-29 00:03:00', 'hotel', '', 'Checked out', 0),
(10, 'COMFORT (+FAN)', 3, 'KWESIO', '000', 2, '2020-02-29 00:04:00', '2020-03-01 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-02-29 00:04:00', 'hotel', '', 'Checked out', 0),
(11, 'COMFORT (+FAN)', 31, 'KWESI', '0244309373', 2, '2020-02-29 00:05:00', '2020-03-01 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-02-29 00:05:00', 'hotel', '', 'Checked out', 0),
(12, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'MR ENERST', '000', 2, '2020-03-01 23:23:00', '2020-03-02 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-01 11:25:00', 'hotel', '', 'Checked out', 0),
(13, 'SHORT STAY (+FAN)', 12, 'SAMWEL', '0244425678', 2, '2020-03-01 23:25:00', '2020-03-02 12:00:00', 1, 50, 50, 0, 'fixed', 10, 0, '34', '2020-03-01 11:28:49', 'hotel', '', 'Checked out', 0),
(14, 'COMFORT (+FAN)', 37, 'MIK', '00', 1, '2020-03-02 07:55:00', '2020-03-02 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-02 07:57:50', 'hotel', '', 'Checked out', 0),
(15, 'COMFORT (+FAN)', 40, 'MOMO', '0556697527', 2, '2020-03-02 07:57:00', '2020-03-03 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-02 07:59:36', 'hotel', '', 'Checked out', 0),
(16, 'GOLDEN (+AC, FAN &  FRIDGE)', 21, 'MR SAMMY', '0208126204', 2, '2020-03-02 18:37:00', '2020-03-03 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-02 06:38:55', 'hotel', '', 'Checked out', 0),
(17, 'SHORT STAY (+FAN)', 12, 'ISAAC', '0557108097', 2, '2020-03-02 23:38:00', '2020-03-03 15:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-02 06:41:06', 'hotel', '', 'Checked out', 0),
(18, 'GOLDEN (+AC, FAN &  FRIDGE)', 18, 'VICTUR', '000', 2, '2020-03-02 18:41:00', '2020-03-03 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-02 06:42:23', 'hotel', '', 'Checked out', 0),
(19, 'COMFORT (+FAN)', 30, 'EMMMANUEL', '0208171569', 2, '2020-03-02 18:42:00', '2020-03-03 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-02 06:43:46', 'hotel', '', 'Checked out', 0),
(20, 'COMFORT (+FAN)', 40, 'MOMO', '0556697527', 2, '2020-03-02 18:43:00', '2020-03-03 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-02 06:44:32', 'hotel', '', 'Checked out', 0),
(21, 'SHORT STAY (+FAN)', 27, 'MR APPIAH', '054601595', 2, '2020-03-02 16:44:00', '2020-03-02 19:47:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-02 06:46:59', 'hotel', '', 'Checked out', 0),
(22, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'AFFI', '0504222355', 1, '2020-03-02 18:58:00', '2020-03-03 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-02 07:01:13', 'hotel', '', 'Checked out', 0),
(23, 'COMFORT (+FAN)', 9, 'SUNDAY', '0557741937', 2, '2020-03-03 07:22:00', '2020-03-03 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-03 07:25:46', 'hotel', '', 'Checked out', 0),
(24, 'COMFORT (+FAN)', 25, 'T,T', '0249386646', 2, '2020-03-03 07:25:00', '2020-03-03 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-03 07:27:40', 'hotel', '', 'Checked out', 0),
(25, 'SHORT STAY (+FAN)', 12, 'OLDMAN', 'NO NUMBER', 2, '2020-03-03 21:29:00', '2020-03-04 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-03 09:30:17', 'hotel', '', 'Checked out', 0),
(26, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'fifie ', '0504222355', 1, '2020-03-03 21:30:00', '2020-03-04 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-03 09:31:25', 'hotel', '', 'Checked out', 0),
(27, 'COMFORT (+FAN)', 40, 'MOMO', '0556697527', 2, '2020-03-03 21:32:00', '2020-03-04 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-03 09:33:08', 'hotel', '', 'Checked out', 0),
(28, 'GOLDEN (+AC, FAN &  FRIDGE)', 18, 'NO NAME', 'NO NUMBER', 2, '2020-03-04 07:35:00', '2020-03-05 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-04 07:36:40', 'hotel', '', 'Checked out', 0),
(29, 'GOLDEN (+AC, FAN &  FRIDGE)', 20, 'NO NAME', 'NO NUMBER', 1, '2020-03-04 07:36:00', '2020-03-04 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-04 07:37:32', 'hotel', '', 'Checked out', 0),
(30, 'GOLDEN (+AC, FAN &  FRIDGE)', 22, 'NO NAME', 'NO NUMBER', 1, '2020-03-04 07:37:00', '2020-03-05 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-04 07:38:24', 'hotel', '', 'Checked out', 0),
(31, 'COMFORT (+FAN)', 40, 'MOMO', '0556697527', 2, '2020-03-04 19:32:00', '2020-03-05 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-04 07:32:52', 'hotel', '', 'Checked out', 0),
(32, 'GOLDEN (+AC, FAN &  FRIDGE)', 21, 'nige', 'no number', 1, '2020-03-04 19:33:00', '2020-03-05 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-04 07:33:37', 'hotel', '', 'Checked out', 0),
(33, 'SHORT STAY (+FAN)', 12, 'KWESI', '0244226121', 2, '2020-03-04 19:33:00', '2020-03-04 16:00:00', 1, 50, 50, 0, 'fixed', 0, 40, '34', '2020-03-04 07:35:08', 'hotel', '', 'Checked out', 3.6244444444444),
(34, 'COMFORT (+FAN)', 1, 'MR BEN', '0246183013', 2, '2020-03-04 19:35:00', '2020-03-05 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-04 07:36:24', 'hotel', '', 'Checked out', 0),
(35, 'COMFORT (+FAN)', 3, 'HAJIA', '0203437840', 2, '2020-03-05 08:17:00', '2020-03-05 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-05 08:21:54', 'hotel', '', 'Checked out', 0),
(36, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'DAL', '00000000', 2, '2020-03-05 08:21:00', '2020-03-06 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-05 08:56:02', 'hotel', '', 'Checked out', 0),
(37, 'GOLDEN (+AC, FAN &  FRIDGE)', 5, 'MOROW', '0000', 1, '2020-03-05 08:56:00', '2020-03-06 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-05 08:56:50', 'hotel', '', 'Checked out', 0),
(38, 'COMFORT (+FAN)', 39, 'JOSEPH', '0242647093', 1, '2020-03-06 10:02:00', '2020-03-07 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-06 10:04:03', 'hotel', '', 'Checked out', 0),
(39, 'COMFORT (+FAN)', 4, 'VICTORIA', '00', 2, '2020-03-06 10:04:00', '2020-03-07 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-06 10:05:02', 'hotel', '', 'Checked out', 0),
(40, 'GOLDEN (+AC, FAN &  FRIDGE)', 21, 'nige', 'no number', 2, '2020-03-07 11:43:00', '2020-03-08 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-07 11:44:12', 'hotel', '', 'Checked out', 0),
(41, 'SHORT STAY (+FAN)', 12, 'OLDMAN', 'NO NUMBER', 2, '2020-03-07 11:44:00', '2020-03-08 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-07 11:44:54', 'hotel', '', 'Checked out', 0),
(42, 'GOLDEN (+AC, FAN &  FRIDGE)', 22, 'fifie ', '0504222355', 1, '2020-03-07 11:45:00', '2020-03-08 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-07 11:45:38', 'hotel', '', 'Checked out', 0),
(43, 'GOLDEN (+AC, FAN &  FRIDGE)', 18, 'GODFORED', '0557704303', 2, '2020-03-07 11:45:00', '2020-03-08 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-07 11:47:09', 'hotel', '', 'Checked out', 0),
(44, 'GOLDEN (+AC, FAN &  FRIDGE)', 20, 'nige', 'no number', 1, '2020-03-07 11:47:00', '2020-03-08 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-07 11:47:44', 'hotel', '', 'Checked out', 0),
(45, 'COMFORT (+FAN)', 19, 'CLEMENT', '0000', 2, '2020-03-07 11:47:00', '2020-03-08 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-07 11:48:40', 'hotel', '', 'Checked out', 0),
(46, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'nige', 'no number', 1, '2020-03-07 11:48:00', '2020-03-08 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-07 11:49:14', 'hotel', '', 'Checked out', 0),
(47, 'SHORT STAY (+FAN)', 12, 'MR APPIAH', '054601595', 1, '2020-03-07 11:49:00', '2020-03-08 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-07 11:50:32', 'hotel', '', 'Checked out', 0),
(48, 'GOLDEN (+AC, FAN &  FRIDGE)', 22, 'WISDOM', '0549710428', 2, '2020-03-07 11:51:00', '2020-03-08 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-07 11:51:48', 'hotel', '', 'Checked out', 0),
(49, 'COMFORT (+FAN)', 3, 'ROSE', '0248442038', 2, '2020-03-07 11:51:00', '2020-03-08 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-07 11:52:40', 'hotel', '', 'Checked out', 0),
(50, 'COMFORT (+FAN)', 14, 'MR FIFIE', '0000', 2, '2020-03-07 11:52:00', '2020-03-08 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-07 11:54:54', 'hotel', '', 'Checked out', 0),
(51, 'COMFORT (+FAN)', 13, 'OSAFO', '0242855734', 2, '2020-03-07 11:54:00', '2020-03-08 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-07 11:56:03', 'hotel', '', 'Checked out', 0),
(52, 'COMFORT (+FAN)', 4, 'SWEDRU', '00000000', 2, '2020-03-07 11:56:00', '2020-03-08 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-07 11:56:52', 'hotel', '', 'Checked out', 0),
(53, 'COMFORT (+FAN)', 15, 'RICHARD', '0277443299', 2, '2020-03-07 11:56:00', '2020-03-08 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-07 11:58:07', 'hotel', '', 'Checked out', 0),
(54, 'COMFORT (+FAN)', 17, 'EMERT', '0245073286', 2, '2020-03-07 11:58:00', '2020-03-08 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-07 11:59:56', 'hotel', '', 'Checked out', 0),
(55, 'COMFORT (+FAN)', 2, 'TINA', '0243548380', 2, '2020-03-07 11:59:00', '2020-03-08 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-07 12:01:04', 'hotel', '', 'Checked out', 0),
(56, 'LUXURY  (+AC, FAN, FRIDGE & WATER HEATER)', 16, 'nige', 'no number', 2, '2020-03-07 12:01:00', '2020-03-08 12:00:00', 1, 140, 140, 0, 'fixed', 0, 0, '34', '2020-03-07 12:02:48', 'hotel', '', 'Checked out', 0),
(57, 'COMFORT (+FAN)', 8, 'JOCOB', '0545057755', 2, '2020-03-07 12:02:00', '2020-03-08 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-07 12:04:10', 'hotel', '', 'Checked out', 0),
(58, 'COMFORT (+FAN)', 28, 'stephen', '0558090579', 2, '2020-03-07 22:22:00', '2020-03-08 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-07 10:24:39', 'hotel', '', 'Checked out', 0),
(59, 'COMFORT (+FAN)', 1, 'OSAFO', '0242855734', 1, '2020-03-07 22:24:00', '2020-03-08 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-07 10:25:18', 'hotel', '', 'Checked out', 0),
(60, 'GOLDEN (+AC, FAN &  FRIDGE)', 5, 'pastor', '0242855734', 1, '2020-03-07 22:26:00', '2020-03-08 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-07 10:27:37', 'hotel', '', 'Checked out', 0),
(61, 'GOLDEN (+AC, FAN &  FRIDGE)', 22, 'snake', '0000', 2, '2020-03-07 22:27:00', '2020-03-08 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-07 10:28:51', 'hotel', '', 'Checked out', 0),
(62, 'GOLDEN (+AC, FAN &  FRIDGE)', 18, 'GODFORED', '0557704303', 2, '2020-03-07 22:30:00', '2020-03-08 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-07 10:31:10', 'hotel', '', 'Checked out', 0),
(63, 'COMFORT (+FAN)', 15, 'efie', '0557704303', 1, '2020-03-07 22:31:00', '2020-03-08 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-07 10:34:01', 'hotel', '', 'Checked out', 0),
(64, 'GOLDEN (+AC, FAN &  FRIDGE)', 21, 'nige', 'no number', 1, '2020-03-08 11:12:00', '2020-03-09 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-08 11:14:17', 'hotel', '', 'Checked out', 0),
(65, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'nige', 'no number', 1, '2020-03-08 11:14:00', '2020-03-09 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-08 11:14:49', 'hotel', '', 'Checked out', 0),
(66, 'GOLDEN (+AC, FAN &  FRIDGE)', 20, 'nige', 'no number', 2, '2020-03-08 11:16:00', '2020-03-09 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-08 11:16:35', 'hotel', '', 'Checked out', 0),
(67, 'LUXURY  (+AC, FAN, FRIDGE & WATER HEATER)', 16, 'nige', 'no number', 2, '2020-03-08 11:16:00', '2020-03-09 12:00:00', 1, 140, 140, 0, 'fixed', 0, 0, '34', '2020-03-08 11:17:07', 'hotel', '', 'Checked out', 0),
(68, 'SHORT STAY (+FAN)', 12, 'MAMA', '0234480584', 2, '2020-03-08 11:17:00', '2020-03-09 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-08 11:18:03', 'hotel', '', 'Checked out', 0),
(69, 'COMFORT (+FAN)', 4, 'ALFRED', '0242230480', 2, '2020-03-08 11:18:00', '2020-03-09 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-08 11:18:55', 'hotel', '', 'Checked out', 0),
(70, 'SHORT STAY (+FAN)', 27, 'MAJIOR', '0244290576', 2, '2020-03-08 11:18:00', '2020-03-09 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-08 11:20:11', 'hotel', '', 'Checked out', 0),
(71, 'COMFORT (+FAN)', 14, 'SADIEK', '024560850', 2, '2020-03-08 11:20:00', '2020-03-09 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-08 11:21:32', 'hotel', '', 'Checked out', 0),
(72, 'COMFORT (+FAN)', 3, 'NANA KWEME', '0547897712', 1, '2020-03-08 11:21:00', '2020-03-09 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-08 11:22:45', 'hotel', '', 'Checked out', 0),
(73, 'COMFORT (+FAN)', 2, 'AWLOO', '0243968430', 2, '2020-03-08 11:22:00', '2020-03-09 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-08 11:23:58', 'hotel', '', 'Checked out', 0),
(74, 'COMFORT (+FAN)', 19, 'MAA ABENA', '055474995', 1, '2020-03-08 11:24:00', '2020-03-09 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-08 11:24:54', 'hotel', '', 'Checked out', 0),
(75, 'COMFORT (+FAN)', 39, 'JOSEPH', '0242647093', 2, '2020-03-08 11:24:00', '2020-03-09 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-08 11:25:32', 'hotel', '', 'Checked out', 0),
(76, 'COMFORT (+FAN)', 8, 'nige', 'no number', 2, '2020-03-08 11:25:00', '2020-03-09 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-08 11:26:07', 'hotel', '', 'Checked out', 0),
(77, 'COMFORT (+FAN)', 6, 'AKOSUA', '0244448025', 2, '2020-03-08 11:41:00', '2020-03-09 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-08 11:42:21', 'hotel', '', 'Checked out', 0),
(78, 'SHORT STAY (+FAN)', 27, 'ISAAC', '0559442762', 1, '2020-03-09 13:15:00', '2020-03-10 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-09 01:16:07', 'hotel', '', 'Checked out', 0),
(79, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'NO NAME', '0244088660', 2, '2020-03-09 13:16:00', '2020-03-10 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-09 01:17:22', 'hotel', '', 'Checked out', 0),
(80, 'COMFORT (+FAN)', 2, 'OSAFO', '0242855734', 2, '2020-03-09 13:17:00', '2020-03-10 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-09 01:18:11', 'hotel', '', 'Checked out', 0),
(81, 'COMFORT (+FAN)', 1, 'OSAFO', '0242855734', 2, '2020-03-09 13:18:00', '2020-03-10 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-09 01:18:42', 'hotel', '', 'Checked out', 0),
(82, 'COMFORT (+FAN)', 15, 'efie', '0557704303', 1, '2020-03-09 13:18:00', '2020-03-10 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-09 01:19:46', 'hotel', '', 'Checked out', 0),
(83, 'COMFORT (+FAN)', 19, 'OSAFO', '027737090', 2, '2020-03-09 13:19:00', '2020-03-10 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-09 01:20:40', 'hotel', '', 'Checked out', 0),
(84, 'COMFORT (+FAN)', 28, 'JOHN', '0245989521', 2, '2020-03-09 13:20:00', '2020-03-10 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-09 01:21:36', 'hotel', '', 'Checked out', 0),
(85, 'COMFORT (+FAN)', 3, 'MINTAH', '0246184935', 2, '2020-03-09 13:21:00', '2020-03-10 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-09 01:22:33', 'hotel', '', 'Checked out', 0),
(86, 'LUXURY  (+AC, FAN, FRIDGE & WATER HEATER)', 7, 'HENRY', '0243927846', 2, '2020-03-09 13:22:00', '2020-03-10 12:00:00', 1, 140, 140, 0, 'fixed', 0, 0, '34', '2020-03-09 01:24:14', 'hotel', '', 'Checked out', 0),
(87, 'COMFORT (+FAN)', 17, 'MR.KOFI', '0544849203', 2, '2020-03-09 13:24:00', '2020-03-10 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-09 01:25:13', 'hotel', '', 'Checked out', 0),
(88, 'COMFORT (+FAN)', 25, 'MOAMMED', '0203611237', 2, '2020-03-09 13:25:00', '2020-03-10 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-09 01:26:23', 'hotel', '', 'Checked out', 0),
(89, 'COMFORT (+FAN)', 8, 'MICHEAL', '0241460955', 2, '2020-03-09 13:26:00', '2020-03-10 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-09 01:27:37', 'hotel', '', 'Checked out', 0),
(90, 'SHORT STAY (+FAN)', 12, 'nige', 'GX722-15', 2, '2020-03-10 11:55:00', '2020-03-11 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-10 11:56:16', 'hotel', '', 'Checked out', 0),
(91, 'SHORT STAY (+FAN)', 27, 'KOBBY', '0244817515', 2, '2020-03-10 11:56:00', '2020-03-11 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-10 11:57:07', 'hotel', '', 'Checked out', 0),
(92, 'GOLDEN (+AC, FAN &  FRIDGE)', 22, 'YAM', '0244017186', 2, '2020-03-10 11:57:00', '2020-03-11 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-10 11:58:12', 'hotel', '', 'Checked out', 0),
(93, 'COMFORT (+FAN)', 35, 'RAMOND', '0549896136', 2, '2020-03-10 11:58:00', '2020-03-11 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-10 11:59:43', 'hotel', '', 'Checked out', 0),
(94, 'COMFORT (+FAN)', 17, 'MR.KOFI', '0544849203', 2, '2020-03-10 11:59:00', '2020-03-11 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-10 12:01:10', 'hotel', '', 'Checked out', 0),
(95, 'LUXURY  (+AC, FAN, FRIDGE & WATER HEATER)', 7, 'MR HENRY', '0244817515', 2, '2020-03-10 12:01:00', '2020-03-11 12:00:00', 1, 140, 140, 0, 'fixed', 0, 0, '34', '2020-03-10 12:03:03', 'hotel', '', 'Checked out', 0),
(96, 'COMFORT (+FAN)', 3, 'ATTA', '0248409956', 2, '2020-03-10 12:03:00', '2020-03-11 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-10 12:03:42', 'hotel', '', 'Checked out', 0),
(97, 'COMFORT (+FAN)', 40, 'EBENEZA', '0248409956', 1, '2020-03-10 12:03:00', '2020-03-11 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-10 12:06:03', 'hotel', '', 'Checked out', 0),
(98, 'COMFORT (+FAN)', 39, 'EBENEZA', '0248409956', 2, '2020-03-10 12:06:00', '2020-03-11 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-10 12:06:52', 'hotel', '', 'Checked out', 0),
(99, 'COMFORT (+FAN)', 17, 'MR KOFI', 'no number', 1, '2020-03-11 11:19:00', '2020-03-12 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-11 11:20:04', 'hotel', '', 'Checked out', 0),
(100, 'COMFORT (+FAN)', 3, 'BOGA', 'no number', 1, '2020-03-11 11:21:00', '2020-03-12 12:00:00', 1, 70, 65, 5, 'fixed', 5, 0, '34', '2020-03-11 11:27:56', 'hotel', 'he call  maame  and maame say we should give to him', 'Checked out', 0),
(101, 'COMFORT (+FAN)', 3, 'MR TAWIAH', '024840956', 2, '2020-03-12 15:31:00', '2020-03-13 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-12 03:33:26', 'hotel', '', 'Checked out', 0),
(102, 'COMFORT (+FAN)', 17, 'BOGA', 'no number', 2, '2020-03-12 15:33:00', '2020-03-13 12:00:00', 1, 70, 65, 5, 'fixed', 5, 0, '34', '2020-03-12 03:35:52', 'hotel', 'MAAME SA SHOULD GIVE TO HIM', 'Checked out', 0),
(103, 'COMFORT (+FAN)', 14, 'LAMTY', '0244036855', 1, '2020-03-12 15:35:00', '2020-03-13 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-12 03:37:23', 'hotel', '', 'Checked out', 0),
(104, 'GOLDEN (+AC, FAN &  FRIDGE)', 5, 'KWEKU', '0264366321', 1, '2020-03-12 15:37:00', '2020-03-13 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-12 03:38:43', 'hotel', '', 'Checked out', 0),
(105, 'COMFORT (+FAN)', 25, 'KATEA', '0247365454', 1, '2020-03-12 15:38:00', '2020-03-13 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-12 03:40:36', 'hotel', '', 'Checked out', 0),
(106, 'COMFORT (+FAN)', 1, 'DAVID', '0243623568', 1, '2020-03-12 15:40:00', '2020-03-13 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-12 03:41:30', 'hotel', '', 'Checked out', 0),
(107, 'COMFORT (+FAN)', 13, 'stephen', '0242911628', 2, '2020-03-12 15:41:00', '2020-03-13 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-12 03:43:13', 'hotel', '', 'Checked out', 0),
(108, 'SHORT STAY (+FAN)', 12, 'PRICCE', '0558471941', 1, '2020-03-12 15:43:00', '2020-03-13 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-12 03:43:58', 'hotel', '', 'Checked out', 0),
(109, 'COMFORT (+FAN)', 19, 'BOGA', 'no number', 2, '2020-03-13 12:05:00', '2020-03-14 12:00:00', 1, 70, 70, 0, 'fixed', 5, 0, '34', '2020-03-13 12:07:46', 'hotel', '', 'Checked out', 0),
(110, 'COMFORT (+FAN)', 4, 'DAVID', '0243623568', 1, '2020-03-13 12:07:00', '2020-03-14 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-13 12:08:18', 'hotel', '', 'Checked out', 0),
(111, 'COMFORT (+FAN)', 13, 'UCHE', '0553028287', 2, '2020-03-13 12:08:00', '2020-03-14 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-13 12:10:15', 'hotel', '', 'Checked out', 0),
(112, 'COMFORT (+FAN)', 3, 'MR TAWIAH', '024840956', 1, '2020-03-13 12:10:00', '2020-03-14 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-13 12:11:36', 'hotel', '', 'Checked out', 0),
(113, 'COMFORT (+FAN)', 15, 'NO NAME', 'no number', 2, '2020-03-13 12:11:00', '2020-03-14 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-13 12:12:12', 'hotel', '', 'Checked out', 0),
(114, 'SHORT STAY (+FAN)', 12, 'MOHAMANED', '0246949504', 1, '2020-03-13 12:12:00', '2020-03-14 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-13 12:13:08', 'hotel', '', 'Checked out', 0),
(115, 'COMFORT (+FAN)', 17, 'BOGA', 'no number', 1, '2020-03-13 12:21:00', '2020-03-14 12:00:00', 1, 70, 65, 5, 'fixed', 5, 0, '34', '2020-03-13 12:23:26', 'hotel', 'MAAME SAY WE SHOULD GIVE TO HIM', 'Checked out', 0),
(116, 'SHORT STAY (+FAN)', 27, 'OLDMAN', 'NO NUMBER', 1, '2020-03-14 10:09:00', '2020-03-15 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-14 10:10:19', 'hotel', '', 'Checked out', 0),
(117, 'COMFORT (+FAN)', 15, 'NO NAME', 'no number', 2, '2020-03-14 10:10:00', '2020-03-15 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-14 10:10:54', 'hotel', '', 'Checked out', 0),
(118, 'COMFORT (+FAN)', 17, 'BOGA', 'no number', 1, '2020-03-14 10:10:00', '2020-03-15 12:00:00', 1, 70, 65, 5, 'fixed', 5, 0, '34', '2020-03-14 10:12:06', 'hotel', 'MAAME SAY WE SHOULD GIVE TO HIM', 'Checked out', 0),
(119, 'COMFORT (+FAN)', 4, 'DAVID', '0243623568', 1, '2020-03-14 10:12:00', '2020-03-15 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-14 10:12:40', 'hotel', '', 'Checked out', 0),
(120, 'SHORT STAY (+FAN)', 12, 'ATTA', 'no number', 2, '2020-03-14 10:12:00', '2020-03-15 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-14 10:13:24', 'hotel', '', 'Checked out', 0),
(121, 'GOLDEN (+AC, FAN &  FRIDGE)', 20, 'ASAMAOH', 'no number', 2, '2020-03-14 10:13:00', '2020-03-15 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-14 10:14:21', 'hotel', '', 'Checked out', 0),
(122, 'GOLDEN (+AC, FAN &  FRIDGE)', 21, 'NANA YAM', '0244836538', 2, '2020-03-14 10:17:00', '2020-03-15 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-14 10:18:23', 'hotel', '', 'Checked out', 0),
(123, 'COMFORT (+FAN)', 31, 'BISMARK', '0246747277', 2, '2020-03-14 10:18:00', '2020-03-15 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-14 10:19:40', 'hotel', '', 'Checked out', 0),
(124, 'COMFORT (+FAN)', 40, 'KAY ', 'no number', 2, '2020-03-14 10:19:00', '2020-03-15 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-14 10:20:58', 'hotel', '', 'Checked out', 0),
(125, 'SHORT STAY (+FAN)', 27, 'KWABANA', '0261718394', 2, '2020-03-14 10:22:00', '2020-03-15 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-14 10:23:09', 'hotel', '', 'Checked out', 0),
(126, 'SHORT STAY (+FAN)', 12, 'ibrahim', '0247362727', 2, '2020-03-15 07:05:00', '2020-03-16 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-15 07:07:30', 'hotel', '', 'Checked out', 0),
(127, 'COMFORT (+FAN)', 4, 'nana abubaka', '0246634408', 1, '2020-03-15 07:07:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:08:45', 'hotel', '', 'Checked out', 0),
(128, 'COMFORT (+FAN)', 40, 'KAY ', 'no number', 1, '2020-03-15 07:08:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:09:37', 'hotel', '', 'Checked out', 0),
(129, 'COMFORT (+FAN)', 31, 'BISMARK', '0246747277', 1, '2020-03-15 07:09:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:11:00', 'hotel', '', 'Checked out', 0),
(130, 'COMFORT (+FAN)', 17, 'BOGA', 'no number', 1, '2020-03-15 07:11:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:12:01', 'hotel', '', 'Checked out', 0),
(131, 'GOLDEN (+AC, FAN &  FRIDGE)', 5, 'pastor', '0242855734', 1, '2020-03-15 07:12:00', '2020-03-16 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-15 07:13:46', 'hotel', '', 'Checked out', 0),
(132, 'COMFORT (+FAN)', 2, 'nana yam', 'no number', 2, '2020-03-15 07:13:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:14:53', 'hotel', '', 'Checked out', 0),
(133, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'malik', 'no number', 1, '2020-03-15 07:14:00', '2020-03-16 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-15 07:15:37', 'hotel', '', 'Checked out', 0),
(134, 'COMFORT (+FAN)', 1, 'magick', '02441427982', 2, '2020-03-15 07:15:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:16:53', 'hotel', '', 'Checked out', 0),
(135, 'COMFORT (+FAN)', 29, 'grasce', 'NO NUMBER', 1, '2020-03-15 07:17:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:18:13', 'hotel', '', 'Checked out', 0),
(136, 'COMFORT (+FAN)', 32, 'aliki', 'NO NUMBER', 1, '2020-03-15 07:18:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:18:55', 'hotel', '', 'Checked out', 0),
(137, 'COMFORT (+FAN)', 39, 'JOSEPH', '0242647093', 2, '2020-03-15 07:19:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:19:44', 'hotel', '', 'Checked out', 0),
(138, 'COMFORT (+FAN)', 25, 'KWABANA', '0261718394', 1, '2020-03-15 07:19:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:20:37', 'hotel', '', 'Checked out', 0),
(139, 'COMFORT (+FAN)', 3, 'KWESIO', '000', 1, '2020-03-15 07:20:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:22:38', 'hotel', '', 'Checked out', 0),
(140, 'COMFORT (+FAN)', 8, 'KWESIO', '000', 1, '2020-03-15 07:22:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:24:18', 'hotel', '', 'Checked out', 0),
(141, 'COMFORT (+FAN)', 14, 'emma', '0244486414', 2, '2020-03-15 07:24:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:25:44', 'hotel', '', 'Checked out', 0),
(142, 'COMFORT (+FAN)', 35, 'yam', '054396407', 2, '2020-03-15 07:25:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:26:38', 'hotel', '', 'Checked out', 0),
(143, 'COMFORT (+FAN)', 33, 'nana k', '0244101272', 2, '2020-03-15 07:26:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:27:44', 'hotel', '', 'Checked out', 0),
(144, 'COMFORT (+FAN)', 37, 'yam ', '054376407', 2, '2020-03-15 07:27:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:29:39', 'hotel', '', 'Checked out', 0),
(145, 'COMFORT (+FAN)', 15, 'ely', 'no number', 2, '2020-03-15 07:29:00', '2020-03-16 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-15 07:30:44', 'hotel', '', 'Checked out', 0),
(146, 'COMFORT (+FAN)', 17, 'BOGA', 'no number', 1, '2020-03-16 07:03:00', '2020-03-17 12:00:00', 1, 70, 65, 5, 'fixed', 5, 0, '34', '2020-03-16 07:04:42', 'hotel', 'MAAME SAY OK', 'Checked out', 0),
(147, 'COMFORT (+FAN)', 32, 'MR ERIC', '0546004488', 1, '2020-03-16 07:04:00', '2020-03-17 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-16 07:05:47', 'hotel', '', 'Checked out', 0),
(148, 'COMFORT (+FAN)', 3, 'MAGICK', '0244142782', 2, '2020-03-16 07:05:00', '2020-03-17 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-16 07:06:48', 'hotel', '', 'Checked out', 0),
(149, 'COMFORT (+FAN)', 25, 'KWAME', '0556615252', 2, '2020-03-16 07:06:00', '2020-03-17 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-16 07:08:54', 'hotel', '', 'Checked out', 0),
(150, 'GOLDEN (+AC, FAN &  FRIDGE)', 21, 'TARWA MAN', 'no number', 1, '2020-03-16 07:08:00', '2020-03-17 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-16 07:09:57', 'hotel', '', 'Checked out', 0),
(151, 'GOLDEN (+AC, FAN &  FRIDGE)', 22, 'MR ADAI', 'GS 821.19', 2, '2020-03-16 07:10:00', '2020-03-17 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-16 07:11:12', 'hotel', '', 'Checked out', 0),
(152, 'COMFORT (+FAN)', 28, 'FATHER', '0277146784', 1, '2020-03-16 07:11:00', '2020-03-17 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-16 07:12:53', 'hotel', '', 'Checked out', 0),
(153, 'COMFORT (+FAN)', 39, 'FALICIA', '054420230', 2, '2020-03-16 07:12:00', '2020-03-17 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-16 07:14:36', 'hotel', '', 'Checked out', 0),
(154, 'SHORT STAY (+FAN)', 12, 'SAMMY', '024425678', 2, '2020-03-16 07:14:00', '2020-03-17 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-16 07:15:42', 'hotel', '', 'Checked out', 0),
(155, 'GOLDEN (+AC, FAN &  FRIDGE)', 18, 'KIYSU', '0560467717', 2, '2020-03-16 07:15:00', '2020-03-17 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-16 07:16:55', 'hotel', '', 'Checked out', 0),
(156, 'COMFORT (+FAN)', 4, 'BENEND', '0205836385', 2, '2020-03-16 07:16:00', '2020-03-17 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-16 07:17:53', 'hotel', '', 'Checked out', 0),
(157, 'COMFORT (+FAN)', 17, 'BOGA', 'no number', 1, '2020-03-17 12:33:00', '2020-03-18 12:00:00', 1, 70, 65, 5, 'fixed', 5, 0, '34', '2020-03-17 12:36:03', 'hotel', 'maame say x ok', 'Checked out', 0),
(158, 'COMFORT (+FAN)', 28, 'kobby', 'no number', 2, '2020-03-17 12:36:00', '2020-03-18 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-17 12:38:53', 'hotel', '', 'Checked out', 0),
(159, 'GOLDEN (+AC, FAN &  FRIDGE)', 21, 'TARWA MAN', 'no number', 1, '2020-03-17 12:38:00', '2020-03-18 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-17 12:39:37', 'hotel', '', 'Checked out', 0),
(160, 'SHORT STAY (+FAN)', 12, 'john', '025981515', 2, '2020-03-17 12:39:00', '2020-03-18 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-17 12:40:23', 'hotel', '', 'Checked out', 0),
(161, 'COMFORT (+FAN)', 25, 'KASH', '055249955', 1, '2020-03-18 22:51:00', '2020-03-19 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-18 10:52:46', 'hotel', '', 'Checked out', 0),
(162, 'COMFORT (+FAN)', 17, 'BOGA', 'no number', 1, '2020-03-18 22:52:00', '2020-03-19 12:00:00', 1, 70, 65, 5, 'fixed', 5, 0, '34', '2020-03-18 10:53:57', 'hotel', 'MAAME SAY X OK', 'Checked out', 0),
(163, 'COMFORT (+FAN)', 15, 'NANA', '0249374757', 1, '2020-03-18 22:54:00', '2020-03-19 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-18 10:57:49', 'hotel', '', 'Checked out', 0),
(164, 'COMFORT (+FAN)', 3, 'EMMANEUL', '0546485714', 2, '2020-03-18 22:57:00', '2020-03-19 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-18 10:58:35', 'hotel', '', 'Checked out', 0),
(165, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'MAYO', '0503767333', 1, '2020-03-18 22:58:00', '2020-03-19 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-18 10:59:34', 'hotel', '', 'Checked out', 0),
(166, 'GOLDEN (+AC, FAN &  FRIDGE)', 22, 'UMAR', '0548997194', 2, '2020-03-19 10:38:00', '2020-03-20 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-19 10:43:29', 'hotel', '', 'Checked out', 0),
(167, 'COMFORT (+FAN)', 28, 'ANESRT', '0245070286', 2, '2020-03-19 10:43:00', '2020-03-20 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-19 10:46:28', 'hotel', '', 'Checked out', 0),
(168, 'COMFORT (+FAN)', 38, 'NANA', '0248249222', 2, '2020-03-19 10:46:00', '2020-03-20 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-19 10:47:22', 'hotel', '', 'Checked out', 0),
(169, 'COMFORT (+FAN)', 14, 'OBED', '0248159895', 2, '2020-03-19 10:47:00', '2020-03-20 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-19 10:49:28', 'hotel', '', 'Checked out', 0),
(170, 'COMFORT (+FAN)', 15, 'OFECER', 'no number', 2, '2020-03-19 10:50:00', '2020-03-20 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-19 10:51:07', 'hotel', '', 'Checked out', 0),
(171, 'SHORT STAY (+FAN)', 12, 'OLDMAN', 'NO NUMBER', 1, '2020-03-19 10:51:00', '2020-03-20 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-19 10:51:50', 'hotel', '', 'Checked out', 0),
(172, 'COMFORT (+FAN)', 17, 'BOGA', 'no number', 1, '2020-03-19 10:51:00', '2020-03-20 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-19 10:52:51', 'hotel', '', 'Checked out', 0),
(173, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'SAVIOR', '055301621', 2, '2020-03-20 11:40:00', '2020-03-21 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-20 11:41:57', 'hotel', '', 'Checked out', 0),
(174, 'COMFORT (+FAN)', 17, 'BOGA', 'NO NUMBER', 1, '2020-03-20 11:42:00', '2020-03-21 12:00:00', 1, 70, 65, 5, 'fixed', 5, 0, '34', '2020-03-20 11:42:59', 'hotel', 'MAAME SAY X OK', 'Checked out', 0),
(175, 'GOLDEN (+AC, FAN &  FRIDGE)', 5, 'OPOKU', '0546232394', 1, '2020-03-20 11:43:00', '2020-03-21 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-20 11:43:54', 'hotel', '', 'Checked out', 0),
(176, 'COMFORT (+FAN)', 32, 'GIFTY', '0241152350', 2, '2020-03-20 11:43:00', '2020-03-21 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-20 11:44:53', 'hotel', '', 'Checked out', 0),
(177, 'SHORT STAY (+FAN)', 27, 'SAMMY ', '0244425678', 2, '2020-03-20 11:44:00', '2020-03-21 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-20 11:46:04', 'hotel', '', 'Checked out', 0),
(178, 'GOLDEN (+AC, FAN &  FRIDGE)', 18, 'nige', 'NO NUMBER', 1, '2020-03-20 11:46:00', '2020-03-21 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-20 11:46:29', 'hotel', '', 'Checked out', 0),
(179, 'SHORT STAY (+FAN)', 12, 'NO NAME', 'NO NUMBER', 2, '2020-03-20 11:46:00', '2020-03-21 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-20 11:47:02', 'hotel', '', 'Checked out', 0),
(180, 'GOLDEN (+AC, FAN &  FRIDGE)', 10, 'JOSEPH', 'NO NUMBER', 2, '2020-03-20 11:47:00', '2020-03-21 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-20 11:48:00', 'hotel', '', 'Checked out', 0),
(181, 'COMFORT (+FAN)', 36, 'EMMANUEL', '0572038503', 2, '2020-03-20 11:48:00', '2020-03-21 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-20 11:49:13', 'hotel', '', 'Checked out', 0),
(182, 'COMFORT (+FAN)', 35, 'EMMANEUL', '0572038503', 2, '2020-03-20 11:49:00', '2020-03-21 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-20 11:50:22', 'hotel', '', 'Checked out', 0),
(183, 'SHORT STAY (+FAN)', 12, 'MANSAH', '0553547494', 2, '2020-03-21 10:59:00', '2020-03-22 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-21 11:01:10', 'hotel', '', 'Checked out', 0),
(184, 'COMFORT (+FAN)', 40, 'MACLIE', 'NO NUMBER', 1, '2020-03-21 11:01:00', '2020-03-22 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-21 11:01:58', 'hotel', '', 'Checked out', 0),
(185, 'COMFORT (+FAN)', 29, 'EMMANEUL', '0546485714', 2, '2020-03-21 11:02:00', '2020-03-22 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-21 11:02:35', 'hotel', '', 'Checked out', 0),
(186, 'COMFORT (+FAN)', 39, 'ERNEST', '024507306', 2, '2020-03-21 11:02:00', '2020-03-22 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-21 11:04:06', 'hotel', '', 'Checked out', 0),
(187, 'COMFORT (+FAN)', 15, 'THERASA', '054679002', 2, '2020-03-21 11:04:00', '2020-03-22 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-21 11:05:21', 'hotel', '', 'Checked out', 0),
(188, 'COMFORT (+FAN)', 36, 'MARK', '0239297969', 2, '2020-03-21 11:05:00', '2020-03-22 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-21 11:07:23', 'hotel', '', 'Checked out', 0),
(189, 'GOLDEN (+AC, FAN &  FRIDGE)', 22, 'MOROW', 'NO NUMBER', 2, '2020-03-21 11:07:00', '2020-03-22 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-21 11:09:18', 'hotel', '', 'Checked out', 0),
(190, 'COMFORT (+FAN)', 4, 'JAMES', 'NO NUMBER', 2, '2020-03-21 11:09:00', '2020-03-22 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-21 11:09:57', 'hotel', '', 'Checked out', 0),
(191, 'COMFORT (+FAN)', 1, 'NO NAME', 'NO NUMBER', 2, '2020-03-22 08:27:00', '2020-03-23 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-22 08:28:14', 'hotel', '', 'Checked out', 0),
(192, 'GOLDEN (+AC, FAN &  FRIDGE)', 21, 'UMAR', '0548997194', 2, '2020-03-22 08:28:00', '2020-03-23 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-22 08:30:14', 'hotel', '', 'Checked out', 0),
(193, 'COMFORT (+FAN)', 17, 'HANNAH', '0555493325', 1, '2020-03-22 08:30:00', '2020-03-23 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-22 08:31:38', 'hotel', '', 'Checked out', 0),
(194, 'GOLDEN (+AC, FAN &  FRIDGE)', 10, 'MOROW', '0000', 1, '2020-03-22 08:31:00', '2020-03-23 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-22 08:32:25', 'hotel', '', 'Checked out', 0),
(195, 'SHORT STAY (+FAN)', 12, 'MOJOR ', 'NO NUMBER', 2, '2020-03-23 09:14:00', '2020-03-24 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-23 09:15:16', 'hotel', '', 'Checked out', 0),
(196, 'COMFORT (+FAN)', 28, 'KWASI', '0245981315', 2, '2020-03-23 09:15:00', '2020-03-24 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-23 09:16:51', 'hotel', '', 'Checked out', 0),
(197, 'SHORT STAY (+FAN)', 27, 'NO NAME', '0246553437', 2, '2020-03-23 09:16:00', '2020-03-24 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-23 09:17:49', 'hotel', '', 'Checked out', 0),
(198, 'COMFORT (+FAN)', 14, 'MR MICHEAL', '0244509128', 2, '2020-03-23 09:17:00', '2020-03-24 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-23 09:19:09', 'hotel', '', 'Checked out', 0),
(199, 'COMFORT (+FAN)', 17, 'MUSAH', 'NO NUMBER', 2, '2020-03-23 09:19:00', '2020-03-24 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-23 09:19:44', 'hotel', '', 'Checked out', 0),
(200, 'COMFORT (+FAN)', 25, 'JOSSEY', '0279844669', 2, '2020-03-23 09:19:00', '2020-03-24 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-23 09:20:56', 'hotel', '', 'Checked out', 0),
(201, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'MALIK', '0244210649', 2, '2020-03-23 09:22:00', '2020-03-24 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-23 09:23:27', 'hotel', '', 'Checked out', 0),
(202, 'COMFORT (+FAN)', 4, 'FLICIA', '0547184673', 2, '2020-03-23 09:23:00', '2020-03-24 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-23 09:24:41', 'hotel', '', 'Checked out', 0),
(203, 'COMFORT (+FAN)', 14, 'ISAAC', '0249441566', 2, '2020-03-24 12:08:00', '2020-03-25 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-24 12:08:50', 'hotel', '', 'Checked out', 0),
(204, 'COMFORT (+FAN)', 25, 'JOSSEY', '0279844669', 2, '2020-03-24 12:08:00', '2020-03-25 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-24 12:09:30', 'hotel', '', 'Checked out', 0),
(205, 'GOLDEN (+AC, FAN &  FRIDGE)', 22, 'SAVIOR', '055301621', 1, '2020-03-24 12:09:00', '2020-03-25 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-24 12:10:07', 'hotel', '', 'Checked out', 0),
(206, 'SHORT STAY (+FAN)', 27, 'NO NAME', 'NO NUMBER', 2, '2020-03-24 12:10:00', '2020-03-25 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-24 12:10:42', 'hotel', '', 'Checked out', 0),
(207, 'SHORT STAY (+FAN)', 12, 'OLDMAN', 'NO NUMBER', 2, '2020-03-24 12:10:00', '2020-03-25 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-24 12:11:12', 'hotel', '', 'Checked out', 0),
(208, 'COMFORT (+FAN)', 3, 'BEN', '0246183013', 2, '2020-03-24 12:11:00', '2020-03-25 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-24 12:16:07', 'hotel', '', 'Checked out', 0),
(209, 'COMFORT (+FAN)', 13, 'ETI', '0244704520', 2, '2020-03-24 12:16:00', '2020-03-25 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-24 12:22:16', 'hotel', '', 'Checked out', 0),
(210, 'COMFORT (+FAN)', 31, 'KWAME', '0244716527', 2, '2020-03-24 12:22:00', '2020-03-25 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-24 12:25:15', 'hotel', '', 'Checked out', 0),
(211, 'COMFORT (+FAN)', 32, 'stephen', '0558090579', 2, '2020-03-24 12:25:00', '2020-03-25 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-24 12:26:29', 'hotel', '', 'Checked out', 0),
(212, 'COMFORT (+FAN)', 28, 'KWESI', '0244309373', 1, '2020-03-25 10:09:00', '2020-03-26 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-25 10:10:21', 'hotel', '', 'Checked out', 0),
(213, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'SAVIOR', '055301621', 1, '2020-03-25 10:14:00', '2020-03-26 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-25 10:16:01', 'hotel', '', 'Checked out', 0),
(214, 'COMFORT (+FAN)', 40, 'MR ALBERT', '05459330', 2, '2020-03-25 10:16:00', '2020-03-26 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-25 10:19:44', 'hotel', '', 'Checked out', 0),
(215, 'GOLDEN (+AC, FAN &  FRIDGE)', 21, 'nige', 'NO NUMBER', 2, '2020-03-25 10:20:00', '2020-03-26 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-25 10:21:22', 'hotel', '', 'Checked out', 0),
(216, 'GOLDEN (+AC, FAN &  FRIDGE)', 22, 'nige', 'NO NUMBER', 2, '2020-03-25 10:20:00', '2020-03-26 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-25 10:23:01', 'hotel', '', 'Checked out', 0),
(217, 'COMFORT (+FAN)', 1, 'MR MOROW', 'NO NUMBER', 2, '2020-03-25 10:24:00', '2020-03-26 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-25 10:26:25', 'hotel', '', 'Checked out', 0),
(218, 'GOLDEN (+AC, FAN &  FRIDGE)', 10, 'MR MOROW', 'NO NUMBER', 1, '2020-03-25 17:54:00', '2020-03-26 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-25 05:56:45', 'hotel', '', 'Checked out', 0),
(219, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'SAVIOR', '055301621', 1, '2020-03-26 10:13:00', '2020-03-27 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-26 10:14:06', 'hotel', '', 'Checked out', 0),
(220, 'COMFORT (+FAN)', 1, 'MR ALBERT', '05459330', 2, '2020-03-26 10:14:00', '2020-03-27 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-26 10:14:38', 'hotel', '', 'Checked out', 0),
(221, 'COMFORT (+FAN)', 19, 'FRANK', '0549006646', 2, '2020-03-26 10:14:00', '2020-03-27 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-26 10:15:36', 'hotel', '', 'Checked out', 0),
(222, 'SHORT STAY (+FAN)', 27, 'KWEKU', '053676857', 2, '2020-03-26 10:15:00', '2020-03-27 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-26 10:16:57', 'hotel', '', 'Checked out', 0),
(223, 'SHORT STAY (+FAN)', 12, 'NO NAME', '0249669232', 2, '2020-03-26 10:16:00', '2020-03-27 12:00:00', 1, 50, 50, 0, 'fixed', 0, 0, '34', '2020-03-26 10:18:03', 'hotel', '', 'Checked out', 0),
(224, 'GOLDEN (+AC, FAN &  FRIDGE)', 24, 'SAVIOR', '055301621', 1, '2020-03-27 08:22:00', '2020-03-28 12:00:00', 1, 120, 120, 0, 'fixed', 0, 0, '34', '2020-03-27 08:22:39', 'hotel', '', 'Checked out', 0),
(225, 'COMFORT (+FAN)', 1, 'MR ALBERT', '05459330', 1, '2020-03-27 08:22:00', '2020-03-28 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-27 08:23:19', 'hotel', '', 'Checked out', 0),
(226, 'COMFORT (+FAN)', 13, 'OBED', 'NO NUMBER', 2, '2020-03-27 08:23:00', '2020-03-28 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-27 08:24:24', 'hotel', '', 'Checked out', 0),
(227, 'COMFORT (+FAN)', 19, 'KOBBY', '055323494', 2, '2020-03-27 08:24:00', '2020-03-28 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-27 08:25:35', 'hotel', '', 'Checked out', 0),
(228, 'COMFORT (+FAN)', 39, 'MR OLU', '0274443021', 2, '2020-03-27 08:25:00', '2020-03-28 12:00:00', 1, 70, 70, 0, 'fixed', 0, 0, '34', '2020-03-27 08:26:47', 'hotel', '', 'Checked out', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` int(11) NOT NULL,
  `logo` varchar(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `about` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `logo`, `name`, `email`, `address`, `about`) VALUES
(6, '890.png', 'Millenuim Hotel', 'info@millenniumhotegh.com', 'Kasoa, Nyanyano Road', 'The best Company in the whole world');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_records`
--

CREATE TABLE `deleted_records` (
  `d_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `b_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted_records`
--

INSERT INTO `deleted_records` (`d_id`, `user`, `date_time`, `b_id`) VALUES
(2, 2, '2020-03-24 12:55:48', 109);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `g_id` int(11) NOT NULL,
  `g_name` varchar(80) NOT NULL,
  `g_phone` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`g_id`, `g_name`, `g_phone`) VALUES
(1, 'hannah', '0547016767'),
(2, 'Johan', '0234234'),
(3, 'francia', '024035670'),
(4, 'nana', '0247799179'),
(5, 'kwesi', '0247016767'),
(6, 'emmanuel', 'ga2056'),
(7, 'kofi', '012'),
(8, 'kofi', '0247016565'),
(9, 'kwaku', '0553812468'),
(10, 'adams', '02458973'),
(11, 'nana', '0553481528'),
(12, 'nana ama', '05897366'),
(13, 'bright', '0552314250'),
(14, 'nana kojo', '0269614661'),
(15, 'adams', '0241966899'),
(16, 'mr meka', '00000000'),
(17, 'fifie', '0242334220'),
(18, 'fifie brother', '0242334220'),
(19, 'adams', '0552314250'),
(20, 'FRANK', '0553812468'),
(21, 'francia', '22222'),
(22, 'bright', '012'),
(23, 'dr mark', '02444326610'),
(24, 'mayo', '0593372810'),
(25, 'kofi', '0554670248'),
(26, 'opoku', '0546232394'),
(27, 'stephen', '0244376273'),
(28, 'adu', '000'),
(29, 'dr mark', '000'),
(30, 'dr mark', '00'),
(31, 'nana', '000'),
(32, 'no name', '0547200643'),
(33, 'ibrahim', '0542422994'),
(34, 'honck', 'no number'),
(35, 'john', '0245981315'),
(36, 'nige', 'no number'),
(37, 'josehp', '0242647093'),
(38, 'yohbou', '0542921322'),
(39, 'razika', '0242921322'),
(40, 'andy', '054656777'),
(41, 'dr mark', '012'),
(42, 'adu', '666'),
(43, 'nana', 'nana'),
(44, 'abubaka', '0246634405'),
(45, 'EMINEO', '0572295913'),
(46, 'MOROW', '0000'),
(47, 'NANA', '0249374757'),
(48, 'JOSEPH', '0242647093'),
(49, 'josehp', '0000'),
(50, 'KOBBY', '0240228835'),
(51, 'MR.WILLIMS', '0276009602'),
(52, 'DANNIS', '024387754'),
(53, 'KWESIO', '000'),
(54, 'KWESI', '0244309373'),
(55, 'MR ENERST', '000'),
(56, 'SAMWEL', '0244425678'),
(57, 'MIK', '00'),
(58, 'MOMO', '0556697527'),
(59, 'MR SAMMY', '0208126204'),
(60, 'ISAAC', '0557108097'),
(61, 'VICTUR', '000'),
(62, 'EMMMANUEL', '0208171569'),
(63, 'MR APPIAH', '054601595'),
(64, 'AFFI', '0504222355'),
(65, 'SUNDAY', '0557741937'),
(66, 'T,T', '0249386646'),
(67, 'OLDMAN', 'NO NUMBER'),
(68, 'fifie ', '0504222355'),
(69, 'NO NAME', 'NO NUMBER'),
(70, 'KWESI', '0244226121'),
(71, 'MR BEN', '0246183013'),
(72, 'HAJIA', '0203437840'),
(73, 'DAL', '00000000'),
(74, 'VICTORIA', '00'),
(75, 'GODFORED', '0557704303'),
(76, 'CLEMENT', '0000'),
(77, 'WISDOM', '0549710428'),
(78, 'ROSE', '0248442038'),
(79, 'MR FIFIE', '0000'),
(80, 'OSAFO', '0242855734'),
(81, 'SWEDRU', '00000000'),
(82, 'RICHARD', '0277443299'),
(83, 'EMERT', '0245073286'),
(84, 'TINA', '0243548380'),
(85, 'JOCOB', '0545057755'),
(86, 'stephen', '0558090579'),
(87, 'pastor', '0242855734'),
(88, 'snake', '0000'),
(89, 'efie', '0557704303'),
(90, 'MAMA', '0234480584'),
(91, 'ALFRED', '0242230480'),
(92, 'MAJIOR', '0244290576'),
(93, 'SADIEK', '024560850'),
(94, 'NANA KWEME', '0547897712'),
(95, 'AWLOO', '0243968430'),
(96, 'MAA ABENA', '055474995'),
(97, 'AKOSUA', '0244448025'),
(98, 'ISAAC', '0559442762'),
(99, 'NO NAME', '0244088660'),
(100, 'OSAFO', '027737090'),
(101, 'JOHN', '0245989521'),
(102, 'MINTAH', '0246184935'),
(103, 'HENRY', '0243927846'),
(104, 'MR.KOFI', '0544849203'),
(105, 'MOAMMED', '0203611237'),
(106, 'MICHEAL', '0241460955'),
(107, 'nige', 'GX722-15'),
(108, 'KOBBY', '0244817515'),
(109, 'YAM', '0244017186'),
(110, 'RAMOND', '0549896136'),
(111, 'MR HENRY', '0244817515'),
(112, 'ATTA', '0248409956'),
(113, 'EBENEZA', '0248409956'),
(114, 'MR KOFI', 'no number'),
(115, 'BOGA', 'no number'),
(116, 'MR TAWIAH', '024840956'),
(117, 'LAMTY', '0244036855'),
(118, 'KWEKU', '0264366321'),
(119, 'KATEA', '0247365454'),
(120, 'DAVID', '0243623568'),
(121, 'stephen', '0242911628'),
(122, 'PRICCE', '0558471941'),
(123, 'UCHE', '0553028287'),
(124, 'MOHAMANED', '0246949504'),
(125, 'ATTA', 'no number'),
(126, 'ASAMAOH', 'no number'),
(127, 'NANA YAM', '0244836538'),
(128, 'BISMARK', '0246747277'),
(129, 'KAY ', 'no number'),
(130, 'KWABANA', '0261718394'),
(131, 'ibrahim', '0247362727'),
(132, 'nana abubaka', '0246634408'),
(133, 'nana yam', 'no number'),
(134, 'malik', 'no number'),
(135, 'magick', '02441427982'),
(136, 'grasce', 'NO NUMBER'),
(137, 'aliki', 'NO NUMBER'),
(138, 'emma', '0244486414'),
(139, 'yam', '054396407'),
(140, 'nana k', '0244101272'),
(141, 'yam ', '054376407'),
(142, 'ely', 'no number'),
(143, 'MR ERIC', '0546004488'),
(144, 'MAGICK', '0244142782'),
(145, 'KWAME', '0556615252'),
(146, 'TARWA MAN', 'no number'),
(147, 'MR ADAI', 'GS 821.19'),
(148, 'FATHER', '0277146784'),
(149, 'FALICIA', '054420230'),
(150, 'SAMMY', '024425678'),
(151, 'KIYSU', '0560467717'),
(152, 'BENEND', '0205836385'),
(153, 'kobby', 'no number'),
(154, 'john', '025981515'),
(155, 'KASH', '055249955'),
(156, 'EMMANEUL', '0546485714'),
(157, 'MAYO', '0503767333'),
(158, 'UMAR', '0548997194'),
(159, 'ANESRT', '0245070286'),
(160, 'NANA', '0248249222'),
(161, 'OBED', '0248159895'),
(162, 'OFECER', 'no number'),
(163, 'SAVIOR', '055301621'),
(164, 'GIFTY', '0241152350'),
(165, 'SAMMY ', '0244425678'),
(166, 'JOSEPH', 'NO NUMBER'),
(167, 'EMMANUEL', '0572038503'),
(168, 'EMMANEUL', '0572038503'),
(169, 'MANSAH', '0553547494'),
(170, 'MACLIE', 'NO NUMBER'),
(171, 'ERNEST', '024507306'),
(172, 'THERASA', '054679002'),
(173, 'MARK', '0239297969'),
(174, 'MOROW', 'NO NUMBER'),
(175, 'JAMES', 'NO NUMBER'),
(176, 'HANNAH', '0555493325'),
(177, 'MOJOR ', 'NO NUMBER'),
(178, 'KWASI', '0245981315'),
(179, 'NO NAME', '0246553437'),
(180, 'MR MICHEAL', '0244509128'),
(181, 'MUSAH', 'NO NUMBER'),
(182, 'JOSSEY', '0279844669'),
(183, 'MALIK', '0244210649'),
(184, 'FLICIA', '0547184673'),
(185, 'ISAAC', '0249441566'),
(186, 'BEN', '0246183013'),
(187, 'ETI', '0244704520'),
(188, 'KWAME', '0244716527'),
(189, 'MR ALBERT', '05459330'),
(190, 'MR MOROW', 'NO NUMBER'),
(191, 'FRANK', '0549006646'),
(192, 'KWEKU', '053676857'),
(193, 'NO NAME', '0249669232'),
(194, 'OBED', 'NO NUMBER'),
(195, 'KOBBY', '055323494'),
(196, 'MR OLU', '0274443021');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_expenses`
--

CREATE TABLE `hotel_expenses` (
  `ex_id` int(11) NOT NULL,
  `product` varchar(49) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `total_price` double NOT NULL,
  `ex_status` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_operation_histories`
--

CREATE TABLE `hotel_operation_histories` (
  `h_id` int(11) NOT NULL,
  `operation_desc` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_operation_histories`
--

INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES
(1, '<a href=\"edit-booking?b=\"1\">\"00001\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>EMINEO,=>guest phone =>0572295913,=>no persons=>2.=>checkin=>2020-02-29 23:52:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>1', 34, '2020-02-29 11:53:53'),
(2, '<a href=\"edit-booking?b=\"2\">\"00002\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>MOROW,=>guest phone =>0000,=>no persons=>2.=>checkin=>2020-02-29 23:54:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>2', 34, '2020-02-29 11:55:55'),
(3, '<a href=\"edit-booking?b=\"3\">\"00003\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 33,=>guest name=>NANA,=>guest phone =>0249374757,=>no persons=>2.=>checkin=>2020-02-29 23:55:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>3', 34, '2020-02-29 11:57:32'),
(4, '<a href=\"edit-booking?b=\"4\">\"00004\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>JOSEPH,=>guest phone =>0242647093,=>no persons=>2.=>checkin=>2020-02-29 23:57:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>4', 34, '2020-02-29 11:58:31'),
(5, '<a href=\"edit-booking?b=\"5\">\"00005\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>JOSEPH,=>guest phone =>0242647093,=>no persons=>2.=>checkin=>2020-02-29 23:58:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>5', 34, '2020-02-29 11:59:36'),
(6, '<a href=\"edit-booking?b=\"6\">\"00006\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>josehp,=>guest phone =>0000,=>no persons=>2.=>checkin=>2020-02-29 23:59:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>6', 34, '2020-03-01 12:00:38'),
(7, '<a href=\"edit-booking?b=\"7\">\"00007\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 29,=>guest name=>KOBBY,=>guest phone =>0240228835,=>no persons=>2.=>checkin=>2020-02-29 00:00:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>7', 34, '2020-03-01 12:01:56'),
(8, '<a href=\"edit-booking?b=\"8\">\"00008\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>MR.WILLIMS,=>guest phone =>0276009602,=>no persons=>2.=>checkin=>2020-02-29 00:01:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>8', 34, '2020-03-01 12:03:27'),
(9, '<a href=\"edit-booking?b=\"9\">\"00009\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>DANNIS,=>guest phone =>024387754,=>no persons=>2.=>checkin=>2020-02-29 00:03:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>9', 34, '2020-03-01 12:04:34'),
(10, '<a href=\"edit-booking?b=\"10\">\"00010\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>KWESIO,=>guest phone =>000,=>no persons=>2.=>checkin=>2020-02-29 00:04:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>10', 34, '2020-03-01 12:05:30'),
(11, '<a href=\"edit-booking?b=\"11\">\"00011\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 31,=>guest name=>KWESI,=>guest phone =>0244309373,=>no persons=>2.=>checkin=>2020-02-29 00:05:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>11', 34, '2020-03-01 12:06:43'),
(12, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-01 07:33:06'),
(13, '<a href=\"edit-booking?b=\"11\">\"00011\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 31,=>guest name=>KWESI,=>guest phone =>0244309373,=>no persons=>2.=>checkin=>2020-02-29 00:05:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>20=>status=>Checked out=>bookings=>11', 34, '2020-03-01 10:43:35'),
(14, '<a href=\"edit-booking?b=\"1\">\"00001\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>EMINEO,=>guest phone =>0572295913,=>no persons=>2.=>checkin=>2020-02-29 23:52:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>20=>status=>Checked out=>bookings=>1', 34, '2020-03-01 10:44:13'),
(15, '<a href=\"edit-booking?b=\"10\">\"00010\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>KWESIO,=>guest phone =>000,=>no persons=>2.=>checkin=>2020-02-29 00:04:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>20=>status=>Checked out=>bookings=>10', 34, '2020-03-01 10:45:59'),
(16, '<a href=\"edit-booking?b=\"9\">\"00009\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>DANNIS,=>guest phone =>024387754,=>no persons=>2.=>checkin=>2020-02-29 00:03:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>20=>status=>Checked out=>bookings=>9', 34, '2020-03-01 10:47:03'),
(17, '<a href=\"edit-booking?b=\"8\">\"00008\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>MR.WILLIMS,=>guest phone =>0276009602,=>no persons=>2.=>checkin=>2020-02-29 00:01:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>20=>status=>Checked out=>bookings=>8', 34, '2020-03-01 10:48:22'),
(18, '<a href=\"edit-booking?b=\"7\">\"00007\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 29,=>guest name=>KOBBY,=>guest phone =>0240228835,=>no persons=>2.=>checkin=>2020-02-29 00:00:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>20=>status=>Checked out=>bookings=>7', 34, '2020-03-01 10:48:53'),
(19, '<a href=\"edit-booking?b=\"6\">\"00006\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>josehp,=>guest phone =>0000,=>no persons=>2.=>checkin=>2020-02-29 23:59:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>20=>status=>Checked out=>bookings=>6', 34, '2020-03-01 10:49:21'),
(20, '<a href=\"edit-booking?b=\"2\">\"00002\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>MOROW,=>guest phone =>0000,=>no persons=>2.=>checkin=>2020-02-29 23:54:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>20=>status=>Checked out=>bookings=>2', 34, '2020-03-01 10:49:40'),
(21, '<a href=\"edit-booking?b=\"3\">\"00003\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 33,=>guest name=>NANA,=>guest phone =>0249374757,=>no persons=>2.=>checkin=>2020-02-29 23:55:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>20=>status=>Checked out=>bookings=>3', 34, '2020-03-01 10:50:06'),
(22, '<a href=\"edit-booking?b=\"4\">\"00004\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>JOSEPH,=>guest phone =>0242647093,=>no persons=>2.=>checkin=>2020-02-29 23:57:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>20=>status=>Checked out=>bookings=>4', 34, '2020-03-01 10:52:18'),
(23, '<a href=\"edit-booking?b=\"5\">\"00005\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>JOSEPH,=>guest phone =>0242647093,=>no persons=>2.=>checkin=>2020-02-29 23:58:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>20=>status=>Checked out=>bookings=>5', 34, '2020-03-01 10:52:32'),
(24, '<a href=\"edit-booking?b=\"1\">\"00001\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>EMINEO,=>guest phone =>0572295913,=>no persons=>2.=>checkin=>2020-02-29 23:52:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>1', 2, '2020-03-01 11:25:48'),
(25, '<a href=\"edit-booking?b=\"1\">\"00001\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>EMINEO,=>guest phone =>0572295913,=>no persons=>2.=>checkin=>2020-02-29 23:52:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>1', 2, '2020-03-01 11:26:54'),
(26, '<a href=\"edit-booking?b=\"1\">\"00001\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>EMINEO,=>guest phone =>0572295913,=>no persons=>2.=>checkin=>2020-02-29 23:52:00,=>checkout=>2020-03-01 09:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>30=>status=>Checked out=>bookings=>1', 2, '2020-03-01 11:27:24'),
(27, '<a href=\"edit-booking?b=\"11\">\"00011\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 31,=>guest name=>KWESI,=>guest phone =>0244309373,=>no persons=>2.=>checkin=>2020-02-29 00:05:00,=>checkout=>2020-03-01 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>11', 34, '2020-03-01 12:47:59'),
(28, 'New Pool recorded added Fee Type=><strong>CHILDREN</strong>,Fee=><strong>GHS 5</strong>,Amount Paid=><strong>5</strong>,Nummber of people=><strong> 1</strong>', 40, '2020-03-01 12:53:10'),
(29, 'Pool recorded deleted Type=><strong>CHILDREN</strong>,Fee=><strong>GHS 5</strong>,Amount Paid=><strong>5</strong>,Nummber of people=><strong> 1</strong>', 40, '2020-03-01 12:53:19'),
(30, '<a href=\"edit-booking?b=\"12\">\"00012\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>MR ENERST,=>guest phone =>000,=>no persons=>2.=>checkin=>2020-03-01 23:23:00,=>checkout=>2020-03-02 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>12', 34, '2020-03-01 11:25:00'),
(31, '<a href=\"edit-booking?b=\"13\">\"00013\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>SAMWEL,=>guest phone =>0244425678,=>no persons=>2.=>checkin=>2020-03-01 23:25:00,=>checkout=>2020-03-02 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>10=>extra charge=>=>status=>Checked in=>bookings=>13', 34, '2020-03-01 11:28:49'),
(32, '<a href=\"edit-booking?b=\"13\">\"00013\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>SAMWEL,=>guest phone =>0244425678,=>no persons=>2.=>checkin=>2020-03-01 23:25:00,=>checkout=>2020-03-02 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>10=>extra charge=>0=>status=>Checked out=>bookings=>13', 34, '2020-03-01 11:30:44'),
(33, '<a href=\"edit-booking?b=\"14\">\"00014\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 37,=>guest name=>MIK,=>guest phone =>00,=>no persons=>1.=>checkin=>2020-03-02 07:55:00,=>checkout=>2020-03-02 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>14', 34, '2020-03-02 07:57:50'),
(34, '<a href=\"edit-booking?b=\"15\">\"00015\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>MOMO,=>guest phone =>0556697527,=>no persons=>2.=>checkin=>2020-03-02 07:57:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>15', 34, '2020-03-02 07:59:36'),
(35, '<a href=\"edit-booking?b=\"12\">\"00012\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>MR ENERST,=>guest phone =>000,=>no persons=>2.=>checkin=>2020-03-01 23:23:00,=>checkout=>2020-03-02 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>12', 34, '2020-03-02 08:00:35'),
(36, '<a href=\"edit-booking?b=\"14\">\"00014\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 37,=>guest name=>MIK,=>guest phone =>00,=>no persons=>1.=>checkin=>2020-03-02 07:55:00,=>checkout=>2020-03-02 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>14', 34, '2020-03-02 10:47:42'),
(37, '<a href=\"edit-booking?b=\"15\">\"00015\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>MOMO,=>guest phone =>0556697527,=>no persons=>2.=>checkin=>2020-03-02 07:57:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>15', 34, '2020-03-02 10:48:38'),
(38, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-02 12:49:15'),
(39, 'New Pool recorded added Fee Type=><strong>TEENS</strong>,Fee=><strong>GHS 7</strong>,Amount Paid=><strong>14</strong>,Nummber of people=><strong> 2</strong>', 35, '2020-03-02 12:49:35'),
(40, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>20</strong>,Nummber of people=><strong> 2</strong>', 35, '2020-03-02 12:49:52'),
(41, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-02 12:50:01'),
(42, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>20</strong>,Nummber of people=><strong> 2</strong>', 35, '2020-03-02 12:50:08'),
(43, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-02 12:50:12'),
(44, 'New Pool recorded added Fee Type=><strong>CHILDREN</strong>,Fee=><strong>GHS 5</strong>,Amount Paid=><strong>5</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-02 12:50:18'),
(45, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-02 12:50:35'),
(46, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-02 12:50:39'),
(47, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>20</strong>,Nummber of people=><strong> 2</strong>', 35, '2020-03-02 12:50:46'),
(48, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-02 12:50:53'),
(49, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-02 12:50:58'),
(50, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>20</strong>,Nummber of people=><strong> 2</strong>', 35, '2020-03-02 12:51:18'),
(51, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>30</strong>,Nummber of people=><strong> 3</strong>', 35, '2020-03-02 12:51:32'),
(52, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>30</strong>,Nummber of people=><strong> 3</strong>', 35, '2020-03-02 12:51:51'),
(53, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>40</strong>,Nummber of people=><strong> 4</strong>', 35, '2020-03-02 12:52:25'),
(54, '<a href=\"edit-booking?b=\"16\">\"00016\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>MR SAMMY,=>guest phone =>0208126204,=>no persons=>2.=>checkin=>2020-03-02 18:37:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>16', 34, '2020-03-02 06:38:55'),
(55, '<a href=\"edit-booking?b=\"17\">\"00017\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>ISAAC,=>guest phone =>0557108097,=>no persons=>2.=>checkin=>2020-03-02 23:38:00,=>checkout=>2020-03-03 15:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>17', 34, '2020-03-02 06:41:06'),
(56, '<a href=\"edit-booking?b=\"18\">\"00018\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>VICTUR,=>guest phone =>000,=>no persons=>2.=>checkin=>2020-03-02 18:41:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>18', 34, '2020-03-02 06:42:23'),
(57, '<a href=\"edit-booking?b=\"19\">\"00019\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 30,=>guest name=>EMMMANUEL,=>guest phone =>0208171569,=>no persons=>2.=>checkin=>2020-03-02 18:42:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>19', 34, '2020-03-02 06:43:46'),
(58, '<a href=\"edit-booking?b=\"20\">\"00020\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>MOMO,=>guest phone =>0556697527,=>no persons=>2.=>checkin=>2020-03-02 18:43:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>20', 34, '2020-03-02 06:44:32'),
(59, '<a href=\"edit-booking?b=\"21\">\"00021\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>MR APPIAH,=>guest phone =>054601595,=>no persons=>2.=>checkin=>2020-03-02 16:44:00,=>checkout=>2020-03-02 19:47:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Confirmed=>bookings=>21', 34, '2020-03-02 06:46:59'),
(60, '<a href=\"edit-booking?b=\"21\">\"00021\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>MR APPIAH,=>guest phone =>054601595,=>no persons=>2.=>checkin=>2020-03-02 16:44:00,=>checkout=>2020-03-02 19:47:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked in=>bookings=>21', 34, '2020-03-02 06:47:26'),
(61, '<a href=\"edit-booking?b=\"17\">\"00017\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>ISAAC,=>guest phone =>0557108097,=>no persons=>2.=>checkin=>2020-03-02 23:38:00,=>checkout=>2020-03-03 15:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>17', 34, '2020-03-02 06:48:13'),
(62, '<a href=\"edit-booking?b=\"21\">\"00021\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>MR APPIAH,=>guest phone =>054601595,=>no persons=>2.=>checkin=>2020-03-02 16:44:00,=>checkout=>2020-03-02 19:47:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>21', 34, '2020-03-02 06:56:56'),
(63, '<a href=\"edit-booking?b=\"22\">\"00022\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>AFFI,=>guest phone =>0504222355,=>no persons=>1.=>checkin=>2020-03-02 18:58:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>22', 34, '2020-03-02 07:01:13'),
(64, '<a href=\"edit-booking?b=\"23\">\"00023\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 9,=>guest name=>SUNDAY,=>guest phone =>0557741937,=>no persons=>2.=>checkin=>2020-03-03 07:22:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>23', 34, '2020-03-03 07:25:46'),
(65, '<a href=\"edit-booking?b=\"24\">\"00024\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>T,T,=>guest phone =>0249386646,=>no persons=>2.=>checkin=>2020-03-03 07:25:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>24', 34, '2020-03-03 07:27:40'),
(66, '<a href=\"edit-booking?b=\"16\">\"00016\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>MR SAMMY,=>guest phone =>0208126204,=>no persons=>2.=>checkin=>2020-03-02 18:37:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>16', 34, '2020-03-03 11:44:47'),
(67, '<a href=\"edit-booking?b=\"18\">\"00018\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>VICTUR,=>guest phone =>000,=>no persons=>2.=>checkin=>2020-03-02 18:41:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>18', 34, '2020-03-03 11:45:11'),
(68, '<a href=\"edit-booking?b=\"19\">\"00019\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 30,=>guest name=>EMMMANUEL,=>guest phone =>0208171569,=>no persons=>2.=>checkin=>2020-03-02 18:42:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>19', 34, '2020-03-03 11:45:38'),
(69, '<a href=\"edit-booking?b=\"23\">\"00023\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 9,=>guest name=>SUNDAY,=>guest phone =>0557741937,=>no persons=>2.=>checkin=>2020-03-03 07:22:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>23', 34, '2020-03-03 11:47:11'),
(70, '<a href=\"edit-booking?b=\"23\">\"00023\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 9,=>guest name=>SUNDAY,=>guest phone =>0557741937,=>no persons=>2.=>checkin=>2020-03-03 07:22:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>23', 34, '2020-03-03 11:47:37'),
(71, '<a href=\"edit-booking?b=\"24\">\"00024\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>T,T,=>guest phone =>0249386646,=>no persons=>2.=>checkin=>2020-03-03 07:25:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>24', 34, '2020-03-03 11:48:18'),
(72, '<a href=\"edit-booking?b=\"22\">\"00022\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>AFFI,=>guest phone =>0504222355,=>no persons=>1.=>checkin=>2020-03-02 18:58:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>22', 34, '2020-03-03 11:48:56'),
(73, '<a href=\"edit-booking?b=\"20\">\"00020\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>MOMO,=>guest phone =>0556697527,=>no persons=>2.=>checkin=>2020-03-02 18:43:00,=>checkout=>2020-03-03 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>20', 34, '2020-03-03 11:49:16'),
(74, '<a href=\"edit-booking?b=\"25\">\"00025\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>OLDMAN,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-03 21:29:00,=>checkout=>2020-03-04 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>25', 34, '2020-03-03 09:30:17'),
(75, '<a href=\"edit-booking?b=\"26\">\"00026\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>fifie ,=>guest phone =>0504222355,=>no persons=>1.=>checkin=>2020-03-03 21:30:00,=>checkout=>2020-03-04 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>26', 34, '2020-03-03 09:31:25'),
(76, '<a href=\"edit-booking?b=\"27\">\"00027\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>MOMO,=>guest phone =>0556697527,=>no persons=>2.=>checkin=>2020-03-03 21:32:00,=>checkout=>2020-03-04 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>27', 34, '2020-03-03 09:33:08'),
(77, '<a href=\"edit-booking?b=\"25\">\"00025\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>OLDMAN,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-03 21:29:00,=>checkout=>2020-03-04 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>25', 34, '2020-03-03 09:34:23'),
(78, '<a href=\"edit-booking?b=\"28\">\"00028\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>NO NAME,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-04 07:35:00,=>checkout=>2020-03-05 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>28', 34, '2020-03-04 07:36:40'),
(79, '<a href=\"edit-booking?b=\"29\">\"00029\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 20,=>guest name=>NO NAME,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-04 07:36:00,=>checkout=>2020-03-04 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>29', 34, '2020-03-04 07:37:32'),
(80, '<a href=\"edit-booking?b=\"30\">\"00030\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>NO NAME,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-04 07:37:00,=>checkout=>2020-03-05 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>30', 34, '2020-03-04 07:38:24'),
(81, '<a href=\"edit-booking?b=\"26\">\"00026\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>fifie ,=>guest phone =>0504222355,=>no persons=>1.=>checkin=>2020-03-03 21:30:00,=>checkout=>2020-03-04 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>26', 34, '2020-03-04 09:07:36'),
(82, '<a href=\"edit-booking?b=\"27\">\"00027\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>MOMO,=>guest phone =>0556697527,=>no persons=>2.=>checkin=>2020-03-03 21:32:00,=>checkout=>2020-03-04 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>27', 34, '2020-03-04 09:09:10'),
(83, '<a href=\"edit-booking?b=\"28\">\"00028\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>NO NAME,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-04 07:35:00,=>checkout=>2020-03-05 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>28', 34, '2020-03-04 09:27:24'),
(84, '<a href=\"edit-booking?b=\"29\">\"00029\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 20,=>guest name=>NO NAME,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-04 07:36:00,=>checkout=>2020-03-04 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>29', 34, '2020-03-04 09:27:59'),
(85, '<a href=\"edit-booking?b=\"30\">\"00030\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>NO NAME,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-04 07:37:00,=>checkout=>2020-03-05 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>30', 34, '2020-03-04 09:28:26'),
(86, '<a href=\"edit-booking?b=\"31\">\"00031\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>MOMO,=>guest phone =>0556697527,=>no persons=>2.=>checkin=>2020-03-04 19:32:00,=>checkout=>2020-03-05 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>31', 34, '2020-03-04 07:32:52'),
(87, '<a href=\"edit-booking?b=\"32\">\"00032\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>nige,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-04 19:33:00,=>checkout=>2020-03-05 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>32', 34, '2020-03-04 07:33:37'),
(88, '<a href=\"edit-booking?b=\"33\">\"00033\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>KWESI,=>guest phone =>0244226121,=>no persons=>2.=>checkin=>2020-03-04 19:33:00,=>checkout=>2020-03-04 16:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>33', 34, '2020-03-04 07:35:08'),
(89, '<a href=\"edit-booking?b=\"34\">\"00034\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>MR BEN,=>guest phone =>0246183013,=>no persons=>2.=>checkin=>2020-03-04 19:35:00,=>checkout=>2020-03-05 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>34', 34, '2020-03-04 07:36:24'),
(90, '<a href=\"edit-booking?b=\"33\">\"00033\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>KWESI,=>guest phone =>0244226121,=>no persons=>2.=>checkin=>2020-03-04 19:33:00,=>checkout=>2020-03-04 16:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>40=>status=>Checked out=>bookings=>33', 34, '2020-03-04 07:37:28'),
(91, '<a href=\"edit-booking?b=\"34\">\"00034\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>MR BEN,=>guest phone =>0246183013,=>no persons=>2.=>checkin=>2020-03-04 19:35:00,=>checkout=>2020-03-05 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>34', 34, '2020-03-05 08:01:42'),
(92, '<a href=\"edit-booking?b=\"31\">\"00031\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>MOMO,=>guest phone =>0556697527,=>no persons=>2.=>checkin=>2020-03-04 19:32:00,=>checkout=>2020-03-05 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>31', 34, '2020-03-05 08:11:02'),
(93, '<a href=\"edit-booking?b=\"32\">\"00032\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>nige,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-04 19:33:00,=>checkout=>2020-03-05 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>32', 34, '2020-03-05 08:12:59'),
(94, '<a href=\"edit-booking?b=\"35\">\"00035\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>HAJIA,=>guest phone =>0203437840,=>no persons=>2.=>checkin=>2020-03-05 08:17:00,=>checkout=>2020-03-05 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>35', 34, '2020-03-05 08:21:54'),
(95, '<a href=\"edit-booking?b=\"36\">\"00036\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>DAL,=>guest phone =>00000000,=>no persons=>2.=>checkin=>2020-03-05 08:21:00,=>checkout=>2020-03-06 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>36', 34, '2020-03-05 08:56:02'),
(96, '<a href=\"edit-booking?b=\"37\">\"00037\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 5,=>guest name=>MOROW,=>guest phone =>0000,=>no persons=>1.=>checkin=>2020-03-05 08:56:00,=>checkout=>2020-03-06 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>37', 34, '2020-03-05 08:56:50'),
(97, '<a href=\"edit-booking?b=\"35\">\"00035\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>HAJIA,=>guest phone =>0203437840,=>no persons=>2.=>checkin=>2020-03-05 08:17:00,=>checkout=>2020-03-05 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>35', 34, '2020-03-05 08:58:06'),
(98, '<a href=\"edit-booking?b=\"36\">\"00036\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>DAL,=>guest phone =>00000000,=>no persons=>2.=>checkin=>2020-03-05 08:21:00,=>checkout=>2020-03-06 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>36', 34, '2020-03-05 08:58:49'),
(99, '<a href=\"edit-booking?b=\"37\">\"00037\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 5,=>guest name=>MOROW,=>guest phone =>0000,=>no persons=>1.=>checkin=>2020-03-05 08:56:00,=>checkout=>2020-03-06 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>37', 34, '2020-03-05 08:59:17'),
(100, '<a href=\"edit-booking?b=\"38\">\"00038\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>JOSEPH,=>guest phone =>0242647093,=>no persons=>1.=>checkin=>2020-03-06 10:02:00,=>checkout=>2020-03-07 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>38', 34, '2020-03-06 10:04:03'),
(101, '<a href=\"edit-booking?b=\"39\">\"00039\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>VICTORIA,=>guest phone =>00,=>no persons=>2.=>checkin=>2020-03-06 10:04:00,=>checkout=>2020-03-07 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>39', 34, '2020-03-06 10:05:02'),
(102, '<a href=\"edit-booking?b=\"38\">\"00038\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>JOSEPH,=>guest phone =>0242647093,=>no persons=>1.=>checkin=>2020-03-06 10:02:00,=>checkout=>2020-03-07 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>38', 34, '2020-03-06 10:05:26'),
(103, '<a href=\"edit-booking?b=\"39\">\"00039\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>VICTORIA,=>guest phone =>00,=>no persons=>2.=>checkin=>2020-03-06 10:04:00,=>checkout=>2020-03-07 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>39', 34, '2020-03-06 10:05:45'),
(104, '<a href=\"edit-booking?b=\"40\">\"00040\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>nige,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-07 11:43:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>40', 34, '2020-03-07 11:44:12'),
(105, '<a href=\"edit-booking?b=\"41\">\"00041\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>OLDMAN,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-07 11:44:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>41', 34, '2020-03-07 11:44:54'),
(106, '<a href=\"edit-booking?b=\"42\">\"00042\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>fifie ,=>guest phone =>0504222355,=>no persons=>1.=>checkin=>2020-03-07 11:45:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>42', 34, '2020-03-07 11:45:38'),
(107, '<a href=\"edit-booking?b=\"43\">\"00043\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>GODFORED,=>guest phone =>0557704303,=>no persons=>2.=>checkin=>2020-03-07 11:45:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>43', 34, '2020-03-07 11:47:09'),
(108, '<a href=\"edit-booking?b=\"44\">\"00044\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 20,=>guest name=>nige,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-07 11:47:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>44', 34, '2020-03-07 11:47:44'),
(109, '<a href=\"edit-booking?b=\"45\">\"00045\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>CLEMENT,=>guest phone =>0000,=>no persons=>2.=>checkin=>2020-03-07 11:47:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>45', 34, '2020-03-07 11:48:40'),
(110, '<a href=\"edit-booking?b=\"46\">\"00046\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>nige,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-07 11:48:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>46', 34, '2020-03-07 11:49:14'),
(111, '<a href=\"edit-booking?b=\"41\">\"00041\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>OLDMAN,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-07 11:44:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>41', 34, '2020-03-07 11:49:50'),
(112, '<a href=\"edit-booking?b=\"47\">\"00047\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>MR APPIAH,=>guest phone =>054601595,=>no persons=>1.=>checkin=>2020-03-07 11:49:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>47', 34, '2020-03-07 11:50:32'),
(113, '<a href=\"edit-booking?b=\"42\">\"00042\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>fifie ,=>guest phone =>0504222355,=>no persons=>1.=>checkin=>2020-03-07 11:45:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>42', 34, '2020-03-07 11:50:50'),
(114, '<a href=\"edit-booking?b=\"48\">\"00048\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>WISDOM,=>guest phone =>0549710428,=>no persons=>2.=>checkin=>2020-03-07 11:51:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>48', 34, '2020-03-07 11:51:48'),
(115, '<a href=\"edit-booking?b=\"49\">\"00049\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>ROSE,=>guest phone =>0248442038,=>no persons=>2.=>checkin=>2020-03-07 11:51:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>49', 34, '2020-03-07 11:52:40'),
(116, '<a href=\"edit-booking?b=\"50\">\"00050\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>MR FIFIE,=>guest phone =>0000,=>no persons=>2.=>checkin=>2020-03-07 11:52:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>50', 34, '2020-03-07 11:54:54'),
(117, '<a href=\"edit-booking?b=\"51\">\"00051\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 13,=>guest name=>OSAFO,=>guest phone =>0242855734,=>no persons=>2.=>checkin=>2020-03-07 11:54:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>51', 34, '2020-03-07 11:56:03'),
(118, '<a href=\"edit-booking?b=\"52\">\"00052\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>SWEDRU,=>guest phone =>00000000,=>no persons=>2.=>checkin=>2020-03-07 11:56:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>52', 34, '2020-03-07 11:56:52'),
(119, '<a href=\"edit-booking?b=\"53\">\"00053\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>RICHARD,=>guest phone =>0277443299,=>no persons=>2.=>checkin=>2020-03-07 11:56:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>53', 34, '2020-03-07 11:58:07'),
(120, '<a href=\"edit-booking?b=\"54\">\"00054\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>EMERT,=>guest phone =>0245073286,=>no persons=>2.=>checkin=>2020-03-07 11:58:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>54', 34, '2020-03-07 11:59:56'),
(121, '<a href=\"edit-booking?b=\"55\">\"00055\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 2,=>guest name=>TINA,=>guest phone =>0243548380,=>no persons=>2.=>checkin=>2020-03-07 11:59:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>55', 34, '2020-03-07 12:01:04'),
(122, '<a href=\"edit-booking?b=\"56\">\"00056\"</a> Booking made room_type=>LUXURY  (+AC, FAN, FRIDGE & WATER HEATER),room=>ROOM 16,=>guest name=>nige,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-07 12:01:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>140.00,=>price=>140.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>56', 34, '2020-03-07 12:02:48'),
(123, '<a href=\"edit-booking?b=\"57\">\"00057\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 8,=>guest name=>JOCOB,=>guest phone =>0545057755,=>no persons=>2.=>checkin=>2020-03-07 12:02:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>57', 34, '2020-03-07 12:04:10'),
(124, '<a href=\"edit-booking?b=\"40\">\"00040\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>nige,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-07 11:43:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>40', 34, '2020-03-07 12:06:13'),
(125, '<a href=\"edit-booking?b=\"43\">\"00043\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>GODFORED,=>guest phone =>0557704303,=>no persons=>2.=>checkin=>2020-03-07 11:45:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>43', 34, '2020-03-07 12:06:28'),
(126, '<a href=\"edit-booking?b=\"44\">\"00044\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 20,=>guest name=>nige,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-07 11:47:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>44', 34, '2020-03-07 12:06:44'),
(127, '<a href=\"edit-booking?b=\"45\">\"00045\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>CLEMENT,=>guest phone =>0000,=>no persons=>2.=>checkin=>2020-03-07 11:47:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>45', 34, '2020-03-07 12:07:01'),
(128, '<a href=\"edit-booking?b=\"46\">\"00046\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>nige,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-07 11:48:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>46', 34, '2020-03-07 12:07:17');
INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES
(129, '<a href=\"edit-booking?b=\"47\">\"00047\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>MR APPIAH,=>guest phone =>054601595,=>no persons=>1.=>checkin=>2020-03-07 11:49:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>47', 34, '2020-03-07 12:07:58'),
(130, '<a href=\"edit-booking?b=\"48\">\"00048\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>WISDOM,=>guest phone =>0549710428,=>no persons=>2.=>checkin=>2020-03-07 11:51:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>48', 34, '2020-03-07 12:08:37'),
(131, '<a href=\"edit-booking?b=\"48\">\"00048\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>WISDOM,=>guest phone =>0549710428,=>no persons=>2.=>checkin=>2020-03-07 11:51:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>48', 34, '2020-03-07 12:08:56'),
(132, '<a href=\"edit-booking?b=\"49\">\"00049\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>ROSE,=>guest phone =>0248442038,=>no persons=>2.=>checkin=>2020-03-07 11:51:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>49', 34, '2020-03-07 12:09:17'),
(133, '<a href=\"edit-booking?b=\"50\">\"00050\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>MR FIFIE,=>guest phone =>0000,=>no persons=>2.=>checkin=>2020-03-07 11:52:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>50', 34, '2020-03-07 12:09:51'),
(134, '<a href=\"edit-booking?b=\"51\">\"00051\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 13,=>guest name=>OSAFO,=>guest phone =>0242855734,=>no persons=>2.=>checkin=>2020-03-07 11:54:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>51', 34, '2020-03-07 12:10:21'),
(135, '<a href=\"edit-booking?b=\"52\">\"00052\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>SWEDRU,=>guest phone =>00000000,=>no persons=>2.=>checkin=>2020-03-07 11:56:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>52', 34, '2020-03-07 12:10:43'),
(136, '<a href=\"edit-booking?b=\"53\">\"00053\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>RICHARD,=>guest phone =>0277443299,=>no persons=>2.=>checkin=>2020-03-07 11:56:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>53', 34, '2020-03-07 12:11:08'),
(137, '<a href=\"edit-booking?b=\"53\">\"00053\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>RICHARD,=>guest phone =>0277443299,=>no persons=>2.=>checkin=>2020-03-07 11:56:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>53', 34, '2020-03-07 12:11:21'),
(138, '<a href=\"edit-booking?b=\"54\">\"00054\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>EMERT,=>guest phone =>0245073286,=>no persons=>2.=>checkin=>2020-03-07 11:58:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>54', 34, '2020-03-07 12:11:41'),
(139, '<a href=\"edit-booking?b=\"55\">\"00055\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 2,=>guest name=>TINA,=>guest phone =>0243548380,=>no persons=>2.=>checkin=>2020-03-07 11:59:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>55', 34, '2020-03-07 12:12:05'),
(140, '<a href=\"edit-booking?b=\"56\">\"00056\"</a> Booking details updated room_type=>LUXURY  (+AC, FAN, FRIDGE & WATER HEATER),room=>ROOM 16,=>guest name=>nige,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-07 12:01:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>140,=>price=>140=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>56', 34, '2020-03-07 12:12:25'),
(141, '<a href=\"edit-booking?b=\"57\">\"00057\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 8,=>guest name=>JOCOB,=>guest phone =>0545057755,=>no persons=>2.=>checkin=>2020-03-07 12:02:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>57', 34, '2020-03-07 12:12:47'),
(142, '<a href=\"edit-booking?b=\"58\">\"00058\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>stephen,=>guest phone =>0558090579,=>no persons=>2.=>checkin=>2020-03-07 22:22:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>58', 34, '2020-03-07 10:24:39'),
(143, '<a href=\"edit-booking?b=\"59\">\"00059\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>OSAFO,=>guest phone =>0242855734,=>no persons=>1.=>checkin=>2020-03-07 22:24:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>59', 34, '2020-03-07 10:25:18'),
(144, '<a href=\"edit-booking?b=\"60\">\"00060\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 5,=>guest name=>pastor,=>guest phone =>0242855734,=>no persons=>1.=>checkin=>2020-03-07 22:26:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>60', 34, '2020-03-07 10:27:37'),
(145, '<a href=\"edit-booking?b=\"61\">\"00061\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>snake,=>guest phone =>0000,=>no persons=>2.=>checkin=>2020-03-07 22:27:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>61', 34, '2020-03-07 10:28:51'),
(146, '<a href=\"edit-booking?b=\"62\">\"00062\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>GODFORED,=>guest phone =>0557704303,=>no persons=>2.=>checkin=>2020-03-07 22:30:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>62', 34, '2020-03-07 10:31:10'),
(147, '<a href=\"edit-booking?b=\"63\">\"00063\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>efie,=>guest phone =>0557704303,=>no persons=>1.=>checkin=>2020-03-07 22:31:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>63', 34, '2020-03-07 10:34:01'),
(148, '<a href=\"edit-booking?b=\"63\">\"00063\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>efie,=>guest phone =>0557704303,=>no persons=>1.=>checkin=>2020-03-07 22:31:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>63', 34, '2020-03-08 11:09:41'),
(149, '<a href=\"edit-booking?b=\"58\">\"00058\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>stephen,=>guest phone =>0558090579,=>no persons=>2.=>checkin=>2020-03-07 22:22:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>58', 34, '2020-03-08 11:10:09'),
(150, '<a href=\"edit-booking?b=\"59\">\"00059\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>OSAFO,=>guest phone =>0242855734,=>no persons=>1.=>checkin=>2020-03-07 22:24:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>59', 34, '2020-03-08 11:10:28'),
(151, '<a href=\"edit-booking?b=\"60\">\"00060\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 5,=>guest name=>pastor,=>guest phone =>0242855734,=>no persons=>1.=>checkin=>2020-03-07 22:26:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>60', 34, '2020-03-08 11:10:58'),
(152, '<a href=\"edit-booking?b=\"61\">\"00061\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>snake,=>guest phone =>0000,=>no persons=>2.=>checkin=>2020-03-07 22:27:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>61', 34, '2020-03-08 11:11:16'),
(153, '<a href=\"edit-booking?b=\"62\">\"00062\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>GODFORED,=>guest phone =>0557704303,=>no persons=>2.=>checkin=>2020-03-07 22:30:00,=>checkout=>2020-03-08 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>62', 34, '2020-03-08 11:11:37'),
(154, '<a href=\"edit-booking?b=\"64\">\"00064\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>nige,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-08 11:12:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>64', 34, '2020-03-08 11:14:17'),
(155, '<a href=\"edit-booking?b=\"65\">\"00065\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>nige,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-08 11:14:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>65', 34, '2020-03-08 11:14:49'),
(156, '<a href=\"edit-booking?b=\"66\">\"00066\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 20,=>guest name=>nige,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-08 11:16:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>66', 34, '2020-03-08 11:16:35'),
(157, '<a href=\"edit-booking?b=\"67\">\"00067\"</a> Booking made room_type=>LUXURY  (+AC, FAN, FRIDGE & WATER HEATER),room=>ROOM 16,=>guest name=>nige,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-08 11:16:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>140.00,=>price=>140.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>67', 34, '2020-03-08 11:17:07'),
(158, '<a href=\"edit-booking?b=\"68\">\"00068\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>MAMA,=>guest phone =>0234480584,=>no persons=>2.=>checkin=>2020-03-08 11:17:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Confirmed=>bookings=>68', 34, '2020-03-08 11:18:03'),
(159, '<a href=\"edit-booking?b=\"69\">\"00069\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>ALFRED,=>guest phone =>0242230480,=>no persons=>2.=>checkin=>2020-03-08 11:18:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>69', 34, '2020-03-08 11:18:55'),
(160, '<a href=\"edit-booking?b=\"70\">\"00070\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>MAJIOR,=>guest phone =>0244290576,=>no persons=>2.=>checkin=>2020-03-08 11:18:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>70', 34, '2020-03-08 11:20:11'),
(161, '<a href=\"edit-booking?b=\"71\">\"00071\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>SADIEK,=>guest phone =>024560850,=>no persons=>2.=>checkin=>2020-03-08 11:20:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>71', 34, '2020-03-08 11:21:32'),
(162, '<a href=\"edit-booking?b=\"72\">\"00072\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>NANA KWEME,=>guest phone =>0547897712,=>no persons=>1.=>checkin=>2020-03-08 11:21:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>72', 34, '2020-03-08 11:22:45'),
(163, '<a href=\"edit-booking?b=\"73\">\"00073\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 2,=>guest name=>AWLOO,=>guest phone =>0243968430,=>no persons=>2.=>checkin=>2020-03-08 11:22:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>73', 34, '2020-03-08 11:23:58'),
(164, '<a href=\"edit-booking?b=\"74\">\"00074\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>MAA ABENA,=>guest phone =>055474995,=>no persons=>1.=>checkin=>2020-03-08 11:24:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>74', 34, '2020-03-08 11:24:54'),
(165, '<a href=\"edit-booking?b=\"75\">\"00075\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>JOSEPH,=>guest phone =>0242647093,=>no persons=>2.=>checkin=>2020-03-08 11:24:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>75', 34, '2020-03-08 11:25:32'),
(166, '<a href=\"edit-booking?b=\"76\">\"00076\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 8,=>guest name=>nige,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-08 11:25:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>76', 34, '2020-03-08 11:26:07'),
(167, '<a href=\"edit-booking?b=\"68\">\"00068\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>MAMA,=>guest phone =>0234480584,=>no persons=>2.=>checkin=>2020-03-08 11:17:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>68', 34, '2020-03-08 11:27:22'),
(168, '<a href=\"edit-booking?b=\"76\">\"00076\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 8,=>guest name=>nige,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-08 11:25:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>76', 34, '2020-03-08 11:30:28'),
(169, '<a href=\"edit-booking?b=\"64\">\"00064\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>nige,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-08 11:12:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>64', 34, '2020-03-08 11:31:03'),
(170, '<a href=\"edit-booking?b=\"65\">\"00065\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>nige,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-08 11:14:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>65', 34, '2020-03-08 11:31:17'),
(171, '<a href=\"edit-booking?b=\"66\">\"00066\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 20,=>guest name=>nige,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-08 11:16:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>66', 34, '2020-03-08 11:31:33'),
(172, '<a href=\"edit-booking?b=\"67\">\"00067\"</a> Booking details updated room_type=>LUXURY  (+AC, FAN, FRIDGE & WATER HEATER),room=>ROOM 16,=>guest name=>nige,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-08 11:16:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>140,=>price=>140=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>67', 34, '2020-03-08 11:31:51'),
(173, '<a href=\"edit-booking?b=\"69\">\"00069\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>ALFRED,=>guest phone =>0242230480,=>no persons=>2.=>checkin=>2020-03-08 11:18:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>69', 34, '2020-03-08 11:32:10'),
(174, '<a href=\"edit-booking?b=\"70\">\"00070\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>MAJIOR,=>guest phone =>0244290576,=>no persons=>2.=>checkin=>2020-03-08 11:18:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>70', 34, '2020-03-08 11:32:35'),
(175, '<a href=\"edit-booking?b=\"71\">\"00071\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>SADIEK,=>guest phone =>024560850,=>no persons=>2.=>checkin=>2020-03-08 11:20:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>71', 34, '2020-03-08 11:33:00'),
(176, '<a href=\"edit-booking?b=\"71\">\"00071\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>SADIEK,=>guest phone =>024560850,=>no persons=>2.=>checkin=>2020-03-08 11:20:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>71', 34, '2020-03-08 11:33:34'),
(177, '<a href=\"edit-booking?b=\"72\">\"00072\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>NANA KWEME,=>guest phone =>0547897712,=>no persons=>1.=>checkin=>2020-03-08 11:21:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>72', 34, '2020-03-08 11:34:09'),
(178, '<a href=\"edit-booking?b=\"73\">\"00073\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 2,=>guest name=>AWLOO,=>guest phone =>0243968430,=>no persons=>2.=>checkin=>2020-03-08 11:22:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>73', 34, '2020-03-08 11:35:52'),
(179, '<a href=\"edit-booking?b=\"74\">\"00074\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>MAA ABENA,=>guest phone =>055474995,=>no persons=>1.=>checkin=>2020-03-08 11:24:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>74', 34, '2020-03-08 11:36:05'),
(180, '<a href=\"edit-booking?b=\"75\">\"00075\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>JOSEPH,=>guest phone =>0242647093,=>no persons=>2.=>checkin=>2020-03-08 11:24:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>75', 34, '2020-03-08 11:36:39'),
(181, '<a href=\"edit-booking?b=\"77\">\"00077\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 6,=>guest name=>AKOSUA,=>guest phone =>0244448025,=>no persons=>2.=>checkin=>2020-03-08 11:41:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>77', 34, '2020-03-08 11:42:21'),
(182, '<a href=\"edit-booking?b=\"77\">\"00077\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 6,=>guest name=>AKOSUA,=>guest phone =>0244448025,=>no persons=>2.=>checkin=>2020-03-08 11:41:00,=>checkout=>2020-03-09 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>77', 34, '2020-03-08 11:42:37'),
(183, '<a href=\"edit-booking?b=\"78\">\"00078\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>ISAAC,=>guest phone =>0559442762,=>no persons=>1.=>checkin=>2020-03-09 13:15:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>78', 34, '2020-03-09 01:16:07'),
(184, '<a href=\"edit-booking?b=\"79\">\"00079\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>NO NAME,=>guest phone =>0244088660,=>no persons=>2.=>checkin=>2020-03-09 13:16:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>79', 34, '2020-03-09 01:17:22'),
(185, '<a href=\"edit-booking?b=\"80\">\"00080\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 2,=>guest name=>OSAFO,=>guest phone =>0242855734,=>no persons=>2.=>checkin=>2020-03-09 13:17:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>80', 34, '2020-03-09 01:18:11'),
(186, '<a href=\"edit-booking?b=\"81\">\"00081\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>OSAFO,=>guest phone =>0242855734,=>no persons=>2.=>checkin=>2020-03-09 13:18:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>81', 34, '2020-03-09 01:18:42'),
(187, '<a href=\"edit-booking?b=\"82\">\"00082\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>efie,=>guest phone =>0557704303,=>no persons=>1.=>checkin=>2020-03-09 13:18:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>82', 34, '2020-03-09 01:19:46'),
(188, '<a href=\"edit-booking?b=\"83\">\"00083\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>OSAFO,=>guest phone =>027737090,=>no persons=>2.=>checkin=>2020-03-09 13:19:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>83', 34, '2020-03-09 01:20:40'),
(189, '<a href=\"edit-booking?b=\"84\">\"00084\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>JOHN,=>guest phone =>0245989521,=>no persons=>2.=>checkin=>2020-03-09 13:20:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>84', 34, '2020-03-09 01:21:36'),
(190, '<a href=\"edit-booking?b=\"85\">\"00085\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>MINTAH,=>guest phone =>0246184935,=>no persons=>2.=>checkin=>2020-03-09 13:21:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>85', 34, '2020-03-09 01:22:33'),
(191, '<a href=\"edit-booking?b=\"86\">\"00086\"</a> Booking made room_type=>LUXURY  (+AC, FAN, FRIDGE & WATER HEATER),room=>ROOM 7,=>guest name=>HENRY,=>guest phone =>0243927846,=>no persons=>2.=>checkin=>2020-03-09 13:22:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>140.00,=>price=>140.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>86', 34, '2020-03-09 01:24:14'),
(192, '<a href=\"edit-booking?b=\"87\">\"00087\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>MR.KOFI,=>guest phone =>0544849203,=>no persons=>2.=>checkin=>2020-03-09 13:24:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>87', 34, '2020-03-09 01:25:13'),
(193, '<a href=\"edit-booking?b=\"88\">\"00088\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>MOAMMED,=>guest phone =>0203611237,=>no persons=>2.=>checkin=>2020-03-09 13:25:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>88', 34, '2020-03-09 01:26:23'),
(194, '<a href=\"edit-booking?b=\"89\">\"00089\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 8,=>guest name=>MICHEAL,=>guest phone =>0241460955,=>no persons=>2.=>checkin=>2020-03-09 13:26:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>89', 34, '2020-03-09 01:27:37'),
(195, '<a href=\"edit-booking?b=\"89\">\"00089\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 8,=>guest name=>MICHEAL,=>guest phone =>0241460955,=>no persons=>2.=>checkin=>2020-03-09 13:26:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>89', 34, '2020-03-09 01:28:18'),
(196, '<a href=\"edit-booking?b=\"78\">\"00078\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>ISAAC,=>guest phone =>0559442762,=>no persons=>1.=>checkin=>2020-03-09 13:15:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>78', 34, '2020-03-09 01:28:39'),
(197, '<a href=\"edit-booking?b=\"79\">\"00079\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>NO NAME,=>guest phone =>0244088660,=>no persons=>2.=>checkin=>2020-03-09 13:16:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>79', 34, '2020-03-09 01:29:05'),
(198, '<a href=\"edit-booking?b=\"80\">\"00080\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 2,=>guest name=>OSAFO,=>guest phone =>0242855734,=>no persons=>2.=>checkin=>2020-03-09 13:17:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>80', 34, '2020-03-09 01:29:39'),
(199, '<a href=\"edit-booking?b=\"81\">\"00081\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>OSAFO,=>guest phone =>0242855734,=>no persons=>2.=>checkin=>2020-03-09 13:18:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>81', 34, '2020-03-09 01:32:24'),
(200, '<a href=\"edit-booking?b=\"82\">\"00082\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>efie,=>guest phone =>0557704303,=>no persons=>1.=>checkin=>2020-03-09 13:18:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>82', 34, '2020-03-09 01:33:10'),
(201, '<a href=\"edit-booking?b=\"83\">\"00083\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>OSAFO,=>guest phone =>027737090,=>no persons=>2.=>checkin=>2020-03-09 13:19:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>83', 34, '2020-03-09 01:33:59'),
(202, '<a href=\"edit-booking?b=\"88\">\"00088\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>MOAMMED,=>guest phone =>0203611237,=>no persons=>2.=>checkin=>2020-03-09 13:25:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>88', 34, '2020-03-09 01:35:14'),
(203, '<a href=\"edit-booking?b=\"84\">\"00084\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>JOHN,=>guest phone =>0245989521,=>no persons=>2.=>checkin=>2020-03-09 13:20:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>84', 34, '2020-03-09 01:35:32'),
(204, '<a href=\"edit-booking?b=\"87\">\"00087\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>MR.KOFI,=>guest phone =>0544849203,=>no persons=>2.=>checkin=>2020-03-09 13:24:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>87', 34, '2020-03-09 01:36:01'),
(205, '<a href=\"edit-booking?b=\"85\">\"00085\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>MINTAH,=>guest phone =>0246184935,=>no persons=>2.=>checkin=>2020-03-09 13:21:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>85', 34, '2020-03-09 01:36:35'),
(206, '<a href=\"edit-booking?b=\"86\">\"00086\"</a> Booking details updated room_type=>LUXURY  (+AC, FAN, FRIDGE & WATER HEATER),room=>ROOM 7,=>guest name=>HENRY,=>guest phone =>0243927846,=>no persons=>2.=>checkin=>2020-03-09 13:22:00,=>checkout=>2020-03-10 12:00:00,=>nights=>1,=>original price=>140,=>price=>140=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>86', 34, '2020-03-09 01:37:24'),
(207, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>40</strong>,Nummber of people=><strong> 4</strong>', 35, '2020-03-09 13:46:36'),
(208, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-09 13:46:57'),
(209, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>60</strong>,Nummber of people=><strong> 6</strong>', 35, '2020-03-09 13:47:05'),
(210, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-09 13:47:10'),
(211, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-09 13:47:14'),
(212, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>20</strong>,Nummber of people=><strong> 2</strong>', 35, '2020-03-09 13:47:20'),
(213, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>20</strong>,Nummber of people=><strong> 2</strong>', 35, '2020-03-09 13:47:46'),
(214, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>20</strong>,Nummber of people=><strong> 2</strong>', 35, '2020-03-09 13:47:49'),
(215, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>20</strong>,Nummber of people=><strong> 2</strong>', 35, '2020-03-09 13:48:49'),
(216, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-09 13:48:56'),
(217, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-09 13:48:58'),
(218, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>20</strong>,Nummber of people=><strong> 2</strong>', 35, '2020-03-09 13:49:10'),
(219, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>40</strong>,Nummber of people=><strong> 4</strong>', 35, '2020-03-09 13:51:26'),
(220, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>20</strong>,Nummber of people=><strong> 2</strong>', 35, '2020-03-09 13:56:18'),
(221, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>70</strong>,Nummber of people=><strong> 7</strong>', 35, '2020-03-09 14:00:14'),
(222, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-09 14:00:21'),
(223, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-09 14:00:25'),
(224, 'New Pool recorded added Fee Type=><strong>ADULT</strong>,Fee=><strong>GHS 10</strong>,Amount Paid=><strong>10</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-09 14:00:31'),
(225, 'New Pool recorded added Fee Type=><strong>TEENS</strong>,Fee=><strong>GHS 7</strong>,Amount Paid=><strong>7</strong>,Nummber of people=><strong> 1</strong>', 35, '2020-03-09 14:00:44'),
(226, '<a href=\"edit-booking?b=\"90\">\"00090\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>nige,=>guest phone =>GX722-15,=>no persons=>2.=>checkin=>2020-03-10 11:55:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>90', 34, '2020-03-10 11:56:16'),
(227, '<a href=\"edit-booking?b=\"91\">\"00091\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>KOBBY,=>guest phone =>0244817515,=>no persons=>2.=>checkin=>2020-03-10 11:56:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>91', 34, '2020-03-10 11:57:07'),
(228, '<a href=\"edit-booking?b=\"92\">\"00092\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>YAM,=>guest phone =>0244017186,=>no persons=>2.=>checkin=>2020-03-10 11:57:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>92', 34, '2020-03-10 11:58:12'),
(229, '<a href=\"edit-booking?b=\"93\">\"00093\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 35,=>guest name=>RAMOND,=>guest phone =>0549896136,=>no persons=>2.=>checkin=>2020-03-10 11:58:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>93', 34, '2020-03-10 11:59:43'),
(230, '<a href=\"edit-booking?b=\"94\">\"00094\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>MR.KOFI,=>guest phone =>0544849203,=>no persons=>2.=>checkin=>2020-03-10 11:59:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>94', 34, '2020-03-10 12:01:10'),
(231, '<a href=\"edit-booking?b=\"95\">\"00095\"</a> Booking made room_type=>LUXURY  (+AC, FAN, FRIDGE & WATER HEATER),room=>ROOM 7,=>guest name=>MR HENRY,=>guest phone =>0244817515,=>no persons=>2.=>checkin=>2020-03-10 12:01:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>140.00,=>price=>140.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>95', 34, '2020-03-10 12:03:03'),
(232, '<a href=\"edit-booking?b=\"96\">\"00096\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>ATTA,=>guest phone =>0248409956,=>no persons=>2.=>checkin=>2020-03-10 12:03:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>96', 34, '2020-03-10 12:03:42'),
(233, '<a href=\"edit-booking?b=\"97\">\"00097\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>EBENEZA,=>guest phone =>0248409956,=>no persons=>1.=>checkin=>2020-03-10 12:03:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>97', 34, '2020-03-10 12:06:03'),
(234, '<a href=\"edit-booking?b=\"98\">\"00098\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>EBENEZA,=>guest phone =>0248409956,=>no persons=>2.=>checkin=>2020-03-10 12:06:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>98', 34, '2020-03-10 12:06:52'),
(235, '<a href=\"edit-booking?b=\"90\">\"00090\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>nige,=>guest phone =>GX722-15,=>no persons=>2.=>checkin=>2020-03-10 11:55:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>90', 34, '2020-03-10 12:11:35'),
(236, '<a href=\"edit-booking?b=\"91\">\"00091\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>KOBBY,=>guest phone =>0244817515,=>no persons=>2.=>checkin=>2020-03-10 11:56:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>91', 34, '2020-03-10 12:11:54'),
(237, '<a href=\"edit-booking?b=\"98\">\"00098\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>EBENEZA,=>guest phone =>0248409956,=>no persons=>2.=>checkin=>2020-03-10 12:06:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>98', 34, '2020-03-10 12:12:10'),
(238, '<a href=\"edit-booking?b=\"92\">\"00092\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>YAM,=>guest phone =>0244017186,=>no persons=>2.=>checkin=>2020-03-10 11:57:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>92', 34, '2020-03-10 12:12:49'),
(239, '<a href=\"edit-booking?b=\"93\">\"00093\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 35,=>guest name=>RAMOND,=>guest phone =>0549896136,=>no persons=>2.=>checkin=>2020-03-10 11:58:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>93', 34, '2020-03-10 12:13:03'),
(240, '<a href=\"edit-booking?b=\"94\">\"00094\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>MR.KOFI,=>guest phone =>0544849203,=>no persons=>2.=>checkin=>2020-03-10 11:59:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>94', 34, '2020-03-10 12:13:24'),
(241, '<a href=\"edit-booking?b=\"95\">\"00095\"</a> Booking details updated room_type=>LUXURY  (+AC, FAN, FRIDGE & WATER HEATER),room=>ROOM 7,=>guest name=>MR HENRY,=>guest phone =>0244817515,=>no persons=>2.=>checkin=>2020-03-10 12:01:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>140,=>price=>140=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>95', 34, '2020-03-10 12:14:23'),
(242, '<a href=\"edit-booking?b=\"97\">\"00097\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>EBENEZA,=>guest phone =>0248409956,=>no persons=>1.=>checkin=>2020-03-10 12:03:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>97', 34, '2020-03-10 12:14:44'),
(243, '<a href=\"edit-booking?b=\"96\">\"00096\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>ATTA,=>guest phone =>0248409956,=>no persons=>2.=>checkin=>2020-03-10 12:03:00,=>checkout=>2020-03-11 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>96', 34, '2020-03-10 12:15:06'),
(244, '<a href=\"edit-booking?b=\"99\">\"00099\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>MR KOFI,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-11 11:19:00,=>checkout=>2020-03-12 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>99', 34, '2020-03-11 11:20:04'),
(245, '<a href=\"edit-booking?b=\"100\">\"00100\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-11 11:21:00,=>checkout=>2020-03-12 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>65.00=>discount=>5.00=>discout type=>fixed=>discount value=>5=>extra charge=>=>status=>Checked in=>bookings=>100', 34, '2020-03-11 11:27:56'),
(246, '<a href=\"edit-booking?b=\"100\">\"00100\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-11 11:21:00,=>checkout=>2020-03-12 12:00:00,=>nights=>1,=>original price=>70,=>price=>65=>discount=>5=>discout type=>fixed=>discount value=>5=>extra charge=>0=>status=>Checked out=>bookings=>100', 34, '2020-03-11 11:28:27'),
(247, '<a href=\"edit-booking?b=\"99\">\"00099\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>MR KOFI,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-11 11:19:00,=>checkout=>2020-03-12 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked in=>bookings=>99', 34, '2020-03-11 11:28:44'),
(248, '<a href=\"edit-booking?b=\"99\">\"00099\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>MR KOFI,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-11 11:19:00,=>checkout=>2020-03-12 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>99', 34, '2020-03-11 11:29:05'),
(249, '<a href=\"edit-booking?b=\"101\">\"00101\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>MR TAWIAH,=>guest phone =>024840956,=>no persons=>2.=>checkin=>2020-03-12 15:31:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>101', 34, '2020-03-12 03:33:26'),
(250, '<a href=\"edit-booking?b=\"102\">\"00102\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-12 15:33:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>65.00=>discount=>5.00=>discout type=>fixed=>discount value=>5=>extra charge=>=>status=>Checked in=>bookings=>102', 34, '2020-03-12 03:35:52'),
(251, '<a href=\"edit-booking?b=\"103\">\"00103\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>LAMTY,=>guest phone =>0244036855,=>no persons=>1.=>checkin=>2020-03-12 15:35:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>103', 34, '2020-03-12 03:37:23'),
(252, '<a href=\"edit-booking?b=\"104\">\"00104\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 5,=>guest name=>KWEKU,=>guest phone =>0264366321,=>no persons=>1.=>checkin=>2020-03-12 15:37:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>104', 34, '2020-03-12 03:38:43'),
(253, '<a href=\"edit-booking?b=\"105\">\"00105\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>KATEA,=>guest phone =>0247365454,=>no persons=>1.=>checkin=>2020-03-12 15:38:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>105', 34, '2020-03-12 03:40:36'),
(254, '<a href=\"edit-booking?b=\"106\">\"00106\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>DAVID,=>guest phone =>0243623568,=>no persons=>1.=>checkin=>2020-03-12 15:40:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>106', 34, '2020-03-12 03:41:30'),
(255, '<a href=\"edit-booking?b=\"107\">\"00107\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 13,=>guest name=>stephen,=>guest phone =>0242911628,=>no persons=>2.=>checkin=>2020-03-12 15:41:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>107', 34, '2020-03-12 03:43:13'),
(256, '<a href=\"edit-booking?b=\"108\">\"00108\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>PRICCE,=>guest phone =>0558471941,=>no persons=>1.=>checkin=>2020-03-12 15:43:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>108', 34, '2020-03-12 03:43:58');
INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES
(257, '<a href=\"edit-booking?b=\"101\">\"00101\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>MR TAWIAH,=>guest phone =>024840956,=>no persons=>2.=>checkin=>2020-03-12 15:31:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>101', 34, '2020-03-12 03:44:57'),
(258, '<a href=\"edit-booking?b=\"102\">\"00102\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-12 15:33:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>70,=>price=>65=>discount=>5=>discout type=>fixed=>discount value=>5=>extra charge=>0=>status=>Checked out=>bookings=>102', 34, '2020-03-12 03:45:13'),
(259, '<a href=\"edit-booking?b=\"103\">\"00103\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>LAMTY,=>guest phone =>0244036855,=>no persons=>1.=>checkin=>2020-03-12 15:35:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>103', 34, '2020-03-12 03:45:50'),
(260, '<a href=\"edit-booking?b=\"104\">\"00104\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 5,=>guest name=>KWEKU,=>guest phone =>0264366321,=>no persons=>1.=>checkin=>2020-03-12 15:37:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>104', 34, '2020-03-12 03:46:09'),
(261, '<a href=\"edit-booking?b=\"105\">\"00105\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>KATEA,=>guest phone =>0247365454,=>no persons=>1.=>checkin=>2020-03-12 15:38:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>105', 34, '2020-03-12 03:46:21'),
(262, '<a href=\"edit-booking?b=\"106\">\"00106\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>DAVID,=>guest phone =>0243623568,=>no persons=>1.=>checkin=>2020-03-12 15:40:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>106', 34, '2020-03-12 03:47:08'),
(263, '<a href=\"edit-booking?b=\"107\">\"00107\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 13,=>guest name=>stephen,=>guest phone =>0242911628,=>no persons=>2.=>checkin=>2020-03-12 15:41:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>107', 34, '2020-03-12 03:47:41'),
(264, '<a href=\"edit-booking?b=\"108\">\"00108\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>PRICCE,=>guest phone =>0558471941,=>no persons=>1.=>checkin=>2020-03-12 15:43:00,=>checkout=>2020-03-13 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>108', 34, '2020-03-12 03:48:43'),
(265, '<a href=\"edit-booking?b=\"109\">\"00109\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-13 12:05:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>5=>extra charge=>=>status=>Checked in=>bookings=>109', 34, '2020-03-13 12:07:46'),
(266, '<a href=\"edit-booking?b=\"110\">\"00110\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>DAVID,=>guest phone =>0243623568,=>no persons=>1.=>checkin=>2020-03-13 12:07:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>110', 34, '2020-03-13 12:08:18'),
(267, '<a href=\"edit-booking?b=\"111\">\"00111\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 13,=>guest name=>UCHE,=>guest phone =>0553028287,=>no persons=>2.=>checkin=>2020-03-13 12:08:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>111', 34, '2020-03-13 12:10:15'),
(268, '<a href=\"edit-booking?b=\"112\">\"00112\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>MR TAWIAH,=>guest phone =>024840956,=>no persons=>1.=>checkin=>2020-03-13 12:10:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>112', 34, '2020-03-13 12:11:36'),
(269, '<a href=\"edit-booking?b=\"113\">\"00113\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>NO NAME,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-13 12:11:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>113', 34, '2020-03-13 12:12:12'),
(270, '<a href=\"edit-booking?b=\"114\">\"00114\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>MOHAMANED,=>guest phone =>0246949504,=>no persons=>1.=>checkin=>2020-03-13 12:12:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>114', 34, '2020-03-13 12:13:08'),
(271, '<a href=\"edit-booking?b=\"110\">\"00110\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>DAVID,=>guest phone =>0243623568,=>no persons=>1.=>checkin=>2020-03-13 12:07:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>110', 34, '2020-03-13 12:18:21'),
(272, '<a href=\"edit-booking?b=\"111\">\"00111\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 13,=>guest name=>UCHE,=>guest phone =>0553028287,=>no persons=>2.=>checkin=>2020-03-13 12:08:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>111', 34, '2020-03-13 12:18:56'),
(273, '<a href=\"edit-booking?b=\"112\">\"00112\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>MR TAWIAH,=>guest phone =>024840956,=>no persons=>1.=>checkin=>2020-03-13 12:10:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>112', 34, '2020-03-13 12:19:07'),
(274, '<a href=\"edit-booking?b=\"113\">\"00113\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>NO NAME,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-13 12:11:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>113', 34, '2020-03-13 12:19:33'),
(275, '<a href=\"edit-booking?b=\"114\">\"00114\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>MOHAMANED,=>guest phone =>0246949504,=>no persons=>1.=>checkin=>2020-03-13 12:12:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>114', 34, '2020-03-13 12:19:50'),
(276, '<a href=\"edit-booking?b=\"115\">\"00115\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-13 12:21:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>65.00=>discount=>5.00=>discout type=>fixed=>discount value=>5=>extra charge=>=>status=>Checked in=>bookings=>115', 34, '2020-03-13 12:23:26'),
(277, '<a href=\"edit-booking?b=\"115\">\"00115\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-13 12:21:00,=>checkout=>2020-03-14 12:00:00,=>nights=>1,=>original price=>70,=>price=>65=>discount=>5=>discout type=>fixed=>discount value=>5=>extra charge=>0=>status=>Checked out=>bookings=>115', 34, '2020-03-13 12:23:50'),
(278, '<a href=\"edit-booking?b=\"116\">\"00116\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>OLDMAN,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-14 10:09:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>116', 34, '2020-03-14 10:10:19'),
(279, '<a href=\"edit-booking?b=\"117\">\"00117\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>NO NAME,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-14 10:10:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>117', 34, '2020-03-14 10:10:54'),
(280, '<a href=\"edit-booking?b=\"118\">\"00118\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-14 10:10:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>65.00=>discount=>5.00=>discout type=>fixed=>discount value=>5=>extra charge=>=>status=>Checked in=>bookings=>118', 34, '2020-03-14 10:12:06'),
(281, '<a href=\"edit-booking?b=\"119\">\"00119\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>DAVID,=>guest phone =>0243623568,=>no persons=>1.=>checkin=>2020-03-14 10:12:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>119', 34, '2020-03-14 10:12:40'),
(282, '<a href=\"edit-booking?b=\"120\">\"00120\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>ATTA,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-14 10:12:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>120', 34, '2020-03-14 10:13:24'),
(283, '<a href=\"edit-booking?b=\"121\">\"00121\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 20,=>guest name=>ASAMAOH,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-14 10:13:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>121', 34, '2020-03-14 10:14:21'),
(284, '<a href=\"edit-booking?b=\"122\">\"00122\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>NANA YAM,=>guest phone =>0244836538,=>no persons=>2.=>checkin=>2020-03-14 10:17:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>122', 34, '2020-03-14 10:18:23'),
(285, '<a href=\"edit-booking?b=\"123\">\"00123\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 31,=>guest name=>BISMARK,=>guest phone =>0246747277,=>no persons=>2.=>checkin=>2020-03-14 10:18:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>123', 34, '2020-03-14 10:19:40'),
(286, '<a href=\"edit-booking?b=\"124\">\"00124\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>KAY ,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-14 10:19:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>124', 34, '2020-03-14 10:20:58'),
(287, '<a href=\"edit-booking?b=\"116\">\"00116\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>OLDMAN,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-14 10:09:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>116', 34, '2020-03-14 10:21:50'),
(288, '<a href=\"edit-booking?b=\"125\">\"00125\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>KWABANA,=>guest phone =>0261718394,=>no persons=>2.=>checkin=>2020-03-14 10:22:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>125', 34, '2020-03-14 10:23:09'),
(289, '<a href=\"edit-booking?b=\"117\">\"00117\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>NO NAME,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-14 10:10:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>117', 34, '2020-03-14 10:23:42'),
(290, '<a href=\"edit-booking?b=\"118\">\"00118\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-14 10:10:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>70,=>price=>65=>discount=>5=>discout type=>fixed=>discount value=>5=>extra charge=>0=>status=>Checked out=>bookings=>118', 34, '2020-03-14 10:24:10'),
(291, '<a href=\"edit-booking?b=\"119\">\"00119\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>DAVID,=>guest phone =>0243623568,=>no persons=>1.=>checkin=>2020-03-14 10:12:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>119', 34, '2020-03-14 10:24:34'),
(292, '<a href=\"edit-booking?b=\"120\">\"00120\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>ATTA,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-14 10:12:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>120', 34, '2020-03-14 10:24:57'),
(293, '<a href=\"edit-booking?b=\"121\">\"00121\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 20,=>guest name=>ASAMAOH,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-14 10:13:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>121', 34, '2020-03-14 10:25:13'),
(294, '<a href=\"edit-booking?b=\"122\">\"00122\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>NANA YAM,=>guest phone =>0244836538,=>no persons=>2.=>checkin=>2020-03-14 10:17:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>122', 34, '2020-03-14 10:25:39'),
(295, '<a href=\"edit-booking?b=\"123\">\"00123\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 31,=>guest name=>BISMARK,=>guest phone =>0246747277,=>no persons=>2.=>checkin=>2020-03-14 10:18:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>123', 34, '2020-03-14 10:26:19'),
(296, '<a href=\"edit-booking?b=\"124\">\"00124\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>KAY ,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-14 10:19:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>124', 34, '2020-03-14 10:28:46'),
(297, '<a href=\"edit-booking?b=\"125\">\"00125\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>KWABANA,=>guest phone =>0261718394,=>no persons=>2.=>checkin=>2020-03-14 10:22:00,=>checkout=>2020-03-15 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>125', 34, '2020-03-14 10:29:12'),
(298, '<a href=\"edit-booking?b=\"126\">\"00126\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>ibrahim,=>guest phone =>0247362727,=>no persons=>2.=>checkin=>2020-03-15 07:05:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>126', 34, '2020-03-15 07:07:30'),
(299, '<a href=\"edit-booking?b=\"127\">\"00127\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>nana abubaka,=>guest phone =>0246634408,=>no persons=>1.=>checkin=>2020-03-15 07:07:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>127', 34, '2020-03-15 07:08:45'),
(300, '<a href=\"edit-booking?b=\"128\">\"00128\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>KAY ,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-15 07:08:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>128', 34, '2020-03-15 07:09:37'),
(301, '<a href=\"edit-booking?b=\"129\">\"00129\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 31,=>guest name=>BISMARK,=>guest phone =>0246747277,=>no persons=>1.=>checkin=>2020-03-15 07:09:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>129', 34, '2020-03-15 07:11:00'),
(302, '<a href=\"edit-booking?b=\"130\">\"00130\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-15 07:11:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>130', 34, '2020-03-15 07:12:01'),
(303, '<a href=\"edit-booking?b=\"131\">\"00131\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 5,=>guest name=>pastor,=>guest phone =>0242855734,=>no persons=>1.=>checkin=>2020-03-15 07:12:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>131', 34, '2020-03-15 07:13:46'),
(304, '<a href=\"edit-booking?b=\"132\">\"00132\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 2,=>guest name=>nana yam,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-15 07:13:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>132', 34, '2020-03-15 07:14:53'),
(305, '<a href=\"edit-booking?b=\"133\">\"00133\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>malik,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-15 07:14:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>133', 34, '2020-03-15 07:15:37'),
(306, '<a href=\"edit-booking?b=\"134\">\"00134\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>magick,=>guest phone =>02441427982,=>no persons=>2.=>checkin=>2020-03-15 07:15:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>134', 34, '2020-03-15 07:16:53'),
(307, '<a href=\"edit-booking?b=\"135\">\"00135\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 29,=>guest name=>grasce,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-15 07:17:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>135', 34, '2020-03-15 07:18:13'),
(308, '<a href=\"edit-booking?b=\"136\">\"00136\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 32,=>guest name=>aliki,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-15 07:18:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>136', 34, '2020-03-15 07:18:55'),
(309, '<a href=\"edit-booking?b=\"137\">\"00137\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>JOSEPH,=>guest phone =>0242647093,=>no persons=>2.=>checkin=>2020-03-15 07:19:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>137', 34, '2020-03-15 07:19:44'),
(310, '<a href=\"edit-booking?b=\"138\">\"00138\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>KWABANA,=>guest phone =>0261718394,=>no persons=>1.=>checkin=>2020-03-15 07:19:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>138', 34, '2020-03-15 07:20:37'),
(311, '<a href=\"edit-booking?b=\"139\">\"00139\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>KWESIO,=>guest phone =>000,=>no persons=>1.=>checkin=>2020-03-15 07:20:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>139', 34, '2020-03-15 07:22:38'),
(312, '<a href=\"edit-booking?b=\"140\">\"00140\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 8,=>guest name=>KWESIO,=>guest phone =>000,=>no persons=>1.=>checkin=>2020-03-15 07:22:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>140', 34, '2020-03-15 07:24:18'),
(313, '<a href=\"edit-booking?b=\"141\">\"00141\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>emma,=>guest phone =>0244486414,=>no persons=>2.=>checkin=>2020-03-15 07:24:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>141', 34, '2020-03-15 07:25:44'),
(314, '<a href=\"edit-booking?b=\"142\">\"00142\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 35,=>guest name=>yam,=>guest phone =>054396407,=>no persons=>2.=>checkin=>2020-03-15 07:25:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>142', 34, '2020-03-15 07:26:38'),
(315, '<a href=\"edit-booking?b=\"143\">\"00143\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 33,=>guest name=>nana k,=>guest phone =>0244101272,=>no persons=>2.=>checkin=>2020-03-15 07:26:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>143', 34, '2020-03-15 07:27:44'),
(316, '<a href=\"edit-booking?b=\"144\">\"00144\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 37,=>guest name=>yam ,=>guest phone =>054376407,=>no persons=>2.=>checkin=>2020-03-15 07:27:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>144', 34, '2020-03-15 07:29:39'),
(317, '<a href=\"edit-booking?b=\"145\">\"00145\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>ely,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-15 07:29:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>145', 34, '2020-03-15 07:30:44'),
(318, '<a href=\"edit-booking?b=\"130\">\"00130\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-15 07:11:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>130', 34, '2020-03-15 07:31:36'),
(319, '<a href=\"edit-booking?b=\"126\">\"00126\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>ibrahim,=>guest phone =>0247362727,=>no persons=>2.=>checkin=>2020-03-15 07:05:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>126', 34, '2020-03-15 07:32:25'),
(320, '<a href=\"edit-booking?b=\"127\">\"00127\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>nana abubaka,=>guest phone =>0246634408,=>no persons=>1.=>checkin=>2020-03-15 07:07:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>127', 34, '2020-03-15 07:32:42'),
(321, '<a href=\"edit-booking?b=\"128\">\"00128\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>KAY ,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-15 07:08:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>128', 34, '2020-03-15 07:32:57'),
(322, '<a href=\"edit-booking?b=\"129\">\"00129\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 31,=>guest name=>BISMARK,=>guest phone =>0246747277,=>no persons=>1.=>checkin=>2020-03-15 07:09:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>129', 34, '2020-03-15 07:33:17'),
(323, '<a href=\"edit-booking?b=\"131\">\"00131\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 5,=>guest name=>pastor,=>guest phone =>0242855734,=>no persons=>1.=>checkin=>2020-03-15 07:12:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>131', 34, '2020-03-15 07:33:32'),
(324, '<a href=\"edit-booking?b=\"132\">\"00132\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 2,=>guest name=>nana yam,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-15 07:13:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>132', 34, '2020-03-15 07:34:33'),
(325, '<a href=\"edit-booking?b=\"133\">\"00133\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>malik,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-15 07:14:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>133', 34, '2020-03-15 07:36:00'),
(326, '<a href=\"edit-booking?b=\"134\">\"00134\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>magick,=>guest phone =>02441427982,=>no persons=>2.=>checkin=>2020-03-15 07:15:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>134', 34, '2020-03-15 07:36:43'),
(327, '<a href=\"edit-booking?b=\"135\">\"00135\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 29,=>guest name=>grasce,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-15 07:17:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>135', 34, '2020-03-15 07:37:10'),
(328, '<a href=\"edit-booking?b=\"136\">\"00136\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 32,=>guest name=>aliki,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-15 07:18:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>136', 34, '2020-03-15 07:37:51'),
(329, '<a href=\"edit-booking?b=\"137\">\"00137\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>JOSEPH,=>guest phone =>0242647093,=>no persons=>2.=>checkin=>2020-03-15 07:19:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>137', 34, '2020-03-15 07:38:20'),
(330, '<a href=\"edit-booking?b=\"138\">\"00138\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>KWABANA,=>guest phone =>0261718394,=>no persons=>1.=>checkin=>2020-03-15 07:19:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>138', 34, '2020-03-15 07:38:59'),
(331, '<a href=\"edit-booking?b=\"139\">\"00139\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>KWESIO,=>guest phone =>000,=>no persons=>1.=>checkin=>2020-03-15 07:20:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>139', 34, '2020-03-15 07:39:15'),
(332, '<a href=\"edit-booking?b=\"140\">\"00140\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 8,=>guest name=>KWESIO,=>guest phone =>000,=>no persons=>1.=>checkin=>2020-03-15 07:22:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>140', 34, '2020-03-15 07:39:36'),
(333, '<a href=\"edit-booking?b=\"141\">\"00141\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>emma,=>guest phone =>0244486414,=>no persons=>2.=>checkin=>2020-03-15 07:24:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>141', 34, '2020-03-15 07:39:55'),
(334, '<a href=\"edit-booking?b=\"142\">\"00142\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 35,=>guest name=>yam,=>guest phone =>054396407,=>no persons=>2.=>checkin=>2020-03-15 07:25:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>142', 34, '2020-03-15 07:41:05'),
(335, '<a href=\"edit-booking?b=\"143\">\"00143\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 33,=>guest name=>nana k,=>guest phone =>0244101272,=>no persons=>2.=>checkin=>2020-03-15 07:26:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>143', 34, '2020-03-15 07:41:33'),
(336, '<a href=\"edit-booking?b=\"144\">\"00144\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 37,=>guest name=>yam ,=>guest phone =>054376407,=>no persons=>2.=>checkin=>2020-03-15 07:27:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>144', 34, '2020-03-15 07:42:00'),
(337, '<a href=\"edit-booking?b=\"145\">\"00145\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>ely,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-15 07:29:00,=>checkout=>2020-03-16 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>145', 34, '2020-03-15 07:42:12'),
(338, '<a href=\"edit-booking?b=\"146\">\"00146\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-16 07:03:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>65.00=>discount=>5.00=>discout type=>fixed=>discount value=>5=>extra charge=>=>status=>Checked in=>bookings=>146', 34, '2020-03-16 07:04:42'),
(339, '<a href=\"edit-booking?b=\"147\">\"00147\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 32,=>guest name=>MR ERIC,=>guest phone =>0546004488,=>no persons=>1.=>checkin=>2020-03-16 07:04:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>147', 34, '2020-03-16 07:05:47'),
(340, '<a href=\"edit-booking?b=\"148\">\"00148\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>MAGICK,=>guest phone =>0244142782,=>no persons=>2.=>checkin=>2020-03-16 07:05:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>148', 34, '2020-03-16 07:06:48'),
(341, '<a href=\"edit-booking?b=\"149\">\"00149\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>KWAME,=>guest phone =>0556615252,=>no persons=>2.=>checkin=>2020-03-16 07:06:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>149', 34, '2020-03-16 07:08:54'),
(342, '<a href=\"edit-booking?b=\"150\">\"00150\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>TARWA MAN,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-16 07:08:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>150', 34, '2020-03-16 07:09:57'),
(343, '<a href=\"edit-booking?b=\"151\">\"00151\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>MR ADAI,=>guest phone =>GS 821.19,=>no persons=>2.=>checkin=>2020-03-16 07:10:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>151', 34, '2020-03-16 07:11:12'),
(344, '<a href=\"edit-booking?b=\"152\">\"00152\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>FATHER,=>guest phone =>0277146784,=>no persons=>1.=>checkin=>2020-03-16 07:11:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>152', 34, '2020-03-16 07:12:53'),
(345, '<a href=\"edit-booking?b=\"153\">\"00153\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>FALICIA,=>guest phone =>054420230,=>no persons=>2.=>checkin=>2020-03-16 07:12:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>153', 34, '2020-03-16 07:14:36'),
(346, '<a href=\"edit-booking?b=\"154\">\"00154\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>SAMMY,=>guest phone =>024425678,=>no persons=>2.=>checkin=>2020-03-16 07:14:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>154', 34, '2020-03-16 07:15:42'),
(347, '<a href=\"edit-booking?b=\"155\">\"00155\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>KIYSU,=>guest phone =>0560467717,=>no persons=>2.=>checkin=>2020-03-16 07:15:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>155', 34, '2020-03-16 07:16:55'),
(348, '<a href=\"edit-booking?b=\"156\">\"00156\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>BENEND,=>guest phone =>0205836385,=>no persons=>2.=>checkin=>2020-03-16 07:16:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>156', 34, '2020-03-16 07:17:53'),
(349, '<a href=\"edit-booking?b=\"146\">\"00146\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-16 07:03:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70,=>price=>65=>discount=>5=>discout type=>fixed=>discount value=>5=>extra charge=>0=>status=>Checked out=>bookings=>146', 34, '2020-03-16 07:19:09'),
(350, '<a href=\"edit-booking?b=\"147\">\"00147\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 32,=>guest name=>MR ERIC,=>guest phone =>0546004488,=>no persons=>1.=>checkin=>2020-03-16 07:04:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>147', 34, '2020-03-16 07:19:22'),
(351, '<a href=\"edit-booking?b=\"148\">\"00148\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>MAGICK,=>guest phone =>0244142782,=>no persons=>2.=>checkin=>2020-03-16 07:05:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>148', 34, '2020-03-16 07:19:34'),
(352, '<a href=\"edit-booking?b=\"149\">\"00149\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>KWAME,=>guest phone =>0556615252,=>no persons=>2.=>checkin=>2020-03-16 07:06:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>149', 34, '2020-03-16 07:19:46'),
(353, '<a href=\"edit-booking?b=\"150\">\"00150\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>TARWA MAN,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-16 07:08:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>150', 34, '2020-03-16 07:20:11'),
(354, '<a href=\"edit-booking?b=\"151\">\"00151\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>MR ADAI,=>guest phone =>GS 821.19,=>no persons=>2.=>checkin=>2020-03-16 07:10:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>151', 34, '2020-03-16 07:20:24'),
(355, '<a href=\"edit-booking?b=\"152\">\"00152\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>FATHER,=>guest phone =>0277146784,=>no persons=>1.=>checkin=>2020-03-16 07:11:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>152', 34, '2020-03-16 07:20:34'),
(356, '<a href=\"edit-booking?b=\"153\">\"00153\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>FALICIA,=>guest phone =>054420230,=>no persons=>2.=>checkin=>2020-03-16 07:12:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>153', 34, '2020-03-16 07:20:44'),
(357, '<a href=\"edit-booking?b=\"154\">\"00154\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>SAMMY,=>guest phone =>024425678,=>no persons=>2.=>checkin=>2020-03-16 07:14:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>154', 34, '2020-03-16 07:20:57'),
(358, '<a href=\"edit-booking?b=\"155\">\"00155\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>KIYSU,=>guest phone =>0560467717,=>no persons=>2.=>checkin=>2020-03-16 07:15:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>155', 34, '2020-03-16 07:21:09'),
(359, '<a href=\"edit-booking?b=\"156\">\"00156\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>BENEND,=>guest phone =>0205836385,=>no persons=>2.=>checkin=>2020-03-16 07:16:00,=>checkout=>2020-03-17 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>156', 34, '2020-03-16 07:21:30'),
(360, '<a href=\"edit-booking?b=\"157\">\"00157\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-17 12:33:00,=>checkout=>2020-03-18 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>65.00=>discount=>5.00=>discout type=>fixed=>discount value=>5=>extra charge=>=>status=>Checked in=>bookings=>157', 34, '2020-03-17 12:36:03'),
(361, '<a href=\"edit-booking?b=\"158\">\"00158\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>kobby,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-17 12:36:00,=>checkout=>2020-03-18 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>158', 34, '2020-03-17 12:38:53'),
(362, '<a href=\"edit-booking?b=\"159\">\"00159\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>TARWA MAN,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-17 12:38:00,=>checkout=>2020-03-18 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>159', 34, '2020-03-17 12:39:37'),
(363, '<a href=\"edit-booking?b=\"160\">\"00160\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>john,=>guest phone =>025981515,=>no persons=>2.=>checkin=>2020-03-17 12:39:00,=>checkout=>2020-03-18 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>160', 34, '2020-03-17 12:40:23'),
(364, '<a href=\"edit-booking?b=\"157\">\"00157\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-17 12:33:00,=>checkout=>2020-03-18 12:00:00,=>nights=>1,=>original price=>70,=>price=>65=>discount=>5=>discout type=>fixed=>discount value=>5=>extra charge=>0=>status=>Checked out=>bookings=>157', 34, '2020-03-17 12:44:02'),
(365, '<a href=\"edit-booking?b=\"158\">\"00158\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>kobby,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-17 12:36:00,=>checkout=>2020-03-18 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>158', 34, '2020-03-17 12:44:50'),
(366, '<a href=\"edit-booking?b=\"159\">\"00159\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>TARWA MAN,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-17 12:38:00,=>checkout=>2020-03-18 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>159', 34, '2020-03-17 12:45:20'),
(367, '<a href=\"edit-booking?b=\"160\">\"00160\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>john,=>guest phone =>025981515,=>no persons=>2.=>checkin=>2020-03-17 12:39:00,=>checkout=>2020-03-18 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>160', 34, '2020-03-17 12:46:19'),
(368, '<a href=\"edit-booking?b=\"161\">\"00161\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>KASH,=>guest phone =>055249955,=>no persons=>1.=>checkin=>2020-03-18 22:51:00,=>checkout=>2020-03-19 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>161', 34, '2020-03-18 10:52:46'),
(369, '<a href=\"edit-booking?b=\"162\">\"00162\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-18 22:52:00,=>checkout=>2020-03-19 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>65.00=>discount=>5.00=>discout type=>fixed=>discount value=>5=>extra charge=>=>status=>Checked in=>bookings=>162', 34, '2020-03-18 10:53:57'),
(370, '<a href=\"edit-booking?b=\"163\">\"00163\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>NANA,=>guest phone =>0249374757,=>no persons=>1.=>checkin=>2020-03-18 22:54:00,=>checkout=>2020-03-19 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>163', 34, '2020-03-18 10:57:49'),
(371, '<a href=\"edit-booking?b=\"164\">\"00164\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>EMMANEUL,=>guest phone =>0546485714,=>no persons=>2.=>checkin=>2020-03-18 22:57:00,=>checkout=>2020-03-19 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>164', 34, '2020-03-18 10:58:35'),
(372, '<a href=\"edit-booking?b=\"165\">\"00165\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>MAYO,=>guest phone =>0503767333,=>no persons=>1.=>checkin=>2020-03-18 22:58:00,=>checkout=>2020-03-19 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>165', 34, '2020-03-18 10:59:34'),
(373, '<a href=\"edit-booking?b=\"161\">\"00161\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>KASH,=>guest phone =>055249955,=>no persons=>1.=>checkin=>2020-03-18 22:51:00,=>checkout=>2020-03-19 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>161', 34, '2020-03-18 11:00:24');
INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES
(374, '<a href=\"edit-booking?b=\"162\">\"00162\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-18 22:52:00,=>checkout=>2020-03-19 12:00:00,=>nights=>1,=>original price=>70,=>price=>65=>discount=>5=>discout type=>fixed=>discount value=>5=>extra charge=>0=>status=>Checked out=>bookings=>162', 34, '2020-03-18 11:06:47'),
(375, '<a href=\"edit-booking?b=\"163\">\"00163\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>NANA,=>guest phone =>0249374757,=>no persons=>1.=>checkin=>2020-03-18 22:54:00,=>checkout=>2020-03-19 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>163', 34, '2020-03-18 11:09:01'),
(376, '<a href=\"edit-booking?b=\"164\">\"00164\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>EMMANEUL,=>guest phone =>0546485714,=>no persons=>2.=>checkin=>2020-03-18 22:57:00,=>checkout=>2020-03-19 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>164', 34, '2020-03-18 11:10:04'),
(377, '<a href=\"edit-booking?b=\"165\">\"00165\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>MAYO,=>guest phone =>0503767333,=>no persons=>1.=>checkin=>2020-03-18 22:58:00,=>checkout=>2020-03-19 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>165', 34, '2020-03-18 11:10:28'),
(378, '<a href=\"edit-booking?b=\"166\">\"00166\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>UMAR,=>guest phone =>0548997194,=>no persons=>2.=>checkin=>2020-03-19 10:38:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>166', 34, '2020-03-19 10:43:29'),
(379, '<a href=\"edit-booking?b=\"167\">\"00167\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>ANESRT,=>guest phone =>0245070286,=>no persons=>2.=>checkin=>2020-03-19 10:43:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>167', 34, '2020-03-19 10:46:28'),
(380, '<a href=\"edit-booking?b=\"168\">\"00168\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 38,=>guest name=>NANA,=>guest phone =>0248249222,=>no persons=>2.=>checkin=>2020-03-19 10:46:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>168', 34, '2020-03-19 10:47:22'),
(381, '<a href=\"edit-booking?b=\"169\">\"00169\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>OBED,=>guest phone =>0248159895,=>no persons=>2.=>checkin=>2020-03-19 10:47:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>169', 34, '2020-03-19 10:49:28'),
(382, '<a href=\"edit-booking?b=\"170\">\"00170\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>OFECER,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-19 10:50:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>170', 34, '2020-03-19 10:51:07'),
(383, '<a href=\"edit-booking?b=\"171\">\"00171\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>OLDMAN,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-19 10:51:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>171', 34, '2020-03-19 10:51:50'),
(384, '<a href=\"edit-booking?b=\"172\">\"00172\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-19 10:51:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>172', 34, '2020-03-19 10:52:51'),
(385, '<a href=\"edit-booking?b=\"166\">\"00166\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>UMAR,=>guest phone =>0548997194,=>no persons=>2.=>checkin=>2020-03-19 10:38:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>166', 34, '2020-03-19 10:53:38'),
(386, '<a href=\"edit-booking?b=\"167\">\"00167\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>ANESRT,=>guest phone =>0245070286,=>no persons=>2.=>checkin=>2020-03-19 10:43:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>167', 34, '2020-03-19 10:57:18'),
(387, '<a href=\"edit-booking?b=\"168\">\"00168\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 38,=>guest name=>NANA,=>guest phone =>0248249222,=>no persons=>2.=>checkin=>2020-03-19 10:46:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>168', 34, '2020-03-19 10:57:29'),
(388, '<a href=\"edit-booking?b=\"169\">\"00169\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>OBED,=>guest phone =>0248159895,=>no persons=>2.=>checkin=>2020-03-19 10:47:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>169', 34, '2020-03-19 10:57:41'),
(389, '<a href=\"edit-booking?b=\"170\">\"00170\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>OFECER,=>guest phone =>no number,=>no persons=>2.=>checkin=>2020-03-19 10:50:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>170', 34, '2020-03-19 10:57:56'),
(390, '<a href=\"edit-booking?b=\"171\">\"00171\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>OLDMAN,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-19 10:51:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>171', 34, '2020-03-19 10:58:08'),
(391, '<a href=\"edit-booking?b=\"172\">\"00172\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>no number,=>no persons=>1.=>checkin=>2020-03-19 10:51:00,=>checkout=>2020-03-20 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>172', 34, '2020-03-19 10:58:46'),
(392, '<a href=\"edit-booking?b=\"173\">\"00173\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>SAVIOR,=>guest phone =>055301621,=>no persons=>2.=>checkin=>2020-03-20 11:40:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>173', 34, '2020-03-20 11:41:57'),
(393, '<a href=\"edit-booking?b=\"174\">\"00174\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-20 11:42:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>65.00=>discount=>5.00=>discout type=>fixed=>discount value=>5=>extra charge=>=>status=>Checked in=>bookings=>174', 34, '2020-03-20 11:42:59'),
(394, '<a href=\"edit-booking?b=\"175\">\"00175\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 5,=>guest name=>OPOKU,=>guest phone =>0546232394,=>no persons=>1.=>checkin=>2020-03-20 11:43:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>175', 34, '2020-03-20 11:43:54'),
(395, '<a href=\"edit-booking?b=\"176\">\"00176\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 32,=>guest name=>GIFTY,=>guest phone =>0241152350,=>no persons=>2.=>checkin=>2020-03-20 11:43:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>176', 34, '2020-03-20 11:44:53'),
(396, '<a href=\"edit-booking?b=\"177\">\"00177\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>SAMMY ,=>guest phone =>0244425678,=>no persons=>2.=>checkin=>2020-03-20 11:44:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>177', 34, '2020-03-20 11:46:04'),
(397, '<a href=\"edit-booking?b=\"178\">\"00178\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>nige,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-20 11:46:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>178', 34, '2020-03-20 11:46:29'),
(398, '<a href=\"edit-booking?b=\"179\">\"00179\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>NO NAME,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-20 11:46:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>179', 34, '2020-03-20 11:47:02'),
(399, '<a href=\"edit-booking?b=\"180\">\"00180\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 10,=>guest name=>JOSEPH,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-20 11:47:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>180', 34, '2020-03-20 11:48:00'),
(400, '<a href=\"edit-booking?b=\"181\">\"00181\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 36,=>guest name=>EMMANUEL,=>guest phone =>0572038503,=>no persons=>2.=>checkin=>2020-03-20 11:48:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>181', 34, '2020-03-20 11:49:13'),
(401, '<a href=\"edit-booking?b=\"182\">\"00182\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 35,=>guest name=>EMMANEUL,=>guest phone =>0572038503,=>no persons=>2.=>checkin=>2020-03-20 11:49:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>182', 34, '2020-03-20 11:50:22'),
(402, '<a href=\"edit-booking?b=\"173\">\"00173\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>SAVIOR,=>guest phone =>055301621,=>no persons=>2.=>checkin=>2020-03-20 11:40:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>173', 34, '2020-03-20 11:51:28'),
(403, '<a href=\"edit-booking?b=\"174\">\"00174\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>BOGA,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-20 11:42:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>70,=>price=>65=>discount=>5=>discout type=>fixed=>discount value=>5=>extra charge=>0=>status=>Checked out=>bookings=>174', 34, '2020-03-20 11:51:50'),
(404, '<a href=\"edit-booking?b=\"175\">\"00175\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 5,=>guest name=>OPOKU,=>guest phone =>0546232394,=>no persons=>1.=>checkin=>2020-03-20 11:43:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>175', 34, '2020-03-20 11:52:04'),
(405, '<a href=\"edit-booking?b=\"176\">\"00176\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 32,=>guest name=>GIFTY,=>guest phone =>0241152350,=>no persons=>2.=>checkin=>2020-03-20 11:43:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>176', 34, '2020-03-20 11:52:15'),
(406, '<a href=\"edit-booking?b=\"177\">\"00177\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>SAMMY ,=>guest phone =>0244425678,=>no persons=>2.=>checkin=>2020-03-20 11:44:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>177', 34, '2020-03-20 11:52:28'),
(407, '<a href=\"edit-booking?b=\"178\">\"00178\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 18,=>guest name=>nige,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-20 11:46:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>178', 34, '2020-03-20 11:52:39'),
(408, '<a href=\"edit-booking?b=\"179\">\"00179\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>NO NAME,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-20 11:46:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>179', 34, '2020-03-20 11:52:50'),
(409, '<a href=\"edit-booking?b=\"180\">\"00180\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 10,=>guest name=>JOSEPH,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-20 11:47:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>180', 34, '2020-03-20 11:53:06'),
(410, '<a href=\"edit-booking?b=\"181\">\"00181\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 36,=>guest name=>EMMANUEL,=>guest phone =>0572038503,=>no persons=>2.=>checkin=>2020-03-20 11:48:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>181', 34, '2020-03-20 11:53:16'),
(411, '<a href=\"edit-booking?b=\"182\">\"00182\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 35,=>guest name=>EMMANEUL,=>guest phone =>0572038503,=>no persons=>2.=>checkin=>2020-03-20 11:49:00,=>checkout=>2020-03-21 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>182', 34, '2020-03-20 11:53:30'),
(412, '<a href=\"edit-booking?b=\"183\">\"00183\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>MANSAH,=>guest phone =>0553547494,=>no persons=>2.=>checkin=>2020-03-21 10:59:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>183', 34, '2020-03-21 11:01:10'),
(413, '<a href=\"edit-booking?b=\"184\">\"00184\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>MACLIE,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-21 11:01:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>184', 34, '2020-03-21 11:01:58'),
(414, '<a href=\"edit-booking?b=\"185\">\"00185\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 29,=>guest name=>EMMANEUL,=>guest phone =>0546485714,=>no persons=>2.=>checkin=>2020-03-21 11:02:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>185', 34, '2020-03-21 11:02:35'),
(415, '<a href=\"edit-booking?b=\"186\">\"00186\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>ERNEST,=>guest phone =>024507306,=>no persons=>2.=>checkin=>2020-03-21 11:02:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>186', 34, '2020-03-21 11:04:06'),
(416, '<a href=\"edit-booking?b=\"187\">\"00187\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>THERASA,=>guest phone =>054679002,=>no persons=>2.=>checkin=>2020-03-21 11:04:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>187', 34, '2020-03-21 11:05:21'),
(417, '<a href=\"edit-booking?b=\"188\">\"00188\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 36,=>guest name=>MARK,=>guest phone =>0239297969,=>no persons=>2.=>checkin=>2020-03-21 11:05:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>188', 34, '2020-03-21 11:07:23'),
(418, '<a href=\"edit-booking?b=\"189\">\"00189\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>MOROW,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-21 11:07:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>189', 34, '2020-03-21 11:09:18'),
(419, '<a href=\"edit-booking?b=\"190\">\"00190\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>JAMES,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-21 11:09:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>190', 34, '2020-03-21 11:09:57'),
(420, '<a href=\"edit-booking?b=\"183\">\"00183\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>MANSAH,=>guest phone =>0553547494,=>no persons=>2.=>checkin=>2020-03-21 10:59:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>183', 34, '2020-03-21 11:10:42'),
(421, '<a href=\"edit-booking?b=\"184\">\"00184\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>MACLIE,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-21 11:01:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>184', 34, '2020-03-21 11:10:56'),
(422, '<a href=\"edit-booking?b=\"185\">\"00185\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 29,=>guest name=>EMMANEUL,=>guest phone =>0546485714,=>no persons=>2.=>checkin=>2020-03-21 11:02:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>185', 34, '2020-03-21 11:11:12'),
(423, '<a href=\"edit-booking?b=\"186\">\"00186\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>ERNEST,=>guest phone =>024507306,=>no persons=>2.=>checkin=>2020-03-21 11:02:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>186', 34, '2020-03-21 11:11:25'),
(424, '<a href=\"edit-booking?b=\"187\">\"00187\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 15,=>guest name=>THERASA,=>guest phone =>054679002,=>no persons=>2.=>checkin=>2020-03-21 11:04:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>187', 34, '2020-03-21 11:11:47'),
(425, '<a href=\"edit-booking?b=\"188\">\"00188\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 36,=>guest name=>MARK,=>guest phone =>0239297969,=>no persons=>2.=>checkin=>2020-03-21 11:05:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>188', 34, '2020-03-21 11:12:05'),
(426, '<a href=\"edit-booking?b=\"189\">\"00189\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>MOROW,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-21 11:07:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>189', 34, '2020-03-21 11:12:20'),
(427, '<a href=\"edit-booking?b=\"190\">\"00190\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>JAMES,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-21 11:09:00,=>checkout=>2020-03-22 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>190', 34, '2020-03-21 11:12:39'),
(428, '<a href=\"edit-booking?b=\"191\">\"00191\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>NO NAME,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-22 08:27:00,=>checkout=>2020-03-23 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>191', 34, '2020-03-22 08:28:14'),
(429, '<a href=\"edit-booking?b=\"192\">\"00192\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>UMAR,=>guest phone =>0548997194,=>no persons=>2.=>checkin=>2020-03-22 08:28:00,=>checkout=>2020-03-23 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>192', 34, '2020-03-22 08:30:14'),
(430, '<a href=\"edit-booking?b=\"193\">\"00193\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>HANNAH,=>guest phone =>0555493325,=>no persons=>1.=>checkin=>2020-03-22 08:30:00,=>checkout=>2020-03-23 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>193', 34, '2020-03-22 08:31:38'),
(431, '<a href=\"edit-booking?b=\"194\">\"00194\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 10,=>guest name=>MOROW,=>guest phone =>0000,=>no persons=>1.=>checkin=>2020-03-22 08:31:00,=>checkout=>2020-03-23 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>194', 34, '2020-03-22 08:32:25'),
(432, '<a href=\"edit-booking?b=\"191\">\"00191\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>NO NAME,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-22 08:27:00,=>checkout=>2020-03-23 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>191', 34, '2020-03-22 08:33:16'),
(433, '<a href=\"edit-booking?b=\"192\">\"00192\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>UMAR,=>guest phone =>0548997194,=>no persons=>2.=>checkin=>2020-03-22 08:28:00,=>checkout=>2020-03-23 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>192', 34, '2020-03-22 08:33:42'),
(434, '<a href=\"edit-booking?b=\"193\">\"00193\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>HANNAH,=>guest phone =>0555493325,=>no persons=>1.=>checkin=>2020-03-22 08:30:00,=>checkout=>2020-03-23 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>193', 34, '2020-03-22 08:34:11'),
(435, '<a href=\"edit-booking?b=\"194\">\"00194\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 10,=>guest name=>MOROW,=>guest phone =>0000,=>no persons=>1.=>checkin=>2020-03-22 08:31:00,=>checkout=>2020-03-23 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>194', 34, '2020-03-22 08:34:25'),
(436, '<a href=\"edit-booking?b=\"195\">\"00195\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>MOJOR ,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-23 09:14:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>195', 34, '2020-03-23 09:15:16'),
(437, '<a href=\"edit-booking?b=\"196\">\"00196\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>KWASI,=>guest phone =>0245981315,=>no persons=>2.=>checkin=>2020-03-23 09:15:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>196', 34, '2020-03-23 09:16:51'),
(438, '<a href=\"edit-booking?b=\"197\">\"00197\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>NO NAME,=>guest phone =>0246553437,=>no persons=>2.=>checkin=>2020-03-23 09:16:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>197', 34, '2020-03-23 09:17:49'),
(439, '<a href=\"edit-booking?b=\"198\">\"00198\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>MR MICHEAL,=>guest phone =>0244509128,=>no persons=>2.=>checkin=>2020-03-23 09:17:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>198', 34, '2020-03-23 09:19:09'),
(440, '<a href=\"edit-booking?b=\"199\">\"00199\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>MUSAH,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-23 09:19:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>199', 34, '2020-03-23 09:19:44'),
(441, '<a href=\"edit-booking?b=\"200\">\"00200\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>JOSSEY,=>guest phone =>0279844669,=>no persons=>2.=>checkin=>2020-03-23 09:19:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>200', 34, '2020-03-23 09:20:56'),
(442, '<a href=\"edit-booking?b=\"201\">\"00201\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>MALIK,=>guest phone =>0244210649,=>no persons=>2.=>checkin=>2020-03-23 09:22:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>201', 34, '2020-03-23 09:23:27'),
(443, '<a href=\"edit-booking?b=\"202\">\"00202\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>FLICIA,=>guest phone =>0547184673,=>no persons=>2.=>checkin=>2020-03-23 09:23:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>202', 34, '2020-03-23 09:24:41'),
(444, '<a href=\"edit-booking?b=\"195\">\"00195\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>MOJOR ,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-23 09:14:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>195', 34, '2020-03-23 09:25:40'),
(445, '<a href=\"edit-booking?b=\"196\">\"00196\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>KWASI,=>guest phone =>0245981315,=>no persons=>2.=>checkin=>2020-03-23 09:15:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>196', 34, '2020-03-23 09:25:55'),
(446, '<a href=\"edit-booking?b=\"197\">\"00197\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>NO NAME,=>guest phone =>0246553437,=>no persons=>2.=>checkin=>2020-03-23 09:16:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>197', 34, '2020-03-23 09:26:19'),
(447, '<a href=\"edit-booking?b=\"198\">\"00198\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>MR MICHEAL,=>guest phone =>0244509128,=>no persons=>2.=>checkin=>2020-03-23 09:17:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>198', 34, '2020-03-23 09:26:43'),
(448, '<a href=\"edit-booking?b=\"199\">\"00199\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 17,=>guest name=>MUSAH,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-23 09:19:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>199', 34, '2020-03-23 09:27:58'),
(449, '<a href=\"edit-booking?b=\"200\">\"00200\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>JOSSEY,=>guest phone =>0279844669,=>no persons=>2.=>checkin=>2020-03-23 09:19:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>200', 34, '2020-03-23 09:28:30'),
(450, '<a href=\"edit-booking?b=\"201\">\"00201\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>MALIK,=>guest phone =>0244210649,=>no persons=>2.=>checkin=>2020-03-23 09:22:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>201', 34, '2020-03-23 09:28:53'),
(451, '<a href=\"edit-booking?b=\"202\">\"00202\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 4,=>guest name=>FLICIA,=>guest phone =>0547184673,=>no persons=>2.=>checkin=>2020-03-23 09:23:00,=>checkout=>2020-03-24 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>202', 34, '2020-03-23 09:29:16'),
(452, '<a href=\"edit-booking?b=\"203\">\"00203\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>ISAAC,=>guest phone =>0249441566,=>no persons=>2.=>checkin=>2020-03-24 12:08:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>203', 34, '2020-03-24 12:08:50'),
(453, '<a href=\"edit-booking?b=\"204\">\"00204\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>JOSSEY,=>guest phone =>0279844669,=>no persons=>2.=>checkin=>2020-03-24 12:08:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>204', 34, '2020-03-24 12:09:30'),
(454, '<a href=\"edit-booking?b=\"205\">\"00205\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>SAVIOR,=>guest phone =>055301621,=>no persons=>1.=>checkin=>2020-03-24 12:09:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>205', 34, '2020-03-24 12:10:07'),
(455, '<a href=\"edit-booking?b=\"206\">\"00206\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>NO NAME,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-24 12:10:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>206', 34, '2020-03-24 12:10:42'),
(456, '<a href=\"edit-booking?b=\"207\">\"00207\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>OLDMAN,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-24 12:10:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>207', 34, '2020-03-24 12:11:12'),
(457, '<a href=\"edit-booking?b=\"208\">\"00208\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>BEN,=>guest phone =>0246183013,=>no persons=>2.=>checkin=>2020-03-24 12:11:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>208', 34, '2020-03-24 12:16:07'),
(458, '<a href=\"edit-booking?b=\"209\">\"00209\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 13,=>guest name=>ETI,=>guest phone =>0244704520,=>no persons=>2.=>checkin=>2020-03-24 12:16:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>209', 34, '2020-03-24 12:22:16'),
(459, '<a href=\"edit-booking?b=\"210\">\"00210\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 31,=>guest name=>KWAME,=>guest phone =>0244716527,=>no persons=>2.=>checkin=>2020-03-24 12:22:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>210', 34, '2020-03-24 12:25:15'),
(460, '<a href=\"edit-booking?b=\"211\">\"00211\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 32,=>guest name=>stephen,=>guest phone =>0558090579,=>no persons=>2.=>checkin=>2020-03-24 12:25:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>211', 34, '2020-03-24 12:26:29'),
(461, '<a href=\"edit-booking?b=\"203\">\"00203\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 14,=>guest name=>ISAAC,=>guest phone =>0249441566,=>no persons=>2.=>checkin=>2020-03-24 12:08:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>203', 34, '2020-03-24 12:27:04'),
(462, '<a href=\"edit-booking?b=\"204\">\"00204\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 25,=>guest name=>JOSSEY,=>guest phone =>0279844669,=>no persons=>2.=>checkin=>2020-03-24 12:08:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>204', 34, '2020-03-24 12:27:28'),
(463, '<a href=\"edit-booking?b=\"205\">\"00205\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>SAVIOR,=>guest phone =>055301621,=>no persons=>1.=>checkin=>2020-03-24 12:09:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>205', 34, '2020-03-24 12:27:57'),
(464, '<a href=\"edit-booking?b=\"206\">\"00206\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>NO NAME,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-24 12:10:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>206', 34, '2020-03-24 12:28:27'),
(465, '<a href=\"edit-booking?b=\"207\">\"00207\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>OLDMAN,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-24 12:10:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>207', 34, '2020-03-24 12:28:52'),
(466, '<a href=\"edit-booking?b=\"208\">\"00208\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 3,=>guest name=>BEN,=>guest phone =>0246183013,=>no persons=>2.=>checkin=>2020-03-24 12:11:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>208', 34, '2020-03-24 12:29:36'),
(467, '<a href=\"edit-booking?b=\"209\">\"00209\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 13,=>guest name=>ETI,=>guest phone =>0244704520,=>no persons=>2.=>checkin=>2020-03-24 12:16:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>209', 34, '2020-03-24 12:30:02'),
(468, '<a href=\"edit-booking?b=\"210\">\"00210\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 31,=>guest name=>KWAME,=>guest phone =>0244716527,=>no persons=>2.=>checkin=>2020-03-24 12:22:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>210', 34, '2020-03-24 12:30:14'),
(469, '<a href=\"edit-booking?b=\"211\">\"00211\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 32,=>guest name=>stephen,=>guest phone =>0558090579,=>no persons=>2.=>checkin=>2020-03-24 12:25:00,=>checkout=>2020-03-25 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>211', 34, '2020-03-24 12:30:48'),
(470, '<a href=\"edit-booking?b=\"212\">\"00212\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>KWESI,=>guest phone =>0244309373,=>no persons=>1.=>checkin=>2020-03-25 10:09:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>212', 34, '2020-03-25 10:10:21'),
(471, '<a href=\"edit-booking?b=\"213\">\"00213\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>SAVIOR,=>guest phone =>055301621,=>no persons=>1.=>checkin=>2020-03-25 10:14:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>213', 34, '2020-03-25 10:16:01'),
(472, '<a href=\"edit-booking?b=\"214\">\"00214\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>MR ALBERT,=>guest phone =>05459330,=>no persons=>2.=>checkin=>2020-03-25 10:16:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>214', 34, '2020-03-25 10:19:44'),
(473, '<a href=\"edit-booking?b=\"215\">\"00215\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>nige,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-25 10:20:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>215', 34, '2020-03-25 10:21:22'),
(474, '<a href=\"edit-booking?b=\"216\">\"00216\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>nige,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-25 10:20:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>216', 34, '2020-03-25 10:23:01'),
(475, '<a href=\"edit-booking?b=\"217\">\"00217\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>MR MOROW,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-25 10:24:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>217', 34, '2020-03-25 10:26:26'),
(476, '<a href=\"edit-booking?b=\"212\">\"00212\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 28,=>guest name=>KWESI,=>guest phone =>0244309373,=>no persons=>1.=>checkin=>2020-03-25 10:09:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>212', 34, '2020-03-25 10:27:55'),
(477, '<a href=\"edit-booking?b=\"213\">\"00213\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>SAVIOR,=>guest phone =>055301621,=>no persons=>1.=>checkin=>2020-03-25 10:14:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>213', 34, '2020-03-25 11:35:33'),
(478, '<a href=\"edit-booking?b=\"214\">\"00214\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 40,=>guest name=>MR ALBERT,=>guest phone =>05459330,=>no persons=>2.=>checkin=>2020-03-25 10:16:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>214', 34, '2020-03-25 11:35:51'),
(479, '<a href=\"edit-booking?b=\"215\">\"00215\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 21,=>guest name=>nige,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-25 10:20:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>215', 34, '2020-03-25 11:36:21'),
(480, '<a href=\"edit-booking?b=\"216\">\"00216\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 22,=>guest name=>nige,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-25 10:20:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>216', 34, '2020-03-25 11:36:47'),
(481, '<a href=\"edit-booking?b=\"217\">\"00217\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>MR MOROW,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-25 10:24:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>217', 34, '2020-03-25 11:38:13'),
(482, '<a href=\"edit-booking?b=\"218\">\"00218\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 10,=>guest name=>MR MOROW,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-25 17:54:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>218', 34, '2020-03-25 05:56:45'),
(483, '<a href=\"edit-booking?b=\"218\">\"00218\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 10,=>guest name=>MR MOROW,=>guest phone =>NO NUMBER,=>no persons=>1.=>checkin=>2020-03-25 17:54:00,=>checkout=>2020-03-26 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>218', 34, '2020-03-25 05:58:11'),
(484, '<a href=\"edit-booking?b=\"219\">\"00219\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>SAVIOR,=>guest phone =>055301621,=>no persons=>1.=>checkin=>2020-03-26 10:13:00,=>checkout=>2020-03-27 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>219', 34, '2020-03-26 10:14:06'),
(485, '<a href=\"edit-booking?b=\"220\">\"00220\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>MR ALBERT,=>guest phone =>05459330,=>no persons=>2.=>checkin=>2020-03-26 10:14:00,=>checkout=>2020-03-27 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>220', 34, '2020-03-26 10:14:38'),
(486, '<a href=\"edit-booking?b=\"221\">\"00221\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>FRANK,=>guest phone =>0549006646,=>no persons=>2.=>checkin=>2020-03-26 10:14:00,=>checkout=>2020-03-27 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>221', 34, '2020-03-26 10:15:36'),
(487, '<a href=\"edit-booking?b=\"222\">\"00222\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>KWEKU,=>guest phone =>053676857,=>no persons=>2.=>checkin=>2020-03-26 10:15:00,=>checkout=>2020-03-27 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>222', 34, '2020-03-26 10:16:57'),
(488, '<a href=\"edit-booking?b=\"223\">\"00223\"</a> Booking made room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>NO NAME,=>guest phone =>0249669232,=>no persons=>2.=>checkin=>2020-03-26 10:16:00,=>checkout=>2020-03-27 12:00:00,=>nights=>1,=>original price=>50.00,=>price=>50.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>223', 34, '2020-03-26 10:18:03'),
(489, '<a href=\"edit-booking?b=\"223\">\"00223\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 12,=>guest name=>NO NAME,=>guest phone =>0249669232,=>no persons=>2.=>checkin=>2020-03-26 10:16:00,=>checkout=>2020-03-27 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>223', 34, '2020-03-26 10:19:03'),
(490, '<a href=\"edit-booking?b=\"219\">\"00219\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>SAVIOR,=>guest phone =>055301621,=>no persons=>1.=>checkin=>2020-03-26 10:13:00,=>checkout=>2020-03-27 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>219', 34, '2020-03-26 10:19:38');
INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES
(491, '<a href=\"edit-booking?b=\"220\">\"00220\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>MR ALBERT,=>guest phone =>05459330,=>no persons=>2.=>checkin=>2020-03-26 10:14:00,=>checkout=>2020-03-27 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>220', 34, '2020-03-26 10:19:57'),
(492, '<a href=\"edit-booking?b=\"221\">\"00221\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>FRANK,=>guest phone =>0549006646,=>no persons=>2.=>checkin=>2020-03-26 10:14:00,=>checkout=>2020-03-27 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>221', 34, '2020-03-26 10:20:20'),
(493, '<a href=\"edit-booking?b=\"222\">\"00222\"</a> Booking details updated room_type=>SHORT STAY (+FAN),room=>ROOM 27,=>guest name=>KWEKU,=>guest phone =>053676857,=>no persons=>2.=>checkin=>2020-03-26 10:15:00,=>checkout=>2020-03-27 12:00:00,=>nights=>1,=>original price=>50,=>price=>50=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>222', 34, '2020-03-26 10:21:04'),
(494, '<a href=\"edit-booking?b=\"224\">\"00224\"</a> Booking made room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>SAVIOR,=>guest phone =>055301621,=>no persons=>1.=>checkin=>2020-03-27 08:22:00,=>checkout=>2020-03-28 12:00:00,=>nights=>1,=>original price=>120.00,=>price=>120.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>224', 34, '2020-03-27 08:22:39'),
(495, '<a href=\"edit-booking?b=\"225\">\"00225\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>MR ALBERT,=>guest phone =>05459330,=>no persons=>1.=>checkin=>2020-03-27 08:22:00,=>checkout=>2020-03-28 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>225', 34, '2020-03-27 08:23:19'),
(496, '<a href=\"edit-booking?b=\"226\">\"00226\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 13,=>guest name=>OBED,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-27 08:23:00,=>checkout=>2020-03-28 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>226', 34, '2020-03-27 08:24:24'),
(497, '<a href=\"edit-booking?b=\"227\">\"00227\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>KOBBY,=>guest phone =>055323494,=>no persons=>2.=>checkin=>2020-03-27 08:24:00,=>checkout=>2020-03-28 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>227', 34, '2020-03-27 08:25:35'),
(498, '<a href=\"edit-booking?b=\"228\">\"00228\"</a> Booking made room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>MR OLU,=>guest phone =>0274443021,=>no persons=>2.=>checkin=>2020-03-27 08:25:00,=>checkout=>2020-03-28 12:00:00,=>nights=>1,=>original price=>70.00,=>price=>70.00=>discount=>0.00=>discout type=>fixed=>discount value=>=>extra charge=>=>status=>Checked in=>bookings=>228', 34, '2020-03-27 08:26:47'),
(499, '<a href=\"edit-booking?b=\"224\">\"00224\"</a> Booking details updated room_type=>GOLDEN (+AC, FAN &  FRIDGE),room=>ROOM 24,=>guest name=>SAVIOR,=>guest phone =>055301621,=>no persons=>1.=>checkin=>2020-03-27 08:22:00,=>checkout=>2020-03-28 12:00:00,=>nights=>1,=>original price=>120,=>price=>120=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>224', 34, '2020-03-27 08:27:56'),
(500, '<a href=\"edit-booking?b=\"225\">\"00225\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 1,=>guest name=>MR ALBERT,=>guest phone =>05459330,=>no persons=>1.=>checkin=>2020-03-27 08:22:00,=>checkout=>2020-03-28 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>225', 34, '2020-03-27 08:28:30'),
(501, '<a href=\"edit-booking?b=\"226\">\"00226\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 13,=>guest name=>OBED,=>guest phone =>NO NUMBER,=>no persons=>2.=>checkin=>2020-03-27 08:23:00,=>checkout=>2020-03-28 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>226', 34, '2020-03-27 08:28:51'),
(502, '<a href=\"edit-booking?b=\"227\">\"00227\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 19,=>guest name=>KOBBY,=>guest phone =>055323494,=>no persons=>2.=>checkin=>2020-03-27 08:24:00,=>checkout=>2020-03-28 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>227', 34, '2020-03-27 08:29:06'),
(503, '<a href=\"edit-booking?b=\"228\">\"00228\"</a> Booking details updated room_type=>COMFORT (+FAN),room=>ROOM 39,=>guest name=>MR OLU,=>guest phone =>0274443021,=>no persons=>2.=>checkin=>2020-03-27 08:25:00,=>checkout=>2020-03-28 12:00:00,=>nights=>1,=>original price=>70,=>price=>70=>discount=>0=>discout type=>fixed=>discount value=>0=>extra charge=>0=>status=>Checked out=>bookings=>228', 34, '2020-03-27 08:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `pool_fees`
--

CREATE TABLE `pool_fees` (
  `fee_id` int(11) NOT NULL,
  `fee_type` varchar(20) NOT NULL,
  `amount` double NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pool_fees`
--

INSERT INTO `pool_fees` (`fee_id`, `fee_type`, `amount`, `status`) VALUES
(1, 'ADULT', 10, 'new'),
(2, 'CHILDREN', 5, 'new'),
(3, 'TEENS', 0, 'deleted'),
(4, 'TEENS', 0, 'deleted'),
(5, 'TEENS', 7, 'new'),
(6, 'Snooker', 2, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `pool_side_records`
--

CREATE TABLE `pool_side_records` (
  `pol_id` int(11) NOT NULL,
  `fees_type` varchar(20) NOT NULL,
  `persons` int(11) NOT NULL,
  `amount_paid` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `fees` double NOT NULL,
  `pl_status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pool_side_records`
--

INSERT INTO `pool_side_records` (`pol_id`, `fees_type`, `persons`, `amount_paid`, `user_id`, `date_time`, `fees`, `pl_status`) VALUES
(1, 'ADULT', 1, 10, 35, '2020-03-01 07:33:06', 10, 'saved'),
(2, 'CHILDREN', 1, 5, 40, '2020-03-01 12:53:10', 5, 'deleted'),
(3, 'ADULT', 1, 10, 35, '2020-03-02 12:49:15', 10, 'saved'),
(4, 'TEENS', 2, 14, 35, '2020-03-02 12:49:35', 7, 'saved'),
(5, 'ADULT', 2, 20, 35, '2020-03-02 12:49:52', 10, 'saved'),
(6, 'ADULT', 1, 10, 35, '2020-03-02 12:50:01', 10, 'saved'),
(7, 'ADULT', 2, 20, 35, '2020-03-02 12:50:08', 10, 'saved'),
(8, 'ADULT', 1, 10, 35, '2020-03-02 12:50:12', 10, 'saved'),
(9, 'CHILDREN', 1, 5, 35, '2020-03-02 12:50:18', 5, 'saved'),
(10, 'ADULT', 1, 10, 35, '2020-03-02 12:50:35', 10, 'saved'),
(11, 'ADULT', 1, 10, 35, '2020-03-02 12:50:39', 10, 'saved'),
(12, 'ADULT', 2, 20, 35, '2020-03-02 12:50:46', 10, 'saved'),
(13, 'ADULT', 1, 10, 35, '2020-03-02 12:50:53', 10, 'saved'),
(14, 'ADULT', 1, 10, 35, '2020-03-02 12:50:58', 10, 'saved'),
(15, 'ADULT', 2, 20, 35, '2020-03-02 12:51:18', 10, 'saved'),
(16, 'ADULT', 3, 30, 35, '2020-03-02 12:51:32', 10, 'saved'),
(17, 'ADULT', 3, 30, 35, '2020-03-02 12:51:51', 10, 'saved'),
(18, 'ADULT', 4, 40, 35, '2020-03-02 12:52:25', 10, 'saved'),
(19, 'ADULT', 4, 40, 35, '2020-03-09 13:46:36', 10, 'saved'),
(20, 'ADULT', 1, 10, 35, '2020-03-09 13:46:57', 10, 'saved'),
(21, 'ADULT', 6, 60, 35, '2020-03-09 13:47:05', 10, 'saved'),
(22, 'ADULT', 1, 10, 35, '2020-03-09 13:47:10', 10, 'saved'),
(23, 'ADULT', 1, 10, 35, '2020-03-09 13:47:14', 10, 'saved'),
(24, 'ADULT', 2, 20, 35, '2020-03-09 13:47:20', 10, 'saved'),
(25, 'ADULT', 2, 20, 35, '2020-03-09 13:47:46', 10, 'saved'),
(26, 'ADULT', 2, 20, 35, '2020-03-09 13:47:49', 10, 'saved'),
(27, 'ADULT', 2, 20, 35, '2020-03-09 13:48:49', 10, 'saved'),
(28, 'ADULT', 1, 10, 35, '2020-03-09 13:48:56', 10, 'saved'),
(29, 'ADULT', 1, 10, 35, '2020-03-09 13:48:58', 10, 'saved'),
(30, 'ADULT', 2, 20, 35, '2020-03-09 13:49:10', 10, 'saved'),
(31, 'ADULT', 4, 40, 35, '2020-03-09 13:51:26', 10, 'saved'),
(32, 'ADULT', 2, 20, 35, '2020-03-09 13:56:18', 10, 'saved'),
(33, 'ADULT', 7, 70, 35, '2020-03-09 14:00:14', 10, 'saved'),
(34, 'ADULT', 1, 10, 35, '2020-03-09 14:00:21', 10, 'saved'),
(35, 'ADULT', 1, 10, 35, '2020-03-09 14:00:25', 10, 'saved'),
(36, 'ADULT', 1, 10, 35, '2020-03-09 14:00:31', 10, 'saved'),
(37, 'TEENS', 1, 7, 35, '2020-03-09 14:00:44', 7, 'saved');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(110) NOT NULL,
  `room_type` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `maintenance` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`r_id`, `r_name`, `room_type`, `availability`, `maintenance`) VALUES
(1, 'ROOM 1', 1, 0, 0),
(2, 'ROOM 2', 1, 0, 0),
(3, 'ROOM 3', 1, 0, 0),
(4, 'ROOM 4', 1, 0, 0),
(5, 'ROOM 5', 2, 0, 0),
(6, 'ROOM 6', 1, 0, 0),
(7, 'ROOM 7', 3, 0, 0),
(8, 'ROOM 8', 1, 0, 0),
(9, 'ROOM 9', 1, 0, 0),
(10, 'ROOM 10', 2, 0, 0),
(11, 'ROOM 11', 1, 0, 0),
(12, 'ROOM 12', 4, 0, 0),
(13, 'ROOM 13', 1, 0, 0),
(14, 'ROOM 14', 1, 0, 0),
(15, 'ROOM 15', 1, 0, 0),
(16, 'ROOM 16', 3, 0, 0),
(17, 'ROOM 17', 1, 0, 0),
(18, 'ROOM 18', 2, 0, 0),
(19, 'ROOM 19', 1, 0, 0),
(20, 'ROOM 20', 2, 0, 0),
(21, 'ROOM 21', 2, 0, 0),
(22, 'ROOM 22', 2, 0, 0),
(24, 'ROOM 24', 2, 0, 0),
(25, 'ROOM 25', 1, 0, 0),
(27, 'ROOM 27', 4, 0, 0),
(28, 'ROOM 28', 1, 0, 0),
(29, 'ROOM 29', 1, 0, 0),
(30, 'ROOM 30', 1, 0, 0),
(31, 'ROOM 31', 1, 0, 0),
(32, 'ROOM 32', 1, 0, 0),
(33, 'ROOM 33', 1, 0, 0),
(34, 'ROOM 34', 1, 0, 0),
(35, 'ROOM 35', 1, 0, 0),
(36, 'ROOM 36', 1, 0, 0),
(37, 'ROOM 37', 1, 0, 0),
(38, 'ROOM 38', 1, 0, 0),
(39, 'ROOM 39', 1, 0, 0),
(40, 'ROOM 40', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `rt_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `num_persons` int(11) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `image` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`rt_id`, `room_name`, `num_persons`, `price`, `description`, `image`) VALUES
(1, 'COMFORT (+FAN)', 2, 70, 'A modern spacious room with Queen bed, en suite bath/shower, sofa, large ergonomic work area, 32 LCD TV  Up to 2 adults.', 'COMFORT_(+FAN).jpeg'),
(2, 'GOLDEN (+AC, FAN &  FRIDGE)', 2, 120, 'A modern spacious room with Queen bed, en suite bath/shower, sofa, large ergonomic work area, 32 LCD TV ', 'GOLDEN_(+AC,_FAN_&__FRIDGE).jpeg'),
(3, 'LUXURY  (+AC, FAN, FRIDGE & WATER HEATER)', 2, 140, 'A modern spacious room with Queen bed, en suite bath/shower, sofa, large ergonomic work area, 32 LCD TV ', 'LUXURY__(+AC,_FRIDGE_AND_WATER_HEATER).jpeg'),
(4, 'SHORT STAY (+FAN)', 2, 50, 'Spacious, contemporary design and adaptable, the Millennium Hotel room is truly a place for living. Perfect for all your needs. A modern spacious room with Queen bed, en suite bath/shower, sofa, large ergonomic work area, 32 LCD TV, Up to 2 adults.', 'SHORT_TIME.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bar_history`
--
ALTER TABLE `bar_history`
  ADD PRIMARY KEY (`bh_id`);

--
-- Indexes for table `bar_operations_history`
--
ALTER TABLE `bar_operations_history`
  ADD PRIMARY KEY (`boh_id`);

--
-- Indexes for table `bar_products`
--
ALTER TABLE `bar_products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `bar_sales`
--
ALTER TABLE `bar_sales`
  ADD PRIMARY KEY (`bs_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleted_records`
--
ALTER TABLE `deleted_records`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `hotel_expenses`
--
ALTER TABLE `hotel_expenses`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `hotel_operation_histories`
--
ALTER TABLE `hotel_operation_histories`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `pool_fees`
--
ALTER TABLE `pool_fees`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `pool_side_records`
--
ALTER TABLE `pool_side_records`
  ADD PRIMARY KEY (`pol_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`rt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `bar_history`
--
ALTER TABLE `bar_history`
  MODIFY `bh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bar_operations_history`
--
ALTER TABLE `bar_operations_history`
  MODIFY `boh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `bar_products`
--
ALTER TABLE `bar_products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `bar_sales`
--
ALTER TABLE `bar_sales`
  MODIFY `bs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deleted_records`
--
ALTER TABLE `deleted_records`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `hotel_expenses`
--
ALTER TABLE `hotel_expenses`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_operation_histories`
--
ALTER TABLE `hotel_operation_histories`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;

--
-- AUTO_INCREMENT for table `pool_fees`
--
ALTER TABLE `pool_fees`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pool_side_records`
--
ALTER TABLE `pool_side_records`
  MODIFY `pol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `rt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
