<?php

class BrandsCest
{
    /**
     * @var array
     */
    private $apikeyParam;

    /**
     * @param CoreApiTester $I
     */
    public function _before(\CoreApiTester $I)
    {
        $this->apikeyParam = array('apikey' => '123456asdfg');
    }

    /**
     * @param CoreApiTester $I
     */
    public function _after(\CoreApiTester $I)
    {
    }

    /**
     * @param CoreApiTester $I
     */
    public function getBrandListWithMetaTest(\CoreApiTester $I)
    {
        $I->wantTo('BRANDS: GET list of brands with meta data');
        $I->sendGET('/api/static/brands', array_merge($this->apikeyParam, array(
            'counter' => true
        )));
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseJsonMatchesJsonPath('$.meta[0].overall_count');
    }

    /**
     * @param CoreApiTester $I
     */
    public function getBrandListWithoutMetaTest(\CoreApiTester $I)
    {
        $I->wantTo('BRANDS: GET list of brands without meta data');
        $I->sendGET('/api/static/brands', $this->apikeyParam);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->dontSeeResponseJsonMatchesJsonPath('$.meta');
    }

    /**
     * @param CoreApiTester $I
     */
    public function getSingleBrandTest(CoreApiTester $I)
    {
        $I->wantTo('BRAND: GET a brand by given ID: 1');
        $I->sendGET('/api/static/brand/1', $this->apikeyParam);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseJsonMatchesJsonPath('$.payload[0].id');
        $I->seeResponseJsonMatchesJsonPath('$.payload[0].country_id');
        $I->seeResponseJsonMatchesJsonPath('$.payload[0].created_at');
        $I->seeResponseJsonMatchesJsonPath('$.payload[0].logo_uri');
        $I->seeResponseJsonMatchesJsonPath('$.payload[0].name');
        $I->seeResponseJsonMatchesJsonPath('$.payload[0].price_base_new');
        $I->seeResponseJsonMatchesJsonPath('$.payload[0].price_base_old');
        $I->seeResponseJsonMatchesJsonPath('$.payload[0].settings');
    }

    public function getNonExistingBrandTest(\CoreApiTester $I)
    {
        $I->wantTo('BRAND: GET a brand by given ID: 999999999, NOT FOUND!');
        $I->sendGET('/api/static/brand/999999999', $this->apikeyParam);

        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(404);
    }

}
