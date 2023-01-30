<?php


namespace frontend\tests\Acceptance;

use common\models\Produto;
use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Chrome\ChromeOptions;
use frontend\tests\AcceptanceTester;

class CarrinhoCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->maximizeWindow();
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
        $I->scrollTo('a[id="backToHome"]');
        $I->wait(1);
        $I->click('a[id="clearCart"]');
        $I->wait(1);
        $I->click('button[class="ajs-button ajs-ok"]');
        //voltar a pagina inicial e clicar no produto id=1
        $I->click('.card-img-top');
        $I->click('#produtoDetails1');
        $preco1 = $I->grabTextFrom('span[id="preco"]');
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
        $preco2 = $I->grabTextFrom('span[id="preco"]');
        $I->see('Adicionar ao Carrinho');
        $I->wait(1);
        $I->fillField('input[name="quantidade"]', '3');
        $I->wait(2);
        $I->click('button[name="add-to-cart"]');
        $I->wait(2);
        //Verificar se o preço total está correto no carrinho
        $total = $preco1 * 2 + $preco2 * 3;
        $I->see(number_format($total, 2, '.', ''));
        $I->wait(2);
        $I->scrollTo('a[id="clearCart"]');
        $I->click('button[id="comprar"]');
        //Página de checkout
        $I->see('Finalizar Compra');
        $I->fillField('input[name="nome"]', 'Cliente');
        $I->fillField('input[name="numero"]', '4523243525432453');
        $I->fillField('input[name="MM"]', '12');
        $I->fillField('input[name="YY"]', '12');
        $I->fillField('input[name="CVV"]', '123');
        $I->wait(3);
        $I->click('button[id="comprar"]');
        //Verificar se a compra foi efetuada
        $I->see('0.00€');
        $I->wait(2);
        //Voltar a homepage
        $I->click('.card-img-top');
        $I->wait(2);
        $I->see('Novas Notícias');
    }
}
