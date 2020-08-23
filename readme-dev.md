## DB Setup

	```
	CREATE USER 'zemian'@'localhost' IDENTIFIED WITH mysql_native_password BY 'test123';
	CREATE DATABASE joomla351 CHARACTER SET utf8 COLLATE utf8_general_ci;
	GRANT ALL PRIVILEGES ON joomla351.* TO 'zemian'@'localhost';
	FLUSH PRIVILEGES;
	```
