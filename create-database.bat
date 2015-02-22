rem Creates the "seismcdo8429" database from scripts.
mysql -h localhost -u root -vvv < _createDatabase.sql
mysql -h localhost -u root -vvv < database/insert-data.sql
pause
