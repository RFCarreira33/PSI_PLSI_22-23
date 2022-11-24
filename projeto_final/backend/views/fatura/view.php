<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use common\models\Fatura;
use common\models\Linhafatura;

/** @var yii\web\View $this */
/** @var common\models\Fatura $model */

$this->title = "Fatura número $model->id";
$this->params['breadcrumbs'][] = ['label' => 'Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fatura-view">

    <p>
        <?= Html::a('Ver em formato PDF', ['pdf', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome' => [
                'label' => 'Nome',
                'attribute' => 'nome',
                'value' => function (Fatura $model) {
                    return $model->nome;
                }
            ],
            'nif' => [
                'label' => 'NIF',
                'attribute' => 'nif',
                'value' => function (Fatura $model) {
                    return $model->nif;
                }
            ],
            'codPostal' => [
                'label' => 'Código Postal',
                'attribute' => 'codPostal',
                'value' => function (Fatura $model) {
                    return $model->codPostal;
                }
            ],
            'telefone',
            'morada',
            'email:email',
            'dataFatura' => [
                'label' => 'Data da Fatura',
                'attribute' => 'dataFatura',
                'format' => ['datetime', 'php:d-m-Y H:i:s'],
                'value' => function (Fatura $model) {
                    return $model->dataFatura;
                }
            ],
            'valorTotal' => [
                'label' => 'Valor Total',
                'attribute' => 'valorTotal',
                'value' => function (Fatura $model) {
                    return $model->valorTotal . '€';
                }
            ],
            'valorIva' => [
                'label' => 'Valor IVA',
                'attribute' => 'valorIva',
                'value' => function (Fatura $model) {
                    return $model->valorIva . '€';
                }
            ],
        ],
    ]) ?>

    <br>
    <h2>Linhas da Fatura:</h2>
    <br>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'produto_nome' => [
                'label' => 'Nome do Produto',
                'attribute' => 'produto_nome',
                'value' => function (Linhafatura $model) {
                    return $model->produto_nome;
                }
            ],
            'produto_referencia' => [
                'label' => 'Referência do Produto',
                'attribute' => 'produto_referencia',
                'value' => function (Linhafatura $model) {
                    return $model->produto_referencia;
                }
            ],
            'quantidade' => [
                'label' => 'Quantidade',
                'attribute' => 'quantidade',
                'value' => function (Linhafatura $model) {
                    return $model->quantidade;
                }
            ],
            'valorUnitario' => [
                'label' => 'Valor Unitário',
                'attribute' => 'valor',
                'value' => function (Linhafatura $model) {
                    return round($model->valor / $model->quantidade, 2) . '€';
                }
            ],
            'valor' => [
                'label' => 'Valor Total',
                'attribute' => 'valor',
                'value' => function (Linhafatura $model) {
                    return $model->valor . '€';
                }
            ],
            'valorIva' => [
                'label' => 'Valor Total IVA',
                'attribute' => 'valorIva',
                'value' => function (Linhafatura $model) {
                    return $model->valorIva . '€';
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn', 'template' => '',
            ],
        ],
    ]); ?>



</div>