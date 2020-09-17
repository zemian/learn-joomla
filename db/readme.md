## How to backup and restore DB for local dev

```
# Backup
mysqldump --single-transaction --quick --no-autocommit --extended-insert=false -u root joomladb > joomladb-`date +%s`-dump.sql

# Restore
mysql -f -u root joomladb < joomladb-<date>-dump.sql
```
