<?php

use common\models\Categoria;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Categoria $model */

$this->title = 'Criar Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-create">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome') ?>
    <?= $form->field($model, 'id_CategoriaPai')->dropDownList(Categoria::find()->select(['nome', 'id'])->indexBy('id')->column(), ['prompt' => 'Nenhuma']) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>