<?php 

$tester = new githubTester($scenario);
$tester->wantTo('get the list of github users');
$tester->sendGET('/users');
$tester->seeResponseCodeIs(200);
$tester->seeResponseIsJson();

$tester = new githubTester($scenario);
$tester->wantTo('get the single user details');
$tester->sendGET('/user');
$tester->seeResponseCodeIs(401);
$tester->seeResponseContains('Requires authentication');
