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
    const CLIENTE = 1;
    const FUNCIONARIO = 2;

    public $username;
    public $email;
    public $password;
    public $role;


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

            ['role', 'required'],
            ['role', 'number'],
            ['role', 'in', 'range' => [self::CLIENTE, self::FUNCIONARIO]]

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
        $ficha->save();

        $auth = \Yii::$app->authManager;

        if ($this->role == self::FUNCIONARIO) {
            $role = $auth->getRole('funcionario');
        } else {
            $role = $auth->getRole('cliente');
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