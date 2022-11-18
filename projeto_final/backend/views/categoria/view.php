<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use Common\models\Categoria;
use common\models\Produto;

/** @var yii\web\View $this */
/** @var common\models\Categoria $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'id_CategoriaPai' => [
                'label' => 'Categoria Pai',
                'attribute' => 'id_CategoriaPai',
                'value' => function (Categoria $model) {
                    if ($model->id_CategoriaPai == null) {
                        return 'Nenhuma';
                    }
                    return $model->categoriaPai->nome;
                }
            ],

        ],
    ]) ?>

    <br>
    <h2><?= Html::a("Produtos", Url::toRoute('produto/index')) ?> que pertencem esta Categoria</h2>
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