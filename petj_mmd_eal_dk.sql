-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2014 at 08:37 AM
-- Server version: 5.5.35-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `petj_mmd_eal_dk`
--

-- --------------------------------------------------------

--
-- Table structure for table `Majesties`
--

CREATE TABLE IF NOT EXISTS `Majesties` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'the ID',
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Number` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Majesties`
--

INSERT INTO `Majesties` (`Id`, `Name`, `Number`) VALUES
(1, 'Henry', 8),
(2, 'Richard', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Spouses`
--

CREATE TABLE IF NOT EXISTS `Spouses` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Majesties_ID` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Spouses`
--

INSERT INTO `Spouses` (`Id`, `Name`, `Majesties_ID`) VALUES
(1, 'Anne Boleyn', 1),
(2, 'Catherine of Aragon', 1),
(3, 'Jane Seymour', 1),
(4, 'Anne of Cleves', 1),
(5, 'Catherine Howard', 1),
(6, 'Catherine Parr', 1),
(7, 'Anne Neville', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
