## How to backup and restore DB for local dev

```
# Backup
mysqldump --single-transaction --quick --no-autocommit --extended-insert=false -u root joomladb > joomladb-`date +%s`-dump.sql

# Restore
mysql -f -u root joomladb < joomladb-<date>-dump.sql
```

## DB Backup File Descriptions

* joomladb-1600344194-dump.sql - The initial installation of Joomla 3.5.1
* joomladb-1600344890-dump.sql - Add com_ola_j3 install