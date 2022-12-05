<?php


namespace frontend\tests\Acceptance;

use frontend\tests\AcceptanceTester;

class CarrinhoCest
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
        $I->wait(2);
        $I->see('Logout');
        $I->click('#produtoDetails1');
        $I->see('Adicionar ao Carrinho');
        $I->wait(1);
        $I->fillField('input[name="quantidade"]', '2');
        $I->wait(2);
        $I->click('button[name="add-to-cart"]');
        $I->wait(2);
        $I->see('Carrinho de Compras');
        $I->wait(2);
        $I->click('.card-img-top');
        $I->wait(2);
        $I->click('#produtoDetails2');
        $I->see('Adicionar ao Carrinho');
        $I->wait(1);
        $I->fillField('input[name="quantidade"]', '3');
        $I->wait(2);
        $I->click('button[name="add-to-cart"]');
        $I->wait(2);
        $I->see('90.00€');
        $I->wait(2);
        $I->click('a[data-method="POST"]');
        $I->click('.card-img-top');
        $I->wait(2);
        $I->see('Novas Notícias');
    }
}