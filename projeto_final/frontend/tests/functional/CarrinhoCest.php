<?php


namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class CarrinhoCest
{
    protected $formId = '#form-signup';

    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('/site/login');
    }

    //Carrinho não é acessivel por pessoas n autenticadas
    public function checkNotAuthentication(FunctionalTester $I)
    {
        $I->click('a[id="carrinho"]');
        $I->see('Login');
    }

    //Verificar se esta acessivel depois de autenticado
    public function checkForAuthentication(FunctionalTester $I)
    {
        $I->fillField('Username', 'erau');
        $I->fillField('Password', 'password_0');
        $I->click('login-button');
        $I->see('Logout');
        $I->click('a[id="carrinho"]');
        $I->see('Carrinho de Compras');
    }

    //Efetuar uma compra valida
    public function checkValidBuy(FunctionalTester $I)
    {
        //efeuar um registo
        $I->click('Register now');
        $I->submitForm($this->formId, [
            'SignupForm[username]' => 'tester',
            'SignupForm[email]' => 'tester.email@example.com',
            'SignupForm[password]' => 'tester_password',
            'SignupForm[nome]' => 'tester_nome',
            'SignupForm[codPostal]' => '2000-000',
            'SignupForm[telefone]' => '000000000',
            'SignupForm[nif]' => '000000000',
            'SignupForm[morada]' => 'tester_morada',
        ]);
        //Efetuar login
        $I->click('Login');
        $I->fillField('Username', 'tester');
        $I->fillField('Password', 'tester_password');
        $I->click('login-button');
        $I->see('Logout');
        $I->click('.card-img-top');
        //Entra na página do produto
        $I->click('#produtoDetails1');
        $I->see('Adicionar ao Carrinho');
        $I->fillField('input[name="quantidade"]', '2');
        $I->click('Adicionar ao Carrinho');
        //No carrinho de compras
        $I->see('Carrinho de Compras');
        $I->click('a[id="comprar"]');
        $I->see('0.00€');
    }
}