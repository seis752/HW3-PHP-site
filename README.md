# HW4-PHP-site

##Homework Submission
* The hosted website is available for review here: http://justinmcdowell.com/hw4/
* `create-database.sql` (located in the `database/`) contains the SQL commands for creating the database structure and inserting sample data. *NOTE: `create-database.sql` contains commands for dropping and creating the schema, in addition to the commands for creating tables and inserting sample data.*
* `SUMMARY.txt` is the write-up addressing the response questions.

##Repository Layout
Description of the key directories and files:

* `assignment/` - Contains the original assignment assets.
* `database/` - Contains database model and script files.
    * `create-database.sql` - The SQL script for generating the project database, with sample data.
    * `data.sql` - SQL script containing only the sample data.
    * `seis752justin_db.mwb` - MySQL Workbench model file.
    * `structure.sql` - SQL script defining database structure, generated from the MySQL Workbench model file.
    * `setup.bat` - Useful during development to run SQL scripts against the database.
* `web/` - Contains the website files for deployment—the "web root" directory.
    * `application/config.php` - Contains database access credentials
* `SUMMARY.txt` - The written submission for the assignment.
