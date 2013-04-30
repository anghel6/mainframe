-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2013 at 04:09 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('296cdbd75f359a38c5228dad54c81199', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/536.11', 1367327276, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_seen` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_on`, `last_seen`) VALUES
(1, 'ang_nikola@yahoo.com', 'ang_nikola@yahoo.com', '76883a291c53db48cf92b0118b384cd1', '2013-04-29 15:20:38', '2013-04-29 15:20:38'),
(2, 'anghel6@hotmail.com', '', '93407ae765616dd0abfe031c623a5301', '2013-04-29 00:00:00', '2013-04-23 00:00:00'),
(3, 'anghel6@hot.com', '', 'c20ad4d76fe97759aa27a0c99bff6710', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'sfds@gfsd.com', '', 'c20ad4d76fe97759aa27a0c99bff6710', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'fds@rres.com', '', 'c20ad4d76fe97759aa27a0c99bff6710', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'ag@lolo.com', '', 'b3c2130aa16a0fe70ef5bfc47ebde56e', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
