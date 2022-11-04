<?php

use common\models\Dados;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\DadosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Dados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dados-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dados', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUser',
            'nome',
            'telefone',
            'nif',
            'morada',
            'codPostal',
            [
                'class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}',
                'urlCreator' => function ($action, Dados $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idUser' => $model->idUser]);
                }
            ],
        ],
    ]); ?>


</div>