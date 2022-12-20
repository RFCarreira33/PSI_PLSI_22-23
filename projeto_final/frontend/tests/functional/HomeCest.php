<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnRoute(\Yii::$app->homeUrl);
        $I->see('Novas Notícias');
        $I->seeLink('Notícias');
        $I->click('Notícias');
        $I->see('Continuar a ler');
    }
}
