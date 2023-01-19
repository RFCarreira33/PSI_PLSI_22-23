<?php

use yii\helpers\Html;
use common\models\Produto;
use common\models\Stock;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php $model->Ativo == 1 ? $label = 'Desativar' : $label = 'Ativar';
        if (Yii::$app->user->can('DeactivateProduto')) {
            echo Html::a("$label Produto", ['change', 'id' => $model->id], [
                'class' => 'btn btn-primary',
            ]);
        } ?>
        <?php if (Yii::$app->user->can('DeleteProduto') && $model->canDelete()) {
            echo Html::a('Apagar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem a certeza que pretende apagar este produto?',
                    'method' => 'post',
                ],
            ]);
        } ?>
        <?php
        if ($model->Ativo == 1)
            echo Html::a("Gerar QR", ['print', 'id' => $model->id], ['class' => 'btn btn-success',]);
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'preco' => [
                'label' => 'Preço',
                'attribute' => 'preco',
                'value' => function (Produto $model) {
                    return $model->preco . '€';
                }
            ],
            'referencia' => [
                'label' => 'Referência',
                'attribute' => 'referencia',
                'value' => function (Produto $model) {
                    return $model->referencia;
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
            'id_Categoria' => [
                'label' => Html::a('Categoria', Url::to(['categoria/view', 'id' => $model->id_Categoria])),
                'attribute' => 'id_Categoria',
                'value' => function (Produto $model) {
                    return $model->categoria->nome;
                },
            ],

            'id_Marca' => [
                'label' => Html::a('Marca', Url::to(['marca/view', 'nome' => $model->marca->nome])),
                'attribute' => 'id_Marca',
                'value' => function (Produto $model) {
                    return $model->marca->nome;
                },
                'urlExpression' => Url::toRoute(['marca/view', 'id' => $model->id_Marca]),
            ],
            'id_Iva' => [
                'label' => Html::a('Taxa IVA', Url::to(['iva/view', 'id' => $model->id_Iva])),
                'attribute' => 'id_Iva',
                'value' => function (Produto $model) {
                    return $model->iva->percentagem . '%';
                }
            ],
            'descricao:ntext' => [
                'label' => 'Descrição',
                'attribute' => 'descricao',
                'value' => function (Produto $model) {
                    return $model->descricao;
                }
            ],
            'imagem' => [
                'label' => 'Imagem',
                'attribute' => 'imagem',
                'value' => '/img/' . $model->imagem,
                'format' => ['image', ['width' => '230', 'height' => '230']],
            ],
        ],
    ]) ?>

    <br>
    <h2><?= Html::a("Stock", Url::toRoute('produto/index')) ?> de <?= $model->nome ?> nas várias lojas</h2>
    <br>
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

            'quantidade',
            [
                'class' => 'yii\grid\ActionColumn', 'template' => '{update}',
                'urlCreator' => function ($action, Stock $model, $key, $index, $column) {
                    return Url::toRoute(['stock/update', 'id_Loja' => $model->id_Loja, 'id_Produto' => $model->id_Produto]);
                }
            ],
        ],
    ]); ?>

</div>