-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2014 at 10:43 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icouponl_clientlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

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
('superpower', 'superpower');

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

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
('Kamal', 'Kam983', '0e2hv5', 'red.png'),
('Trisha', 'Tri526', 'wpqj5s', 'green.png'),
('paresh', 'par852', 'shy280', 'icouponl_Clientlist.sql, icouponl_Clientlist.sql');

-- --------------------------------------------------------

--
-- Table structure for table `provider_list`
--

CREATE TABLE IF NOT EXISTS `provider_list` (
  `provider_id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_name` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `provider_type` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `start_position` int(11) NOT NULL,
  `end_position` int(11) NOT NULL,
  PRIMARY KEY (`provider_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `provider_list`
--

INSERT INTO `provider_list` (`provider_id`, `provider_name`, `provider_type`, `start_position`, `end_position`) VALUES
(15, 'Tobias Müller', 'Code', 10, 30),
(14, 'Mukesh Ambani', 'URL', 3, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
