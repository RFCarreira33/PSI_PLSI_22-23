<?php


namespace frontend\tests\Acceptance;

use frontend\tests\AcceptanceTester;

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/site/login');
        $I->see('Login');
        $I->fillField('input[name="LoginForm[username]"]', 'cliente');
        $I->fillField('input[name="LoginForm[password]"]', 'cliente123');
        $I->click('login-button');
        $I->wait(3);
        $I->see('Logout');
        $I->click('#produtoDetails1');
        $I->see('Adicionar ao Carrinho');
        $I->wait(3);
        $I->fillField('input[name="quantidade"]', '2');
        $I->wait(3);
        $I->click('button[name="add-to-cart"]');
        $I->wait(3);
        $I->see('GTX 1060');
        $I->click('a[data-method="POST"]');
        $I->wait(3);
        $I->click('.card-img-top');
        $I->wait(3);
        $I->see('Novas Notícias');
    }
}