#!/usr/bin/env sh
echo "Starting http://localhost:3001"
lighttpd -D -f bin/lighttpd-php.conf
