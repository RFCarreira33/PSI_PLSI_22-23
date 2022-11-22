<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\Produto;
use common\models\Iva;

/** @var yii\web\View $this */
/** @var common\models\Iva $model */

$this->title = "Taxa de $model->percentagem%";
$this->params['breadcrumbs'][] = ['label' => 'Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="iva-view">

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?php $model->Ativo == 1 ? $label = 'Desativar' : $label = 'Ativar';
        if (Yii::$app->user->can('DeactivateIva') && $model->canDeactivate()) {
            echo Html::a("$label Taxa de Iva", ['change', 'id' => $model->id], [
                'class' => 'btn btn-primary',
            ]);
        } ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'percentagem',
            'Ativo' => [
                'label' => 'Estado',
                'attribute' => 'Ativo',
                'value' => function (Iva $model) {
                    if ($model->Ativo == 1) {
                        return 'Ativo';
                    }
                    return 'Inativo';
                }
            ],

        ],
    ]) ?>

    <br>
    <h2><?= Html::a("Produtos", Url::toRoute('produto/index')) ?> com a esta taxa de Iva </h2>
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