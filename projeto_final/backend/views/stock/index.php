<?php

use common\models\Stock;
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\StockSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Stocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">

    <?php echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_Loja' => [
                'label' => 'Loja',
                'attribute' => 'id_Loja',
                'value' => function (Stock $model) {
                    return $model->loja->localidade;
                }
            ],
            'id_Produto' => [
                'label' => 'Produto',
                'attribute' => 'id_Produto',
                'value' => function (Stock $model) {
                    return $model->produto->nome;
                }
            ],
            'quantidade',
            [
                'class' => 'yii\grid\ActionColumn', 'template' => '{update}',
                'urlCreator' => function ($action, Stock $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_Loja' => $model->id_Loja, 'id_Produto' => $model->id_Produto]);
                }
            ],
        ],
        'pager' => [
            'class' => LinkPager::class,
            'pagination' => $dataProvider->pagination,
            'maxButtonCount' => 5,
            'hideOnSinglePage' => true,
        ],
    ]); ?>

</div>