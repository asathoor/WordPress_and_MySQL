-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2014 at 05:04 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `middleearth`
--

-- --------------------------------------------------------

--
-- Table structure for table `hobbitses`
--

CREATE TABLE IF NOT EXISTS `hobbitses` (
`id` int(11) NOT NULL,
  `firstName` tinytext COLLATE utf8_bin NOT NULL,
  `lastName` text COLLATE utf8_bin NOT NULL,
  `addr` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Dumping data for table `hobbitses`
--

INSERT INTO `hobbitses` (`id`, `firstName`, `lastName`, `addr`) VALUES
(1, 'Frodo', 'Baggins', 'Shire somewhere to the left'),
(2, 'Bilbo', 'Baggins', 'Shire'),
(3, 'Sam', 'Gamgee', 'Near Frodo'),
(4, 'Rosie', 'Cotton', 'The Inn'),
(6, 'Asger', 'Jorn', 'Paintbucket'),
(7, 'Black', 'Feet', 'Wood'),
(8, 'Jimmy', 'Jazz', 'Clash'),
(9, 'Tyra', 'Banks', 'NY'),
(10, 'Harry', 'Potter', 'NY'),
(11, 'Aristotle', 'Athens', 'Greece'),
(12, 'Aleister', 'Crowley', 'London'),
(13, 'Greg', 'Hinterseher', 'Cassel');

-- --------------------------------------------------------

--
-- Table structure for table `swords`
--

CREATE TABLE IF NOT EXISTS `swords` (
`id` int(11) NOT NULL,
  `hobbitses_id` int(11) NOT NULL,
  `name` tinytext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `swords`
--

INSERT INTO `swords` (`id`, `hobbitses_id`, `name`) VALUES
(1, 1, 'Glamdring'),
(2, 1, 'Sting'),
(3, 2, 'Ginnungagab'),
(4, 2, 'Arthfeid'),
(5, 1, 'Swiftling'),
(6, 1, 'Aumgn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hobbitses`
--
ALTER TABLE `hobbitses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `swords`
--
ALTER TABLE `swords`
 ADD PRIMARY KEY (`id`), ADD KEY `hobbitses_id` (`hobbitses_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hobbitses`
--
ALTER TABLE `hobbitses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `swords`
--
ALTER TABLE `swords`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `swords`
--
ALTER TABLE `swords`
ADD CONSTRAINT `swords_ibfk_1` FOREIGN KEY (`hobbitses_id`) REFERENCES `hobbitses` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
