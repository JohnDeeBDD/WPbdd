<?php
/**
 *   GIVEN / ARRANGE
 */
$I = /*am a */ new AcceptanceTester($scenario);
$I->loginAsAdmin();
$I->amOnPage("/wp-admin/post-new.php");
$I->fillField('#content', "[first-testable-shortcode]");
$I->click('#publish');

/**
 *   WHEN / ACT
 */
$I->click("View Post");

/**
 *   THEN / ASSERT
 */
$I->see('Hello World!');