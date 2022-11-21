<?php

use common\models\Fatura;
use yii\helpers\Url;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\FaturaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="fatura-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id' => [
                'label' => 'Nº Fatura',
                'attribute' => 'id',
                'value' => function (Fatura $model) {
                    return $model->id;
                },
            ],
            'dataFatura',
            'valorTotal',
            [
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}',
                'urlCreator' => function ($action, Fatura $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>