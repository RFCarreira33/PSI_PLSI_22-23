<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\IvaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="iva-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'horizontal',
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'percentagem') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'Ativo')->dropDownList([1 => 'Ativo', 0 => 'Inativo'], ['prompt' => 'Qualquer Estado'])->label('Estado') ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>