-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 07:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larapos`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(245) NOT NULL,
  `last_name` varchar(245) DEFAULT NULL,
  `card_number` varchar(45) DEFAULT NULL,
  `credit_limit` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `layBy_amount` int(11) DEFAULT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `mobile_no` int(11) DEFAULT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `post_code` varchar(45) DEFAULT NULL,
  `suburb` varchar(45) DEFAULT NULL,
  `store_credit` double DEFAULT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `last_modified_by` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advertisement_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contents` varchar(500) NOT NULL,
  `terminal` varchar(100) NOT NULL,
  `display_effect` varchar(100) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `no_end_date` int(11) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(45) NOT NULL,
  `last_modified_by` varchar(45) NOT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advertisement_id`, `name`, `contents`, `terminal`, `display_effect`, `duration`, `no_end_date`, `start_date`, `end_date`, `status`, `last_modified_date`, `created_date`, `created_by`, `last_modified_by`, `record_status`) VALUES
(7, 'Food', '[\"1639307656419.jpg\",\"1646781260075.jpg\",\"1646781259962.jpg\"]', '1', 'fade', '6', 0, '08/20/2022 8:20 PM', '08/22/2022 9:04 PM', 'enable', '2022-08-20 11:04:20', '2022-08-20 10:20:31', 'Admin admin', 'Admin admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `display_seq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `company_id`, `branch_name`, `display_seq`) VALUES
(1, 1, 'main', 1),
(2, 1, 'sub', 2);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`) VALUES
(1, 'SSR Technologies Aust Pty Ltd');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `avatar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'SFFS', 'SF', 'SKJF@SSDF.V', '012412412', 'ABC DEF', 'customers/UPlsDCJoxLplAOLcJiFeHzbzDJbQaUm6XrmWVNuA.jpg', 1, '2021-07-27 11:10:18', '2021-07-27 11:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `parent_department_id` int(11) DEFAULT NULL,
  `department_name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `parent_department_id`, `department_name`, `description`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(1, NULL, 'FOOD', 'FOOD', 'Admin admin', '2022-07-18 06:02:24', 'Admin admin', '2022-07-18 06:02:24', 1),
(2, NULL, 'DRINKS', 'DRINKS', 'Admin admin', '2022-07-18 06:02:51', 'Admin admin', '2022-07-18 06:02:51', 1),
(3, 1, 'HOT FOOD', NULL, 'Admin admin', '2022-07-18 06:03:54', 'Admin admin', '2022-07-18 06:04:24', 1),
(9, 1, 'Cold Drinks', 'Cold Drinks des', 'Admin admin', '2023-02-22 05:22:13', 'Admin admin', '2023-02-22 05:22:13', 1),
(10, 2, 'dasd', 'das', 'Admin admin', '2023-02-22 05:47:01', 'Admin admin', '2023-02-22 05:47:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department_two`
--

CREATE TABLE `department_two` (
  `department_id` int(11) NOT NULL,
  `parent_department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `last_modified_by` varchar(100) NOT NULL,
  `last_modified_date` date NOT NULL,
  `record_status` varchar(100) NOT NULL,
  `sub_department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `number_of_units` double DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `plu_type_id` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `plu_no` int(11) DEFAULT NULL,
  `supplier_plu` int(11) DEFAULT NULL,
  `no_of_dockets` int(11) DEFAULT NULL,
  `list_price` double DEFAULT NULL,
  `bar_code` varchar(40) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL,
  `transmit_status` smallint(6) DEFAULT 0,
  `parent_item_id` int(11) DEFAULT NULL,
  `carton_cost` decimal(10,2) DEFAULT 0.00,
  `open_price` smallint(6) NOT NULL DEFAULT 0,
  `modifier_popup` smallint(6) NOT NULL DEFAULT 0,
  `kp_description` varchar(45) DEFAULT NULL,
  `inc_price_in_kp` smallint(6) DEFAULT NULL,
  `open_description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `description`, `supplier_id`, `unit_id`, `number_of_units`, `department_id`, `plu_type_id`, `tax_id`, `plu_no`, `supplier_plu`, `no_of_dockets`, `list_price`, `bar_code`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`, `transmit_status`, `parent_item_id`, `carton_cost`, `open_price`, `modifier_popup`, `kp_description`, `inc_price_in_kp`, `open_description`) VALUES
(1, 'Farmers', NULL, 1, NULL, 1, NULL, 1, 1, NULL, NULL, NULL, NULL, 'Admin admin', '2022-07-31 10:48:45', 'Admin admin', '2022-08-05 03:52:21', 1, 0, NULL, '0.00', 0, 1, 'Farmer\'s Breakfast', 0, '0'),
(2, 'Wife\'s Fitness', NULL, 1, NULL, 1, NULL, 1, 2, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-01 11:43:17', 'Admin admin', '2022-08-01 11:47:44', 1, 0, NULL, '0.00', 0, 0, 'Farmer\'s Wife\'s Breakfast', 0, '0'),
(3, 'Salmon Hash', NULL, 1, NULL, 1, NULL, 1, 3, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-01 11:45:41', 'Admin admin', '2022-08-01 11:50:10', 1, 0, NULL, '0.00', 0, 0, 'Salmon Hash', 0, '0'),
(4, 'Fancy Salad', NULL, 1, NULL, 1, NULL, 1, 4, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-01 11:46:32', 'Admin admin', '2022-08-01 11:50:20', 1, 0, NULL, '0.00', 0, 0, 'Fancy Salad', 0, '0'),
(5, 'Something Amazing', NULL, 1, NULL, 1, NULL, 1, 5, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-01 11:47:26', 'Admin admin', '2022-08-01 11:47:26', 1, 0, NULL, '0.00', 0, 0, 'Something Amazing', 0, '0'),
(6, 'Ham Avo Benedict', NULL, 1, NULL, 1, NULL, 1, 6, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-01 11:51:54', 'Admin admin', '2022-08-01 11:53:11', 1, 0, NULL, '0.00', 0, 0, 'Ham Avo', 0, '0'),
(7, 'Salmon Benedict', NULL, 1, NULL, 1, NULL, 1, 7, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-01 11:52:56', 'Admin admin', '2022-08-01 11:52:56', 1, 0, NULL, '0.00', 0, 0, 'Salmon Benedict', 0, '0'),
(8, 'Bacon Mushroom Benedict', NULL, 1, NULL, 1, NULL, 1, 8, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-01 11:53:53', 'Admin admin', '2022-08-01 11:53:53', 1, 0, NULL, '0.00', 0, 0, 'Bacon Mushroom Benedict', 0, '0'),
(9, 'Vegie Benedict', NULL, 1, NULL, 1, NULL, 1, 9, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-01 11:54:24', 'Admin admin', '2022-08-01 11:54:24', 1, 0, NULL, '0.00', 0, 0, 'Vegie Benedict', 0, '0'),
(10, 'Toast Egg Tomato', NULL, 1, NULL, 1, NULL, 1, 10, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-01 11:55:19', 'Admin admin', '2022-08-01 11:58:11', 1, 0, NULL, '0.00', 0, 0, 'Toast Egg Tomato', 0, '0'),
(11, 'Bacon & Egg Roll', NULL, 1, NULL, 1, NULL, 1, 11, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-01 11:55:49', 'Admin admin', '2022-08-01 11:55:49', 1, 0, NULL, '0.00', 0, 0, 'Bacon & Egg Roll', 0, '0'),
(12, 'Cherry Ice Cream', NULL, 1, NULL, 1, NULL, 1, 12, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-01 11:57:38', 'Admin admin', '2022-08-01 11:58:25', 1, 0, NULL, '0.00', 0, 0, 'Cherry Ice Cream', 0, '0'),
(13, 'Cafe Red', NULL, 1, NULL, 1, NULL, 1, 13, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-01 11:58:55', 'Admin admin', '2022-08-01 11:58:55', 1, 0, NULL, '0.00', 0, 0, 'Cafe Red', 0, '0'),
(14, 'Grilled Tomato', NULL, 1, NULL, 1, NULL, 2, 14, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 01:57:28', 'Admin admin', '2022-08-07 02:00:30', 1, 0, NULL, '0.00', 0, 0, 'Grilled Tomato', 0, '0'),
(15, 'Fresh Avocado', NULL, 1, NULL, 1, NULL, 2, 15, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 01:58:21', 'Admin admin', '2022-08-07 02:00:42', 1, 0, NULL, '0.00', 0, 0, 'Fresh Avocado', 0, '0'),
(16, 'Grilled Mushroom', NULL, 1, NULL, 1, NULL, 2, 16, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 01:59:01', 'Admin admin', '2022-08-07 02:00:55', 1, 0, NULL, '0.00', 0, 0, 'Grilled Mushroom', 0, '0'),
(17, 'Any Style of 2 Eggs', NULL, 1, NULL, 1, NULL, 2, 17, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:00:14', 'Admin admin', '2022-08-07 02:00:14', 1, 0, NULL, '0.00', 0, 0, 'Any Style of 2 Eggs', 0, '0'),
(18, 'Spinach', NULL, 1, NULL, 1, NULL, 2, 18, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:01:30', 'Admin admin', '2022-08-07 02:01:30', 1, 0, NULL, '0.00', 0, 0, 'Spinach', 0, '0'),
(19, 'Grilled Sausage', NULL, 1, NULL, 1, NULL, 2, 19, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:03:30', 'Admin admin', '2022-08-07 02:03:30', 1, 0, NULL, '0.00', 0, 0, 'Grilled Sausage', 0, '0'),
(20, 'Grilled Bacon', NULL, 1, NULL, 1, NULL, 2, 20, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:03:55', 'Admin admin', '2022-08-07 02:03:55', 1, 0, NULL, '0.00', 0, 0, 'Grilled Bacon', 0, '0'),
(21, 'Hash Brown', NULL, 1, NULL, 1, NULL, 2, 21, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:04:37', 'Admin admin', '2022-08-07 02:04:37', 1, 0, NULL, '0.00', 0, 0, 'Hash Brown', 0, '0'),
(22, 'Smoked Salmon', NULL, 1, NULL, 1, NULL, 2, 22, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:05:02', 'Admin admin', '2022-08-07 02:05:02', 1, 0, NULL, '0.00', 0, 0, 'Smoked Salmon', 0, '0'),
(23, 'Slice of Toast', NULL, 1, NULL, 1, NULL, 2, 23, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:05:32', 'Admin admin', '2022-08-07 02:05:32', 1, 0, NULL, '0.00', 0, 0, 'Slice of Toast', 0, '0'),
(24, 'Slice of Cheese', NULL, 1, NULL, 1, NULL, 2, 24, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:05:56', 'Admin admin', '2022-08-07 02:05:56', 1, 0, NULL, '0.00', 0, 0, 'Slice of Cheese', 0, '0'),
(25, 'Baked Beans', NULL, 1, NULL, 1, NULL, 2, 25, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:06:49', 'Admin admin', '2022-08-07 02:06:49', 1, 0, NULL, '0.00', 0, 0, 'Baked Beans', 0, '0'),
(26, 'Hollandaise Sauce', NULL, 1, NULL, 1, NULL, 2, 26, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:07:31', 'Admin admin', '2022-08-07 02:07:31', 1, 0, NULL, '0.00', 0, 0, 'Hollandaise Sauce', 0, '0'),
(27, 'Gluten Free', NULL, 1, NULL, 1, NULL, 2, 27, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:08:00', 'Admin admin', '2022-08-07 02:08:13', 1, 0, NULL, '0.00', 0, 0, 'Gluten Free', 0, '0'),
(28, 'Raisin Toast', NULL, 1, NULL, 1, NULL, 1, 28, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:21:28', 'Admin admin', '2022-08-07 02:21:28', 1, 0, NULL, '0.00', 0, 0, 'Raisin Toast', 0, '0'),
(29, 'Cinnamon Toast', NULL, 1, NULL, 1, NULL, 1, 29, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:22:03', 'Admin admin', '2022-08-07 02:22:03', 1, 0, NULL, '0.00', 0, 0, 'Cinnamon Toast', 0, '0'),
(30, '2 White Bread with Jam', NULL, 1, NULL, 3, NULL, 2, 30, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:24:27', 'Admin admin', '2022-08-07 02:24:27', 1, 0, NULL, '0.00', 0, 0, '2 White Bread with Jam', 0, '0'),
(31, '2 Vienna with Jam', NULL, 1, NULL, 3, NULL, 2, 31, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:24:52', 'Admin admin', '2022-08-07 02:28:13', 1, 0, NULL, '0.00', 0, 0, '2 Vienna', 0, '0'),
(32, '2 Dark Rye with Jam', NULL, 1, NULL, 1, NULL, 2, 32, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:25:14', 'Admin admin', '2022-08-07 02:27:48', 1, 0, NULL, '0.00', 0, 0, '2 Dark Rye', 0, '0'),
(33, '2 Sourdough with Jam', NULL, 1, NULL, 3, NULL, 2, 33, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:26:15', 'Admin admin', '2022-08-07 02:28:03', 1, 0, NULL, '0.00', 0, 0, '2 Sourdough', 0, '0'),
(34, 'Banana Bread', NULL, 1, NULL, 1, NULL, 2, 34, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:28:38', 'Admin admin', '2022-08-07 02:28:38', 1, 0, NULL, '0.00', 0, 0, 'Banana Bread', 0, '0'),
(35, 'Cherries Walnut Bread', NULL, 1, NULL, 3, NULL, 2, 35, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:29:17', 'Admin admin', '2022-08-07 02:29:17', 1, 0, NULL, '0.00', 0, 0, 'Cherries Walnut Bread', 0, '0'),
(36, 'Apple Pecan Bread', NULL, 1, NULL, 1, NULL, 2, 36, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:29:43', 'Admin admin', '2022-08-07 02:29:43', 1, 0, NULL, '0.00', 0, 0, 'Apple Pecan Bread', 0, '0'),
(37, '1 Toast with Butter', NULL, 1, NULL, 1, NULL, 2, 37, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:30:59', 'Admin admin', '2022-08-07 02:30:59', 1, 0, NULL, '0.00', 0, 0, '1 Toast with Butter', 0, '0'),
(38, 'Rye with Banana', NULL, 1, NULL, 1, NULL, 2, 38, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:45:53', 'Admin admin', '2022-08-07 02:45:53', 1, 0, NULL, '0.00', 0, 0, 'Rye with Banana', 0, '0'),
(39, 'Slice of Cake', NULL, 1, NULL, 1, NULL, 2, 39, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:48:19', 'Admin admin', '2022-08-07 02:49:45', 1, 0, NULL, '0.00', 0, 0, 'Cake', 0, '0'),
(40, 'Home made Scones', NULL, 1, NULL, 1, NULL, 2, 40, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:49:06', 'Admin admin', '2022-08-07 02:49:06', 1, 0, NULL, '0.00', 0, 0, 'Home made Scones', 0, '0'),
(41, 'Ricotta or Ice Cream', NULL, 1, NULL, 1, NULL, 2, 41, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:52:09', 'Admin admin', '2022-08-07 02:52:09', 1, 0, NULL, '0.00', 0, 0, 'Ricotta or Ice Cream', 0, '0'),
(42, 'Honey', NULL, 1, NULL, 1, NULL, 2, 42, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:52:32', 'Admin admin', '2022-08-07 02:52:32', 1, 0, NULL, '0.00', 0, 0, 'Honey', 0, '0'),
(43, 'Maple Syrup', NULL, 1, NULL, 1, NULL, 2, 43, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:52:59', 'Admin admin', '2022-08-07 02:52:59', 1, 0, NULL, '0.00', 0, 0, 'Maple Syrup', 0, '0'),
(44, 'Home made Jam', NULL, 1, NULL, 1, NULL, 2, 44, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:53:24', 'Admin admin', '2022-08-07 02:53:56', 1, 0, NULL, '0.00', 0, 0, 'Jam', 0, '0'),
(45, 'Vegemite', NULL, 1, NULL, 1, NULL, 2, 45, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:54:21', 'Admin admin', '2022-08-07 02:54:21', 1, 0, NULL, '0.00', 0, 0, 'Vegemite', 0, '0'),
(46, 'Peanut Butter', NULL, 1, NULL, 1, NULL, 2, 46, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:54:39', 'Admin admin', '2022-08-07 02:54:39', 1, 0, NULL, '0.00', 0, 0, 'Peanut Butter', 0, '0'),
(47, 'Banana Butter', NULL, 1, NULL, 1, NULL, 2, 47, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:56:56', 'Admin admin', '2022-08-07 02:56:56', 1, 0, NULL, '0.00', 0, 0, 'Banana Butter', 0, '0'),
(48, 'Berries Butter', NULL, 1, NULL, 1, NULL, 2, 48, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:57:17', 'Admin admin', '2022-08-07 02:57:17', 1, 0, NULL, '0.00', 0, 0, 'Berries Butter', 0, '0'),
(49, 'Apple Butter', NULL, 1, NULL, 1, NULL, 2, 49, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:57:32', 'Admin admin', '2022-08-07 02:57:32', 1, 0, NULL, '0.00', 0, 0, 'Apple Butter', 0, '0'),
(50, '$1 Extra', NULL, 1, NULL, 1, NULL, 2, 50, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:57:54', 'Admin admin', '2022-08-07 02:57:54', 1, 0, NULL, '0.00', 0, 0, '$1 Extra', 0, '0'),
(51, '$2 Biscuit', NULL, 1, NULL, 1, NULL, 2, 51, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:58:16', 'Admin admin', '2022-08-07 02:58:16', 1, 0, NULL, '0.00', 0, 0, '$2 Biscuit', 0, '0'),
(52, '$3.5 Biscuit', NULL, 1, NULL, 1, NULL, 2, 52, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 02:58:46', 'Admin admin', '2022-08-07 02:58:46', 1, 0, NULL, '0.00', 0, 0, '$3.5 Biscuit', 0, '0'),
(53, 'Beet Pine Melt 1/2', NULL, 1, NULL, 1, NULL, 2, 53, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:00:27', 'Admin admin', '2022-08-07 03:02:01', 1, 0, NULL, '0.00', 0, 0, 'B/P Melt 1/2', 0, '0'),
(54, 'Beet Pine Melt', NULL, 1, NULL, 1, NULL, 2, 54, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:01:11', 'Admin admin', '2022-08-07 03:01:11', 1, 0, NULL, '0.00', 0, 0, 'Beet Pine Melt', 0, '0'),
(55, 'Ham Pine Melt 1/2', NULL, 1, NULL, 1, NULL, 2, 55, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:03:05', 'Admin admin', '2022-08-07 03:03:05', 1, 0, NULL, '0.00', 0, 0, 'Ham Pine Melt 1/2', 0, '0'),
(56, 'Ham Pine Melt', NULL, 1, NULL, 1, NULL, 2, 56, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:03:48', 'Admin admin', '2022-08-07 03:03:48', 1, 0, NULL, '0.00', 0, 0, 'Ham Pine Melt', 0, '0'),
(57, 'Chic Avo Melt 1/2', NULL, 1, NULL, 1, NULL, 2, 57, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:04:44', 'Admin admin', '2022-08-07 03:04:44', 1, 0, NULL, '0.00', 0, 0, 'Chic Avo Melt 1/2', 0, '0'),
(58, 'Chic Avo Melt', NULL, 1, NULL, 1, NULL, 2, 58, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:05:07', 'Admin admin', '2022-08-07 03:05:07', 1, 0, NULL, '0.00', 0, 0, 'Chic Avo Melt', 0, '0'),
(59, 'Ham Cheese Tomato S/W', NULL, 1, NULL, 1, NULL, 2, 59, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:06:26', 'Admin admin', '2022-08-07 03:09:10', 1, 0, NULL, '0.00', 0, 0, 'Ham Cheese Tomato', 0, '0'),
(60, 'Ham Cheese Onion S/W', NULL, 1, NULL, 1, NULL, 2, 60, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:06:53', 'Admin admin', '2022-08-07 03:09:25', 1, 0, NULL, '0.00', 0, 0, 'Ham Cheese Onion', 0, '0'),
(61, 'Cheese Tomato S/W', NULL, 1, NULL, 1, NULL, 2, 61, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:07:22', 'Admin admin', '2022-08-07 03:09:57', 1, 0, NULL, '0.00', 0, 0, 'Cheese Tomato', 0, '0'),
(62, 'Ham & Cheese S/W', NULL, 1, NULL, 1, NULL, 2, 62, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:07:44', 'Admin admin', '2022-08-07 03:09:45', 1, 0, NULL, '0.00', 0, 0, 'Ham & Cheese', 0, '0'),
(63, 'Ham & Tomato S/W', NULL, 1, NULL, 1, NULL, 2, 63, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:08:11', 'Admin admin', '2022-08-07 03:09:35', 1, 0, NULL, '0.00', 0, 0, 'Ham & Tomato', 0, '0'),
(64, 'Chic Cheese Avo S/W', NULL, 1, NULL, 1, NULL, 2, 64, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:08:51', 'Admin admin', '2022-08-07 03:08:51', 1, 0, NULL, '0.00', 0, 0, 'Chic Cheese Avo S/W', 0, '0'),
(65, 'Bowl of Chips', NULL, 1, NULL, 1, NULL, 2, 65, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:11:50', 'Admin admin', '2022-08-07 03:13:55', 1, 0, NULL, '0.00', 0, 0, 'Chips', 0, '0'),
(66, 'Bowl of Wedges', NULL, 1, NULL, 1, NULL, 2, 66, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:12:18', 'Admin admin', '2022-08-07 03:20:29', 1, 0, NULL, '0.00', 0, 0, 'Wedges', 0, '0'),
(67, 'Add $3 Chips', NULL, 1, NULL, 1, NULL, 2, 67, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:13:24', 'Admin admin', '2022-08-07 03:13:24', 1, 0, NULL, '0.00', 0, 0, 'Add $3 Chips', 0, '0'),
(68, 'Add $3 Wedges', NULL, 1, NULL, 1, NULL, 2, 68, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:13:44', 'Admin admin', '2022-08-07 03:20:20', 1, 0, NULL, '0.00', 0, 1, 'Add $3 Wedges', 0, '0'),
(69, 'BLT S/W', NULL, 1, NULL, 1, NULL, 2, 69, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:21:00', 'Admin admin', '2022-08-07 03:22:31', 1, 0, NULL, '0.00', 0, 0, 'BLT S/W', 0, '0'),
(70, 'Chicken BLAT S/W', NULL, 1, NULL, 1, NULL, 2, 70, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:21:22', 'Admin admin', '2022-08-07 03:22:12', 1, 0, NULL, '0.00', 0, 0, 'BLAT S/W', 0, '0'),
(71, 'Steak BLAT S/W', NULL, 1, NULL, 1, NULL, 2, 71, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:21:49', 'Admin admin', '2022-08-07 03:22:42', 1, 0, NULL, '0.00', 0, 0, 'Steak BLAT', 0, '0'),
(72, 'Garden Dark Rye S/W', NULL, 1, NULL, 1, NULL, 2, 72, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:23:35', 'Admin admin', '2022-08-07 03:23:35', 1, 0, NULL, '0.00', 0, 0, 'Garden Dark Rye S/W', 0, '0'),
(73, 'Beef Burger', NULL, 1, NULL, 1, NULL, 2, 73, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:24:25', 'Admin admin', '2022-08-07 03:24:25', 1, 0, NULL, '0.00', 0, 0, 'Beef Burger', 0, '0'),
(74, 'Chicken Burger', NULL, 1, NULL, 1, NULL, 2, 74, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:24:50', 'Admin admin', '2022-08-07 03:24:50', 1, 0, NULL, '0.00', 0, 0, 'Chicken Burger', 0, '0'),
(75, 'A+ Burger', NULL, 1, NULL, 1, NULL, 2, 75, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:25:09', 'Admin admin', '2022-08-07 03:25:09', 1, 0, NULL, '0.00', 0, 0, 'A+ Burger', 0, '0'),
(76, 'Kids Nuggets with Chips', NULL, 1, NULL, 1, NULL, 2, 76, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:26:36', 'Admin admin', '2022-08-07 03:28:01', 1, 0, NULL, '0.00', 0, 0, 'Kids Nuggets & Chips', 0, '0'),
(77, 'Kids Burger with Chips', NULL, 1, NULL, 1, NULL, 2, 77, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:27:11', 'Admin admin', '2022-08-07 03:27:11', 1, 0, NULL, '0.00', 0, 0, 'Kids Burger with Chips', 0, '0'),
(78, 'Kids Pancakes', NULL, 1, NULL, 1, NULL, 2, 78, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:27:36', 'Admin admin', '2022-08-07 03:27:36', 1, 0, NULL, '0.00', 0, 0, 'Kids Pancakes', 0, '0'),
(79, 'Bright Summer Salad', NULL, 1, NULL, 1, NULL, 2, 79, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:28:58', 'Admin admin', '2022-08-07 03:28:58', 1, 0, NULL, '0.00', 0, 0, 'Bright Summer Salad', 0, '0'),
(80, 'Chicken & Avo Salad', NULL, 1, NULL, 1, NULL, 2, 80, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:29:39', 'Admin admin', '2022-08-07 03:29:39', 1, 0, NULL, '0.00', 0, 0, 'Chicken & Avo Salad', 0, '0'),
(81, 'Steak & Beetroot Salad', NULL, 1, NULL, 1, NULL, 2, 81, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:30:08', 'Admin admin', '2022-08-07 03:30:08', 1, 0, NULL, '0.00', 0, 0, 'Steak & Beetroot Salad', 0, '0'),
(82, 'Chorizo & Tomato Salad', NULL, 1, NULL, 1, NULL, 2, 82, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:30:53', 'Admin admin', '2022-08-07 03:30:53', 1, 0, NULL, '0.00', 0, 0, 'Chorizo & Tomato Salad', 0, '0'),
(83, 'Chicken Caeser Salad', NULL, 1, NULL, 1, NULL, 2, 83, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:31:18', 'Admin admin', '2022-08-07 03:31:18', 1, 0, NULL, '0.00', 0, 0, 'Chicken Caeser Salad', 0, '0'),
(84, 'Cappuccino Small', NULL, 1, NULL, 2, NULL, 2, 84, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:40:21', 'Admin admin', '2022-08-07 03:40:21', 1, 0, NULL, '0.00', 0, 0, 'Cappuccino Small', 0, '0'),
(85, 'Cappuccino Medium', NULL, 1, NULL, 2, NULL, 2, 85, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:40:52', 'Admin admin', '2022-08-07 03:40:52', 1, 0, NULL, '0.00', 0, 0, 'Cappuccino Medium', 0, '0'),
(86, 'Cappuccino Large', NULL, 1, NULL, 2, NULL, 2, 86, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:41:21', 'Admin admin', '2022-08-07 03:41:21', 1, 0, NULL, '0.00', 0, 0, 'Cappuccino Large', 0, '0'),
(87, 'Latte Small', NULL, 1, NULL, 2, NULL, 2, 87, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:41:37', 'Admin admin', '2022-08-07 03:41:37', 1, 0, NULL, '0.00', 0, 0, 'Latte Small', 0, '0'),
(88, 'Latte Medium', NULL, 1, NULL, 2, NULL, 2, 88, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:42:25', 'Admin admin', '2022-08-07 03:42:25', 1, 0, NULL, '0.00', 0, 0, 'Latte Medium', 0, '0'),
(89, 'Latte Large', NULL, 1, NULL, 2, NULL, 2, 89, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:42:49', 'Admin admin', '2022-08-07 03:42:49', 1, 0, NULL, '0.00', 0, 0, 'Latte Large', 0, '0'),
(90, 'Flat White Small', NULL, 1, NULL, 2, NULL, 2, 90, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:43:15', 'Admin admin', '2022-08-07 03:43:15', 1, 0, NULL, '0.00', 0, 0, 'Flat White Small', 0, '0'),
(91, 'Flat White Medium', NULL, 1, NULL, 2, NULL, 2, 91, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:43:36', 'Admin admin', '2022-08-07 03:43:36', 1, 0, NULL, '0.00', 0, 0, 'Flat White Medium', 0, '0'),
(92, 'Flat White Large', NULL, 1, NULL, 2, NULL, 2, 92, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:44:04', 'Admin admin', '2022-08-07 03:44:04', 1, 0, NULL, '0.00', 0, 0, 'Flat White Large', 0, '0'),
(93, 'Long Black Small', NULL, 1, NULL, 2, NULL, 2, 93, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:49:52', 'Admin admin', '2022-08-07 03:49:52', 1, 0, NULL, '0.00', 0, 0, 'Long Black Small', 0, '0'),
(94, 'Long Black Medium', NULL, 1, NULL, 2, NULL, 2, 94, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:50:14', 'Admin admin', '2022-08-07 03:50:14', 1, 0, NULL, '0.00', 0, 0, 'Long Black Medium', 0, '0'),
(95, 'Long Black Large', NULL, 1, NULL, 2, NULL, 2, 95, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:50:33', 'Admin admin', '2022-08-07 03:50:33', 1, 0, NULL, '0.00', 0, 0, 'Long Black Large', 0, '0'),
(96, 'Chai Latte Small', NULL, 1, NULL, 2, NULL, 2, 96, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 03:56:18', 'Admin admin', '2022-08-07 03:56:18', 1, 0, NULL, '0.00', 0, 0, 'Chai Latte Small', 0, '0'),
(97, 'Chai Latte Medium', NULL, 1, NULL, 2, NULL, 2, 97, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:02:11', 'Admin admin', '2022-08-07 05:02:11', 1, 0, NULL, '0.00', 0, 0, 'Chai Latte Medium', 0, '0'),
(98, 'Chai Latte Large', NULL, 1, NULL, 2, NULL, 2, 98, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:02:33', 'Admin admin', '2022-08-07 05:02:33', 1, 0, NULL, '0.00', 0, 0, 'Chai Latte Large', 0, '0'),
(99, 'Mocha Small', NULL, 1, NULL, 2, NULL, 2, 99, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:02:51', 'Admin admin', '2022-08-07 05:02:51', 1, 0, NULL, '0.00', 0, 0, 'Mocha Small', 0, '0'),
(100, 'Mocha Medium', NULL, 1, NULL, 2, NULL, 2, 100, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:03:11', 'Admin admin', '2022-08-07 05:03:11', 1, 0, NULL, '0.00', 0, 0, 'Mocha Medium', 0, '0'),
(101, 'Mocha Large', NULL, 1, NULL, 2, NULL, 2, 101, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:03:29', 'Admin admin', '2022-08-07 05:03:29', 1, 0, NULL, '0.00', 0, 0, 'Mocha Large', 0, '0'),
(102, 'Hot Chocolate Small', NULL, 1, NULL, 2, NULL, 2, 102, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:04:07', 'Admin admin', '2022-08-07 05:04:07', 1, 0, NULL, '0.00', 0, 0, 'Hot Chocolate Small', 0, '0'),
(103, 'Hot Chocolate Medium', NULL, 1, NULL, 2, NULL, 2, 103, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:04:29', 'Admin admin', '2022-08-07 05:05:08', 1, 0, NULL, '0.00', 0, 0, 'Hot Chocole Medium', 0, '0'),
(104, 'Hot Chocolate Large', NULL, 1, NULL, 2, NULL, 2, 104, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:04:51', 'Admin admin', '2022-08-07 05:04:51', 1, 0, NULL, '0.00', 0, 0, 'Hot Chocolate Large', 0, '0'),
(105, 'Espresso', NULL, 1, NULL, 2, NULL, 2, 105, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:05:43', 'Admin admin', '2022-08-07 05:05:43', 1, 0, NULL, '0.00', 0, 0, 'Espresso', 0, '0'),
(106, 'Macchiato', NULL, 1, NULL, 2, NULL, 2, 106, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:06:13', 'Admin admin', '2022-08-07 05:06:13', 1, 0, NULL, '0.00', 0, 0, 'Macchiato', 0, '0'),
(107, 'Piccolo', NULL, 1, NULL, 2, NULL, 2, 107, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:06:35', 'Admin admin', '2022-08-07 05:06:35', 1, 0, NULL, '0.00', 0, 0, 'Piccolo', 0, '0'),
(108, 'Babycino', NULL, 1, NULL, 2, NULL, 2, 108, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:06:55', 'Admin admin', '2022-08-07 05:06:55', 1, 0, NULL, '0.00', 0, 0, 'Babycino', 0, '0'),
(109, 'Corkage', NULL, 1, NULL, 1, NULL, 2, 109, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:09:56', 'Admin admin', '2022-08-07 05:09:56', 1, 0, NULL, '0.00', 0, 0, 'Corkage', 0, '0'),
(110, 'Iced Coffee', NULL, 1, NULL, 2, NULL, 2, 110, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:10:19', 'Admin admin', '2022-08-07 05:10:19', 1, 0, NULL, '0.00', 0, 0, 'Iced Coffee', 0, '0'),
(111, 'Iced Chocolate', NULL, 1, NULL, 2, NULL, 2, 111, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:10:41', 'Admin admin', '2022-08-07 05:10:41', 1, 0, NULL, '0.00', 0, 0, 'Iced Chocolate', 0, '0'),
(112, 'Iced Mocha', NULL, 1, NULL, 2, NULL, 2, 112, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:11:14', 'Admin admin', '2022-08-07 05:11:14', 1, 0, NULL, '0.00', 0, 0, 'Iced Mocha', 0, '0'),
(113, 'Coffee Frappe', NULL, 1, NULL, 2, NULL, 2, 113, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:12:30', 'Admin admin', '2022-08-07 05:12:30', 1, 0, NULL, '0.00', 0, 0, 'Coffee Frappe', 0, '0'),
(114, 'Chocolate Frappe', NULL, 1, NULL, 2, NULL, 2, 114, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:12:56', 'Admin admin', '2022-08-07 05:12:56', 1, 0, NULL, '0.00', 0, 0, 'Chocolate Frappe', 0, '0'),
(115, 'Chai Frappe', NULL, 1, NULL, 2, NULL, 2, 115, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:13:14', 'Admin admin', '2022-08-07 05:13:14', 1, 0, NULL, '0.00', 0, 0, 'Chai Frappe', 0, '0'),
(116, 'Pot of Tea', NULL, 1, NULL, 2, NULL, 2, 116, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:13:39', 'Admin admin', '2022-08-07 05:13:39', 1, 0, NULL, '0.00', 0, 0, 'Pot of Tea', 0, '0'),
(117, 'Milk Shake', NULL, 1, NULL, 2, NULL, 2, 117, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:14:45', 'Admin admin', '2022-08-07 05:14:45', 1, 0, NULL, '0.00', 0, 1, 'Milk Shake', 0, '0'),
(118, 'Thick Shake', NULL, 1, NULL, 2, NULL, 2, 118, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:15:10', 'Admin admin', '2022-08-07 05:15:10', 1, 0, NULL, '0.00', 0, 1, 'Thick Shake', 0, '0'),
(119, 'Smoothies', NULL, 1, NULL, 2, NULL, 2, 119, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:16:15', 'Admin admin', '2022-08-07 05:16:15', 1, 0, NULL, '0.00', 0, 1, 'Smoothies', 0, '0'),
(120, 'Spider', NULL, 1, NULL, 2, NULL, 2, 120, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:16:34', 'Admin admin', '2022-08-07 05:16:34', 1, 0, NULL, '0.00', 0, 0, 'Spider', 0, '0'),
(121, 'Ice Tea', NULL, 1, NULL, 2, NULL, 2, 121, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:17:19', 'Admin admin', '2022-08-07 05:19:51', 1, 0, NULL, '0.00', 0, 1, 'Ice Tea', 0, '0'),
(122, 'Fruit Juice', NULL, 1, NULL, 2, NULL, 2, 122, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:17:51', 'Admin admin', '2022-08-07 05:17:51', 1, 0, NULL, '0.00', 0, 1, 'Fruit Juice', 0, '0'),
(123, 'Orange Juice', NULL, 1, NULL, 2, NULL, 2, 123, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:18:26', 'Admin admin', '2022-08-07 05:18:26', 1, 0, NULL, '0.00', 0, 0, 'Orange Juice', 0, '0'),
(124, 'Coca Cola', NULL, 1, NULL, 2, NULL, 2, 124, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:20:21', 'Admin admin', '2022-08-07 05:20:21', 1, 0, NULL, '0.00', 0, 0, 'Coca Cola', 0, '0'),
(125, 'Coke No Sugar', NULL, 1, NULL, 2, NULL, 2, 125, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:20:51', 'Admin admin', '2022-08-07 05:20:51', 1, 0, NULL, '0.00', 0, 0, 'Coke No Sugar', 0, '0'),
(126, 'Diet Coke', NULL, 1, NULL, 2, NULL, 2, 126, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:21:08', 'Admin admin', '2022-08-07 05:21:08', 1, 0, NULL, '0.00', 0, 0, 'Diet Coke', 0, '0'),
(127, 'Sprite', NULL, 1, NULL, 2, NULL, 2, 127, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:22:27', 'Admin admin', '2022-08-07 05:22:27', 1, 0, NULL, '0.00', 0, 0, 'Sprite', 0, '0'),
(128, 'Lift', NULL, 1, NULL, 2, NULL, 2, 128, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:22:44', 'Admin admin', '2022-08-07 05:22:44', 1, 0, NULL, '0.00', 0, 0, 'Lift', 0, '0'),
(129, 'Lemon Lime & Bitters', NULL, 1, NULL, 2, NULL, 2, 129, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:23:13', 'Admin admin', '2022-08-07 05:23:13', 1, 0, NULL, '0.00', 0, 0, 'Lemon Lime & Bitters', 0, '0'),
(130, 'Ginger Beer', NULL, 1, NULL, 2, NULL, 2, 130, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:23:33', 'Admin admin', '2022-08-07 05:23:33', 1, 0, NULL, '0.00', 0, 0, 'Ginger Beer', 0, '0'),
(131, 'Spring Water', NULL, 1, NULL, 2, NULL, 2, 131, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:23:52', 'Admin admin', '2022-08-07 05:23:52', 1, 0, NULL, '0.00', 0, 0, 'Spring Water', 0, '0'),
(132, 'Sparkling Spring Water', NULL, 1, NULL, 2, NULL, 2, 132, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:24:12', 'Admin admin', '2022-08-07 05:24:12', 1, 0, NULL, '0.00', 0, 0, 'Sparkling Spring Water', 0, '0'),
(133, 'Kids Milkshake', NULL, 1, NULL, 2, NULL, 2, 133, NULL, NULL, NULL, NULL, 'Admin admin', '2022-08-07 05:48:51', 'Admin admin', '2022-08-07 05:48:51', 1, 0, NULL, '0.00', 0, 0, 'Kids Milkshake', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `item_modifiers_category`
--

CREATE TABLE `item_modifiers_category` (
  `item_modifiers_category_id` int(11) NOT NULL,
  `modifiers_category_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` date DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_modifiers_category`
--

INSERT INTO `item_modifiers_category` (`item_modifiers_category_id`, `modifiers_category_id`, `item_id`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(6, 1, 10, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(7, 2, 12, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(8, 1, 1, 'Admin admin', '2022-08-05', 'Admin admin', '2022-08-05', 1),
(9, 10, 68, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(10, 10, 66, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(11, 5, 117, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(12, 5, 118, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(13, 5, 119, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(15, 7, 122, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(16, 7, 121, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(17, 5, 133, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_price_level_location`
--

CREATE TABLE `item_price_level_location` (
  `item_price_level_location_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `price_level_id` int(11) DEFAULT NULL,
  `x_tax` double DEFAULT 0,
  `inc_tax` double DEFAULT 0,
  `gp` double DEFAULT 0,
  `created_by` varchar(45) DEFAULT '',
  `created_date` datetime DEFAULT '2021-09-15 00:00:00',
  `last_modified_by` varchar(45) DEFAULT '',
  `last_modified_date` datetime DEFAULT '2021-09-15 00:00:00',
  `record_status` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_price_level_location`
--

INSERT INTO `item_price_level_location` (`item_price_level_location_id`, `item_id`, `location_id`, `price_level_id`, `x_tax`, `inc_tax`, `gp`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(15, 5, NULL, 2, 0, 19.5, 0, 'Admin admin', '2022-08-01 11:47:26', 'Admin admin', '2022-08-01 11:47:26', 1),
(16, 2, NULL, 2, 0, 20, 0, 'Admin admin', '2022-08-01 11:47:44', 'Admin admin', '2022-08-01 11:47:44', 1),
(17, 3, NULL, 2, 0, 23, 0, 'Admin admin', '2022-08-01 11:50:10', 'Admin admin', '2022-08-01 11:50:10', 1),
(18, 4, NULL, 2, 0, 20, 0, 'Admin admin', '2022-08-01 11:50:20', 'Admin admin', '2022-08-01 11:50:20', 1),
(20, 7, NULL, 2, 0, 19, 0, 'Admin admin', '2022-08-01 11:52:56', 'Admin admin', '2022-08-01 11:52:56', 1),
(21, 6, NULL, 2, 0, 18.5, 0, 'Admin admin', '2022-08-01 11:53:11', 'Admin admin', '2022-08-01 11:53:11', 1),
(22, 8, NULL, 2, 0, 18.5, 0, 'Admin admin', '2022-08-01 11:53:53', 'Admin admin', '2022-08-01 11:53:53', 1),
(23, 9, NULL, 2, 0, 18, 0, 'Admin admin', '2022-08-01 11:54:24', 'Admin admin', '2022-08-01 11:54:24', 1),
(25, 11, NULL, 2, 0, 11, 0, 'Admin admin', '2022-08-01 11:55:49', 'Admin admin', '2022-08-01 11:55:49', 1),
(28, 10, NULL, 2, 0, 11, 0, 'Admin admin', '2022-08-01 11:58:12', 'Admin admin', '2022-08-01 11:58:12', 1),
(29, 12, NULL, 2, 0, 17.5, 0, 'Admin admin', '2022-08-01 11:58:25', 'Admin admin', '2022-08-01 11:58:25', 1),
(30, 13, NULL, 2, 0, 17, 0, 'Admin admin', '2022-08-01 11:58:55', 'Admin admin', '2022-08-01 11:58:55', 1),
(31, 1, NULL, 2, 0, 22, 0, 'Admin admin', '2022-08-05 03:52:21', 'Admin admin', '2022-08-05 03:52:21', 1),
(35, 17, NULL, 2, 0, 6, 0, 'Admin admin', '2022-08-07 02:00:14', 'Admin admin', '2022-08-07 02:00:14', 1),
(36, 14, NULL, 2, 0, 3.5, 0, 'Admin admin', '2022-08-07 02:00:30', 'Admin admin', '2022-08-07 02:00:30', 1),
(37, 15, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 02:00:42', 'Admin admin', '2022-08-07 02:00:42', 1),
(38, 16, NULL, 2, 0, 3.5, 0, 'Admin admin', '2022-08-07 02:00:55', 'Admin admin', '2022-08-07 02:00:55', 1),
(39, 18, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 02:01:30', 'Admin admin', '2022-08-07 02:01:30', 1),
(40, 19, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 02:03:30', 'Admin admin', '2022-08-07 02:03:30', 1),
(41, 20, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 02:03:55', 'Admin admin', '2022-08-07 02:03:55', 1),
(42, 21, NULL, 2, 0, 2, 0, 'Admin admin', '2022-08-07 02:04:37', 'Admin admin', '2022-08-07 02:04:37', 1),
(43, 22, NULL, 2, 0, 7, 0, 'Admin admin', '2022-08-07 02:05:02', 'Admin admin', '2022-08-07 02:05:02', 1),
(44, 23, NULL, 2, 0, 2, 0, 'Admin admin', '2022-08-07 02:05:32', 'Admin admin', '2022-08-07 02:05:32', 1),
(45, 24, NULL, 2, 0, 1.5, 0, 'Admin admin', '2022-08-07 02:05:56', 'Admin admin', '2022-08-07 02:05:56', 1),
(46, 25, NULL, 2, 0, 3.5, 0, 'Admin admin', '2022-08-07 02:06:49', 'Admin admin', '2022-08-07 02:06:49', 1),
(47, 26, NULL, 2, 0, 2, 0, 'Admin admin', '2022-08-07 02:07:31', 'Admin admin', '2022-08-07 02:07:31', 1),
(49, 27, NULL, 2, 0, 1, 0, 'Admin admin', '2022-08-07 02:08:13', 'Admin admin', '2022-08-07 02:08:13', 1),
(50, 28, NULL, 2, 0, 5.7, 0, 'Admin admin', '2022-08-07 02:21:28', 'Admin admin', '2022-08-07 02:21:28', 1),
(51, 29, NULL, 2, 0, 5.7, 0, 'Admin admin', '2022-08-07 02:22:03', 'Admin admin', '2022-08-07 02:22:03', 1),
(52, 30, NULL, 2, 0, 5.7, 0, 'Admin admin', '2022-08-07 02:24:27', 'Admin admin', '2022-08-07 02:24:27', 1),
(58, 32, NULL, 2, 0, 5.7, 0, 'Admin admin', '2022-08-07 02:27:48', 'Admin admin', '2022-08-07 02:27:48', 1),
(59, 33, NULL, 2, 0, 5.7, 0, 'Admin admin', '2022-08-07 02:28:03', 'Admin admin', '2022-08-07 02:28:03', 1),
(60, 31, NULL, 2, 0, 5.7, 0, 'Admin admin', '2022-08-07 02:28:14', 'Admin admin', '2022-08-07 02:28:14', 1),
(61, 34, NULL, 2, 0, 6.9, 0, 'Admin admin', '2022-08-07 02:28:38', 'Admin admin', '2022-08-07 02:28:38', 1),
(62, 35, NULL, 2, 0, 6.9, 0, 'Admin admin', '2022-08-07 02:29:17', 'Admin admin', '2022-08-07 02:29:17', 1),
(63, 36, NULL, 2, 0, 6.9, 0, 'Admin admin', '2022-08-07 02:29:43', 'Admin admin', '2022-08-07 02:29:43', 1),
(64, 37, NULL, 2, 0, 5, 0, 'Admin admin', '2022-08-07 02:30:59', 'Admin admin', '2022-08-07 02:30:59', 1),
(65, 38, NULL, 2, 0, 10, 0, 'Admin admin', '2022-08-07 02:45:53', 'Admin admin', '2022-08-07 02:45:53', 1),
(67, 40, NULL, 2, 0, 7, 0, 'Admin admin', '2022-08-07 02:49:06', 'Admin admin', '2022-08-07 02:49:06', 1),
(68, 39, NULL, 2, 0, 6, 0, 'Admin admin', '2022-08-07 02:49:45', 'Admin admin', '2022-08-07 02:49:45', 1),
(69, 41, NULL, 2, 0, 2.5, 0, 'Admin admin', '2022-08-07 02:52:09', 'Admin admin', '2022-08-07 02:52:09', 1),
(70, 42, NULL, 2, 0, 0.8, 0, 'Admin admin', '2022-08-07 02:52:32', 'Admin admin', '2022-08-07 02:52:32', 1),
(71, 43, NULL, 2, 0, 1.7, 0, 'Admin admin', '2022-08-07 02:52:59', 'Admin admin', '2022-08-07 02:52:59', 1),
(73, 44, NULL, 2, 0, 0.8, 0, 'Admin admin', '2022-08-07 02:53:56', 'Admin admin', '2022-08-07 02:53:56', 1),
(74, 45, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 02:54:21', 'Admin admin', '2022-08-07 02:54:21', 1),
(75, 46, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 02:54:39', 'Admin admin', '2022-08-07 02:54:39', 1),
(76, 47, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 02:56:56', 'Admin admin', '2022-08-07 02:56:56', 1),
(77, 48, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 02:57:17', 'Admin admin', '2022-08-07 02:57:17', 1),
(78, 49, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 02:57:32', 'Admin admin', '2022-08-07 02:57:32', 1),
(79, 50, NULL, 2, 0, 1, 0, 'Admin admin', '2022-08-07 02:57:54', 'Admin admin', '2022-08-07 02:57:54', 1),
(80, 51, NULL, 2, 0, 2, 0, 'Admin admin', '2022-08-07 02:58:16', 'Admin admin', '2022-08-07 02:58:16', 1),
(81, 52, NULL, 2, 0, 3.5, 0, 'Admin admin', '2022-08-07 02:58:46', 'Admin admin', '2022-08-07 02:58:46', 1),
(83, 54, NULL, 2, 0, 12.5, 0, 'Admin admin', '2022-08-07 03:01:11', 'Admin admin', '2022-08-07 03:01:11', 1),
(84, 53, NULL, 2, 0, 7.5, 0, 'Admin admin', '2022-08-07 03:02:01', 'Admin admin', '2022-08-07 03:02:01', 1),
(85, 55, NULL, 2, 0, 7.5, 0, 'Admin admin', '2022-08-07 03:03:05', 'Admin admin', '2022-08-07 03:03:05', 1),
(86, 56, NULL, 2, 0, 12.5, 0, 'Admin admin', '2022-08-07 03:03:48', 'Admin admin', '2022-08-07 03:03:48', 1),
(87, 57, NULL, 2, 0, 10, 0, 'Admin admin', '2022-08-07 03:04:44', 'Admin admin', '2022-08-07 03:04:44', 1),
(88, 58, NULL, 2, 0, 16, 0, 'Admin admin', '2022-08-07 03:05:07', 'Admin admin', '2022-08-07 03:05:07', 1),
(94, 64, NULL, 2, 0, 11, 0, 'Admin admin', '2022-08-07 03:08:51', 'Admin admin', '2022-08-07 03:08:51', 1),
(95, 59, NULL, 2, 0, 8, 0, 'Admin admin', '2022-08-07 03:09:10', 'Admin admin', '2022-08-07 03:09:10', 1),
(96, 60, NULL, 2, 0, 8, 0, 'Admin admin', '2022-08-07 03:09:25', 'Admin admin', '2022-08-07 03:09:25', 1),
(97, 63, NULL, 2, 0, 7.5, 0, 'Admin admin', '2022-08-07 03:09:35', 'Admin admin', '2022-08-07 03:09:35', 1),
(98, 62, NULL, 2, 0, 7.5, 0, 'Admin admin', '2022-08-07 03:09:45', 'Admin admin', '2022-08-07 03:09:45', 1),
(99, 61, NULL, 2, 0, 7.5, 0, 'Admin admin', '2022-08-07 03:09:57', 'Admin admin', '2022-08-07 03:09:57', 1),
(102, 67, NULL, 2, 0, 3, 0, 'Admin admin', '2022-08-07 03:13:24', 'Admin admin', '2022-08-07 03:13:24', 1),
(104, 65, NULL, 2, 0, 6.5, 0, 'Admin admin', '2022-08-07 03:13:55', 'Admin admin', '2022-08-07 03:13:55', 1),
(106, 68, NULL, 2, 0, 3, 0, 'Admin admin', '2022-08-07 03:20:20', 'Admin admin', '2022-08-07 03:20:20', 1),
(107, 66, NULL, 2, 0, 7.5, 0, 'Admin admin', '2022-08-07 03:20:29', 'Admin admin', '2022-08-07 03:20:29', 1),
(111, 70, NULL, 2, 0, 16, 0, 'Admin admin', '2022-08-07 03:22:12', 'Admin admin', '2022-08-07 03:22:12', 1),
(112, 69, NULL, 2, 0, 13, 0, 'Admin admin', '2022-08-07 03:22:31', 'Admin admin', '2022-08-07 03:22:31', 1),
(113, 71, NULL, 2, 0, 17, 0, 'Admin admin', '2022-08-07 03:22:42', 'Admin admin', '2022-08-07 03:22:42', 1),
(114, 72, NULL, 2, 0, 14, 0, 'Admin admin', '2022-08-07 03:23:35', 'Admin admin', '2022-08-07 03:23:35', 1),
(115, 73, NULL, 2, 0, 14, 0, 'Admin admin', '2022-08-07 03:24:25', 'Admin admin', '2022-08-07 03:24:25', 1),
(116, 74, NULL, 2, 0, 14, 0, 'Admin admin', '2022-08-07 03:24:50', 'Admin admin', '2022-08-07 03:24:50', 1),
(117, 75, NULL, 2, 0, 14, 0, 'Admin admin', '2022-08-07 03:25:09', 'Admin admin', '2022-08-07 03:25:09', 1),
(119, 77, NULL, 2, 0, 9.5, 0, 'Admin admin', '2022-08-07 03:27:11', 'Admin admin', '2022-08-07 03:27:11', 1),
(120, 78, NULL, 2, 0, 9, 0, 'Admin admin', '2022-08-07 03:27:36', 'Admin admin', '2022-08-07 03:27:36', 1),
(121, 76, NULL, 2, 0, 7, 0, 'Admin admin', '2022-08-07 03:28:01', 'Admin admin', '2022-08-07 03:28:01', 1),
(122, 79, NULL, 2, 0, 18.5, 0, 'Admin admin', '2022-08-07 03:28:58', 'Admin admin', '2022-08-07 03:28:58', 1),
(123, 80, NULL, 2, 0, 20, 0, 'Admin admin', '2022-08-07 03:29:39', 'Admin admin', '2022-08-07 03:29:39', 1),
(124, 81, NULL, 2, 0, 20, 0, 'Admin admin', '2022-08-07 03:30:08', 'Admin admin', '2022-08-07 03:30:08', 1),
(125, 82, NULL, 2, 0, 20, 0, 'Admin admin', '2022-08-07 03:30:53', 'Admin admin', '2022-08-07 03:30:53', 1),
(126, 83, NULL, 2, 0, 20, 0, 'Admin admin', '2022-08-07 03:31:18', 'Admin admin', '2022-08-07 03:31:18', 1),
(127, 84, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 03:40:21', 'Admin admin', '2022-08-07 03:40:21', 1),
(128, 85, NULL, 2, 0, 4.5, 0, 'Admin admin', '2022-08-07 03:40:52', 'Admin admin', '2022-08-07 03:40:52', 1),
(129, 86, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 03:41:21', 'Admin admin', '2022-08-07 03:41:21', 1),
(130, 87, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 03:41:37', 'Admin admin', '2022-08-07 03:41:37', 1),
(131, 88, NULL, 2, 0, 4.5, 0, 'Admin admin', '2022-08-07 03:42:25', 'Admin admin', '2022-08-07 03:42:25', 1),
(132, 89, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 03:42:49', 'Admin admin', '2022-08-07 03:42:49', 1),
(133, 90, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 03:43:15', 'Admin admin', '2022-08-07 03:43:15', 1),
(134, 91, NULL, 2, 0, 4.5, 0, 'Admin admin', '2022-08-07 03:43:36', 'Admin admin', '2022-08-07 03:43:36', 1),
(135, 92, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 03:44:04', 'Admin admin', '2022-08-07 03:44:04', 1),
(136, 93, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 03:49:52', 'Admin admin', '2022-08-07 03:49:52', 1),
(137, 94, NULL, 2, 0, 4.5, 0, 'Admin admin', '2022-08-07 03:50:14', 'Admin admin', '2022-08-07 03:50:14', 1),
(138, 95, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 03:50:33', 'Admin admin', '2022-08-07 03:50:33', 1),
(139, 96, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 03:56:18', 'Admin admin', '2022-08-07 03:56:18', 1),
(140, 97, NULL, 2, 0, 4.5, 0, 'Admin admin', '2022-08-07 05:02:11', 'Admin admin', '2022-08-07 05:02:11', 1),
(141, 98, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 05:02:33', 'Admin admin', '2022-08-07 05:02:33', 1),
(142, 99, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:02:51', 'Admin admin', '2022-08-07 05:02:51', 1),
(143, 100, NULL, 2, 0, 4.5, 0, 'Admin admin', '2022-08-07 05:03:11', 'Admin admin', '2022-08-07 05:03:11', 1),
(144, 101, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 05:03:29', 'Admin admin', '2022-08-07 05:03:29', 1),
(145, 102, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:04:07', 'Admin admin', '2022-08-07 05:04:07', 1),
(147, 104, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 05:04:51', 'Admin admin', '2022-08-07 05:04:51', 1),
(148, 103, NULL, 2, 0, 4.5, 0, 'Admin admin', '2022-08-07 05:05:08', 'Admin admin', '2022-08-07 05:05:08', 1),
(149, 105, NULL, 2, 0, 3.5, 0, 'Admin admin', '2022-08-07 05:05:43', 'Admin admin', '2022-08-07 05:05:43', 1),
(150, 106, NULL, 2, 0, 3.5, 0, 'Admin admin', '2022-08-07 05:06:13', 'Admin admin', '2022-08-07 05:06:13', 1),
(151, 107, NULL, 2, 0, 3.5, 0, 'Admin admin', '2022-08-07 05:06:35', 'Admin admin', '2022-08-07 05:06:35', 1),
(152, 108, NULL, 2, 0, 2.5, 0, 'Admin admin', '2022-08-07 05:06:55', 'Admin admin', '2022-08-07 05:06:55', 1),
(153, 109, NULL, 2, 0, 2, 0, 'Admin admin', '2022-08-07 05:09:56', 'Admin admin', '2022-08-07 05:09:56', 1),
(154, 110, NULL, 2, 0, 6, 0, 'Admin admin', '2022-08-07 05:10:19', 'Admin admin', '2022-08-07 05:10:19', 1),
(155, 111, NULL, 2, 0, 6, 0, 'Admin admin', '2022-08-07 05:10:41', 'Admin admin', '2022-08-07 05:10:41', 1),
(156, 112, NULL, 2, 0, 6, 0, 'Admin admin', '2022-08-07 05:11:14', 'Admin admin', '2022-08-07 05:11:14', 1),
(157, 113, NULL, 2, 0, 6, 0, 'Admin admin', '2022-08-07 05:12:30', 'Admin admin', '2022-08-07 05:12:30', 1),
(158, 114, NULL, 2, 0, 6, 0, 'Admin admin', '2022-08-07 05:12:56', 'Admin admin', '2022-08-07 05:12:56', 1),
(159, 115, NULL, 2, 0, 6, 0, 'Admin admin', '2022-08-07 05:13:14', 'Admin admin', '2022-08-07 05:13:14', 1),
(160, 116, NULL, 2, 0, 4.2, 0, 'Admin admin', '2022-08-07 05:13:39', 'Admin admin', '2022-08-07 05:13:39', 1),
(161, 117, NULL, 2, 0, 5.5, 0, 'Admin admin', '2022-08-07 05:14:45', 'Admin admin', '2022-08-07 05:14:45', 1),
(162, 118, NULL, 2, 0, 5.5, 0, 'Admin admin', '2022-08-07 05:15:10', 'Admin admin', '2022-08-07 05:15:10', 1),
(163, 119, NULL, 2, 0, 6.5, 0, 'Admin admin', '2022-08-07 05:16:15', 'Admin admin', '2022-08-07 05:16:15', 1),
(164, 120, NULL, 2, 0, 6, 0, 'Admin admin', '2022-08-07 05:16:34', 'Admin admin', '2022-08-07 05:16:34', 1),
(166, 122, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:17:51', 'Admin admin', '2022-08-07 05:17:51', 1),
(167, 123, NULL, 2, 0, 7, 0, 'Admin admin', '2022-08-07 05:18:26', 'Admin admin', '2022-08-07 05:18:26', 1),
(168, 121, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:19:51', 'Admin admin', '2022-08-07 05:19:51', 1),
(169, 124, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:20:21', 'Admin admin', '2022-08-07 05:20:21', 1),
(170, 125, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:20:51', 'Admin admin', '2022-08-07 05:20:51', 1),
(171, 126, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:21:08', 'Admin admin', '2022-08-07 05:21:08', 1),
(172, 127, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:22:27', 'Admin admin', '2022-08-07 05:22:27', 1),
(173, 128, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:22:44', 'Admin admin', '2022-08-07 05:22:44', 1),
(174, 129, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:23:13', 'Admin admin', '2022-08-07 05:23:13', 1),
(175, 130, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:23:33', 'Admin admin', '2022-08-07 05:23:33', 1),
(176, 131, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:23:52', 'Admin admin', '2022-08-07 05:23:52', 1),
(177, 132, NULL, 2, 0, 4, 0, 'Admin admin', '2022-08-07 05:24:12', 'Admin admin', '2022-08-07 05:24:12', 1),
(178, 133, NULL, 2, 0, NULL, 0, 'Admin admin', '2022-08-07 05:48:51', 'Admin admin', '2022-08-07 05:48:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_printer`
--

CREATE TABLE `item_printer` (
  `item_printer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `printer_id` int(11) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` date DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_printer`
--

INSERT INTO `item_printer` (`item_printer_id`, `item_id`, `printer_id`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(8, 5, 1, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(9, 2, 1, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(10, 3, 1, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(11, 4, 1, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(13, 7, 1, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(14, 6, 1, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(15, 8, 1, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(16, 9, 1, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(18, 11, 1, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(21, 10, 1, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(22, 12, 1, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(23, 13, 1, 'Admin admin', '2022-08-01', 'Admin admin', '2022-08-01', 1),
(24, 1, 1, 'Admin admin', '2022-08-05', 'Admin admin', '2022-08-05', 1),
(28, 14, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(29, 15, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(30, 16, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(31, 18, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(32, 19, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(33, 20, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(34, 21, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(35, 22, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(36, 23, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(37, 24, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(38, 25, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(39, 26, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(41, 27, 1, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(42, 28, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(43, 29, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(44, 30, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(50, 32, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(51, 33, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(52, 31, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(53, 34, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(54, 35, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(55, 36, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(56, 37, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(57, 38, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(59, 40, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(60, 39, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(61, 41, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(62, 42, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(63, 43, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(65, 44, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(66, 45, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(67, 46, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(68, 47, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(69, 48, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(70, 49, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(71, 50, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(72, 51, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(73, 52, 3, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(75, 54, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(76, 53, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(77, 55, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(78, 56, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(79, 57, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(80, 58, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(86, 64, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(87, 59, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(88, 60, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(89, 63, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(90, 62, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(91, 61, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(94, 67, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(96, 65, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(98, 68, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(99, 66, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(103, 70, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(104, 69, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(105, 71, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(106, 72, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(107, 73, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(108, 74, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(109, 75, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(111, 77, 2, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(112, 78, 4, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(113, 76, 4, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(114, 79, 4, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(115, 80, 5, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(116, 81, 5, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(117, 82, 5, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(118, 83, 5, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(119, 84, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(120, 85, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(121, 86, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(122, 87, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(123, 88, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(124, 89, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(125, 90, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(126, 91, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(127, 92, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(128, 93, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(129, 94, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(130, 95, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(131, 96, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(132, 97, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(133, 98, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(134, 99, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(135, 100, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(136, 101, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(137, 102, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(139, 104, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(140, 103, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(141, 105, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(142, 106, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(143, 107, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(144, 108, 6, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(145, 110, 7, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(146, 111, 7, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(147, 112, 7, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(148, 113, 7, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(149, 114, 7, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(150, 115, 7, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(151, 116, 8, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(152, 117, 7, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(153, 118, 7, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(154, 119, 7, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(155, 120, 9, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(157, 122, 9, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(158, 123, 9, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(159, 121, 9, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(160, 124, 10, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(161, 125, 10, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(162, 126, 10, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(163, 127, 10, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(164, 128, 10, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(165, 129, 10, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(166, 130, 10, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(167, 131, 10, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(168, 132, 10, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1),
(169, 133, 7, 'Admin admin', '2022-08-07', 'Admin admin', '2022-08-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keyboard`
--

CREATE TABLE `keyboard` (
  `keyboard_id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyboard`
--

INSERT INTO `keyboard` (`keyboard_id`, `description`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(1, 'Front POS', 'Admin admin', '2022-07-31 05:12:25', 'Admin admin', '2022-07-31 05:12:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keyboard_department`
--

CREATE TABLE `keyboard_department` (
  `keyboard_department_id` int(11) NOT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `keyboard_id` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `key_image` varchar(150) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT '',
  `created_date` datetime DEFAULT '2021-09-15 00:00:00',
  `last_modified_by` varchar(45) DEFAULT '',
  `last_modified_date` datetime DEFAULT '2021-09-15 00:00:00',
  `record_status` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyboard_department`
--

INSERT INTO `keyboard_department` (`keyboard_department_id`, `department_name`, `keyboard_id`, `position`, `color`, `key_image`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(1, 'Breakfast', 1, 1, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(2, 'Sandwich', 1, 2, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(3, 'Nibbles', 1, 3, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(4, 'Kids and Salad', 1, 4, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(5, 'Coffee and Tea', 1, 5, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(6, 'Cold Drinks', 1, 6, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(7, 'D7', 1, 7, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(8, 'D8', 1, 8, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keyboard_item`
--

CREATE TABLE `keyboard_item` (
  `keyboard_item_id` int(11) NOT NULL,
  `keyboard_sub_depatment_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `caption` varchar(45) DEFAULT NULL,
  `color` varchar(150) DEFAULT NULL,
  `key_image` varchar(150) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT '',
  `created_date` datetime DEFAULT '2021-09-15 00:00:00',
  `last_modified_by` varchar(45) DEFAULT '',
  `last_modified_date` datetime DEFAULT '2021-09-15 00:00:00',
  `record_status` smallint(6) DEFAULT 1,
  `modify_option` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyboard_item`
--

INSERT INTO `keyboard_item` (`keyboard_item_id`, `keyboard_sub_depatment_id`, `item_id`, `position`, `caption`, `color`, `key_image`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`, `modify_option`) VALUES
(1, 1, 1, 0, 'Farmers', '00FFFF', '', 'Admin admin', '2022-08-02 12:57:29', 'Admin admin', '2022-08-02 13:01:10', 1, 'color'),
(2, 1, 2, 1, 'Wife\'s Fitness', '00FFFF', '', 'Admin admin', '2022-08-02 12:58:07', 'Admin admin', '2022-08-02 12:58:07', 1, 'color'),
(3, 1, 3, 2, 'Salmon Hash', '00FFFF', '', 'Admin admin', '2022-08-02 12:58:45', 'Admin admin', '2022-08-02 12:58:45', 1, 'color'),
(4, 1, 4, 5, 'Fancy Salad', '00FF00', '', 'Admin admin', '2022-08-02 13:00:26', 'Admin admin', '2022-08-02 13:00:26', 1, 'color'),
(5, 1, 5, 6, 'Something Amazing', '00FF00', '', 'Admin admin', '2022-08-02 13:00:49', 'Admin admin', '2022-08-02 13:00:49', 1, 'color'),
(6, 1, 6, 10, 'Ham Avo Benedict', 'F7C6CE', '', 'Admin admin', '2022-08-02 13:01:41', 'Admin admin', '2022-08-02 13:01:41', 1, 'color'),
(7, 1, 7, 11, 'Salmon Benedict', 'F7C6CE', '', 'Admin admin', '2022-08-02 13:02:14', 'Admin admin', '2022-08-02 13:02:14', 1, 'color'),
(8, 1, 8, 12, 'Bacon Mushroom Benedict', 'F7C6CE', '', 'Admin admin', '2022-08-02 13:02:31', 'Admin admin', '2022-08-02 13:02:31', 1, 'color'),
(9, 1, 9, 13, 'Vegie Benedict', 'F7C6CE', '', 'Admin admin', '2022-08-02 13:02:47', 'Admin admin', '2022-08-02 13:03:48', 1, 'color'),
(11, 1, 10, 15, 'Toast Egg Tomato', '9CC6EF', '', 'Admin admin', '2022-08-02 13:04:17', 'Admin admin', '2022-08-02 13:04:17', 1, 'color'),
(12, 1, 11, 17, 'Bacon & Egg Roll', '9CC6EF', '', 'Admin admin', '2022-08-02 13:04:40', 'Admin admin', '2022-08-02 13:04:40', 1, 'color'),
(13, 1, 12, 20, 'Cherry Ice Cream', 'E76363', '', 'Admin admin', '2022-08-02 13:05:17', 'Admin admin', '2022-08-02 13:05:17', 1, 'color'),
(14, 1, 13, 22, 'Cafe Red', 'E76363', '', 'Admin admin', '2022-08-02 13:05:37', 'Admin admin', '2022-08-02 13:05:37', 1, 'color'),
(15, 5, 117, 0, 'Milk Shake', '', '', 'Admin admin', '2022-08-07 05:25:21', 'Admin admin', '2022-08-07 05:25:21', 1, 'color'),
(16, 5, 119, 2, 'Smoothies', '', '', 'Admin admin', '2022-08-07 05:25:33', 'Admin admin', '2022-08-07 05:25:33', 1, 'color'),
(17, 5, 121, 4, 'Ice Tea', '', '', 'Admin admin', '2022-08-07 05:25:45', 'Admin admin', '2022-08-07 05:25:45', 1, 'color'),
(19, 5, 120, 6, 'Spider', '', '', 'Admin admin', '2022-08-07 05:26:13', 'Admin admin', '2022-08-07 05:26:13', 1, 'color'),
(20, 5, 122, 8, 'Fruit Juice', '', '', 'Admin admin', '2022-08-07 05:26:30', 'Admin admin', '2022-08-07 05:26:30', 1, 'color'),
(21, 5, 123, 9, 'Orange Juice', '', '', 'Admin admin', '2022-08-07 05:26:49', 'Admin admin', '2022-08-07 05:26:49', 1, 'color'),
(23, 5, 113, 10, 'Coffee Frappe', 'D6A5BD', '', 'Admin admin', '2022-08-07 05:27:30', 'Admin admin', '2022-08-07 05:27:30', 1, 'color'),
(24, 5, 114, 12, 'Chocolate Frappe', 'D6A5BD', '', 'Admin admin', '2022-08-07 05:27:44', 'Admin admin', '2022-08-07 05:27:44', 1, 'color'),
(25, 5, 115, 14, 'Chai Frappe', 'D6A5BD', '', 'Admin admin', '2022-08-07 05:27:57', 'Admin admin', '2022-08-07 05:27:57', 1, 'color'),
(26, 5, 1, 25, 'Coca Cola', 'FFC69C', '', 'Admin admin', '2022-08-07 05:29:01', 'Admin admin', '2022-08-07 05:29:13', 1, 'color'),
(27, 5, 125, 26, 'Coke No Sugar', 'FFC69C', '', 'Admin admin', '2022-08-07 05:29:23', 'Admin admin', '2022-08-07 05:29:23', 1, 'color'),
(28, 5, 126, 27, 'Diet Coke', 'FFC69C', '', 'Admin admin', '2022-08-07 05:29:34', 'Admin admin', '2022-08-07 05:29:34', 1, 'color'),
(30, 5, 1, 29, 'Lemon Lime & Bitters', '00FF00', '', 'Admin admin', '2022-08-07 05:29:58', 'Admin admin', '2022-08-07 05:31:56', 1, 'color'),
(31, 5, 127, 28, 'Sprite', 'FFC69C', '', 'Admin admin', '2022-08-07 05:30:30', 'Admin admin', '2022-08-07 05:30:30', 1, 'color'),
(32, 5, 1, 30, 'Ginger Beer', '00FF00', '', 'Admin admin', '2022-08-07 05:30:47', 'Admin admin', '2022-08-07 05:31:47', 1, 'color'),
(33, 5, 131, 35, 'Spring Water', '00FFFF', '', 'Admin admin', '2022-08-07 05:31:24', 'Admin admin', '2022-08-07 05:31:24', 1, 'color'),
(34, 5, 132, 36, 'Sparkling Spring Water', '00FFFF', '', 'Admin admin', '2022-08-07 05:31:38', 'Admin admin', '2022-08-07 05:31:38', 1, 'color'),
(35, 6, 84, 0, 'Cappuccino Small', '', '', 'Admin admin', '2022-08-07 05:36:49', 'Admin admin', '2022-08-07 05:36:49', 1, 'color'),
(36, 6, 87, 1, 'Latte Small', '', '', 'Admin admin', '2022-08-07 05:36:58', 'Admin admin', '2022-08-07 05:36:58', 1, 'color'),
(37, 6, 90, 2, 'Flat White Small', '', '', 'Admin admin', '2022-08-07 05:37:09', 'Admin admin', '2022-08-07 05:37:09', 1, 'color'),
(38, 6, 93, 3, 'Long Black Small', '', '', 'Admin admin', '2022-08-07 05:37:20', 'Admin admin', '2022-08-07 05:37:20', 1, 'color'),
(39, 6, 96, 4, 'Chai Latte Small', '', '', 'Admin admin', '2022-08-07 05:37:28', 'Admin admin', '2022-08-07 05:37:28', 1, 'color'),
(40, 6, 99, 5, 'Mocha Small', '', '', 'Admin admin', '2022-08-07 05:37:37', 'Admin admin', '2022-08-07 05:37:37', 1, 'color'),
(41, 6, 102, 6, 'Hot Chocolate Small', '', '', 'Admin admin', '2022-08-07 05:37:45', 'Admin admin', '2022-08-07 05:37:45', 1, 'color'),
(42, 6, 105, 10, 'Espresso', 'FF9C00', '', 'Admin admin', '2022-08-07 05:38:01', 'Admin admin', '2022-08-07 05:38:01', 1, 'color'),
(43, 6, 106, 11, 'Macchiato', 'FF9C00', '', 'Admin admin', '2022-08-07 05:38:11', 'Admin admin', '2022-08-07 05:38:11', 1, 'color'),
(44, 6, 107, 12, 'Piccolo', 'FF9C00', '', 'Admin admin', '2022-08-07 05:38:20', 'Admin admin', '2022-08-07 05:38:20', 1, 'color'),
(45, 6, 108, 13, 'Babycino', 'FF9C00', '', 'Admin admin', '2022-08-07 05:38:31', 'Admin admin', '2022-08-07 05:38:31', 1, 'color'),
(46, 7, 85, 0, 'Cappuccino Medium', '', '', 'Admin admin', '2022-08-07 05:38:53', 'Admin admin', '2022-08-07 05:38:53', 1, 'color'),
(47, 7, 88, 1, 'Latte Medium', '', '', 'Admin admin', '2022-08-07 05:39:01', 'Admin admin', '2022-08-07 05:39:01', 1, 'color'),
(48, 7, 91, 2, 'Flat White Medium', '', '', 'Admin admin', '2022-08-07 05:39:09', 'Admin admin', '2022-08-07 05:39:09', 1, 'color'),
(49, 7, 94, 3, 'Long Black Medium', '', '', 'Admin admin', '2022-08-07 05:39:19', 'Admin admin', '2022-08-07 05:39:19', 1, 'color'),
(50, 7, 97, 4, 'Chai Latte Medium', '', '', 'Admin admin', '2022-08-07 05:39:25', 'Admin admin', '2022-08-07 05:39:25', 1, 'color'),
(51, 7, 1, 5, 'Cappuccino Medium', '', '', 'Admin admin', '2022-08-07 05:39:39', 'Admin admin', '2022-08-07 05:40:04', 1, 'color'),
(52, 7, 103, 6, 'Hot Chocolate Medium', '', '', 'Admin admin', '2022-08-07 05:39:51', 'Admin admin', '2022-08-07 05:39:51', 1, 'color'),
(53, 8, 86, 0, 'Cappuccino Large', '', '', 'Admin admin', '2022-08-07 05:40:20', 'Admin admin', '2022-08-07 05:40:20', 1, 'color'),
(54, 8, 89, 1, 'Latte Large', '', '', 'Admin admin', '2022-08-07 05:40:29', 'Admin admin', '2022-08-07 05:40:29', 1, 'color'),
(55, 8, 92, 2, 'Flat White Large', '', '', 'Admin admin', '2022-08-07 05:40:37', 'Admin admin', '2022-08-07 05:40:37', 1, 'color'),
(56, 8, 95, 3, 'Long Black Large', '', '', 'Admin admin', '2022-08-07 05:40:44', 'Admin admin', '2022-08-07 05:40:44', 1, 'color'),
(57, 8, 98, 4, 'Chai Latte Large', '', '', 'Admin admin', '2022-08-07 05:40:51', 'Admin admin', '2022-08-07 05:40:51', 1, 'color'),
(59, 8, 104, 6, 'Hot Chocolate Large', '', '', 'Admin admin', '2022-08-07 05:41:36', 'Admin admin', '2022-08-07 05:41:36', 1, 'color'),
(60, 8, 101, 5, 'Mocha Large', '', '', 'Admin admin', '2022-08-07 05:41:51', 'Admin admin', '2022-08-07 05:41:51', 1, 'color'),
(62, 6, 116, 17, 'Pot of Tea', '9CC6EF', '', 'Admin admin', '2022-08-07 05:43:29', 'Admin admin', '2022-08-07 05:43:29', 1, 'color'),
(63, 6, 109, 39, 'Corkage', 'E76363', '', 'Admin admin', '2022-08-07 05:43:49', 'Admin admin', '2022-08-07 05:43:49', 1, 'color'),
(64, 6, 113, 25, 'Coffee Frappe', 'B5D6A5', '', 'Admin admin', '2022-08-07 05:44:26', 'Admin admin', '2022-08-07 05:44:26', 1, 'color'),
(65, 6, 114, 26, 'Chocolate Frappe', 'B5D6A5', '', 'Admin admin', '2022-08-07 05:44:38', 'Admin admin', '2022-08-07 05:44:38', 1, 'color'),
(66, 6, 115, 27, 'Chai Frappe', 'B5D6A5', '', 'Admin admin', '2022-08-07 05:44:48', 'Admin admin', '2022-08-07 05:44:48', 1, 'color'),
(67, 4, 76, 0, 'Kids Nuggets with Chips', '9CC6EF', '', 'Admin admin', '2022-08-07 05:45:44', 'Admin admin', '2022-08-07 05:45:44', 1, 'color'),
(68, 4, 77, 2, 'Kids Burger with Chips', '9CC6EF', '', 'Admin admin', '2022-08-07 05:46:16', 'Admin admin', '2022-08-07 05:46:16', 1, 'color'),
(69, 4, 78, 4, 'Kids Pancakes', '9CC6EF', '', 'Admin admin', '2022-08-07 05:46:30', 'Admin admin', '2022-08-07 05:46:30', 1, 'color'),
(70, 4, 65, 6, 'Bowl of Chips', 'B5D6A5', '', 'Admin admin', '2022-08-07 05:46:47', 'Admin admin', '2022-08-07 05:46:47', 1, 'color'),
(71, 4, 66, 8, 'Bowl of Wedges', 'B5D6A5', '', 'Admin admin', '2022-08-07 05:46:57', 'Admin admin', '2022-08-07 05:46:57', 1, 'color'),
(72, 4, 133, 12, 'Kids Milkshake', 'E76363', '', 'Admin admin', '2022-08-07 05:49:18', 'Admin admin', '2022-08-07 05:49:18', 1, 'color'),
(73, 4, 79, 25, 'Bright Summer Salad', '', '', 'Admin admin', '2022-08-07 05:49:42', 'Admin admin', '2022-08-07 05:49:42', 1, 'color'),
(74, 4, 80, 26, 'Chicken & Avo Salad', '', '', 'Admin admin', '2022-08-07 05:49:55', 'Admin admin', '2022-08-07 05:49:55', 1, 'color'),
(75, 4, 81, 27, 'Steak & Beetroot Salad', '', '', 'Admin admin', '2022-08-07 05:50:04', 'Admin admin', '2022-08-07 05:50:04', 1, 'color'),
(76, 4, 82, 28, 'Chorizo & Tomato Salad', '', '', 'Admin admin', '2022-08-07 05:50:14', 'Admin admin', '2022-08-07 05:50:14', 1, 'color'),
(77, 4, 83, 29, 'Chicken Caeser Salad', '', '', 'Admin admin', '2022-08-07 05:50:21', 'Admin admin', '2022-08-07 05:50:21', 1, 'color'),
(78, 3, 28, 0, 'Raisin Toast', '', '', 'Admin admin', '2022-08-07 05:51:43', 'Admin admin', '2022-08-07 05:51:43', 1, 'color'),
(79, 3, 29, 1, 'Cinnamon Toast', '', '', 'Admin admin', '2022-08-07 05:51:56', 'Admin admin', '2022-08-07 05:51:56', 1, 'color'),
(80, 3, 30, 2, '2 White Bread with Jam', '', '', 'Admin admin', '2022-08-07 05:52:42', 'Admin admin', '2022-08-07 05:52:42', 1, 'color'),
(81, 3, 31, 3, '2 Vienna with Jam', '', '', 'Admin admin', '2022-08-07 05:52:52', 'Admin admin', '2022-08-07 05:52:52', 1, 'color'),
(82, 3, 32, 4, '2 Dark Rye with Jam', '', '', 'Admin admin', '2022-08-07 05:53:02', 'Admin admin', '2022-08-07 05:53:02', 1, 'color'),
(83, 3, 33, 5, '2 Sourdough with Jam', '', '', 'Admin admin', '2022-08-07 05:53:09', 'Admin admin', '2022-08-07 05:53:09', 1, 'color'),
(84, 3, 34, 10, 'Banana Bread', '', '', 'Admin admin', '2022-08-07 05:53:38', 'Admin admin', '2022-08-07 05:53:38', 1, 'color'),
(85, 3, 35, 11, 'Cherries Walnut Bread', '', '', 'Admin admin', '2022-08-07 05:54:10', 'Admin admin', '2022-08-07 05:54:10', 1, 'color'),
(86, 3, 36, 12, 'Apple Pecan Bread', '', '', 'Admin admin', '2022-08-07 05:54:19', 'Admin admin', '2022-08-07 05:54:19', 1, 'color'),
(87, 3, 37, 14, '1 Toast with Butter', 'FFE79C', '', 'Admin admin', '2022-08-07 05:54:38', 'Admin admin', '2022-08-07 05:54:38', 1, 'color'),
(88, 3, 38, 15, 'Rye with Banana', '', '', 'Admin admin', '2022-08-07 05:55:28', 'Admin admin', '2022-08-07 05:55:28', 1, 'color'),
(90, 3, 47, 20, 'Banana Butter', '', '', 'Admin admin', '2022-08-07 05:56:36', 'Admin admin', '2022-08-07 05:56:36', 1, 'color'),
(91, 3, 48, 21, 'Berries Butter', '', '', 'Admin admin', '2022-08-07 05:57:08', 'Admin admin', '2022-08-07 05:57:08', 1, 'color'),
(92, 3, 49, 22, 'Apple Butter', '', '', 'Admin admin', '2022-08-07 05:57:21', 'Admin admin', '2022-08-07 05:57:21', 1, 'color'),
(93, 3, 46, 23, 'Peanut Butter', '', '', 'Admin admin', '2022-08-07 05:57:32', 'Admin admin', '2022-08-07 05:57:32', 1, 'color'),
(94, 3, 41, 25, 'Ricotta or Ice Cream', 'C67BA5', '', 'Admin admin', '2022-08-07 05:58:27', 'Admin admin', '2022-08-07 05:58:27', 1, 'color'),
(95, 3, 42, 26, 'Honey', '', '', 'Admin admin', '2022-08-07 05:58:35', 'Admin admin', '2022-08-07 05:58:35', 1, 'color'),
(96, 3, 43, 27, 'Maple Syrup', '', '', 'Admin admin', '2022-08-07 05:58:43', 'Admin admin', '2022-08-07 05:58:43', 1, 'color'),
(97, 3, 44, 28, 'Home made Jam', '', '', 'Admin admin', '2022-08-07 05:58:53', 'Admin admin', '2022-08-07 05:58:53', 1, 'color'),
(98, 3, 45, 29, 'Vegemite', '', '', 'Admin admin', '2022-08-07 05:59:03', 'Admin admin', '2022-08-07 05:59:03', 1, 'color'),
(99, 3, 50, 17, '$1 Extra', 'F7AD6B', '', 'Admin admin', '2022-08-07 06:00:23', 'Admin admin', '2022-08-07 06:00:23', 1, 'color'),
(100, 3, 51, 18, '$2 Biscuit', 'F7AD6B', '', 'Admin admin', '2022-08-07 06:00:43', 'Admin admin', '2022-08-07 06:00:43', 1, 'color'),
(101, 3, 52, 19, '$3.5 Biscuit', 'F7AD6B', '', 'Admin admin', '2022-08-07 06:01:00', 'Admin admin', '2022-08-07 06:01:00', 1, 'color'),
(102, 3, 1, 33, 'Slice of Cake', 'FFD663', '', 'Admin admin', '2022-08-07 06:01:43', 'Admin admin', '2022-08-07 06:02:08', 1, 'color'),
(103, 3, 40, 34, 'Home made Scones', 'FFD663', '', 'Admin admin', '2022-08-07 06:02:00', 'Admin admin', '2022-08-07 06:02:00', 1, 'color'),
(104, 2, 69, 0, 'BLT S/W', '', '', 'Admin admin', '2022-08-07 06:02:41', 'Admin admin', '2022-08-07 06:02:41', 1, 'color'),
(105, 2, 70, 1, 'Chicken BLAT S/W', '', '', 'Admin admin', '2022-08-07 06:02:58', 'Admin admin', '2022-08-07 06:02:58', 1, 'color'),
(106, 2, 71, 2, 'Steak BLAT S/W', '', '', 'Admin admin', '2022-08-07 06:03:06', 'Admin admin', '2022-08-07 06:03:06', 1, 'color'),
(107, 2, 53, 5, 'Beet Pine Melt 1/2', '', '', 'Admin admin', '2022-08-07 06:03:41', 'Admin admin', '2022-08-07 06:03:41', 1, 'color'),
(108, 2, 54, 10, 'Beet Pine Melt', '', '', 'Admin admin', '2022-08-07 06:03:49', 'Admin admin', '2022-08-07 06:03:49', 1, 'color'),
(109, 2, 55, 6, 'Ham Pine Melt 1/2', '', '', 'Admin admin', '2022-08-07 06:04:04', 'Admin admin', '2022-08-07 06:04:04', 1, 'color'),
(110, 2, 56, 11, 'Ham Pine Melt', '', '', 'Admin admin', '2022-08-07 06:04:14', 'Admin admin', '2022-08-07 06:04:14', 1, 'color'),
(111, 2, 57, 7, 'Chic Avo Melt 1/2', '', '', 'Admin admin', '2022-08-07 06:04:23', 'Admin admin', '2022-08-07 06:04:23', 1, 'color'),
(112, 2, 58, 12, 'Chic Avo Melt', '', '', 'Admin admin', '2022-08-07 06:04:30', 'Admin admin', '2022-08-07 06:04:30', 1, 'color'),
(113, 2, 59, 15, 'Ham Cheese Tomato S/W', 'D6EFD6', '', 'Admin admin', '2022-08-07 06:06:48', 'Admin admin', '2022-08-07 06:06:48', 1, 'color'),
(114, 2, 60, 16, 'Ham Cheese Onion S/W', 'D6EFD6', '', 'Admin admin', '2022-08-07 06:07:01', 'Admin admin', '2022-08-07 06:07:01', 1, 'color'),
(115, 2, 62, 17, 'Ham & Cheese S/W', 'D6EFD6', '', 'Admin admin', '2022-08-07 06:07:13', 'Admin admin', '2022-08-07 06:07:13', 1, 'color'),
(116, 2, 63, 18, 'Ham & Tomato S/W', 'D6EFD6', '', 'Admin admin', '2022-08-07 06:07:30', 'Admin admin', '2022-08-07 06:07:30', 1, 'color'),
(117, 2, 61, 19, 'Cheese Tomato S/W', 'D6EFD6', '', 'Admin admin', '2022-08-07 06:07:52', 'Admin admin', '2022-08-07 06:07:52', 1, 'color'),
(118, 2, 64, 20, 'Chic Cheese Avo S/W', 'D6EFD6', '', 'Admin admin', '2022-08-07 06:08:10', 'Admin admin', '2022-08-07 06:08:10', 1, 'color'),
(119, 2, 67, 4, 'Add $3 Chips', 'FF9C00', '', 'Admin admin', '2022-08-07 06:08:46', 'Admin admin', '2022-08-07 06:08:46', 1, 'color'),
(120, 2, 68, 9, 'Add $3 Wedges', 'FF9C00', '', 'Admin admin', '2022-08-07 06:08:54', 'Admin admin', '2022-08-07 06:08:54', 1, 'color'),
(121, 2, 73, 27, 'Beef Burger', '', '', 'Admin admin', '2022-08-07 06:09:27', 'Admin admin', '2022-08-07 06:09:27', 1, 'color'),
(122, 2, 74, 28, 'Chicken Burger', '', '', 'Admin admin', '2022-08-07 06:09:38', 'Admin admin', '2022-08-07 06:09:38', 1, 'color'),
(123, 2, 75, 29, 'A+ Burger', '', '', 'Admin admin', '2022-08-07 06:09:52', 'Admin admin', '2022-08-07 06:09:52', 1, 'color'),
(124, 1, 14, 25, 'Grilled Tomato', '', '', 'Admin admin', '2022-08-07 06:10:47', 'Admin admin', '2022-08-07 06:10:47', 1, 'color'),
(125, 1, 15, 26, 'Fresh Avocado', '', '', 'Admin admin', '2022-08-07 06:11:07', 'Admin admin', '2022-08-07 06:11:07', 1, 'color'),
(126, 1, 16, 27, 'Grilled Mushroom', '', '', 'Admin admin', '2022-08-07 06:11:16', 'Admin admin', '2022-08-07 06:11:16', 1, 'color'),
(127, 1, 17, 28, 'Any Style of 2 Eggs', '', '', 'Admin admin', '2022-08-07 06:11:28', 'Admin admin', '2022-08-07 06:11:28', 1, 'color'),
(128, 1, 18, 29, 'Spinach', '', '', 'Admin admin', '2022-08-07 06:11:35', 'Admin admin', '2022-08-07 06:11:35', 1, 'color'),
(130, 1, 19, 30, 'Grilled Sausage', '', '', 'Admin admin', '2022-08-07 06:12:08', 'Admin admin', '2022-08-07 06:12:08', 1, 'color'),
(131, 1, 20, 31, 'Grilled Bacon', '', '', 'Admin admin', '2022-08-07 06:12:19', 'Admin admin', '2022-08-07 06:12:19', 1, 'color'),
(132, 1, 22, 32, 'Smoked Salmon', '', '', 'Admin admin', '2022-08-07 06:12:32', 'Admin admin', '2022-08-07 06:12:32', 1, 'color'),
(133, 1, 21, 33, 'Hash Brown', '', '', 'Admin admin', '2022-08-07 06:12:47', 'Admin admin', '2022-08-07 06:12:47', 1, 'color'),
(134, 1, 23, 34, 'Slice of Toast', '', '', 'Admin admin', '2022-08-07 06:12:58', 'Admin admin', '2022-08-07 06:12:58', 1, 'color'),
(135, 1, 24, 35, 'Slice of Cheese', '', '', 'Admin admin', '2022-08-07 06:13:11', 'Admin admin', '2022-08-07 06:13:11', 1, 'color'),
(136, 1, 26, 36, 'Hollandaise Sauce', '', '', 'Admin admin', '2022-08-07 06:13:24', 'Admin admin', '2022-08-07 06:13:24', 1, 'color'),
(137, 1, 25, 37, 'Baked Beans', '', '', 'Admin admin', '2022-08-07 06:13:37', 'Admin admin', '2022-08-07 06:13:37', 1, 'color'),
(138, 1, 27, 38, 'Gluten Free', '', '', 'Admin admin', '2022-08-07 06:13:50', 'Admin admin', '2022-08-07 06:13:50', 1, 'color');

-- --------------------------------------------------------

--
-- Table structure for table `keyboard_sub_department`
--

CREATE TABLE `keyboard_sub_department` (
  `keyboard_sub_department_id` int(11) NOT NULL,
  `keyboard_department_id` int(11) DEFAULT NULL,
  `sub_department_name` varchar(100) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `color` varchar(150) DEFAULT NULL,
  `key_image` varchar(150) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT '',
  `created_date` datetime DEFAULT '2021-09-15 00:00:00',
  `last_modified_by` varchar(45) DEFAULT '',
  `last_modified_date` datetime DEFAULT '2021-09-15 00:00:00',
  `record_status` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyboard_sub_department`
--

INSERT INTO `keyboard_sub_department` (`keyboard_sub_department_id`, `keyboard_department_id`, `sub_department_name`, `position`, `color`, `key_image`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(1, 1, '1', 0, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(2, 2, '1', 0, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(3, 3, '1', 0, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(4, 4, '1', 0, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(5, 6, '1', 0, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(6, 5, 'Small', 0, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(7, 5, 'Medium', 1, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1),
(8, 5, 'Large', 2, NULL, NULL, '', '2021-09-15 00:00:00', '', '2021-09-15 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(100) NOT NULL,
  `number_of_tables` int(11) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `number_of_tables`, `created_by`, `created_date`, `last_modified_date`, `last_modified_by`, `record_status`) VALUES
(1, 'Cafe Red', 20, 'Admin admin', '2022-07-18 05:48:12', '2022-07-18 05:48:12', 'Admin admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_table_details`
--

CREATE TABLE `location_table_details` (
  `location_table_detail_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `start_number` int(11) NOT NULL,
  `end_number` int(11) NOT NULL,
  `area` varchar(100) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_table_details`
--

INSERT INTO `location_table_details` (`location_table_detail_id`, `location_id`, `start_number`, `end_number`, `area`, `created_by`, `created_date`, `last_modified_date`, `last_modified_by`, `record_status`) VALUES
(30, 1, 1, 20, 'Cafe Red Inside', 'Admin admin', '2022-10-19 22:04:01', '2022-10-19 22:04:01', 'Admin admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` date DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `type`, `description`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(1, 0, 'TAKE AWAY', 'Admin admin', '2022-07-18', 'Admin admin', '2022-07-18', 1),
(2, 0, 'SAUCE ON SIDE', 'Admin admin', '2022-07-18', 'Admin admin', '2022-07-18', 1),
(3, 0, 'WITH LETTUCE', 'Admin admin', '2022-07-18', 'Admin admin', '2022-07-18', 1);

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
(4, '2020_04_19_081616_create_products_table', 1),
(5, '2020_04_22_181602_add_quantity_to_products_table', 1),
(6, '2020_04_24_170630_create_customers_table', 1),
(7, '2020_04_27_054355_create_settings_table', 1),
(8, '2020_04_30_053758_create_user_cart_table', 1),
(9, '2020_05_04_165730_create_orders_table', 1),
(10, '2020_05_04_165749_create_order_items_table', 1),
(11, '2020_05_04_165822_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modifier`
--

CREATE TABLE `modifier` (
  `modifier_id` int(11) NOT NULL,
  `modifiers_category_id` int(11) DEFAULT NULL,
  `description` varchar(45) NOT NULL,
  `price_x_tax` decimal(10,2) DEFAULT 0.00,
  `price_inc_tax` decimal(10,2) DEFAULT 0.00,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modifier`
--

INSERT INTO `modifier` (`modifier_id`, `modifiers_category_id`, `description`, `price_x_tax`, `price_inc_tax`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(2, 1, 'FRIED EGG', '0.00', '0.00', 'Admin admin', '2022-08-01 08:52:10', 'Admin admin', '2022-08-01 08:52:10', 1),
(3, 4, 'SKIM MILK', '0.00', '0.00', 'Admin admin', '2022-08-01 08:52:27', 'Admin admin', '2022-08-01 10:20:36', 1),
(4, 1, 'POACHED EGG', '0.00', '0.00', 'Admin admin', '2022-08-01 08:52:47', 'Admin admin', '2022-08-01 08:52:47', 1),
(5, 1, 'SCRAMBLED EGG', '0.00', '0.00', 'Admin admin', '2022-08-01 09:00:57', 'Admin admin', '2022-08-01 09:00:57', 1),
(6, 2, 'TOAST', '0.00', '0.00', 'Admin admin', '2022-08-01 09:13:35', 'Admin admin', '2022-08-01 09:13:35', 1),
(7, 2, 'PANCAKES', '0.00', '0.00', 'Admin admin', '2022-08-01 09:14:18', 'Admin admin', '2022-08-01 09:14:18', 1),
(8, 2, 'ICE CREAM', '0.00', '0.00', 'Admin admin', '2022-08-01 09:14:34', 'Admin admin', '2022-08-01 09:14:34', 1),
(9, 2, 'MAPLE SYRUP', '0.00', '0.00', 'Admin admin', '2022-08-01 09:14:53', 'Admin admin', '2022-08-01 09:14:53', 1),
(10, 5, 'VANILLA', '0.00', '0.00', 'Admin admin', '2022-08-01 09:26:41', 'Admin admin', '2022-08-01 09:26:41', 1),
(11, 5, 'STRAWBERRY', '0.00', '0.00', 'Admin admin', '2022-08-01 09:26:59', 'Admin admin', '2022-08-01 09:26:59', 1),
(12, 5, 'SWISS CHOCOLATE', '0.00', '0.00', 'Admin admin', '2022-08-01 09:27:17', 'Admin admin', '2022-08-01 09:27:17', 1),
(13, 5, 'CARAMEL', '0.00', '0.00', 'Admin admin', '2022-08-01 09:27:28', 'Admin admin', '2022-08-01 09:27:28', 1),
(14, 5, 'BANANA', '0.00', '0.00', 'Admin admin', '2022-08-01 09:27:43', 'Admin admin', '2022-08-01 09:27:43', 1),
(15, 5, 'MANGO', '0.00', '0.00', 'Admin admin', '2022-08-01 09:27:54', 'Admin admin', '2022-08-01 09:27:54', 1),
(16, 5, 'HAZELNUT', '0.00', '0.00', 'Admin admin', '2022-08-01 09:28:05', 'Admin admin', '2022-08-01 09:28:05', 1),
(17, 7, 'LEMON', '0.00', '0.00', 'Admin admin', '2022-08-01 09:29:19', 'Admin admin', '2022-08-01 09:29:19', 1),
(18, 7, 'PEACH', '0.00', '0.00', 'Admin admin', '2022-08-01 09:29:32', 'Admin admin', '2022-08-01 09:29:32', 1),
(19, 7, 'APPLE', '0.00', '0.00', 'Admin admin', '2022-08-01 09:29:45', 'Admin admin', '2022-08-01 09:29:45', 1),
(20, 7, 'ORANGE', '0.00', '0.00', 'Admin admin', '2022-08-01 09:29:58', 'Admin admin', '2022-08-01 09:29:58', 1),
(21, 7, 'TROPICAL', '0.00', '0.00', 'Admin admin', '2022-08-01 09:30:11', 'Admin admin', '2022-08-01 09:30:11', 1),
(22, 4, 'WEAK', '0.00', '0.00', 'Admin admin', '2022-08-01 09:31:04', 'Admin admin', '2022-08-01 09:31:04', 1),
(23, 4, 'SOY  MILK', '0.00', '0.00', 'Admin admin', '2022-08-01 09:32:07', 'Admin admin', '2022-08-01 09:32:07', 1),
(24, 4, 'DECAF', '0.00', '0.00', 'Admin admin', '2022-08-01 09:32:35', 'Admin admin', '2022-08-01 09:32:35', 1),
(25, 8, 'NO TOMATO', '0.00', '0.00', 'Admin admin', '2022-08-01 10:02:46', 'Admin admin', '2022-08-01 10:02:46', 1),
(26, 8, 'NO MUSHROOM', '0.00', '0.00', 'Admin admin', '2022-08-01 10:02:57', 'Admin admin', '2022-08-01 10:02:57', 1),
(27, 8, 'NO EGG', '0.00', '0.00', 'Admin admin', '2022-08-01 10:03:09', 'Admin admin', '2022-08-01 10:03:09', 1),
(28, 8, 'NO SAUSAGE', '0.00', '0.00', 'Admin admin', '2022-08-01 10:03:45', 'Admin admin', '2022-08-01 10:03:45', 1),
(29, 8, 'NO BEANS', '0.00', '0.00', 'Admin admin', '2022-08-01 10:03:56', 'Admin admin', '2022-08-01 10:03:56', 1),
(30, 8, 'NO BACON', '0.00', '0.00', 'Admin admin', '2022-08-01 10:04:13', 'Admin admin', '2022-08-01 10:04:13', 1),
(31, 8, 'NO AVOCADO', '0.00', '0.00', 'Admin admin', '2022-08-01 10:04:36', 'Admin admin', '2022-08-01 10:04:36', 1),
(32, 8, 'NO CHEESE', '0.00', '0.00', 'Admin admin', '2022-08-01 10:04:55', 'Admin admin', '2022-08-01 10:04:55', 1),
(33, 8, 'NO SAUCE', '0.00', '0.00', 'Admin admin', '2022-08-01 10:05:10', 'Admin admin', '2022-08-01 10:05:10', 1),
(34, 8, 'NO ONIONS', '0.00', '0.00', 'Admin admin', '2022-08-01 10:05:29', 'Admin admin', '2022-08-01 10:05:29', 1),
(35, 3, 'BBQ SAUCE', '0.00', '0.00', 'Admin admin', '2022-08-01 10:07:12', 'Admin admin', '2022-08-01 10:07:12', 1),
(36, 3, 'TOMATO SAUCE', '0.00', '0.00', 'Admin admin', '2022-08-01 10:07:27', 'Admin admin', '2022-08-01 10:07:27', 1),
(37, 3, 'SOUR CREAM', '0.00', '0.00', 'Admin admin', '2022-08-01 10:07:43', 'Admin admin', '2022-08-01 10:07:43', 1),
(38, 3, 'SWEET CHILLI SAUCE', '0.00', '0.00', 'Admin admin', '2022-08-01 10:08:02', 'Admin admin', '2022-08-01 10:08:15', 1),
(40, 3, 'GRAVY', '0.00', '0.00', 'Admin admin', '2022-08-01 10:09:15', 'Admin admin', '2022-08-01 10:18:50', 1),
(41, 6, 'ENGLISH BREAKFAST', '0.00', '0.00', 'Admin admin', '2022-08-01 10:09:49', 'Admin admin', '2022-08-01 10:09:49', 1),
(42, 6, 'EARL GREY', '0.00', '0.00', 'Admin admin', '2022-08-01 10:10:01', 'Admin admin', '2022-08-01 10:10:01', 1),
(43, 6, 'GREEN TEA', '0.00', '0.00', 'Admin admin', '2022-08-01 10:10:51', 'Admin admin', '2022-08-01 10:10:51', 1),
(44, 6, 'CHAI', '0.00', '0.00', 'Admin admin', '2022-08-01 10:11:02', 'Admin admin', '2022-08-01 10:11:02', 1),
(45, 6, 'CHAMOMILE', '0.00', '0.00', 'Admin admin', '2022-08-01 10:11:31', 'Admin admin', '2022-08-01 10:11:31', 1),
(46, 6, 'PEPPERMINT', '0.00', '0.00', 'Admin admin', '2022-08-01 10:11:49', 'Admin admin', '2022-08-01 10:11:49', 1),
(47, 6, 'LEMONGRASS', '0.00', '0.00', 'Admin admin', '2022-08-01 10:12:02', 'Admin admin', '2022-08-01 10:12:02', 1),
(48, 9, 'ADD SAUCE', '0.00', '0.80', 'Admin admin', '2022-08-01 10:16:28', 'Admin admin', '2022-08-01 10:16:28', 1),
(49, 9, 'ADD RELISH', '0.00', '0.80', 'Admin admin', '2022-08-01 10:16:45', 'Admin admin', '2022-08-01 10:16:45', 1),
(50, 9, 'ADD AIOLI', '0.00', '0.80', 'Admin admin', '2022-08-01 10:17:12', 'Admin admin', '2022-08-01 10:17:12', 1),
(51, 4, 'EXTRA SHOT', '0.00', '0.00', 'Admin admin', '2022-08-01 10:22:08', 'Admin admin', '2022-08-01 10:22:08', 1),
(52, 4, 'ALMOND MILK', '0.00', '0.00', 'Admin admin', '2022-08-01 10:22:24', 'Admin admin', '2022-08-01 10:22:24', 1),
(53, 4, 'LACTOSE FREE', '0.00', '0.00', 'Admin admin', '2022-08-01 10:22:54', 'Admin admin', '2022-08-01 10:22:54', 1),
(54, 10, 'BBQ Sauce', '0.00', '0.80', 'Admin admin', '2022-08-07 03:18:35', 'Admin admin', '2022-08-07 03:18:35', 1),
(55, 10, 'Tomato Sauce', '0.00', '0.80', 'Admin admin', '2022-08-07 03:18:52', 'Admin admin', '2022-08-07 03:18:52', 1),
(56, 10, 'Sweet Chilli Sauce', '0.00', '0.80', 'Admin admin', '2022-08-07 03:19:14', 'Admin admin', '2022-08-07 03:19:14', 1),
(57, 10, 'Sour Cream', '0.00', '1.20', 'Admin admin', '2022-08-07 03:19:36', 'Admin admin', '2022-08-07 03:19:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modifiers_category`
--

CREATE TABLE `modifiers_category` (
  `modifiers_category_id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modifiers_category`
--

INSERT INTO `modifiers_category` (`modifiers_category_id`, `description`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(1, 'EGG', 'Admin admin', '2022-07-18 05:20:59', 'Admin admin', '2022-07-18 05:20:59', 1),
(2, 'BREAKFAST', 'Admin admin', '2022-07-18 05:21:38', 'Admin admin', '2022-07-18 05:21:38', 1),
(3, 'SAUCE', 'Admin admin', '2022-07-18 05:21:54', 'Admin admin', '2022-07-18 05:21:54', 1),
(4, 'MILK', 'Admin admin', '2022-07-18 05:22:10', 'Admin admin', '2022-07-18 05:22:10', 1),
(5, 'FLAVOUR', 'Admin admin', '2022-07-18 05:22:25', 'Admin admin', '2022-07-18 05:22:25', 1),
(6, 'TEA', 'Admin admin', '2022-07-18 05:22:40', 'Admin admin', '2022-07-18 05:22:40', 1),
(7, 'JUICE', 'Admin admin', '2022-07-18 05:22:56', 'Admin admin', '2022-07-18 05:22:56', 1),
(8, 'NO', 'Admin admin', '2022-07-18 05:23:10', 'Admin admin', '2022-07-18 05:23:10', 1),
(9, 'ADD', 'Admin admin', '2022-08-01 10:15:43', 'Admin admin', '2022-08-01 10:15:43', 1),
(10, '$ Sauce', 'Admin admin', '2022-08-07 03:16:25', 'Admin admin', '2022-08-07 03:16:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '2021-07-27 11:34:05', '2021-07-27 11:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,4) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `price`, `quantity`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '23.0000', 10, 1, 1, '2021-07-27 11:34:05', '2021-07-27 11:34:05'),
(2, '21.0000', 13, 1, 2, '2021-07-27 11:34:05', '2021-07-27 11:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abc@def.com', '$2y$10$rC/93kEhRXzc7c.o3ESZ7e7G1CSCZPuKnsIxNQfy6bboajJb088Vu', '2021-09-10 12:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,4) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `order_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '503.0000', 1, 1, '2021-07-27 11:34:05', '2021-07-27 11:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `permission_id` int(11) NOT NULL,
  `permission_name` varchar(45) NOT NULL DEFAULT '',
  `controller` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` timestamp NULL DEFAULT NULL,
  `record_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permission_id`, `permission_name`, `controller`, `method`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(222, '', 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController', 'handle', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(223, '', 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController', 'clockwork', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(224, '', 'Barryvdh\\Debugbar\\Controllers\\TelescopeController', 'show', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(225, '', 'Barryvdh\\Debugbar\\Controllers\\AssetController', 'css', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(226, '', 'Barryvdh\\Debugbar\\Controllers\\AssetController', 'js', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(227, '', 'Barryvdh\\Debugbar\\Controllers\\CacheController', 'delete', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(228, '', 'Facade\\Ignition\\Http\\Controllers\\HealthCheckController', 'Facade\\Ignition\\Http\\Controllers\\HealthCheckController', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(229, '', 'Facade\\Ignition\\Http\\Controllers\\ExecuteSolutionController', 'Facade\\Ignition\\Http\\Controllers\\ExecuteSolutionController', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(230, '', 'Facade\\Ignition\\Http\\Controllers\\ShareReportController', 'Facade\\Ignition\\Http\\Controllers\\ShareReportController', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(231, '', 'Facade\\Ignition\\Http\\Controllers\\ScriptController', 'Facade\\Ignition\\Http\\Controllers\\ScriptController', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(232, '', 'Facade\\Ignition\\Http\\Controllers\\StyleController', 'Facade\\Ignition\\Http\\Controllers\\StyleController', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(233, '', 'Closure', 'Closure', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(234, '', 'App\\Http\\Controllers\\Auth\\LoginController', 'showLoginForm', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(235, '', 'App\\Http\\Controllers\\Auth\\LoginController', 'login', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(236, '', 'App\\Http\\Controllers\\Auth\\LoginController', 'logout', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(237, '', 'App\\Http\\Controllers\\Auth\\RegisterController', 'showRegistrationForm', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(238, '', 'App\\Http\\Controllers\\Auth\\RegisterController', 'register', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(239, '', 'App\\Http\\Controllers\\Auth\\ForgotPasswordController', 'showLinkRequestForm', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(240, '', 'App\\Http\\Controllers\\Auth\\ForgotPasswordController', 'sendResetLinkEmail', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(241, '', 'App\\Http\\Controllers\\Auth\\ResetPasswordController', 'showResetForm', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(242, '', 'App\\Http\\Controllers\\Auth\\ResetPasswordController', 'reset', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(243, '', 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController', 'showConfirmForm', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(244, '', 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController', 'confirm', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(245, '', 'App\\Http\\Controllers\\HomeController', 'index', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(246, '', 'App\\Http\\Controllers\\SettingController', 'index', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(247, '', 'App\\Http\\Controllers\\SettingController', 'store', 'Admin admin', '2021-10-27 12:50:54', 'Admin admin', '2021-10-27 12:50:54', '1'),
(248, '', 'App\\Http\\Controllers\\AccountController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(249, '', 'App\\Http\\Controllers\\AccountController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(250, '', 'App\\Http\\Controllers\\AccountController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(251, '', 'App\\Http\\Controllers\\AccountController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(252, '', 'App\\Http\\Controllers\\AccountController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(253, '', 'App\\Http\\Controllers\\AccountController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(254, '', 'App\\Http\\Controllers\\AccountController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(255, '', 'App\\Http\\Controllers\\MessageController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(256, '', 'App\\Http\\Controllers\\MessageController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(257, '', 'App\\Http\\Controllers\\MessageController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(258, '', 'App\\Http\\Controllers\\MessageController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(259, '', 'App\\Http\\Controllers\\MessageController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(260, '', 'App\\Http\\Controllers\\MessageController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(261, '', 'App\\Http\\Controllers\\MessageController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(262, '', 'App\\Http\\Controllers\\DepartmentController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(263, '', 'App\\Http\\Controllers\\DepartmentController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(264, '', 'App\\Http\\Controllers\\DepartmentController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(265, '', 'App\\Http\\Controllers\\DepartmentController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(266, '', 'App\\Http\\Controllers\\DepartmentController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(267, '', 'App\\Http\\Controllers\\DepartmentController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(268, '', 'App\\Http\\Controllers\\DepartmentController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(269, '', 'App\\Http\\Controllers\\LocationController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(270, '', 'App\\Http\\Controllers\\LocationController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(271, '', 'App\\Http\\Controllers\\LocationController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(272, '', 'App\\Http\\Controllers\\LocationController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(273, '', 'App\\Http\\Controllers\\LocationController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(274, '', 'App\\Http\\Controllers\\LocationController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(275, '', 'App\\Http\\Controllers\\LocationController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(276, '', 'App\\Http\\Controllers\\LocationTableDetailsController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(277, '', 'App\\Http\\Controllers\\LocationTableDetailsController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(278, '', 'App\\Http\\Controllers\\LocationTableDetailsController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(279, '', 'App\\Http\\Controllers\\LocationTableDetailsController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(280, '', 'App\\Http\\Controllers\\LocationTableDetailsController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(281, '', 'App\\Http\\Controllers\\LocationTableDetailsController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(282, '', 'App\\Http\\Controllers\\LocationTableDetailsController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(283, '', 'App\\Http\\Controllers\\TaxController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(284, '', 'App\\Http\\Controllers\\TaxController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(285, '', 'App\\Http\\Controllers\\TaxController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(286, '', 'App\\Http\\Controllers\\TaxController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(287, '', 'App\\Http\\Controllers\\TaxController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(288, '', 'App\\Http\\Controllers\\TaxController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(289, '', 'App\\Http\\Controllers\\TaxController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(290, '', 'App\\Http\\Controllers\\UserController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(291, '', 'App\\Http\\Controllers\\UserController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(292, '', 'App\\Http\\Controllers\\UserController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(293, '', 'App\\Http\\Controllers\\UserController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(294, '', 'App\\Http\\Controllers\\UserController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(295, '', 'App\\Http\\Controllers\\UserController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(296, '', 'App\\Http\\Controllers\\UserController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(297, '', 'App\\Http\\Controllers\\RoleController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(298, '', 'App\\Http\\Controllers\\RoleController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(299, '', 'App\\Http\\Controllers\\RoleController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(300, '', 'App\\Http\\Controllers\\RoleController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(301, '', 'App\\Http\\Controllers\\RoleController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(302, '', 'App\\Http\\Controllers\\RoleController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(303, '', 'App\\Http\\Controllers\\RoleController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(304, '', 'App\\Http\\Controllers\\UnitController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(305, '', 'App\\Http\\Controllers\\UnitController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(306, '', 'App\\Http\\Controllers\\UnitController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(307, '', 'App\\Http\\Controllers\\UnitController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(308, '', 'App\\Http\\Controllers\\UnitController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(309, '', 'App\\Http\\Controllers\\UnitController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(310, '', 'App\\Http\\Controllers\\UnitController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(311, '', 'App\\Http\\Controllers\\TerminalOptionDetailController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(312, '', 'App\\Http\\Controllers\\TerminalOptionDetailController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(313, '', 'App\\Http\\Controllers\\TerminalOptionDetailController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(314, '', 'App\\Http\\Controllers\\TerminalOptionDetailController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(315, '', 'App\\Http\\Controllers\\TerminalOptionDetailController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(316, '', 'App\\Http\\Controllers\\TerminalOptionDetailController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(317, '', 'App\\Http\\Controllers\\TerminalOptionDetailController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(318, '', 'App\\Http\\Controllers\\TerminalController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(319, '', 'App\\Http\\Controllers\\TerminalController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(320, '', 'App\\Http\\Controllers\\TerminalController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(321, '', 'App\\Http\\Controllers\\TerminalController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(322, '', 'App\\Http\\Controllers\\TerminalController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(323, '', 'App\\Http\\Controllers\\TerminalController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(324, '', 'App\\Http\\Controllers\\TerminalController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(325, '', 'App\\Http\\Controllers\\TerminalOptionController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(326, '', 'App\\Http\\Controllers\\TerminalOptionController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(327, '', 'App\\Http\\Controllers\\TerminalOptionController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(328, '', 'App\\Http\\Controllers\\TerminalOptionController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(329, '', 'App\\Http\\Controllers\\TerminalOptionController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(330, '', 'App\\Http\\Controllers\\TerminalOptionController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(331, '', 'App\\Http\\Controllers\\TerminalOptionController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(332, '', 'App\\Http\\Controllers\\KeyboardController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(333, '', 'App\\Http\\Controllers\\KeyboardController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(334, '', 'App\\Http\\Controllers\\KeyboardController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(335, '', 'App\\Http\\Controllers\\KeyboardController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(336, '', 'App\\Http\\Controllers\\KeyboardController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(337, '', 'App\\Http\\Controllers\\KeyboardController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(338, '', 'App\\Http\\Controllers\\KeyboardController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(339, '', 'App\\Http\\Controllers\\VoucherTypeController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(340, '', 'App\\Http\\Controllers\\VoucherTypeController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(341, '', 'App\\Http\\Controllers\\VoucherTypeController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(342, '', 'App\\Http\\Controllers\\VoucherTypeController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(343, '', 'App\\Http\\Controllers\\VoucherTypeController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(344, '', 'App\\Http\\Controllers\\VoucherTypeController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(345, '', 'App\\Http\\Controllers\\VoucherTypeController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(346, '', 'App\\Http\\Controllers\\VoucherController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(347, '', 'App\\Http\\Controllers\\VoucherController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(348, '', 'App\\Http\\Controllers\\VoucherController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(349, '', 'App\\Http\\Controllers\\VoucherController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(350, '', 'App\\Http\\Controllers\\VoucherController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(351, '', 'App\\Http\\Controllers\\VoucherController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(352, '', 'App\\Http\\Controllers\\VoucherController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(353, '', 'App\\Http\\Controllers\\ModifiersCategoryController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(354, '', 'App\\Http\\Controllers\\ModifiersCategoryController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(355, '', 'App\\Http\\Controllers\\ModifiersCategoryController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(356, '', 'App\\Http\\Controllers\\ModifiersCategoryController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(357, '', 'App\\Http\\Controllers\\ModifiersCategoryController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(358, '', 'App\\Http\\Controllers\\ModifiersCategoryController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(359, '', 'App\\Http\\Controllers\\ModifiersCategoryController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(360, '', 'App\\Http\\Controllers\\ModifierController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(361, '', 'App\\Http\\Controllers\\ModifierController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(362, '', 'App\\Http\\Controllers\\ModifierController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(363, '', 'App\\Http\\Controllers\\ModifierController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(364, '', 'App\\Http\\Controllers\\ModifierController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(365, '', 'App\\Http\\Controllers\\ModifierController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(366, '', 'App\\Http\\Controllers\\ModifierController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(367, '', 'App\\Http\\Controllers\\PermissionController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(368, '', 'App\\Http\\Controllers\\PermissionController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(369, '', 'App\\Http\\Controllers\\PermissionController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(370, '', 'App\\Http\\Controllers\\PermissionController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(371, '', 'App\\Http\\Controllers\\PermissionController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(372, '', 'App\\Http\\Controllers\\PermissionController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(373, '', 'App\\Http\\Controllers\\PermissionController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(374, '', 'App\\Http\\Controllers\\PriceLevelController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(375, '', 'App\\Http\\Controllers\\PriceLevelController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(376, '', 'App\\Http\\Controllers\\PriceLevelController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(377, '', 'App\\Http\\Controllers\\PriceLevelController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(378, '', 'App\\Http\\Controllers\\PriceLevelController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(379, '', 'App\\Http\\Controllers\\PriceLevelController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(380, '', 'App\\Http\\Controllers\\PriceLevelController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(381, '', 'App\\Http\\Controllers\\PrinterGroupController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(382, '', 'App\\Http\\Controllers\\PrinterGroupController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(383, '', 'App\\Http\\Controllers\\PrinterGroupController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(384, '', 'App\\Http\\Controllers\\PrinterGroupController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(385, '', 'App\\Http\\Controllers\\PrinterGroupController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(386, '', 'App\\Http\\Controllers\\PrinterGroupController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(387, '', 'App\\Http\\Controllers\\PrinterGroupController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(388, '', 'App\\Http\\Controllers\\PrinterController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(389, '', 'App\\Http\\Controllers\\PrinterController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(390, '', 'App\\Http\\Controllers\\PrinterController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(391, '', 'App\\Http\\Controllers\\PrinterController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(392, '', 'App\\Http\\Controllers\\PrinterController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(393, '', 'App\\Http\\Controllers\\PrinterController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(394, '', 'App\\Http\\Controllers\\PrinterController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(395, '', 'App\\Http\\Controllers\\ProductController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(396, '', 'App\\Http\\Controllers\\ProductController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(397, '', 'App\\Http\\Controllers\\ProductController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(398, '', 'App\\Http\\Controllers\\ProductController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(399, '', 'App\\Http\\Controllers\\ProductController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(400, '', 'App\\Http\\Controllers\\ProductController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(401, '', 'App\\Http\\Controllers\\ProductController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(402, '', 'App\\Http\\Controllers\\CustomerController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(403, '', 'App\\Http\\Controllers\\CustomerController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(404, '', 'App\\Http\\Controllers\\CustomerController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(405, '', 'App\\Http\\Controllers\\CustomerController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(406, '', 'App\\Http\\Controllers\\CustomerController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(407, '', 'App\\Http\\Controllers\\CustomerController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(408, '', 'App\\Http\\Controllers\\CustomerController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(409, '', 'App\\Http\\Controllers\\OrderController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(410, '', 'App\\Http\\Controllers\\OrderController', 'create', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(411, '', 'App\\Http\\Controllers\\OrderController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(412, '', 'App\\Http\\Controllers\\OrderController', 'show', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(413, '', 'App\\Http\\Controllers\\OrderController', 'edit', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(414, '', 'App\\Http\\Controllers\\OrderController', 'update', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(415, '', 'App\\Http\\Controllers\\OrderController', 'destroy', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(416, '', 'App\\Http\\Controllers\\CartController', 'index', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(417, '', 'App\\Http\\Controllers\\CartController', 'store', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(418, '', 'App\\Http\\Controllers\\CartController', 'changeQty', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(419, '', 'App\\Http\\Controllers\\CartController', 'delete', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(420, '', 'App\\Http\\Controllers\\CartController', 'empty', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(421, '', 'App\\Http\\Controllers\\LocationController', 'newLocation', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(422, '', 'App\\Http\\Controllers\\ModifiersCategoryController', 'newModifiersCategory', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(423, '', 'App\\Http\\Controllers\\PrinterGroupController', 'newPrinterGroup', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(424, '', 'App\\Http\\Controllers\\DepartmentController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(425, '', 'App\\Http\\Controllers\\LocationController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(426, '', 'App\\Http\\Controllers\\UnitController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(427, '', 'App\\Http\\Controllers\\RoleController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(428, '', 'App\\Http\\Controllers\\UserController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(429, '', 'App\\Http\\Controllers\\TerminalOptionDetailController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(430, '', 'App\\Http\\Controllers\\TerminalController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(431, '', 'App\\Http\\Controllers\\KeyboardController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(432, '', 'App\\Http\\Controllers\\TaxController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(433, '', 'App\\Http\\Controllers\\PrinterGroupController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(434, '', 'App\\Http\\Controllers\\PriceLevelController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(435, '', 'App\\Http\\Controllers\\ModifiersCategoryController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(436, '', 'App\\Http\\Controllers\\VoucherTypeController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(437, '', 'App\\Http\\Controllers\\AccountController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(438, '', 'App\\Http\\Controllers\\MessageController', 'search', 'Admin admin', '2021-10-27 12:50:55', 'Admin admin', '2021-10-27 12:50:55', '1'),
(439, '', 'App\\Http\\Controllers\\ItemController', 'index', 'Admin admin', '2022-04-17 21:13:56', 'Admin admin', '2022-04-17 21:13:56', '1'),
(440, '', 'App\\Http\\Controllers\\ItemController', 'create', 'Admin admin', '2022-04-17 21:13:56', 'Admin admin', '2022-04-17 21:13:56', '1'),
(441, '', 'App\\Http\\Controllers\\ItemController', 'store', 'Admin admin', '2022-04-17 21:13:56', 'Admin admin', '2022-04-17 21:13:56', '1'),
(442, '', 'App\\Http\\Controllers\\ItemController', 'show', 'Admin admin', '2022-04-17 21:13:56', 'Admin admin', '2022-04-17 21:13:56', '1'),
(443, '', 'App\\Http\\Controllers\\ItemController', 'edit', 'Admin admin', '2022-04-17 21:13:56', 'Admin admin', '2022-04-17 21:13:56', '1'),
(444, '', 'App\\Http\\Controllers\\ItemController', 'update', 'Admin admin', '2022-04-17 21:13:56', 'Admin admin', '2022-04-17 21:13:56', '1'),
(445, '', 'App\\Http\\Controllers\\ItemController', 'destroy', 'Admin admin', '2022-04-17 21:13:56', 'Admin admin', '2022-04-17 21:13:56', '1'),
(446, '', 'App\\Http\\Controllers\\KeyboardItemController', 'index', 'Admin admin', '2022-04-17 21:13:57', 'Admin admin', '2022-04-17 21:13:57', '1'),
(447, '', 'App\\Http\\Controllers\\KeyboardItemController', 'create', 'Admin admin', '2022-04-17 21:13:57', 'Admin admin', '2022-04-17 21:13:57', '1'),
(448, '', 'App\\Http\\Controllers\\KeyboardItemController', 'store', 'Admin admin', '2022-04-17 21:13:57', 'Admin admin', '2022-04-17 21:13:57', '1'),
(449, '', 'App\\Http\\Controllers\\KeyboardItemController', 'show', 'Admin admin', '2022-04-17 21:13:57', 'Admin admin', '2022-04-17 21:13:57', '1'),
(450, '', 'App\\Http\\Controllers\\KeyboardItemController', 'edit', 'Admin admin', '2022-04-17 21:13:57', 'Admin admin', '2022-04-17 21:13:57', '1'),
(451, '', 'App\\Http\\Controllers\\KeyboardItemController', 'update', 'Admin admin', '2022-04-17 21:13:57', 'Admin admin', '2022-04-17 21:13:57', '1'),
(452, '', 'App\\Http\\Controllers\\KeyboardItemController', 'destroy', 'Admin admin', '2022-04-17 21:13:58', 'Admin admin', '2022-04-17 21:13:58', '1'),
(453, '', 'App\\Http\\Controllers\\AdvertisementController', 'index', 'Admin admin', '2022-04-17 21:13:58', 'Admin admin', '2022-04-17 21:13:58', '1'),
(454, '', 'App\\Http\\Controllers\\AdvertisementController', 'create', 'Admin admin', '2022-04-17 21:13:58', 'Admin admin', '2022-04-17 21:13:58', '1'),
(455, '', 'App\\Http\\Controllers\\AdvertisementController', 'store', 'Admin admin', '2022-04-17 21:13:58', 'Admin admin', '2022-04-17 21:13:58', '1'),
(456, '', 'App\\Http\\Controllers\\AdvertisementController', 'show', 'Admin admin', '2022-04-17 21:13:58', 'Admin admin', '2022-04-17 21:13:58', '1'),
(457, '', 'App\\Http\\Controllers\\AdvertisementController', 'edit', 'Admin admin', '2022-04-17 21:13:58', 'Admin admin', '2022-04-17 21:13:58', '1'),
(458, '', 'App\\Http\\Controllers\\AdvertisementController', 'update', 'Admin admin', '2022-04-17 21:13:58', 'Admin admin', '2022-04-17 21:13:58', '1'),
(459, '', 'App\\Http\\Controllers\\AdvertisementController', 'destroy', 'Admin admin', '2022-04-17 21:13:58', 'Admin admin', '2022-04-17 21:13:58', '1'),
(460, '', 'App\\Http\\Controllers\\KeyboardController', 'getSubDepartment', 'Admin admin', '2022-04-17 21:13:59', 'Admin admin', '2022-04-17 21:13:59', '1'),
(461, '', 'App\\Http\\Controllers\\ItemController', 'search', 'Admin admin', '2022-04-17 21:13:59', 'Admin admin', '2022-04-17 21:13:59', '1'),
(462, '', 'App\\Http\\Controllers\\VoucherController', 'search', 'Admin admin', '2022-04-17 21:13:59', 'Admin admin', '2022-04-17 21:13:59', '1');

-- --------------------------------------------------------

--
-- Table structure for table `plu_type`
--

CREATE TABLE `plu_type` (
  `plu_type_id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price_level`
--

CREATE TABLE `price_level` (
  `price_level_id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` date DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price_level`
--

INSERT INTO `price_level` (`price_level_id`, `description`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(2, 'Normal Price', 'Admin admin', '2022-07-18', 'Admin admin', '2022-07-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `price_level_location`
--

CREATE TABLE `price_level_location` (
  `price_level_location_id` int(11) NOT NULL,
  `price_level_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` date DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `printer`
--

CREATE TABLE `printer` (
  `printer_id` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `printer_group_id` int(11) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printer`
--

INSERT INTO `printer` (`printer_id`, `description`, `printer_group_id`, `path`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`, `record_status`) VALUES
(1, 'Food', 1, '192.168.1.97:9100', '2022-07-31 10:58:13', 'Admin admin', '2022-09-05 09:35:30', 'Admin admin', 1),
(2, 'Food', 2, '192.168.1.97:9100', '2022-07-31 10:59:29', 'Admin admin', '2022-08-30 10:26:26', 'Admin admin', 1),
(3, 'Food', 3, '192.168.1.97:9100', '2022-07-31 10:59:45', 'Admin admin', '2022-08-30 10:26:48', 'Admin admin', 1),
(4, 'Food', 4, '192.168.1.97:9100', '2022-07-31 10:59:59', 'Admin admin', '2022-08-30 10:27:08', 'Admin admin', 1),
(5, 'Food', 5, '192.168.1.97:9100', '2022-07-31 11:00:12', 'Admin admin', '2022-08-30 10:27:26', 'Admin admin', 1),
(6, 'Drinks', 6, '192.168.1.97:9100', '2022-07-31 11:00:26', 'Admin admin', '2022-08-30 10:27:45', 'Admin admin', 1),
(7, 'Drinks', 7, '192.168.1.97:9100', '2022-07-31 11:00:43', 'Admin admin', '2022-08-30 10:28:02', 'Admin admin', 1),
(8, 'Drinks', 8, '192.168.1.97:9100', '2022-07-31 11:00:56', 'Admin admin', '2022-08-30 08:39:48', 'Admin admin', 1),
(9, 'Drinks', 9, '192.168.1.97:9100', '2022-07-31 11:01:11', 'Admin admin', '2022-08-30 10:28:33', 'Admin admin', 1),
(10, 'Drinks', 10, '192.168.1.97:9100', '2022-07-31 11:01:42', 'Admin admin', '2022-08-30 10:28:45', 'Admin admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `printer_group`
--

CREATE TABLE `printer_group` (
  `printer_group_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `client_print_order` int(11) DEFAULT 0,
  `type` smallint(6) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printer_group`
--

INSERT INTO `printer_group` (`printer_group_id`, `description`, `client_print_order`, `type`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(1, 'BREAKFAST', 1, 0, 'Admin admin', '2022-07-18 05:53:38', 'Admin admin', '2022-07-18 05:53:38', 1),
(2, 'SANDWICH', 2, 0, 'Admin admin', '2022-07-18 05:53:55', 'Admin admin', '2022-07-18 05:53:55', 1),
(3, 'NIBBLES', 3, 0, 'Admin admin', '2022-07-18 05:54:13', 'Admin admin', '2022-07-18 05:54:13', 1),
(4, 'KIDS', 4, 0, 'Admin admin', '2022-07-18 05:54:27', 'Admin admin', '2022-07-18 05:54:27', 1),
(5, 'SALAD', 5, 0, 'Admin admin', '2022-07-18 05:54:42', 'Admin admin', '2022-07-18 05:54:42', 1),
(6, 'COFFEE', 6, 0, 'Admin admin', '2022-07-18 05:54:54', 'Admin admin', '2022-07-18 05:54:54', 1),
(7, 'COLD COFFEE', 7, 0, 'Admin admin', '2022-07-18 05:55:10', 'Admin admin', '2022-07-18 05:55:10', 1),
(8, 'TEA', 8, 0, 'Admin admin', '2022-07-18 05:55:23', 'Admin admin', '2022-07-18 05:55:23', 1),
(9, 'COLD DRINK', 9, 0, 'Admin admin', '2022-07-18 05:55:42', 'Admin admin', '2022-07-18 05:55:42', 1),
(10, 'SOFT DRINK', 10, 0, 'Admin admin', '2022-07-18 05:55:58', 'Admin admin', '2022-07-18 05:55:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `barcode`, `price`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Subway\'s crab meat', 'Subway\'s crab meat', 'products/i2muHpCHNu56wcOwuQ6Hy2sVDgxampcWSlGjKRNk.webp', 'FSDFSD324WRE', '23.00', -9, 1, '2021-07-27 11:06:20', '2021-07-27 11:34:05'),
(2, 'McDonald\'s McRib', 'McDonald\'s McRib', 'products/3pTsWcmLq0b0ElapL2K21tqHYll1BUqe5HsRCzc8.webp', 'SDSAW21WEQ', '21.00', -12, 1, '2021-07-27 11:07:02', '2021-07-27 11:34:05'),
(3, 'Test Product', 'Test Product', 'products/uES6GPhbLHbVKXOCL9vETCPG1Me5bf4vAObach6y.png', 'DQWE213', '12.00', 1, 1, '2021-07-30 21:22:49', '2021-07-31 08:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT '',
  `display_seq` int(11) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` timestamp NULL DEFAULT NULL,
  `record_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `description`, `display_seq`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(1, 'Cashier', 'Cashier', 1, 'Admin', NULL, '9999', '2021-04-20 07:29:04', '1'),
(2, 'Admin', 'Admin', 2, 'Admin', NULL, NULL, NULL, '1'),
(3, 'Supervisor', 'Supervisor', 3, 'Admin', NULL, '9999', '2021-04-20 07:28:20', '1'),
(4, 'Manager', 'Manager', 4, 'Admin', NULL, '9999', '2021-04-20 07:27:35', '1');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `role_permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` timestamp NULL DEFAULT NULL,
  `record_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'POS Admin Panel', '2021-07-27 08:40:23', '2021-08-16 12:26:12'),
(2, 'currency_symbol', '$', '2021-07-27 08:40:23', '2021-07-27 08:40:23'),
(3, 'app_description', NULL, '2021-08-16 12:25:55', '2021-08-16 12:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `vender_id` varchar(45) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `suburb` varchar(100) DEFAULT NULL,
  `post_code` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `supply_of` varchar(45) DEFAULT NULL,
  `supplier_group` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `account_type` int(11) DEFAULT NULL,
  `terms` int(11) DEFAULT NULL,
  `price_num` int(11) DEFAULT NULL,
  `calculat_tax` tinyint(1) DEFAULT NULL,
  `add_tax` tinyint(1) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `vender_id`, `address`, `suburb`, `post_code`, `contact`, `phone`, `fax`, `supply_of`, `supplier_group`, `email`, `discount`, `account_type`, `terms`, `price_num`, `calculat_tax`, `add_tax`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(1, '1-Cash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `tax_id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `rate` double NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`tax_id`, `description`, `rate`, `created_by`, `created_date`, `last_modified_date`, `last_modified_by`, `record_status`) VALUES
(1, 'GST', 10, 'Admin admin', '2022-07-18 06:07:41', '2022-07-18 06:07:41', 'Admin admin', 1),
(2, 'No GST', 0, 'Admin admin', '2022-07-18 06:08:15', '2022-07-18 06:08:15', 'Admin admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE `terminal` (
  `terminal_id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `location_id` int(11) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL,
  `has_updates` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terminal`
--

INSERT INTO `terminal` (`terminal_id`, `description`, `location_id`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`, `has_updates`) VALUES
(1, 'Cafe Red', 1, 'Admin admin', '2022-07-18 06:51:58', 'Admin admin', '2022-07-18 06:51:58', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terminal_option`
--

CREATE TABLE `terminal_option` (
  `terminal_option_id` int(11) NOT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `terminal_option_detail_id` int(11) NOT NULL,
  `terminal_value` varchar(100) DEFAULT NULL,
  `terminal_purpose` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT '',
  `created_date` datetime DEFAULT '2021-09-15 00:00:00',
  `last_modified_by` varchar(45) DEFAULT '',
  `last_modified_date` datetime DEFAULT '2021-09-15 00:00:00',
  `record_status` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terminal_option`
--

INSERT INTO `terminal_option` (`terminal_option_id`, `terminal_id`, `terminal_option_detail_id`, `terminal_value`, `terminal_purpose`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(1, 1, 1, 'N', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(2, 1, 2, 'N', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(3, 1, 3, 'Y', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(4, 1, 4, '2', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(5, 1, 5, 'Y', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(6, 1, 6, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(7, 1, 7, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(8, 1, 8, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(9, 1, 9, '1', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(10, 1, 10, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(11, 1, 11, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(12, 1, 12, 'N', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(13, 1, 13, '1500', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(14, 1, 14, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(15, 1, 15, 'Y', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(16, 1, 16, 'Y', 'Gateway Timeout', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(17, 1, 17, 'Y', 'Promotion', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(18, 1, 18, 'N', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(19, 1, 19, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(20, 1, 20, 'N', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(21, 1, 21, 'N', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(22, 1, 22, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(23, 1, 23, 'N', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(24, 1, 24, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(25, 1, 25, 'N', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(26, 1, 26, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(27, 1, 27, '0', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(28, 1, 28, '1', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(29, 1, 29, '0', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(30, 1, 30, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(31, 1, 31, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(32, 1, 32, 'N', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(33, 1, 33, 'N', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(34, 1, 34, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(35, 1, 35, 'N', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(36, 1, 36, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(37, 1, 37, 'Y', '', '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(38, 1, 38, NULL, NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(39, 1, 39, 'Y', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(40, 1, 40, '15', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(41, 1, 41, 'Y', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(42, 1, 42, 'OFFLINE', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(43, 1, 43, 'N', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(44, 1, 44, 'N', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(45, 1, 45, 'N', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(46, 1, 46, 'Y', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(47, 1, 47, '10 20 30 100', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1),
(48, 1, 48, 'N', NULL, '', '2021-09-15 00:00:00', '', '2022-11-05 02:47:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `terminal_option_detail`
--

CREATE TABLE `terminal_option_detail` (
  `terminal_option_detail_id` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT 0,
  `terminal_purpose` varchar(1000) NOT NULL,
  `created_by` varchar(45) DEFAULT '',
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT '',
  `last_modified_date` datetime DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terminal_option_detail`
--

INSERT INTO `terminal_option_detail` (`terminal_option_detail_id`, `description`, `type`, `terminal_purpose`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(1, 'CASHTRACKER', 0, 'Y= Cash tracker is enabled. N=Disabled', 'Admin admin', '2022-04-12 06:31:01', 'Admin admin', '2022-04-21 04:27:20', 1),
(2, 'COMPULSION', 0, 'Y=Sign Off after every sale. N=Same staff for all the sales', 'Admin admin', '2022-04-12 06:31:28', 'Admin admin', '2022-04-21 04:27:20', 1),
(3, 'ENABLEVOID', 0, 'Y=items can be voided before transaction is finalised. N=Cannot void any items', 'Admin admin', '2022-04-12 06:31:38', 'Admin admin', '2022-04-21 04:27:20', 1),
(4, 'PRICELEVEL', 4, 'Current Price Level for this till', 'Admin admin', '2022-04-12 06:31:50', 'Admin admin', '2022-04-21 04:27:20', 1),
(5, 'PRICELEVELSTAY', 0, 'Y=Price level to stay in same level until it is changed manually. N=after one transaction it goes back to the default price level', 'Admin admin', '2022-04-12 06:32:03', 'Admin admin', '2022-04-21 04:27:20', 1),
(6, 'PRICESHIFT', 0, '', 'Admin admin', '2022-04-12 06:32:14', 'Admin admin', '2022-04-21 04:27:20', 1),
(7, 'CHANGEPRICELEVEL', 0, 'Y=Lets you change price level. N=Cannot change price level', 'Admin admin', '2022-04-12 06:32:25', 'Admin admin', '2022-04-21 04:27:21', 1),
(8, 'PRICECHGPASSWORD', 0, 'Y= when selecting the price level, it will ask for a password. N= when selecting the price level, it will not ask for a password.', 'Admin admin', '2022-04-12 06:32:35', 'Admin admin', '2022-04-21 04:27:21', 1),
(9, 'KEYBOARD', 2, 'Current keyboard layout name for this till', 'Admin admin', '2022-04-12 06:32:44', 'Admin admin', '2022-04-21 04:27:21', 1),
(10, 'TABLETRACKER', 0, 'Y=Table tracker enabled. N=Disabled', 'Admin admin', '2022-04-12 06:32:55', 'Admin admin', '2022-04-21 04:27:21', 1),
(11, 'TTDEFAULT', 0, 'Y=Table tracker opens up by default. N=goes to sale mode', 'Admin admin', '2022-04-12 06:33:09', 'Admin admin', '2022-04-21 04:27:21', 1),
(12, 'STANDNO', 0, 'Y=Stand no. screen for Bistro environment. N=Sale mode', 'Admin admin', '2022-04-12 06:33:19', 'Admin admin', '2022-04-21 04:27:21', 1),
(13, 'GATEWAYTIMEOUT', 1, 'Time before the system gives an error after not finding the member. This is in ms', 'Admin admin', '2022-04-12 06:33:28', 'Admin admin', '2022-04-21 04:27:21', 1),
(14, 'PROMOTION', 0, 'Y=Promotions enabled. N=Disabled', 'Admin admin', '2022-04-12 06:33:37', 'Admin admin', '2022-04-21 04:27:21', 1),
(15, 'PAYWITHORDER', 0, 'Y=Pays with the order like in Bistro style. N=restaurant mode', 'Admin admin', '2022-04-12 06:33:46', 'Admin admin', '2022-04-21 04:27:21', 1),
(16, 'PAYMODEVOUCHER', 0, 'Y=Voucher tab is enabled in pay mode. N=Disabled', 'Admin admin', '2022-04-12 06:33:54', 'Admin admin', '2022-04-21 04:27:21', 1),
(17, 'PAYMODECASH', 0, 'Y=Cash tab is enabled in pay mode. N=Disabled', 'Admin admin', '2022-04-12 06:34:03', 'Admin admin', '2022-04-21 04:27:21', 1),
(18, 'PAYMODEPOINT', 0, 'Y=Points tab is enabled in pay mode. N=Disabled', 'Admin admin', '2022-04-12 06:34:13', 'Admin admin', '2022-04-21 04:27:22', 1),
(19, 'PAYMODEEFTPOS', 0, 'Y=Eftpos tab is enabled in pay mode. N=Disabled', 'Admin admin', '2022-04-12 06:34:56', 'Admin admin', '2022-04-21 04:27:22', 1),
(20, 'PAYMODEDRYTILL', 0, 'Y=Drytill tab is enabled in pay mode. N=Disabled', 'Admin admin', '2022-04-12 06:35:05', 'Admin admin', '2022-04-21 04:27:22', 1),
(21, 'PAYMODECHEQUE', 0, 'Y=Cheque tab is enabled in pay mode. N=Disabled', 'Admin admin', '2022-04-12 06:35:13', 'Admin admin', '2022-04-21 04:27:22', 1),
(22, 'GTOTALROUND', 0, 'Y=Grand Total amount is rounded to the nearest 5 cents. N=Not rounded', 'Admin admin', '2022-04-12 06:35:24', 'Admin admin', '2022-04-21 04:27:22', 1),
(23, 'AUTORECEIPT', 0, 'Y=Receipt to print out automatically after finalising sale. N=Receipt will not print automatically', 'Admin admin', '2022-04-12 06:35:33', 'Admin admin', '2022-04-21 04:27:22', 1),
(24, 'AUTOPRINTEFTPOS', 0, 'Y=Receipt will print automatically when eftpos payment type is being used for a partial or full amount. N=it will not print automatically. Note if autoreceipt is Y then this option will be ignored.', 'Admin admin', '2022-04-12 06:35:44', 'Admin admin', '2022-04-21 04:27:22', 1),
(25, 'DTILLRECEIPT', 0, 'Y=Automatically prints receipt after every transaction for dry till. N=does not print automatically for dry till', 'Admin admin', '2022-04-12 06:35:52', 'Admin admin', '2022-04-21 04:27:22', 1),
(26, 'DTILLSETRECEIPT', 0, 'Y=Automatically prints bill total. N=does not print automatically for dry till', 'Admin admin', '2022-04-12 06:36:01', 'Admin admin', '2022-04-21 04:27:22', 1),
(27, 'CASHRECEIPTS', 1, 'No. of cash receipts when auto printing', 'Admin admin', '2022-04-12 06:36:10', 'Admin admin', '2022-04-21 04:27:22', 1),
(28, 'EFTPOSRECEIPTS', 1, 'No. of eftpos receipts when auto printing', 'Admin admin', '2022-04-12 06:36:20', 'Admin admin', '2022-04-21 04:27:23', 1),
(29, 'VOUCHERRECEIPTS', 1, 'No. of voucher receipts when auto printing', 'Admin admin', '2022-04-12 06:36:30', 'Admin admin', '2022-04-21 04:27:23', 1),
(30, 'ENABLEMODIFIER', 0, 'Y=modifiers are enabled for this till. N=modifiers are disabled for this till', 'Admin admin', '2022-04-12 06:36:40', 'Admin admin', '2022-04-21 04:27:23', 1),
(31, 'PROMPTMODIFIERS', 0, 'Y=if there are modifiers attached to the item, automatically the modifier to pop up. N=even if modifiers are attached to the item, modifier will not pop up automatically', 'Admin admin', '2022-04-12 06:36:48', 'Admin admin', '2022-04-21 04:27:23', 1),
(32, 'DRYTILL', 0, 'Y= Dry Till menu button is enabled. N=disabled', 'Admin admin', '2022-04-12 06:36:55', 'Admin admin', '2022-04-21 04:27:23', 1),
(33, 'ENABLEMEMBERBTN', 0, 'Y= Enable Member No. button on menu, N=Disabled', 'Admin admin', '2022-04-12 06:37:04', 'Admin admin', '2022-04-21 04:27:23', 1),
(34, 'CONSOLIDATION', 0, 'Y=Consolidates same items together. N=leaves the items in separate lines', 'Admin admin', '2022-04-12 06:37:17', 'Admin admin', '2022-04-21 04:27:23', 1),
(35, 'KPCONSOLIDATION', 0, 'Y=Consolidates kitchen print items together, as long as modifiers are selected. N=leaves the items in separate lines', 'Admin admin', '2022-04-12 06:37:27', 'Admin admin', '2022-04-21 04:27:23', 1),
(36, 'REFUNDPASSWORD', 0, 'Y=password is required to void. N=voids can be performed without a password', 'Admin admin', '2022-04-12 07:16:41', 'Admin admin', '2022-04-21 04:27:23', 1),
(37, 'EXITPASSWORD', 0, 'Y=password is required to exit the POS. N=exit can be performed without a password', 'Admin admin', '2022-04-12 07:16:51', 'Admin admin', '2022-04-21 04:27:23', 1),
(38, 'SITEID', 1, 'First 5 digits of card. Eg ;372=087654?, in multiple site id\'s use a comma eg 372=0, 372=1, 372=2', 'Admin admin', '2022-04-12 07:17:01', 'Admin admin', '2022-04-21 04:27:24', 1),
(39, 'HOURLYSALESINZ', 0, 'Y=Hourly sales to be printed in x and z report. N=Does not print hourly report', 'Admin admin', '2022-04-12 07:17:11', 'Admin admin', '2022-04-21 04:27:24', 1),
(40, 'HOURLYSALESINT', 3, 'Time interval of sales to be displayed in x & z report. Eg every 15, 30, 45 and 60 mins', 'Admin admin', '2022-04-12 07:17:23', 'Admin admin', '2022-04-21 04:27:24', 1),
(41, 'PLUSALESINZ', 0, 'Y=No. of each items sold to be printed in x & z report. N=Does not print PLU summary', 'Admin admin', '2022-04-12 07:17:34', 'Admin admin', '2022-04-21 04:27:24', 1),
(42, 'EFTPOSTYPE', 5, 'DISABLE=No Eftpos, OFFLINE=eftpos button works as offline, LINKLY integrated, TYRO integrated, SQUARE integrated', 'Admin admin', '2022-04-12 07:17:44', 'Admin admin', '2022-04-21 04:27:24', 1),
(43, 'USERFID', 0, 'Y=enables RFID wrist band. N=not using RFID', 'Admin admin', '2022-04-12 07:17:56', 'Admin admin', '2022-04-21 04:27:24', 1),
(44, 'HOLDSALE', 0, 'Y=enable holdasle, N=disable holdsale', 'Admin admin', '2022-04-12 07:18:36', 'Admin admin', '2022-04-21 04:27:24', 1),
(45, 'ACCOUNTDISCOUNT', 0, 'Y=account discounts given. N=no discounts given', 'Admin admin', '2022-04-12 07:18:45', 'Admin admin', '2022-04-21 04:27:24', 1),
(46, 'DISCOUNT', 0, 'Y=Discount button enabled. N=no discount button', 'Admin admin', '2022-04-12 07:18:57', 'Admin admin', '2022-04-21 04:27:24', 1),
(47, 'DISCOUNTAMOUNT', 1, 'Actual Discount Amount for Sub Total', 'Admin admin', '2022-04-12 07:18:57', 'Admin admin', '2022-04-21 04:27:24', 1),
(48, 'PRINTONHOLD', 0, 'Y=Prints to KP when hold button is pressed. N=does not print to KP when hold is pressed', 'Admin admin', '2022-04-12 07:18:57', 'Admin admin', '2022-04-21 04:27:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `till_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `recode_status` smallint(6) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `discount` decimal(3,2) DEFAULT NULL,
  `net_amount` decimal(10,2) DEFAULT NULL,
  `price_level_id` int(11) DEFAULT NULL,
  `receipt_print_count` int(11) DEFAULT 0,
  `reciept_balance` decimal(10,2) DEFAULT 0.00,
  `refund_id` int(11) DEFAULT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `member_no` varchar(45) DEFAULT NULL,
  `stand_no` int(11) DEFAULT NULL,
  `cover` int(11) DEFAULT NULL,
  `tire` varchar(45) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `till_id`, `total_amount`, `recode_status`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `discount`, `net_amount`, `price_level_id`, `receipt_print_count`, `reciept_balance`, `refund_id`, `member_name`, `member_no`, `stand_no`, `cover`, `tire`, `discount_amount`, `member_id`) VALUES
(1, 1, '7.50', NULL, NULL, '2022-09-29 07:54:46', NULL, '2022-09-29 07:54:46', NULL, '7.50', NULL, 0, '12.50', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(2, 1, '10.50', NULL, NULL, '2022-09-29 07:54:46', NULL, '2022-09-29 07:54:46', NULL, '10.50', NULL, 0, '39.50', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(3, 1, '4.00', NULL, NULL, '2022-09-29 07:54:46', NULL, '2022-09-29 07:54:46', NULL, '4.00', NULL, 0, '46.00', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(4, 1, '64.50', NULL, NULL, '2022-09-29 07:54:46', NULL, '2022-09-29 07:54:46', NULL, '64.50', NULL, 0, '35.50', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(5, 1, '3.50', NULL, NULL, '2022-09-29 07:54:46', NULL, '2022-09-29 07:54:46', NULL, '3.50', NULL, 0, '16.50', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(6, 1, '4.00', NULL, NULL, '2022-09-29 07:54:46', NULL, '2022-09-29 07:54:46', NULL, '4.00', NULL, 0, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(7, 1, '22.00', NULL, NULL, '2022-09-29 07:56:05', NULL, '2022-09-29 07:56:05', NULL, '22.00', NULL, 0, '-2.00', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(8, 1, '22.00', NULL, NULL, '2022-09-29 07:56:05', NULL, '2022-09-29 07:56:05', NULL, '22.00', NULL, 0, '28.00', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(9, 1, '88.00', NULL, NULL, '2022-10-15 12:23:43', NULL, '2022-10-15 12:23:43', NULL, '88.00', NULL, 0, '12.00', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(10, 1, '18.50', NULL, NULL, '2022-10-15 12:23:43', NULL, '2022-10-15 12:23:43', NULL, '18.50', NULL, 0, '31.50', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(11, 1, '18.00', NULL, NULL, '2022-10-15 12:23:43', NULL, '2022-10-15 12:23:43', NULL, '18.00', NULL, 0, '2.00', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(12, 1, '18.00', NULL, NULL, '2022-11-06 02:15:34', NULL, '2022-11-06 02:15:34', NULL, '18.00', NULL, 0, '2.00', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(13, 1, '37.50', NULL, NULL, '2022-11-06 02:15:34', NULL, '2022-11-06 02:15:34', NULL, '37.50', NULL, 0, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `transaction_detail_id` int(11) NOT NULL,
  `till_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_price` double DEFAULT NULL,
  `recode_status` smallint(6) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT 0,
  `mem_item_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`transaction_detail_id`, `till_id`, `transaction_id`, `item_id`, `item_price`, `recode_status`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `qty`, `mem_item_price`) VALUES
(26, 1, 1, 14, 3.5, NULL, NULL, '2022-09-29 07:54:47', NULL, '2022-09-29 07:54:47', 1, NULL),
(27, 1, 1, 15, 4, NULL, NULL, '2022-09-29 07:54:47', NULL, '2022-09-29 07:54:47', 1, NULL),
(28, 1, 2, 22, 7, NULL, NULL, '2022-09-29 07:54:47', NULL, '2022-09-29 07:54:47', 1, NULL),
(29, 1, 2, 25, 3.5, NULL, NULL, '2022-09-29 07:54:47', NULL, '2022-09-29 07:54:47', 1, NULL),
(30, 1, 3, 19, 4, NULL, NULL, '2022-09-29 07:54:47', NULL, '2022-09-29 07:54:47', 1, NULL),
(31, 1, 4, 3, 23, NULL, NULL, '2022-09-29 07:54:47', NULL, '2022-09-29 07:54:47', 1, NULL),
(32, 1, 4, 5, 19.5, NULL, NULL, '2022-09-29 07:54:47', NULL, '2022-09-29 07:54:47', 1, NULL),
(33, 1, 4, 1, 22, NULL, NULL, '2022-09-29 07:54:47', NULL, '2022-09-29 07:54:47', 1, NULL),
(34, 1, 5, 14, 3.5, NULL, NULL, '2022-09-29 07:54:47', NULL, '2022-09-29 07:54:47', 1, NULL),
(35, 1, 6, 19, 4, NULL, NULL, '2022-09-29 07:54:47', NULL, '2022-09-29 07:54:47', 1, NULL),
(36, 1, 7, 1, 22, NULL, NULL, '2022-09-29 07:56:05', NULL, '2022-09-29 07:56:05', 1, NULL),
(37, 1, 8, 1, 22, NULL, NULL, '2022-09-29 07:56:05', NULL, '2022-09-29 07:56:05', 1, NULL),
(38, 1, 9, 1, 22, NULL, NULL, '2022-10-15 12:23:43', NULL, '2022-10-15 12:23:43', 1, NULL),
(39, 1, 9, 1, 22, NULL, NULL, '2022-10-15 12:23:43', NULL, '2022-10-15 12:23:43', 1, NULL),
(40, 1, 9, 1, 22, NULL, NULL, '2022-10-15 12:23:43', NULL, '2022-10-15 12:23:43', 1, NULL),
(41, 1, 9, 1, 22, NULL, NULL, '2022-10-15 12:23:43', NULL, '2022-10-15 12:23:43', 1, NULL),
(42, 1, 10, 8, 18.5, NULL, NULL, '2022-10-15 12:23:43', NULL, '2022-10-15 12:23:43', 1, NULL),
(43, 1, 11, 15, 4, NULL, NULL, '2022-10-15 12:23:43', NULL, '2022-10-15 12:23:43', 1, NULL),
(44, 1, 11, 73, 14, NULL, NULL, '2022-10-15 12:23:43', NULL, '2022-10-15 12:23:43', 1, NULL),
(45, 1, 0, 14, 3.5, NULL, NULL, '2022-11-01 02:38:19', NULL, '2022-11-01 02:38:19', 1, NULL),
(46, 1, 0, 15, 4, NULL, NULL, '2022-11-01 02:38:19', NULL, '2022-11-01 02:38:19', 1, NULL),
(47, 1, 0, 16, 3.5, NULL, NULL, '2022-11-01 02:38:19', NULL, '2022-11-01 02:38:19', 1, NULL),
(48, 1, 0, 19, 4, NULL, NULL, '2022-11-01 02:38:19', NULL, '2022-11-01 02:38:19', 1, NULL),
(49, 1, 0, 20, 4, NULL, NULL, '2022-11-01 02:38:19', NULL, '2022-11-01 02:38:19', 1, NULL),
(50, 1, 0, 22, 7, NULL, NULL, '2022-11-01 02:38:19', NULL, '2022-11-01 02:38:19', 1, NULL),
(51, 1, 0, 21, 2, NULL, NULL, '2022-11-01 02:38:19', NULL, '2022-11-01 02:38:19', 1, NULL),
(52, 1, 12, 9, 18, NULL, NULL, '2022-11-06 02:15:35', NULL, '2022-11-06 02:15:35', 1, NULL),
(53, 1, 13, 7, 19, NULL, NULL, '2022-11-06 02:15:35', NULL, '2022-11-06 02:15:35', 1, NULL),
(54, 1, 13, 6, 18.5, NULL, NULL, '2022-11-06 02:15:35', NULL, '2022-11-06 02:15:35', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_item_modifier`
--

CREATE TABLE `transaction_item_modifier` (
  `transaction_item_modifier_id` int(11) NOT NULL,
  `till_id` int(11) NOT NULL,
  `transaction_detail_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `modifier_id` int(11) DEFAULT NULL,
  `recode_status` smallint(6) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_payment_detail`
--

CREATE TABLE `transaction_payment_detail` (
  `transaction_payment_detail_id` int(11) NOT NULL,
  `till_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_payment_detail`
--

INSERT INTO `transaction_payment_detail` (`transaction_payment_detail_id`, `till_id`, `transaction_id`, `payment_type`, `amount`, `created_by`, `created_date`, `last_modified_date`, `last_modified_by`) VALUES
(18, 1, 1, 'cash', '20.00', NULL, '2022-09-29 07:54:46', '2022-09-29 07:54:46', NULL),
(19, 1, 2, 'cash', '50.00', NULL, '2022-09-29 07:54:46', '2022-09-29 07:54:46', NULL),
(20, 1, 3, 'cash', '50.00', NULL, '2022-09-29 07:54:46', '2022-09-29 07:54:46', NULL),
(21, 1, 4, 'cash', '100.00', NULL, '2022-09-29 07:54:46', '2022-09-29 07:54:46', NULL),
(22, 1, 5, 'cash', '20.00', NULL, '2022-09-29 07:54:46', '2022-09-29 07:54:46', NULL),
(23, 1, 6, 'cash', '4.00', NULL, '2022-09-29 07:54:46', '2022-09-29 07:54:46', NULL),
(24, 1, 7, 'cash', '20.00', NULL, '2022-09-29 07:56:05', '2022-09-29 07:56:05', NULL),
(25, 1, 8, 'cash', '50.00', NULL, '2022-09-29 07:56:05', '2022-09-29 07:56:05', NULL),
(26, 1, 11, 'cash', '20.00', NULL, '2022-10-15 12:23:43', '2022-10-15 12:23:43', NULL),
(27, 1, 10, 'cash', '50.00', NULL, '2022-10-15 12:23:43', '2022-10-15 12:23:43', NULL),
(28, 1, 9, 'cash', '100.00', NULL, '2022-10-15 12:23:43', '2022-10-15 12:23:43', NULL),
(29, 1, 13, 'cash', '37.50', NULL, '2022-11-06 02:15:34', '2022-11-06 02:15:34', NULL),
(30, 1, 12, 'cash', '20.00', NULL, '2022-11-06 02:15:34', '2022-11-06 02:15:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_payment_type_detail`
--

CREATE TABLE `transaction_payment_type_detail` (
  `transaction_payment_type_detail_id` int(11) NOT NULL,
  `transaction_payment_detail_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `till_id` int(11) NOT NULL,
  `ref_no` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `voucher_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_table_detail`
--

CREATE TABLE `transaction_table_detail` (
  `table_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `description`, `created_by`, `created_date`, `last_modified_by`, `last_modified_date`, `record_status`) VALUES
(1, 'Each', 'Admin admin', '2022-07-18 09:04:59', 'Admin admin', '2022-07-18 09:04:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `card_password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `employee_number`, `branch_id`, `role_id`, `card_password`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$L9Zd73/ZJUaw7QVOwpJgMueCjbHpNtMjDkwa.FIwDhFCsq.fD4XZ.', 'fdwXuI1YU2Q321nU3qd2O6EgHurZfYhy4cFrGL8u1HOlmCnhuWtMYtyXJPLP', '2021-07-27 08:41:13', '2022-06-27 01:06:20', '9100', 1, 2, '123445567');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `voucher_type_id` int(11) DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL,
  `print_receipt` smallint(6) DEFAULT NULL,
  `unlimited` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_terminal`
--

CREATE TABLE `voucher_terminal` (
  `voucher_terminal_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `terminal_id` int(11) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_type`
--

CREATE TABLE `voucher_type` (
  `voucher_type_id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL DEFAULT '',
  `created_by` varchar(45) DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `record_status` smallint(6) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voucher_type`
--

INSERT INTO `voucher_type` (`voucher_type_id`, `description`, `created_by`, `last_modified_by`, `record_status`, `created_date`, `last_modified_date`) VALUES
(1, 'Amount', 'Admin admin', 'Admin admin', 1, '2022-07-18 06:30:42', '2022-07-18 06:30:42'),
(2, 'Partial Free', 'Admin admin', 'Admin admin', 1, '2022-07-18 06:30:50', '2022-07-18 06:30:50'),
(3, 'Full Free', 'Admin admin', 'Admin admin', 1, '2022-07-18 06:31:22', '2022-07-18 06:31:22'),
(4, 'Percentage Server', 'Admin admin', 'Admin admin', 1, '2022-07-18 06:31:38', '2022-07-18 06:31:38'),
(5, 'Percentage Client', 'Admin admin', 'Admin admin', 1, '2022-07-18 06:31:52', '2022-07-18 06:31:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertisement_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`),
  ADD UNIQUE KEY `display_seq_UNIQUE` (`display_seq`),
  ADD KEY `fkclient_idx` (`company_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `fk18` (`parent_department_id`);

--
-- Indexes for table `department_two`
--
ALTER TABLE `department_two`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk12` (`supplier_id`),
  ADD KEY `fk13` (`unit_id`),
  ADD KEY `fk14` (`department_id`),
  ADD KEY `fk16` (`plu_type_id`),
  ADD KEY `fk17` (`tax_id`),
  ADD KEY `fk111_idx` (`parent_item_id`);

--
-- Indexes for table `item_modifiers_category`
--
ALTER TABLE `item_modifiers_category`
  ADD PRIMARY KEY (`item_modifiers_category_id`),
  ADD KEY `fk10` (`item_id`),
  ADD KEY `fk11` (`modifiers_category_id`),
  ADD KEY `fk11_idx` (`modifiers_category_id`);

--
-- Indexes for table `item_price_level_location`
--
ALTER TABLE `item_price_level_location`
  ADD PRIMARY KEY (`item_price_level_location_id`),
  ADD KEY `fk33` (`item_id`),
  ADD KEY `fk32` (`location_id`,`price_level_id`),
  ADD KEY `fkpl` (`price_level_id`),
  ADD KEY `fkpll_idx` (`location_id`);

--
-- Indexes for table `item_printer`
--
ALTER TABLE `item_printer`
  ADD PRIMARY KEY (`item_printer_id`),
  ADD KEY `fk101` (`item_id`),
  ADD KEY `fk102` (`printer_id`),
  ADD KEY `fk102_idx` (`printer_id`);

--
-- Indexes for table `keyboard`
--
ALTER TABLE `keyboard`
  ADD PRIMARY KEY (`keyboard_id`);

--
-- Indexes for table `keyboard_department`
--
ALTER TABLE `keyboard_department`
  ADD PRIMARY KEY (`keyboard_department_id`),
  ADD KEY `ffk2` (`keyboard_id`);

--
-- Indexes for table `keyboard_item`
--
ALTER TABLE `keyboard_item`
  ADD PRIMARY KEY (`keyboard_item_id`),
  ADD KEY `fk51` (`item_id`),
  ADD KEY `ffk3` (`keyboard_sub_depatment_id`);

--
-- Indexes for table `keyboard_sub_department`
--
ALTER TABLE `keyboard_sub_department`
  ADD PRIMARY KEY (`keyboard_sub_department_id`),
  ADD KEY `fk41` (`keyboard_department_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD UNIQUE KEY `location_name_UNIQUE` (`location_name`);

--
-- Indexes for table `location_table_details`
--
ALTER TABLE `location_table_details`
  ADD PRIMARY KEY (`location_table_detail_id`),
  ADD KEY `fkltd` (`location_id`),
  ADD KEY `fktl` (`location_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modifier`
--
ALTER TABLE `modifier`
  ADD PRIMARY KEY (`modifier_id`),
  ADD KEY `fk9` (`modifiers_category_id`);

--
-- Indexes for table `modifiers_category`
--
ALTER TABLE `modifiers_category`
  ADD PRIMARY KEY (`modifiers_category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `plu_type`
--
ALTER TABLE `plu_type`
  ADD PRIMARY KEY (`plu_type_id`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indexes for table `price_level`
--
ALTER TABLE `price_level`
  ADD PRIMARY KEY (`price_level_id`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indexes for table `price_level_location`
--
ALTER TABLE `price_level_location`
  ADD PRIMARY KEY (`price_level_location_id`),
  ADD KEY `fk37` (`location_id`),
  ADD KEY `fk38` (`price_level_id`);

--
-- Indexes for table `printer`
--
ALTER TABLE `printer`
  ADD PRIMARY KEY (`printer_id`),
  ADD KEY `pgfk_idx` (`printer_group_id`) USING BTREE;

--
-- Indexes for table `printer_group`
--
ALTER TABLE `printer_group`
  ADD PRIMARY KEY (`printer_group_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_barcode_unique` (`barcode`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `dispaly_seq_UNIQUE` (`display_seq`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`role_permission_id`),
  ADD KEY `role_fk_idx` (`role_id`),
  ADD KEY `permission_fk_idx` (`permission_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_id`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indexes for table `terminal`
--
ALTER TABLE `terminal`
  ADD PRIMARY KEY (`terminal_id`),
  ADD KEY `fk39` (`location_id`) USING BTREE;

--
-- Indexes for table `terminal_option`
--
ALTER TABLE `terminal_option`
  ADD PRIMARY KEY (`terminal_option_id`),
  ADD KEY `fk200_idx` (`terminal_option_id`) USING BTREE,
  ADD KEY `fk200_idx1` (`terminal_option_detail_id`) USING BTREE,
  ADD KEY `fk40` (`terminal_id`) USING BTREE;

--
-- Indexes for table `terminal_option_detail`
--
ALTER TABLE `terminal_option_detail`
  ADD PRIMARY KEY (`terminal_option_detail_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`,`till_id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`transaction_detail_id`,`till_id`);

--
-- Indexes for table `transaction_item_modifier`
--
ALTER TABLE `transaction_item_modifier`
  ADD PRIMARY KEY (`transaction_item_modifier_id`,`till_id`);

--
-- Indexes for table `transaction_payment_detail`
--
ALTER TABLE `transaction_payment_detail`
  ADD PRIMARY KEY (`transaction_payment_detail_id`,`till_id`);

--
-- Indexes for table `transaction_payment_type_detail`
--
ALTER TABLE `transaction_payment_type_detail`
  ADD PRIMARY KEY (`transaction_payment_type_detail_id`,`till_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD KEY `user_cart_user_id_foreign` (`user_id`),
  ADD KEY `user_cart_product_id_foreign` (`product_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_id`),
  ADD KEY `FK_Voucher_Type_idx` (`voucher_type_id`);

--
-- Indexes for table `voucher_terminal`
--
ALTER TABLE `voucher_terminal`
  ADD PRIMARY KEY (`voucher_terminal_id`),
  ADD KEY `fkvt_lc_idx` (`terminal_id`),
  ADD KEY `fkvt_v_idx` (`voucher_id`);

--
-- Indexes for table `voucher_type`
--
ALTER TABLE `voucher_type`
  ADD PRIMARY KEY (`voucher_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advertisement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department_two`
--
ALTER TABLE `department_two`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `item_modifiers_category`
--
ALTER TABLE `item_modifiers_category`
  MODIFY `item_modifiers_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `item_price_level_location`
--
ALTER TABLE `item_price_level_location`
  MODIFY `item_price_level_location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `item_printer`
--
ALTER TABLE `item_printer`
  MODIFY `item_printer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `keyboard`
--
ALTER TABLE `keyboard`
  MODIFY `keyboard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keyboard_department`
--
ALTER TABLE `keyboard_department`
  MODIFY `keyboard_department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keyboard_item`
--
ALTER TABLE `keyboard_item`
  MODIFY `keyboard_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `keyboard_sub_department`
--
ALTER TABLE `keyboard_sub_department`
  MODIFY `keyboard_sub_department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_table_details`
--
ALTER TABLE `location_table_details`
  MODIFY `location_table_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `modifier`
--
ALTER TABLE `modifier`
  MODIFY `modifier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `modifiers_category`
--
ALTER TABLE `modifiers_category`
  MODIFY `modifiers_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=463;

--
-- AUTO_INCREMENT for table `plu_type`
--
ALTER TABLE `plu_type`
  MODIFY `plu_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_level`
--
ALTER TABLE `price_level`
  MODIFY `price_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `price_level_location`
--
ALTER TABLE `price_level_location`
  MODIFY `price_level_location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `printer`
--
ALTER TABLE `printer`
  MODIFY `printer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `printer_group`
--
ALTER TABLE `printer_group`
  MODIFY `printer_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `role_permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `terminal`
--
ALTER TABLE `terminal`
  MODIFY `terminal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terminal_option`
--
ALTER TABLE `terminal_option`
  MODIFY `terminal_option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83842;

--
-- AUTO_INCREMENT for table `terminal_option_detail`
--
ALTER TABLE `terminal_option_detail`
  MODIFY `terminal_option_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `transaction_payment_detail`
--
ALTER TABLE `transaction_payment_detail`
  MODIFY `transaction_payment_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaction_payment_type_detail`
--
ALTER TABLE `transaction_payment_type_detail`
  MODIFY `transaction_payment_type_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31449;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `voucher_terminal`
--
ALTER TABLE `voucher_terminal`
  MODIFY `voucher_terminal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1772;

--
-- AUTO_INCREMENT for table `voucher_type`
--
ALTER TABLE `voucher_type`
  MODIFY `voucher_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk18` FOREIGN KEY (`parent_department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk12` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `fk13` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`),
  ADD CONSTRAINT `fk14` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `fk16` FOREIGN KEY (`plu_type_id`) REFERENCES `plu_type` (`plu_type_id`),
  ADD CONSTRAINT `fk17` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`tax_id`);

--
-- Constraints for table `item_modifiers_category`
--
ALTER TABLE `item_modifiers_category`
  ADD CONSTRAINT `fk10` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk11` FOREIGN KEY (`modifiers_category_id`) REFERENCES `modifiers_category` (`modifiers_category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_price_level_location`
--
ALTER TABLE `item_price_level_location`
  ADD CONSTRAINT `fk33` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkpl` FOREIGN KEY (`price_level_id`) REFERENCES `price_level` (`price_level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkpll` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_printer`
--
ALTER TABLE `item_printer`
  ADD CONSTRAINT `fk101` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk102` FOREIGN KEY (`printer_id`) REFERENCES `printer` (`printer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keyboard_department`
--
ALTER TABLE `keyboard_department`
  ADD CONSTRAINT `ffk2` FOREIGN KEY (`keyboard_id`) REFERENCES `keyboard` (`keyboard_id`);

--
-- Constraints for table `keyboard_sub_department`
--
ALTER TABLE `keyboard_sub_department`
  ADD CONSTRAINT `fk41` FOREIGN KEY (`keyboard_department_id`) REFERENCES `keyboard_department` (`keyboard_department_id`);

--
-- Constraints for table `location_table_details`
--
ALTER TABLE `location_table_details`
  ADD CONSTRAINT `location_table_details_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modifier`
--
ALTER TABLE `modifier`
  ADD CONSTRAINT `fk9` FOREIGN KEY (`modifiers_category_id`) REFERENCES `modifiers_category` (`modifiers_category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `price_level_location`
--
ALTER TABLE `price_level_location`
  ADD CONSTRAINT `fk37` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk38` FOREIGN KEY (`price_level_id`) REFERENCES `price_level` (`price_level_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `printer`
--
ALTER TABLE `printer`
  ADD CONSTRAINT `printer_FK` FOREIGN KEY (`printer_group_id`) REFERENCES `printer_group` (`printer_group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `permission_fk` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`permission_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_fk` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `terminal`
--
ALTER TABLE `terminal`
  ADD CONSTRAINT `fk39` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `user_cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `FK_Voucher_Type` FOREIGN KEY (`voucher_type_id`) REFERENCES `voucher_type` (`voucher_type_id`);

--
-- Constraints for table `voucher_terminal`
--
ALTER TABLE `voucher_terminal`
  ADD CONSTRAINT `fkvt_lc` FOREIGN KEY (`terminal_id`) REFERENCES `terminal` (`terminal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkvt_v` FOREIGN KEY (`voucher_id`) REFERENCES `voucher` (`voucher_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
