<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\LinhaFatura $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="linha-fatura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idFatura')->textInput() ?>

    <?= $form->field($model, 'idProduto')->textInput() ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valorIva')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
