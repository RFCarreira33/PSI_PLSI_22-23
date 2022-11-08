<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\DadosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_User') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'telefone') ?>

    <?= $form->field($model, 'nif') ?>

    <?= $form->field($model, 'morada') ?>

    <?php // echo $form->field($model, 'codPostal') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>