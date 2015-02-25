-- using sample sql provided in assignment description.

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  id int(11) NOT NULL auto_increment,
  username varchar(60) NOT NULL,
  date timestamp NOT NULL default CURRENT_TIMESTAMP,
  message varchar(4000) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE IF NOT EXISTS `relationships` (
  username varchar(60) NOT NULL,
  friend varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS users (
  username varchar(60) NOT NULL,
  password varchar(60) NOT NULL,
  displayname varchar(60) NOT NULL,
  PRIMARY KEY  (username)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;