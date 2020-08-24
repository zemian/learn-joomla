## DB Setup

	```
	CREATE USER 'zemian'@'localhost' IDENTIFIED WITH mysql_native_password BY 'test123';
	CREATE DATABASE joomla351 CHARACTER SET utf8 COLLATE utf8_general_ci;
	GRANT ALL PRIVILEGES ON joomla351.* TO 'zemian'@'localhost';
	FLUSH PRIVILEGES;
	```

## This version of Joomla 3.5.1 does not work with PHP 7.4.9

* Try with PHP 5.6.40, but it is not able to compile under MacOSX10.15!

```
./configure --prefix=/usr/local/php-5.6.40 --with-iconv=/usr/local/opt/libiconv --enable-sockets --with-mysqli=mysqlnd --with-zlib=/usr/local/opt/zlib

...
/Users/zedeng/src/zemian/php-5.6.40/main/reentrancy.c:139:23: error: too few arguments to function call, expected 3,
      have 2
        readdir_r(dirp, entry);
        ~~~~~~~~~            ^
/Library/Developer/CommandLineTools/SDKs/MacOSX10.15.sdk/usr/include/dirent.h:110:1: note: 'readdir_r' declared here
int readdir_r(DIR *, struct dirent *, struct dirent **) __DARWIN_INODE64(readdir_r);
^
```

* Try with PHP 7.0.33

```
./configure --prefix=/usr/local/php-7.0.33 --with-iconv=/usr/local/opt/libiconv --enable-sockets --with-mysqli=mysqlnd --with-zlib=/usr/local/opt/zlib

...
/Users/zedeng/src/zemian/php-7.0.33/main/reentrancy.c:139:23: error: too few arguments to function call, expected 3,
      have 2
        readdir_r(dirp, entry);
        ~~~~~~~~~            ^
/Library/Developer/CommandLineTools/SDKs/MacOSX10.15.sdk/usr/include/dirent.h:110:1: note: 'readdir_r' declared here
int readdir_r(DIR *, struct dirent *, struct dirent **) __DARWIN_INODE64(readdir_r);
^
1 error generated.l
```
