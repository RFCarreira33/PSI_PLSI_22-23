<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\LinhaFaturaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="linha-fatura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_Fatura') ?>

    <?= $form->field($model, 'id_Produto') ?>

    <?= $form->field($model, 'quantidade') ?>

    <?= $form->field($model, 'valor') ?>

    <?php // echo $form->field($model, 'valorIva') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>