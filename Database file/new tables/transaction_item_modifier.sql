-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2022 at 12:10 PM
-- Server version: 8.0.26
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `transaction_item_modifier`
--

DROP TABLE IF EXISTS `transaction_item_modifier`;
CREATE TABLE IF NOT EXISTS `transaction_item_modifier` (
  `transaction_item_modifier_id` int NOT NULL,
  `till_id` int NOT NULL,
  `transaction_detail_id` int NOT NULL,
  `item_id` int DEFAULT NULL,
  `modifier_id` int DEFAULT NULL,
  `recode_status` smallint DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`transaction_item_modifier_id`,`till_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
