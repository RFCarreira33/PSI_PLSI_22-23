<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\ClienteSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cliente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idUser') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'telefone') ?>

    <?= $form->field($model, 'nif') ?>

    <?= $form->field($model, 'morada') ?>

    <?php // echo $form->field($model, 'codPostal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
