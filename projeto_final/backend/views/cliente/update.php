<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Cliente $model */

$this->title = 'Update Cliente: ' . $model->idUser;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUser, 'url' => ['view', 'idUser' => $model->idUser]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cliente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
