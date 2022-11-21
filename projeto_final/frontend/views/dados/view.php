<?php

use common\models\Dados;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Dados $model */

?>
<div class="dados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar informções', ['update'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('As minha encomendas', Url::toRoute('fatura/index'),  ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'telefone',
            'nif' => [
                'label' => 'NIF',
                'attribute' => 'nif',
                'value' => function (Dados $model) {
                    return $model->nif;
                }
            ],
            'morada',
            'codPostal'  => [
                'label' => 'Código Postal',
                'attribute' => 'codPostal',
                'value' => function (Dados $model) {
                    return $model->codPostal;
                }
            ],
        ],
    ]) ?>

</div>