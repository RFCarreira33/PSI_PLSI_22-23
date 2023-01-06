<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Empresa $model */

$this->title = "Atualizar $model->designacaoSocial";
$this->params['breadcrumbs'][] = ['label' => $model->designacaoSocial, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="empresa-update">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'layout' => 'horizontal',
        'class' => 'form-horizontal',
    ]); ?>

    <?= $form->field($model, 'designacaoSocial')->label('Designação Social') ?>
    <?= $form->field($model, 'email')->label('Email') ?>
    <?= $form->field($model, 'telefone')->label('Telefone') ?>
    <?= $form->field($model, 'nif')->label('NIF') ?>
    <?= $form->field($model, 'morada')->label('Morada') ?>
    <?= $form->field($model, 'codPostal')->label('Código Postal') ?>
    <?= $form->field($model, 'localidade')->label('Localidade') ?>
    <?= $form->field($model, 'capitalSocial')->label('Capital Social') ?>
    <?= $form->field($model, 'imgLogo')->fileInput()->label('Imagem do Logótipo') ?>
    <?= $form->field($model, 'imgBanner')->fileInput()->label('Imagem do Banner') ?>
    <?= $form->field($model, 'favIcon')->fileInput()->label('FavIcon') ?>
    <?= $form->field($model, 'codigoDesconto')->label('Código de Desconto') ?>
    <?= $form->field($model, 'valorDesconto')->label('Valor de Desconto') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>