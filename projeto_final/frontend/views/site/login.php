<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
?>
<br>
<div class="site-login" style="text-align: center;">
    <br>
    <div class="row">
        <div class="col-lg-5" style="max-width: 500px;margin: auto;border: 2px solid black;margin-bottom: 50px;background-color:#333;border-radius: 25px;">
            <br>
            <h2 style="color: white;"><?= Html::encode($this->title) ?></h2>

            <p style="color: white;">Preencha os campos para efetuar o login:</p>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div style="color: white;text-align:left">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="my-1 mx-0" style="color:white;">
                Resetar Password <?= Html::a('aqui', ['site/request-password-reset']) ?>.
                <br>
                Não tem conta? <?= Html::a('Registe-se', ['site/signup']) ?>
            </div>
            <br>
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-light', 'name' => 'login-button']) ?>
            </div>
            <br>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>