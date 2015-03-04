-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: ftp.llhosts.com
-- Generation Time: Feb 22, 2015 at 09:40 PM
-- Server version: 5.1.56
-- PHP Version: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `llhosts_ericbuhr`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  `usernamemsg` varchar(60) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(4000) NOT NULL,
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE IF NOT EXISTS `relationships` (
  `relationshipid` int(11) NOT NULL AUTO_INCREMENT,
  `usernamerel` varchar(60) NOT NULL,
  `friendname` varchar(60) NOT NULL,
  PRIMARY KEY (`relationshipid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`relationshipid`, `usernamerel`, `friendname`) VALUES
(1, 'rjones@abcco.com', 'dhughes@honeymead.com'),
(2, 'rjones@abcco.com', 'tgriffiths@mnsu.edu'),
(3, 'ehumphries@snowden.net', 'adavies@plaidcymru.org'),
(4, 'ehumphries@snowden.net', 'kwilliams@stthomas.edu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `displayname` varchar(60) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `displayname`) VALUES
('adavies@plaidcymru.org', 'nop121314', 'Anwen Davies'),
('dhughes@honeymead.com', 'hij678', 'Daffyd Hughes'),
('ehumphries@snowden.net', 'qrs151617', 'Eira Humphreys'),
('eroberts@judson.net', 'klm91011', 'Evan Roberts'),
('kwilliams@stthomas.edu', 'efg345', 'Kyffin Williams'),
('rjones@abcco.com', 'abc123', 'Rhys Jones'),
('tgriffiths@mnsu.edu', 'tuv181920', 'Tegan Griffiths');
