<?php

use common\models\Fatura;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\FaturaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="fatura-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
                'attribute' => '',
                'format' => 'raw',
                'value' => function (Fatura $model) {
                    return Html::a('PDF', ['pdf', 'id' => $model->id], ['class' => 'btn btn-danger']);
                },
            ],
        ],
    ]); ?>


</div>