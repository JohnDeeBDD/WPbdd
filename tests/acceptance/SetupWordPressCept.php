<?php 
$I = new AcceptanceTester($scenario);

$commandToGetLocalIP = "dig +short myip.opendns.com @resolver1.opendns.com";
$IP = shell_exec($commandToGetLocalIP);
$IP = substr_replace($IP, "", -1);
$I->reconfigureThisVariable(['url' => "http://$IP/"]);
$I->wantTo('Setup WordPress');
$I->amOnPage("/wp-admin/setup-config.php?step=1");
$I->see("Below you should enter your database connection details.");
$I->fillField('dbname', 'wordpress');
$I->fillField('uname', 'wordpressuser');
$I->click('.button');
$I->click('.button');
$I->fillField('weblog_title', 'General Chicken Cloud Dev Server');
$I->fillField('user_name', 'Codeception');
//$I->fillField('#pass1-text', 'password');
$I->fillField(['id' => 'pass1'], 'password');
$I->fillField('admin_email', 'admin@email.com');
$I->checkOption('pw_weak');
$I->click('#submit');
sleep(3);
$myFile = "/var/www/html/wp-config.php";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "define('FS_METHOD', 'direct');\n";
fwrite($fh, $stringData);
fclose($fh);

