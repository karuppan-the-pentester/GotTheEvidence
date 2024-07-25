#! /bin/bash

service mysql start

echo "ssh Started....."
service ssh start

echo "Apachec2 Started....."
apachectl -D FOREGROUND

echo "Changing File Modes"
chmod 777 /var/www/html/admin/gallery/
chmod 777 /var/www/html/admin/gallery/*
chmod 777 /var/www/html/admin/gallery/uploads/
chmod 777 /var/www/html/admin/gallery/uploads/*

exec /bin/bash

