<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Dados $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Dados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idUser' => $model->idUser], ['class' => 'btn btn-primary']) ?>
        <?php if ($status == null) {
            echo Html::a('Reativar Conta', ['change', 'idUser' => $model->idUser], ['class' => 'btn btn-primary']);
        } else {
            echo Html::a('Desativar Conta', ['change', 'idUser' => $model->idUser], ['class' => 'btn btn-danger']);
        } ?>
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