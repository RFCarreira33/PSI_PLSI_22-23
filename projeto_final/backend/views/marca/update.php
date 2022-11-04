<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\marca $model */

$this->title = 'Update Marca: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'nome' => $model->nome]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marca-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
