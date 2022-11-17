<?php


$I = new AcceptanceTester($scenario);

$I->wantTo('See that websites are up and running');
$I->amOnUrl("https://generalchicken.guru");
$I->see("WordPress");

$I->amOnUrl("https://email-tunnel.com");
$I->see("Send Emails Via Another Site");