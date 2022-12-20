<?php

use common\models\Loja;
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lojas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loja-index">

    <p>
        <?= Html::a('Criar Loja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_Empresa' => [
                'attribute' => 'id_Empresa',
                'label' => 'Empresa',
                'value' => function ($model) {
                    return $model->empresa->designacaoSocial;
                },
            ],
            'localidade',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Loja $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
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