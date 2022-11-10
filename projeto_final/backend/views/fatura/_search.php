<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\FaturaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fatura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_Cliente') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'nif') ?>

    <?= $form->field($model, 'codPostal') ?>

    <?php // echo $form->field($model, 'telefone') ?>

    <?php // echo $form->field($model, 'morada') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'dataFatura') ?>

    <?php // echo $form->field($model, 'valorTotal') ?>

    <?php // echo $form->field($model, 'valorIva') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
