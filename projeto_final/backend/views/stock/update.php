<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Stock $model */

$this->title = 'Atualizar o Stock de ' . $model->produto->nome . ' na loja de ' . $model->loja->localidade;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="stock-update">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quantidade') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>