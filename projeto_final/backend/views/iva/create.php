<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Iva $model */

$this->title = 'Criar Taxa de Iva';
$this->params['breadcrumbs'][] = ['label' => 'Taxas de Iva', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iva-create">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'percentagem') ?>
    <?= $form->field($model, 'Ativo')->dropDownList(
        ['1' => 'Ativo', '0' => 'Inativo'],
    )->label('Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>