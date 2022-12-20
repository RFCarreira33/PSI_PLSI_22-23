<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\models\Dados;
use common\models\User;

/**
 * Class LoginCest
 */
class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }
    
    protected function formParams($login, $password)
    {
        return [
            'LoginForm[username]' => $login,
            'LoginForm[password]' => $password,
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $user = new User();
        $auth = \Yii::$app->authManager;
        $user->username = "era";
        $user->email = "era@gmail.com";
        $user->setPassword("password_0");
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();
        $auth->assign($auth->getRole('admin'), $user->getId());
        $dados = new Dados();
        $dados->nome = "era";
        $dados->codPostal = "2100-000";
        $dados->telefone = "913345678";
        $dados->nif = "123356789";
        $dados->morada = "cliente morada";
        $dados->id_User = $user->id;
        $dados->save();

        $user = new User();
        $auth = \Yii::$app->authManager;
        $user->username = "er";
        $user->email = "er@gmail.com";
        $user->setPassword("password_0");
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();
        $auth->assign($auth->getRole('cliente'), $user->getId());
        $dados = new Dados();
        $dados->nome = "er";
        $dados->codPostal = "2200-000";
        $dados->telefone = "913349678";
        $dados->nif = "123396789";
        $dados->morada = "cliente morada";
        $dados->id_User = $user->id;
        $dados->save();

        $I->amOnRoute('/site/login');
    }

    public function checkEmpty(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('', ''));
        $I->seeValidationError('Username cannot be blank.');
        $I->seeValidationError('Password cannot be blank.');
    }

    public function checkWrongPassword(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('admin', 'wrong'));
        $I->seeValidationError('Incorrect username or password.');
    }

    public function checkForbiddenRole(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('er', 'password_0'));
        $I->dontSeeValidationError('Username cannot be blank.'); //username isn't empty
        $I->dontSeeValidationError('Password cannot be blank.'); //password isn't empty
        $I->dontSeeValidationError('Incorrect username or password.'); //credentials are correct
        $I->see('Sign in to start your session');
    }

    public function loginUser(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('era', 'password_0'));
        $I->see("era");
    }

    
}
