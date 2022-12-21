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
            'codDesconto' => [
                'label' => 'Código de Desconto',
                'attribute' => 'codDesconto',
                'value' => function (Dados $model) {
                    switch ($model->codDesconto) {
                        case "Sim":
                            return "Por usar";
                            break;
                        case "Não":
                            return "Usado";
                            break;
                        default:
                            return "Sem acesso";
                    }
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