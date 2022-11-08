<?php

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

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_Categoria') ?>

    <?= $form->field($model, 'idIva') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'descricao') ?>

    <?php // echo $form->field($model, 'imagem') 
    ?>

    <?php // echo $form->field($model, 'referencia') 
    ?>

    <?php // echo $form->field($model, 'preco') 
    ?>

    <?php // echo $form->field($model, 'nome') 
    ?>

    <?php // echo $form->field($model, 'Ativo') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>