#! /bin/bash

service mysql start
apachectl -D FOREGROUND

echo "got_the_evidence{Evidence_found_bhaiya}" > flag.txt

echo "Setting password for: root" 
echo "root:12345678" | chpasswd

echo "Password changed"

pip install requests
python /var/www/html/AdminSimulation.py &


