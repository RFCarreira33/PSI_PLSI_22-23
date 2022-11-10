<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Stock $model */

$this->title = $model->id_Loja;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stock-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_Loja' => $model->id_Loja, 'id_Produto' => $model->id_Produto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_Loja' => $model->id_Loja, 'id_Produto' => $model->id_Produto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_Loja',
            'id_Produto',
            'quantidade',
        ],
    ]) ?>

</div>
