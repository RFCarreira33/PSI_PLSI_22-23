<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Dados $model */

$this->title = 'Atualizar perfil de ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Dados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_User, 'url' => ['view', 'id_User' => $model->id_User]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="dados-update">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome') ?>
    <?= $form->field($model, 'telefone') ?>
    <?= $form->field($model, 'nif') ?>
    <?= $form->field($model, 'morada') ?>
    <?= $form->field($model, 'codPostal') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>