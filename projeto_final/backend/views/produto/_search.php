<?php

use common\models\Categoria;
use common\models\Marca;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\ProdutoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nome') ?>
    <?= $form->field($model, 'referencia')->label('Referência') ?>
    <?= $form->field($model, 'id_Marca')->dropDownList(Marca::find()->select(['nome'])->indexBy('nome')->column(), ['prompt' => 'Todas'])->label('Marca') ?>
    <?= $form->field($model, 'id_Categoria')->dropDownList(Categoria::find()->select(['nome', 'id'])->indexBy('id')->column(), ['prompt' => 'Todas'])->label('Categoria') ?>
    <?= $form->field($model, 'Ativo')->dropDownList([1 => 'Ativo', 0 => 'Inativo'], ['prompt' => 'Qualquer Estado'])->label('Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>