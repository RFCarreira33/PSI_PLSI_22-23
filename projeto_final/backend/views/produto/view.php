<?php

use yii\helpers\Html;
use common\models\Produto;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'preco' => [
                'label' => 'Preço',
                'attribute' => 'preco',
                'value' => function (Produto $model) {
                    return $model->preco . '€';
                }
            ],
            'referencia',
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
            'imagem:ntext',
        ],
    ]) ?>

</div>