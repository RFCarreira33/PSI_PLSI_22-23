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
        <?= Html::a('Update', ['update', 'id_User' => $model->id_User], ['class' => 'btn btn-primary']) ?>
        <?php if ($status == null) {
            echo Html::a('Reativar Conta', ['change', 'id_User' => $model->id_User], ['class' => 'btn btn-primary']);
        } else {
            echo Html::a('Desativar Conta', ['change', 'id_User' => $model->id_User], ['class' => 'btn btn-danger']);
        } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_User',
            'nome',
            'telefone',
            'nif',
            'morada',
            'codPostal',
        ],
    ]) ?>

</div>