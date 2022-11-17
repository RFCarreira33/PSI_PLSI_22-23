<?php

use common\models\Iva;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Marca;
use common\models\Categoria;


/** @var yii\web\View $this */
/** @var common\models\Produto $model */

$this->title = 'Create Produto';
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->label('Nome') ?>
    <?= $form->field($model, 'referencia')->label('Referencia') ?>
    <?= $form->field($model, 'descricao')->label('Descrição') ?>
    <?= $form->field($model, 'imagem') ?>
    <?= $form->field($model, 'preco')->label('Preço') ?>
    <?= $form->field($model, 'id_Iva')->dropDownList(Iva::find()->select(['percentagem', 'id'])->indexBy('id')->column())->label('Taxa de Iva') ?>
    <?= $form->field($model, 'id_Marca')->dropDownList(Marca::find()->select(['nome'])->indexBy('nome')->column())->label('Marca') ?>
    <?= $form->field($model, 'id_Categoria')->dropDownList(Categoria::find()->select(['nome', 'id'])->indexBy('id')->column())->label('Marca') ?>
    <?= $form->field($model, 'Ativo')->dropDownList([0 => 'Inativo', 1 => 'Ativo'])->label('Estado') ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>