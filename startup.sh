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
cd /var/www/html/wp-content/plugins/WPbdd/
bin/codecept run acceptance SetupWordPressCept.php -vvv
wp rewrite structure '/%postname%/'
wp option update uploads_use_yearmonth_folders 0
