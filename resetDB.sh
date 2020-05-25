#!/bin/sh
#
# source <(curl -s https://raw.githubusercontent.com/Hitman007/Remote-BDD-Setup/master/installScripts/wordpress.sh)
# Directions: http://customrayguns.com/wp-bdd-software/
#
sudo rm -fr /var/www/html/wp-config.php
mysql -u root -ppassword << EOF
DROP DATABASE wordpress_unit_test;
CREATE DATABASE wordpress_unit_test DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
GRANT ALL ON wordpress_unit_test.* TO 'wordpressuser'@'localhost' IDENTIFIED BY 'password';
DROP DATABASE wordpress;
CREATE DATABASE wordpress DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
GRANT ALL ON wordpress.* TO 'wordpressuser'@'localhost' IDENTIFIED BY 'password';
FLUSH PRIVILEGES;
EOF
