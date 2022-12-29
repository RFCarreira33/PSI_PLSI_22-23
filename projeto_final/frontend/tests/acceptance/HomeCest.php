<?php

namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage('/site/home');
        $I->wait(2);
        $I->see('Novas Notícias');
        $I->wait(2); // wait for page to be opened
    }
}
