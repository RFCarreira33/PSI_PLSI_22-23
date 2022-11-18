<?php

use common\models\Dados;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\DadosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = "Perfis e Contas de $role";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dados-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'telefone',
            'nif',
            'morada',
            'codPostal' => [
                'label' => 'Código Postal',
                'attribute' => 'codPostal',
                'value' => function (Dados $model) {
                    return $model->codPostal;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}',
                'urlCreator' => function ($action, Dados $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_User' => $model->id_User]);
                }
            ],
        ],
    ]); ?>


</div>