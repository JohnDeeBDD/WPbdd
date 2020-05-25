<?php

$I = /*am a */ new AcceptanceTester($scenario);

$I->wantTo('See how Iframes work');
$I->amOnUrl("https://wp-bdd.com/codeception-iframe/");
$I->dontSee("No one knows who discovered water");

//Switch by name
$I->switchToIFrame("IFrameByName");
$I->see("No one knows who discovered water");

//switch back to parent
$I->switchToIFrame();
$I->dontSee("No one knows who discovered water");

//Switch by ID
$I->switchToIFrame("IFrameByID");
$I->see("No one knows who discovered water");
$I->dontSee('Lorum Ipsum');//switch back to parent
$I->switchToIFrame();
$I->dontSee("No one knows who discovered water");

//switch back to parent
$I->switchToIFrame();
$I->dontSee("No one knows who discovered water");
