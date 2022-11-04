<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Stock $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idLoja')->textInput() ?>

    <?= $form->field($model, 'idProduto')->textInput() ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
