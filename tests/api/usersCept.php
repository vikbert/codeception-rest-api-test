<?php 

$tester = new fakeApiTester($scenario);
$tester->wantTo('get the list of github users');
$tester->sendGET('/users');
$tester->seeResponseCodeIs(200);
$tester->seeResponseIsJson();

