<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Dados $model */

$this->title = 'Update Dados: ' . $model->idUser;
$this->params['breadcrumbs'][] = ['label' => 'Dados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUser, 'url' => ['view', 'idUser' => $model->idUser]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
