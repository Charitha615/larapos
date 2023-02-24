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
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int NOT NULL,
  `till_id` int NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `recode_status` smallint DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified_by` varchar(45) DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `discount` decimal(3,2) DEFAULT NULL,
  `net_amount` decimal(10,2) DEFAULT NULL,
  `price_level_id` int DEFAULT NULL,
  `receipt_print_count` int DEFAULT '0',
  `reciept_balance` decimal(10,2) DEFAULT '0.00',
  `refund_id` int DEFAULT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `member_no` varchar(45) DEFAULT NULL,
  `stand_no` int DEFAULT NULL,
  `cover` int DEFAULT NULL,
  `tire` varchar(45) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `member_id` int DEFAULT NULL,
  PRIMARY KEY (`transaction_id`,`till_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
