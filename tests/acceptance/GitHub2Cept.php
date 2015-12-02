<?php 
$I = new WebGuy($scenario);
$I->wantTo('find facebook/php-webdriver on GitHub');
$I->amOnPage('/');
$I->fillField('.js-site-search-focus','php-webdriver');
$I->pressKey('.js-site-search-focus', WebDriverKeys::ENTER);
$I->seeLink('facebook', '/facebook/php-webdriver');

