<?php

namespace backend\models;

use common\models\Dados;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\validators\StringValidator;

/**
 * Signup form
 */
class SignupForm extends Model
{
    const FUNCIONARIO = 1;
    const ADMIN = 2;

    public $username;
    public $email;
    public $password;
    public $role;
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

            ['role', 'number'],
            ['role', 'in', 'range' => [self::FUNCIONARIO, self::ADMIN]],

            ['nome', 'trim'],
            ['nome', 'required'],

            ['codPostal', 'trim'],
            ['codPostal', 'required'],
            ['codPostal', 'match', 'pattern' => '^\d{4}-\d{3}?$^', 'message' => 'Invalid Postal Code'],

            ['telefone', 'trim'],
            ['telefone', 'required'],
            ['telefone', 'match', 'pattern' => '^\d{9}?$^', 'message' => 'Invalid Phone Number'],
            ['telefone', 'string', 'max' => 9, 'message' => 'Invalid Phone Number'],

            ['nif', 'trim'],
            ['nif', 'required'],
            ['nif', 'match', 'pattern' => '^\d{9}?$^', 'message' => 'Invalid NIF'],
            ['nif', 'string', 'max' => 9, 'message' => 'Invalid NIF'],

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
        $ficha->id_User = $user->id;


        $ficha->id_User = $user->id;
        $ficha->nome = $this->nome;
        $ficha->codPostal = $this->codPostal;
        $ficha->telefone = $this->telefone;
        $ficha->nif = $this->nif;
        $ficha->morada = $this->morada;
        $ficha->save();

        $auth = \Yii::$app->authManager;

        if ($this->role == self::ADMIN && \Yii::$app->user->can("CreateAdmin")) {
            $role = $auth->getRole('admin');
        } else {
            $role = $auth->getRole('funcionario');
        }
        $auth->assign($role, $user->getId());

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