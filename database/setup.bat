rem Generate the "seis752justin_db" database from scripts

mysql -h localhost -u root -vvv < create.sql
mysql -h localhost -u root -vvv < insert.sql

pause
