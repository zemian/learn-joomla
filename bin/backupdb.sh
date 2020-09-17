#!/bin/sh
mysqldump --single-transaction \
--quick \
--no-autocommit \
--extended-insert=false \
-u root \
joomladb > db/joomladb-`date +%s`-dump.sql
