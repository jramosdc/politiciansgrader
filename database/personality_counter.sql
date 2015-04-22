-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2014 at 05:47 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `personality_counter`
--

-- --------------------------------------------------------

--
-- Table structure for table `negative_tags`
--

CREATE TABLE IF NOT EXISTS `negative_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `negative_tags`
--

INSERT INTO `negative_tags` (`id`, `tag_name`, `create_date`) VALUES
(1, 'negative1', '2014-11-27 01:25:28'),
(2, 'negative2', '2014-11-27 01:25:28'),
(3, 'negative3', '2014-11-27 01:25:39'),
(4, 'negative4', '2014-11-27 01:25:39'),
(5, 'negative5', '2014-11-27 01:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `p1_tags`
--

CREATE TABLE IF NOT EXISTS `p1_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL DEFAULT '0',
  `tag_name` varchar(50) NOT NULL,
  `positive_or_negative` int(1) NOT NULL COMMENT '1=Positive, 2=Negative',
  `count_tags` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `p1_tags`
--

INSERT INTO `p1_tags` (`id`, `tag_id`, `tag_name`, `positive_or_negative`, `count_tags`, `create_date`) VALUES
(47, 2, 'positive2', 1, 1, '2014-11-28 05:39:37'),
(44, 1, 'negative1', 2, 12, '2014-11-28 05:09:45'),
(45, 1, 'positive1', 1, 12, '2014-11-28 05:09:58'),
(46, 2, 'negative2', 2, 1, '2014-11-28 05:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `p2_tags`
--

CREATE TABLE IF NOT EXISTS `p2_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL DEFAULT '0',
  `tag_name` varchar(50) NOT NULL,
  `positive_or_negative` int(1) NOT NULL COMMENT '1=Positive, 2=Negative',
  `count_tags` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `p2_tags`
--

INSERT INTO `p2_tags` (`id`, `tag_id`, `tag_name`, `positive_or_negative`, `count_tags`, `create_date`) VALUES
(24, 3, 'positive3', 1, 1, '2014-11-28 05:40:41'),
(23, 2, 'positive2', 1, 2, '2014-11-28 05:40:36'),
(22, 2, 'negative2', 2, 2, '2014-11-28 05:40:24'),
(21, 1, 'negative1', 2, 3, '2014-11-28 05:10:17'),
(20, 1, 'positive1', 1, 3, '2014-11-28 05:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `p3_tags`
--

CREATE TABLE IF NOT EXISTS `p3_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL DEFAULT '0',
  `tag_name` varchar(50) NOT NULL,
  `positive_or_negative` int(1) NOT NULL COMMENT '1=Positive, 2=Negative',
  `count_tags` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `p3_tags`
--

INSERT INTO `p3_tags` (`id`, `tag_id`, `tag_name`, `positive_or_negative`, `count_tags`, `create_date`) VALUES
(23, 1, 'positive1', 1, 1, '2014-11-28 05:41:16'),
(22, 2, 'positive2', 1, 1, '2014-11-28 05:10:37'),
(21, 1, 'negative1', 2, 1, '2014-11-28 05:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `create_date` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `image`, `create_date`) VALUES
(1, 'person 1', 'person1.jpg', '2014-11-26'),
(2, 'person 2', 'person2.jpg', '2014-11-26'),
(3, 'person 3', 'person3.jpg', '2014-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `positive_tags`
--

CREATE TABLE IF NOT EXISTS `positive_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `positive_tags`
--

INSERT INTO `positive_tags` (`id`, `tag_name`, `create_date`) VALUES
(1, 'positive1', '2014-11-27 01:20:31'),
(2, 'positive2', '2014-11-27 01:20:31'),
(3, 'positive3', '2014-11-27 01:21:06'),
(4, 'positive4', '2014-11-27 01:21:06'),
(5, 'positive5', '2014-11-27 01:21:23'),
(6, 'positive66', '2014-11-27 01:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(25) NOT NULL,
  `rate` int(1) NOT NULL COMMENT '1=Like, 2=Dislike',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `p_id`, `ip`, `rate`, `create_date`) VALUES
(7, 3, '::1', 1, '2014-11-26 21:37:11'),
(6, 2, '::1', 2, '2014-11-26 21:36:43'),
(8, 1, '::1', 1, '2014-11-26 22:22:05'),
(9, 1, '::1', 1, '2014-11-26 22:22:55'),
(10, 1, '::1', 1, '2014-11-26 22:24:18'),
(11, 1, '::1', 2, '2014-11-26 22:30:51'),
(12, 1, '::1', 2, '2014-11-26 22:41:06'),
(13, 2, '::1', 1, '2014-11-26 22:49:27'),
(14, 2, '::1', 1, '2014-11-26 22:50:41'),
(15, 2, '::1', 2, '2014-11-26 22:51:52'),
(16, 2, '::1', 1, '2014-11-26 22:53:44'),
(17, 2, '::1', 2, '2014-11-26 22:54:37'),
(18, 1, '::1', 1, '2014-11-26 22:57:01'),
(19, 3, '::1', 1, '2014-11-26 23:06:36'),
(20, 3, '::1', 2, '2014-11-26 23:07:06'),
(21, 1, '::1', 1, '2014-11-26 23:23:49'),
(22, 2, '::1', 1, '2014-11-26 23:36:10'),
(23, 3, '::1', 1, '2014-11-26 23:36:20'),
(24, 1, '::1', 2, '2014-11-26 23:43:13'),
(25, 2, '::1', 1, '2014-11-26 23:43:24'),
(26, 3, '::1', 2, '2014-11-26 23:48:16'),
(27, 1, '::1', 2, '2014-11-27 00:07:55'),
(28, 2, '::1', 2, '2014-11-27 00:09:41'),
(29, 3, '::1', 1, '2014-11-27 00:09:56'),
(30, 1, '::1', 1, '2014-11-28 00:14:52'),
(31, 2, '::1', 2, '2014-11-28 00:14:57'),
(32, 3, '::1', 1, '2014-11-28 00:15:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
