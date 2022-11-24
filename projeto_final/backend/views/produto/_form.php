<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use common\models\Iva;
use common\models\Categoria;
use common\models\Marca;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produto-form">


    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'layout' => 'horizontal',
        'class' => 'form-horizontal',
    ]); ?>

    <?= $form->field($model, 'nome')->label('Nome') ?>
    <?= $form->field($model, 'referencia')->label('Referência') ?>
    <?= $form->field($model, 'descricao')->textarea()->label('Descrição') ?>
    <?= $form->field($model, 'preco')->label('Preço') ?>
    <?= $form->field($model, 'Ativo')->dropDownList(
        ['1' => 'Ativo', '0' => 'Inativo'],
    )->label('Estado') ?>
    <?= $form->field($model, 'id_Iva')->dropDownList(Iva::find()->select(['percentagem', 'id'])->indexBy('id')->column())->label('Taxa de Iva') ?>
    <?= $form->field($model, 'id_Marca')->dropDownList(Marca::find()->select(['nome'])->indexBy('nome')->column())->label('Marca') ?>
    <?= $form->field($model, 'id_Categoria')->dropDownList(Categoria::find()->select(['nome', 'id'])->indexBy('id')->column())->label('Marca') ?>
    <?= $form->field($model, 'imagem')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>