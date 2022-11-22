<?php

use common\models\Fatura;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\FaturaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Faturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fatura-index">

    <?php echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nome',
                'nif',
                'email:email',
                'dataFatura' => [
                    'attribute' => 'dataFatura',
                    'label' => 'Data de Emisão',
                    'format' => ['datetime', 'php:d-m-Y H:i:s']
                ],
                'valorTotal' => [
                    'attribute' => 'valorTotal',
                    'label' => 'Valor Total',
                    'value' => function (Fatura $model) {
                        return $model->valorTotal . '€';
                    }
                ],
                [
                    'attribute' => 'Ações',
                    'format' => 'raw',
                    'value' => function (Fatura $model) {
                        return Html::a('Ver', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']) . " " . Html::a('PDF', ['pdf', 'id' => $model->id], ['class' => 'btn btn-danger']);
                    },
                ],
            ],
        ],
    ); ?>


</div>