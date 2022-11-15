<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \backend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Create a new account';
?>
<div class="site-signup">

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'nome') ?>

            <?= $form->field($model, 'codPostal') ?>

            <?= $form->field($model, 'telefone') ?>

            <?= $form->field($model, 'nif') ?>

            <?= $form->field($model, 'morada') ?>

            <?php
            $disable = true;
            if (\Yii::$app->user->can('AdminCreate')) {
                $disable = false;
            }

            echo $form->field($model, 'role')->dropdownList(
                [
                    1 => 'Funcionário',
                    2 => 'Admin'
                ],
                ['prompt' => 'Select a Role (Defaults to Funcionário)', 'disabled' => $disable]
            ) ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>