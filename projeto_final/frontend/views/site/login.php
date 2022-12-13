<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
?>
<br>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Preencha os campos para efetuar o login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="my-1 mx-0" style="color:#999;">
                Resetar Password: <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                <br>
                Nao tem conta? <?= Html::a('Registe-se', ['site/signup']) ?>
            </div>
            <br>
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <br>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>