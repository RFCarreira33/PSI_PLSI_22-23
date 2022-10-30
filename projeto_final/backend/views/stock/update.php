<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Stock $model */

$this->title = 'Update Stock: ' . $model->idLoja;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLoja, 'url' => ['view', 'idLoja' => $model->idLoja, 'idProduto' => $model->idProduto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
