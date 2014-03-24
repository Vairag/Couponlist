-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2012 at 04:48 PM
-- Server version: 5.5.29
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icouponl_Clientlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `adminpwd` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`adminname`),
  KEY `adminpwd` (`adminpwd`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminname`, `adminpwd`) VALUES
('superadmin', 'super123');

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

DROP TABLE IF EXISTS `client_details`;
CREATE TABLE IF NOT EXISTS `client_details` (
  `client_name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(6) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(6) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `files` varchar(2000) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `password` (`password`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`client_name`, `username`, `password`, `files`) VALUES
('Test_CSV', 'Tes124', '3awh70', 'New_Sample.csv, VieUrbaine.csv, aGogoDeal.csv, Tuango.csv, new_DealOfTheDay.csv'),
('Test_19_08', 'Tes242', 'udy0qm', 'aGogoDeal.csv, Tuango.csv, new_DealOfTheDay.csv, VieUrbaine.csv, New_Sample.csv'),
('Test_Bug', 'Tes815', 'gj21kd', 'VieUrbaine.csv, New_Sample.csv'),
('Test_Final', 'Tes280', '0y6g7y', 'VieUrbaine.csv');

-- --------------------------------------------------------

--
-- Table structure for table `provider_list`
--

DROP TABLE IF EXISTS `provider_list`;
CREATE TABLE IF NOT EXISTS `provider_list` (
  `provider_id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_name` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `provider_type` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `start_position` int(11) NOT NULL,
  `end_position` int(11) NOT NULL,
  PRIMARY KEY (`provider_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `provider_list`
--

INSERT INTO `provider_list` (`provider_id`, `provider_name`, `provider_type`, `start_position`, `end_position`) VALUES
(13, 'TUANGO', 'Code', 0, 16),
(12, 'KIJIJI', 'Text', 9, 16);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
