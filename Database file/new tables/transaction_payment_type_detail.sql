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
-- Table structure for table `transaction_payment_type_detail`
--

DROP TABLE IF EXISTS `transaction_payment_type_detail`;
CREATE TABLE IF NOT EXISTS `transaction_payment_type_detail` (
  `transaction_payment_type_detail_id` int NOT NULL AUTO_INCREMENT,
  `transaction_payment_detail_id` int NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `till_id` int NOT NULL,
  `ref_no` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `voucher_count` int DEFAULT NULL,
  PRIMARY KEY (`transaction_payment_type_detail_id`,`till_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31449 DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
