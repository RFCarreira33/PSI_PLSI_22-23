<?php

namespace frontend\models;

use common\models\Dados;
use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Cliente;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $nome;
    public $codPostal;
    public $telefone;
    public $nif;
    public $morada;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['nome', 'trim'],
            ['nome', 'required'],

            ['codPostal', 'trim'],
            ['codPostal', 'required'],
            ['codPostal', 'match', 'pattern' => '^\d{4}-\d{3}?$'],

            ['telefone', 'trim'],
            ['telefone', 'required'],
            ['telefone', 'integer', 'min' => 9, 'max' => 9],

            ['nif', 'trim'],
            ['nif', 'required'],
            ['nif', 'integer', 'min' => 9, 'max' => 9],

            ['morada', 'trim'],
            ['morada', 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $ficha = new Dados();
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();

        $inf = new Cliente();
        $inf->id_User = $user->id;
        $inf->nome = $this->nome;
        $inf->codPostal = $this->codPostal;
        $inf->telefone = $this->telefone;
        $inf->nif = $this->nif;
        $inf->morada = $this->morada;
        $inf->save();

        $auth = \Yii::$app->authManager;
        $clienteRole = $auth->getRole('cliente');
        $auth->assign($clienteRole, $user->getId());

        return $user;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
