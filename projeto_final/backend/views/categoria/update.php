<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use common\models\Categoria;

/** @var yii\web\View $this */
/** @var common\models\Categoria $model */

$this->title = 'Atualizar Categoria: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="categoria-update">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'class' => 'form-horizontal',
    ]); ?>

    <?= $form->field($model, 'nome') ?>
    <?= $form->field($model, 'id_CategoriaPai')->dropDownList(
        Categoria::find()->where(['not in', 'id', $model->id])->select(['nome', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Nenhuma']
    )->label('Categoria Pai') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>