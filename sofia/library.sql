-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2016 at 05:58 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(5, 'munim', 'Dd000000'),
(6, 'aqsa', 'Vv33333333');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `book` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `edition` varchar(200) NOT NULL,
  `copies` varchar(200) NOT NULL,
  `member` int(11) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book`, `name`, `subject`, `author`, `edition`, `copies`, `member`) VALUES
(1, '66', 'physics', 'ss', 'www', '222', '12', 0),
(5, '22', 'electronics', 'physics', 'hashim', '2013', '24', 11);

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE IF NOT EXISTS `issue_book` (
  `issue_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `member` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `first` date NOT NULL,
  `last` date NOT NULL,
  `days` varchar(255) NOT NULL,
  `late_fine` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`issue_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`issue_id`, `book`, `name`, `member`, `mobile`, `first`, `last`, `days`, `late_fine`) VALUES
(53, 'electronics', 'sofia malik', '11', '2222222222', '2016-11-15', '2016-11-18', '', '0'),
(55, 'physics', 'iqra', '12', '2222', '0000-00-00', '0000-00-00', '36', '0'),
(61, 'physics', 'iqra', '12', '55555', '2016-11-09', '2016-11-14', '0', '0'),
(64, 'electronics', 'iqra', '12', '2222', '2016-11-08', '2016-11-14', '36', '0');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member`, `name`, `dob`, `gender`, `class`, `department`, `email`, `mobile`, `address`) VALUES
(7, '33', 'ss', '2016-11-04', 'Female', 'ss', 'ss', 'sofia.awan19@hotmail.com', '222222222', 'sssssssss'),
(9, '12', 'iqra', '2016-11-01', 'Female', 'BS', 'IT', 'iqran2@hotmail.com', '2222', '2222'),
(10, '11', 'sofia malik', '2016-11-05', 'Female', 'BS', 'IT', 'sofia.awan19@hotmail.com', '2222222222', 'sssssssssss');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
