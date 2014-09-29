-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2014 at 04:55 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecmnewsaiha`
--

-- --------------------------------------------------------

--
-- Table structure for table `p`
--

CREATE TABLE IF NOT EXISTS `p` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `p`
--

INSERT INTO `p` (`id`, `name`, `address`, `contact`) VALUES
(24, 'huapa', 'nursery', 7388347),
(25, 'tksdfk', 'kddsfdskf', 3434),
(26, 'fsdf', 'sdf', 34634),
(27, 'test', 'test', 0),
(28, 'asdasd', '223', 0),
(29, 'asdasd', 'sa', 223),
(31, 'dfs', 'fsd', 12),
(40, 'benarji', 'Zuantui', 92738),
(53, '', '', 0),
(54, '', '', 0),
(55, '', '', 0),
(56, '', '', 0),
(57, '', '', 0),
(58, '', '', 0),
(59, '', '', 0),
(60, '', '', 0),
(61, '', '', 0),
(62, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `zf_album`
--

CREATE TABLE IF NOT EXISTS `zf_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zf_yearId` int(10) DEFAULT NULL,
  `zf_name` varchar(255) DEFAULT NULL,
  `zf_path` varchar(255) DEFAULT NULL,
  `zf_createdAt` date DEFAULT NULL,
  `zf_updatedAt` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `zf_album`
--

INSERT INTO `zf_album` (`id`, `zf_yearId`, `zf_name`, `zf_path`, `zf_createdAt`, `zf_updatedAt`) VALUES
(27, 9, 'Christmas', 'DSC_0147.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zf_albumyear`
--

CREATE TABLE IF NOT EXISTS `zf_albumyear` (
  `zf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zf_year` int(20) DEFAULT NULL,
  `zf_createdAt` date DEFAULT NULL,
  `zf_updatedAt` date DEFAULT NULL,
  PRIMARY KEY (`zf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `zf_albumyear`
--

INSERT INTO `zf_albumyear` (`zf_id`, `zf_year`, `zf_createdAt`, `zf_updatedAt`) VALUES
(1, 2010, NULL, NULL),
(2, 2011, NULL, NULL),
(3, 2012, NULL, NULL),
(4, 2013, NULL, NULL),
(5, 2014, NULL, NULL),
(6, 2015, NULL, NULL),
(7, 2016, NULL, NULL),
(8, 2017, NULL, NULL),
(9, 2018, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zf_article`
--

CREATE TABLE IF NOT EXISTS `zf_article` (
  `zf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zf_body` text,
  `zf_userId` int(10) DEFAULT NULL,
  `zf_createdAt` date DEFAULT NULL,
  `zf_updatedAt` date DEFAULT NULL,
  PRIMARY KEY (`zf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `zf_comment`
--

CREATE TABLE IF NOT EXISTS `zf_comment` (
  `zf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zf_comment` varchar(150) DEFAULT NULL,
  `zf_userId` int(10) DEFAULT NULL,
  `zf_postId` int(10) DEFAULT NULL,
  `zf_createdAt` date DEFAULT NULL,
  `zf_updatedAt` date DEFAULT NULL,
  PRIMARY KEY (`zf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `zf_gallery`
--

CREATE TABLE IF NOT EXISTS `zf_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zf_yearId` int(10) DEFAULT NULL,
  `zf_albumid` int(10) DEFAULT NULL,
  `zf_userId` int(10) DEFAULT NULL,
  `zf_name` varchar(255) DEFAULT NULL,
  `zf_filepath` varchar(255) DEFAULT NULL,
  `zf_createdAt` date DEFAULT NULL,
  `zf_updatedAt` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `zf_gallery`
--

INSERT INTO `zf_gallery` (`id`, `zf_yearId`, `zf_albumid`, `zf_userId`, `zf_name`, `zf_filepath`, `zf_createdAt`, `zf_updatedAt`) VALUES
(36, 9, 25, NULL, NULL, 'DSC_0040.jpg', NULL, NULL),
(37, 9, 25, NULL, NULL, 'DSC_0041.jpg', NULL, NULL),
(38, 9, 25, NULL, NULL, 'DSC_0042.jpg', NULL, NULL),
(39, 9, 27, NULL, NULL, 'DSC_0028.jpg', NULL, NULL),
(40, 9, 27, NULL, NULL, 'DSC_0032.jpg', NULL, NULL),
(41, 9, 27, NULL, NULL, 'DSC_0256.jpg', NULL, NULL),
(42, 9, 27, NULL, NULL, 'DSC_0257.jpg', NULL, NULL),
(43, 9, 27, NULL, NULL, 'DSC_0258.jpg', NULL, NULL),
(44, 9, 27, NULL, NULL, 'DSC_0254.jpg', NULL, NULL),
(45, 9, 27, NULL, NULL, 'DSC_0256.jpg', NULL, NULL),
(46, 9, 27, NULL, NULL, 'DSC_0257.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zf_menu`
--

CREATE TABLE IF NOT EXISTS `zf_menu` (
  `zf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zf_menuName` varchar(255) DEFAULT NULL,
  `zf_createdAt` date DEFAULT NULL,
  `zf_updatedAt` date DEFAULT NULL,
  PRIMARY KEY (`zf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `zf_user`
--

CREATE TABLE IF NOT EXISTS `zf_user` (
  `zf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zf_userName` varchar(50) DEFAULT NULL,
  `zf_password` varchar(50) DEFAULT NULL,
  `zf_role` varchar(20) DEFAULT NULL,
  `zf_lastVisit` date DEFAULT NULL,
  `zf_email` varchar(20) DEFAULT NULL,
  `zf_createdAt` date DEFAULT NULL,
  `zf_updatedAt` date DEFAULT NULL,
  PRIMARY KEY (`zf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
