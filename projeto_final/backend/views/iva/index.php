<?php

use common\models\Iva;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\IvaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Taxas de Iva';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iva-index">

    <p>
        <?= Html::a('Criar uma taxa de Iva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'percentagem',
            'Ativo' => [
                'label' => 'Estado',
                'attribute' => 'Ativo',
                'value' => function (Iva $model) {
                    if ($model->Ativo == 1) {
                        return 'Ativo';
                    }
                    return 'Inativo';
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}',
                'urlCreator' => function ($action, Iva $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>