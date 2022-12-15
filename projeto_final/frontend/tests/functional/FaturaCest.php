<?php


namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\models\Dados;
use common\models\User;

class FaturaCest
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
        $user = new User();
        $auth = \Yii::$app->authManager;
        $user->username = "cliente2";
        $user->email = "cliente2@gmail.com";
        $user->setPassword("cliente123");
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();
        $auth->assign($auth->getRole('cliente'), $user->getId());
        $dados = new Dados();
        $dados->nome = "cliente2";
        $dados->codPostal = "2200-000";
        $dados->telefone = "912245678";
        $dados->nif = "123456729";
        $dados->morada = "cliente morada";
        $dados->id_User = $user->id;
        $dados->save();

        $I->amOnRoute('/site/login');
    }

    //Carrinho não é acessivel por pessoas não autenticadas
    public function checkNotAuthentication(FunctionalTester $I)
    {
        $I->click('a[id="dados"]');
        $I->see('Login');
    }

    //Verificar se esta acessivel depois de autenticado
    public function checkForAuthentication(FunctionalTester $I)
    {
        $I->see('Login');
        $I->fillField('Username', 'cliente2');
        $I->fillField('Password', 'cliente123');
        $I->click('login-button');
        $I->see('Logout');
        $I->click('a[id="dados"]');
        $I->see('Área Pessoal');
    }

    //Efetuar uma compra valida
    public function checkInvoice(FunctionalTester $I)
    {
        //Efetuar login
        $I->click('Login');
        $I->fillField('Username', 'cliente2');
        $I->fillField('Password', 'cliente123');
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
        $I->click('a[id="dados"]');
        //Na área pessoal
        $I->see('Área Pessoal');
        $I->click('As minhas encomendas');
        $I->dontSee('No results found.');
    }
}
