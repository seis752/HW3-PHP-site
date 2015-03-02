# HW4-PHP-site

##Submission Notes
* The hosted website is available for review here: http://justinmcdowell.com/hw5/
* `create-database.sql` (located in the `database/`) contains the SQL commands for creating the database structure and inserting sample data. *NOTE: `create-database.sql` contains commands for dropping and creating the schema, in addition to the commands for creating tables and inserting sample data.*

##Repository Layout
Description of the key directories and files:

* `assignment/` - Contains the original assignment assets.
* `database/` - Contains database model and script files.
    * `create-database.sql` - The SQL script for generating the project database, with sample data.
    * `data.sql` - SQL script containing only the sample data.
    * `seis752justin_db.mwb` - MySQL Workbench model file.
    * `structure.sql` - SQL script defining database structure, generated from the MySQL Workbench model file.
    * `setup.bat` - Useful during development to run SQL scripts against the MySQL instance.
* `web/` - Contains the website files for deployment—the "web root" directory.
    * `application/`
        * `config.php-template` - Rename to `config.php` and update with database access credentials.

##Demo
`create-database.sql` inserts the 7 user records there were included in HW4 (usernames: "user1", "user2", "user3", etc.; all having password: "password") and the 2000 user records provided for HW5 (password: "abc123").
