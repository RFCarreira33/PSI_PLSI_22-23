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
?>
<div class="categoria-view">

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if ($model->canDelete() && Yii::$app->user->can('DeleteCategoria'))
            echo Html::a('Apagar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem a certeza que quer apagar este item?',
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