This is a WordPress plugin, part of a tutorial on Behavior Driven Development for WordPress, from generalchicken.net.

Installation:
This plugin has a few requirements. You'll need a WordPress install, and admin / sudo access to the shell. This assumes Git and Composer are installed on the system globally.

Navigate to your WordPress plugin directory. On a Ubuntu system this is:
cd /var/www/html/wp-content/plugins

Clone into the Git repository:
git clone https://github.com/JohnDeeBDD/WPbdd.git

Move into the directory:
cd WPbdd

Install the vendor files:
composer install

Run your first test:
bin/codecept run unit -vv --html
