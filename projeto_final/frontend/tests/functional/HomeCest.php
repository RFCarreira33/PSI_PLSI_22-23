<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnRoute('site/home');
        $I->see('Novas Notícias');
        $I->seeLink('Notícias');
    }
}
