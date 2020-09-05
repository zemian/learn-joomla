This repo contains notes on how to seutp and run Joomla 3.5.1.

## Requires Software

* Joomla 3.5.1 (This repository code)
* PHP 5.6
* MySQL 5.6
* Lighttpd 1.4.55

## DB Setup

```
CREATE USER 'zemian'@'localhost' IDENTIFIED BY 'test123';
CREATE DATABASE joomladb CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON joomladb.* TO 'zemian'@'localhost';
FLUSH PRIVILEGES;
```

NOTE: For newer version of MySQL (eg: version 8+), you might need to use the following for user password:

	CREATE USER 'zemian'@'localhost' IDENTIFIED WITH mysql_native_password BY 'test123';

## How to run

```
lighttpd -D -f lighttpd/lighttpd-php.conf
```

* Default login: `admin`/`test123` (This is only my local test installation. Use your own setup)
* Admin: http://localhost:3000/administrator/

## Installation Joomla 3.5.1 with PHP 5.6.40

The Joomla 3.5.1 has many extensions that still uses older verison of PHP 5.

* Note that the `installation` folder has been removed as part of the setup.


## Installation notes with PHP 7.4.9

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

## How to resetup Joomla installation

After installation, it ask you to remove `installation` folder. We make a copy under `installation-remove-me` instead. So rename this back to `installation` and remove `configuration.php` will prompt you to re-install the DB again.

## How to backup and restore DB for local dev

```
# Backup
mysqldump --single-transaction --quick --no-autocommit --extended-insert=false -u zemian -p joomladb > joomladb-`date +%s`-dump.sql

# Restore
mysql -f -u zemian -p joomladb < joomladb-<date>-dump.sql
```