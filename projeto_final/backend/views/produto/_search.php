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
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'referencia')->label('Referência') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'id_Marca')->dropDownList(Marca::find()->select(['nome'])->indexBy('nome')->column(), ['prompt' => 'Todas'])->label('Marca') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

            <?= $form->field($model, 'id_Categoria')->dropDownList(Categoria::find()->select(['nome', 'id'])->indexBy('id')->column(), ['prompt' => 'Todas'])->label('Categoria') ?>

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