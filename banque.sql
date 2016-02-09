-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2016 at 12:46 WB
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banque`
--
CREATE DATABASE IF NOT EXISTS `banque` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `banque`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `customer_id` int(11) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `income` int(11) NOT NULL,
  `deposit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`customer_id`, `account_type`, `occupation`, `income`, `deposit`) VALUES
(30486246, 'Current Account', 'Driver', 30000, 300);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_gender` varchar(50) NOT NULL,
  `customer_dob` date NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_gender`, `customer_dob`, `customer_phone`, `customer_email`) VALUES
(305685, 'Griffin', 'Male', '2016-02-12', '07028866643', 'griffinmuteti31@gmail.com'),
(5662662, 'Griffin', 'Male', '2016-02-10', '05805824', 'griffin@gmail.com'),
(30486246, 'Griffin Muteti', 'Male', '1899-12-21', '0702990800', 'griffinmuteti31@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `useremail` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `account_type` varchar(200) NOT NULL DEFAULT 'applicant',
  `user_avatar` varchar(10000) DEFAULT NULL,
  `username` varchar(500) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `useremail` (`useremail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `useremail`, `password`, `account_type`, `user_avatar`, `username`) VALUES
(8, 'griffin@gmail.com', 'd5df6f9e5bc8cf58c8218b8dfe1429b9', 'applicant', NULL, 'griffin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
