<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Iva $model */

$this->title = 'Create Iva';
$this->params['breadcrumbs'][] = ['label' => 'Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iva-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'percentagem') ?>
    <?= $form->field($model, 'Ativo')->dropDownList(
        ['1' => 'Ativo', '0' => 'Inativo'],
    )->label('Estado') ?>



    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>