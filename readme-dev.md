## DB Setup

	```
	CREATE USER 'zemian'@'localhost' IDENTIFIED WITH mysql_native_password BY 'test123';
	CREATE DATABASE joomla351 CHARACTER SET utf8 COLLATE utf8_general_ci;
	GRANT ALL PRIVILEGES ON joomla351.* TO 'zemian'@'localhost';
	FLUSH PRIVILEGES;
	```

## Installation notes

* This Joomla 3.5.1 is setup to run with PHP 7.4.9
* Default login: admin/test123
