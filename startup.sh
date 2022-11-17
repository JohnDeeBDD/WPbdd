#!/bin/bash
cd /var/www/html/wp-content/plugins/WPbdd
nohup xvfb-run java -Dwebdriver.chrome.driver=/var/www/html/wp-content/plugins/WPbdd/chromedriver -jar selenium.jar &>/dev/null &
sudo mysql -u root -ppassword << EOF
DROP DATABASE wordpress;
CREATE DATABASE wordpress DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
GRANT ALL PRIVILEGES ON * . * TO 'wordpressuser'@'localhost';
FLUSH PRIVILEGES;
EOF
cd /var/www/html
sudo rm wp-config.php
wp config create --dbname=wordpress --dbuser=wordpressuser --dbpass=password --force
wp core install --dbname=wordpress --dbuser=wordpressuser --dbpass=password --force
wp core install --url="Dev Server 1" --title="A General Chicken Website" --admin_name="Codeception" --admin_password="password" --admin_email="email@email.com"
wp rewrite structure '/%postname%/'
wp option update uploads_use_yearmonth_folders 0
