<?php

use common\models\Fatura;
use yii\bootstrap4\LinkPager;
use yii\grid\GridView;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\FaturaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
?>
<div class="fatura-index">
    <br>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id' => [
                'label' => 'Nº Fatura',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'attribute' => 'id',
                'value' => function (Fatura $model) {
                    return $model->id;
                },
            ],
            'dataFatura' => [
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'attribute' => 'dataFatura',
                'value' => function (Fatura $model) {
                    return $model->dataFatura;
                },
            ],
            'valorTotal' => [
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'attribute' => 'valorTotal',
                'value' => function (Fatura $model) {
                    return $model->valorTotal . '€';
                },
            ],
            [
                'label' => 'PDF',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'attribute' => '',
                'format' => 'raw',
                'value' => function (Fatura $model) {
                    return Html::a('PDF', ['pdf', 'id' => $model->id], ['class' => 'btn btn-danger']);
                },
            ],
        ],
        'pager' => [
            'class' => LinkPager::class,
            'pagination' => $dataProvider->pagination,
            'maxButtonCount' => 5,
            'hideOnSinglePage' => true,
        ]
    ]); ?>
    <br>
</div>