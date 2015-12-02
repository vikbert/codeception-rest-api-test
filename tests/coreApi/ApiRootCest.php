<?php

class ApiRootCest
{
    /**
     * @var
     */
    private $apikeyParam;

    public function _before(CoreApiTester $I)
    {
        $this->apikeyParam =  array('apikey' => '123456asdfg');
    }

    public function _after(CoreApiTester $I)
    {
    }

    public function getApiRootInfo(CoreApiTester $I)
    {
        $I->wantTo('API: GET api meta info');
        $I->sendGET('/api', $this->apikeyParam);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseJsonMatchesJsonPath('$.api_creator');
        $I->seeResponseJsonMatchesJsonPath('$.api_name');
        $I->seeResponseJsonMatchesJsonPath('$.api_reference_url');
        $I->seeResponseJsonMatchesJsonPath('$.api_source');
        $I->seeResponseJsonMatchesJsonPath('$.api_version');
    }
}
