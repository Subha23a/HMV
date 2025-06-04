-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2025 at 01:31 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `a_email` varchar(100) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_vpwd` varchar(100) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_desig` varchar(100) NOT NULL,
  `a_phone` varchar(15) NOT NULL,
  `a_address` tinytext NOT NULL,
  `a_qual` varchar(100) NOT NULL,
  `a_photo` varchar(100) NOT NULL,
  `a_usertype` varchar(10) NOT NULL COMMENT 'For User Privilege 1 for Admin',
  `a_status` varchar(2) NOT NULL COMMENT '1 Approve/ 2 Not Approve',
  `a_pagepermission` varchar(100) NOT NULL,
  `a_sms` varchar(20) NOT NULL,
  `a_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:01',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_email`, `a_password`, `a_vpwd`, `a_name`, `a_desig`, `a_phone`, `a_address`, `a_qual`, `a_photo`, `a_usertype`, `a_status`, `a_pagepermission`, `a_sms`, `a_date`) VALUES
(1, 'info@lluminity.com', 'afbd53504a15301bfd44318ba057edea', 'mishra8604', 'ADMIN', 'Admin', '1234567890', '<p>Bhubaneswar</p>\r\n', 'Shopweb', '270113321_tst3.jpg', '1', '1', '1,2,3,4,5,6,7,8,9,10,11', '', '2025-07-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cou_type` varchar(100) NOT NULL,
  `fee` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `doc` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `cou_type`, `fee`, `duration`, `doc`, `status`) VALUES
(4, 'Beginner Courses:', '30000', '3 month', 'Aadhar', '1'),
(11, 'Premium Course', '510000', '2 year', 'PL', '1'),
(10, 'Advance Courses:', '50000', '6 month', 'DL', '1');

-- --------------------------------------------------------

--
-- Table structure for table `coursetype`
--

DROP TABLE IF EXISTS `coursetype`;
CREATE TABLE IF NOT EXISTS `coursetype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetype`
--

INSERT INTO `coursetype` (`id`, `name`, `status`) VALUES
(4, 'Arunj', '1'),
(3, 'manoj', '1');

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

DROP TABLE IF EXISTS `institute`;
CREATE TABLE IF NOT EXISTS `institute` (
  `id` int NOT NULL AUTO_INCREMENT,
  `inst_code` varchar(20) NOT NULL,
  `inst_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`id`, `inst_code`, `inst_name`, `location`, `status`) VALUES
(1, 'mc003', 'LIm', 'Bhu', ''),
(3, 'mc004', 'km', 'berhampu', '1'),
(4, 'mc004', 'kmb', 'puri', '0'),
(5, 'mc003', 'kmb', 'NIST Near By Roland Institude ', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle1`
--

DROP TABLE IF EXISTS `vehicle1`;
CREATE TABLE IF NOT EXISTS `vehicle1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `vehno` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle1`
--

INSERT INTO `vehicle1` (`id`, `name`, `vehno`, `status`) VALUES
(1, 'ertew', '356356', '1'),
(2, 'manoj', '123', '1'),
(3, 'KULAM', 'OD071315', '1'),
(4, 'Subhakant', '123', '1'),
(5, 'sagar', 'OD070001', '1'),
(7, 'KULAM', 'OD071313', '1'),
(8, 'Anju', 'OD071315', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
