<?php

use common\models\Produto;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Marca $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="marca-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'nome' => $model->nome], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
        ],
    ]) ?>
    <br>
    <h2><?= Html::a("Produtos", Url::toRoute('produto/index')) ?> com marca <?= $model->nome ?></h2>
    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            [
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}',
                'urlCreator' => function ($action, Produto $model, $key, $index, $column) {
                    return Url::toRoute(['produto/view', 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>