<?php

class TestCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function testArtfamily(AcceptanceTester $I) {
        $I->amOnUrl('https://art.todoninja.de');
        $I->click('Creations');
        $I->click('New Creation');
        $I->see('You are not allowed to see this page.');
        $I->click('Login');
        $I->see('Login');
        $I->fillField('email', 'test@test.test');
        $I->fillField('password', 'secret');
        $I->click('button[type=submit]');
        $I->see('New Creation');
        $I->attachFile('image', 'image.png');
        $I->seeElement('.mi-Accept');
        $I->fillField('caption', 'My awesome Test');
        $I->fillField('description', 'Test');
        $I->click('Publish creation');
        $I->click('My awesome Test');
        $I->makeScreenshot();
        $I->click('Delete');
    }

    // tests
    public function testGoogle(AcceptanceTester $I)
    {
        $I->amOnUrl('https://google.de');
        $I->fillField('q', 'Auto');
        $I->click('Google-Suche');
        $I->see('Hinweise zum Datenschutz bei Google');
        $I->click('[jsaction="fire.dismiss_warmup"]');
        $I->dontSee('Hinweise zum Datenschutz bei Google');

        $I->moveBack();
        $I->click('Auf gut Glück!');
        $I->makeScreenshot();
    }
}
