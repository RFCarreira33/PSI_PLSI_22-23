<?php

use common\models\Categoria;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\CategoriaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categoria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nome') ?>
    <!-- getCategoriasPai filters categorias never used as Categoria Pai e devolve ids-->
    <?= $form->field($model, 'id_CategoriaPai')->dropDownList(Categoria::find()->where(['id' => Categoria::getCategoriasPai()])->select(['nome', 'id'])->indexBy('id')->column(), ['prompt' => 'Qualquer uma'])->label('Categoria Pai') ?>


    <div class="form-group">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>