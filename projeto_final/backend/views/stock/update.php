<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Stock $model */

$this->title = 'Update Stock: ' . $model->id_Loja;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Loja, 'url' => ['view', 'id_Loja' => $model->id_Loja, 'id_Produto' => $model->id_Produto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
