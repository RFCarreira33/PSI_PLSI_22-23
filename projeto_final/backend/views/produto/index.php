<?php

use common\models\Produto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ProdutoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <p>
        <?= Html::a('Criar Produto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'id_Categoria' => [
                'label' => 'Categoria',
                'attribute' => 'id_Categoria',
                'value' => function (Produto $model) {
                    return $model->categoria->nome;
                }
            ],

            //'id_Iva',
            'id_Marca' => [
                'label' => 'Marca',
                'attribute' => 'id_Marca',
                'value' => function (Produto $model) {
                    return $model->marca->nome;
                }
            ],
            //'descricao:ntext',
            //'imagem:ntext',
            'referencia' => [
                'label' => 'Referência',
                'attribute' => 'referencia',
                'value' => function (Produto $model) {
                    return $model->referencia;
                }
            ],
            'preco' => [
                'label' => 'Preço',
                'attribute' => 'preco',
                'value' => function (Produto $model) {
                    return $model->preco . '€';
                }
            ],
            'Ativo' => [
                'label' => 'Estado',
                'attribute' => 'Ativo',
                'value' => function (Produto $model) {
                    if ($model->Ativo == 1) {
                        return 'Ativo';
                    }
                    return 'Inativo';
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}',
                'urlCreator' => function ($action, Produto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>