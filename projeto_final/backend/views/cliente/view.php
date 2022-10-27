<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Cliente $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cliente-view">

    <p>
        <?= Html::a('Update', ['update', 'idUser' => $model->idUser], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idUser' => $model->idUser], [
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
            'idUser',
            'nome',
            'telefone',
            'nif',
            'morada',
            'codPostal',
        ],
    ]) ?>

</div>