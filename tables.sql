-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.seis752.com
-- Generation Time: Mar 04, 2015 at 03:04 AM
-- Server version: 5.1.56
-- PHP Version: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `seis752olga_db`
--

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `user_email`, `status`) VALUES
(4, 'Rhett Butler', 'pass2', 'user2@test.com', 1425465120),
(5, 'Elizabeth Bennet', 'pass3', 'user3@test.com', 1425340319),
(7, 'Dorian Gray', 'pass5', 'user5@test.com', 0),
(6, 'Eugene Onegin', 'pass4', 'user4@test.com', 1425439213),
(8, 'Anna Karenina', 'pass6', 'user6@test.com', 0),
(9, 'Othello', 'pass7', 'user7@test.com', 0),
(10, 'Moby-Dick', 'pass8', 'user8@test.com', 0),
(11, 'J D Salinger ', 'pass9', 'user9@test.com', 1425452494),
(12, 'Tristan', 'pass10', 'user10@test.com', 0),
(13, 'Jay Gatsby', 'pass11', 'user11@test.com', 0),
(14, 'Hunter S Thompson', 'ppass12', 'user12@test.com', 0);


-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `relationships` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  PRIMARY KEY (`friend_id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`user_id`, `friend_id`) VALUES
(4, 5),
(5, 4),
(4, 6),
(4, 7),
(7, 8),
(7, 9);


-- --------------------------------------------------------



CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(400) NOT NULL,
  `friend_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_id`, `date`, `message`, `friend_id`) VALUES
(2, 4, '2015-03-03 17:27:02', 'Hey Rhett, do you think I am perfect?', 7),
(3, 4, '2015-03-03 17:28:40', 'Oh, Rhett! Had I not married Mr. Darcy, I would have been with you and made you love me more than you loved Scarlett.', 5);
