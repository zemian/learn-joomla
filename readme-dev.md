## DB Setup

```
CREATE USER 'zemian'@'localhost' IDENTIFIED WITH mysql_native_password BY 'test123';
CREATE DATABASE joomla351db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
GRANT ALL PRIVILEGES ON joomla351db.* TO 'zemian'@'localhost';
FLUSH PRIVILEGES;
```

### How to backup and restore DB for local dev

```
# Backup
mysqldump --single-transaction --quick --no-autocommit --extended-insert=false -u zemian -p joomla351db > joomla351db-`date +%s`-dump.sql

# Restore
mysql -f -u zemian -p joomla351db < joomla351db-<date>-dump.sql
```

## How to run

```
lighttpd -D -f lighttpd/lighttpd-php.conf
open http://localhost:3000/adminstrator
```

## Installation Joomla 3.5.1 with PHP 5.6.40

The Joomla 3.5.1 has many extensions that still uses older verison of PHP 5.

* Default login: admin/test123

* Admin: http://localhost:3000/administrator/

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
