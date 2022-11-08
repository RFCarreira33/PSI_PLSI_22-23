<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Dados $model */

?>
<div class="dados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_User' => $model->id_User], ['class' => 'btn btn-primary']) ?>
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