-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: ftp.llhosts.com
-- Generation Time: Feb 22, 2015 at 09:28 PM
-- Server version: 5.1.56
-- PHP Version: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `llhosts_ericbuhr`
-- Username: `llhosts_ericbuhr`
-- Password:  `v9SPf1faFqgn`	
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2001 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2001 ;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`relationshipid`, `usernamerel`, `friendname`) VALUES
(1, 'rjones', 'dhughes'),
(2, 'rjones', 'tgriffiths'),
(3, 'ehumphreys', 'adavies'),
(4, 'ehumphreys', 'kwilliams');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

`id` bigint(16) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(80) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `lat` decimal(10,6) DEFAULT NULL,
  `lon` decimal(10,6) DEFAULT NULL,
  `profile_img_url` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2001 ;


--
-- Dumping data for table `users`
--

INSERT INTO `users` ( `name`, `username`, `password`, `lat` , `lon` , `image_url`) VALUES
( 1 , 'Anwen Davies', 'adavies', 'abc123', '45', '95' , 'http://www.blueearth.org/images/annpic.jpg'),
( 2 , 'Daffyd Hughes', 'dhughes', 'abc123', '43' , '97' , 'http://www.honeymead.com/images/daffyd.gif'),
( 3 , 'Eira Humphreys', 'ehumphreys' , 'abc123', '54', '4' , 'http://www.snowden.net/photos/eiraphoto.jpg'),
( 4 , 'Evan Roberts', 'eroberts', 'abc123', '43' , '98' ,'http://www.judson.org/photos/ive.gif'),
( 5 , 'Kyffin Williams' , 'kwilliams' , 'abc123', '45' , '95' , 'http://www.stthomas.edu/departments/arthistory/faculty/photos/kyffinpic.png'),
( 6 , 'Rhys Jones', 'rjones' , 'abc123', '54' , '6' , 'http://www.plaidcymru.org/photos/rhysj_photo.gif'),
( 7 , 'Tegan Griffiths' , 'tgriffiths' , 'abc123', '43' , '97' , 'http://www.mnsu.edu/depts/languages/images/tgriffiths.jpg');
