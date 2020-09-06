This repo contains notes on how to seutp and run Joomla 3.5.1.

## Setup MySQL, PHP and WebServer

See [learn-php readme.md](https://github.com/zemian/learn-php) on how to setup PHP for development.

NOTE: The `joomla` folder contains version `3.5.1` distribution. This version runs best if you use:

* PHP 5.6
* MySQL 5.7

## Setup Database

Login as root and create a empty databse for wordpress:

	mysql -u root

```sql
CREATE USER 'zemian'@'localhost' IDENTIFIED WITH mysql_native_password BY 'test123';
CREATE DATABASE joomladb CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON wordpressdb.* TO 'zemian'@'localhost';
FLUSH PRIVILEGES;
```

NOTE: For newer version of MySQL (eg: version 8+), you might need to use the following for user password:

	CREATE USER 'zemian'@'localhost' IDENTIFIED WITH mysql_native_password BY 'test123';
	CREATE DATABASE joomladb CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

## Setup WebServer

Pick one of the web server setup mentioned in `learn-php`, and it should setup your DocumentRoot to that repository folder. Assume you got it up and running, then you can simply link this `learn-joomla/joomla` as application under there.

	ln -s $(pwd)/joomla ../learn-php/www/apps

Now you can open http://localhost:3000/apps/joomla

First time setup will create the database and setup the application settings. Note that the `installation` folder has been removed as part of the setup.

Extra links:

* Default login: `admin`/`test123` (This is only my local test installation. Use your own setup)
* Admin: http://localhost:3000/apps/joomla/administrator/

## Installation Joomla 3.5.1 with PHP 5.6.40 notes

The Joomla 3.5.1 has many extensions that still uses older verison of PHP 5.

## Installation Joomla 3.5.1 with PHP 7.4.9 notes

* The default Joomla 3.5.1 will not work with PHP 7.4.9. Had to fix few Joomla source files to get it installed.
	
	- Example of error: 

		```
		Warning: count(): Parameter must be an array or an object that implements Countable in /Users/zedeng/src/zemian/universalcop-com/unicop-joomla-site/libraries/cms/application/cms.php on line 460
		```
	
	- You can fix it by doing param check before pass to `count()` like this:

		```
		// Zemian fix: count() is not Countable Warning - prevented installation
		// this error occur only for PHP 7.4.9  with Joomla 3.5.1
		if ($sessionQueue && count($sessionQueue))
		```

	- Files needs to be fixed:

		* `libraries/cms/application/cms.php`
		* `libraries/joomla/updater/updater.php`

	- Even though this works, we still see many Warnnings though.

## How to re-setup Joomla installation

After installation, it ask you to remove `installation` folder. We make a copy under `installation-remove-me` instead. So rename this back to `installation` and remove `configuration.php` will prompt you to re-install the DB again.
```

## Joomla and PHP debugging

Try setting the following in `configuration.php`

```
public $error_reporting = 'simple';
```

NOTE: PHP Warning is not just warnings, it actually stop application working!
