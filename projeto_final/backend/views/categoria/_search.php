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

    <?= $form->field($model, 'id_CategoriaPai')->dropDownList(Categoria::find()->select(['nome', 'id'])->indexBy('id')->column(), ['prompt' => 'Todas'])->label('Categoria Pai') ?>

    <?= $form->field($model, 'nome') ?>

    <div class="form-group">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>