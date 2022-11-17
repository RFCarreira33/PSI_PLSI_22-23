<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Categoria;

/** @var yii\web\View $this */
/** @var common\models\Categoria $model */

$this->title = 'Update Categoria: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

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