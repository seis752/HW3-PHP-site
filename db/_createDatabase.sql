--
-- Table structure for table `Users`
-- Added 'user_password_hash' as part of check including user_email check
--


CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT ,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL ,
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL ,
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL ,
  `display_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL ,

  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';


--
-- Table structure for table `messages`
--


CREATE TABLE IF NOT EXISTS `messages` (
  id int(11) NOT NULL auto_increment,
  username_from varchar(60) NOT NULL,
  date timestamp NOT NULL default CURRENT_TIMESTAMP,
  message varchar(4000) NOT NULL,
  username_to varchar(60) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Table structure for table `relationships`
--

CREATE TABLE IF NOT EXISTS `relationships` (
  username varchar(60) NOT NULL,
  friend varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table INSERTS for table `users`
--

INSERT INTO users(user_name, user_email, user_password_hash, display_name)
VALUES
  ('abdi1','a@gmail.com','KAM', 'Abdullahi Jama'),
('fifty','b@yahoo.com','NEWTOM', 'Fifty Cent'),
('clinton','c@gmail.com','PHIL', 'HAHA Clinton'),
('dex','d@hotmail.com','JUNIOR', 'Dexter'),
('initio','e@hotmail.com','WORSE', 'Bower'),
('hurio','f@yahoo.com','JCOLE', 'Initio'),
('yuma','g@yahoo.com','EEBO', 'Hurio'),
('haha','r@gmail.com','YAHZ', 'Yuma'),
('dourad','j@gmail.com','WOWZER', 'Dourad');


--
-- Table INSERTS for table `relationships`
-- Using username instead of 'id' -- important to note
--

INSERT INTO relationships(username, friend) VALUES
  ('abdi1', 'dourad'),
  ('clinton', 'fifty'),
  ('abdi1', 'haha'),
  ('haha', 'initio'),
  ('warz', 'clinton'),
  ('abdi1', 'fifty'),
  ('yuma', 'haha');

--
-- Table INSERTS for table `messages`
--

INSERT INTO messages(username_from, username_to, message) VALUES
  ('abdi1', 'dourad', 'A test message for you'),
  ('clinton', 'fifty', 'A test message for you'),
  ('abdi1', 'haha', 'A test message for you'),
  ('haha', 'initio', 'A test message for you'),
  ('warz', 'clinton', 'A test message for you'),
  ('abdi1', 'fifty', 'A test message for you'),
  ('yuma', 'haha', 'A test message for you');

--
-- Table Definition for table `users`
--



CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(16) unsigned NOT NULL AUTO_INCREMENT,
  `display_name` varchar(255) DEFAULT NULL,
  `username` varchar(80) DEFAULT NULL,
  `user_password_hash` varchar(60) NOT NULL,
  `user_email` varchar(64) COLLATE utf8_unicode_ci NULL,
  `lat` decimal(10,6) DEFAULT NULL,
  `lon` decimal(10,6) DEFAULT NULL,
  `profile_img_url` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2001 ;

