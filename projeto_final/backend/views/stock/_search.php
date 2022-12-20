<?php

use common\models\Loja;
use common\models\Produto;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\StockSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'horizontal',
    ]); ?>

    <?= $form->field($model, 'id_Loja')->dropDownList(Loja::find()->select(['localidade', 'id'])->indexBy('id')->column(), ['prompt' => 'Todas'])->label('Loja') ?>
    <?= $form->field($model, 'quantidade')->dropDownList([1 => 'Em stock', 0 => 'Sem Stock'], ['prompt' => 'Todas'])->label('Stock') ?>

    <?= $form->field($model, 'id_Produto')->dropDownList(Produto::find()->select(['nome', 'id'])->indexBy('id')->column(), ['prompt' => 'Todos'])->label('Produto') ?>


    <div class="form-group">
        <?= Html::submitButton('Filtrar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>