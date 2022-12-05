<?php


namespace frontend\tests\Acceptance;

use frontend\tests\AcceptanceTester;

class CarrinhoCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function tryToTest(AcceptanceTester $I)
    {
        //Efetuar login
        $I->amOnPage('/site/login');
        $I->see('Login');
        $I->fillField('input[name="LoginForm[username]"]', 'cliente');
        $I->fillField('input[name="LoginForm[password]"]', 'cliente123');
        $I->click('login-button');
        $I->wait(2);
        $I->see('Logout');
        //Limpar o carrinho 
        $I->click('a[id="carrinho"]');
        $I->see('Limpar Carrinho');
        $I->wait(1);
        $I->click('a[id="clearCart"]');
        $I->wait(1);
        //voltar a pagina inicial e clicar no produto id=1
        $I->click('.card-img-top');
        $I->click('#produtoDetails1');
        $I->see('Adicionar ao Carrinho');
        $I->wait(1);
        //Alterar quantidade
        $I->fillField('input[name="quantidade"]', '2');
        $I->wait(2);
        $I->click('button[name="add-to-cart"]');
        $I->wait(2);
        $I->see('Carrinho de Compras');
        $I->wait(2);
        //Adicionar outro produto
        $I->click('.card-img-top');
        $I->wait(2);
        $I->click('#produtoDetails2');
        $I->see('Adicionar ao Carrinho');
        $I->wait(1);
        $I->fillField('input[name="quantidade"]', '3');
        $I->wait(2);
        $I->click('button[name="add-to-cart"]');
        $I->wait(2);
        //Verificar se o preço total está correto no carrinho
        $I->see('90.00€');
        $I->wait(2);
        $I->click('a[id="comprar"]');
        //Verificar se a compra foi efetuada
        $I->see('0.00€');
        $I->wait(2);
        //Voltar a homepage
        $I->click('.card-img-top');
        $I->wait(2);
        $I->see('Novas Notícias');
    }
}