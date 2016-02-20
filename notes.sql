-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2016 at 08:42 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `shelter` text NOT NULL,
  `atmnote` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `username`, `lat`, `lng`, `shelter`, `atmnote`) VALUES
(1, 'abcd1234', 28.6247610502592, 77.1840190887451, 'yes', 'yes'),
(3, 'abcd1234', 28.6370407715123, 77.177152633667, 'yep very good', 'yes a lot'),
(5, 'abcd1234', 28.6301100625089, 77.1759510040283, 'no', 'no'),
(6, 'abcd1234', 28.6103701011626, 77.2030735015869, 'scbskj', 'djcnjds'),
(7, 'abcd1234', 28.6247610502592, 77.1840190887451, 'yes', 'yes'),
(8, 'abcd1234', 28.6227268473055, 77.1854782104492, 'yes', 'yes many'),
(9, 'abcd1234', 28.6160212325631, 77.1979236602783, 'asbhs', 'asbkj'),
(10, 'abcd1234', 28.6163226176969, 77.1852207183838, 'snjs', 'bsxchsb'),
(11, 'tester', 28.6117264004285, 77.1914863586426, 'cghvhjb', 'cgfcthv');
