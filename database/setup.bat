rem Generate the "seis752justin_db" database from scripts
rem Update host/user/password as necessary for your environment

rem "create-database.sql" is "structure.sql" + "data.sql"
rem mysql -h localhost -u root -vvv < create-database.sql

mysql -h localhost -u root -vvv < structure.sql
mysql -h localhost -u root -vvv < data.sql

pause
