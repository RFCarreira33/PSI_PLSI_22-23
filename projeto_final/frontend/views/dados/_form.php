<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Dados $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dados-form">

    <?php $form = ActiveForm::begin(); ?>
    <br>
    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    <br>
    <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>
    <br>
    <?= $form->field($model, 'nif')->textInput(['maxlength' => true])->label("NIF") ?>
    <br>
    <?= $form->field($model, 'morada')->textInput(['maxlength' => true]) ?>
    <br>
    <?= $form->field($model, 'codPostal')->textInput(['maxlength' => true])->label("Código Postal") ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-dark']) ?>
    </div>
    <br>
    <?php ActiveForm::end(); ?>

</div>