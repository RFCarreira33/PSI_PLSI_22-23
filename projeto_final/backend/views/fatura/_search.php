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

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nome') ?>

        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'nif')->label('NIF') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'email') ?>
        </div>
        <div class="col-md-6">

            <?php echo $form->field($model, 'valorTotal') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>