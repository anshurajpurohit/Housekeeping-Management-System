-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2023 at 08:53 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superb_maid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_name`, `email_id`, `pwd`) VALUES
(1, 'admin', 'admin@superbmaid.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking_master`
--

DROP TABLE IF EXISTS `booking_master`;
CREATE TABLE IF NOT EXISTS `booking_master` (
  `booking_id` int(10) NOT NULL,
  `booking_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `cat_id` int(10) NOT NULL,
  `charges` int(10) NOT NULL,
  `full_half` int(1) NOT NULL,
  `no_of_days` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `booking_status` int(10) NOT NULL,
  `hk_id` int(10) DEFAULT NULL,
  `client_id` int(10) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_master`
--

INSERT INTO `booking_master` (`booking_id`, `booking_date`, `start_date`, `end_date`, `cat_id`, `charges`, `full_half`, `no_of_days`, `amount`, `booking_status`, `hk_id`, `client_id`) VALUES
(1, '2023-04-02', '2023-04-03', '2023-04-04', 1, 2000, 2, 2, 4000, 2, 0, 1),
(2, '2023-04-02', '2023-04-03', '2023-04-06', 2, 5000, 2, 4, 20000, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `charges_detail`
--

DROP TABLE IF EXISTS `charges_detail`;
CREATE TABLE IF NOT EXISTS `charges_detail` (
  `charges_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `half_day_charges` int(10) NOT NULL,
  `full_day_charges` int(10) NOT NULL,
  PRIMARY KEY (`charges_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charges_detail`
--

INSERT INTO `charges_detail` (`charges_id`, `cat_id`, `half_day_charges`, `full_day_charges`) VALUES
(1, 1, 1000, 2000),
(2, 2, 0, 5000),
(3, 3, 0, 6000),
(4, 4, 3000, 6000),
(5, 5, 1700, 3500);

-- --------------------------------------------------------

--
-- Table structure for table `client_master`
--

DROP TABLE IF EXISTS `client_master`;
CREATE TABLE IF NOT EXISTS `client_master` (
  `client_id` int(10) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_master`
--

INSERT INTO `client_master` (`client_id`, `client_name`, `address`, `city`, `mobile_no`, `email_id`, `pwd`) VALUES
(1, 'XYZ', 'abrama', 'valsad', '1234567895', 'xyz@yahoo.com', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `complain_master`
--

DROP TABLE IF EXISTS `complain_master`;
CREATE TABLE IF NOT EXISTS `complain_master` (
  `complain_id` int(10) NOT NULL,
  `complain_date` date NOT NULL,
  `client_id` int(10) NOT NULL,
  `hk_id` int(10) NOT NULL,
  `complain_desc` varchar(200) NOT NULL,
  `complain_status` int(1) NOT NULL,
  PRIMARY KEY (`complain_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_master`
--

INSERT INTO `complain_master` (`complain_id`, `complain_date`, `client_id`, `hk_id`, `complain_desc`, `complain_status`) VALUES
(1, '2023-04-02', 1, 3, 'ayush work is not good they dont clean my house properly and stolen my expensive items from home', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hk_cat_detail`
--

DROP TABLE IF EXISTS `hk_cat_detail`;
CREATE TABLE IF NOT EXISTS `hk_cat_detail` (
  `hk_cat_id` int(10) NOT NULL,
  `hk_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  PRIMARY KEY (`hk_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hk_cat_detail`
--

INSERT INTO `hk_cat_detail` (`hk_cat_id`, `hk_id`, `cat_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 4),
(5, 4, 5),
(6, 4, 4),
(7, 5, 3),
(8, 5, 1),
(9, 6, 2),
(10, 7, 4),
(11, 8, 5),
(12, 8, 1),
(13, 8, 3),
(14, 9, 1),
(15, 9, 2),
(16, 9, 3),
(17, 9, 4),
(18, 9, 5),
(19, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `housekeeper_cat`
--

DROP TABLE IF EXISTS `housekeeper_cat`;
CREATE TABLE IF NOT EXISTS `housekeeper_cat` (
  `cat_id` int(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housekeeper_cat`
--

INSERT INTO `housekeeper_cat` (`cat_id`, `category`) VALUES
(1, 'Cleaner or Maid'),
(2, 'Live In'),
(3, 'Live Out'),
(4, 'Housekeeper'),
(5, 'Commercial  Housekeeper');

-- --------------------------------------------------------

--
-- Table structure for table `housekeeper_detail`
--

DROP TABLE IF EXISTS `housekeeper_detail`;
CREATE TABLE IF NOT EXISTS `housekeeper_detail` (
  `hk_id` int(10) NOT NULL,
  `hk_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `aadhar_img` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`hk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housekeeper_detail`
--

INSERT INTO `housekeeper_detail` (`hk_id`, `hk_name`, `address`, `city`, `mobile_no`, `email_id`, `aadhar_img`, `status`) VALUES
(1, 'Ankit', 'Abrama', 'Valsad', '8876543211', 'ankit@yahoo.com', 'hk_aadhar/A1_9296.png', 1),
(2, 'Dhruv', 'mogarawadi', 'valsad', '9999777780', 'dhruv@gmail.com', 'hk_aadhar/A2_9923.png', 1),
(3, 'ayush', 'abrama', 'valsad', '5557796350', 'ayush@gmail.com', 'hk_aadhar/A3_5537.png', 1),
(4, 'nizam', 'st workshop', 'valsad', '4539785430', 'nizam@gmail.com', 'hk_aadhar/A4_1847.png', 1),
(5, 'komal', 'chipvad', 'valsad', '7896542369', 'komal@gmail.com', 'hk_aadhar/A5_6375.png', 1),
(6, 'vidhi', 'parsivad', 'valsad', '1235478963', 'vidhi@gmail.com', 'hk_aadhar/A6_2479.png', 1),
(7, 'khushi', 'ramvadi', 'valsad', '7865421369', 'khushi@gmail.com', 'hk_aadhar/A7_4942.png', 1),
(8, 'margi', 'dharampur', 'valsad', '4512369875', 'margi@gmail.com', 'hk_aadhar/A8_9888.png', 1),
(9, 'smit', 'mg road', 'valsad', '1245699875', 'smit@gmail.com', 'hk_aadhar/A9_9922.png', 1),
(10, 'heer', 'collage road', 'valsad', '4789651236', 'heer@gmail.com', 'hk_aadhar/A10_7297.png', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
