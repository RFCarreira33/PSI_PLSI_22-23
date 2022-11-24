<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \backend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Criar uma nova conta';
?>
<div class="site-signup">

    <p>Preencha o formulário para criar uma nova conta</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Nome de Utilizador (Usado para autenticação)') ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput()->label('Palavra Passe') ?>

            <?= $form->field($model, 'nome') ?>

            <?= $form->field($model, 'codPostal')->label('Código de Postal') ?>

            <?= $form->field($model, 'telefone') ?>

            <?= $form->field($model, 'nif')->label('NIF') ?>

            <?= $form->field($model, 'morada') ?>

            <?php
            $disable = true;
            if (\Yii::$app->user->can('createAdmin')) {
                $disable = false;
            }

            echo $form->field($model, 'role')->dropdownList(
                [
                    1 => 'Funcionário',
                    2 => 'Admin'
                ],
                ['prompt' => 'Seleciona um cargo (Predefenido como Funcionário)', 'disabled' => $disable]
            )->label('Cargo') ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>