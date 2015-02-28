# HW4-PHP-site

##SEIS752 – Advanced Web Application Development   
####Spring 2015
###Professor 	Lloyd Cledwyn
###HW #4:  	PHP Up and Running
###Due:		To be discussed Feb 26th

##Summary
Using PHP, create a system that allows users to log in and post information in their stream and view other users streams.

##Purpose:
To familiarize oneself with PHP and MySQL.

##How to turn in:
1. Fork this repo. 
2. In the folder I expect the following files
  - _createDatabase.sql --- This file should have the sql commands that will create the database structure and content that is in your MySql Database.
  - _Summary.doc --- This is a Word Doc (or .txt file) with a few paragraphs summarizing your experience using PHP and MySql.  It should include
  - An analysis of the Cost/Speed/Quality of PHP and MySql
  - Your thoughts of the environment.  Include a sentence on your previous experience.  Include challenges and benefits you see in the environment.
[All php files to run your site]
3. Submit a pull request to this repo

_Remember:_
Keep track of your time.  If you find yourself still working on it after 8 hours stop.  Write a (short) summary of where you think you are in the scope of this assignment.  What were the issues that took most of your time.  If you were to start over again, what might you do differently, if you were getting paid to do this and your boss assigned the next two work days, how would you plan to use your time to move this towards completion.

_Assignment:_
For this assignment, you'll be integrating a mysql database into a social networking site. You'll be using a database to implement persistent relationships between the members of your network. You'll also be using sessions and cookies to give users a smooth experience while navigating the network.
![img](https://raw.githubusercontent.com/seis752/HW4-PHP-site/master/img/hw4flow.png "flow")
 

You should ideally get this up and running on your domain that you registered previously.  For the database creation scripts, it would be extremely helpful if you have the choice of naming your db to name it seislloyd… if your name is Lloyd.  If it is Ted you would call it seisted.  If you have a classmate with your first name then you could go with your UST username, or FNameLIniital.  It is important that I can keep them separate running throughout the semester.

Within your repo should be all the files that are needed to create the database, and run the site.

For this assignment, you need to implement these two key features in the following ways:

1. Using sessions to manage permissions
 - If user is not logged in, then redirect them to the Login Page.
 - The index of your website will be a login page (think facebook) on which users can enter their username and password to login. Logging in will start a new session and take users to their profile. 
 - Include a toolbar on each webpage that has a link which takes the logged-in user to their profile, a link to view all users, and a link to log out (end the session).
 - Posting a message on a profile requires someone to be logged in- a message will now display when it was posted and who posted it.
2. Using mysql to store data about the users of the network
 - You need to design a database to store network information. There should be at least three tables 
*****Further Info Below in the MySQL section******:
   - A user information table: user ids, passwords, profile info.
   - A messages table for storing posted messages. In addition to the message, you need to keep track of who posted the message and when it was posted.
   - A connection table that stores friendship relationships.
 - Your submission needs to include a mysql script that sets up your database and populates it with at least seven users and a couple of relationships. The signup page needs to collect a user id. Email address are fine for ids. Your validation procedures should be updated to check that this id is not already in the user database. Thus, each row in the users table should have a unique id (*cough* these would be ideal primary keys *cough*). Validated data should now be inserted into the database. 
 - Profile pages should now display a list of a user's friends.
3. On the homepage show your most recent postings.  (Postings filtered by your username)  This should be flexible or ready to be flexible so you could show other users most recent postings.
4. Have the ability to post a message to your stream from the base page.  You should be logged in to do this.
5. Have a page which shows all users, with a button to add the user to your friend list
6. Have a page which shows your friends with a link to remove them from your friends list.
7. [If time allows] Have a search page. This should just query the database and return all users whose names match the search term. Each result should have a link to that the profile page. 



##MySQL
I encourage you to get familiar with the MySql interface, and build the tables using the PhpMyAdmin tool that likely came with your course.  If you would like to watch me create the tables here is a video walkthrough here :  

1. [On Dreamhost](http://www.youtube.com/watch?v=5R1ctzIFP-Q)… super slow for some reason
2. [or with a host with CPanel interface.](http://www.youtube.com/watch?v=7sAmyUVbUsg)

###MySql Script - This script is a suggestion.  If you have no experience with databases and are struggling, then you can use this, but by no means should it be taken as authoratative.

```
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
```

Adapted from [here](http://www.google.com/url?q=http%3A%2F%2Fwww.cs.utexas.edu%2F~bendy%2Fteaching%2Fcs105%2Fhw2.php&sa=D&sntz=1&usg=AFQjCNF0aTkzhoe8n3lBqoxIqFsO_7lzvg)





